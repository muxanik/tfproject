<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?IncludeTemplateLangFile(__FILE__);?>
<?$page = $APPLICATION->GetCurPage(false);
  $firstpage = ($page == '/') ? true : false;
?>
<!DOCTYPE html>
<html lang="ru" prefix="og: http://ogp.me/ns#">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="google-site-verification" content="UoIgDENibxurgbo5X421YAa5ZTPYkOHrhBJF-EHRiEM" />
<meta name='yandex-verification' content='7d23bd79aa6a010a' />
<link rel="shortcut icon" type="image/x-icon" href="<?=SITE_TEMPLATE_PATH?>/favicon.ico" />
<title><?$APPLICATION->ShowTitle()?></title>
<?

	$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/css/swiper.min.css');
if(!$firstpage){
	$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/css/mb-comingsoon.min.css');
	$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/css/owl.carousel.css');
	$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/css/owl.theme.default.css');
}

	$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/css/jquery-ui/jquery-ui.min.css');
	$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/css/jquery.mmenu.all.css');
	$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/fonts/font-awesome/css/font-awesome.min.css');
	$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/jquery/jquery.min.js');
	$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/jquery.mmenu.min.all.js');
	$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/jquery/jquery-ui.min.js');
	$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/script.js');
if(!$firstpage){
	$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH .'/js/jquery.mb-comingsoon.min.js');
	$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/jquery.responsive_countdown.min.js');
}
	$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/owl.carousel.min.js');

	$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/swiper.jquery.min.js');
	$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/swiper.min.js');

?>
  
<style>.clrNoIndex, .clrNoIndex * { color: rgb(0, 0, 0) !important;background-color: rgb(218, 165, 32) !important;} .open_link {background-color:#ff0000;color:#ffffff;}</style>

<?$APPLICATION->ShowHead();?>


</head>
<body>
	<div id="panel"><?$APPLICATION->ShowPanel();?></div>
	<div id="page-wrapper">
		<div class="top_bar">
					<?$APPLICATION->IncludeFile(
						SITE_TEMPLATE_PATH."/include_areas/atention.php",
						Array(), //переменные
						Array(
						"MODE" => "html",                                  // будет редактировать в веб-редакторе
						"NAME" => "Редактирование"      // имя шаблона для нового файла
						)
					);?>
				</div>
		<div class="header1">
			<div class="inner">
			<?if($APPLICATION->GetCurPage() == "/index.php"): ?><?else:?>
			<div class="textwa"></div>
<?endif;?>
			<div id="page" class="header_inner">
				<div class="gamburger"><a href="#menu"><span class="menug"></span></a></div>
				<div class="logo">
					<?$APPLICATION->IncludeFile(
						SITE_TEMPLATE_PATH."/include_areas/logo.php",
						Array(), //переменные
						Array(
						"MODE" => "html",                                  // будет редактировать в веб-редакторе
						"NAME" => "Редактирование"      // имя шаблона для нового файла
						)
					);?>
				</div>

				<div class="top_contacts">
								<div class="col2_right_alerts">
<?$APPLICATION->IncludeFile(
	SITE_TEMPLATE_PATH."/include_areas/alerts.php",
	Array(), //переменные
	Array(
	"MODE" => "html",                                  // будет редактировать в веб-редакторе
	"NAME" => "Редактирование"      // имя шаблона для нового файла
	)
);?> 
								</div>
					<div class="top_contacts_callback">

<?$APPLICATION->IncludeComponent(
	"bitrix:search.form", 
	"search", 
	array(
		"PAGE" => "#SITE_DIR#search/index.php"
	),
	false
);?>
					</div>
					<div class="top_contacts_div top_contacts_number red_color">
						<?$APPLICATION->IncludeFile(
							SITE_TEMPLATE_PATH."/include_areas/header_phone.php",
							Array(), //переменные
							Array(
							"MODE" => "html",                                  // будет редактировать в веб-редакторе
							"NAME" => "Редактирование"      // имя шаблона для нового файла
							)
						);?>
					</div>
				</div>

<nav id="main-menu">
					<?$APPLICATION->IncludeComponent("bitrix:menu", "top", Array(
						"ROOT_MENU_TYPE" => "top",  // Тип меню для первого уровня
						"MENU_CACHE_TYPE" => "N", // Тип кеширования
						"MENU_CACHE_TIME" => "3600",  // Время кеширования (сек.)
						"MENU_CACHE_USE_GROUPS" => "Y", // Учитывать права доступа
						"MENU_CACHE_GET_VARS" => "",  // Значимые переменные запроса
						"MAX_LEVEL" => "1", // Уровень вложенности меню
						"CHILD_MENU_TYPE" => "left",  // Тип меню для остальных уровней
						"USE_EXT" => "N", // Подключать файлы с именами вида .тип_меню.menu_ext.php
						"DELAY" => "N", // Откладывать выполнение шаблона меню
						"ALLOW_MULTI_SELECT" => "N",  // Разрешить несколько активных пунктов одновременно
						),
						false
													);?>
			</nav>

					
				<div class="clear"></div>
			</div>
		</div></div>
		<div id="header_menu_trigger"></div>
		<div class="clear"></div>
		<div class="middle">
			<div class="middle_inner">
            
	
<?require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/php_interface/include/Mobile_Detect.php"); // Подключаем скрипт Mobile_Detect.php
 
$detect = new Mobile_Detect; // Инициализируем копию класса
 
// Любое мобильное устройство (телефоны или планшеты).
if ( $detect->isMobile() ):?> 
				<?else:?>
							<div class="col2_left">
<div class="left_s">
<div class="col2_left_inner">							
								<ul id="vertical-multilevel-menu">

									<li><a href="/services/" class="root-item">Услуги</a>
							
<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"vertical_multilevel_services", 
	array(
		"ROOT_MENU_TYPE" => "left",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MAX_LEVEL" => "4",
		"CHILD_MENU_TYPE" => "",
		"USE_EXT" => "Y",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N",
		"COMPONENT_TEMPLATE" => "vertical_multilevel_services"
	),
	false
);?>

									</div>
									</li>

				</ul>
