<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arTemplateParameters = array(
    "THEME" => Array(
        "PARENT" => "BASE",
        "NAME" => GetMessage("THEME"),
        "TYPE" => "LIST",
        "VALUES" => array(
            'blue' => GetMessage('BLUE_THEME'),
            'red' => GetMessage('RED_THEME'),
            'green' => GetMessage('GREEN_THEME'),
            'black' => GetMessage('BLACK_THEME'),
            'yellow' => GetMessage('YELLOW_THEME'),
        ),
        "DEFAULT" => "blue",
        "SORT"  => 15,
    ),
    "SHOW_AVA" => array(
        "PARENT" => "ADDITIONAL_GROUP",
        "NAME" => GetMessage("SHOW_AVA"),
        "TYPE" => "CHECKBOX",
        "DEFAULT" => "Y",
    ),
    "AVA" => Array(
        "PARENT" => "ADDITIONAL_GROUP",
        "NAME" => GetMessage("FILE_PATH_AVA"),
        "TYPE" => "FILE",
        "FD_TARGET" => "F",
        "FD_EXT" => "jpg,jpeg,gif,png",
        "FD_UPLOAD" => true,
        "FD_USE_MEDIALIB" => true,
        "FD_MEDIALIB_TYPES" => Array('images'),
        "DEFAULT" => "",
        "REFRESH" => "Y"
    ),
    "SHOW_DATE" => array(
        "PARENT" => "ADDITIONAL_GROUP",
        "NAME" => GetMessage("SHOW_DATE"),
        "TYPE" => "CHECKBOX",
        "DEFAULT" => "Y",
    ),
    "WIDTH" => array(
        "PARENT" => "ADDITIONAL_GROUP",
        "NAME" => GetMessage("WIDTH"),
        "TYPE" => "STRING",
        "DEFAULT" => "840px",
    )
);
?>
