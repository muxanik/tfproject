<script src="<?=SITE_TEMPLATE_PATH?>/js/odometer.js"></script>
<script>
window.odometerOptions = {
format: '( ddd).dd',
duration: 3000
};
</script>
<script>
function setEqualHeight(columns)
{
var tallestcolumn = 0;
columns.each(
function()
{
currentHeight = $(this).height();
if(currentHeight > tallestcolumn)
{
tallestcolumn = currentHeight;
}
}
);
columns.height(tallestcolumn);
}
$(document).ready(function() {
setEqualHeight($(".uslugi > div"));
});
</script>

<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?$APPLICATION->SetPageProperty("title", $arResult["NAME"]);?>

<div class="catalog-element catalog-element-services">
	<div class="catalog_element_right">
<?$APPLICATION->IncludeFile(
	SITE_TEMPLATE_PATH."/include_areas/akcii.php",
	Array(), //переменные
	Array(
	"MODE" => "html",                                  // будет редактировать в веб-редакторе
	"NAME" => "Редактирование"      // имя шаблона для нового файла
	)
);?>

<?if(!empty($arResult["PROPERTIES"]["AKCIYA"]["VALUE"])):?>

	<?$discount = (1 - $arResult["PROPERTIES"]["AKCIYA"]["VALUE"]/100);?>
<?else:?>
<?$discount = (1);?>

<?endif;?>



		<?if(!empty($arResult["PROPERTIES"]["HEADER1"]["VALUE"])):?>
		<div class="col-2">
		<div class="col-2-div uslugi">
	<div class="priceu">
<?if(!empty($arResult["PROPERTIES"]["AKCIYA"]["VALUE"])):?>
		<div class="discount">-<?=$arResult["PROPERTIES"]["AKCIYA"]["VALUE"]?>%</div>

<?else:?><?endif;?>
		<div style="left:10px;position:absolute;width:55px;padding-top:4px;">
<?if($arResult["PROPERTIES"]["AUTOMOTO"]["VALUE"] == "Да"):?>
<img width="50px" src="/upload/medialibrary/8bf/automotosm.png" alt="Для автомобилей и мотоциклов">
<?else:?>
<?if($arResult["PROPERTIES"]["NEDISK"]["VALUE"] == "Да"):?>
<?else:?>

<?if($arResult["PROPERTIES"]["MOTODISK"]["VALUE"] == "Да"):?>

<img width="50px" src="/upload/medialibrary/397/motosm.png" alt="Для мотоциклов">
<?else:?>
<img width="50px" src="/upload/medialibrary/ab8/legkovoysm.png" alt="Для автомобилей">
<?endif;?><?endif;?><?endif;?>
</div>
		<div class="pricep respt">
 <span id="ot">От</span> <span id="odometer" class="odometer"><?=$arResult["PROPERTIES"]["PRICE"]["VALUE"][0] * $discount?></span> <i class="fa fa-rub"></i>
		</div>
 <a class="ripplelink orange btn opener" style="line-height: 14px;" onclick="yaCounter16377226.reachGoal('ZAKAZ'); return true;">ЗАКАЗАТЬ</a> <a href="/akcii/" class="ripplelink orange btn" style="line-height: 14px;" onclick="yaCounter16377226.reachGoal('SKIDKA'); return true;">ХОЧУ СКИДКУ</a>
	</div>
