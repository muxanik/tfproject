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
<?if(!empty($arResult["PROPERTIES"]["AKCIYA4"]["VALUE"])):?>
					<?$res1 = CIBlockElement::GetList(
						Array(),
						Array("ID" => $arResult["PROPERTIES"]["BBT"]["VALUE"]),
						false,
						array(),
						array("PROPERTY_DATE", "DETAIL_PAGE_URL")
					);
while($ob = $res1->GetNextElement())
{
 $arFields = $ob->GetFields();
 $akciya = $arFields["DETAIL_PAGE_URL"];
}
?>
		<?endif;?>
		<?if(strtotime($arFields["PROPERTY_DATE_VALUE"]) < date('U')):?>
		<?$arResult["PROPERTIES"]["AKCIYA4"]["VALUE"] = "";?>
		<?$arResult["PROPERTIES"]["AKCIYA"]["VALUE"] = "";?>
		<?$arResult["PROPERTIES"]["TAKCIYA"]["VALUE"] = "";?>
		<?endif;?>


<?if(!empty($arResult["PROPERTIES"]["AKCIYA"]["VALUE"])):?>

	<?$discount = (1 - $arResult["PROPERTIES"]["AKCIYA"]["VALUE"]/100);?>
<?else:?>
<?$discount = (1);?>

<?endif;?>
<?if(!empty($arResult["PROPERTIES"]["AKCIYA2"]["VALUE"])):?>

	<?$discount2 = (1 - $arResult["PROPERTIES"]["AKCIYA2"]["VALUE"]/100);?>
<?else:?>
<?$discount2 = (1);?>

<?endif;?>
<?if(!empty($arResult["PROPERTIES"]["AKCIYA3"]["VALUE"])):?>

	<?$discount3 = (1 - $arResult["PROPERTIES"]["AKCIYA3"]["VALUE"]/100);?>
<?else:?>
<?$discount3 = (1);?>

<?endif;?>
<?if(!empty($arResult["PROPERTIES"]["AKCIYA4"]["VALUE"])):?>

	<?$discount4 = (1 - $arResult["PROPERTIES"]["AKCIYA4"]["VALUE"]/100);?>
<?else:?>
<?$discount4 = (1);?>

<?endif;?>
		<?if(!empty($arResult["PROPERTIES"]["HEADER1"]["VALUE"])):?>
		<div class="col-2">
			<div class="col-2-div uslugi" style="overflow:hidden">
<div style="position: absolute; background: url('/upload/medialibrary/09e/ssd2na_4mmc.jpg') 50% 50% / cover;left: 0;right: 0;bottom: 0;top: 0;margin: 0 10px 0 0;"></div>
	<div class="priceu">


<script>
 jQuery(document).ready(function($){  
$("#first_countdown").ResponsiveCountdown({
   target_date:"<?=date("Y/n/j H:i:s", strtotime($arFields["PROPERTY_DATE_VALUE"]))?>",
   time_zone:0,target_future:true,
   set_id:0,pan_id:0,day_digits:2,
   fillStyleSymbol1:"rgba(255,255,255,1)",
   fillStyleSymbol2:"rgba(255,255,255,1)",
   fillStylesPanel_g1_1:"rgba(244, 67, 54, 1)",
   fillStylesPanel_g1_2:"rgba(244, 67, 54, 1)",
   fillStylesPanel_g2_1:"rgba(169, 169, 169, 1)",
   fillStylesPanel_g2_2:"rgba(169, 169, 169, 1)",
   text_color:"rgba(0, 0, 0, 1)",
   text_glow:"rgba(0, 0, 0, 1)",
   show_ss:true,show_mm:true,
   show_hh:true,show_dd:true,
   f_family:"Verdana",show_labels:true,
   type3d:"group",max_height:300,
   days_long:"Дней",days_short:"дн",
   hours_long:"Часов",hours_short:"час",
   mins_long:"Минут",mins_short:"мин",
   secs_long:"Секунд",secs_short:"сек",
   min_f_size:9,max_f_size:30,
   spacer:"squares",groups_spacing:3,text_blur:0,
   font_to_digit_ratio:0.33,labels_space:1.3
});
 });  
</script>
<?if(!empty($arResult["PROPERTIES"]["AKCIYA4"]["VALUE"])):?>
		<div class="discount"><nobr>СКИДКИ до -<?=$arResult["PROPERTIES"]["AKCIYA4"]["VALUE"]?>%</nobr></div>
