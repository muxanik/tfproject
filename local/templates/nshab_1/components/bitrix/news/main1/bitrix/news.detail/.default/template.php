<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$APPLICATION->AddHeadString('<meta property="og:title" content="' . $arResult["NAME"] . '" />');
$APPLICATION->AddHeadString('<meta property = "og:type" content = "article" />');
$APPLICATION->AddHeadString('<meta property="og:image" content="http://thomifelgen.ru' . $arResult['DETAIL_PICTURE']['SRC'] . '" />');
?>

<div class="newsd">
<div class="body_inner">
<p class="datev"><i class="fa fa-eye"></i> <?=$arResult["SHOW_COUNTER"]?></p>

<img src="<?=$arResult['DETAIL_PICTURE']['SRC'];?>">


				<?echo $arResult["DETAIL_TEXT"];?>
	</div>
</div>
<div class="col-2" style="text-align:center;padding-top:15px;">
<div class="col-2-div">

<a class="btn wwb opener" onclick="yaCounter16377226.reachGoal('ZAKAZ'); return true;">ЗАКАЗАТЬ АНАЛОГИЧНУЮ УСЛУГУ</a>
	</div>
	<div class="col-2-div"><a href="/disk_kreator/" class="btn wwb" style="background-color:#ccc;color:#000;">Вернуться в конфигуратор</a></div>
</div>

<script type="text/javascript" src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js" charset="utf-8"></script>
<script type="text/javascript" src="//yastatic.net/share2/share.js" charset="utf-8" async="async"></script>
<div style="padding:10px 0;text-align:center;"><p>Вы можете сохранить полученное изображение выбрав подходящую соцсеть</p><div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,twitter,viber,whatsapp" data-description="Примерка дисков на кофигураторе Thomi Felgen. Самый простой способ узнать как будет выглядеть Ваш автомобиль после покраски или полировки дисков!" data-counter="" data-image="http://thomifelgen.ru<?=$arResult['DETAIL_PICTURE']['SRC'];?>" data-title="<?=$arResult["NAME"];?> - Сделано в конфигураторе Thomi Felgen по подбору цвета дисков"></div></div>
<?$APPLICATION->IncludeComponent("askaron:askaron.ibvote.iblock.vote", "ajax1", Array(
	"DISPLAY_AS_RATING" => "vote_avg",	// В качестве рейтинга показывать
		"IBLOCK_TYPE" => "news",	// Тип инфо-блока
		"IBLOCK_ID" => $arResult["IBLOCK_ID"],	// Инфо-блок
		"ELEMENT_ID" => $arResult["ID"],	// ID элемента
		"MAX_VOTE" => "5",	// Максимальный балл
		"VOTE_NAMES" => array(	// Подписи к баллам
			0 => "1",
			1 => "2",
			2 => "3",
			3 => "4",
			4 => "5",
		),
		"SET_STATUS_404" => "N",	// Устанавливать статус 404, если не найдены элемент или раздел
		"SESSION_CHECK" => "Y",	// Не голосовать дважды в одной сессии
		"COOKIE_CHECK" => "N",	// Не голосовать дважды c одним cookie
		"IP_CHECK_TIME" => "86400",	// Не голосовать дважды с одного IP в течение (сек.)
		"USER_ID_CHECK_TIME" => "0",	// Не голосовать дважды пользователю с одним ID в течение (сек.)
		"CACHE_TYPE" => "A",	// Тип кеширования
		"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
		"CACHE_NOTES" => ""
	),
	false
);?>
<div style="display:inline-block;">
	<?if(is_array($arResult["TOLEFT"])):?>
		<div class="prevnext_work_img">
			<a id="previous_page" href="<?=$arResult["TOLEFT"]["URL"]?>"><?$picl=CFile::GetPath($arResult["TOLEFT"]["PIC"]);?>
				<img src="<?=$picl;?>" alt="<?=$arResult["TOLEFT"]["NAME"]?>">
			</a>
			<div class="prev_work prevnext_work">← Предыдущая</div>
		</div><?endif?>
	<?if(is_array($arResult["TORIGHT"])):?>
		<div class="prevnext_work_imgr">
			<a id="next_page" href="<?=$arResult["TORIGHT"]["URL"]?>"><?$picr=CFile::GetPath($arResult["TORIGHT"]["PIC"]);?>
				<img src="<?=$picr;?>" alt="<?=$arResult["TORIGHT"]["NAME"]?>">

			</a>
			<div class="next_work prevnext_work">Следующая →</div>
		</div><?endif?> 
</div>
<div class="end"></div>
