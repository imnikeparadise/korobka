<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("keywords", "купить сигареты, сигареты мелким и крупным оптом, дёшево, Москве (МСК)");
$APPLICATION->SetPageProperty("title", "KorobkaSigaret - продажа сигарет оптом | Купить сигареты мелким и крупным оптом в Москве (МСК)");
$APPLICATION->SetPageProperty("description", "Интернет-магазин KorobkaSigaret - у нас вы можете дёшево купить сигареты мелким и крупным оптом. ✓ Низкие цены ✓ Поставки от производителя ✓ Доставка по всей России ✓ Самовывоз ✓ Акциз (оригинал)");
$APPLICATION->SetTitle("KorobkaSigaret - Продажа сигарет оптом");?><?
	//include module
	\Bitrix\Main\Loader::includeModule("dw.deluxe");

	//vars
	$catalogIblockId = null;
	$arPriceCodes = array();

	//get template settings
	$arTemplateSettings = DwSettings::getInstance()->getCurrentSettings();
	if(!empty($arTemplateSettings)){
		$catalogIblockId = $arTemplateSettings["TEMPLATE_PRODUCT_IBLOCK_ID"];
		$arPriceCodes = explode(", ", $arTemplateSettings["TEMPLATE_PRICE_CODES"]);
	}
?> <?$APPLICATION->IncludeComponent(
	"dresscode:slider", 
	"promoSlider", 
	array(
		"CACHE_TIME" => "3600000",
		"CACHE_TYPE" => "Y",
		"COMPONENT_TEMPLATE" => "promoSlider",
		"IBLOCK_ID" => "7",
		"IBLOCK_TYPE" => "slider",
		"LAZY_LOAD_PICTURES" => "N",
		"PICTURE_HEIGHT" => "650",
		"PICTURE_WIDTH" => "1600"
	),
	false
);?> <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"indexBanners",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"COMPONENT_TEMPLATE" => "indexBanners",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(0=>"ID",1=>"CODE",2=>"XML_ID",3=>"NAME",4=>"TAGS",5=>"SORT",6=>"PREVIEW_TEXT",7=>"PREVIEW_PICTURE",8=>"DETAIL_TEXT",9=>"DETAIL_PICTURE",10=>"DATE_ACTIVE_FROM",11=>"ACTIVE_FROM",12=>"DATE_ACTIVE_TO",13=>"ACTIVE_TO",14=>"SHOW_COUNTER",15=>"SHOW_COUNTER_START",16=>"IBLOCK_TYPE_ID",17=>"IBLOCK_ID",18=>"IBLOCK_CODE",19=>"IBLOCK_NAME",20=>"IBLOCK_EXTERNAL_ID",21=>"DATE_CREATE",22=>"CREATED_BY",23=>"CREATED_USER_NAME",24=>"TIMESTAMP_X",25=>"MODIFIED_BY",26=>"USER_NAME",27=>"",),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "2",
		"IBLOCK_TYPE" => "info",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "6",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Р‘Р°РЅРµСЂС‹",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(0=>"",1=>"",),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N"
	),
