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
<div class="news-list">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<div class="body_inner">
<p>
	В данном разделе вы можете ознакомиться с ценами на услуги мастерской Thomi Felgen. Порошковая покраска дисков от 2600 руб. Зеркальная полировка дисков от 8500 (уникальная технология не имеющая аналогов в России). Ремонт дисков от 900 руб.
</p>
	</div>

<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
<?if(!empty($arItem["PROPERTIES"]["AKCIYA4"]["VALUE"])):?>
					<?$res1 = CIBlockElement::GetList(
						Array(),
						Array("ID" => $arItem["PROPERTIES"]["BBT"]["VALUE"]),
						false,
						array(),
						array("PROPERTY_DATE")
					);
while($ob = $res1->GetNextElement())
{
 $arFields = $ob->GetFields();

}
?>
<?endif;?>
		<?if(strtotime($arFields["PROPERTY_DATE_VALUE"]) < date('U')):?>
		<?$arItem["PROPERTIES"]["AKCIYA4"]["VALUE"] = "";?>
		<?$arItem["PROPERTIES"]["AKCIYA"]["VALUE"] = "";?>
		<?$arItem["PROPERTIES"]["TAKCIYA"]["VALUE"] = "";?>
		<?endif;?>
<?if(!empty($arItem["PROPERTIES"]["AKCIYA"]["VALUE"])):?>
<a href="/akcii/select-the-discount/"><img src="/upload/medialibrary/7f0/skidka-banner.jpg" alt="Выбери свою скидку"></a>

	<?$discount = (1 - $arItem["PROPERTIES"]["AKCIYA"]["VALUE"]/100);?>
<?else:?>
<?$discount = (1);?>

<?endif;?>
<?if(!empty($arItem["PROPERTIES"]["AKCIYA2"]["VALUE"])):?>

	<?$discount2 = (1 - $arItem["PROPERTIES"]["AKCIYA2"]["VALUE"]/100);?>
<?else:?>
<?$discount2 = (1);?>

<?endif;?>
<?if(!empty($arItem["PROPERTIES"]["AKCIYA3"]["VALUE"])):?>

	<?$discount3 = (1 - $arItem["PROPERTIES"]["AKCIYA3"]["VALUE"]/100);?>
<?else:?>
<?$discount3 = (1);?>

<?endif;?>
<?if(!empty($arItem["PROPERTIES"]["AKCIYA4"]["VALUE"])):?>

	<?$discount4 = (1 - $arItem["PROPERTIES"]["AKCIYA4"]["VALUE"]/100);?>
<?else:?>
<?$discount4 = (1);?>

<?endif;?>

<?if(!empty($arItem["PROPERTIES"]["HEADER1"]["VALUE"])):?>
<div class="body_inner">
	<p class="news-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img
						class="preview_picture"
						border="0"
						src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
						width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
						height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
						alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
						title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
						style="float:left"
						/></a>
			<?else:?>
				<img
					class="preview_picture"
					border="0"
					src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
					width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
					height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
					alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
					title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
					style="float:left"
					/>
			<?endif;?>
		<?endif?>
		<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
			<span class="news-date-time"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span>
		<?endif?>

		<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
			<?echo $arItem["PREVIEW_TEXT"];?>
		<?endif;?>
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			<div style="clear:both"></div>
		<?endif?>
		<?foreach($arItem["FIELDS"] as $code=>$value):?>
			<small>
			<?=GetMessage("IBLOCK_FIELD_".$code)?>: <?=$value;?>
			</small><br />
		<?endforeach;?>
<p><h2 style="text-align:center;"><?=$arItem["PROPERTIES"]["HEADER1"]["~VALUE"]?> <?if(!empty($arItem["PROPERTIES"]["AKCIYA"]["VALUE"])):?>
		<span style="color:red">| СКИДКИ до -<?=$arItem["PROPERTIES"]["AKCIYA4"]["VALUE"]?>%</span>
<?else:?><?endif;?></h2></p>

		<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
			<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
				<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><b>Подробнее об услуге >>></b></a><br />
			<?else:?>
				<b><?echo $arItem["NAME"]?></b><br />
			<?endif;?>
		<?endif;?>

<table class="nceny" width="100%" style="background:url(<?if($arItem["PROPERTIES"]["MOTODISK"]["VALUE"] == "Да"):?>/upload/medialibrary/96a/moto.png<?else:?><?if($arItem["PROPERTIES"]["NEDISK"]["VALUE"] == "Да"):?><?else:?>/upload/medialibrary/428/avto.png<?endif;?><?endif;?>) no-repeat;background-position:center;">
<tbody style="outline: none medium;">
<tr style="outline: none medium; background-color: #E4412F; color: #fff;" height="40px">
	<th style="outline: none medium;">
		 <?if($arItem["PROPERTIES"]["NEDISK"]["VALUE"] == "Да"):?>Количество<?else:?>Диаметр диска<?endif;?>
	</th>
	<th style="outline: none medium;">
		 <?if($arItem["PROPERTIES"]["NEDISK"]["VALUE"] == "Да"):?>Стоимость<?else:?><?if($arItem["PROPERTIES"]["SHINOMO"]["VALUE"] == "Да"):?>Для легковых авто<?else:?>Цена за 1 диск (руб.)<?endif;?><?endif;?>
	</th>
