
<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$APPLICATION->AddHeadString('<meta property="og:title" content="' . $arResult["NAME"] . '" />');
$APPLICATION->AddHeadString('<meta property = "og:type" content = "article" />');
$APPLICATION->AddHeadString('<meta property="og:image" content="http://thomifelgen.ru' . $arResult["PICTURE_PREVIEW"]["SRC"] . '" />');
$APPLICATION->AddHeadString('<meta property="og:description" content="' . $arResult['META']['DESCRIPTION'] . '"/>');

?>
<?$APPLICATION->SetPageProperty("title", $arResult["NAME"]);?>

<div class="catalog-element">
	<div class="catalog_element_left">
		<div class="body_inner">
		<p class="datev"><?=$arResult["SHOW_COUNTER"]?> просмотров</p>
		<?if(!empty($arResult["PREVIEW_TEXT"])):?>
		<div class="catalog_element_text">
			<?=$arResult["~PREVIEW_TEXT"]?>
		</div>
		<?endif;?>
		</div>
			<div style="position:relative;">
				<?if($arResult["SECTION"]["ID"] == 8):?><div class="waranty"><img src="/upload/medialibrary/78b/5_years_warranty.png" title="Гарантия 5 лет"></div><?endif;?>
				<img style="" src="<?=$arResult['PICTURE_PREVIEW']['SRC']?>" alt="<?=$arResult["PROPERTIES"]["IMG_ALT"]["VALUE"][0]?>" title="<?=$arResult["PROPERTIES"]["IMG_ALT"]["VALUE"][0]?>">
				<div class="catalog_element_img_text"><?=$arResult["DETAIL_PICTURE"]["DESCRIPTION"]?></div>
			</div>

<?if(is_array($arResult["PICTURE_FOR_SLIDER"])):?>
	<?foreach($arResult["PICTURE_FOR_SLIDER"]["VALUE"] as $key => $arImage):?>

			<div style="position:relative;">
<?
$tempFileName1 = CFile::GetByID($arResult['PROPERTIES']['IMAGES']["VALUE"][$key]);
$tempFileName2 = $tempFileName1->Fetch();
?>
				<?$key_inner = $key + 1;?>

	<img style="" src="<?=$arResult["PICTURE_FOR_SLIDER"]["VALUE"][$key]["SRC"]?>" alt="<?=$arResult["PROPERTIES"]["IMG_ALT"]["VALUE"][$key_inner]?>" title="<?=$arResult["PROPERTIES"]["IMG_TITLE"]["VALUE"][$key_inner]?>" >
	<div class="catalog_element_img_text"><?=$tempFileName2["DESCRIPTION"];?></div>

		
		</div>
	<?endforeach;?>
