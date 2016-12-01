<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<style>
	.ui-widget-header {background:none !important;}
	.ui-widget-content {border:none !important;}
	.ui-tabs, .ui-tabs-panel {padding:0 !important;}
	.tabs_conteiner .ui-tabs-panel {width:100% !important;}
	.tabs_conteiner {border:none !important;}
</style>
<?
if (CSite::InDir('/nashi-raboty/index.php')){
        ?>


<div id="tabs-0" class="col-3 catalog-section">
<?
foreach($arResult["SECTIONS"] as $cell=>$arSection):
	$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
	$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));	
?>

	<div class="col-3-div">
		<div style="position:relative;display:inline-block;width:100%;">
			<div >

		</div>
		<div class="catalog_item_image effect2">
			<a href="<?=$arSection["SECTION_PAGE_URL"]?>"><img  class="lazy" src="/upload/preloader/preloader.gif" data-src="<?=$arSection['PICTURE']['SRC']?>" alt="<?=$arSection["NAME"]?>" width="100%" />
				<div class="catalogh"><h2><?=$arSection["NAME"]?></h2><?echo TruncateText($arSection["~DESCRIPTION"], 150);?></div>
			</a>
			</div></div>

	</div>
<?endforeach;?>
	</div>

	<div class="clear"></div>
<?
}
?>