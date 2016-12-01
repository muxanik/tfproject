<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$ElementID=$APPLICATION->IncludeComponent(
	"bitrix:catalog.element",
	"",
	Array(
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"PROPERTY_CODE" => $arParams["DETAIL_PROPERTY_CODE"],
		"META_KEYWORDS" => $arParams["DETAIL_META_KEYWORDS"],
		"META_DESCRIPTION" => $arParams["DETAIL_META_DESCRIPTION"],
		"BROWSER_TITLE" => $arParams["DETAIL_BROWSER_TITLE"],
		"BASKET_URL" => $arParams["BASKET_URL"],
		"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
		"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
		"SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
		"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
		"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"SET_TITLE" => $arParams["SET_TITLE"],
		"SET_STATUS_404" => $arParams["SET_STATUS_404"],
		"PRICE_CODE" => $arParams["PRICE_CODE"],
		"USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
		"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
		"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
		"PRICE_VAT_SHOW_VALUE" => $arParams["PRICE_VAT_SHOW_VALUE"],
		"USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
		"QUANTITY_FLOAT" => $arParams["QUANTITY_FLOAT"],
		"PRODUCT_PROPERTIES" => $arParams["PRODUCT_PROPERTIES"],
		"LINK_IBLOCK_TYPE" => $arParams["LINK_IBLOCK_TYPE"],
		"LINK_IBLOCK_ID" => $arParams["LINK_IBLOCK_ID"],
		"LINK_PROPERTY_SID" => $arParams["LINK_PROPERTY_SID"],
		"LINK_ELEMENTS_URL" => $arParams["LINK_ELEMENTS_URL"],

		"OFFERS_CART_PROPERTIES" => $arParams["OFFERS_CART_PROPERTIES"],
		"OFFERS_FIELD_CODE" => $arParams["DETAIL_OFFERS_FIELD_CODE"],
		"OFFERS_PROPERTY_CODE" => $arParams["DETAIL_OFFERS_PROPERTY_CODE"],
		"OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
		"OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
		"OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
		"OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],

		"ELEMENT_ID" => $arResult["VARIABLES"]["ELEMENT_ID"],
		"ELEMENT_CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"],
		"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
		"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
		'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
		'CURRENCY_ID' => $arParams['CURRENCY_ID'],
		'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
		'USE_ELEMENT_COUNTER' => $arParams['USE_ELEMENT_COUNTER'],
	),
	$component
);?>
<script type="text/javascript">
	jQuery(document).ready(function($){

        $('#UUID-<?= $arParams['UNIQUE_FORM_ID']; ?>').on('change keyup',function(){
            if(!$(this).length)
                $(this).val('');
        });

		<? if((count($arParams['REQUIRED_FIELDS']) && $arParams['VALIDTE_REQUIRED_FIELDS'])): ?>
			$("#<?= $arParams['UNIQUE_FORM_ID']; ?>").validateMainFeedback();
		<? endif; ?>
		<? if($arParams['INCLUDE_PRETTY_COMMENTS']): ?>
			$('#<?= $arParams['UNIQUE_FORM_ID']; ?> textarea').prettyComments();
		<? endif; ?>
		<? if($arParams['INCLUDE_FORM_STYLER']): ?>
			$('#<?= $arParams['UNIQUE_FORM_ID']; ?> input[type*="checkbox"], #<?= $arParams['UNIQUE_FORM_ID']; ?> input[type*="radio"]').styler();
		<? endif; ?>
		<? if($arParams['HIDE_FORM_AFTER_SEND'] && !empty($arResult["OK_MESSAGE"])): ?>
			$("#<?= $arParams['UNIQUE_FORM_ID']; ?>").hide();
		<? endif; ?>
		<? if($arParams['SCROLL_TO_FORM_IF_MESSAGES'] && (!empty($arResult["OK_MESSAGE"]) || !empty($arResult["ERROR_MESSAGE"]))): ?>
			$('html, body').animate({
				scrollTop: $(".api-feedback.<?=$tpl_class_name;?>").offset().top
			}, <?=$arParams['SCROLL_TO_FORM_SPEED'];?>);
		<? endif; ?>
		<? if($arParams['SHOW_CSS_MODAL_AFTER_SEND'] && !empty($arResult["OK_MESSAGE"])): ?>
			var html_css_modal = '<section class="semantic-content" id="modal-text-<?=$arParams["UNIQUE_FORM_ID"];?>" tabindex="-1" role="dialog" aria-labelledby="modal-label" aria-hidden="true">' +
									'<div class="modal-inner"><header><h2 id="modal-label"><?=htmlspecialcharsback(CUtil::JSEscape($arParams["CSS_MODAL_HEADER"]));?></h2></header>' +
										'<div class="modal-content"><?=htmlspecialcharsback(CUtil::JSEscape($arParams["CSS_MODAL_CONTENT"]));?></div>' +
										'<footer><p><?=htmlspecialcharsback(CUtil::JSEscape($arParams["CSS_MODAL_FOOTER"]));?></p></footer>' +
									'</div>' +
									'<a href="#!" class="modal-close" title="<?=GetMessage("CLOSE_CSS_MODAL_WINDOW")?>" data-dismiss="modal">×</a>' +
								'</section>';
			$('body').append(html_css_modal);

    		window.location.hash = '#modal-text-<?=$arParams['UNIQUE_FORM_ID'];?>';
		<? endif; ?>
	}); //END Ready