<?endif;?>
	</div>

		<?if(!empty($arResult["PROPERTIES"]["VIDEO"]["~VALUE"])):?>
		<div class="catalog_element_video">
			<?if(preg_match("/iframe/",$arResult["PROPERTIES"]["VIDEO"]["~VALUE"])):?><?=$arResult["PROPERTIES"]["VIDEO"]["~VALUE"]?><?else:?>
			<div class="youtube"
				 id="<?if(preg_match("/rel=0/",$arResult["PROPERTIES"]["VIDEO"]["~VALUE"])):?><?=stristr($arResult["PROPERTIES"]["VIDEO"]["~VALUE"],'?', true)?><?else:?><?=$arResult["PROPERTIES"]["VIDEO"]["~VALUE"]?><?endif;?>"
				 style="width: 100%; height: 415px;"
					 data-params="rel=0">
			</div>
			<?endif;?>
		</div>
		<?endif;?>

		<div class="body_inner">
			<?=$arResult["~DETAIL_TEXT"]?>
	</div>

		<div class="body_inner">
			<table class="nceny" width="100%" class="catalog_element_prop_table" cellpadding="0" cellspacing="0" border="0">

				<?if(!empty($arResult["PROPERTIES"]["RADIUS"]["VALUE"])):?>
					<tr class="catalog_element_prop_tr"><td class="item_prop_name"><?=$arResult["PROPERTIES"]["RADIUS"]["NAME"]?>:</td><td class="item_prop_value"><?=$arResult["PROPERTIES"]["RADIUS"]["VALUE"]?></td></tr>
				<?endif;?>
				
				<?if(!empty($arResult["PROPERTIES"]["DISK_LABEL"]["VALUE"])):?>
					<tr class="catalog_element_prop_tr"><td class="item_prop_name"><?=$arResult["PROPERTIES"]["DISK_LABEL"]["NAME"]?>:</td><td class="item_prop_value"><?=$arResult["PROPERTIES"]["DISK_LABEL"]["VALUE"]?></td></tr>
				<?endif;?>
				
				<?if(!empty($arResult["PROPERTIES"]["COLOR"]["VALUE"])):?>
					<tr class="catalog_element_prop_tr"><td class="item_prop_name"><?=$arResult["PROPERTIES"]["COLOR"]["NAME"]?>:</td><td class="item_prop_value"><?=$arResult["PROPERTIES"]["COLOR"]["VALUE"]?></td></tr>
				<?endif;?>
				
				<?if(!empty($arResult["PROPERTIES"]["AUTO_LABEL"]["VALUE"])):?>
					<tr class="catalog_element_prop_tr"><td class="item_prop_name"><?=$arResult["PROPERTIES"]["AUTO_LABEL"]["NAME"]?>:</td><td class="item_prop_value"><?=$arResult["PROPERTIES"]["AUTO_LABEL"]["VALUE"]?></td></tr>
				<?endif;?>
				<?if(!empty($arResult["PROPERTIES"]["MANDMD"]["VALUE"])):?>
					<tr class="catalog_element_prop_tr"><td class="item_prop_name"><?=$arResult["PROPERTIES"]["MANDMD"]["NAME"]?>:</td><td class="item_prop_value">
<?
$res = CIBlockElement::GetByID($arResult["PROPERTIES"]["MANDMD"]["VALUE"]);
if($ar_res = $res->GetNext())?>
						<a href="/search/index.php?q=<? echo $ar_res['NAME'];?>&s=Поиск"> <? echo $ar_res['NAME'];?></a>

</td></tr>
				<?endif;?>
				<?if(!empty($arResult["PROPERTIES"]["MANDM"]["VALUE"])):?>
					<tr class="catalog_element_prop_tr"><td class="item_prop_name"><?=$arResult["PROPERTIES"]["MANDM"]["NAME"]?>:</td><td class="item_prop_value"><?$APPLICATION->IncludeComponent("bxmod:autos.props", "template1", Array(
	"DATA" => $arResult["PROPERTIES"]["MANDM"]["VALUE"],	// Данные для выборки
	),
	false
);?></td></tr>
				<?endif;?>
								<?if(!empty($arResult["PROPERTIES"]["BIKE_LABEL"]["VALUE"])):?>
					<tr class="catalog_element_prop_tr"><td class="item_prop_name"><?=$arResult["PROPERTIES"]["BIKE_LABEL"]["NAME"]?>:</td><td class="item_prop_value"><?=$arResult["PROPERTIES"]["BIKE_LABEL"]["VALUE"]?></td></tr>
				<?endif;?>
				
				<?if(!empty($arResult["PROPERTIES"]["DO_WORK"]["VALUE"])):?>
					<tr class="catalog_element_prop_tr"><td class="item_prop_name"><?=$arResult["PROPERTIES"]["DO_WORK"]["NAME"]?>:</td><td class="item_prop_value"><?foreach($arResult["PROPERTIES"]["DO_WORK"]["VALUE"] as $analog):?> 
