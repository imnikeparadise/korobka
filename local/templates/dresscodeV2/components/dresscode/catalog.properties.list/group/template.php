<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?$this->setFrameMode(true);?>
<?if(!empty($arResult["PUBLIC_GROUPS"]) || !empty($arResult["ANONYMOUS_PROPERTIES"])):?>
    <div id="elementProperties">
        <span class="heading"><?=GetMessage("SPECS")?></span>
        <table class="stats">
            <tbody>
            <?foreach($arResult["PUBLIC_GROUPS"] as $arGroup):?>
                <?if(!empty($arGroup["NAME"]) && !empty($arGroup["PROPERTIES"])):?>
                    <tr class="cap">
                        <td colspan="2"><?=$arGroup["NAME"]?></td>
                        <td class="right"></td>
                    </tr>
                    <?$iteration = 1; //inc var for zebra table?>
                    <?foreach($arGroup["PROPERTIES"] as $nextProperty):?>
                        <?if(!empty($nextProperty["VALUE"]) && gettype($nextProperty["VALUE"]) == "array"){$nextProperty["VALUE"] = implode(" / ", $nextProperty["VALUE"]); $nextProperty["FILTRABLE"] = false;}?>
                        <tr<?if($iteration % 2):?> class="gray"<?endif;?>>
                            <td class="name"><span><?=$nextProperty["NAME"]?></span><?if(!empty($nextProperty["HINT"])):?><a href="#" class="question" title="<?=$nextProperty["HINT"]?>" data-description="<?=$nextProperty["HINT"]?>"></a><?endif;?></td>
                            <td><?=$nextProperty["DISPLAY_VALUE"]?></td>
                            <td class="right"><?if($nextProperty["FILTRABLE"] =="Y" && !is_array($nextProperty["VALUE"]) && !empty($nextProperty["VALUE_ENUM_ID"]) && !empty($arResult["LAST_SECTION"])):?><a href="<?=$arResult["LAST_SECTION"]["SECTION_PAGE_URL"]?>?arrFilter_<?=$nextProperty["ID"]?>_<?=abs(crc32($nextProperty["VALUE_ENUM_ID"]))?>=Y&amp;set_filter=Y" class="analog"><?=GetMessage("OTHERITEMS")?></a><?endif;?></td>
                        </tr>
                        <?$iteration++;?>
                    <?endforeach;?>
                <?endif;?>
            <?endforeach;?>
            <?if(!empty($arResult["ANONYMOUS_PROPERTIES"])):?>
                <?$iteration = 1; //inc var for zebra table?>
                <tr class="cap">
                    <td colspan="3"><?=GetMessage("CHARACTERISTICS")?></td>
                </tr>
                <?foreach($arResult["ANONYMOUS_PROPERTIES"] as $nextProperty):?>
                    <tr<?if($iteration % 2 ):?> class="gray"<?endif;?>>
                        <td class="name"><span><?=$nextProperty["NAME"]?></span><?if(!empty($nextProperty["HINT"])):?><a href="#" class="question" title="<?=$nextProperty["HINT"]?>" data-description="<?=$nextProperty["HINT"]?>"></a><?endif;?></td>
                        <td><?=$nextProperty["DISPLAY_VALUE"]?></td>
                        <td class="right">
                            <?if($nextProperty["FILTRABLE"] =="Y" && !is_array($nextProperty["VALUE"]) && !empty($nextProperty["VALUE_ENUM_ID"]) && !empty($arResult["LAST_SECTION"])):?>
                                <a href="<?=$arResult["LAST_SECTION"]["SECTION_PAGE_URL"]?>?arrFilter_<?=$nextProperty["ID"]?>_<?=abs(crc32($nextProperty["VALUE_ENUM_ID"]))?>=Y&amp;set_filter=Y" class="analog"><?=GetMessage("OTHERITEMS")?></a>
                            <?endif;?>
                        </td>
                    </tr>
                    <?$iteration++?>
                <?endforeach;?>
            <?endif;?>
            </tbody>
        </table>
    </div>
<?endif;?>