<div class="col2_left_inner">
<ul id="vertical-multilevel-menu">
<li><a href="/fotogalereja/" class="root-item">Наши работы</a>

<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"vertical_multilevel_photo", 
	array(
		"ROOT_MENU_TYPE" => "left_photo",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_TIME" => "36000",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MAX_LEVEL" => "4",
		"CHILD_MENU_TYPE" => "",
		"USE_EXT" => "Y",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N"
	),
	false
);?>

										</li>
	</ul>
	</div>
	<div class="col2_left_inner">
		<div class="header_left_banner" style="margin:0;">
			<a href="/products-thomi-felgen/">Продукция Thomi Felgen</a>
		</div>
	</div>

	<div class="col2_left_inner">
		<div class="header_left_banner" style="margin:0;"><a href="/disk_kreator/">Примерка цвета дисков онлайн</a></div>
	</div>

<div class="col2_left_inner2">
								<div class="left_banner"><img src="/upload/medialibrary/bdd/banner_logo.jpg" width="100%" alt="Подбери цвет дисков для своего автомобиля"></div>
								</div>

<div class="col2_left_inner2">
								<div class="left_banner"><a href="/disk_kreator/"><img src="<?=SITE_TEMPLATE_PATH?>/img/banner1.gif" width="100%" alt="Подбери цвет дисков для своего автомобиля"></a></div>
								</div>
<div class="col2_left_inner2">
								<div class="left_banner"><a href="/calculator/"><img src="/upload/medialibrary/7a4/banner-kalkulyatora.jpg" width="100%" alt="Калькулятор стоимости работ"></a></div>
								</div>


<div class="col2_left_inner">
<div class="left_banner">
<?$APPLICATION->IncludeComponent(
	"itua:instagram.photo", 
	"template1", 
	array(
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "N",
		"INCLUDE_JQUERY" => "Y",
		"INSTAGRAM_NAME" => "thomifelgen",
		"NEWS_COUNT" => "10",
		"PHOTO_QUALITY" => "60",
		"PHOTO_SIZE" => "300",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"COMPONENT_TEMPLATE" => "template1"
	),
	false
);?>
									</div>
								</div>

</div>
<div class="col2_left_inner insta">
	<div class="left_banner">

		<div class="header_left_banner">Подписаться</div>
<?$APPLICATION->IncludeComponent(
	"asd:subscribe.quick.form", 
	"subscribe", 
	array(
		"COMPONENT_TEMPLATE" => "subscribe",
		"RUBRICS" => array(
			0 => "1",
		),
		"SHOW_RUBRICS" => "N",
		"INC_JQUERY" => "N",
		"NOT_CONFIRM" => "Y",
		"FORMAT" => "text"
	),
	false
);?>
									</div>
									</div>
</div>
<?endif;?>

							<div class="col2_right">

								
<?if($APPLICATION->GetCurPage() == "/index.php"):?>      
<?$APPLICATION->IncludeFile(
	SITE_TEMPLATE_PATH."/include_areas/banners/slider_our_advantages.php",
	Array(), //переменные
	Array(
	"MODE" => "html",                                  // будет редактировать в веб-редакторе
	"NAME" => "Редактирование"      // имя шаблона для нового файла
	)
);?> 	

<?$APPLICATION->IncludeFile(
	SITE_TEMPLATE_PATH."/include_areas/banners/slider_our_works.php",
	Array(), //переменные
	Array(
	"MODE" => "html",                                  // будет редактировать в веб-редакторе
	"NAME" => "Редактирование"      // имя шаблона для нового файла
	)
);?>
<?endif;?>  
	
<?if($APPLICATION->GetCurPage() != "/index.php"):?>
<div class="title_inner">
									<div class="breadcrumb">
<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", ".default", array(
	"START_FROM" => "0",
	"PATH" => "",
	"SITE_ID" => "s1"
	),
	false
);?>
									</div>
									<div class="title_h1"><h1><?$APPLICATION->ShowTitle(false)?></h1></div>
			</div>
<?endif;?>