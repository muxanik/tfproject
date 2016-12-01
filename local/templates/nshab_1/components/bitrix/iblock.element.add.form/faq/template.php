<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
?>

	<div class="title-form">Задать вопрос</div>
	<?
	if (CModule::IncludeModule("iblock")):

		//////////////////////////////////Темы///////////////////////////////////////////
		$themesSelect = array();
		$arSelect = Array('ID', 'NAME');
		$arFilter = Array("IBLOCK_ID"=> 40, "ACTIVE"=> "Y");
		$res = CIBlockSection::GetList(Array(), $arFilter, true, $arSelect);
		while ($ob = $res->GetNext()) {
			$themesSelect[$ob["ID"]] = $ob["NAME"];
		}
		//////////////////////////////////Темы///////////////////////////////////////////
		?>



		<form name="iblock_add" id="message" class="question" action="<?= POST_FORM_ACTION_URI ?>" method="post" enctype="multipart/form-data">
			<?= bitrix_sessid_post() ?>
			<? if ($arParams["MAX_FILE_SIZE"] > 0): ?><input type="hidden" name="MAX_FILE_SIZE"
															 value="<?= $arParams["MAX_FILE_SIZE"] ?>" /><? endif ?>

				<? if (is_array($arResult["PROPERTY_LIST"]) && !empty($arResult["PROPERTY_LIST"])): ?>
					<div class="bg_top">
						<div class="qw_block">
							<div class="title">Тема вопроса</div>
							<div class="qw_input">
								<select name="PROPERTY[IBLOCK_SECTION][]">
									<?foreach($themesSelect as $themeSelect => $themeSelectVal):?>
										<option <?=($arParams['SECTION_ID'] == $themeSelect ? "selected='selected'" : "")?> value="<?=$themeSelect?>"><?=$themeSelectVal?></option>
									<?endforeach;?>
								</select>
							</div>
						</div>

						<div class="qw_block">
							<div class="title">Текст вопроса <span>*</span></div>
							<div class="qw_textarea">
								<textarea cols="30" rows="5" name="PROPERTY[265][0]"></textarea>
							</div>
						</div>
					</div>

					<div class="qw_bottom-wrapper">

							<div class="bottom-form">
								<div class="qw_block white">
									<div class="title">Ваше имя <span>*</span></div>
									<div class="qw_input">
										<input type="text" name="PROPERTY[264][0]"  value="">

									</div>
								</div>
								<div class="qw_block white">
									<div class="title">Ваш E-mail <span>*</span></div>
									<div class="qw_input">
										<input type="text" name="PROPERTY[267][0]"  value="">

									</div>
								</div>
								<div class="qw_block white">
									<div class="title">Ваш телефон </div>
									<div class="qw_input">
										<input type="text" name="PROPERTY[268][0]"  value="">

									</div>
								</div>
								<div class="cls"></div>
							</div>

					</div>

					<div class="capcha">
						<? if ($arParams["USE_CAPTCHA"] == "Y" && $arParams["ID"] <= 0): ?>
							<?= GetMessage("IBLOCK_FORM_CAPTCHA_TITLE") ?>
							<input type="hidden" name="captcha_sid" value="<?= $arResult["CAPTCHA_CODE"] ?>"/>
							<img src="/bitrix/tools/captcha.php?captcha_sid=<?= $arResult["CAPTCHA_CODE"] ?>" width="180" height="40" alt="CAPTCHA"/>
							<?= GetMessage("IBLOCK_FORM_CAPTCHA_PROMPT") ?><span class="starrequired">*</span>:
							<input type="text" name="captcha_word" maxlength="50" value="">
						<? endif ?>

						<input type="hidden" name="PROPERTY[NAME][0]" value="Вопрос" />

						<div class="" id="check_button">

							<input type="submit" class="btn" value="<?= GetMessage("IBLOCK_FORM_SUBMIT") ?>" name="iblock_submit" />
						</div>
					</div>
				<? endif ?>
		</form>
	<?endif;?>