<?$res = CIBlockElement::GetByID($analog);?> 
<?if($ar_res = $res->GetNext())?> 
<ul class="check"><li><b><a href='<?=$ar_res["DETAIL_PAGE_URL"];?>'><?=$ar_res["NAME"];?></a></b></li></ul> 
	<?endforeach;?></td></tr>
				<?endif;?>
				
				<?if(!empty($arResult["PROPERTIES"]["COLOR_MAT"]["VALUE"])):?>
					<tr class="catalog_element_prop_tr"><td class="item_prop_name"><?=$arResult["PROPERTIES"]["COLOR_MAT"]["NAME"]?>:</td><td class="item_prop_value"><?=$arResult["PROPERTIES"]["COLOR_MAT"]["VALUE"]?></td></tr>
				<?endif;?>
<tr class="catalog_element_prop_tr"><td class="item_prop_name">Оцените работу:</td>
<td class="item_prop_value">
<?$APPLICATION->IncludeComponent(
	"askaron:askaron.ibvote.iblock.vote", 
	"ajax1", 
	array(
		"DISPLAY_AS_RATING" => "vote_avg",
		"IBLOCK_TYPE" => "products",
		"IBLOCK_ID" => "5",
		"ELEMENT_ID" => $arResult["ID"],
		"MAX_VOTE" => "5",
		"VOTE_NAMES" => array(
			0 => "1",
			1 => "2",
			2 => "3",
			3 => "4",
			4 => "5",
			5 => "",
		),
		"SET_STATUS_404" => "N",
		"SESSION_CHECK" => "Y",
		"COOKIE_CHECK" => "N",
		"IP_CHECK_TIME" => "86400",
		"USER_ID_CHECK_TIME" => "0",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_NOTES" => "",
		"COMPONENT_TEMPLATE" => "ajax1"
	),
	false
);?>
</td></tr>
			</table>		</div>
<div class="body_inner">
		<?if (is_array($arResult["PROPERTIES"]["OTZYVY"]["VALUE"])):?>
			<h3 class="questions-title">Отзыв владельца:</h3>
			<div class="question_list" style="margin: 0 auto 30px auto;">

				<?foreach($arResult["PROPERTIES"]["OTZYVY"]["VALUE"] as $otzyvID):?>
					<?$res = CIBlockElement::GetList(
						Array(),
						Array("ID" => $otzyvID),
						false,
						array(),
						array("PROPERTY_NAME", "PROPERTY_EMAIL", "PROPERTY_OTZYV", "PROPERTY_OANSWER", "PREVIEW_TEXT", "DETAIL_TEXT")
					);?>

					<?if ($ar_fields = $res->Fetch()):?>
							<div class="faq">
								<div class="cover">
									<div class="qw_answer-detail">
										<div class="faq_ascs">
											<?=$ar_fields["PROPERTY_NAME_VALUE"]?>
											<div class="cls">
											</div>
										</div>
									</div>
									<div class="faq_qwestion1">
										<?if(empty($ar_fields["PROPERTY_OTZYV_VALUE"]["TEXT"])):?><?=$ar_fields['PREVIEW_TEXT'];?><?else:?><?=htmlspecialcharsBack($ar_fields["PROPERTY_OTZYV_VALUE"]["TEXT"])?><?endif;?>

									</div>
									<div class="cls">
									</div>
								</div>
								<div class="cover">
									<div class="qw_cover-wrapper">
										<div class="faq_ansver">
											<div>
												<?if(empty($ar_fields["PROPERTY_OANSWER_VALUE"]["TEXT"])):?><?=$ar_fields['DETAIL_TEXT'];?><?else:?><?=htmlspecialcharsBack($ar_fields["PROPERTY_OANSWER_VALUE"]["TEXT"])?><?endif;?>
											</div>
										</div>
										<div class="cls">
										</div>
									</div>
									<div class="name_person">
										Thomi Felgen
									</div>
									<div class="cls">
									</div>
								</div>
								<div class="cls">

								</div>
							</div>
					<?endif;?>
				<?endforeach;?>
</div>

				<div style="text-align:center"><a class="btn" href="/otzyvy/">Читать все отзывы</a></div>

		<?endif;?>
			</div>
			<div style="text-align:center" class="col-2">