<?endif;?>

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
		<div class="pricep respt" style="text-shadow:white -2px 0px, white 0px 2px, white 2px 0px, white 0px -2px;">
 <span id="ot">От</span> <span id="odometer" class="odometer"><?=$arResult["PROPERTIES"]["PRICE"]["VALUE"][0]?></span> <i class="fa fa-rub"></i>
		</div>
<?if(!empty($arResult["PROPERTIES"]["AKCIYA4"]["VALUE"])):?>

		<div style="position:relative;top:-20px;margin:-18px 0 0 0;text-shadow:white -1px 0px, white 0px 1px, white 1px 0px, white 0px -1px;"> ВЫБЕРИТЕ РАЗМЕР СКИДКИ </div>
		<div style="position:relative;">
<div class="seldis"><a href="<?=$arResult["PROPERTIES"]["URLAKC"]["VALUE"]?>"><div class="seldisr">-<?=$arResult["PROPERTIES"]["AKCIYA"]["VALUE"]?>%</div><span style="font-size:10px;"><?=$arResult["PROPERTIES"]["NAKCIYA"]["~VALUE"]?></span><br><span class="1d odometr"><?=$arResult["PROPERTIES"]["PRICE"]["VALUE"][0] * $discount?></span> <i class="fa fa-rub"></i></a></div>
<div class="seldis"><a href="<?=$arResult["PROPERTIES"]["URLAKC"]["VALUE"]?>"><div class="seldisr">-<?=$arResult["PROPERTIES"]["AKCIYA2"]["VALUE"]?>%</div><span style="font-size:10px;"><?=$arResult["PROPERTIES"]["NAKCIYA2"]["~VALUE"]?></span><br><span class="2d"><?=$arResult["PROPERTIES"]["PRICE"]["VALUE"][0] * $discount2?></span> <i class="fa fa-rub"></i></a></div>
<div class="seldis"><a href="<?=$arResult["PROPERTIES"]["URLAKC"]["VALUE"]?>"><div class="seldisr">-<?=$arResult["PROPERTIES"]["AKCIYA3"]["VALUE"]?>%</div><span style="font-size:10px;"><?=$arResult["PROPERTIES"]["NAKCIYA3"]["~VALUE"]?></span><br><span class="3d"><?=$arResult["PROPERTIES"]["PRICE"]["VALUE"][0] * $discount3?></span> <i class="fa fa-rub"></i></a></div>
			<div class="seldis"><a href="<?=$arResult["PROPERTIES"]["URLAKC"]["VALUE"]?>"><div class="seldisr">-<?=$arResult["PROPERTIES"]["AKCIYA4"]["VALUE"]?>%</div><span style="font-size:10px;"><nobr><?=$arResult["PROPERTIES"]["NAKCIYA4"]["~VALUE"]?></nobr></span><br><span class="4d"><?=$arResult["PROPERTIES"]["PRICE"]["VALUE"][0] * $discount4?></span> <i class="fa fa-rub"></i></a></div>
</div>
<?endif;?>
	</div>
</div>


		<div class="col-2-div uslugi" style="float:right;">
			<div class="tabs_conteiner">
			<div class="tabs_header1"><?=$arResult["PROPERTIES"]["HEADER1"]["~VALUE"]?></div>
			<?if($arResult["PROPERTIES"]["NEDISK"]["VALUE"] == "Да"):?>
			<div class="tabs_header2">расчет стоимости работ</div>
			<?else:?>
			<div class="tabs_header2">выберите диаметр диска</div>
			<?endif;?>
			<div id="tabs">
				<ul>
			<?foreach($arResult["PROPERTIES"]["RADIUS"]["VALUE"] as $key => $arImage):?>
					<li><a id="ref-<?=$key?>" href="#tabs-<?=$key?>"><?=$arResult["PROPERTIES"]["RADIUS"]["VALUE"][$key]?></a></li>
			<?endforeach;?>
				</ul>
			<?foreach($arResult["PROPERTIES"]["PRICE"]["VALUE"] as $key => $arImage):?>
					<?$priceX4 = ($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key] * 4 );?>
					<?$priceX2 = ($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key] * 2 );?>
					<?$priceX1 = ($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key] );?>
					<?$cpriceX1 = ($arResult["PROPERTIES"]["CROSSPRICE"]["VALUE"][$key] );?>
				<?if($arResult["PROPERTIES"]["NEDISK"]["VALUE"] == "Да"):?>
				<div id="tabs-<?=$key?>"><span style="color:#000;font-size:12px;">стоимость:</span> <?=$priceX1?> руб.</div>
				<?else:?>

				<?if($arResult["PROPERTIES"]["MOTODISK"]["VALUE"] == "Да"):?>			
				<div id="tabs-<?=$key?>"><span style="color:#000;font-size:12px;">за 1 диск:</span> <?=$priceX1?> ₽ <br /><span style="color:#000;font-size:12px;">за 2 диска:</span> <?=$priceX2?> ₽</div>			
				<?else:?>
                <?if($arResult["PROPERTIES"]["SHINOMO"]["VALUE"] == "Да"):?>
                <div id="tabs-<?=$key?>"><span style="color:#000;font-size:12px;">легковые:</span> <?=$priceX1?> ₽/1шт. <br /><span style="color:#000;font-size:12px;">кросовер:</span> <?=$cpriceX1?> ₽/1шт.</div>
                <?else:?>
				<div id="tabs-<?=$key?>"><span style="color:#000;font-size:12px;">за 1 диск:</span> <?=$priceX1?> ₽ <br /><?if($arResult["PROPERTIES"]["RADIUS"]["VALUE"][$key] == "Мото Диск"):?><span style="color:#000;font-size:12px;">за 2 диска:</span> <?=$priceX2?> руб.<?else:?><span style="color:#000;font-size:12px;">за 4 диска:</span> <?=$priceX4?> ₽<?endif;?></div>						
				<?endif;?><?endif;?><?endif;?>		
			<?endforeach;?>
