<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$arSelect = Array("ID", "NAME", "DETAIL_PAGE_URL", "DETAIL_PICTURE");
$arFilter = Array('IBLOCK_ID' => "5", "ACTIVE"=>"Y", "SECTION_ID" => $arResult['PROPERTIES']['RCAT']['VALUE']);
$res = CIBlockElement::GetList(Array("RAND" => "ASC"), $arFilter, false, Array("nPageSize"=>5), $arSelect);
$iii = 0;
while($ob = $res->GetNextElement()) {
	$arFields = $ob->GetFields();
	$arResult['RANDOM_WORKS'][$iii] = $arFields;
	$iii++;
}

if(is_array($arResult["RANDOM_WORKS"])) {
	foreach ($arResult["RANDOM_WORKS"] as $key1 => $arImage) {
		$arFilter = '';
		$arFileTmp = CFile::ResizeImageGet(
				$arImage['DETAIL_PICTURE'],
				array("width" => "400", "height" => "400"),
				BX_RESIZE_IMAGE_EXACT,
				true, $arFilter
		);
		$arResult['RANDOM_WORKS_IMG'][$key1] = array(
				'SRC' => $arFileTmp["src"],
				'WIDTH' => $arFileTmp["width"],
				'HEIGHT' => $arFileTmp["height"],
		);
	}
}
?>