</div>


		<div class="col-2-div uslugi" style="float:right;">
			<div class="tabs_conteiner">
			<div class="tabs_header1"><?=$arResult["PROPERTIES"]["HEADER1"]["~VALUE"]?></div>
			<?if($arResult["PROPERTIES"]["NEDISK"]["VALUE"] == "Да"):?>
			<div class="tabs_header2">расчет стоиомсти работ</div>
			<?else:?>
			<div class="tabs_header2">выберите вариант стола</div>
			<?endif;?>
			<div id="tabs">
				<ul>
			<?foreach($arResult["PROPERTIES"]["RADIUS"]["VALUE"] as $key => $arImage):?>
					<li><a id="ref-<?=$key?>" href="#tabs-<?=$key?>"><?=$arResult["PROPERTIES"]["RADIUS"]["VALUE"][$key]?></a></li>
			<?endforeach;?>
				</ul>
			<?foreach($arResult["PROPERTIES"]["PRICE"]["VALUE"] as $key => $arImage):?>
					<?$priceX4 = ($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key] * 4 * $discount);?>
					<?$priceX2 = ($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key] * 2 * $discount);?>
					<?$priceX1 = ($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key] * $discount);?>
				<?if($arResult["PROPERTIES"]["NEDISK"]["VALUE"] == "Да"):?>
				<div id="tabs-<?=$key?>"><span style="color:#000;">стоимость:</span> <?=$priceX1?> руб.</div>
				<?else:?>

				<?if($arResult["PROPERTIES"]["MOTODISK"]["VALUE"] == "Да"):?>			
				<div id="tabs-<?=$key?>"><span style="color:#000;">за 1 столик:</span> <?=$priceX1?> руб. <br /><span style="color:#000;">за 2 диска:</span> <?=$priceX2?> руб.</div>			
				<?else:?>
                <?if($arResult["PROPERTIES"]["SHINOMO"]["VALUE"] == "Да"):?>
                <div id="tabs-<?=$key?>"><span style="color:#000;">легковые:</span> <?=$priceX1?> руб./1шт. <br /><span style="color:#000;">кросовер:</span> <?=$priceX1 + 60?> руб./1шт.</div>
                <?else:?>
				<div id="tabs-<?=$key?>"><span style="color:#000;">за 1 столик:</span> <?=$priceX1?> руб. <br /></div>						
				<?endif;?><?endif;?><?endif;?>		
			<?endforeach;?>
<?if($arResult["PROPERTIES"]["NOCALC"]["VALUE"] == "Да"):?>
				<span></span>
<?else:?>

<?endif;?>
			</div>
		</div>
		</div>
	</div>
<div class="clear">
</div>
<?foreach($arResult["PROPERTIES"]["PRICE"]["VALUE"] as $key => $arImage):?>
<?$priceX1 = ($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key] * $discount);?>
<script>
$('#ref-<?=$key?>').click(function(){
	$('#odometer').text('<?=$priceX1?>');
    $('#ot').text('');
setTimeout(function(){
    odometer.innerHTML = <?=$priceX1?>;
}, 1000);
});

</script>
<?endforeach;?>
		<?endif;?>
		<div class="catalog_element_text"><?=$arResult["~DETAIL_TEXT"]?></div>
		<p></p>
<?if(!empty($arResult["PROPERTIES"]["HEADER1"]["VALUE"])):?>
<p><h2 style="text-align:center;"><?=$arResult["PROPERTIES"]["HEADER1"]["~VALUE"]?>. 
<?if(!empty($arResult["PROPERTIES"]["AKCIYA"]["VALUE"])):?>
		<span style="color:red">ВНИМАНИЕ АКЦИЯ - действует скидка <?=$arResult["PROPERTIES"]["AKCIYA"]["VALUE"]?>%</span>
<?else:?><?endif;?>
</h2></p>

<table class="nceny" width="100%">
<tbody style="outline: none medium;">
<tr style="outline: none medium; background-color: #E4412F; color: #fff;" height="40px">
	<th style="outline: none medium;">
		 <?if($arResult["PROPERTIES"]["NEDISK"]["VALUE"] == "Да"):?>Количество<?else:?>Тип столика<?endif;?>
	</th>
	<th style="outline: none medium;">
		 <?if($arResult["PROPERTIES"]["NEDISK"]["VALUE"] == "Да"):?>Стоимость<?else:?><?if($arResult["PROPERTIES"]["SHINOMO"]["VALUE"] == "Да"):?>Для легковых авто<?else:?>Цена за 1 столик (руб.)<?endif;?><?endif;?>
	</th>
<?if($arResult["PROPERTIES"]["NEDISK"]["VALUE"] == "Да"):?>
<?else:?>
<?if($arResult["PROPERTIES"]["SHINOMO"]["VALUE"] == "Да"):?>
<th style="outline: none medium;">
		 Для кроссоверов/внедорожников
	</th>
<?else:?>

    <?endif;?>
<?endif;?>
</tr>
			<?foreach($arResult["PROPERTIES"]["PRICE"]["VALUE"] as $key => $arImage):?>
					<?$priceX4 = ($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key] * 4 * $discount);?>
					<?$priceX2 = ($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key] * 2 * $discount);?>
					<?$priceX1 = ($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key] * $discount);?>
