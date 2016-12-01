<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?><div class="question_list">
<!-- Slider main container -->
<div class="swiper-container slider_otz">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
        <!-- Slides -->

<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

	?>

	<div class="swiper-slide">	
<div class="col-2">
<div class="col-2-div">
		<?if (is_array($arItem["PROPERTIES"]["NRAB"]["VALUE"])):?>



					<?$res1 = CIBlockElement::GetList(
						Array(),
						Array("ID" => $arItem["PROPERTIES"]["NRAB"]["VALUE"]),
						false,
						array(),
						array("DETAIL_PAGE_URL", "DETAIL_PICTURE","PROPERTY_IMAGES")
					);?>

					<?if ($ar_fields = $res1->GetNext()):?>

<div class="col-2">
<a href="<?=$ar_fields["DETAIL_PAGE_URL"]?>">
	<div style="width:50%;float:left;padding-right:5px;">
				<div style="background: url(<?=CFile::GetPath($ar_fields["PROPERTY_IMAGES_VALUE"]);?>);background-position: center;height: 220px;background-size:cover;">
					<div style="float:right;background: rgba(255, 255, 255, 0.78);width: 50%;text-align: center;font-size: 25px;line-height: 28px;"><div style="position: relative;">До</div></div></div>
	</div>
	<div style="width:50%;float:left;padding-left:5px;">
				<div style="background: url(<?=CFile::GetPath($ar_fields["DETAIL_PICTURE"]);?>);background-position: center;height: 220px;background-size:cover;">
					<div style="float:right;background: rgba(255, 255, 255, 0.78);width: 50%;text-align: center;font-size: 25px;line-height: 28px;"><div style="position: relative;">После</div></div></div>
	</div>
</a>
	</div>
					<?endif;?>

			<div class="cls">
			</div>
		<?endif;?>
	</div>
<div class="col-2-div">
<div class="faq" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<div class="cover">

			<div class="">
				<div style="position:relative;line-height:19px;"><i class="fa fa-quote-left"></i>
					<?if(strlen($arItem['PROPERTIES']['OTZYV']['VALUE']['TEXT']) < 1):?><?=substr($arItem['~PREVIEW_TEXT'],0,350);?><?if(strlen($arItem['~PREVIEW_TEXT'])>350):?>...<?endif;?><?else:?><?=htmlspecialcharsBack($arItem['PROPERTIES']['OTZYV']['VALUE']['TEXT'])?><?endif;?>
				<i class="fa fa-quote-right"></i></div>

				<p style="color: #cc181e;font-weight:800"><?=$arItem['PROPERTIES']['NAME']['VALUE']?> | <?echo $arItem["DISPLAY_ACTIVE_FROM"]?></p>
			</div>
			</div>
		</div></div>
		<div class="cls">
		</div></div></div>

<?endforeach;?>
</div>
    <!-- If we need navigation buttons -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</div>

<div style="text-align:center"><a class="ripplelink orange btn" href="/otzyvy/">Читать полностью</a></div>