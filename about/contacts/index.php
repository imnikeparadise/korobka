<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Наши контакты - KorobkaSigaret - сигареты оптом и в розницу в Москве, СПБ по выгодным ценам");
$APPLICATION->SetPageProperty("description", "Наши контакты - Интернет-магазин KorobkaSigaret - сигареты оптом и в розницу по всей России и по выгодным ценам. ✓ Оригинал ✓ Поставки от производителя ✓ Скидки за объём");
$APPLICATION->SetTitle("Задайте вопрос");
?><h1>Контактная информация</h1>
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
<ul class="contactList">
	<li>
	<table>
	<tbody>
	<tr>
		<td>
 <img alt="cont1.png" src="/local/templates/dresscodeV2/images/cont1.png" title="cont1.png">
		</td>
		<td>
			 Телеграм <b><a href="https://t.me/Sany4_opt" class="cButton" target="_blank">@Sany4_opt</a></b> <br>
		</td>
	</tr>
	</tbody>
	</table>
 </li>
	<li>
	<table>
	<tbody>
	<tr>
		<td>
 <img alt="cont1.png" src="/local/templates/dresscodeV2/images/cont1.png" title="cont1.png">
		</td>
		<td>
			 WhatsApp: <b><a href="https://wa.me/79132784726" id="wa__toggle">+79132784726</a></b> <br>
		</td>
	</tr>
	</tbody>
	</table>
 </li>
	<li>
	<table>
	<tbody>
	<tr>
		<td>
 <img alt="cont2.png" src="/local/templates/dresscodeV2/images/cont2.png" title="cont2.png">
		</td>
		<td>
 <a href="mailto:sigaretymsk5@gmail.com">sigaretymsk5@gmail.com</a>
		</td>
	</tr>
	</tbody>
	</table>
 </li>
</ul>
 <br>
 <br>
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
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php")?>