false,
Array(
	'ACTIVE_COMPONENT' => 'N'
)
);?> <?$APPLICATION->IncludeComponent(
	"dresscode:offers.product", 
	".default", 
	array(
		"CACHE_TIME" => "3600000",
		"CACHE_TYPE" => "Y",
		"CATALOG_ITEM_TEMPLATE" => "",
		"COMPONENT_TEMPLATE" => ".default",
		"CONVERT_CURRENCY" => "N",
		"ELEMENTS_COUNT" => "10",
		"HIDE_MEASURES" => "N",
		"HIDE_NOT_AVAILABLE" => "N",
		"IBLOCK_ID" => "15",
		"IBLOCK_TYPE" => "catalog",
		"LAZY_LOAD_PICTURES" => "N",
		"PICTURE_HEIGHT" => "200",
		"PICTURE_WIDTH" => "220",
		"PRODUCT_PRICE_CODE" => array(
		),
		"PROP_NAME" => "STRANA",
		"PROP_VALUE" => array(
			0 => "_63",
			1 => "_64",
			2 => "_68",
		),
		"SORT_PROPERTY_NAME" => "SORT",
		"SORT_VALUE" => "ASC"
	),
	false,
	array(
		"ACTIVE_COMPONENT" => "Y"
	)
);?> <?$APPLICATION->IncludeComponent(
	"dresscode:pop.section",
	".default",
	Array(
		"CACHE_TIME" => "3600000",
		"CACHE_TYPE" => "Y",
		"COMPONENT_TEMPLATE" => ".default",
		"ELEMENTS_COUNT" => "10",
		"IBLOCK_ID" => $catalogIblockId,
		"IBLOCK_TYPE" => "catalog",
		"PICTURE_HEIGHT" => "100",
		"PICTURE_WIDTH" => "120",
		"POP_LAST_ELEMENT" => "Y",
		"PROP_NAME" => "UF_POPULAR",
		"PROP_VALUE" => "Y",
		"SELECT_FIELDS" => array(0=>"NAME",1=>"SECTION_PAGE_URL",2=>"DETAIL_PICTURE",3=>"UF_IMAGES",4=>"UF_MARKER",5=>"",),
		"SORT_PROPERTY_NAME" => "7",
		"SORT_VALUE" => "DESC"
	),
false,
Array(
	'ACTIVE_COMPONENT' => 'Y'
)
);?> <?$APPLICATION->IncludeComponent(
	"dresscode:brands.list",
	".default",
	Array(
		"CACHE_TIME" => "360000",
		"CACHE_TYPE" => "A",
		"ELEMENTS_COUNT" => "15",
		"IBLOCK_ID" => "1",
		"IBLOCK_TYPE" => "info",
		"PICTURE_HEIGHT" => "120",
		"PICTURE_WIDTH" => "150",
		"PROP_NAME" => "",
		"PROP_VALUE" => "",
		"SELECT_FIELDS" => array(0=>"",1=>"*",2=>"",),
		"SORT_PROPERTY_NAME" => "7",
		"SORT_VALUE" => "ASC"
	),
false,
Array(
	'ACTIVE_COMPONENT' => 'N'
)
);?><?$APPLICATION->IncludeComponent(
	"dresscode:simple.offers",
	"",
	Array(
		"CACHE_TIME" => "3600000",
		"CACHE_TYPE" => "A",
		"CONVERT_CURRENCY" => "N",
		"DISABLE_SELECT_CATEGORY" => "N",
		"FILTER_PRICE_CODE" => "",
		"HIDE_MEASURES" => "N",
		"HIDE_NOT_AVAILABLE" => "N",
		"IBLOCK_ID" => "15",
		"IBLOCK_TYPE" => "catalog",
		"LAZY_LOAD_PICTURES" => "N",
		"PRICE_CODE" => "",
		"PROPERTY_CODE" => array(0=>"",1=>"",),
		"PROP_NAME" => "MANUFACTURER",
		"PROP_VALUE" => "79"
	),
false,
Array(
	'ACTIVE_COMPONENT' => 'N'
)
);?>
<div id="infoTabsCaption">
	<div class="limiter">
		<div class="items">
			 <?$APPLICATION->ShowViewContent("main_news_view_content_tab");?> <?$APPLICATION->ShowViewContent("main_collection_view_content_tab");?> <?$APPLICATION->ShowViewContent("main_service_view_content_tab");?>
		</div>
	</div>