<?if($arResult["PROPERTIES"]["NOCALC"]["VALUE"] == "Да"):?>
				<span></span>
<?else:?>
<div class="btncalc"><a class="ripplelink orange btn respd" onclick="yaCounter16377226.reachGoal('CALC'); return true;" id="calculator-main-mini-goto-calculator" href="/calculator/">Расширенный калькулятор</a></div>
<?endif;?>
			</div>
		</div>
		</div>
<div class="clear">
</div>
	</div>

<?foreach($arResult["PROPERTIES"]["PRICE"]["VALUE"] as $key => $arImage):?>
<?$priceX1 = ($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key]);?>
<?$priceX11 = ($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key] * $discount);?>
<?$priceX12 = ($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key] * $discount2);?>
<?$priceX13 = ($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key] * $discount3);?>
<?$priceX14 = ($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key] * $discount4);?>
<script>
$('#ref-<?=$key?>').click(function(){
	$('.odometer').text('<?=$priceX1?>');
	$('.1d').text('<?=$priceX11?>');
	$('.2d').text('<?=$priceX12?>');
	$('.3d').text('<?=$priceX13?>');
	$('.4d').text('<?=$priceX14?>');
    $('#ot').text('');
setTimeout(function(){
    odometer.innerHTML = <?=$priceX1?>;
}, 1000);
});

</script>
<?endforeach;?>
<?else:?>
<?endif;?>
<?if(!empty($arResult["PROPERTIES"]["AKCIYA4"]["VALUE"])):?>
<div class="col-2">
<div class="col-2-div">
	<div class="inform"><p style="font-size:18px;">ДО КОНЦА АКЦИИ ОСТАЛОСЬ:</p></div>
	</div>
<div class="col-2-div">
		<div id="first_countdown" style="position: relative; width: 100%; height: 50px;"></div>
		</div>
		</div>
	<?endif;?>
<div class="body_inner">
		<div class="catalog_element_text"><?=$arResult["~DETAIL_TEXT"]?></div>
		</div>

<?if(!empty($arResult["PROPERTIES"]["AKCIYA"]["VALUE"])):?>
<a href="<?=$akciya;?>"><img src="/upload/medialibrary/7f0/skidka-banner.jpg" alt="Выбери свою скидку"></a>
<?endif;?>

<?if(!empty($arResult["PROPERTIES"]["HEADER1"]["VALUE"])):?>
<div class="body_inner">
<p><h2 style="text-align:center;"><?=$arResult["PROPERTIES"]["HEADER1"]["~VALUE"]?>. 
<?if(!empty($arResult["PROPERTIES"]["AKCIYA"]["VALUE"])):?>
		<span style="color:red">СКИДКИ до <?=$arResult["PROPERTIES"]["AKCIYA4"]["VALUE"]?>%</span>
<?else:?><?endif;?>
</h2></p>

