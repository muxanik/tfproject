<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="question_list">

<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

	?>
<div class="body_inner">
	<div class="faq" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<div class="cover">
			<div class="qw_answer-detail">
				<div class="faq_ascs">
					Спрашивает: <?=$arItem['PROPERTIES']['NAME']['VALUE']?>
					<div class="cls">
					</div>
				</div>
			</div>
			<div class="faq_qwestion">
				<?=$arItem['PROPERTIES']['QUESTION']['VALUE']?>
			</div>
			<div class="cls">
			</div>
		</div>
		<div class="cover">
			<div class="qw_cover-wrapper">
				<div class="faq_ansver">
					<div>
						<?=htmlspecialcharsBack($arItem['PROPERTIES']['ANSWER']['VALUE']['TEXT'])?>
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
</div>
<?endforeach;?>
<div class="news_pagenav">
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
<div class="body_inner">
<?$APPLICATION->IncludeComponent(
	"bitrix:iblock.element.add.form", 
	"faq", 
	array(
		"IBLOCK_TYPE" => "faq",
		"IBLOCK_ID" => "40",
		"STATUS_NEW" => "ANY",
		"LIST_URL" => "",
		"USE_CAPTCHA" => "N",
		"USER_MESSAGE_EDIT" => "Ваш вопрос отправлен",
		"USER_MESSAGE_ADD" => "Ваш вопрос отправлен",
		"DEFAULT_INPUT_SIZE" => "30",
		"RESIZE_IMAGES" => "N",
		"PROPERTY_CODES" => array(
			0 => "264",
			1 => "265",
			2 => "266",
			3 => "267",
			4 => "268",
			5 => "NAME",
			6 => "IBLOCK_SECTION",
			7 => "PREVIEW_PICTURE",
		),
		"PROPERTY_CODES_REQUIRED" => array(
			0 => "264",
			1 => "265",
			2 => "267",
		),
		"GROUPS" => array(
			0 => "2",
		),
		"STATUS" => "ANY",
		"ELEMENT_ASSOC" => "CREATED_BY",
		"MAX_USER_ENTRIES" => "100000",
		"MAX_LEVELS" => "100000",
		"LEVEL_LAST" => "Y",
		"MAX_FILE_SIZE" => "0",
		"PREVIEW_TEXT_USE_HTML_EDITOR" => "N",
		"DETAIL_TEXT_USE_HTML_EDITOR" => "N",
		"SEF_MODE" => "N",
		"CUSTOM_TITLE_NAME" => "",
		"CUSTOM_TITLE_TAGS" => "",
		"CUSTOM_TITLE_DATE_ACTIVE_FROM" => "",
		"CUSTOM_TITLE_DATE_ACTIVE_TO" => "",
		"CUSTOM_TITLE_IBLOCK_SECTION" => "",
		"CUSTOM_TITLE_PREVIEW_TEXT" => "",
		"CUSTOM_TITLE_PREVIEW_PICTURE" => "",
		"CUSTOM_TITLE_DETAIL_TEXT" => "",
		"CUSTOM_TITLE_DETAIL_PICTURE" => "",
		"SECTION_ID" => $arParams["PARENT_SECTION"],
		"SEF_FOLDER" => "",
		"COMPONENT_TEMPLATE" => "faq"
	),
	false
);?>

</div>
</div>