</script>
<div id="dialog" class="services_feedback_form"> 
<?$APPLICATION->IncludeComponent(
	"api:main.feedback", 
	"seryi", 
	array(
		"IBLOCK_TYPE" => "products",
		"IBLOCK_ID" => "",
		"INSTALL_IBLOCK" => "N",
		"REPLACE_FIELD_FROM" => "Y",
		"UNIQUE_FORM_ID" => "e9b7fcec163acadc1b6a83d122eb3a84",
		"OK_TEXT" => "Спасибо, ваше сообщение принято.",
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
			2 => "AUTHOR_PERSONAL_MOBILE",
		),
		"CUSTOM_FIELDS" => array(
			0 => "Выберите радиус@select@values=(не установлено)#13#14#15#16#17#18#19#20#21#22#23#24#25#26",
			1 => "Диски хромированы?@input@radio@values=Нет#Да#Частично",
			2 => "",
		),
		"ADMIN_EVENT_MESSAGE_ID" => array(
			0 => "16",
		),
		"USER_EVENT_MESSAGE_ID" => array(
			0 => "17",
		),
		"HIDE_FIELD_NAME" => "N",
		"TITLE_DISPLAY" => "Y",
		"FORM_TITLE" => "Форма заказа услуги",
		"FORM_TITLE_LEVEL" => "1",
		"FORM_STYLE_TITLE" => "",
		"FORM_STYLE" => "",
		"FORM_STYLE_DIV" => "",
		"FORM_STYLE_LABEL" => "font-size: 14px; font-style: italic;",
		"FORM_STYLE_TEXTAREA" => "",
		"FORM_STYLE_INPUT" => "",
		"FORM_STYLE_SELECT" => "",
		"FORM_STYLE_SUBMIT" => "clear:both;",
		"FORM_SUBMIT_CLASS" => "",
		"FORM_SUBMIT_ID" => "",
		"FORM_SUBMIT_VALUE" => "Отправить",
		"USE_CAPTCHA" => "N",
		"USE_HIDDEN_PROTECTION" => "Y",
		"USE_PHP_ANTISPAM" => "Y",
		"PHP_ANTISPAM_LEVEL" => "1",
		"INCLUDE_JQUERY" => "N",
		"VALIDTE_REQUIRED_FIELDS" => "Y",
		"INCLUDE_PLACEHOLDER" => "Y",
		"INCLUDE_PRETTY_COMMENTS" => "N",
		"INCLUDE_FORM_STYLER" => "Y",
		"HIDE_FORM_AFTER_SEND" => "Y",
		"SCROLL_TO_FORM_IF_MESSAGES" => "N",
		"SCROLL_TO_FORM_SPEED" => "1000",
		"BRANCH_ACTIVE" => "N",
		"SHOW_FILES" => "Y",
		"USER_AUTHOR_FIO" => "",
		"USER_AUTHOR_NAME" => "",
		"USER_AUTHOR_LAST_NAME" => "",
		"USER_AUTHOR_SECOND_NAME" => "",
		"USER_AUTHOR_EMAIL" => "",
		"USER_AUTHOR_PERSONAL_MOBILE" => "Телефон",
		"USER_AUTHOR_WORK_COMPANY" => "",
		"USER_AUTHOR_POSITION" => "",
		"USER_AUTHOR_PROFESSION" => "",
		"USER_AUTHOR_STATE" => "",
		"USER_AUTHOR_CITY" => "",
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
		"AJAX_OPTION_STYLE" => "N",
		"AJAX_OPTION_HISTORY" => "N",
		"SHOW_CSS_MODAL_AFTER_SEND" => "N",
		"CSS_MODAL_HEADER" => "",
		"CSS_MODAL_FOOTER" => "Ваше сообщение отправленно!",
		"CSS_MODAL_CONTENT" => "",
		"AJAX_OPTION_ADDITIONAL" => "",
		"DELETE_FILES_AFTER_UPLOAD" => "Y",
		"SEND_ATTACHMENT" => "Y",
		"SET_ATTACHMENT_REQUIRED" => "N",
		"SHOW_ATTACHMENT_EXTENSIONS" => "Y",
		"COUNT_INPUT_FILE" => "3",
		"FILE_DESCRIPTION" => array(
			0 => "Отправить фото",
			1 => "Отправить фото",
			2 => "Отправить фото",
			3 => "",
		),
		"MAX_FILE_SIZE" => "10000",
		"FILE_EXTENSIONS" => "jpg, jpeg, bmp, png, pdf",
		"UPLOAD_FOLDER" => "/upload/hiddenfeedback",
		"DISABLE_SEND_MAIL" => "N",
		"UUID_LENGTH" => "10",
		"UUID_PREFIX" => "",
		"USER_AUTHOR_WORK_CITY" => ""
	),
	false
);?>
</div>
<script>

$( "#dialog" ).dialog({ 
   autoOpen: false, 
   width: "70%",
   modal: true,
   overlay: { opacity: 0.1, background: "black" },
   resizable: false
 });
$( ".opener" ).click(function() {
  $( "#dialog" ).dialog( "open" );
});
</script>