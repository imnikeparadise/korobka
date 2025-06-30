<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Переписки с клиентами - KorobkaSigaret - сигареты оптом и в розницу в Москве, СПБ по выгодным ценам");
$APPLICATION->SetPageProperty("description", "Переписки - Интернет-магазин KorobkaSigaret - сигареты оптом и в розницу по всей России и по выгодным ценам. ✓ Оригинал ✓ Поставки от производителя ✓ Скидки за объём");
$APPLICATION->SetTitle("Гарантия");
?><h1>Переписки в телеге</h1>
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
		<div class="bx_page">
			 Вы можете смело писать менеджеру в <a title="Ссылка на телеграм по продаже оптовых сигарет оптом" target="_blank" href="https://t.me/Sany4_opt"> Телеграм @Sany4_opt</a> или <a href="https://wa.me/79132784726">Whatsapp +79132784726</a>. Конфиденциальность гарантируем! Мы следим за безопасностью (VPN, телефоны запаролены и зашифрованы, регулярные чистки чатов, держим контакт с ТК)<br>
			<h3 class="bold">Ниже несколько скринов чатов с клиентами:</h3>
			<ul>
				<li>Переписка 1</li>
				<li><img width="378" alt="Купить сигареты оптом - переписка с клиентом 1" src="/upload/medialibrary/ac1/769zsitzqulsyvgfz0fuhrsn0x62jc6g.jpg" height="1024" title="01_bystryj_klient2_po_rekomend.jpg"><br>
 </li>
				<li>Переписка 2</li>
				<li><img width="267" alt="Купить сигареты оптом - переписка с клиентом 2" src="/upload/medialibrary/488/kzj88zkp2sfqk69p7pt4aafhsyzdax5z.jpg" height="1024" title="02_novyi-s-voprosami2.jpg"><br>
 </li>
				<li>Переписка 3</li>
				<li><img width="183" alt="Купить сигареты оптом - переписка с клиентом 3" src="/upload/medialibrary/8ce/9qe23cotbtq7no7j4qzsowipm8ccrs1p.jpg" height="1024" title="03_bystryj_klient_4etko.jpg"><br>
 </li>
			</ul>
			<p>
				 Делайте заказ на сайте или сразу пишите менеджеру в <a title="Ссылка на телеграм по продаже оптовых сигарет оптом" target="_blank" href="https://t.me/Sany4_opt"> Телеграм @Sany4_opt</a> или <a href="https://wa.me/79132784726">Whatsapp +79132784726</a>. До скорых встреч и скорых поставок!
			</p>
		</div>
	</div>
	<div class="global-information-block">
		 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	".default",
	Array(
		"AREA_FILE_RECURSIVE" => "Y",
		"AREA_FILE_SHOW" => "sect",
		"AREA_FILE_SUFFIX" => "information_block",
		"COMPONENT_TEMPLATE" => ".default",
		"EDIT_TEMPLATE" => ""
	)
);?>
	</div>
</div>
 <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>