<?if($arItem["PROPERTIES"]["NEDISK"]["VALUE"] == "Да"):?>
<?else:?>
<?if($arItem["PROPERTIES"]["SHINOMO"]["VALUE"] == "Да"):?>
<th style="outline: none medium;">
		 Для кроссоверов/внедорожников
	</th>
<?else:?>
	<th style="outline: none medium;">
		 Цена за комплект (руб.)
	</th>
    <?endif;?>
<?endif;?>
</tr>
			<?foreach($arItem["PROPERTIES"]["PRICE"]["VALUE"] as $key => $arImage):?>
					<?$priceX4 = ($arItem["PROPERTIES"]["PRICE"]["VALUE"][$key] * 4 * $discount);?>
					<?$priceX2 = ($arItem["PROPERTIES"]["PRICE"]["VALUE"][$key] * 2 * $discount);?>
					<?$priceX1 = ($arItem["PROPERTIES"]["PRICE"]["VALUE"][$key] * $discount);?>
					<?$priceX42 = ($arItem["PROPERTIES"]["PRICE"]["VALUE"][$key] * 4 * $discount2);?>
					<?$priceX22 = ($arItem["PROPERTIES"]["PRICE"]["VALUE"][$key] * 2 * $discount2);?>
					<?$priceX12 = ($arItem["PROPERTIES"]["PRICE"]["VALUE"][$key] * $discount2);?>
					<?$priceX43 = ($arItem["PROPERTIES"]["PRICE"]["VALUE"][$key] * 4 * $discount3);?>
					<?$priceX23 = ($arItem["PROPERTIES"]["PRICE"]["VALUE"][$key] * 2 * $discount3);?>
					<?$priceX13 = ($arItem["PROPERTIES"]["PRICE"]["VALUE"][$key] * $discount3);?>
					<?$priceX44 = ($arItem["PROPERTIES"]["PRICE"]["VALUE"][$key] * 4 * $discount4);?>
					<?$priceX24 = ($arItem["PROPERTIES"]["PRICE"]["VALUE"][$key] * 2 * $discount4);?>
					<?$priceX14 = ($arItem["PROPERTIES"]["PRICE"]["VALUE"][$key] * $discount4);?>
<tr style="outline: none medium;">
	<td style="outline: none medium;">
		 <?=$arItem["PROPERTIES"]["RADIUS"]["VALUE"][$key]?>
	</td>
   
	<td style="outline: none medium;">
    <?if($arItem["PROPERTIES"]["SHINOMO"]["VALUE"] == "Да"):?> 
		 <?if(!empty($arItem["PROPERTIES"]["AKCIYA"]["VALUE"])):?><span class="oldprice"><?=$arItem["PROPERTIES"]["PRICE"]["VALUE"][$key]?> (1шт.) | <?=$arItem["PROPERTIES"]["PRICE"]["VALUE"][$key] * 4?> комплект</span> <span class="newprice"><?=$priceX1?></span><?else:?><?=$priceX1?> (1шт.) | <?=$priceX1 * 4?> (4шт.)<?endif;?>
          <?else:?>
<?if(!empty($arItem["PROPERTIES"]["AKCIYA"]["VALUE"])):?>
<div class="tabedis"><span class="litlet">Цена без скидки</span><br><?=$arItem["PROPERTIES"]["PRICE"]["VALUE"][$key]?></div>
<div class="tabedis"><span class="seldisrt">-<?=$arItem["PROPERTIES"]["AKCIYA"]["VALUE"]?>%</span> <span class="litlet"><?=$arItem["PROPERTIES"]["NAKCIYA"]["~VALUE"]?></span> <br><span class="newprice"><?=$priceX1?></span></div>
<div class="tabedis"><span class="seldisrt">-<?=$arItem["PROPERTIES"]["AKCIYA2"]["VALUE"]?>%</span> <span class="litlet"><?=$arItem["PROPERTIES"]["NAKCIYA2"]["~VALUE"]?></span> <br><span class="newprice"><?=$priceX12?></span></div>
<div class="tabedis"><span class="seldisrt">-<?=$arItem["PROPERTIES"]["AKCIYA3"]["VALUE"]?>%</span> <span class="litlet"><?=$arItem["PROPERTIES"]["NAKCIYA3"]["~VALUE"]?></span> <br><span class="newprice"><?=$priceX13?></span></div>
		<div class="tabedis"><span class="seldisrt">-<?=$arItem["PROPERTIES"]["AKCIYA4"]["VALUE"]?>%</span> <span class="litlet"><nobr><?=$arItem["PROPERTIES"]["NAKCIYA4"]["~VALUE"]?></nobr></span> <br><span class="newprice"><?=$priceX14?></span></div>