<tr style="outline: none medium;">
	<td style="outline: none medium;">
		 <?=$arResult["PROPERTIES"]["RADIUS"]["VALUE"][$key]?>
	</td>
   
	<td style="outline: none medium;">
    <?if($arResult["PROPERTIES"]["SHINOMO"]["VALUE"] == "Да"):?> 
		 <?if(!empty($arResult["PROPERTIES"]["AKCIYA"]["VALUE"])):?><span class="oldprice"><?=$arResult["PROPERTIES"]["PRICE"]["VALUE"][$key]?> (1шт.) | <?=$arResult["PROPERTIES"]["PRICE"]["VALUE"][$key] * 4?> комплект</span> <span class="newprice"><?=$priceX1?></span><?else:?><?=$priceX1?> (1шт.) | <?=$priceX1 * 4?> (4шт.)<?endif;?>
          <?else:?>
         	 <?if(!empty($arResult["PROPERTIES"]["AKCIYA"]["VALUE"])):?><span class="oldprice"><?=$arResult["PROPERTIES"]["PRICE"]["VALUE"][$key]?></span> <span class="newprice"><?=$priceX1?></span><?else:?><?=$priceX1?><?endif;?>
             <?endif;?>
	</td>
<?if($arResult["PROPERTIES"]["NEDISK"]["VALUE"] == "Да"):?>
<?else:?>
<?if($arResult["PROPERTIES"]["SHINOMO"]["VALUE"] == "Да"):?>
<td style="outline: none medium;">
		
				<?if(!empty($arResult["PROPERTIES"]["AKCIYA"]["VALUE"])):?><span class="oldprice"><?=$arResult["PROPERTIES"]["PRICE"]["VALUE"][$key] + 60?></span> <span class="newprice"><?=$priceX1 + 60?> (1шт.) | <?=($priceX1 + 60) * 4?>(4шт.)</span><?else:?><?=$priceX1 + 60?> (1шт.) |  <?=($priceX1 + 60) * 4?>(4шт.)<?endif;?>			
	
	</td>
 <?else:?>   

<?endif;?><?endif;?>
</tr>
<?endforeach;?>
</tbody>
</table>
	<span style="font-size:11px"><?=$arResult["PROPERTIES"]["TABDESC"]["~VALUE"]?></span>
<?if(!empty($arResult["PROPERTIES"]["FIXPR"]["VALUE"])):?>
<p><h2 style="text-align:center;"><?=$arResult["PROPERTIES"]["FIXPR"]["~VALUE"]?></h2></p>

<table class="nceny" width="100%">
<tbody style="outline: none medium;">
<tr style="outline: none medium; background-color: #E4412F; color: #fff;" height="40px">
	<th style="outline: none medium;">
		 <?if($arResult["PROPERTIES"]["NEDISK"]["VALUE"] == "Да"):?>Количество<?else:?>Тип колпачка<?endif;?>
	</th>
	<th style="outline: none medium;">
		 <?if($arResult["PROPERTIES"]["NEDISK"]["VALUE"] == "Да"):?>Стоимость<?else:?>Цена за 1 колпачок (руб.)<?endif;?>
	</th>
<?if($arResult["PROPERTIES"]["NEDISK"]["VALUE"] == "Да"):?>
<?else:?>
	<th style="outline: none medium;">
		 Цена за комплект (руб.)
	</th>
<?endif;?>
</tr>
			<?foreach($arResult["PROPERTIES"]["PRICE"]["VALUE"] as $key => $arImage):?>
					<?($priceX4 = (($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key] + $arResult["PROPERTIES"]["FIXSUM"]["VALUE"]) * 4)) * $discount;?>
					<?($priceX2 = (($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key] + $arResult["PROPERTIES"]["FIXSUM"]["VALUE"]) * 2)) * $discount;?>
					<?($priceX1 = (($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key] + $arResult["PROPERTIES"]["FIXSUM"]["VALUE"]))) * $discount;?>
<tr style="outline: none medium;">
	<td style="outline: none medium;">
		 <?=$arResult["PROPERTIES"]["RADIUS"]["VALUE"][$key]?>
	</td>
	<td style="outline: none medium;">
		 <?=$priceX1?>
	</td>
