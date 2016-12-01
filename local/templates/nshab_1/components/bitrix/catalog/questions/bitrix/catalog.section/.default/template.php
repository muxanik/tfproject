<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="catalog-section">
	<div class="catalog-section-descr"><?=$arResult["~DESCRIPTION"]?></div>
	<ul class="question_catalog">
<?foreach($arResult["ITEMS"] as $arItems):
		$this->AddEditAction($arItems['ID'], $arItems['EDIT_LINK'], CIBlock::GetArrayByID($arItems["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItems['ID'], $arItems['DELETE_LINK'], CIBlock::GetArrayByID($arItems["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));	
?>
		<li class="question_catalog_ul_li" id="<?=$this->GetEditAreaId($arItems['ID']);?>">
			<div class="question_catalog_item_conteiner">
				<div class="catalog_item_name"><a href="<?=$arItems["DETAIL_PAGE_URL"]?>"><?=$arItems["NAME"]?></a></div>
				<div class="question_catalog_item_desc"><?=$arItems["PROPERTIES"]["SHORTPREVIEW"]["~VALUE"]["TEXT"]?></div>
			</div>
		</li>	
<?endforeach;?>
	</ul>	
	<div class="clear"></div>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>