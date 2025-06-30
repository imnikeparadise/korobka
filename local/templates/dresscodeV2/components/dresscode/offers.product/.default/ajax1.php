<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

// Включаем отображение ошибок для отладки (потом можно убрать)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Логирование для отладки
file_put_contents($_SERVER['DOCUMENT_ROOT'].'/ajax_debug.log', 
    date('Y-m-d H:i:s') . " - AJAX Request: " . print_r($_GET, true) . "\n", 
    FILE_APPEND);

if(!empty($_GET["params"]) && !empty($_GET["groupID"]) && isset($_GET["page"])){
    
    try {
        $arParams = \Bitrix\Main\Web\Json::decode($_GET["params"], true);
        
        if(!empty($arParams)){
            
            $arParams["AJAX"] = "Y";
            $arParams["GROUP_ID"] = $_GET["groupID"]; // all or int 0-9
            $arParams["PAGE"] = intval($_GET["page"]);
            
            // Логируем параметры компонента
            file_put_contents($_SERVER['DOCUMENT_ROOT'].'/ajax_debug.log', 
                date('Y-m-d H:i:s') . " - Component params: " . print_r($arParams, true) . "\n", 
                FILE_APPEND);
            
            $APPLICATION->IncludeComponent(
                "dresscode:offers.product", 
                ".default", 
                $arParams,
                false
            );
            
        } else {
            echo "Error: arParams is empty after JSON decode";
            exit();
        }
        
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        file_put_contents($_SERVER['DOCUMENT_ROOT'].'/ajax_debug.log', 
            date('Y-m-d H:i:s') . " - Error: " . $e->getMessage() . "\n", 
            FILE_APPEND);
        exit();
    }
    
} else {
    echo "Error: Missing required parameters (params, groupID, page)";
    echo "<br>GET params: " . print_r($_GET, true);
    exit();
}
?>
