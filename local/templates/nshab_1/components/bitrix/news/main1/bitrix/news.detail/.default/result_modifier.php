<?$arSort      = Array("SORT"=>"ASC", "ID"=>"DESC");
$arSelect   = Array("ID", "NAME", "DETAIL_PAGE_URL", "DETAIL_PICTURE");
$arFilter   = Array (
   "IBLOCK_ID" => $arResult["IBLOCK_ID"],
   "SECTION_ID" => $arResult["IBLOCK_SECTION_ID"],
   "ACTIVE" => "Y",
   "CHECK_PERMISSIONS" => "Y",
);

$arNavParams   = Array("nPageSize" => 1, "nElementID" => $arResult["ID"]);
$arItems      = Array();
$rsElement   = CIBlockElement::GetList($arSort, $arFilter, false, $arNavParams, $arSelect);

while($arElement = $rsElement->GetNext()) {
   $arItems[] = $arElement;
}

if(count($arItems)==3) {
   $arResult["TOLEFT"]      = Array("NAME"=>$arItems[0]["NAME"], "URL"=>$arItems[0]["DETAIL_PAGE_URL"], "PIC"=>$arItems[0]["DETAIL_PICTURE"]);
   $arResult["TORIGHT"]   = Array("NAME"=>$arItems[2]["NAME"], "URL"=>$arItems[2]["DETAIL_PAGE_URL"], "PIC"=>$arItems[2]["DETAIL_PICTURE"]);
} elseif(count($arItems)==2) {
   if($arItems[0]["ID"]!=$arResult["ID"]) {
      $arResult["TOLEFT"] = Array("NAME"=>$arItems[0]["NAME"], "URL"=>$arItems[0]["DETAIL_PAGE_URL"], "PIC"=>$arItems[0]["DETAIL_PICTURE"]);
   } else {
      $arResult["TORIGHT"] = Array("NAME"=>$arItems[1]["NAME"], "URL"=>$arItems[1]["DETAIL_PAGE_URL"], "PIC"=>$arItems[1]["DETAIL_PICTURE"]);
   }
}
?>