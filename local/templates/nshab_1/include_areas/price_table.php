

<div class="col-2">
		<div class="col-2-div uslugi">
	<div class="priceu">
		<div class="pricep respt">
 <span id="ot">От</span> <span id="odometer" class="odometer"><?=$arResult["PROPERTIES"]["PRICE"]["VALUE"][0]?></span> ₽
		</div>
 <a class="btn" href="#subm" style="line-height: 14px;" onclick="yaCounter16377226.reachGoal('ZAKAZ'); return true;">ЗАКАЗАТЬ</a> <a href="/akcii/" class="btn" style="line-height: 14px;" onclick="yaCounter16377226.reachGoal('SKIDKA'); return true;">ХОЧУ СКИДКУ</a>
	</div>
</div>

		<noindex><div class="col-2-div uslugi" style="float:right;">
			<div class="tabs_conteiner">
			<div class="tabs_header1"><?=$arResult["PROPERTIES"]["HEADER1"]["~VALUE"]?></div>
			<?if($arResult["PROPERTIES"]["NEDISK"]["VALUE"] == "Да"):?>
			<div class="tabs_header2">расчет стоиомсти работ</div>
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
					<?$priceX4 = ($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key] * 4);?>
					<?$priceX2 = ($arResult["PROPERTIES"]["PRICE"]["VALUE"][$key] * 2);?>
				<?if($arResult["PROPERTIES"]["NEDISK"]["VALUE"] == "Да"):?>
				<div id="tabs-<?=$key?>"><span style="color:#000;">стоимость:</span> <?=$arResult["PROPERTIES"]["PRICE"]["VALUE"][$key]?> руб.</div>
				<?else:?>

				<?if($arResult["PROPERTIES"]["MOTODISK"]["VALUE"] == "Да"):?>			
				<div id="tabs-<?=$key?>"><span style="color:#000;">за 1 диск:</span> <?=$arResult["PROPERTIES"]["PRICE"]["VALUE"][$key]?> руб. <br /><span style="color:#000;">за 2 диска:</span> <?=$priceX2?> руб.</div>			
				<?else:?>
				<div id="tabs-<?=$key?>"><span style="color:#000;">за 1 диск:</span> <?=$arResult["PROPERTIES"]["PRICE"]["VALUE"][$key]?> руб. <br /><span style="color:#000;">за 4 диска:</span> <?=$priceX4?> руб.</div>						
				<?endif;?><?endif;?>	
			<?endforeach;?>
<?if($arResult["PROPERTIES"]["NOCALC"]["VALUE"] == "Да"):?>
				<span></span>
<?else:?>
<div class="btncalc"><a class="btn respd" onclick="yaCounter16377226.reachGoal('CALC'); return true;" id="calculator-main-mini-goto-calculator" href="/calculator/">Расширенный калькулятор</a></div>
<?endif;?>
			</div>
		</div>
		</div></noindex>
	</div>
<div class="clear">
</div>

