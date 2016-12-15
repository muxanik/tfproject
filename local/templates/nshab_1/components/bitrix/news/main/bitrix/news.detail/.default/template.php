<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?
$APPLICATION->AddHeadString('<meta property="og:title" content="' . $arResult["NAME"] . '" />');
$APPLICATION->AddHeadString('<meta property = "og:type" content = "article" />');
$APPLICATION->AddHeadString('<meta property="og:image" content="http://thomifelgen.ru' . $arResult['DETAIL_PICTURE']['SRC'] . '" />');
?>

<div class="newsd">
    <p class="datev"><i class="fa fa-book"></i> <? echo $arItem["DISPLAY_ACTIVE_FROM"] ?>, <i
            class="fa fa-eye"></i> <?= $arResult["SHOW_COUNTER"] ?></p>
    <div class="body_inner"><? echo $arResult["DETAIL_TEXT"]; ?></div>
</div>
<? $APPLICATION->IncludeComponent("askaron:askaron.ibvote.iblock.vote", "ajax1", Array(
    "DISPLAY_AS_RATING" => "vote_avg",    // В качестве рейтинга показывать
    "IBLOCK_TYPE" => "news",    // Тип инфо-блока
    "IBLOCK_ID" => $arResult["IBLOCK_ID"],    // Инфо-блок
    "ELEMENT_ID" => $arResult["ID"],    // ID элемента
    "MAX_VOTE" => "5",    // Максимальный балл
    "VOTE_NAMES" => array(    // Подписи к баллам
        0 => "1",
        1 => "2",
        2 => "3",
        3 => "4",
        4 => "5",
    ),
    "SET_STATUS_404" => "N",    // Устанавливать статус 404, если не найдены элемент или раздел
    "SESSION_CHECK" => "Y",    // Не голосовать дважды в одной сессии
    "COOKIE_CHECK" => "N",    // Не голосовать дважды c одним cookie
    "IP_CHECK_TIME" => "86400",    // Не голосовать дважды с одного IP в течение (сек.)
    "USER_ID_CHECK_TIME" => "0",    // Не голосовать дважды пользователю с одним ID в течение (сек.)
    "CACHE_TYPE" => "A",    // Тип кеширования
    "CACHE_TIME" => "36000000",    // Время кеширования (сек.)
    "CACHE_NOTES" => ""
),
    false
); ?>
<div class="end"></div>
