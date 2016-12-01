<?php if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)die();

if (method_exists($this, 'setFrameMode')) {
	$this->setFrameMode(true);
}

if ($arResult['ACTION']['status']=='error') {
	ShowError($arResult['ACTION']['message']);
} elseif ($arResult['ACTION']['status']=='ok') {
	ShowNote($arResult['ACTION']['message']);
}
?>
<div style="background:#a7a7a7;">
<div id="asd_subscribe_res" style="display: none;"></div>
<div style="padding:0 10px;color:white;text-align:center;"><br>Скидки, акции, розыгрыши сертификатов. Количество ограничено. <br>БУДЬ ПЕРВЫМ КТО УЗНАЕТ!</div>
<form style="padding:10px;text-align:center;" class="question" action="<?= POST_FORM_ACTION_URI?>" method="post" id="asd_subscribe_form">
	<?= bitrix_sessid_post()?>
	<input type="hidden" name="asd_subscribe" value="Y" />
	<input type="hidden" name="charset" value="<?= SITE_CHARSET?>" />
	<input type="hidden" name="site_id" value="<?= SITE_ID?>" />
	<input type="hidden" name="asd_rubrics" value="<?= $arParams['RUBRICS_STR']?>" />
	<input type="hidden" name="asd_show_rubrics" value="<?= $arParams['SHOW_RUBRICS']?>" />
	<input type="hidden" name="asd_not_confirm" value="<?= $arParams['NOT_CONFIRM']?>" />
	<input type="hidden" name="site_url" value="<?= 'http://'.SITE_SERVER_NAME.$APPLICATION->GetCurPage(false);?>" />
	<input type="hidden" name="asd_key" value="<?= md5($arParams['JS_KEY'].$arParams['RUBRICS_STR'].$arParams['SHOW_RUBRICS'].$arParams['NOT_CONFIRM'])?>" />
	<div style="width:100%" class="qw_input"><input type="text" name="asd_email" value="" placeholder="Введите Ваш E-mail"/></div>
<br>
	<input onclick="ga('send', 'event', 'PNEWS', 'psend');yaCounter16377226.reachGoal('PNEWS'); return true;" class="ripplelink orange btn wwb" type="submit" name="asd_submit" id="asd_subscribe_submit" value="<?=GetMessage("ASD_SUBSCRIBEQUICK_PODPISATQSA")?>" />
	<div style="padding:0 10px;color:white;text-align:center;"><span style="font-size:10px">Письма приходят не чаще 2 раз в месяц</span></div>
		<?if (isset($arResult['RUBRICS'])):?>
		<br/>
		<?foreach($arResult['RUBRICS'] as $RID => $title):?>
		<input type="checkbox" name="asd_rub[]" id="rub<?= $RID?>" value="<?= $RID?>" />
		<label for="rub<?= $RID?>"><?= $title?></label><br/>
		<?endforeach;?>
	<?endif;?>
</form>
</div>