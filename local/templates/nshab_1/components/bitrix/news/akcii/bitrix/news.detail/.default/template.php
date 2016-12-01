<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
$APPLICATION->AddHeadString('<meta property="og:title" content="' . $arResult["NAME"] . '" />');
$APPLICATION->AddHeadString('<meta property = "og:type" content = "article" />');
$APPLICATION->AddHeadString('<meta property="og:image" content="http://thomifelgen.ru' . $arResult['DETAIL_PICTURE']['SRC'] . '" />');

$myDateVacantionNow = new DateTime("now"); 
$myDateVacantionEnd2 = new DateTime($arResult["PROPERTIES"]["DATE"]["VALUE"]); 
$dteDiff = $myDateVacantionNow->diff($myDateVacantionEnd2); 
$myDateVacantionResult = $dteDiff->format('%R%a');

?>


<div class="newsd body_inner">
<?$APPLICATION->GetCurUri();?>
	<?if(!empty($arResult["PROPERTIES"]["DATE"]["VALUE"])):?>
		<?if($myDateVacantionResult >= "0"):?>
<img class="detail_picture" border="0" src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>" height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>" alt="<?=$arResult["NAME"]?>"  title="<?=$arResult["NAME"]?>" />

	<div class="inform"><p style="font-size:18px;">ДО КОНЦА АКЦИИ ОСТАЛОСЬ:</p></div>

<script>
 jQuery(document).ready(function($){  
$("#first_countdown").ResponsiveCountdown({
   target_date:"<?=date("Y/n/j H:i:s", strtotime($arResult["PROPERTIES"]["DATE"]["VALUE"]))?>",
   time_zone:0,target_future:true,
   set_id:0,pan_id:0,day_digits:2,
   fillStyleSymbol1:"rgba(135, 36, 55, 1)",
   fillStyleSymbol2:"rgba(63, 66, 89, 1)",
   fillStylesPanel_g1_1:"rgba(255, 255, 255, 1)",
   fillStylesPanel_g1_2:"rgba(215, 215, 232, 1)",
   fillStylesPanel_g2_1:"rgba(255, 255, 255, 1)",
   fillStylesPanel_g2_2:"rgba(215, 215, 232, 1)",
   text_color:"rgba(75, 85, 99, 1)",
   text_glow:"rgba(255, 255, 255, 1)",
   show_ss:true,show_mm:true,
   show_hh:true,show_dd:true,
   f_family:"Verdana",show_labels:true,
   type3d:"single",max_height:300,
   days_long:"ДНЕЙ",days_short:"dd",
   hours_long:"ЧАСОВ",hours_short:"hh",
   mins_long:"МИНУТ",mins_short:"mm",
   secs_long:"СЕКУНД",secs_short:"ss",
   min_f_size:8,max_f_size:30,
   spacer:"squares",groups_spacing:3,text_blur:2,
   font_to_digit_ratio:0.1,labels_space:1.2
});
 });  
</script>
<div id="first_countdown" style="position: relative; width: 100%; height: 50px;"></div>

<?else:?>
	<div style="position:relative">
	<img style="position:absolute;width: 44% !important;left: 18%;top: 23%;" border="0" src="http://thomifelgen.ru/upload/medialibrary/038/action_completed.png">
<img class="detail_picture" border="0" src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>" height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>" alt="<?=$arResult["NAME"]?>"  title="<?=$arResult["NAME"]?>" />
	<div class="inform"><p style="font-size:18px; text-align: center;">Акция закончилась <span style="font-size:12px;">(Период проведения с <?=date("d.m.Y", strtotime($arResult["ACTIVE_FROM"]))?> по <?=date("d.m.Y", strtotime($arResult["PROPERTIES"]["DATE"]["VALUE"]))?>)</span></p></div>
	</div>
	<?endif;?>

<?endif;?>
				<?echo $arResult["DETAIL_TEXT"];?>
</div>
