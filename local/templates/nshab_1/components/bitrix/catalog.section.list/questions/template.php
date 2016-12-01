<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="col-3 catalog-section">	
<?
foreach($arResult["SECTIONS"] as $cell=>$arSection):
	$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
	$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));	
?>

	<div class="col-3-div"> 
		<div class="catalog_item_conteiner">
			<div class="catalog_item_name" style="bottom:79% !important;">
				<a href="<?=$arSection["SECTION_PAGE_URL"]?>"><?=$arSection["NAME"]?></a>
			</div>
		</div>
		<div class="">
			<a href="<?=$arSection["SECTION_PAGE_URL"]?>"><img src="<?=$arSection['PICTURE_PREVIEW']['SRC']?>" alt="<?=$arSection["NAME"]?>" width="100%"/></a>
		</div>
		<div class="clear"></div>
		</div>
<?endforeach;?>
	</div>	
	<div class="clear"></div>

