<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/vlightbox1.css" type="text/css" />
<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/visuallightbox.css" type="text/css" media="screen" />

<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/visuallightbox.js"></script>


<table style="width: 650px;" border="0" align="right">
<tbody>
<?
foreach($arResult["SECTIONS"] as $cell=>$arSection):
	$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
	$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));	
?>
	<?if($cell%2 == 0):?>
	<tr>
	<?endif;?>

	<td style="width: 47%;" valign="top" id="<?=$this->GetEditAreaId($arSection['ID']);?>">
		<h1>
			<div style="color: #000000; text-align: left;">
				<img style="float: left; margin-right: 15px;" src="<?=SITE_TEMPLATE_PATH?>/img/006_1.gif" alt="" width="10" height="39">
				<?=$arSection["NAME"]?>
			</div>
		</h1>
		<p>
			<a class="qw" href="<?=$arSection["SECTION_PAGE_URL"]?>"><img src="<?=$arSection["PICTURE"]["SRC"]?>" alt="" width="250" height="200"></a>
		</p>
		<p>
			<a class="qw" href="<?=$arSection["SECTION_PAGE_URL"]?>">Смотреть фотографии...</a>
		</p>
	</td>
	<?if($cell%2 == 0):?>
		<td style="width: 6%;">&nbsp;</td>
	<?endif;?>

	<?$cell++;
	if($cell%2 == 0):?>
		</tr>
		<tr>
			<td><br><br></td>
			<td style="width: 6%;">&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
	<?endif?>

<?endforeach; // foreach($arResult["ITEMS"] as $arElement):?>

	<?if($cell%2 != 0):?>
		<?while(($cell++)%2 != 0):?>
			<td>&nbsp;</td>
		<?endwhile;?>
		</tr>
	<?endif?>
</tbody>
</table>


<!-- Стандартный шаблон -->
<?if(0):?>
<div class="catalog-section-list">
<ul>
<?
$CURRENT_DEPTH=$arResult["SECTION"]["DEPTH_LEVEL"]+1;
foreach($arResult["SECTIONS"] as $arSection):
	$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
	$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));
	if($CURRENT_DEPTH<$arSection["DEPTH_LEVEL"])
		echo "<ul>";
	elseif($CURRENT_DEPTH>$arSection["DEPTH_LEVEL"])
		echo str_repeat("</ul>", $CURRENT_DEPTH - $arSection["DEPTH_LEVEL"]);
	$CURRENT_DEPTH = $arSection["DEPTH_LEVEL"];
?>
	<li id="<?=$this->GetEditAreaId($arSection['ID']);?>"><a href="<?=$arSection["SECTION_PAGE_URL"]?>"><?=$arSection["NAME"]?><?if($arParams["COUNT_ELEMENTS"]):?>&nbsp;(<?=$arSection["ELEMENT_CNT"]?>)<?endif;?></a></li>
<?endforeach?>
</ul>
</div>
<?endif;?>