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
<?IncludeTemplateLangFile(__FILE__);?>
<!DOCTYPE html>
<html lang="<?=LANGUAGE_ID?>">
	<head>
		<meta charset="<?=SITE_CHARSET?>">
		<META NAME="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" type="image/x-icon" href="<?=SITE_TEMPLATE_PATH?>/images/favicon.ico" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="theme-color" content="#3498db">
		<?CJSCore::Init(array("fx", "ajax", "window", "popup", "date"));?>
		<?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/fonts/roboto/roboto.css");?>
		<?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/themes/".$TEMPLATE_BACKGROUND_NAME."/".$TEMPLATE_THEME_NAME."/style.css");?>
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/jquery-1.11.0.min.js");?>
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/jquery.easing.1.3.js");?>
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/rangeSlider.js");?>
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/system.js");?>
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/topMenu.js");?>
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/topSearch.js");?>
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/dwCarousel.js");?>
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/dwSlider.js");?>
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/dwZoomer.js");?>
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/dwTimer.js");?>
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/colorSwitcher.js");?>
		<?if(DwSettings::isPagen()):?><?$APPLICATION->AddHeadString('<link rel="canonical" href="'.DwSettings::getPagenCanonical().'" />');//pagen canonical?><?endif;?>
		<?if(!empty($arTemplateSettings["TEMPLATE_METRICA_CODE"])):?><?$APPLICATION->AddHeadString($arTemplateSettings["TEMPLATE_METRICA_CODE"]);//metrica counter code?><?endif;?>
		<?$APPLICATION->ShowHead();?>
		<title><?$APPLICATION->ShowTitle();?></title>
	</head>
	<body class="loading <?if(defined("INDEX_PAGE") && INDEX_PAGE == "Y"):?>index<?endif;?><?if(!empty($TEMPLATE_PANELS_COLOR) && $TEMPLATE_PANELS_COLOR != "default"):?> panels_<?=$TEMPLATE_PANELS_COLOR?><?endif;?>">
		<div id="panel">
			<?$APPLICATION->ShowPanel();?>
		</div>
		<div id="foundation">
			<?require_once($_SERVER["DOCUMENT_ROOT"]."/".SITE_TEMPLATE_PATH."/headers/".$TEMPLATE_HEADER."/template.php");?>
			<div id="main"<?if($TEMPLATE_BACKGROUND_NAME != ""):?> class="color_<?=$TEMPLATE_BACKGROUND_NAME?>"<?endif;?>>
				<div class="limiter">
					<div class="compliter">
						<?if(!defined("ERROR_404")):?>
							<?$APPLICATION->IncludeComponent(
								"bitrix:main.include", 
								".default", 
								array(
									"AREA_FILE_SHOW" => "sect",
									"AREA_FILE_SUFFIX" => "leftBlock",
									"AREA_FILE_RECURSIVE" => "Y",
									"EDIT_TEMPLATE" => ""
								),
								false
							);?>
						<?endif;?>
						<div id="right">
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
							<?$APPLICATION->ShowViewContent("landing_page_banner_container");?>
							<?$APPLICATION->ShowViewContent("landing_page_top_text_container");?>