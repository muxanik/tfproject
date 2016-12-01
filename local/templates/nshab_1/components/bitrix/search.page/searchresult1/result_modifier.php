<?
if (count($arResult["SEARCH"]) > 0) {
 
    $arIDs = array();
    foreach ($arResult["SEARCH"] as $si => $arItem) {
        if ($arItem["MODULE_ID"] == "iblock" && substr($arItem["ITEM_ID"], 0, 1) !== "S") {
            // связь: iblock_id => id : search_id
            $arIDs[ $arItem['PARAM2'] ][ $arItem["ITEM_ID"] ] = $si;
        }
    }
 
    CModule::IncludeModule('iblock');
 
    foreach ($arIDs as $iblockId => $searchIds) {
        // для инфоблоков 2.0 передавать IBLOCK_ID для выбора свойств обязательно
        $grab = CIBlockElement::GetList(array(), array(
            "IBLOCK_ID"     => $iblockId,
            "ID"             => array_keys($searchIds)
        ), false, false, array(
            "ID",
            "IBLOCK_ID",
            "DETAIL_PICTURE",
            // Указываем необходимые свойства, в данном случае PHONE
            "PROPERTY_IMAGES"
        ));
        while ($ar = $grab->Fetch()) {
            $ar['PICTURE'] = CFile::GetFileArray($ar["DETAIL_PICTURE"]);
 			$ar['PPICTURE'] = CFile::GetFileArray($ar["PROPERTY_IMAGES_VALUE"]);
            $si = $arIDs[ $iblockId ][ $ar["ID"] ];
            $arResult["SEARCH"][ $si ]["ELEMENT"] = $ar;
        }
    }
}
?>