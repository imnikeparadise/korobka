<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");?>
<?
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
?>
<?$APPLICATION->IncludeComponent(
	"bitrix:news", 
	".default", 
	array(
		"IBLOCK_TYPE" => "info",
		"IBLOCK_ID" => "14",
		"NEWS_COUNT" => "6",
		"USE_SEARCH" => "N",
		"USE_RSS" => "N",
		"NUM_NEWS" => "20",
		"NUM_DAYS" => "180",
		"YANDEX" => "N",
		"USE_RATING" => "N",
		"USE_CATEGORIES" => "N",
		"USE_REVIEW" => "N",
		"USE_FILTER" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"CHECK_DATES" => "Y",
		"SEF_MODE" => "Y",
		"SEF_FOLDER" => "/news/",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_SHADOW" => "Y",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "Y",
		"CACHE_GROUPS" => "Y",
		"DISPLAY_PANEL" => "Y",
		"SET_TITLE" => "Y",
		"SET_STATUS_404" => "Y",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"USE_PERMISSIONS" => "N",
		"PREVIEW_TRUNCATE_LEN" => "",
		"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"LIST_FIELD_CODE" => array(
			0 => "ID",
			1 => "CODE",
			2 => "XML_ID",
			3 => "NAME",
			4 => "TAGS",
			5 => "SORT",
			6 => "PREVIEW_TEXT",
			7 => "PREVIEW_PICTURE",
			8 => "DETAIL_TEXT",
			9 => "DETAIL_PICTURE",
			10 => "DATE_ACTIVE_FROM",
			11 => "ACTIVE_FROM",
			12 => "DATE_ACTIVE_TO",
			13 => "ACTIVE_TO",
			14 => "SHOW_COUNTER",
			15 => "SHOW_COUNTER_START",
			16 => "IBLOCK_TYPE_ID",
			17 => "IBLOCK_ID",
			18 => "IBLOCK_CODE",
			19 => "IBLOCK_NAME",
			20 => "IBLOCK_EXTERNAL_ID",
			21 => "DATE_CREATE",
			22 => "CREATED_BY",
			23 => "CREATED_USER_NAME",
			24 => "TIMESTAMP_X",
			25 => "MODIFIED_BY",
			26 => "USER_NAME",
			27 => "",
		),
		"LIST_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"DISPLAY_NAME" => "Y",
		"META_KEYWORDS" => "-",
		"META_DESCRIPTION" => "-",
		"BROWSER_TITLE" => "NAME",
		"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"DETAIL_FIELD_CODE" => array(
			0 => "",
			1 => "ID",
			2 => "CODE",
			3 => "XML_ID",
			4 => "NAME",
			5 => "TAGS",
			6 => "SORT",
			7 => "PREVIEW_TEXT",
			8 => "PREVIEW_PICTURE",
			9 => "DETAIL_TEXT",
			10 => "DETAIL_PICTURE",
			11 => "DATE_ACTIVE_FROM",
			12 => "ACTIVE_FROM",
			13 => "DATE_ACTIVE_TO",
			14 => "ACTIVE_TO",
			15 => "SHOW_COUNTER",
			16 => "SHOW_COUNTER_START",
			17 => "IBLOCK_TYPE_ID",
			18 => "IBLOCK_ID",
			19 => "IBLOCK_CODE",
			20 => "IBLOCK_NAME",
			21 => "IBLOCK_EXTERNAL_ID",
			22 => "DATE_CREATE",
			23 => "CREATED_BY",
			24 => "CREATED_USER_NAME",
			25 => "TIMESTAMP_X",
			26 => "MODIFIED_BY",
			27 => "USER_NAME",
			28 => "",
		),
		"DETAIL_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"DETAIL_DISPLAY_TOP_PAGER" => "N",
		"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
		"DETAIL_PAGER_TITLE" => "Страница",
		"DETAIL_PAGER_TEMPLATE" => "round",
		"DETAIL_PAGER_SHOW_ALL" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "round",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000000",
		"PAGER_SHOW_ALL" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"AJAX_OPTION_ADDITIONAL" => "",
		"COMPONENT_TEMPLATE" => ".default",
		"SET_LAST_MODIFIED" => "N",
		"ADD_ELEMENT_CHAIN" => "Y",
		"USE_SHARE" => "N",
		"DETAIL_SET_CANONICAL_URL" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => "",
		"TEMPLATE_THEME" => "",
		"MEDIA_PROPERTY" => "",
		"SLIDER_PROPERTY" => "",
		"STRICT_SECTION_CHECK" => "N",
		"SHOW_BLOG_COMMENTS" => "Y",
		"HIDE_NOT_AVAILABLE" => "N",
		"PRODUCT_IBLOCK_TYPE" => "catalog",
		"PRODUCT_IBLOCK_ID" => $catalogIblockId,
		"PRODUCT_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"PRODUCT_PRICE_CODE" => $arPriceCodes,
		"HIDE_MEASURES" => "N",
		"PRODUCT_CONVERT_CURRENCY" => "N",
		"SEF_URL_TEMPLATES" => array(
			"news" => "",
			"section" => "",
			"detail" => "#ELEMENT_CODE#/",
		)
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>