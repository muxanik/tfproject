<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<ul id="vertical-multilevel-menu">

<?
$previousLevel = 0;
foreach($arResult as $arItem):
?>
<?$req_url = $APPLICATION->GetCurDir();?>

	<?if ($previousLevel && $arItem["PARAMS"]["LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["PARAMS"]["LEVEL"]));?>
	<?endif?>

	<?if ($arItem["PARAMS"]["LEVEL"] == 1):?>
		<?if ($arItem["PARAMS"]["NO_LINK"] == 1):?>
			<li><a class="root-item"><?=$arItem["TEXT"]?></a>
		<?else:?>
			<li><a href="<?=$arItem["LINK"]?>" class="root-item"><?=$arItem["TEXT"]?></a>
		<?endif;?>
	<?endif?>
	
	<?if ($arItem["PARAMS"]["LEVEL"] == 2):?>
			<?$level2_req_url = $arItem["LINK"];?>
			<li><a href="<?=$arItem["LINK"]?>" class="item2level <?if (($arItem["PARAMS"]["IS_PARENT"] == 1) && (eregi($level2_req_url, $req_url)) ):?>item2level-selected<?endif;?>"><?=$arItem["TEXT"]?></a>
	<?endif?>
	
	<?if ($arItem["PARAMS"]["LEVEL"] == 3):?>
			<li><a href="<?=$arItem["LINK"]?>" class="item3level"><?=$arItem["TEXT"]?></a>
	<?endif?>
	
	<?if ($arItem["PARAMS"]["IS_PARENT"] == 1):?>
		<?if ($arItem["PARAMS"]["LEVEL"] == 2):?>
			<?if ((eregi($level2_req_url, $req_url)) || ($arItem["SELECTED"] == 1)):?>
				<ul>
			<?else:?>
				<ul style="display: none;">
			<?endif;?>
		<?else:?>
		<ul>
		<?endif;?>
	<?endif;?>
<?$previousLevel = $arItem["PARAMS"]["LEVEL"];?>
<?endforeach?>

<?if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
<?endif?>

</ul>
<?endif?>
