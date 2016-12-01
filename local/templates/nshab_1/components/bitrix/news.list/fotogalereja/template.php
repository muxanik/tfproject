<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$APPLICATION->SetTitle($arResult["SECTION"]["PATH"][0]["NAME"]);
$APPLICATION->SetPageProperty("title", $arResult["SECTION"]["PATH"][0]["NAME"]);
$APPLICATION->SetPageProperty("keywords", $arResult["SECTION"]["PATH"][0]["UF_KEYWORDS"]);
$APPLICATION->SetPageProperty("description", $arResult["SECTION"]["PATH"][0]["DESCRIPTION"]);
?>
<p><?=$arResult["SECTION"]["PATH"][0]["~DESCRIPTION"];?></p>

<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/colorbox.css" type="text/css" />
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery.colorbox-min.js"></script>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/script.js"></script>

<div id="vlightbox1">
	<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<a id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="vlightbox1 colorbox_a" title="<?=$arItem["DETAIL_PICTURE"]["DESCRIPTION"]?>" href="<?=$arItem["DETAIL_PICTURE"]["SRC"]?>">
		<div class="foto1div">
			<? $pic = CFile::ResizeImageGet($arItem["DETAIL_PICTURE"]['ID'], array('width'=>160, 'height'=>120), BX_RESIZE_IMAGE_EXACT, true); ?>
			<img src="<?=$pic[src]?>" alt="<?=$arItem["PREVIEW_PICTURE"]["DESCRIPTION"]?>">
			<div class="foto_hover"><div class="foto_hover_img"></div></div>
		</div>
		<div class="foto_text"><?echo $arItem["NAME"]?></div>
	</a>
	<?endforeach;?>
</div>