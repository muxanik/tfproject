<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

foreach ($arResult['ITEMS'] as $key => $arElement) {
	if(is_array($arElement["DETAIL_PICTURE"])) {
		$arFilter = '';
		$arFileTmp = CFile::ResizeImageGet(
				$arElement["DETAIL_PICTURE"],
				array("width" => "600", "height" => "304"),
				BX_RESIZE_IMAGE_EXACT,
				true, $arFilter
		);
		$arResult['ITEMS'][$key]['PICTURE_PREVIEW'] = array(
				'SRC' => $arFileTmp["src"],
				'WIDTH' => $arFileTmp["width"],
				'HEIGHT' => $arFileTmp["height"],
		);
	}
}

?>