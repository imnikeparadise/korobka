<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "KorobkaSigaret- сигареты оптом и в розницу в Москве, СПБ по выгодным ценам");
$APPLICATION->SetPageProperty("description", "Интернет-магазин KorobkaSigaret - сигареты оптом и в розницу по всей России и по выгодным ценам. ✓ Оригинал ✓ Поставки от производителя ✓ Скидки за объём");
$APPLICATION->SetTitle("Отзывы");?><h1>Отзывы о магазине</h1>
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
	"bitrix:news.list", 
	"reviews", 
	array(
		"COMPONENT_TEMPLATE" => "reviews",
		"IBLOCK_TYPE" => "service",
		"IBLOCK_ID" => "13",
		"NEWS_COUNT" => "8",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(
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
		"PROPERTY_CODE" => array(
			0 => "USER_ID",
			1 => "USER_NAME",
			2 => "VOTE_COUNT",
			3 => "BAD_REVIEW",
			4 => "ANSWER",
			5 => "GOOD_REVIEW",
			6 => "DATE",
			7 => "RATING",
			8 => "VOTE_SUM",
			9 => "NAME",
			10 => "",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_JUMP" => "Y",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "Y",
		"AJAX_OPTION_ADDITIONAL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "N",
		"SET_BROWSER_TITLE" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_LAST_MODIFIED" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"PAGER_TEMPLATE" => "round",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Отзывы о магазине",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SET_STATUS_404" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => ""
	),
	false
);?>
	</div>
	<div class="global-information-block">
		<?$APPLICATION->IncludeComponent(
			"bitrix:main.include", 
			".default", 
			array(
				"COMPONENT_TEMPLATE" => ".default",
				"AREA_FILE_SHOW" => "sect",
				"AREA_FILE_SUFFIX" => "information_block",
				"AREA_FILE_RECURSIVE" => "Y",
				"EDIT_TEMPLATE" => ""
			),
			false
		);?>
	</div>
</div> <br /><br />
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>