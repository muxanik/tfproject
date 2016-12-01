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
?>
<div style="text-align:center;"><a href="#otzyv" class="btn">Оставить отзыв</a></div>
<div class="question_list">

<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

	?>
<div class="body_inner">
	<div class="faq" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<div class="cover">
			<div class="qw_answer-detail">
				<div class="faq_ascs">
					Отзыв от: <?=$arItem['PROPERTIES']['NAME']['VALUE']?> | Дата:<?echo $arItem["DISPLAY_ACTIVE_FROM"]?>
					<div class="cls">
					</div>
				</div>
			</div>
			<div class="faq_qwestion2">
				<div style="padding:25px;position:relative;"><i class="fa fa-quote-left"></i>
					<?if(strlen($arItem['PROPERTIES']['OTZYV']['VALUE']['TEXT']) < 1):?><?=$arItem['~PREVIEW_TEXT'];?><?else:?><?=htmlspecialcharsBack($arItem['PROPERTIES']['OTZYV']['VALUE']['TEXT'])?><?endif;?>
				<i class="fa fa-quote-right"></i></div>
		<?if (is_array($arItem["PROPERTIES"]["NRAB"]["VALUE"])):?>


				<?foreach($arItem["PROPERTIES"]["NRAB"]["VALUE"] as $rabID):?>
					<?$res1 = CIBlockElement::GetList(
						Array(),
						Array("ID" => $rabID),
						false,
						array(),
						array("DETAIL_PAGE_URL", "DETAIL_PICTURE")
					);?>

					<?if ($ar_fields = $res1->GetNext()):?>



				<div style="background: url(<?=CFile::GetPath($ar_fields["DETAIL_PICTURE"]);?>);background-position: center;height: 95px;background-size:cover;<?if(count($arItem["PROPERTIES"]["NRAB"]["VALUE"]) > 1):?>width:50%;float:left;<?else:?><?endif;?>">
					<div style="float:right;background: rgba(255, 255, 255, 0.78);width: 50%;text-align: center;height: 100%;font-size: 25px;line-height: 28px;"><div style="<?if(count($arItem["PROPERTIES"]["NRAB"]["VALUE"]) > 1):?>top: 22%;<?else:?>top: 30%;<?endif;?>position: relative;"><a href="<?=$ar_fields["DETAIL_PAGE_URL"]?>">Смотреть работу</a></div></div></div>
					<?endif;?>
				<?endforeach;?>
			<div class="cls">
			</div>
		<?endif;?>
				<span class="testimonials-arraw"></span>
			</div>
			</div>
		<div class="cover">
			<div class="qw_cover-wrapper">
				<div class="faq_ansver">
					<div>
						<?if(strlen($arItem['PROPERTIES']['OANSWER']['VALUE']['TEXT']) < 1):?><?=$arItem['~DETAIL_TEXT'];?><?else:?><?=htmlspecialcharsBack($arItem['PROPERTIES']['OANSWER']['VALUE']['TEXT'])?><?endif;?>
					</div>
				</div>
				<div class="cls">
				</div>
			</div>
			<div class="name_person">
				Thomi Felgen
			</div>
			<div class="cls">
			</div>
		</div>
		<div class="cls">
			</div></div>
</div>
	
<?endforeach;?>
</div>
<div class="news_pagenav">
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>

