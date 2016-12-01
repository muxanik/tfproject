<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>

<?
if(CModule::IncludeModule("alexkova.megametatags")){
   $arKeys = array();
   foreach($arResult['META_KEYS'] as $key=>$nameKey){
      $arKeys[] = array("KEY"=>$key,"VALUE"=>$nameKey,"WHERE_SET"=>$this);   
   }
   if ($arKeys){
      CMegaMetaKeys::setKeys($arKeys);      
   }
}



?>
<div class="body_inner">
<?$APPLICATION->IncludeComponent(
	"api:main.feedback", 
	"seryi", 
	array(
		"IBLOCK_TYPE" => "products",
		"IBLOCK_ID" => "5",
		"INSTALL_IBLOCK" => "N",
		"DISABLE_SEND_MAIL" => "N",
		"REPLACE_FIELD_FROM" => "Y",
		"UNIQUE_FORM_ID" => "54f37938d7cd9",
		"OK_TEXT" => "Спасибо, ваше обращение #TICKET_ID# принято.",
		"EMAIL_TO" => "info@thomifelgen.ru",
		"DISPLAY_FIELDS" => array(
			0 => "AUTHOR_NAME",
			1 => "AUTHOR_EMAIL",
			2 => "AUTHOR_PERSONAL_MOBILE",
			3 => "AUTHOR_MESSAGE",
		),
		"REQUIRED_FIELDS" => array(
			0 => "AUTHOR_NAME",
			1 => "AUTHOR_EMAIL",
		),
		"CUSTOM_FIELDS" => array(
			0 => "Скрытое поле@input@hidden@value=Значение поля по умолчанию",
			1 => "Выберите радиус@select@values=(не установлено)#13#14#15#16#17#18#19#20#21#22#23#24#25#26",
			2 => "Диски хромированы?@input@radio@values=Нет#Да#Частично",
			3 => "",
		),
		"ADMIN_EVENT_MESSAGE_ID" => array(
			0 => "28",
		),
		"USER_EVENT_MESSAGE_ID" => array(
			0 => "27",
		),
		"HIDE_FIELD_NAME" => "N",
		"TITLE_DISPLAY" => "Y",
		"FORM_TITLE" => "Узнать стоимость",
		"FORM_TITLE_LEVEL" => "1",
		"FORM_STYLE_TITLE" => "",
		"FORM_STYLE" => "text-align:left;",
		"FORM_STYLE_DIV" => "overflow:hidden;padding:5px;",
		"FORM_STYLE_LABEL" => "display: block;min-width:175px;margin-bottom: 3px;float:left;",
		"FORM_STYLE_TEXTAREA" => "padding:3px 5px;min-width:380px;min-height:150px;",
		"FORM_STYLE_INPUT" => "min-width:220px;padding:3px 5px;",
		"FORM_STYLE_SELECT" => "min-width:232px;padding:3px 5px;",
		"FORM_STYLE_SUBMIT" => "",
		"FORM_SUBMIT_CLASS" => "",
		"FORM_SUBMIT_ID" => "",
		"FORM_SUBMIT_VALUE" => "Отправить",
		"USE_CAPTCHA" => "Y",
		"USE_HIDDEN_PROTECTION" => "Y",
		"USE_PHP_ANTISPAM" => "Y",
		"PHP_ANTISPAM_LEVEL" => "1",
		"INCLUDE_JQUERY" => "N",
		"VALIDTE_REQUIRED_FIELDS" => "N",
		"INCLUDE_PLACEHOLDER" => "N",
		"INCLUDE_PRETTY_COMMENTS" => "N",
		"INCLUDE_FORM_STYLER" => "Y",
		"HIDE_FORM_AFTER_SEND" => "Y",
		"SCROLL_TO_FORM_IF_MESSAGES" => "N",
		"SCROLL_TO_FORM_SPEED" => "1000",
		"BRANCH_ACTIVE" => "N",
		"SHOW_FILES" => "Y",
		"UUID_LENGTH" => "10",
		"UUID_PREFIX" => "",
		"USER_AUTHOR_FIO" => "",
		"USER_AUTHOR_NAME" => "",
		"USER_AUTHOR_LAST_NAME" => "",
		"USER_AUTHOR_SECOND_NAME" => "",
		"USER_AUTHOR_EMAIL" => "",
		"USER_AUTHOR_PERSONAL_MOBILE" => "",
		"USER_AUTHOR_WORK_COMPANY" => "",
		"USER_AUTHOR_POSITION" => "",
		"USER_AUTHOR_PROFESSION" => "",
		"USER_AUTHOR_STATE" => "",
		"USER_AUTHOR_CITY" => "",
		"USER_AUTHOR_WORK_CITY" => "",
		"USER_AUTHOR_STREET" => "",
		"USER_AUTHOR_ADRESS" => "",
		"USER_AUTHOR_PERSONAL_PHONE" => "",
		"USER_AUTHOR_WORK_PHONE" => "",
		"USER_AUTHOR_FAX" => "",
		"USER_AUTHOR_MAILBOX" => "",
		"USER_AUTHOR_WORK_MAILBOX" => "",
		"USER_AUTHOR_SKYPE" => "",
		"USER_AUTHOR_ICQ" => "",
		"USER_AUTHOR_WWW" => "",
		"USER_AUTHOR_WORK_WWW" => "",
		"USER_AUTHOR_MESSAGE_THEME" => "",
		"USER_AUTHOR_MESSAGE" => "",
		"USER_AUTHOR_NOTES" => "",
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"SHOW_CSS_MODAL_AFTER_SEND" => "N",
		"CSS_MODAL_HEADER" => "Информация",
		"CSS_MODAL_FOOTER" => "",
		"CSS_MODAL_CONTENT" => "",
		"DELETE_FILES_AFTER_UPLOAD" => "N",
		"SEND_ATTACHMENT" => "Y",
		"SET_ATTACHMENT_REQUIRED" => "N",
		"SHOW_ATTACHMENT_EXTENSIONS" => "N",
		"COUNT_INPUT_FILE" => "3",
		"FILE_DESCRIPTION" => array(
			0 => "Отправить фото своих дисков",
			1 => "Отправить фото своих дисков",
			2 => "Отправить фото своих дисков",
			3 => "",
		),
		"MAX_FILE_SIZE" => "10000",
		"FILE_EXTENSIONS" => "jpg, jpeg, bmp, png",
		"UPLOAD_FOLDER" => "/upload/feedback",
		"AJAX_OPTION_ADDITIONAL" => "",
		"COMPONENT_TEMPLATE" => "seryi"
	),
	false
);?>
</div>