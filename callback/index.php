<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Напишие нам - KorobkaSigaret - сигареты оптом и в розницу в Москве, СПБ по выгодным ценам");
$APPLICATION->SetPageProperty("description", "На странице можете нам написать - Интернет-магазин KorobkaSigaret - сигареты оптом и в розницу по всей России и по выгодным ценам. ✓ Оригинал ✓ Поставки от производителя ✓ Скидки за объём");
$APPLICATION->SetTitle("Обратная связь");
?><h1>Обратная связь</h1>
<?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"personal",
	Array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "",
		"COMPONENT_TEMPLATE" => "personal",
		"DELAY" => "N",
		"MAX_LEVEL" => "1",
		"MENU_CACHE_GET_VARS" => array(),
		"MENU_CACHE_TIME" => "3600000",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "about",
		"USE_EXT" => "N"
	)
);?>
<div class="global-block-container">
	<div class="global-content-block">
		 <?$APPLICATION->IncludeComponent(
	"bitrix:form.result.new",
	"twoColumns",
	Array(
		"CACHE_TIME" => "360000",
		"CACHE_TYPE" => "Y",
		"CHAIN_ITEM_LINK" => "",
		"CHAIN_ITEM_TEXT" => "",
		"COMPONENT_TEMPLATE" => ".default",
		"EDIT_URL" => "",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"LIST_URL" => "",
		"SEF_MODE" => "N",
		"SUCCESS_URL" => "",
		"USE_EXTENDED_ERRORS" => "Y",
		"VARIABLE_ALIASES" => array("WEB_FORM_ID"=>"WEB_FORM_ID","RESULT_ID"=>"RESULT_ID",),
		"WEB_FORM_ID" => "2"
	)
);?>
	</div>
	<div class="global-information-block">
		 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	".default",
	Array(
		"AREA_FILE_RECURSIVE" => "Y",
		"AREA_FILE_SHOW" => "sect",
		"AREA_FILE_SUFFIX" => "information_block",
		"COMPONENT_TEMPLATE" => ".default",
		"EDIT_TEMPLATE" => ""
	)
);?>
	</div>
</div>
<br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>