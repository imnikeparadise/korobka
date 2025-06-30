<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
<?
	//include module
	\Bitrix\Main\Loader::includeModule("dw.deluxe");
	//get template settings
	$arTemplateSettings = DwSettings::getInstance()->getCurrentSettings();
	extract($arTemplateSettings);
?>
<?
	if(!empty($TEMPLATE_TOP_MENU_FIXED)){
		$_SESSION["TOP_MENU_FIXED"] = $TEMPLATE_TOP_MENU_FIXED;
	}
?>
<?
IncludeTemplateLangFile(__FILE__);
?>
<!DOCTYPE html>
<html lang="<?=LANGUAGE_ID?>">
	<head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-1FESDGKT8W"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-1FESDGKT8W');
</script>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();
   for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
   k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(101292706, "init", {
		clickmap:true,
		trackLinks:true,
		accurateTrackBounce:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/101292706" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
		<title><?$APPLICATION->ShowTitle();?></title>
		<meta charset="<?=SITE_CHARSET?>">
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<link rel="shortcut icon" type="image/x-icon" href="<?=SITE_TEMPLATE_PATH?>/images/favicon.ico?v=?v=?v=?v=?v=?v=" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="theme-color" content="#3498db">
		<?CJSCore::Init(array("fx", "ajax", "window", "popup", "date"));?>
		<?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/fonts/roboto/roboto.css");?>
		<?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/themes/".$TEMPLATE_THEME_NAME."/style.css");?>
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/jquery-1.11.0.min.js");?>

    <script type="text/javascript">
      var ajaxPath = "<?=SITE_DIR?>ajax.php";
      var SITE_DIR = "<?=SITE_DIR?>";
      var SITE_ID  = "<?=SITE_ID?>";
      var TEMPLATE_PATH = "<?=SITE_TEMPLATE_PATH?>";
    </script>
    
    <script type="text/javascript">
		var LANG = {
			BASKET_ADDED: "<?=GetMessage("BASKET_ADDED")?>",
			WISHLIST_ADDED: "<?=GetMessage("WISHLIST_ADDED")?>",
			ADD_COMPARE_ADDED: "<?=GetMessage("ADD_COMPARE_ADDED")?>",
			ADD_CART_LOADING: "<?=GetMessage("ADD_CART_LOADING")?>",
			ADD_BASKET_DEFAULT_LABEL: "<?=GetMessage("ADD_BASKET_DEFAULT_LABEL")?>",
			ADDED_CART_SMALL: "<?=GetMessage("ADDED_CART_SMALL")?>",
			CATALOG_AVAILABLE: "<?=GetMessage("CATALOG_AVAILABLE")?>",
			GIFT_PRICE_LABEL: "<?=GetMessage("GIFT_PRICE_LABEL")?>",
			CATALOG_ON_ORDER: "<?=GetMessage("CATALOG_ON_ORDER")?>",
			CATALOG_NO_AVAILABLE: "<?=GetMessage("CATALOG_NO_AVAILABLE")?>",
			FAST_VIEW_PRODUCT_LABEL: "<?=GetMessage("FAST_VIEW_PRODUCT_LABEL")?>",
			CATALOG_ECONOMY: "<?=GetMessage("CATALOG_ECONOMY")?>",
			WISHLIST_SENDED: "<?=GetMessage("WISHLIST_SENDED")?>",
			REQUEST_PRICE_LABEL: "<?=GetMessage("REQUEST_PRICE_LABEL")?>",
			REQUEST_PRICE_BUTTON_LABEL: "<?=GetMessage("REQUEST_PRICE_BUTTON_LABEL")?>",
			ADD_SUBSCRIBE_LABEL: "<?=GetMessage("ADD_SUBSCRIBE_LABEL")?>",
			REMOVE_SUBSCRIBE_LABEL: "<?=GetMessage("REMOVE_SUBSCRIBE_LABEL")?>"
		};
	</script>

	<script type="text/javascript">
		<?if(!empty($arTemplateSettings)):?>
			var globalSettings = {
			<?foreach($arTemplateSettings as $settingsIndex => $nextSettingValue):?>
				<?if(!DwSettings::checkSecretSettingsByIndex($settingsIndex)):?>
					"<?=$settingsIndex?>": '<?=$nextSettingValue?>',
				<?endif;?>
			<?endforeach;?>
			}
		<?endif;?>
	</script>

		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/jquery.easing.1.3.js");?>
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/rangeSlider.js");?>
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/system.js");?>
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/topMenu.js");?>
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/topSearch.js");?>
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/dwCarousel.js");?>
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/dwSlider.js");?>
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/colorSwitcher.js");?>
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/dwTimer.js");?>
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/dwZoomer.js");?>
		<?if(DwSettings::isPagen()):?><?$APPLICATION->AddHeadString('<link rel="canonical" href="'.DwSettings::getPagenCanonical().'" />');//pagen canonical?><?endif;?>
		<?if(!empty($arTemplateSettings["TEMPLATE_METRICA_CODE"])):?><?$APPLICATION->AddHeadString($arTemplateSettings["TEMPLATE_METRICA_CODE"]);//metrica counter code?><?endif;?>
		<?$APPLICATION->ShowHead();?>

	</head>
<body class="loading <?if (INDEX_PAGE == "Y"):?>index<?endif;?><?if(!empty($TEMPLATE_PANELS_COLOR) && $TEMPLATE_PANELS_COLOR != "default"):?> panels_<?=$TEMPLATE_PANELS_COLOR?><?endif;?>">
	<div id="panel">
		<?$APPLICATION->ShowPanel();?>
	</div>
	<div id="foundation"<?if(!empty($TEMPLATE_SLIDER_HEIGHT) && $TEMPLATE_SLIDER_HEIGHT != "default"):?> class="slider_<?=$TEMPLATE_SLIDER_HEIGHT?>"<?endif;?>>
		<?require_once($_SERVER["DOCUMENT_ROOT"]."/".SITE_TEMPLATE_PATH."/headers/".$TEMPLATE_HEADER."/template.php");?>
		<div id="main"<?if($TEMPLATE_BACKGROUND_NAME != ""):?> class="color_<?=$TEMPLATE_BACKGROUND_NAME?>"<?endif;?>>
			<?$APPLICATION->ShowViewContent("landing_page_banner_container");?>
			<?$APPLICATION->ShowViewContent("before_breadcrumb_container");?>
			<?if(!defined("INDEX_PAGE")):?><div class="limiter"><?endif;?>

						<?if(!defined("INDEX_PAGE") && !defined("ERROR_404")):?>
							<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", ".default", Array(
								"START_FROM" => "0",
									"PATH" => "",
									"SITE_ID" => "-",
								),
								false
							);?>
						<?endif;?>
						<?$APPLICATION->ShowViewContent("after_breadcrumb_container");?>
						<?$APPLICATION->ShowViewContent("landing_page_top_text_container");?>
