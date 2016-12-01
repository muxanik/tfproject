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

<?
	$myJJTriger = 0;
?>
	

<div class="col-2">
<div style="margin-bottom: 15px; font-size: 24px; font-weight: bold; color: #D32F2F;">Действующие акции:</div>
	<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	
	<?
	$myDateVacantionNow = new DateTime("now"); 
	$myDateVacantionEnd2 = new DateTime($arItem["PROPERTIES"]["DATE"]["VALUE"]); 
	$dteDiff = $myDateVacantionNow->diff($myDateVacantionEnd2); 
	$myDateVacantionResult = $dteDiff->format('%R%a');
	?>

	<?if($myDateVacantionResult >= "0"):?>

	<div class="" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<div style="padding-bottom:10px;">
			<?$big_src = CFile::GetPath($arItem["PROPERTIES"]["BGPIC"]["VALUE"]);?>

			<div class="borderg effect2" style="overflow:hidden;">
				<div style="padding:10px; <?if(!empty($arItem["PROPERTIES"]["BGPIC"]["VALUE"])):?>background-image:url(<?=$big_src?>);<?endif;?><?if(!empty($arItem["PROPERTIES"]["BGCOLOR"]["VALUE"])):?>background-color:#<?=$arItem["PROPERTIES"]["BGCOLOR"]["VALUE"];?><?endif;?>">
					<div style="text-align:center;background: rgba(255, 255, 255, 0.71);margin: -10px;padding: 5px;">
						<a class="newst qw" style="font-size:24px;" href="<?=$arItem["DETAIL_PAGE_URL"]?>">
							<b><?echo $arItem["NAME"]?></b>
						</a>
					</div>
					<br>

					<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
						<img src="<?=$arItem['PICTURE_PREVIEW']['SRC']?>" width="100%" align="left" style="margin-right:10px; marker-offset:10px" alt="<?=$arItem["NAME"]?>"  title="<?=$arItem["NAME"]?>">
						<div class="newsh"><a class="btn" href="<?=$arItem["DETAIL_PAGE_URL"]?>">ПОДРОБНЕЕ</a></div>
					</a>

					<span class="datev">Дата начала акции <?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span>
					
					<?if(!empty($arItem["PROPERTIES"]["DATE"]["VALUE"])):?>
					
					<div class="col-2">
						<div class="col-2-div">
							<div class="inform" style="background: rgba(255, 255, 255, 0.89);"><p style="font-size:18px;">ДО КОНЦА АКЦИИ ОСТАЛОСЬ:</p></div>
						</div>
<script>
	jQuery(document).ready(function($){  
		$("#first_countdown_<?=$arItem['ID']?>").ResponsiveCountdown({
			target_date:"<?=date("Y/n/j H:i:s", strtotime($arItem["PROPERTIES"]["DATE"]["VALUE"]))?>",
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
						<div class="col-2-div">
							<div id="first_countdown_<?=$arItem['ID']?>" style="position: relative; width: 100%; height: 50px;"></div>
						</div>
					</div>
					<?endif;?>
					<font style="font-size:14px; font-family: Trebuchet MS, sans-serif; text-decoration: none;"><?echo $arItem["PREVIEW_TEXT"];?></font>
				</div>
			</div>
		</div>
	</div>
	
	<?else:?>
	
		<?if($myJJTriger == 0):?>
			<div style="margin-bottom: 15px; font-size: 24px; font-weight: bold; color: #D32F2F;">Архив акций:</div>
		<?endif;?>
	
			<div id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<div><a href="<?=$arItem["DETAIL_PAGE_URL"];?>"><?=$arItem["NAME"];?></a></div>
			</div>
	
		<?$myJJTriger++;?>
	<?endif;?>
	
	<p></p>
	<?endforeach;?>
	<div class="clear"></div>
	<div class="news_pagenav">
		<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
			<?=$arResult["NAV_STRING"]?>
		<?endif;?>
	</div>
</div>