<?if($arResult["PROPERTIES"]["NEDISK"]["VALUE"] == "Да"):?>
<?else:?>
	<td style="outline: none medium;">
				<?if($arResult["PROPERTIES"]["MOTODISK"]["VALUE"] == "Да"):?>			
				<?=$priceX2?>			
				<?else:?>
				<?if($arResult["PROPERTIES"]["RADIUS"]["VALUE"][$key] == "Мото Диск"):?><?=$priceX2?><?else:?><?=$priceX4?><?endif;?>						
				<?endif;?>
	</td>
<?endif;?>
</tr>
<?endforeach;?>
</tbody>
</table>
<span style="font-size:11px"><?=$arResult["PROPERTIES"]["TABDESC"]["~VALUE"]?></span>
<?else:?>
<?endif;?>

<?endif;?>
<div style="text-align:center;">
<a class="btn opener" style="line-height: 14px;" onclick="yaCounter16377226.reachGoal('ZAKAZ'); return true;">ЗАКАЗАТЬ</a>
</div>
<?if(!empty($arResult["PROPERTIES"]["OPRICE"]["VALUE"])):?>
<div class="title_h2"><h2>Смотрите также:</h2></div>
<?foreach($arResult["PROPERTIES"]["OPRICE"]["VALUE"] as $analog):?> 
<?$res = CIBlockElement::GetByID($analog);?> 
<?if($ar_res = $res->GetNext())?> 
<ul class="check"><li><b><a href='<?=$ar_res["DETAIL_PAGE_URL"];?>'><?=$ar_res["NAME"];?></a></b></li></ul> 
	<?endforeach;?>
				<?endif;?>
<?if(!empty($arResult["PROPERTIES"]["RCAT"]["VALUE"])):?>

<div class="title_h2"><h2>Примеры работ:</h2></div>

	<div class="owl-carousel-random-works">	
	<?foreach($arResult['RANDOM_WORKS_IMG'] as $key => $arWorks):?>
				<div>
					<a href="<?=$arResult['RANDOM_WORKS'][$key]["DETAIL_PAGE_URL"]?>"><img src="<?=$arWorks["SRC"]?>" alt="<?=$arResult['RANDOM_WORKS'][$key]["NAME"]?>" title="<?=$arResult['RANDOM_WORKS'][$key]["NAME"]?>"></a>
				</div>	
	<?endforeach;?>
	</div>

<?else:?>
<?endif;?>

<p></p>
<?$APPLICATION->IncludeFile(
	SITE_TEMPLATE_PATH."/include_areas/podpiska.php",
	Array(), //переменные
	Array(
	"MODE" => "html",                                  // будет редактировать в веб-редакторе
	"NAME" => "Редактирование"      // имя шаблона для нового файла
	)
);?>
		<?if (is_array($arResult["PROPERTIES"]["QUESTIONS"]["VALUE"])):?>
			<h3 class="questions-title">Часто задаваемые вопросы</h3>
			<div class="question_list" style="margin: 0 auto 30px auto;">

				<?foreach($arResult["PROPERTIES"]["QUESTIONS"]["VALUE"] as $questionID):?>
					<?$res = CIBlockElement::GetList(
						Array(),
						Array("ID" => $questionID),
						false,
						array(),
						array("PROPERTY_NAME", "PROPERTY_EMAIL", "PROPERTY_QUESTION", "PROPERTY_ANSWER")
					);?>

					<?if ($ar_fields = $res->Fetch()):?>
							<div class="faq">
								<div class="cover">
									<div class="qw_answer-detail">
										<div class="faq_ascs">
											Спрашивает: <?=$ar_fields["PROPERTY_NAME_VALUE"]?>
											<div class="cls">
											</div>
										</div>
									</div>
									<div class="faq_qwestion">
										<?=$ar_fields["PROPERTY_QUESTION_VALUE"]?>
									</div>
									<div class="cls">
									</div>
								</div>
								<div class="cover">
									<div class="qw_cover-wrapper">
										<div class="faq_ansver">
											<div>
												<?=htmlspecialcharsBack($ar_fields["PROPERTY_ANSWER_VALUE"]["TEXT"])?>
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

								</div>
							</div>
					<?endif;?>
				<?endforeach;?>
				<div style="text-align:center"><a class="btn" href="/questions/">Задать свой вопрос</a></div>
			</div>
		<?endif;?>

	</div>
	<div class="clear"></div>