<div class="col-2-div">
<a class="btn" href="#subm" onclick="yaCounter16377226.reachGoal('ANALOGS'); return true;">Узнать стоимость аналогичной работы</a>
</div>
<div class="col-2-div">
	<a class="btn" href="/calculator/" onclick="yaCounter16377226.reachGoal('CALCR'); return true;">Рассчитать самостоятельно</a>
	</div>
			</div>
		</div>


	<div class="clear"></div>
<div>
<?if(isset($arResult['PREVNEXT']['PREV'])):?>
<script type="text/javascript" async defer  data-pin-shape="round" data-pin-height="32" data-pin-hover="true"  src="//assets.pinterest.com/js/pinit.js"></script>
		<div class="prevnext_work_img">
			<a title="Предыдущая работа" href="<?=$arResult['PREVNEXT']['PREV']['DETAIL_PAGE_URL']?>">
				<img src="<?=$arResult['PREV_PICTURE_PREVIEW']['SRC']?>" alt="<?=$arResult['PREVNEXT']['PREV']['NAME'];?>" title="<?=$arResult['PREVNEXT']['PREV']['NAME'];?>">
					<span class="text-content"><span><?=$arResult['PREVNEXT']['PREV']['NAME'];?></span></span>
			<div class="prev_work prevnext_work">

			← Предыдущая работа
		</div></a>

	</div>

<?endif;?>
<?if(isset($arResult['PREVNEXT']['NEXT'])):?>
		<div class="prevnext_work_imgr">
			<a title="Следующая работа" href="<?=$arResult['PREVNEXT']['NEXT']['DETAIL_PAGE_URL']?>">
				<img src="<?=$arResult['NEXT_PICTURE_PREVIEW']['SRC']?>" alt="<?=$arResult['PREVNEXT']['NEXT']['NAME'];?>" title="<?=$arResult['PREVNEXT']['NEXT']['NAME'];?>">
					<span class="text-content"><span><?=$arResult['PREVNEXT']['NEXT']['NAME'];?></span></span>
			<div class="next_work prevnext_work">

			Следующая работа →
			</div></a>
		</div>

<?endif;?>
</div>
<div class="clear"></div>
<?$APPLICATION->IncludeFile(
	SITE_TEMPLATE_PATH."/include_areas/podpiska.php",
	Array(), //переменные
	Array(
	"MODE" => "html",                                  // будет редактировать в веб-редакторе
	"NAME" => "Редактирование"      // имя шаблона для нового файла
	)
);?>
<?if(is_array($arResult['RANDOM_WORKS'])):?>
<div class="clear"></div>
<div class="body_inner">
<div class="title_h2"><h2>Похожие работы:</h2></div>

	<div class="owl-carousel-random-works">	
	<?foreach($arResult['RANDOM_WORKS_IMG'] as $key => $arWorks):?>
<div class="flip-container" ontouchstart="this.classList.toggle('hover');">
<a class="" href="<?=$arResult['RANDOM_WORKS'][$key]["DETAIL_PAGE_URL"]?>">
	<div class="flipper">
		<div class="front">
			<img src="<?=$arWorks["SRC"]?>" alt="<?=$arResult['RANDOM_WORKS'][$key]["NAME"]?>" title="<?=$arResult['RANDOM_WORKS'][$key]["NAME"]?>">
		</div>
		<div class="back">
						<?if(!empty($arResult['RANDOM_WORKS_IMG2'][$key]["SRC"])):?>
							<img src="<?=$arResult['RANDOM_WORKS_IMG2'][$key]["SRC"]?>" alt="<?=$arResult['RANDOM_WORKS'][$key]["NAME"]?>" title="<?=$arResult['RANDOM_WORKS'][$key]["NAME"]?>">
						<?else:?>
							<img src="<?=$arWorks["SRC"]?>" alt="<?=$arResult['RANDOM_WORKS'][$key]["NAME"]?>" title="<?=$arResult['RANDOM_WORKS'][$key]["NAME"]?>">
						<?endif;?>
		</div>
	</div>
		</a>
</div>
	<?endforeach;?>
	</div>
</div>
<?endif;?>

<pre>
	<?print_r($arResult["SECTION"]["ID"])?>
</pre>