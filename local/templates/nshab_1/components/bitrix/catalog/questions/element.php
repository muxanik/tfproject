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

<div class="services_feedback_form"> 
<?$APPLICATION->IncludeComponent("api:main.feedback", "feedback", Array(
	"IBLOCK_TYPE" => "news",	// Тип инфоблока
		"IBLOCK_ID" => "",	// Инфоблок
		"INSTALL_IBLOCK" => "N",	// Создать инфоблок и тип инфоблока
		"REPLACE_FIELD_FROM" => "Y",	// Подставлять в поле "От" e-mail посетителя
		"UNIQUE_FORM_ID" => "e9b7fcec163acadc1b6a83d122eb3a85",	// ID формы
		"OK_TEXT" => "Спасибо, ваше сообщение принято.",	// Сообщение, выводимое пользователю после отправки
		"EMAIL_TO" => "info@thomifelgen.ru",	// E-mail, на который будет отправлено письмо
		"DISPLAY_FIELDS" => array(	// Выводимые поля
			0 => "AUTHOR_NAME",
			1 => "AUTHOR_EMAIL",
			2 => "AUTHOR_PERSONAL_MOBILE",
			3 => "AUTHOR_MESSAGE",
		),
		"REQUIRED_FIELDS" => array(	// Обязательные поля
			0 => "AUTHOR_NAME",
			1 => "AUTHOR_EMAIL",
			2 => "AUTHOR_PERSONAL_MOBILE",
		),
		"CUSTOM_FIELDS" => array(	// Поля конструктора
			0 => "",
		),
		"ADMIN_EVENT_MESSAGE_ID" => array(	// Почтовые шаблоны для администратора
			0 => "18",
		),
		"USER_EVENT_MESSAGE_ID" => array(	// Почтовые шаблоны для посетителя
			0 => "19",
		),
		"HIDE_FIELD_NAME" => "N",	// Скрывать названия полей  формы
		"TITLE_DISPLAY" => "N",	// Показывать заголовок  формы
		"FORM_TITLE" => "",	// Текст заголовка
		"FORM_TITLE_LEVEL" => "1",	// Уровень заголовка
		"FORM_STYLE_TITLE" => "",	// Стили для Заголовка
		"FORM_STYLE" => "text-align:left;",	// Стили для <div> формы
		"FORM_STYLE_DIV" => "overflow:hidden;padding:5px;",	// Стили для <div> строки
		"FORM_STYLE_LABEL" => "display: block;width:100px;margin-bottom: 3px;float:left;text-align:right;padding-right: 10px;",	// Стили для <label>
		"FORM_STYLE_TEXTAREA" => "padding:3px 5px;min-width:380px;min-height:150px;",	// Стили для <textarea>
		"FORM_STYLE_INPUT" => "min-width:220px;padding:3px 5px;",	// Стили для <input>
		"FORM_STYLE_SELECT" => "min-width:232px;padding:3px 5px;",	// Стили для <select>
		"FORM_STYLE_SUBMIT" => "",	// Стили для кнопки Отправить
		"FORM_SUBMIT_CLASS" => "",	// Класс для кнопки Отправить
		"FORM_SUBMIT_ID" => "",	// ID для кнопки Отправить
		"FORM_SUBMIT_VALUE" => "Отправить",	// Текст для кнопки Отправить
		"USE_CAPTCHA" => "N",	// Включить CAPTCHA-антиспам
		"USE_HIDDEN_PROTECTION" => "Y",	// Включить CSS-антиспам
		"USE_PHP_ANTISPAM" => "Y",	// Включить PHP-антиспам
		"PHP_ANTISPAM_LEVEL" => "1",	// Число допустимых совпадений в полях формы для PHP-антиспама
		"INCLUDE_JQUERY" => "N",	// Включить jQuery если не работают скрипты/проверки
		"VALIDTE_REQUIRED_FIELDS" => "Y",	// Включить проверку полей формы
		"INCLUDE_PLACEHOLDER" => "Y",	// Включить placeholder
		"INCLUDE_PRETTY_COMMENTS" => "N",	// Включить автовысоту текстовых полей
		"INCLUDE_FORM_STYLER" => "Y",	// Включить обработчик флажков/переключателей
		"HIDE_FORM_AFTER_SEND" => "Y",	// Прятать форму после отправки
		"SCROLL_TO_FORM_IF_MESSAGES" => "Y",	// Прокручивать страницу к форме
		"SCROLL_TO_FORM_SPEED" => "1000",	// Скорость прокрутки страницы
		"BRANCH_ACTIVE" => "N",	// Задейстовать блок
		"SHOW_FILES" => "Y",	// Загружать файлы
		"USER_AUTHOR_FIO" => "",	// ФИО
		"USER_AUTHOR_NAME" => "",	// Ваше имя
		"USER_AUTHOR_LAST_NAME" => "",	// Фамилия
		"USER_AUTHOR_SECOND_NAME" => "",	// Отчество
		"USER_AUTHOR_EMAIL" => "",	// E-mail
		"USER_AUTHOR_PERSONAL_MOBILE" => "Телефон",	// Контактный телефон
		"USER_AUTHOR_WORK_COMPANY" => "",	// Компания
		"USER_AUTHOR_POSITION" => "",	// Должность
		"USER_AUTHOR_PROFESSION" => "",	// Профессия
		"USER_AUTHOR_STATE" => "",	// Область, район
		"USER_AUTHOR_CITY" => "",	// Город
		"USER_AUTHOR_STREET" => "",	// Улица
		"USER_AUTHOR_ADRESS" => "",	// Адрес
		"USER_AUTHOR_PERSONAL_PHONE" => "",	// Домашний телефон
		"USER_AUTHOR_WORK_PHONE" => "",	// Рабочий телефон
		"USER_AUTHOR_FAX" => "",	// Факс
		"USER_AUTHOR_MAILBOX" => "",	// Почтовый ящик
		"USER_AUTHOR_WORK_MAILBOX" => "",	// Рабочий почтовый ящик
		"USER_AUTHOR_SKYPE" => "",	// Скайп
		"USER_AUTHOR_ICQ" => "",	// Номер ICQ
		"USER_AUTHOR_WWW" => "",	// Персональный сайт
		"USER_AUTHOR_WORK_WWW" => "",	// Рабочий сайт
		"USER_AUTHOR_MESSAGE_THEME" => "",	// Тема сообщения
		"USER_AUTHOR_MESSAGE" => "",	// Сообщение
		"USER_AUTHOR_NOTES" => "",	// Заметки
		"AJAX_MODE" => "N",	// Включить режим AJAX
		"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
		"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
		"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
		"SHOW_CSS_MODAL_AFTER_SEND" => "N",	// Выводить модальное окно с текстом после успешной отправки формы
		"CSS_MODAL_HEADER" => "Информация",	// Текст в заголовке окна
		"CSS_MODAL_FOOTER" => "<a href=\"http://tuning-soft.ru/\" target=\"_blank\">Разработка модуля</a> - Тюнинг Софт",	// Текст в нижней части окна
		"CSS_MODAL_CONTENT" => "<p>Модуль <b>расширенная форма обратной связи битрикс с вложением</b> предназначен для отправки сообщений с сайта, включая код CAPTCHA и скрытую защиту от спама, и отличается от стандартной формы Битрикс:
<br> - <b>отправкой файлов вложениями или ссылками на файл</b>,
<br> - <b>встроенным конструктором форм,</b>
<br> - скрытой защитой от спама,
<br> - работой нескольких форм на одной странице,
<br> - встроенным фирменным валидатором форм,
<br> - 4 встроенными WEB 2.0 шаблонами,
<br> - дополнительными полями со своим именованием,
<br> - и многими другими функциями...
<br>подробнее читайте на странице модуля <a href=\"http://tuning-soft.ru/1c-bitrix/modules/main-feedback/\" target=\"_blank\">Расширенная форма обратной связи</a>
</p>",	// Текст сообщения
		"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
		"DELETE_FILES_AFTER_UPLOAD" => "Y",	// Очищать папку с файлами
		"SEND_ATTACHMENT" => "Y",	// Отправлять как вложения
		"SET_ATTACHMENT_REQUIRED" => "N",	// Обязательное
		"SHOW_ATTACHMENT_EXTENSIONS" => "Y",	// Показать список доступных раширений
		"COUNT_INPUT_FILE" => "3",	// Число полей
		"FILE_DESCRIPTION" => "",	// Описание полей
		"MAX_FILE_SIZE" => "10000",	// Максимальный размер файла, KB
		"FILE_EXTENSIONS" => "zip, rar, txt, doc, docx, xls, xlsx, jpg, jpeg, bmp, png, pdf",	// Допустимые расширения файлов
		"UPLOAD_FOLDER" => "/upload/hiddenfeedback",	// Папка для загружаемых файлов
	),
	false
);?>
</div>