<table class="nceny" width="100%">
<tbody style="outline: none medium;">
<tr style="outline: none medium; background-color: #E4412F; color: #fff;" height="40px">
	<th style="outline: none medium;">
		 <?if($arResult["PROPERTIES"]["NEDISK"]["VALUE"] == "Да"):?>Количество<?else:?>Диаметр диска<?endif;?>
	</th>
	<th style="outline: none medium;">
		 <?if($arResult["PROPERTIES"]["NEDISK"]["VALUE"] == "Да"):?>Стоимость<?else:?><?if($arResult["PROPERTIES"]["SHINOMO"]["VALUE"] == "Да"):?>Для легковых авто<?else:?>Цена за 1 диск (руб.)<?endif;?><?endif;?>
	</th>
<?if($arResult["PROPERTIES"]["NEDISK"]["VALUE"] == "Да"):?>
<?else:?>
<?if($arResult["PROPERTIES"]["SHINOMO"]["VALUE"] == "Да"):?>
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
			<?foreach($arResult["PROPERTIES"]["PRICE"]["VALUE"] as $key => $arImage):?>
					<?$priceX4 = ($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key] * 4 * $discount);?>
					<?$priceX2 = ($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key] * 2 * $discount);?>
					<?$priceX1 = ($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key] * $discount);?>
					<?$priceX42 = ($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key] * 4 * $discount2);?>
					<?$priceX22 = ($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key] * 2 * $discount2);?>
					<?$priceX12 = ($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key] * $discount2);?>
					<?$priceX43 = ($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key] * 4 * $discount3);?>
					<?$priceX23 = ($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key] * 2 * $discount3);?>
					<?$priceX13 = ($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key] * $discount3);?>
					<?$priceX44 = ($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key] * 4 * $discount4);?>
					<?$priceX24 = ($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key] * 2 * $discount4);?>
					<?$priceX14 = ($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key] * $discount4);?>
					<?$cpriceX1 = ($arResult["PROPERTIES"]["CROSSPRICE"]["VALUE"][$key] * $discount);?>
					
<tr style="outline: none medium;">
	<td style="outline: none medium;">
		 <?=$arResult["PROPERTIES"]["RADIUS"]["VALUE"][$key]?>
	</td>
   
	<td style="outline: none medium;">
    <?if($arResult["PROPERTIES"]["SHINOMO"]["VALUE"] == "Да"):?> 
		 <?if(!empty($arResult["PROPERTIES"]["AKCIYA"]["VALUE"])):?><span class="oldprice"><?=$arResult["PROPERTIES"]["PRICE"]["VALUE"][$key]?> (1шт.) | <?=$arResult["PROPERTIES"]["PRICE"]["VALUE"][$key] * 4?> комплект</span> <span class="newprice"><?=$priceX1?></span><?else:?><?=$priceX1?> (1шт.) | <?=$priceX1 * 4?> (4шт.)<?endif;?>
          <?else:?>
<?if(!empty($arResult["PROPERTIES"]["AKCIYA"]["VALUE"])):?>
<div class="tabedis"><span class="litlet">Без скидки</span><br><?=$arResult["PROPERTIES"]["PRICE"]["VALUE"][$key]?></div>
<div class="tabedis"><span class="seldisrt">-<?=$arResult["PROPERTIES"]["AKCIYA"]["VALUE"]?>%</span> <span class="litlet"><?=$arResult["PROPERTIES"]["NAKCIYA"]["~VALUE"]?></span> <br><span class="newprice"><?=$priceX1?></span></div>
<div class="tabedis"><span class="seldisrt">-<?=$arResult["PROPERTIES"]["AKCIYA2"]["VALUE"]?>%</span> <span class="litlet"><?=$arResult["PROPERTIES"]["NAKCIYA2"]["~VALUE"]?></span> <br><span class="newprice"><?=$priceX12?></span></div>
<div class="tabedis"><span class="seldisrt">-<?=$arResult["PROPERTIES"]["AKCIYA3"]["VALUE"]?>%</span> <span class="litlet"><?=$arResult["PROPERTIES"]["NAKCIYA3"]["~VALUE"]?></span> <br><span class="newprice"><?=$priceX13?></span></div>
		<div class="tabedis"><nobr><span class="seldisrt">-<?=$arResult["PROPERTIES"]["AKCIYA4"]["VALUE"]?>%</span> <span class="litlet"><?=$arResult["PROPERTIES"]["NAKCIYA4"]["~VALUE"]?></nobr></span> <br><span class="newprice"><?=$priceX14?></span></div>
<?else:?><?=$priceX1?><?endif;?>
             <?endif;?>
	</td>
