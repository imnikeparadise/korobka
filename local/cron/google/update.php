<?php
include($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

require '../../vendor/autoload.php';

// Путь к файлу ключа сервисного аккаунта
$googleAccountKeyFilePath = 'credentials.json';
putenv( 'GOOGLE_APPLICATION_CREDENTIALS=' . $googleAccountKeyFilePath );

$client = new Google_Client();
$client->useApplicationDefaultCredentials();
$client->addScope( 'https://www.googleapis.com/auth/spreadsheets' );

$service = new Google_Service_Sheets( $client );

// ID таблицы
$spreadsheetId = '1pcXCkG5vEQGILyh0ZmOZF6TCJzntnyTithyof6bkHAM';

/*
$range = 'A:U';
$response = $service->spreadsheets->get($spreadsheetId, $range , array('valueRenderOption' => 'UNFORMATTED_VALUE'));

$sheets = $response->getSheets();



$spreadsheet_service=new Google_Service_Sheets($client);
*/


$body = new Google_Service_Sheets_GetSpreadsheetByDataFilterRequest([
    'data_filters'=>[
        "gridRange"=>[
            "sheetId"=> 549189854
        ]
    ]
]);

$response = $service->spreadsheets->getByDataFilter($spreadsheetId, $body);

$values = [];
foreach($response->getSheets()  as  $key=> $sheet) {

    // Свойства листа
    $sheetProperties = $sheet->getProperties();

    $range = "{$sheetProperties->title}!A:U";

    $response2 = $service->spreadsheets_values->get($spreadsheetId, $range, array('valueRenderOption' => 'UNFORMATTED_VALUE'));

    $values = $response2->getValues();
}

$key = array(
    "id"    => null,
    "count" => null,
    "price" => null
);

$countProductActual = 0;

//echo '<pre>'; print_r($values); echo '</pre>';

if(count($values)>0){

    $headers = array_shift($values);

    foreach ($headers as $k_header =>$header) {

        switch ($header) {
            case "Артикул":
                $key["id"] = $k_header;
                break;
            case 'Остатки на складе (коробок)':
                $key["count"] = $k_header;
                break;
            case 'Цена за коробку (руб)':
                $key["price"] = $k_header;
                break;
        }
    }

    $result = array();
    if(is_null($key["id"]) || is_null($key["count"]) || is_null($key["price"])) {
        echo 'Не найдены ключевые колонки';
        return;
    }


    foreach ($values as $k_value => $value) {

        $price = ceil($value[$key["price"]]);
        $count = $value[$key["count"]];
        if($count<=0 || $price<=0){
            $count = 0;
        }


        if($price > 0){
            $countProductActual++;
        }
        $id = (int)$value[$key["id"]];

        if(!empty($id)) {

            $result[$id] = array(
                "count"  => $count,
                "price"  => $price,
                "update" => null
            );
        }

    }
}


//echo '<pre>'; print_r($result); echo '</pre>';


if($countProductActual <= 0){
    return;
}

CModule::IncludeModule("catalog");
CModule::IncludeModule("iblock");

$iblockId = 15;

$productsId = array_keys($result);
if(count($productsId)>0){


    $arSelect = Array("ID", "PROPERTY_CML2_ARTICLE");
    $arFilter = Array("IBLOCK_ID"=> $iblockId);
    $res = \CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
    while($ob = $res->GetNext()) {

        $itemData = $result[$ob['PROPERTY_CML2_ARTICLE_VALUE']];

        if(!empty($itemData) && $itemData['price']>0){
            \CPrice::SetBasePrice($ob["ID"], $itemData['price'] ,'RUB');
            \CCatalogProduct::Update($ob["ID"], array('QUANTITY' => $itemData['count']));
        } else {
            \CPrice::SetBasePrice($ob["ID"], 0 ,'RUB');
            \CCatalogProduct::Update($ob["ID"], array('QUANTITY' => 0));
        }
    }

}


$cache = new CPHPCache();
$cache->CleanDir();