<?else:?><?=$priceX1?><?endif;?>
             <?endif;?>
	</td>
<?if($arItem["PROPERTIES"]["NEDISK"]["VALUE"] == "Да"):?>
<?else:?>
<?if($arItem["PROPERTIES"]["SHINOMO"]["VALUE"] == "Да"):?>
<td style="outline: none medium;">
	<?if(!empty($arItem["PROPERTIES"]["AKCIYA"]["VALUE"])):?><span class="oldprice"><?=$arItem["PROPERTIES"]["PRICE"]["VALUE"][$key] + 60?></span> <span class="newprice"><?=$priceX1 + 60?> (1шт.) | <?=($priceX1 + 60) * 4?>(4шт.)</span><?else:?><?=$priceX1 + 60?> (1шт.) |  <?=($priceX1 + 60) * 4?>(4шт.)<?endif;?>			
</td>
 <?else:?>   
	<td style="outline: none medium;">
		<?if($arItem["PROPERTIES"]["MOTODISK"]["VALUE"] == "Да"):?>			
		<?if(!empty($arItem["PROPERTIES"]["AKCIYA"]["VALUE"])):?>
		<div class="tabedis"><span class="litlet">Цена без скидки</span><br><?=$arItem["PROPERTIES"]["PRICE"]["VALUE"][$key] * 2?></div>
		<div class="tabedis"><span class="litlet">Экономия</span> <span class="seldisrt"><?=$arItem["PROPERTIES"]["PRICE"]["VALUE"][$key] * 2 - $priceX2?></span><br><span class="newprice"><?=$priceX2?></span></div>
		<div class="tabedis"><span class="litlet">Экономия</span> <span class="seldisrt"><?=$arItem["PROPERTIES"]["PRICE"]["VALUE"][$key] * 2 - $priceX22?></span><br><span class="newprice"><?=$priceX22?></span></div>
		<div class="tabedis"><span class="litlet">Экономия</span> <span class="seldisrt"><?=$arItem["PROPERTIES"]["PRICE"]["VALUE"][$key] * 2 - $priceX23?></span><br><span class="newprice"><?=$priceX23?></span></div>
		<div class="tabedis"><span class="litlet">Экономия</span> <span class="seldisrt"><?=$arItem["PROPERTIES"]["PRICE"]["VALUE"][$key] * 2 - $priceX24?></span><br><span class="newprice"><?=$priceX24?></span></div>
		<?else:?><?=$priceX2?><?endif;?>			
		<?else:?>
		<?if($arItem["PROPERTIES"]["RADIUS"]["VALUE"][$key] == "Мото Диск"):?>
		<?if(!empty($arItem["PROPERTIES"]["AKCIYA"]["VALUE"])):?>
			<span class="oldprice"><?=$arItem["PROPERTIES"]["PRICE"]["VALUE"][$key] * 2?></span> <span class="newprice"><?=$priceX2?></span>
		<?else:?><?=$priceX2?><?endif;?>
<?else:?>
		<?if(!empty($arItem["PROPERTIES"]["AKCIYA"]["VALUE"])):?>
			<div class="tabedis"><span class="litlet">Цена без скидки</span><br><?=$arItem["PROPERTIES"]["PRICE"]["VALUE"][$key] * 4?></div>
			<div class="tabedis"><span class="litlet">Экономия</span> <span class="seldisrt"><?=$arItem["PROPERTIES"]["PRICE"]["VALUE"][$key] * 4 - $priceX4?></span><br><span class="newprice"><?=$priceX4?></span></div>
			<div class="tabedis"><span class="litlet">Экономия</span> <span class="seldisrt"><?=$arItem["PROPERTIES"]["PRICE"]["VALUE"][$key] * 4 - $priceX42?></span><br><span class="newprice"><?=$priceX42?></span></div>
			<div class="tabedis"><span class="litlet">Экономия</span> <span class="seldisrt"><?=$arItem["PROPERTIES"]["PRICE"]["VALUE"][$key] * 4 - $priceX43?></span><br><span class="newprice"><?=$priceX43?></span></div>
			<div class="tabedis"><span class="litlet">Экономия</span> <span class="seldisrt"><?=$arItem["PROPERTIES"]["PRICE"]["VALUE"][$key] * 4 - $priceX44?></span><br><span class="newprice"><?=$priceX44?></span></div>
		<?else:?><?=$priceX4?><?endif;?><?endif;?>						
		<?endif;?>
	</td>
<?endif;?><?endif;?>
</tr>
<?endforeach;?>
</tbody>
</table>
	<span style="font-size:11px"><?=$arItem["PROPERTIES"]["TABDESC"]["~VALUE"]?></span>
</div>
<?endif;?>

<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>

