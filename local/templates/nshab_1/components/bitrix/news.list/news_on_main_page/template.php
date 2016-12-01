<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="news_main_page_main">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>			 
<div class="col-2_3 borderg effect2">
	<div class="col-2_3-2-div">

			<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img src="<?=$arItem['PICTURE_PREVIEW']['SRC']?>" width="100%" align="left" style="margin-right:10px; marker-offset:10px" alt="<?=$arItem["NAME"]?>"  title="<?=$arItem["NAME"]?>"><div class="newsh"><div class="ripplelink orange btn">Подробнее</div></div></a>
		
	</div>
	<div class="col-2_3-1-div">
			<a class="newst qw" href="<?=$arItem["DETAIL_PAGE_URL"]?>">
				<b><?echo $arItem["NAME"]?></b>
			</a><br>
		<span class="datev">от <?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span>


		<p><?echo $arItem["PREVIEW_TEXT"];?></p>
	</div>
</div>
<div class="clear"></div>

<?endforeach;?>													
</div>