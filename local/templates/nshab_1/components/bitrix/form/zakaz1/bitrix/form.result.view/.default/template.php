<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?=$arResult["FormErrors"]?><?=$arResult["FORM_NOTE"]?>
<?
if ($arResult["isAccessFormResultEdit"] == "Y" && strlen($arParams["EDIT_URL"]) > 0) 
{
	$href = $arParams["SEF_MODE"] == "Y" ? str_replace("#RESULT_ID#", $arParams["RESULT_ID"], $arParams["EDIT_URL"]) : $arParams["EDIT_URL"].(strpos($arParams["EDIT_URL"], "?") === false ? "?" : "&")."RESULT_ID=".$arParams["RESULT_ID"]."&WEB_FORM_ID=".$arParams["WEB_FORM_ID"];
?>
<p>
[ <a href="<?=$href?>"><?=GetMessage("FORM_EDIT")?></a> 
</p>
<?
}
?>

<?
if ($arParams["SHOW_STATUS"] == "Y")
{
?>
<p>
<b><?=GetMessage("FORM_CURRENT_STATUS")?></b> [<span class='<?=$arResult["RESULT_STATUS_CSS"]?>'><?=$arResult["RESULT_STATUS_TITLE"]?></span>]
</p>
<?
}
?>
<div id="ele1" style="line-height:14px;width: 697px;">
<div style="text-align: center;">
  <p style="font-size:24px;">Бланк заказа (счет форма)</p>
</div>
 <div style="float:left; white-space:nowrap;"><img src="http://thomifelgen.ru/bitrix/templates/thomifelgen/img/logo.png" width="183" height="70"> +7 (495) 979-20-01</div>
<div style="float:right;">Заявка №<br>
<table width="200" border="1" cellpadding="1" cellspacing="1" align="left"> 
  <tbody> 
    <tr><td height="28"><strong><?=$arResult["RESULT"]["SIMPLE_QUESTION_520"]["ANSWER_VALUE"]["0"]["USER_TEXT"]?></strong></td></tr>
   </tbody>
 </table><br><br>
 Дата: <?=$arResult["RESULT_DATE_CREATE"]?>
</div>
 <div style="clear:both;"></div>
<div style="text-align: left;float:left;line-height: 37px;">ID пункта приема </div>
 
<table width="200" border="1" cellpadding="1" cellspacing="1" align="left" style="margin: 4px;"> 
  <tbody> 
    <tr><td height="24"><?=$arResult["RESULT"]["SIMPLE_QUESTION_404"]["ANSWER_VALUE"]["0"]["USER_TEXT"]?></td><td><?=$arResult["RESULT"]["SIMPLE_QUESTION_692"]["ANSWER_VALUE"]["0"]["USER_TEXT"]?></td></tr>
   </tbody>
 </table>
 
<div style="clear:both;"></div>
 

 
<table width="424" border="1" cellpadding="1" cellspacing="1" align="left"> 
  <tbody> 
    <tr><td width="180">ФИО/Название фирмы</td><td width="216"><strong><?=$arResult["RESULT"]["SIMPLE_QUESTION_864"]["ANSWER_VALUE"]["0"]["USER_TEXT"]?></strong></td></tr>
   
    <tr><td>Телефон</td><td><strong><?=$arResult["RESULT"]["SIMPLE_QUESTION_792"]["ANSWER_VALUE"]["0"]["USER_TEXT"]?></strong></td></tr>
   
    <tr><td>Email</td><td><strong><?=$arResult["RESULT"]["SIMPLE_QUESTION_104"]["ANSWER_VALUE"]["0"]["USER_TEXT"]?></strong></td></tr>
   
    <tr><td height="58">Дополнительная информация</td><td><?=$arResult["RESULT"]["SIMPLE_QUESTION_257"]["ANSWER_VALUE"]["0"]["USER_TEXT"]?></td></tr>
  </tbody>
 </table>
	<div style="line-height:16px;padding:0 0 0 430px;">
ТС:<strong><?=$arResult["RESULT"]["SIMPLE_QUESTION_647"]["ANSWER_VALUE"]["0"]["ANSWER_TEXT"]?></strong><br>
Кол-во дисков/деталей:<strong><?=$arResult["RESULT"]["SIMPLE_QUESTION_485"]["ANSWER_VALUE"]["0"]["USER_TEXT"]?></strong><br>
<?if($arResult["RESULT"]["SIMPLE_QUESTION_647"]["ANSWER_VALUE"]["0"]["ANSWER_TEXT"] == "Другое"):?><?else:?>Марка дисков:<strong><?=$arResult["RESULT"]["SIMPLE_QUESTION_352"]["ANSWER_VALUE"]["0"]["USER_TEXT"]?> R<?=$arResult["RESULT"]["SIMPLE_QUESTION_204"]["ANSWER_VALUE"]["0"]["ANSWER_TEXT"]?></strong><br><?endif;?>
Марка ТС:<strong><?=$arResult["RESULT"]["SIMPLE_QUESTION_195"]["ANSWER_VALUE"]["0"]["USER_TEXT"]?></strong><br>
<?if($arResult["RESULT"]["SIMPLE_QUESTION_647"]["ANSWER_VALUE"]["0"]["ANSWER_TEXT"] == "Другое"):?><?else:?>Материал дисков:<strong><?=$arResult["RESULT"]["SIMPLE_QUESTION_194"]["ANSWER_VALUE"]["0"]["ANSWER_TEXT"]?></strong><br>     
Колпачки:<strong><?=$arResult["RESULT"]["SIMPLE_QUESTION_614"]["ANSWER_VALUE"]["0"]["ANSWER_TEXT"]?></strong> (кол-во:<strong><?=$arResult["RESULT"]["SIMPLE_QUESTION_880"]["ANSWER_VALUE"]["0"]["USER_TEXT"]?></strong>)<br>
Части диска:<strong><?=$arResult["RESULT"]["SIMPLE_QUESTION_975"]["ANSWER_VALUE"]["0"]["ANSWER_TEXT"]?></strong><br>
Ниппель:<strong><?=$arResult["RESULT"]["SIMPLE_QUESTION_141"]["ANSWER_VALUE"]["0"]["ANSWER_TEXT"]?></strong><?endif;?>
	</div><div style="clear:both;"></div>
<div style="width:100%">
		<br></div>
	<div style="width:100%; line-height:18px;">
    <?if(empty($arResult["RESULT"]["SIMPLE_QUESTION_320"]["ANSWER_VALUE"]["0"]["USER_TEXT"])):?><?else:?>
    <div style="width: 24%; float:left;margin: 2px;border: 1px solid;padding: 2px;height: 135px;font-size: 12px;position:relative;">
<span style="font-size:16px;"><div style="position:absolute;right: 0;top: 0;width: 30px;"><img style="width: 30px;" src="/upload/medialibrary/c58/pokraska.png"></div>Покраска:</span><br><?foreach($arResult["RESULT"]["SIMPLE_QUESTION_882"]["ANSWER_VALUE"]as $key => $arAnswer):?>
				<?if (strlen($arAnswer["ANSWER_TEXT"])>0):?>
				<strong><span style="color: black; font-size:12px;" class="glyphicon el-icon-ok-circle"></span><?=$arAnswer["ANSWER_TEXT"]?></strong>
					<?if (strlen($arAnswer["ANSWER_VALUE"])>0):?> (<strong><?=$arAnswer["ANSWER_VALUE"]?></strong>)<?endif?>

				<?endif;?> 

	<?endforeach;?> 
	<br>Цвет:<strong><?=$arResult["RESULT"]["SIMPLE_QUESTION_365"]["ANSWER_VALUE"]["0"]["USER_TEXT"]?></strong><br>Лак:<strong><?=$arResult["RESULT"]["SIMPLE_QUESTION_215"]["ANSWER_VALUE"]["0"]["ANSWER_TEXT"]?></strong><br>
<?if(empty($arResult["RESULT"]["SIMPLE_QUESTION_320_2NxRM"]["ANSWER_VALUE"]["0"]["USER_TEXT"])):?><?else:?>
Маскировка + <?=$arResult["RESULT"]["SIMPLE_QUESTION_320_2NxRM"]["ANSWER_VALUE"]["0"]["USER_TEXT"]?><br>
<?endif;?>
<div style="position:absolute;bottom: 0;width: 100%;border: 1px solid;margin: 0px 2px 0px -2px;">    
Стоимость покраски:<br><strong><?=$arResult["RESULT"]["SIMPLE_QUESTION_320"]["ANSWER_VALUE"]["0"]["USER_TEXT"]?>+<?=$arResult["RESULT"]["SIMPLE_QUESTION_320_2NxRM"]["ANSWER_VALUE"]["0"]["USER_TEXT"]?> х <?=$arResult["RESULT"]["SIMPLE_QUESTION_485"]["ANSWER_VALUE"]["0"]["USER_TEXT"]?> = <?=$arResult["RESULT"]["SIMPLE_QUESTION_320"]["ANSWER_VALUE"]["0"]["USER_TEXT"]*$arResult["RESULT"]["SIMPLE_QUESTION_485"]["ANSWER_VALUE"]["0"]["USER_TEXT"]?></strong></div><br></div><?endif;?>
<?if(empty($arResult["RESULT"]["SIMPLE_QUESTION_881"]["ANSWER_VALUE"]["0"]["USER_TEXT"])):?><?else:?>
<div style="width: 24%; float:left;margin: 2px;border: 1px solid;padding: 2px;height: 135px;font-size: 12px;position:relative;">

<span style="font-size:16px;"><div style="position:absolute;right: 0;top: 0;width: 30px;"><img style="width: 30px;" src="/upload/medialibrary/02c/polirovka.png"></div>Полировка:</span><br>
<?foreach($arResult["RESULT"]["SIMPLE_QUESTION_983"]["ANSWER_VALUE"] as $key => $arAnswer):?> 
				<?if (strlen($arAnswer["ANSWER_TEXT"])>0):?>
				<strong><span style="color: black; font-size:12px;" class="glyphicon el-icon-ok-circle"></span><?=$arAnswer["ANSWER_TEXT"]?></strong>
					<?if (strlen($arAnswer["ANSWER_VALUE"])>0):?> (<strong><?=$arAnswer["ANSWER_VALUE"]?></strong>)<?endif?>

				<?endif;?> 

	<?endforeach;?>
<br>
<br>Лак:<strong><?=$arResult["RESULT"]["SIMPLE_QUESTION_215"]["ANSWER_VALUE"]["0"]["ANSWER_TEXT"]?></strong><br>
<div style="position:absolute;bottom: 0;width: 100%;border: 1px solid;margin: 0px 2px 0px -2px;"> 
Стоимость полировки:<br><strong><?=$arResult["RESULT"]["SIMPLE_QUESTION_881"]["ANSWER_VALUE"]["0"]["USER_TEXT"]?> х <?=$arResult["RESULT"]["SIMPLE_QUESTION_485"]["ANSWER_VALUE"]["0"]["USER_TEXT"]?> = <?=$arResult["RESULT"]["SIMPLE_QUESTION_881"]["ANSWER_VALUE"]["0"]["USER_TEXT"]*$arResult["RESULT"]["SIMPLE_QUESTION_485"]["ANSWER_VALUE"]["0"]["USER_TEXT"]?></strong></div></div><?endif;?>


<?if($arResult["RESULT"]["SIMPLE_QUESTION_466"]["ANSWER_VALUE"]["0"]["ANSWER_TEXT"] == "нет"):?><?else:?>
<div style="width: 24%; float:left;margin: 2px;border: 1px solid;padding: 2px;height: 135px;font-size: 12px;position:relative;">
<span style="font-size:16px;"><div style="position:absolute;right: 0;top: 0;width: 30px;"><img style="width: 30px;" src="/upload/medialibrary/72b/remont.png"></div>Ремонт дисков:</span><br><strong><?=$arResult["RESULT"]["SIMPLE_QUESTION_466"]["ANSWER_VALUE"]["0"]["ANSWER_TEXT"]?></strong><br>
<?if(empty($arResult["RESULT"]["SIMPLE_QUESTION_394"]["ANSWER_VALUE"]["0"]["USER_TEXT"])):?>
<?else:?>
Количество: <strong><?=$arResult["RESULT"]["SIMPLE_QUESTION_883"]["ANSWER_VALUE"]["0"]["USER_TEXT"]?></strong> 
<br>
<div style="position:absolute;bottom: 0;width: 100%;border: 1px solid;margin: 0px 2px 0px -2px;"> 
Стоимость ремонта:<br><strong><?=$arResult["RESULT"]["SIMPLE_QUESTION_394"]["ANSWER_VALUE"]["0"]["USER_TEXT"]?> х <?=$arResult["RESULT"]["SIMPLE_QUESTION_883"]["ANSWER_VALUE"]["0"]["USER_TEXT"]?> = <?=$arResult["RESULT"]["SIMPLE_QUESTION_394"]["ANSWER_VALUE"]["0"]["USER_TEXT"]*$arResult["RESULT"]["SIMPLE_QUESTION_883"]["ANSWER_VALUE"]["0"]["USER_TEXT"]?></strong></div><?endif;?></div><?endif;?>
<?if(empty($arResult["RESULT"]["SIMPLE_QUESTION_879"]["ANSWER_VALUE"]["0"]["USER_TEXT"])):?><?else:?>
<div style="width: 24%; float:left;margin: 2px;border: 1px solid;padding: 2px;height: 135px;font-size: 12px;position:relative;">
<span style="font-size:16px;"><div style="position:absolute;right: 0;top: 0;width: 30px;"><img style="width: 30px;" src="/upload/medialibrary/f41/shinomontag.png"></div>Шиномонтаж:</span><br><strong><?foreach($arResult["RESULT"]["SIMPLE_QUESTION_430"]["ANSWER_VALUE"]as $key => $arAnswer):?>
				<?if (strlen($arAnswer["ANSWER_TEXT"])>0):?>
				<strong><span style="color: black; font-size:12px;" class="glyphicon el-icon-ok-circle"></span><?=$arAnswer["ANSWER_TEXT"]?></strong>
					<?if (strlen($arAnswer["ANSWER_VALUE"])>0):?> (<strong><?=$arAnswer["ANSWER_VALUE"]?></strong>)<?endif?>

				<?endif;?> 

	<?endforeach;?>;</strong><br>Количество: <strong><?=$arResult["RESULT"]["SIMPLE_QUESTION_885"]["ANSWER_VALUE"]["0"]["USER_TEXT"]?></strong>
    <?if(empty($arResult["RESULT"]["SIMPLE_QUESTION_879"]["ANSWER_VALUE"]["0"]["USER_TEXT"])):?>
<?else:?>
<br>
<div style="position:absolute;bottom: 0;width: 100%;border: 1px solid;margin: 0px 2px 0px -2px;"> 
Стоимость шиномонтажа:<br><strong><?=$arResult["RESULT"]["SIMPLE_QUESTION_879"]["ANSWER_VALUE"]["0"]["USER_TEXT"]?> х <?=$arResult["RESULT"]["SIMPLE_QUESTION_885"]["ANSWER_VALUE"]["0"]["USER_TEXT"]?> = <?=$arResult["RESULT"]["SIMPLE_QUESTION_879"]["ANSWER_VALUE"]["0"]["USER_TEXT"]*$arResult["RESULT"]["SIMPLE_QUESTION_885"]["ANSWER_VALUE"]["0"]["USER_TEXT"]?></strong><?endif;?></div></div><br><?endif;?>
</div>
<div style="clear:both;"></div>

	<div style="float:left;width:100%;line-height:11px;">
Комментарий:<strong><?=$arResult["RESULT"]["SIMPLE_QUESTION_793"]["ANSWER_VALUE"]["0"]["USER_TEXT"]?></strong><br>
	<p style="border-bottom:1px solid;">Дополнительная информация: <strong><?=$arResult["RESULT"]["SIMPLE_QUESTION_884"]["ANSWER_VALUE"]["0"]["USER_TEXT"]?></strong></p>
	
<div style="clear:both;"></div>

<table width="100%" border="0" cellpadding="1" cellspacing="6" align="left" style="font-size: 13px;"">
<tbody>
<tr>
<td width="33%"> <br>Подитог:
   <table width="100%" border="1" cellpadding="1" cellspacing="1" align="left">
  <tbody> 
    <tr>
      <td height="28"><strong><?=$arResult["RESULT"]["SIMPLE_QUESTION_602"]["ANSWER_VALUE"]["0"]["USER_TEXT"]?>
      </strong></td></tr>
  </tbody>
	   </table>
</td>
<td width="22%">
<?if(empty($arResult["RESULT"]["SIMPLE_QUESTION_886"]["ANSWER_VALUE"]["0"]["USER_TEXT"])):?>
<?else:?>
Скидка на основные услуги:
   <table width="100%" border="1" cellpadding="1" cellspacing="1" align="left">
  <tbody> 
    <tr>
      <td height="28"><strong><?=$arResult["RESULT"]["SIMPLE_QUESTION_886"]["ANSWER_VALUE"]["0"]["USER_TEXT"]?>%</strong></i> - <?=($arResult["RESULT"]["SIMPLE_QUESTION_320"]["ANSWER_VALUE"]["0"]["USER_TEXT"]+$arResult["RESULT"]["SIMPLE_QUESTION_881"]["ANSWER_VALUE"]["0"]["USER_TEXT"])*$arResult["RESULT"]["SIMPLE_QUESTION_485"]["ANSWER_VALUE"]["0"]["USER_TEXT"]*($arResult["RESULT"]["SIMPLE_QUESTION_886"]["ANSWER_VALUE"]["0"]["USER_TEXT"]/100)?>
      </strong></td></tr>
  </tbody>
	   </table><?endif;?>
</td>
<td width="22%">
<?if(empty($arResult["RESULT"]["SIMPLE_QUESTION_887"]["ANSWER_VALUE"]["0"]["USER_TEXT"])):?>
<?else:?>
 <br>Скидка на ремонт:
  <table width="100%" border="1" cellpadding="1" cellspacing="1" align="left">
  <tbody> 
    <tr>
      <td height="28"><strong><?=$arResult["RESULT"]["SIMPLE_QUESTION_887"]["ANSWER_VALUE"]["0"]["USER_TEXT"]?>%</strong></i> - <?=$arResult["RESULT"]["SIMPLE_QUESTION_394"]["ANSWER_VALUE"]["0"]["USER_TEXT"]*$arResult["RESULT"]["SIMPLE_QUESTION_883"]["ANSWER_VALUE"]["0"]["USER_TEXT"]*($arResult["RESULT"]["SIMPLE_QUESTION_887"]["ANSWER_VALUE"]["0"]["USER_TEXT"]/100)?></strong></td></tr>
  </tbody>
	   </table><?endif;?>
</td>
<td width="22%">
<?if(empty($arResult["RESULT"]["SIMPLE_QUESTION_888"]["ANSWER_VALUE"]["0"]["USER_TEXT"])):?>
<?else:?>
Скидка на шиномонтаж:
  <table width="100%" border="1" cellpadding="1" cellspacing="1" align="left">
  <tbody> 
    <tr>
      <td height="28"><strong><?=$arResult["RESULT"]["SIMPLE_QUESTION_888"]["ANSWER_VALUE"]["0"]["USER_TEXT"]?>%</strong></i> - <?=$arResult["RESULT"]["SIMPLE_QUESTION_879"]["ANSWER_VALUE"]["0"]["USER_TEXT"]*$arResult["RESULT"]["SIMPLE_QUESTION_885"]["ANSWER_VALUE"]["0"]["USER_TEXT"]*($arResult["RESULT"]["SIMPLE_QUESTION_888"]["ANSWER_VALUE"]["0"]["USER_TEXT"]/100)?>
            </strong></td></tr>
  </tbody>
	   </table><?endif;?>
</td>
</tr>
</tbody>
</table>
<div style="clear:both;"></div>
<table width="100%" border="0" cellpadding="1" cellspacing="6" align="left" style="font-size: 13px;"">
<tbody>
<tr>
<td width="33%">Предварительная стоимость услуг: 
   <table width="100%" border="1" cellpadding="1" cellspacing="1" align="left">
  <tbody> 
    <tr>
      <td height="28"><strong><?=$arResult["RESULT"]["SIMPLE_QUESTION_954"]["ANSWER_VALUE"]["0"]["USER_TEXT"]?>
      </strong></td></tr>
  </tbody>
	   </table>
</td>
<td width="66%">
<?if(empty($arResult["RESULT"]["SIMPLE_QUESTION_886"]["ANSWER_VALUE"]["0"]["USER_TEXT"]) && empty($arResult["RESULT"]["SIMPLE_QUESTION_887"]["ANSWER_VALUE"]["0"]["USER_TEXT"]) && empty($arResult["RESULT"]["SIMPLE_QUESTION_888"]["ANSWER_VALUE"]["0"]["USER_TEXT"])):?>
<?else:?>
Сумма скидки:
   <table width="100%" border="1" cellpadding="1" cellspacing="1" align="left">
  <tbody> 
    <tr>
      <td height="28"><strong><?=($arResult["RESULT"]["SIMPLE_QUESTION_320"]["ANSWER_VALUE"]["0"]["USER_TEXT"]+$arResult["RESULT"]["SIMPLE_QUESTION_881"]["ANSWER_VALUE"]["0"]["USER_TEXT"])*$arResult["RESULT"]["SIMPLE_QUESTION_485"]["ANSWER_VALUE"]["0"]["USER_TEXT"]*($arResult["RESULT"]["SIMPLE_QUESTION_886"]["ANSWER_VALUE"]["0"]["USER_TEXT"]/100)+$arResult["RESULT"]["SIMPLE_QUESTION_394"]["ANSWER_VALUE"]["0"]["USER_TEXT"]*$arResult["RESULT"]["SIMPLE_QUESTION_883"]["ANSWER_VALUE"]["0"]["USER_TEXT"]*($arResult["RESULT"]["SIMPLE_QUESTION_887"]["ANSWER_VALUE"]["0"]["USER_TEXT"]/100)+$arResult["RESULT"]["SIMPLE_QUESTION_879"]["ANSWER_VALUE"]["0"]["USER_TEXT"]*$arResult["RESULT"]["SIMPLE_QUESTION_885"]["ANSWER_VALUE"]["0"]["USER_TEXT"]*($arResult["RESULT"]["SIMPLE_QUESTION_888"]["ANSWER_VALUE"]["0"]["USER_TEXT"]/100)?>
      </strong><?endif;?></td></tr>
  </tbody>
	   </table>
</td>
</tr>
  </tbody>
	   </table>
</td>
</tr>
</tbody>
</table>
 <div style="clear:both;width:0px;padding:0;margin:0;"></div>

 <table width="100%" border="0" cellpadding="1" cellspacing="6" align="left" style="font-size: 13px;">
 <tbody>
 
<tr><td width="33%">Предоплата: <table width="100%" border="1" cellpadding="1" cellspacing="1" align="left"> 
  <tbody> 
    <tr>
      <td height="28"><strong><?=$arResult["RESULT"]["SIMPLE_QUESTION_900"]["ANSWER_VALUE"]["0"]["USER_TEXT"]?></strong>  
      <?if(empty($arResult["RESULT"]["SIMPLE_QUESTION_900"]["ANSWER_VALUE"]["0"]["USER_TEXT"])):?>Нет<?else:?>
      <?if($arResult["RESULT"]["SIMPLE_QUESTION_889"]["ANSWER_VALUE"]["0"]["ANSWER_TEXT"] == "Да"):?>Оплата картой<?else:?>Наличный расчет
      <?endif;?><?endif;?>
      </td></tr>
  </tbody>
</table></td>
	<td width="33%" style="text-align: center;padding: 29px 15px 0 15px;"><p style="margin:2px;border-bottom:1px solid;line-height:10px;"></p>
		<span style="font-size:12px;">подпись заказчика/ФИО</span></td><td style="text-align: center;padding: 29px 15px 0 15px;"><p style="margin:2px;border-bottom:1px solid;line-height:10px;"></p>
		<span style="font-size:12px;">Подпись принимающего</span></td></tr>
<tr><td>Осталось оплатить: <table width="100%" border="1" cellpadding="1" cellspacing="1" align="left"> 
  <tbody> 
    <tr>
      <td height="28"><strong><?=$arResult["RESULT"]["SIMPLE_QUESTION_954"]["ANSWER_VALUE"]["0"]["USER_TEXT"] - $arResult["RESULT"]["SIMPLE_QUESTION_900"]["ANSWER_VALUE"]["0"]["USER_TEXT"]?>
      </strong></td></tbody>
</table><td style="text-align: center;">Ориентировочная дата выдачи<br><strong><?=$arResult["RESULT"]["SIMPLE_QUESTION_473"]["ANSWER_VALUE"]["0"]["USER_TEXT"]?></strong></td>
<td>М.П.</td></tr>

<tbody>
</table><br><br><br><br>
<span style="font-size: 12px;">Претензий к качеству выполненных работ и внешнему виду дисков (цвет, блеск и т.п.) не имею _________________</span><br>
<div style="width:100%;border: 1px solid #797878;margin:10px 0 0 0;text-align: center;">
	<span style="font-size:17px; line-height:17px;color: #000000;">После завершения работ по Вашему заказу, нам будет приятно, если Вы оставите отзыв на нашем сайте в разделе www.thomifelgen.ru/otzyvy. Мы постоянно совершенстуем наши технологии для Вас и нам важно знать Ваше мнение. <br>Спасибо что выбрали мастерскую Thomi Felgen! </span>
 </div>
</div>

<br><br>
<div style="text-align:center"><button class="print-link no-print btn" onclick="jQuery('#ele1').print()">
                Распечатать
	</button></div>