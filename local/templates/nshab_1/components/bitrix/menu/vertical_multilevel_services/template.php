<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<ul>

<?
$previousLevel = 0;
foreach($arResult as $arItem):
?>
<?$req_url = $APPLICATION->GetCurDir();?>

	<?if ($previousLevel && $arItem["PARAMS"]["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["PARAMS"]["DEPTH_LEVEL"]));?>
	<?endif?>
	
	<?if ($arItem["PARAMS"]["DEPTH_LEVEL"] == 1):?>
		<?if ($arItem["PARAMS"]["IS_PARENT"] == 1):?>
			<?$level2_req_url = $arItem["LINK"];?>

			<li class="flevel <?if (($arItem["PARAMS"]["IS_PARENT"] == 1) && ( eregi($level2_req_url, $req_url) )):?>lact<?endif;?>"><a href="<?=$arItem["LINK"]?>" class="item2level <?if (($arItem["PARAMS"]["IS_PARENT"] == 1) && ( eregi($level2_req_url, $req_url) )):?>item2level-selected<?endif;?>"><?=$arItem["TEXT"]?></a>

		<?endif?>	
	<?endif?>

	<?if ($arItem["PARAMS"]["DEPTH_LEVEL"] == 2 and $level2_req_url != "/services/services-for-car-brands/"):?>
		<?$level3_req_url = $arItem["LINK"];?>
			<li class="slevel <?if (eregi($level3_req_url, $req_url)):?>slact<?endif;?>"><a href="<?=$arItem["LINK"]?>" class="item3level <?if (eregi($level3_req_url, $req_url)):?>item2level-selected<?endif;?>"><?=$arItem["TEXT"]?></a>
	<?endif?>
	
	<?if ($arItem["PARAMS"]["IS_PARENT"] == 1):?>
		<?if ($arItem["PARAMS"]["DEPTH_LEVEL"] == 1):?>
			<?if ((eregi($level2_req_url, $req_url)) || ($arItem["SELECTED"] == 1)):?>
				<ul>
			<?else:?>
				<ul style="display: none;">
			<?endif;?>
		<?else:?>

		<ul>
		<?endif;?>
	<?endif;?>
<?$previousLevel = $arItem["PARAMS"]["DEPTH_LEVEL"];?>
<?endforeach?>
<?if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
<?endif?>

</ul>
<?endif?>
<li class="flevel"><a class="item2level " href="/dostavka/">Доставка</a></li>

<?
/*
<?if( (eregi('/services/zerkalnaya-polirovka/', $level2_req_url)) || (eregi('/services/Pokraska_diskov/', $level2_req_url)) ):?>
	<ul>
*/?>