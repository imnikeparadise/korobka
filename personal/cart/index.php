<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "KorobkaSigaret - сигареты оптом и в розницу в Москве, СПБ по выгодным ценам");
$APPLICATION->SetPageProperty("description", "Интернет-магазин KorobkaSigaret - сигареты оптом и в розницу по всей России и по выгодным ценам. ✓ Оригинал ✓ Поставки от производителя ✓ Скидки за объём");
$APPLICATION->SetTitle("Корзина");
?><h1>Корзина</h1><?$APPLICATION->IncludeComponent(
	"dresscode:sale.basket.basket", 
	".default", 
	array(
		"HIDE_MEASURES" => "N",
		"BASKET_PICTURE_WIDTH" => "220",
		"BASKET_PICTURE_HEIGHT" => "200",
		"HIDE_NOT_AVAILABLE" => "N",
		"PRODUCT_PRICE_CODE" => array(
		),
		"GIFT_CONVERT_CURRENCY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"COMPONENT_TEMPLATE" => ".default",
		"PATH_TO_PAYMENT" => "",
		"MIN_SUM_TO_PAYMENT" => "",
		"REGISTER_USER" => "Y",
		"PART_STORES_AVAILABLE" => "",
		"ALL_STORES_AVAILABLE" => "",
		"NO_STORES_AVAILABLE" => "",
		"LAZY_LOAD_PICTURES" => "N",
		"USE_MASKED" => "Y",
		"DISABLE_FAST_ORDER" => "N",
		"MASKED_FORMAT" => "+7 (999) 999-99-99"
	),
	false
);?><br /><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>