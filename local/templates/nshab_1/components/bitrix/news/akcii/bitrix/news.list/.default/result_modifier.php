<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

foreach ($arResult['ITEMS'] as $key => $arElement) {
	if(is_array($arElement["PREVIEW_PICTURE"])) {
		$arFilter = '';
		$arFileTmp = CFile::ResizeImageGet(
				$arElement["PREVIEW_PICTURE"],
				array("width" => "833", "height" => "1000"),
				BX_RESIZE_IMAGE_PROPORTIONAL,
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