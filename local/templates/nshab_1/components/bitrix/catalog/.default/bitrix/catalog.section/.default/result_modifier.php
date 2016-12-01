<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

foreach ($arResult['ITEMS'] as $key => $arElement) {
	if(is_array($arElement["DETAIL_PICTURE"])) {
		$arFilter = '';
		$arFileTmp = CFile::ResizeImageGet(
				$arElement['DETAIL_PICTURE'],
				array("width" => "413", "height" => "413"),
				BX_RESIZE_IMAGE_EXACT,
				true, $arFilter
		);
		$arResult['ITEMS'][$key]['PICTURE_PREVIEW'] = array(
				'SRC' => $arFileTmp["src"],
				'WIDTH' => $arFileTmp["width"],
				'HEIGHT' => $arFileTmp["height"],
		);
	}
	
	if(is_array($arElement["PROPERTIES"]["IMAGES"])) {
		foreach ($arElement["PROPERTIES"]["IMAGES"]["VALUE"] as $key1 => $arImage) {
			$arFilter = '';
			$arFileTmp = CFile::ResizeImageGet(
					$arImage,
					array("width" => "413", "height" => "413"),
					BX_RESIZE_IMAGE_EXACT,
					true, $arFilter
			);
			$arResult['ITEMS'][$key]['PICTURE_FOR_SLIDER']["VALUE"][$key1] = array(
					'SRC' => $arFileTmp["src"],
					'WIDTH' => $arFileTmp["width"],
					'HEIGHT' => $arFileTmp["height"],
			);
		}
	}
}

?>