</div>
<div id="infoTabs">
	<div class="items">
		 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"mainNews",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "Y",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(0=>"ID",1=>"CODE",2=>"XML_ID",3=>"NAME",4=>"TAGS",5=>"SORT",6=>"PREVIEW_TEXT",7=>"PREVIEW_PICTURE",8=>"DETAIL_TEXT",9=>"DETAIL_PICTURE",10=>"DATE_ACTIVE_FROM",11=>"ACTIVE_FROM",12=>"DATE_ACTIVE_TO",13=>"ACTIVE_TO",14=>"SHOW_COUNTER",15=>"SHOW_COUNTER_START",16=>"IBLOCK_TYPE_ID",17=>"IBLOCK_ID",18=>"IBLOCK_CODE",19=>"IBLOCK_NAME",20=>"IBLOCK_EXTERNAL_ID",21=>"DATE_CREATE",22=>"CREATED_BY",23=>"CREATED_USER_NAME",24=>"TIMESTAMP_X",25=>"MODIFIED_BY",26=>"USER_NAME",27=>"",),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "14",
		"IBLOCK_TYPE" => "info",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "6",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "РќРѕРІРѕСЃС‚Рё",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(0=>"",1=>"",),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC"
	)
);?> <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"mainCollection",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "Y",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(0=>"ID",1=>"CODE",2=>"XML_ID",3=>"NAME",4=>"TAGS",5=>"SORT",6=>"PREVIEW_TEXT",7=>"PREVIEW_PICTURE",8=>"DETAIL_TEXT",9=>"DETAIL_PICTURE",10=>"DATE_ACTIVE_FROM",11=>"ACTIVE_FROM",12=>"DATE_ACTIVE_TO",13=>"ACTIVE_TO",14=>"SHOW_COUNTER",15=>"SHOW_COUNTER_START",16=>"IBLOCK_TYPE_ID",17=>"IBLOCK_ID",18=>"IBLOCK_CODE",19=>"IBLOCK_NAME",20=>"IBLOCK_EXTERNAL_ID",21=>"DATE_CREATE",22=>"CREATED_BY",23=>"CREATED_USER_NAME",24=>"TIMESTAMP_X",25=>"MODIFIED_BY",26=>"USER_NAME",27=>"",),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "10",
		"IBLOCK_TYPE" => "info",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "6",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "РљРѕР»Р»РµРєС†РёРё",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(0=>"",1=>"",),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC"
	)
);?> <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"mainService",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "Y",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(0=>"ID",1=>"CODE",2=>"XML_ID",3=>"NAME",4=>"TAGS",5=>"SORT",6=>"PREVIEW_TEXT",7=>"PREVIEW_PICTURE",8=>"DETAIL_TEXT",9=>"DETAIL_PICTURE",10=>"DATE_ACTIVE_FROM",11=>"ACTIVE_FROM",12=>"DATE_ACTIVE_TO",13=>"ACTIVE_TO",14=>"SHOW_COUNTER",15=>"SHOW_COUNTER_START",16=>"IBLOCK_TYPE_ID",17=>"IBLOCK_ID",18=>"IBLOCK_CODE",19=>"IBLOCK_NAME",20=>"IBLOCK_EXTERNAL_ID",21=>"DATE_CREATE",22=>"CREATED_BY",23=>"CREATED_USER_NAME",24=>"TIMESTAMP_X",25=>"MODIFIED_BY",26=>"USER_NAME",27=>"",),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "11",
		"IBLOCK_TYPE" => "info",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "6",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "РќРѕРІРѕСЃС‚Рё",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(0=>"",1=>"",),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC"
	)
);?>
	</div>
</div>
<?$APPLICATION->IncludeComponent(
	"dresscode:slider",
	"middle",
	Array(
		"CACHE_TIME" => "3600000",
		"CACHE_TYPE" => "Y",
		"COMPONENT_TEMPLATE" => "middle",
		"IBLOCK_ID" => "8",
		"IBLOCK_TYPE" => "slider",
		"PICTURE_HEIGHT" => "200",
		"PICTURE_WIDTH" => "1480"
	),
false,
Array(
	'ACTIVE_COMPONENT' => 'N'
)
);?>
<?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	".default",
	Array(
		"AREA_FILE_RECURSIVE" => "Y",
		"AREA_FILE_SHOW" => "sect",
		"AREA_FILE_SUFFIX" => "simplyText",
		"COMPONENT_TEMPLATE" => ".default",
		"EDIT_TEMPLATE" => ""
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>