<?if($arResult["PROPERTIES"]["NEDISK"]["VALUE"] == "Да"):?>
<?else:?>
<?if($arResult["PROPERTIES"]["SHINOMO"]["VALUE"] == "Да"):?>
<td style="outline: none medium;">
	<?if(!empty($arResult["PROPERTIES"]["AKCIYA"]["VALUE"])):?><span class="oldprice"><?=$arResult["PROPERTIES"]["CROSSPRICE"]["VALUE"][$key]?></span> <span class="newprice"><?=$cpriceX1?> (1шт.) | <?=$cpriceX1* 4?>(4шт.)</span><?else:?><?=$cpriceX1?> (1шт.) |  <?=$cpriceX1 * 4?>(4шт.)<?endif;?>			
</td>
 <?else:?>   
	<td style="outline: none medium;">
		<?if($arResult["PROPERTIES"]["MOTODISK"]["VALUE"] == "Да"):?>			
		<?if(!empty($arResult["PROPERTIES"]["AKCIYA"]["VALUE"])):?>
		<div class="tabedis"><span class="litlet">Без скидки</span><br><?=$arResult["PROPERTIES"]["PRICE"]["VALUE"][$key] * 2?></div>
		<div class="tabedis"><span class="litlet">Экономия</span> <span class="seldisrt"><?=$arResult["PROPERTIES"]["PRICE"]["VALUE"][$key] * 2 - $priceX2?></span><br><span class="newprice"><?=$priceX2?></span></div>
		<div class="tabedis"><span class="litlet">Экономия</span> <span class="seldisrt"><?=$arResult["PROPERTIES"]["PRICE"]["VALUE"][$key] * 2 - $priceX22?></span><br><span class="newprice"><?=$priceX22?></span></div>
		<div class="tabedis"><span class="litlet">Экономия</span> <span class="seldisrt"><?=$arResult["PROPERTIES"]["PRICE"]["VALUE"][$key] * 2 - $priceX23?></span><br><span class="newprice"><?=$priceX23?></span></div>
		<div class="tabedis"><span class="litlet">Экономия</span> <span class="seldisrt"><?=$arResult["PROPERTIES"]["PRICE"]["VALUE"][$key] * 2 - $priceX24?></span><br><span class="newprice"><?=$priceX24?></span></div>
		<?else:?><?=$priceX2?><?endif;?>			
		<?else:?>
		<?if($arResult["PROPERTIES"]["RADIUS"]["VALUE"][$key] == "Мото Диск"):?>
		<?if(!empty($arResult["PROPERTIES"]["AKCIYA"]["VALUE"])):?>
			<span class="oldprice"><?=$arResult["PROPERTIES"]["PRICE"]["VALUE"][$key] * 2?></span> <span class="newprice"><?=$priceX2?></span>
		<?else:?><?=$priceX2?><?endif;?>
<?else:?>
		<?if(!empty($arResult["PROPERTIES"]["AKCIYA"]["VALUE"])):?>
			<div class="tabedis"><span class="litlet">Без скидки</span><br><?=$arResult["PROPERTIES"]["PRICE"]["VALUE"][$key] * 4?></div>
			<div class="tabedis"><span class="litlet">Экономия</span> <span class="seldisrt"><?=$arResult["PROPERTIES"]["PRICE"]["VALUE"][$key] * 4 - $priceX4?></span><br><span class="newprice"><?=$priceX4?></span></div>
			<div class="tabedis"><span class="litlet">Экономия</span> <span class="seldisrt"><?=$arResult["PROPERTIES"]["PRICE"]["VALUE"][$key] * 4 - $priceX42?></span><br><span class="newprice"><?=$priceX42?></span></div>
			<div class="tabedis"><span class="litlet">Экономия</span> <span class="seldisrt"><?=$arResult["PROPERTIES"]["PRICE"]["VALUE"][$key] * 4 - $priceX43?></span><br><span class="newprice"><?=$priceX43?></span></div>
			<div class="tabedis"><span class="litlet">Экономия</span> <span class="seldisrt"><?=$arResult["PROPERTIES"]["PRICE"]["VALUE"][$key] * 4 - $priceX44?></span><br><span class="newprice"><?=$priceX44?></span></div>
		<?else:?><?=$priceX4?><?endif;?><?endif;?>						
		<?endif;?>
	</td>
<?endif;?><?endif;?>
</tr>
<?endforeach;?>
</tbody>
</table>
	<span style="font-size:11px"><?=$arResult["PROPERTIES"]["TABDESC"]["~VALUE"]?></span>
