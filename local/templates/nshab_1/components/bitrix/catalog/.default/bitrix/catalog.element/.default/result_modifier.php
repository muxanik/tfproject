<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->__component->SetResultCacheKeys(array(
    "NAME",
    "PREVIEW_TEXT",
    "PICTURE_PREVIEW"
));

if(is_array($arResult["DETAIL_PICTURE"])) {
	$arFilter = '';
	$arFileTmp = CFile::ResizeImageGet(
			$arResult['DETAIL_PICTURE'],
			array("width" => "833", "height" => "833"),
			BX_RESIZE_IMAGE_EXACT,
			true, $arFilter
	);
	$arResult['PICTURE_PREVIEW'] = array(
			'SRC' => $arFileTmp["src"],
			'WIDTH' => $arFileTmp["width"],
			'HEIGHT' => $arFileTmp["height"],
	);
}

if(is_array($arResult["PROPERTIES"]["IMAGES"])) {
	foreach ($arResult["PROPERTIES"]["IMAGES"]["VALUE"] as $key1 => $arImage) {
		$arFilter = '';
		$arFileTmp = CFile::ResizeImageGet(
				$arImage,
				array("width" => "833", "height" => "833"),
				BX_RESIZE_IMAGE_EXACT,
				true, $arFilter
		);
		$arResult['PICTURE_FOR_SLIDER']["VALUE"][$key1] = array(
				'SRC' => $arFileTmp["src"],
				'WIDTH' => $arFileTmp["width"],
				'HEIGHT' => $arFileTmp["height"],
		);
	}
}


$res = CIBlockElement::GetList(
	array("ID" => "DESC", "SORT" => "ACS"),
	array('IBLOCK_ID' => $arResult['IBLOCK_ID'],"SECTION_ID" =>$arResult['SECTION']['ID'],'ACTIVE' => 'Y'),
	false,
	array('nPageSize' => 1, 'nElementID' => $arResult['ID']),
	array('ID', 'IBLOCK_ID', 'DETAIL_PAGE_URL', 'DETAIL_PICTURE', 'NAME')
);
$arResult['PREVNEXT'] = array();
$_found = 0;
while($ob = $res->GetNextElement()) {
	$arElems = $ob->GetFields();
//$arResult['PREVNEXT2'][] = $arElems;
	if($arElems['ID'] == $arResult['ID']){
		$_found = 1;
		continue;
	}
	
	$arFilter = '';
	$arFileTmp = CFile::ResizeImageGet(
		$arElems["DETAIL_PICTURE"],
		array("width" => "300", "height" => "300"),
		BX_RESIZE_IMAGE_EXACT,
		true, $arFilter
	);
	
	$arElems['~DETAIL_PAGE_URL'] = preg_replace("#/fotogalereja/[\w-]+/#", "/fotogalereja/" . $arResult['SECTION']['CODE'] . "/", $arElems['DETAIL_PAGE_URL']);
	if($_found == 0 && $arElems['ID'] != $arResult['ID'] && !isset($arResult['PREVNEXT']['PREV'])){
		$arResult['PREVNEXT']['PREV'] = $arElems;
		$arResult['PREV_PICTURE_PREVIEW'] = array(
				'SRC' => $arFileTmp["src"],
				'WIDTH' => $arFileTmp["width"],
				'HEIGHT' => $arFileTmp["height"],
		);
	}
	if($_found == 1 && $arElems['ID'] != $arResult['ID'] && !isset($arResult['PREVNEXT']['NEXT'])){
		$arResult['PREVNEXT']['NEXT'] = $arElems;
		$arResult['NEXT_PICTURE_PREVIEW'] = array(
				'SRC' => $arFileTmp["src"],
				'WIDTH' => $arFileTmp["width"],
				'HEIGHT' => $arFileTmp["height"],
		);
	}

}


$arSelect = Array("ID", "NAME", "DETAIL_PAGE_URL", "DETAIL_PICTURE");
$arFilter = Array('IBLOCK_ID' => $arResult['IBLOCK_ID'], "ACTIVE"=>"Y", "SECTION_ID" => $arResult['SECTION']['ID']);
$res = CIBlockElement::GetList(Array("RAND" => "ASC"), $arFilter, false, Array("nPageSize"=>5), $arSelect);
$iii = 0;
while($ob = $res->GetNextElement()) {
	$arFields = $ob->GetFields();
	$arProps = $ob->GetProperty("IMAGES");
	$arResult['RANDOM_WORKS'][$iii] = $arFields;
	$arResult['RANDOM_WORKS2'][$iii] = $arProps;
	$iii++;
}


if(is_array($arResult["RANDOM_WORKS"])) {
	foreach ($arResult["RANDOM_WORKS"] as $key1 => $arImage) {
		$arFilter = '';
		$arFileTmp = CFile::ResizeImageGet(
				$arImage['DETAIL_PICTURE'],
				array("width" => "260", "height" => "260"),
				BX_RESIZE_IMAGE_EXACT,
				true, $arFilter
		);
		$arResult['RANDOM_WORKS_IMG'][$key1] = array(
				'SRC' => $arFileTmp["src"],
				'WIDTH' => $arFileTmp["width"],
				'HEIGHT' => $arFileTmp["height"],
		);
		
		$arFileTmp2 = CFile::ResizeImageGet(
				$arResult['RANDOM_WORKS2'][$key1]["VALUE"][0],
				array("width" => "260", "height" => "260"),
				BX_RESIZE_IMAGE_EXACT,
				true, $arFilter
		);
		$arResult['RANDOM_WORKS_IMG2'][$key1] = array(
				'SRC' => $arFileTmp2["src"],
				'WIDTH' => $arFileTmp2["width"],
				'HEIGHT' => $arFileTmp2["height"],
		);
		
	}
}

?>
<?$res = CIBlockElement::GetByID($arResult["ID"]); if($ar_res = $res->GetNext(false,false))$arResult["SHOW_COUNTER"] = $ar_res["SHOW_COUNTER"]; ?> 
<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$arResult['META_KEYS'] = array();

if ($arResult['SECTION']['NAME']){
   $arResult['META_KEYS']['GROUP_NAME'] = $arResult['SECTION']['NAME'];
}

if ($arResult['SECTION']['ID'] && $arResult['SECTION']['DEPTH_LEVEL'] > 1){
   $nav = CIBlockSection::GetNavChain($arParams['IBLOCK_ID'], $arResult['SECTION']['ID']);
   if($arNav = $nav->fetch()){
      $arResult['META_KEYS']['BRAND'] = $arNav['NAME'];
   }
}
$cp = $this->__component;

if (is_object($cp))
{
   $cp->SetResultCacheKeys(array('META_KEYS'));
}
?>