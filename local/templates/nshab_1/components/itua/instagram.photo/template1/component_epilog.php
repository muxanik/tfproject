<?

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

if($arParams["INCLUDE_JQUERY"] == "Y")
{
    CJSCore::Init(array("jquery"));
}
global $APPLICATION;
$APPLICATION->AddHeadScript($templateFolder."/slick.min.js");