<?if(!empty($arResult["PROPERTIES"]["FIXPR"]["VALUE"])):?>
<p><h2 style="text-align:center;"><?=$arResult["PROPERTIES"]["FIXPR"]["~VALUE"]?>
<?if(!empty($arResult["PROPERTIES"]["AKCIYA"]["VALUE"])):?>
		<span style="color:red">СКИДКИ до <?=$arResult["PROPERTIES"]["AKCIYA4"]["VALUE"]?>%</span>
<?else:?><?endif;?>
</h2></p>

<table class="nceny" width="100%">
<tbody style="outline: none medium;">
<tr style="outline: none medium; background-color: #E4412F; color: #fff;" height="40px">
	<th style="outline: none medium;">
		 <?if($arResult["PROPERTIES"]["NEDISK"]["VALUE"] == "Да"):?>Количество<?else:?>Диаметр диска<?endif;?>
	</th>
	<th style="outline: none medium;">
		 <?if($arResult["PROPERTIES"]["NEDISK"]["VALUE"] == "Да"):?>Стоимость<?else:?>Цена за 1 диск (руб.)<?endif;?>
	</th>
<?if($arResult["PROPERTIES"]["NEDISK"]["VALUE"] == "Да"):?>
<?else:?>
	<th style="outline: none medium;">
		 Цена за комплект (руб.)
	</th>
<?endif;?>
</tr>
			<?foreach($arResult["PROPERTIES"]["PRICE"]["VALUE"] as $key1 => $arImage1):?>
					<?$spriceX4 = ($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key1] + $arResult["PROPERTIES"]["FIXSUM"]["VALUE"]) * 4 * $discount;?>
					<?$spriceX2 = ($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key1] + $arResult["PROPERTIES"]["FIXSUM"]["VALUE"]) * 2 * $discount;?>
					<?$spriceX1 = ($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key1] + $arResult["PROPERTIES"]["FIXSUM"]["VALUE"]) * $discount;?>
					<?$spriceX42 = ($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key1] + $arResult["PROPERTIES"]["FIXSUM"]["VALUE"]) * 4 * $discount2;?>
					<?$spriceX22 = ($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key1] + $arResult["PROPERTIES"]["FIXSUM"]["VALUE"]) * 2 * $discount2;?>
					<?$spriceX12 = ($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key1] + $arResult["PROPERTIES"]["FIXSUM"]["VALUE"]) * $discount2;?>
					<?$spriceX43 = ($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key1] + $arResult["PROPERTIES"]["FIXSUM"]["VALUE"]) * 4 * $discount3;?>
					<?$spriceX23 = ($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key1] + $arResult["PROPERTIES"]["FIXSUM"]["VALUE"]) * 2 * $discount3;?>
					<?$spriceX13 = ($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key1] + $arResult["PROPERTIES"]["FIXSUM"]["VALUE"]) * $discount3;?>
					<?$spriceX44 = ($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key1] + $arResult["PROPERTIES"]["FIXSUM"]["VALUE"]) * 4 * $discount4;?>
					<?$spriceX24 = ($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key1] + $arResult["PROPERTIES"]["FIXSUM"]["VALUE"]) * 2 * $discount4;?>
					<?$spriceX14 = ($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key1] + $arResult["PROPERTIES"]["FIXSUM"]["VALUE"]) * $discount4;?>
<tr style="outline: none medium;">
	<td style="outline: none medium;">
		 <?=$arResult["PROPERTIES"]["RADIUS"]["VALUE"][$key1]?>
	</td>
	<td style="outline: none medium;">
<?if(!empty($arResult["PROPERTIES"]["AKCIYA"]["VALUE"])):?>
<div class="tabedis"><span class="litlet">Без скидки</span><br><?=$arResult["PROPERTIES"]["PRICE"]["VALUE"][$key1]+ $arResult["PROPERTIES"]["FIXSUM"]["VALUE"]?></div>
<div class="tabedis"><span class="seldisrt">-<?=$arResult["PROPERTIES"]["AKCIYA"]["VALUE"]?>%</span> <span class="litlet"><?=$arResult["PROPERTIES"]["NAKCIYA"]["~VALUE"]?></span> <br><span class="newprice"><?=$spriceX1?></span></div>
<div class="tabedis"><span class="seldisrt">-<?=$arResult["PROPERTIES"]["AKCIYA2"]["VALUE"]?>%</span> <span class="litlet"><?=$arResult["PROPERTIES"]["NAKCIYA2"]["~VALUE"]?></span> <br><span class="newprice"><?=$spriceX12?></span></div>
<div class="tabedis"><span class="seldisrt">-<?=$arResult["PROPERTIES"]["AKCIYA3"]["VALUE"]?>%</span> <span class="litlet"><?=$arResult["PROPERTIES"]["NAKCIYA3"]["~VALUE"]?></span> <br><span class="newprice"><?=$spriceX13?></span></div>
		<div class="tabedis"><nobr><span class="seldisrt">-<?=$arResult["PROPERTIES"]["AKCIYA4"]["VALUE"]?>%</span> <span class="litlet"><?=$arResult["PROPERTIES"]["NAKCIYA4"]["~VALUE"]?></nobr></span> <br><span class="newprice"><?=$spriceX14?></span></div>
