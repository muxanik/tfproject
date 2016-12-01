<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?$APPLICATION->SetPageProperty("title", $arResult["NAME"]);?>

<div class="question_catalog catalog-element catalog-element-services">
	<div class="catalog_element_right">
		<div class="catalog_element_header">Вопрос:</div>
		<div class="catalog_element_text"><?=$arResult["~PREVIEW_TEXT"]?></div>
		<div class="catalog_element_header catalog_element_header2">Ответ:</div>
		<div class="catalog_element_text"><?=$arResult["~DETAIL_TEXT"]?></div>	
	</div>
	<div class="clear"></div>
</div>