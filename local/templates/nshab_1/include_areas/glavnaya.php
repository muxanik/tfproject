<div class="body_inner">
<div class="title_h2"><h2>Видео</h2></div>   

<div class="col-2">
    <div class="col-2-div"><div class="youtube" id="SG9fg2_X5Ac" style="width: 100%; height: 315px;" data-params="rel=0"></div></div>
    <div class="col-2-div"><div class="youtube" id="EI1nAUzM6jg" style="width: 100%; height: 315px;" data-params="rel=0"></div></div>
</div>	
</div>
<div class="body_inner">	
<br><div class="title_h2"><h2>Новости компании</h2></div>
	
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"news_on_main_page",
	Array(
		"IBLOCK_TYPE" => "news",
		"IBLOCK_ID" => "29",
		"NEWS_COUNT" => "2",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(0=>"",1=>"",),
		"PROPERTY_CODE" => array(0=>"",1=>"",),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
"LIST_FIELD_CODE" => array(0=>"SHOW_COUNTER",1=>"",),
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "Y",
		"PAGER_TEMPLATE" => "",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"AJAX_OPTION_ADDITIONAL" => "",
		"SET_BROWSER_TITLE" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_META_DESCRIPTION" => "Y"
	)
);?>
</div>
<div class="body_inner">
<div class="title_h2"><h2>Новости отрасли</h2></div>

<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"news_on_main_page",
	Array(
		"IBLOCK_TYPE" => "news",
		"IBLOCK_ID" => "1",
		"NEWS_COUNT" => "2",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(0=>"",1=>"",),
		"PROPERTY_CODE" => array(0=>"",1=>"",),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
"LIST_FIELD_CODE" => array(0=>"SHOW_COUNTER",1=>"",),
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "Y",
		"PAGER_TEMPLATE" => "",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"AJAX_OPTION_ADDITIONAL" => "",
		"SET_BROWSER_TITLE" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_META_DESCRIPTION" => "Y"
	)
);?>
</div>
<div class="body_inner">
<?$APPLICATION->IncludeFile(
	  SITE_TEMPLATE_PATH."/include_areas/tuning_diskov.php",
	  Array(), //переменные
	  Array(
	      "MODE" => "html",                     
	      "NAME" => "Редактирование"     
	    )
	);?>
</div>

<?$APPLICATION->IncludeComponent(
	"drint:schema", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"SHOW" => "Y",
		"TYPE" => "org",
		"NAME" => "Thomi Felgen",
		"POST_CODE" => "",
		"COUNTRY" => "Россия",
		"REGION" => "Центральный",
		"LOCALITY" => "Москва",
		"ADDRESS" => "ул. Барышиха, д. 55, корп. 2",
		"PHONE" => array(
			0 => "+7 (495) 979-20-01",
			1 => "",
		),
		"FAX" => "",
		"EMAIL" => array(
			0 => "info@thomifelgen.ru",
			1 => "",
		)
	),
	false
);?>