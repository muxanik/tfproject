<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
CModule::IncludeModule("iblock");
//получаем пользовательское свойство keywords
$result=CIBlockSection::GetList(
Array(), 
Array("IBLOCK_ID"=>$arResult["SECTION"]["PATH"][0]["IBLOCK_ID"], "ID"=>$arResult["SECTION"]["PATH"][0]["ID"]),
false, 
Array("UF_KEYWORDS")
);
 
if($res=$result->GetNext()){
	//echo "<pre style='display:none;'>"; print_r($res); echo "</pre>";
	$arResult["SECTION"]["PATH"][0]["UF_KEYWORDS"] = $res["UF_KEYWORDS"];
}
?>