<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arTemplateParameters = array(
	"FORM_NAME" => Array(
		"NAME" => GetMessage("WSM_CALLBAKPRO_FORM_NAME"),
		"TYPE" => "STRING",
		"DEFAULT" => GetMessage("WSM_CALLBAKPRO_FORM_NAME_DEFAULT"),
	),
	"LINK_TEXT" => Array(
		"NAME" => GetMessage("WSM_CALLBAKPRO_LINK_TEXT"),
		"TYPE" => "STRING",
		"DEFAULT" => GetMessage("WSM_CALLBAKPRO_LINK_TEXT_DEFAULT"),
	),
	"DESC_TEXT" => Array(
		"NAME" => GetMessage("WSM_CALLBAKPRO_DESC_TEXT"),
		"TYPE" => "STRING",
		"DEFAULT" => GetMessage("WSM_CALLBAKPRO_DESC_TEXT_DEFAULT"),
		),
		
	"WORK_TIME_FROM" => Array(
		"NAME" => GetMessage("WSM_CALLBAKPRO_WORK_TIME_FROM"),
		"TYPE" => "STRING",
		"DEFAULT" => 8,
		),
	
	"WORK_TIME_TO" => Array(
		"NAME" => GetMessage("WSM_CALLBAKPRO_WORK_TIME_TO"),
		"TYPE" => "STRING",
		"DEFAULT" => 18,
		),
);
?>