<?else:?><?=$spriceX1?><?endif;?>
	</td>
<?if($arResult["PROPERTIES"]["NEDISK"]["VALUE"] == "Да"):?>
<?else:?>
	<td style="outline: none medium;">
				<?if($arResult["PROPERTIES"]["MOTODISK"]["VALUE"] == "Да"):?>			
		<?if(!empty($arResult["PROPERTIES"]["AKCIYA"]["VALUE"])):?>
			<div class="tabedis"><span class="litlet">Без скидки</span><br><?=($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key1]+$arResult["PROPERTIES"]["FIXSUM"]["VALUE"]) * 2?></div>
			<div class="tabedis"><span class="litlet">Экономия</span> <span class="seldisrt"><?=($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key1]+$arResult["PROPERTIES"]["FIXSUM"]["VALUE"]) * 2 - $spriceX2?></span><br><span class="newprice"><?=$spriceX2?></span></div>
			<div class="tabedis"><span class="litlet">Экономия</span> <span class="seldisrt"><?=($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key1]+$arResult["PROPERTIES"]["FIXSUM"]["VALUE"]) * 2 - $spriceX22?></span><br><span class="newprice"><?=$spriceX22?></span></div>
			<div class="tabedis"><span class="litlet">Экономия</span> <span class="seldisrt"><?=($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key1]+$arResult["PROPERTIES"]["FIXSUM"]["VALUE"]) * 2 - $spriceX23?></span><br><span class="newprice"><?=$spriceX23?></span></div>
			<div class="tabedis"><span class="litlet">Экономия</span> <span class="seldisrt"><?=($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key1]+$arResult["PROPERTIES"]["FIXSUM"]["VALUE"]) * 2 - $spriceX24?></span><br><span class="newprice"><?=$spriceX24?></span></div>
		<?else:?><?=$spriceX2?><?endif;?>			
				<?else:?>
				<?if($arResult["PROPERTIES"]["RADIUS"]["VALUE"][$key1] == "Мото Диск"):?>
		<?if(!empty($arResult["PROPERTIES"]["AKCIYA"]["VALUE"])):?>
			<div class="tabedis"><span class="litlet">Без скидки</span><br><?=($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key1]+$arResult["PROPERTIES"]["FIXSUM"]["VALUE"]) * 2?></div>
			<div class="tabedis"><span class="litlet">Экономия</span> <span class="seldisrt"><?=($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key1]+$arResult["PROPERTIES"]["FIXSUM"]["VALUE"]) * 2 - $spriceX2?></span><br><span class="newprice"><?=$spriceX2?></span></div>
			<div class="tabedis"><span class="litlet">Экономия</span> <span class="seldisrt"><?=($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key1]+$arResult["PROPERTIES"]["FIXSUM"]["VALUE"]) * 2 - $spriceX22?></span><br><span class="newprice"><?=$spriceX22?></span></div>
			<div class="tabedis"><span class="litlet">Экономия</span> <span class="seldisrt"><?=($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key1]+$arResult["PROPERTIES"]["FIXSUM"]["VALUE"]) * 2 - $spriceX23?></span><br><span class="newprice"><?=$spriceX23?></span></div>
			<div class="tabedis"><span class="litlet">Экономия</span> <span class="seldisrt"><?=($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key1]+$arResult["PROPERTIES"]["FIXSUM"]["VALUE"]) * 2 - $spriceX24?></span><br><span class="newprice"><?=$spriceX24?></span></div>
		<?else:?><?=$spriceX2?><?endif;?>
		<?else:?>
		<?if(!empty($arResult["PROPERTIES"]["AKCIYA"]["VALUE"])):?>
			<div class="tabedis"><span class="litlet">Без скидки</span><br><?=($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key1]+$arResult["PROPERTIES"]["FIXSUM"]["VALUE"]) * 4?></div>
			<div class="tabedis"><span class="litlet">Экономия</span> <span class="seldisrt"><?=($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key1]+$arResult["PROPERTIES"]["FIXSUM"]["VALUE"]) * 4 - $spriceX4?></span><br><span class="newprice"><?=$spriceX4?></span></div>
			<div class="tabedis"><span class="litlet">Экономия</span> <span class="seldisrt"><?=($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key1]+$arResult["PROPERTIES"]["FIXSUM"]["VALUE"]) * 4 - $spriceX42?></span><br><span class="newprice"><?=$spriceX42?></span></div>
			<div class="tabedis"><span class="litlet">Экономия</span> <span class="seldisrt"><?=($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key1]+$arResult["PROPERTIES"]["FIXSUM"]["VALUE"]) * 4 - $spriceX43?></span><br><span class="newprice"><?=$spriceX43?></span></div>
			<div class="tabedis"><span class="litlet">Экономия</span> <span class="seldisrt"><?=($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key1]+$arResult["PROPERTIES"]["FIXSUM"]["VALUE"]) * 4 - $spriceX44?></span><br><span class="newprice"><?=$spriceX44?></span></div>
		<?else:?><?=$spriceX4?><?endif;?><?endif;?>						
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
</div>
<div style="text-align:center;">
<a class="btn opener" style="line-height: 14px;" onclick="yaCounter16377226.reachGoal('ZAKAZ'); return true;">ЗАКАЗАТЬ</a>
</div>
<?endif;?>

