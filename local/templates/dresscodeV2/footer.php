			
			<?IncludeTemplateLangFile(__FILE__);?>
			<?$APPLICATION->ShowViewContent("landing_page_bottom_text_container");?>
			<?if (INDEX_PAGE != "Y"):?></div><?endif;?>
		</div>
		<?$APPLICATION->ShowViewContent("no_main_container");?>				
		<?$APPLICATION->IncludeComponent(
			"bitrix:main.include",
			".default",
			array(
				"AREA_FILE_SHOW" => "sect",
				"AREA_FILE_SUFFIX" => "footerTabs",
				"AREA_FILE_RECURSIVE" => "Y",
				"EDIT_TEMPLATE" => ""
			),
			false
		);?>

		<div id="footer"<?if(!empty($TEMPLATE_FOOTER_VARIANT) && $TEMPLATE_FOOTER_VARIANT != "default"):?> class="variant_<?=$TEMPLATE_FOOTER_VARIANT?>"<?endif;?>>
			<div class="fc">
				<div class="limiter">
					<div id="rowFooter">
						<div id="leftFooter">
							<div class="footerRow">
								<div class="column">
									<span class="heading"><?$APPLICATION->IncludeFile(SITE_DIR."sect_footer_menu_heading.php", Array(), Array("MODE" => "text", "NAME" => GetMessage("SECT_FOOTER_MENU_HEADING"), "TEMPLATE" => "sect_footer_menu_heading.php"));?></span>
									<?$APPLICATION->IncludeComponent(
										"bitrix:menu", 
										"footerCatalog", 
										array(
											"ROOT_MENU_TYPE" => "left",
											"MENU_CACHE_TYPE" => "A",
											"MENU_CACHE_TIME" => "36000000",
											"MENU_CACHE_USE_GROUPS" => "Y",
											"MENU_CACHE_GET_VARS" => array(
											),
											"MAX_LEVEL" => "1",
											"CHILD_MENU_TYPE" => "top",
											"USE_EXT" => "Y",
											"DELAY" => "N",
											"ALLOW_MULTI_SELECT" => "N",
											"COMPONENT_TEMPLATE" => "footerCatalog",
											"CACHE_SELECTED_ITEMS" => "N"
										),
										false
									);?>
								</div>
								<div class="column">
									<span class="heading"><?$APPLICATION->IncludeFile(SITE_DIR."sect_footer_menu_heading2.php", Array(), Array("MODE" => "text", "NAME" => GetMessage("SECT_FOOTER_MENU_HEADING2"), "TEMPLATE" => "sect_footer_menu_heading2.php"));?></span>
									<?$APPLICATION->IncludeComponent(
										"bitrix:menu", 
										"footerOffers", 
										array(
											"ROOT_MENU_TYPE" => "left2",
											"MENU_CACHE_TYPE" => "N",
											"MENU_CACHE_TIME" => "3600",
											"MENU_CACHE_USE_GROUPS" => "Y",
											"MENU_CACHE_GET_VARS" => array(
											),
											"MAX_LEVEL" => "1",
											"CHILD_MENU_TYPE" => "top",
											"USE_EXT" => "N",
											"DELAY" => "N",
											"ALLOW_MULTI_SELECT" => "N",
											"COMPONENT_TEMPLATE" => "footerOffers",
											"CACHE_SELECTED_ITEMS" => "N"
										),
										false
									);?>						
								</div>
								<div class="column">
									<span class="heading"><?$APPLICATION->IncludeFile(SITE_DIR."sect_footer_menu_heading3.php", Array(), Array("MODE" => "text", "NAME" => GetMessage("SECT_FOOTER_MENU_HEADING3"), "TEMPLATE" => "sect_footer_menu_heading3.php"));?></span>
									<?$APPLICATION->IncludeComponent("bitrix:menu", "footerHelp", Array(
										"ROOT_MENU_TYPE" => "top",
											"MENU_CACHE_TYPE" => "N",
											"MENU_CACHE_TIME" => "3600",
											"MENU_CACHE_USE_GROUPS" => "Y",
											"MENU_CACHE_GET_VARS" => "",
											"MAX_LEVEL" => "1",
											"CHILD_MENU_TYPE" => "top",
											"USE_EXT" => "N",
											"DELAY" => "N",
											"ALLOW_MULTI_SELECT" => "N",
											"CACHE_SELECTED_ITEMS" => "N"
										),
										false
									);?>
								</div>
							</div>
						</div>
						<div id="rightFooter">
							<table class="rightTable">
								<tr class="footerRow">
									<td class="leftColumn">
										<?$APPLICATION->IncludeFile(SITE_DIR."sect_footer_left.php", Array(), Array("MODE" => "text", "NAME" => GetMessage("SECT_FOOTER_LEFT"), "TEMPLATE" => "sect_footer_left.php"));?>
										<?$APPLICATION->IncludeFile(SITE_DIR."sect_footer_left2.php", Array(), Array("MODE" => "text", "NAME" => GetMessage("SECT_FOOTER_LEFT2"), "TEMPLATE" => "sect_footer_left2.php"));?>
										<?$APPLICATION->IncludeFile(SITE_DIR."sect_footer_left3.php", Array(), Array("MODE" => "text", "NAME" => GetMessage("SECT_FOOTER_LEFT3"), "TEMPLATE" => "sect_footer_left3.php"));?>
										<?$APPLICATION->IncludeFile(SITE_DIR."sect_footer_counters.php", Array(), Array("MODE" => "text", "NAME" => GetMessage("SECT_FOOTER_COUNTERS"), "TEMPLATE" => "sect_footer_counters.php"));?>

									</td>
									<td class="rightColumn">
										<div class="wrap">
											<?$APPLICATION->IncludeFile(SITE_DIR."sect_footer_left4.php", Array(), Array("MODE" => "text", "NAME" => GetMessage("SECT_FOOTER_LEFT4"), "TEMPLATE" => "sect_footer_left4.php"));?>
											<?$APPLICATION->IncludeFile(SITE_DIR."sect_footer_counters_right.php", Array(), Array("MODE" => "text", "NAME" => GetMessage("SECT_FOOTER_COUNTERS"), "TEMPLATE" => "sect_footer_counters_right.php"));?>
											<?if(!empty($arTemplateSettings["TEMPLATE_GOOGLE_CODE"])):?>
												<?=trim($arTemplateSettings["TEMPLATE_GOOGLE_CODE"])?>
											<?endif;?>
											<?if(!empty($arTemplateSettings["TEMPLATE_COUNTERS_CODE"])):?>
												<?=trim($arTemplateSettings["TEMPLATE_COUNTERS_CODE"])?>
											<?endif;?>
										</div>
									</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
			<?/*
			<div id="footerBottom">
				<div class="limiter">
					<div class="creator">
						<?if(!empty($TEMPLATE_FOOTER_VARIANT) && ($TEMPLATE_FOOTER_VARIANT == "6" || $TEMPLATE_FOOTER_VARIANT == "7")):?>
							<a href="http://dw24.su/"><img src="<?=SITE_TEMPLATE_PATH?>/images/dwC.png" alt="Digital Web"></a>
						<?elseif(!empty($TEMPLATE_FOOTER_VARIANT) && ($TEMPLATE_FOOTER_VARIANT == "4" || $TEMPLATE_FOOTER_VARIANT == "5" || $TEMPLATE_FOOTER_VARIANT == "6")):?>
							<a href="http://dw24.su/"><img src="<?=SITE_TEMPLATE_PATH?>/images/dwW.png" alt="Digital Web"></a>
						<?else:?>
							<a href="http://dw24.su/"><img src="<?=SITE_TEMPLATE_PATH?>/images/dw.png" alt="Digital Web"></a>
						<?endif;?>
					</div>
					<div class="social">
						<?$APPLICATION->IncludeComponent(
							"bitrix:main.include",
							".default",
							array(
								"AREA_FILE_SHOW" => "sect",
								"AREA_FILE_SUFFIX" => "sn",
								"AREA_FILE_RECURSIVE" => "Y",
								"EDIT_TEMPLATE" => ""
							),
							false
						);?>
					</div>
				</div>
			</div>
			*/?>
		</div>
		<div id="footerLine"<?if(!empty($TEMPLATE_FOOTER_LINE_COLOR) && $TEMPLATE_FOOTER_LINE_COLOR != "default"):?> class="color_<?=$TEMPLATE_FOOTER_LINE_COLOR?>"<?endif;?>>
			<div class="limiter">
				<div class="col">
					<div class="item">
						<a href="<?=SITE_DIR?>callback/" class="callback"><span class="icon"></span> <?=GetMessage("FOOTER_CALLBACK_LABEL")?></a>
					</div>
					<div class="item">
						<?$APPLICATION->IncludeFile(SITE_DIR."sect_footer_telephone.php", Array(), Array("MODE" => "text", "NAME" => GetMessage("SECT_FOOTER_TELEPHONE"), "TEMPLATE" => "sect_footer_telephone.php"));?>
					</div>
					<div class="item">
						<?$APPLICATION->IncludeFile(SITE_DIR."sect_footer_email.php", Array(), Array("MODE" => "text", "NAME" => GetMessage("SECT_FOOTER_EMAIL"), "TEMPLATE" => "sect_footer_email.php"));?>
					</div>
				</div>
			    <div class="col">
				    <div id="flushFooterCart">
					    <?$APPLICATION->IncludeComponent(
	"bitrix:sale.basket.basket.line", 
	"bottomCart", 
	array(
		"HIDE_ON_BASKET_PAGES" => "N",
		"PATH_TO_BASKET" => SITE_DIR."personal/cart/",
		"PATH_TO_ORDER" => SITE_DIR."personal/order/make/",
		"PATH_TO_PERSONAL" => SITE_DIR."personal/",
		"PATH_TO_PROFILE" => SITE_DIR."personal/",
		"PATH_TO_REGISTER" => SITE_DIR."login/",
		"POSITION_FIXED" => "N",
		"SHOW_AUTHOR" => "N",
		"SHOW_EMPTY_VALUES" => "Y",
		"SHOW_NUM_PRODUCTS" => "Y",
		"SHOW_PERSONAL_LINK" => "N",
		"SHOW_PRODUCTS" => "Y",
		"SHOW_TOTAL_PRICE" => "Y",
		"COMPONENT_TEMPLATE" => "bottomCart"
	),
	false
);?>
					</div>
				</div>
			</div>
		</div>
	</div>    
    <div id="overlap"></div>
    
	<?$APPLICATION->IncludeComponent(
		"bitrix:main.include",
		".default",
		array(
			"AREA_FILE_SHOW" => "sect",
			"AREA_FILE_SUFFIX" => "cart",
			"AREA_FILE_RECURSIVE" => "Y",
			"EDIT_TEMPLATE" => ""
		),
		false
	);?>

	<?$APPLICATION->IncludeComponent(
		"bitrix:main.include",
		".default",
		array(
			"AREA_FILE_SHOW" => "sect",
			"AREA_FILE_SUFFIX" => "fastbuy",
			"AREA_FILE_RECURSIVE" => "Y",
			"EDIT_TEMPLATE" => ""
		),
		false
	);?>

	<?$APPLICATION->IncludeComponent(
		"bitrix:main.include",
		".default",
		array(
			"AREA_FILE_SHOW" => "sect",
			"AREA_FILE_SUFFIX" => "requestPrice",
			"AREA_FILE_RECURSIVE" => "Y",
			"EDIT_TEMPLATE" => ""
		),
		false
	);?>

	<?$APPLICATION->IncludeComponent(
		"dresscode:catalog.product.subscribe.online", 
		".default", 
		array(
			"SITE_ID" => SITE_ID
		),
		false,
		array(
			"HIDE_ICONS" => "Y"
		)
	);?>

	<?$APPLICATION->IncludeComponent(
		"bitrix:main.include",
		".default",
		array(
			"AREA_FILE_SHOW" => "sect",
			"AREA_FILE_SUFFIX" => "landing",
			"AREA_FILE_RECURSIVE" => "Y",
			"EDIT_TEMPLATE" => ""
		),
		false
	);?>
	<?$APPLICATION->IncludeComponent(
	"dresscode:settings", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "360000"
	),
	false
);?>

	<div id="upButton">
		<a href="#"></a>
	</div>

<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   var z = null;m[i].l=1*new Date();
   for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
   k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(90169163, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true,
        ecommerce:"dataLayer"
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/90169163" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</body>
</html>