<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<ul>

<?
$previousLevel = 0;
foreach($arResult as $arItem):
?>
<?$req_url = $APPLICATION->GetCurDir();?>

	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>
	
	<?if ($arItem["DEPTH_LEVEL"] == 1):?>
			<?$level2_req_url = $arItem["LINK"];?>
			<li class="flevel <?if ((eregi($level2_req_url, $req_url) )):?>lact<?endif;?>"><a href="<?=$arItem["LINK"]?>" class="item2level item2level_photo <?if (eregi($level2_req_url, $req_url)):?>item2level-selected<?endif;?>"><?=$arItem["TEXT"]?></a>
	<?endif?>
	
	<?if ($arItem["DEPTH_LEVEL"] == 2):?>
		<?$level3_req_url = $arItem["LINK"];?>
			<li class="slevel <?if (eregi($level3_req_url, $req_url)):?>slact<?endif;?>"><a href="<?=$arItem["LINK"]?>" class="item3level"><?=$arItem["TEXT"]?></a>
	<?endif?>
	
	<?if ($arItem["PARAMS"]["IS_PARENT"] == 1):?>
		<?if ($arItem["DEPTH_LEVEL"] == 2):?>
			<?if ((eregi($level2_req_url, $req_url)) || ($arItem["SELECTED"] == 1)):?>
				<ul>
			<?else:?>
				<ul style="display: none;">
			<?endif;?>
		<?else:?>
		<ul>
		<?endif;?>
	<?endif;?>
<?$previousLevel = $arItem["DEPTH_LEVEL"];?>
<?endforeach?>

<?if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
<?endif?>

</ul>
<?endif?>
