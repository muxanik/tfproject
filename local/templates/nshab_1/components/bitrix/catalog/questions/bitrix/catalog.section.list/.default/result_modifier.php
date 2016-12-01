<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

foreach ($arResult['SECTIONS'] as $key => $arElement) {
	if(is_array($arElement["PICTURE"])) {
		$arFilter = '';
		$arFileTmp = CFile::ResizeImageGet(
				$arElement['PICTURE'],
				array("width" => "320", "height" => "320"),
				BX_RESIZE_IMAGE_EXACT,
				true, $arFilter
		);
		$arResult['SECTIONS'][$key]['PICTURE_PREVIEW'] = array(
				'SRC' => $arFileTmp["src"],
				'WIDTH' => $arFileTmp["width"],
				'HEIGHT' => $arFileTmp["height"],
		);
	}
}

?>