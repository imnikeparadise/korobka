<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$this->setFrameMode(true);?>
<?if(CModule::IncludeModule("currency")):?>
	<?if (!empty($arResult)):?>
		<div id="mainMenuStaticContainer">
			<div id="mainMenuContainer"<?if(!empty($_SESSION["TOP_MENU_FIXED"]) && $_SESSION["TOP_MENU_FIXED"] == "Y"):?> class="auto-fixed"<?endif;?>>
				<div class="limiter">
					<a href="<?=SITE_DIR?>catalog/" class="minCatalogButton" id="catalogSlideButton">
						<img src="<?=SITE_TEMPLATE_PATH?>/images/catalogButton.png" alt=""> <?=GetMessage("CATALOG_BUTTON_LABEL")?> 
					</a>
					<?if(count($arResult["ITEMS"]) > 3):?>
						<div id="menuCatalogSection">
							<div class="menuSection">
								<a href="<?=SITE_DIR?>sigarety/" class="catalogButton"><span class="catalogButtonImage"></span><b>Все сигареты</b></a>
								
							</div>
						</div>
					<?endif;?>
					<ul id="mainMenu">
						<?foreach($arResult["ITEMS"] as $nextElement):?>
							<li class="eChild">
								<a href="<?=$nextElement["LINK"]?>" class="menuLink<?if ($nextElement["SELECTED"]):?> selected<?endif?>">
									<?if(!empty($nextElement["PICTURE"])):?>
										<img src="<?=$nextElement["PICTURE"]["src"]?>" alt="<?=$nextElement["TEXT"]?>">
									<?endif;?>
									<?=$nextElement["TEXT"]?>
								</a>
								<?if(!empty($nextElement["ELEMENTS"])):?>
								<div class="drop"<?if(!empty($nextElement["BIG_PICTURE"])):?> style="background: url(<?=$nextElement["BIG_PICTURE"]["src"]?>) 50% 50% no-repeat #ffffff;"<?endif;?>>
									<div class="limiter">
										<?foreach($nextElement["ELEMENTS"] as $next2Column):?> 
											<?if(!empty($next2Column)):?>
												<ul class="nextColumn">
													<?foreach ($next2Column as $x2 => $next2Element):?>
														<li>
															<?if(!empty($next2Element["PICTURE"]["src"])):?>
																<a href="<?=$next2Element["LINK"]?>" class="menu2Link">
																	<img src="<?=$next2Element["PICTURE"]["src"]?>" alt="<?=$next2Element["TEXT"]?>">
																</a>
															<?endif;?>
															<a href="<?=$next2Element["LINK"]?>" class="menu2Link<?if ($next2Element["SELECTED"]):?> selected<?endif?>">
																<?=$next2Element["TEXT"]?>
															</a>
															<?if(!empty($next2Element["ELEMENTS"])):?>
																<ul>
																	<?foreach ($next2Element["ELEMENTS"] as $x3 => $next3Element):?>
																		<li>
																			<a href="<?=$next3Element["LINK"]?>" class="menu2Link<?if ($next3Element["SELECTED"]):?> selected<?endif?>">
																				<?=$next3Element["TEXT"]?>
																			</a>
																		</li>
																	<?endforeach;?>
																</ul>
															<?endif;?>												
														</li>
													<?endforeach;?>
												</ul>
											<?endif;?>
										<?endforeach;?>
									</div>
								</div>
								<?endif;?>
							</li>
						<?endforeach;?>
					</ul>
				</div>
			</div>
		</div>
	<?endif;?>
<?endif;?>