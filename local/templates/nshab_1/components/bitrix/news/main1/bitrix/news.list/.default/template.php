<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="body_inner">
	<p>На данной странице представленны результаты работы <a href="/disk_kreator/">конфигуратора Thomi Felgen</a> по подбору цвета дисков на Ваш автомобиль.</p>
	</div>
<div class="col-2">

<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>

<div class="col-2-div ">
<div class="borderg effect2">
	<div class="col-1 minh">
			<a class="newst qw" href="<?=$arItem["DETAIL_PAGE_URL"]?>">
				<b><?echo $arItem["NAME"]?></b>
			</a>


	</div>
	<div class="col-1">
<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img class="lazy" src="/upload/preloader/preloader.gif" data-src="<?=$arItem['PICTURE_PREVIEW']['SRC']?>" width="100%" align="left" style="margin-right:10px; marker-offset:10px" alt="<?=$arItem["NAME"]?>"  title="<?=$arItem["NAME"]?>"><div class="newsh"><div class="ripplelink orange btn">Подробнее</div></div></a>
<br>
		<span class="datev"><i class="fa fa-eye"></i> <?=$arItem["SHOW_COUNTER"]?></span>

	</div>
</div>
</div>
<?endforeach;?>
</div>
<div class="news_pagenav">
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
