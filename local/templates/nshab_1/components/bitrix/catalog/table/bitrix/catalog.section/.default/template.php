<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="catalog-section">
<?if ($APPLICATION->GetCurPage(false) == SITE_DIR."services/nashi_ceni/"){?>

<?$APPLICATION->IncludeComponent(
	"bitrix:news", 
	"price", 
	array(
		"IBLOCK_TYPE" => "products",
		"IBLOCK_ID" => "25",
		"NEWS_COUNT" => "40",
		"USE_SEARCH" => "N",
		"USE_RSS" => "N",
		"USE_RATING" => "N",
		"USE_CATEGORIES" => "N",
		"USE_FILTER" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"CHECK_DATES" => "Y",
		"SEF_MODE" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"ADD_ELEMENT_CHAIN" => "N",
		"USE_PERMISSIONS" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_PICTURE" => "N",
		"DISPLAY_PREVIEW_TEXT" => "N",
		"USE_SHARE" => "N",
		"PREVIEW_TRUNCATE_LEN" => "",
		"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"LIST_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"LIST_PROPERTY_CODE" => array(
			0 => "AKCIYA",
			1 => "TABDESC",
			2 => "MOTODISK",
			3 => "NEDISK",
			4 => "HEADER1",
			5 => "RADIUS",
			6 => "PRICE",
			7 => "",
		),
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"DISPLAY_NAME" => "Y",
		"META_KEYWORDS" => "-",
		"META_DESCRIPTION" => "-",
		"BROWSER_TITLE" => "-",
		"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"DETAIL_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"DETAIL_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"DETAIL_DISPLAY_TOP_PAGER" => "N",
		"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
		"DETAIL_PAGER_TITLE" => "Страница",
		"DETAIL_PAGER_TEMPLATE" => "",
		"DETAIL_PAGER_SHOW_ALL" => "Y",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"SEF_FOLDER" => "/services/",
		"AJAX_OPTION_ADDITIONAL" => "",
		"SEF_URL_TEMPLATES" => array(
			"news" => "/services/nashi_ceni/",
			"section" => "/#SECTION_CODE#/",
			"detail" => "/#SECTION_CODE#/#ELEMENT_CODE#/",
		)
	),
	false
);?>

<?}?>

	<div class="catalog-section-descr"><?=$arResult["~DESCRIPTION"]?></div>
<div class="col-3">
<?foreach($arResult["ITEMS"] as $arItems):
		$this->AddEditAction($arItems['ID'], $arItems['EDIT_LINK'], CIBlock::GetArrayByID($arItems["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItems['ID'], $arItems['DELETE_LINK'], CIBlock::GetArrayByID($arItems["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));	
?>
		<div class="col-3-div">
		<div style="position:relative;">
<div style="position:absolute;background: rgba(0, 0, 0, 0.59);width: 100%;height: 20%;overflow: hidden;text-align: center;bottom: 0;">
	<div class="catalog_item_name" style="padding:10px 10px 0 10px;height:auto;">

				</div>
			</div>
			<div class="catalog_item_image effect2">
				<a href="<?=$arItems["DETAIL_PAGE_URL"]?>"><img width="100%" src="<?=$arItems['PICTURE_PREVIEW']['SRC']?>" alt="<?=$arItems["NAME"]?>">
					<div class="catalogh"><h2><?=$arItems["NAME"]?></h2><?echo $arItems["~PREVIEW_TEXT"];?></div>
				</a>	
			</div></div>
			<div class="clear"></div>
		</div>	
<?endforeach;?>
	</div>	
	<div class="clear"></div>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
