<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Доставка - условия и варианты - KorobkaSigaret - сигареты оптом и в розницу в Москве, СПБ по выгодным ценам");
$APPLICATION->SetPageProperty("description", "Интернет-магазин KorobkaSigaret - сигареты оптом и в розницу по всей России и по выгодным ценам. ✓ Оригинал ✓ Поставки от производителя ✓ Скидки за объём");
$APPLICATION->SetTitle("Доставка");
?><h1>Доставка</h1>
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
		<p style="border: 0px solid #d9d9e3; color: #000;">
			 Предлагаем доставку через различные транспортные компании по всей территории Российской Федерации.
		</p>
		<p style="border: 0px solid #d9d9e3; color: #000;">
			 1️⃣ Отправка транспортной компанией 🚛
		</p>
		<ol style="border: 0px solid #d9d9e3; color: #000;">
			 Вы размещаете заказ на нашем сайте или связываетесь с нашим менеджером через телеграм <a href="https://t.me/sany4_opt" title="Ссылка на телеграм по продаже оптовых сигарет" target="_blank" rel="noopener">
	@Sany4_opt</a> или другой мессенджер (viber/whatsapp).<br>
			 Мы связываемся с вами для подтверждения заказа и передаем его на сборку комплектовщику. После упаковки товар отправляется в транспортную компанию. Время доставки от 2 до 7 дней в зависимости от вашего региона. Мы отправляем товары из разных городов России, с основными складами в г. Москва. Расходы на доставку транспортной компании оплачиваются вами, примерно $2-3 за коробку при заказе 5 коробок, в зависимости от веса, объема и вашего города.<br>
			 Оплата осуществляется путем перевода на банковскую карту Сбербанка, Тинькофф или через QR-код Тинькофф. Также можно подключить Pay Мир.<br>
		</ol>
		<p style="border: 0px solid #d9d9e3; color: #000;">
			 ❗️Обратите внимание, что максимальное количество коробок для одной сделки через транспортную компанию составляет 30.
		</p>
		<p style="border: 0px solid #d9d9e3; color: #000;">
			 2️⃣ Самовывоз из Москвы 🏬
		</p>
		<ol style="border: 0px solid #d9d9e3; color: #000;">
			 Раз в неделю осуществляется самовывоз из Москвы.<br>
			 Этот вариант доступен только для постоянных клиентов, с которыми уже установили рабочие отношения.<br>
			 При заказе от 20 коробок предоставляем сниженные цены за объем. Все детали обсуждаются в переписке.<br>
		</ol>
		<p style="border: 0px solid #d9d9e3; color: #000;">
			 Мы готовы предложить удобные варианты доставки, чтобы удовлетворить потребности всех наших клиентов. Свяжитесь с нами, и мы поможем с выбором оптимального способа доставки для вашего заказа.
		</p>
 <br>
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
 <br>
 <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>