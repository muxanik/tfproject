<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if(!empty($arResult["SECTIONS"]) or $arResult["SECTION"]["DEPTH_LEVEL"] == "1"):?>
<?if($arResult["SECTION"]["DEPTH_LEVEL"] != "1"):?><div class="col-3 catalog-section"><?endif;?>

<?
foreach($arResult["SECTIONS"] as $cell=>$arSection):
	$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
	$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));	
?>


	<div class="col-3-div">
		<div style="position:relative;">

		<div class="catalog_item_image effect2">
			<a href="<?=str_replace("/services", "", $arSection["SECTION_PAGE_URL"])?>"><img src="<?=$arSection['PICTURE_PREVIEW']['SRC']?>" alt="<?=$arSection["NAME"]?>" width="100%" />
				<div class="catalogh"><h2><?=$arSection["NAME"]?></h2><?echo $arSection["~DESCRIPTION"];?></div>
			</a>
			</div></div>
		<div class="clear"></div>
	</div>

<?endforeach;?>
<?if($arResult["SECTION"]["DEPTH_LEVEL"] != "1"):?></div><?endif;?>
	<div class="clear"></div>
<?endif;?>