<?if(!empty($arResult["PROPERTIES"]["OPRICE"]["VALUE"])):?>
<div class="body_inner">
<div class="title_h2"><h2>Смотрите также:</h2></div>
<?foreach($arResult["PROPERTIES"]["OPRICE"]["VALUE"] as $analog):?> 
<?$res = CIBlockElement::GetByID($analog);?> 
<?if($ar_res = $res->GetNext())?> 
<ul class="check"><li><b><a href='<?=$ar_res["DETAIL_PAGE_URL"];?>'><?=$ar_res["NAME"];?></a></b></li></ul> 
	<?endforeach;?>
				<?endif;?>
</div>
<?if(!empty($arResult["PROPERTIES"]["RCAT"]["VALUE"])):?>

<div class="body_inner">
<div class="title_h2"><h2>Примеры работ:</h2></div>

	<div class="owl-carousel-random-works">	
	<?foreach($arResult['RANDOM_WORKS_IMG'] as $key => $arWorks):?>

<div class="flip-container" ontouchstart="this.classList.toggle('hover');">
<a class="" href="<?=$arResult['RANDOM_WORKS'][$key]["DETAIL_PAGE_URL"]?>">
	<div class="flipper">
		<div class="front">
			<img src="<?=$arWorks["SRC"]?>" alt="<?=$arResult['RANDOM_WORKS'][$key]["NAME"]?>" title="<?=$arResult['RANDOM_WORKS'][$key]["NAME"]?>">
		</div>
		<div class="back">
						<?if(!empty($arResult['RANDOM_WORKS_IMG2'][$key]["SRC"])):?>
							<img src="<?=$arResult['RANDOM_WORKS_IMG2'][$key]["SRC"]?>" alt="<?=$arResult['RANDOM_WORKS'][$key]["NAME"]?>" title="<?=$arResult['RANDOM_WORKS'][$key]["NAME"]?>">
						<?else:?>
							<img src="<?=$arWorks["SRC"]?>" alt="<?=$arResult['RANDOM_WORKS'][$key]["NAME"]?>" title="<?=$arResult['RANDOM_WORKS'][$key]["NAME"]?>">
						<?endif;?>
		</div>
	</div>
</a>
</div>

	<?endforeach;?>
	</div>
	</div>
<?else:?>
<?endif;?>


<?$APPLICATION->IncludeFile(
	SITE_TEMPLATE_PATH."/include_areas/podpiska.php",
	Array(), //переменные
	Array(
	"MODE" => "html",                                  // будет редактировать в веб-редакторе
	"NAME" => "Редактирование"      // имя шаблона для нового файла
	)
);?>
		<?if (is_array($arResult["PROPERTIES"]["QUESTIONS"]["VALUE"])):?>
<div class="body_inner">
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
</div>
		<?endif;?>

	</div>
	<div class="clear"></div>