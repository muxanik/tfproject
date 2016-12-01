<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
//echo '<pre>'; print_r ($arResult); echo '</pre>';
$APPLICATION->AddHeadString('<meta name="viewport" content="width=device-width" />');
$COLOR_THEME = strlen($arParams['THEME']) ? $arParams['THEME'] : "blue";
$APPLICATION->SetAdditionalCSS($templateFolder.'/theme/'.$COLOR_THEME.'.css');
$admin = false;
if ($USER->IsAdmin()) $admin=true;
//if (CSite::InGroup($arParams['GROUP_PERMISSIONS'])) $admin=true;
?>

<div class="question_list" style="<?if(strlen($arParams['WIDTH'])):?>max-width: <?=$arParams['WIDTH']?>;<?endif?>">

<?if ($arParams['SHOW_LIST_QUEST']=='Y'){?>
    <div class="block_list_question">
        <?foreach ($arResult['ITEMS'] as $key=>$arItem){?>
            <div><span><a class="list_qwestion <?if (($admin)&&(trim($arItem['DETAIL_TEXT'])=='')){echo 'no_ansver';}?>" href="#qw<?=$arItem['ID']?>" name="listqw<?=$arItem['ID']?>"><?= (trim($arItem['PROPERTIES']['THEME']['VALUE'])!="") ? $arItem['PROPERTIES']['THEME']['VALUE'] : $arItem['NAME']?></a><br /></span></div>
        <?}?>
    </div>
    <?if ($arParams['SHOW_FORM']=="Y"){?>
        <div class="div_button">
            <div class="">
                <a class="qwestion_button" href="#<?=$arParams['FORM_ID']?>"><?=GetMessage("SUBMIT")?></a>
            </div>
        </div>
    <?}?>
<?}?>

<?/*if($arParams["DISPLAY_TOP_PAGER"]=='Y'):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;*/?>
<?foreach ($arResult['ITEMS'] as $arItem){?>
    <?
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    ?>
    <div class="faq" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <a name="qw<?=$arItem['ID']?>"></a>
        <?if(trim($arItem['PROPERTIES']['THEME']['VALUE'])!=""):?>
            <h6 class="faq_theme <?if (($admin)&&(trim($arItem['DETAIL_TEXT'])=='')){echo 'no_ansver';}?>">
                <?=$arItem['PROPERTIES']['THEME']['VALUE']?>
            </h6>
        <?endif?>
        <div class="cover">
            <?if(strlen($arItem['PROPERTIES']['USER_NAME']['VALUE'])):?>
                <div class="qw_answer-detail">
                    <div class="faq_ascs">
                        <?=GetMessage('ASCS')?>&nbsp;<?=$arItem['PROPERTIES']['USER_NAME']['VALUE']?>
                        <?if($arParams['SHOW_DATE'] == 'Y'):?>
                            <div class="data">
                                <?if (!empty($arItem['ACTIVE_FROM'])){
                                    echo FormatDate(array("" => 'j F Y'), MakeTimeStamp($arItem["DATE_ACTIVE_FROM"]), time());
                                }?>
                            </div>
                        <?endif?>
                        <div class="cls"></div>
                    </div>
                </div>
            <?endif?>
            <div class="faq_qwestion"><?=$arItem['PREVIEW_TEXT']?></div>
            <div class="cls"></div>
        </div>
        <div class="cover">
            <div class="qw_cover-wrapper">
                <?if (trim($arItem['DETAIL_TEXT'])!=""){?>
                    <div class="faq_ansver"><div><?=$arItem['DETAIL_TEXT']?></div></div>
                <?}?>
                <?if (($admin)&&(trim($arItem['DETAIL_TEXT'])=='')){?>
                    <div class="faq_ansver no_ansver">
                        <div class="">
                            <form action="" method="post" class="otvet">
                                <table style="border-collapse: collapse; border-spacing: 0;">
                                    <tr>
                                        <td>
                                            <div class="qw_title"><?=GetMessage('ANSWER')?></div>
                                            <div class="qw_textarea"><textarea name="ADMIN_ANSWER"></textarea></div>
                                        </td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="qw_title"><?=GetMessage('AUTHOR')?></div>
                                            <div class="qw_input"><input type="text" name="ADMIN_AUTHOR" value="<?=$USER->GetFullName();?>" /></div>
                                            <input name="ID_ELEMENT" value="<?=$arItem['ID']?>" type="hidden"/>
                                            <div class="cls"></div>
                                        </td>
                                        <td style="vertical-align: bottom;">
                                            <input class="qwestion_button" type="submit" value="<?=GetMessage('BT_ANSWER')?>" name="otvet_submit"/>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                <?}?>
                <?if (!empty($arItem['DETAIL_TEXT']) || $admin){?>
                <?if($arParams['SHOW_AVA'] == 'Y'):?>
                    <?$id_pict = 0?>
                    <?if (is_array($arItem['PROPERTIES']['ADMIN_ID']['VALUE'])&&(intval($arItem['PROPERTIES']['ADMIN_ID']['VALUE']['PERSONAL_PHOTO'])>0)){?>
                        <?$id_pict = intval($arItem['PROPERTIES']['ADMIN_ID']['VALUE']['PERSONAL_PHOTO']);?>
                    <?}elseif($admin && $arItem['ACTIVE'] != 'Y' && intval($arResult['USER_ANSWER']['PERSONAL_PHOTO'])){?>
                        <?$id_pict = intval($arResult['USER_ANSWER']['PERSONAL_PHOTO']);?>
                    <?}?>
                    <?if ($id_pict>0){?>
                        <?$arFileTmp = CFile::ResizeImageGet(
                            $id_pict,
                            array("width" => 74, 'height' => 74),
                            BX_RESIZE_IMAGE_EXACT,
                            false
                        );
                        $arSize = getimagesize($_SERVER["DOCUMENT_ROOT"].$arFileTmp["src"]);
                        $arFields['PREVIEW_PICTURE'] = array(
                            'SRC' => $arFileTmp["src"],
                            'WIDTH' => IntVal($arSize[0]),
                            'HEIGHT' => IntVal($arSize[1]),
                        );?>
                    <?}elseif(strlen($arParams['AVA']) && file_exists($_SERVER["DOCUMENT_ROOT"].$arParams['AVA'])){
                        $arFields['PREVIEW_PICTURE']['SRC'] = $arParams['AVA'];
                    }else{?>
                        <?$arFields['PREVIEW_PICTURE']['SRC'] = $templateFolder.'/images/face.gif';?>
                    <?}?>
                    
                <?endif?>
                <div class="cls"></div>
            </div>
            <div class="name_person">
                <?if (trim($arItem['PROPERTIES']['ADMIN_AUTHOR']['VALUE'])){?>
                    <?=$arItem['PROPERTIES']['ADMIN_AUTHOR']['VALUE']?>
                <?}else{?>
                    <?if (is_array($arItem['PROPERTIES']['ADMIN_ID']['VALUE'])){?>
                        <?=$arItem['PROPERTIES']['ADMIN_ID']['VALUE']['NAME'].' '.$arItem['PROPERTIES']['ADMIN_ID']['VALUE']['LAST_NAME']?>
                    <?}else{?>
                        <?if($admin){?>
                            <?=$USER->GetFullName();?>
                        <?}?>
                    <?}?>
                <?}?>

            </div>

            <div class="cls"></div>
            <?}?>
        </div>
        <?if ($arParams['SHOW_LIST_QUEST']=='Y'){?>
            <div class="up_arrow">
                <a href="#listqw<?=$arItem['ID']?>" class="up"><?=GetMessage('UP')?></a>
            </div>
        <?}?>
        <div class="cls"></div>
    </div>
<?}?>

<?/*if($arParams["DISPLAY_BOTTOM_PAGER"]=='Y'):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;*/?>

<?if ($arParams['SHOW_FORM']=="Y"){?>
<div class="title-form"><?=GetMessage("SUBMIT")?></div>
<form class="question" action="<?=$arResult['CUR_PAGE']?>" id="<?=$arParams['FORM_ID']?>" method="post">
    <a name='<?=$arParams['FORM_ID']?>'></a>
    <div class="bg_top">
        <?if($arResult['arRequest']['form'] == $arParams['FORM_ID'] && $arResult['arRequest']['status'] == 'ok' && intval($arResult['arRequest']['question_id'])){?>
            <div class="question_ok">
                <? echo $arResult['OK']; ?>
            </div>
        <?}?>
        <?if ($arResult['arRequest']['form'] == $arParams['FORM_ID'] && $arResult['arRequest']['status'] == 'error'){?>
            <div class="question_error">
                <? echo $arResult['ERROR']; ?>
            </div>
        <?}?>
        <?if (!empty($arParams['THEME_PROPERTY'])){?>
            <div class="qw_block">
                <div class="title"><?=GetMessage('THEME')?></div>
                <div class="qw_input"><input type="text" value="<?= !empty($arParams['THEME_PROPERTY']) ? $arResult['arRequest'][$arParams['THEME_PROPERTY']] : $arResult['arRequest']["THEME"]?>" name="<?= !empty($arParams['THEME_PROPERTY']) ? $arParams['THEME_PROPERTY'] : "THEME"?>" /></div>
            </div>
        <?}?>
        <div class="qw_block">
            <div class="title"><?=GetMessage('QWESTION')?> <span>*</span></div>
            <div class="qw_textarea"><textarea name="question" class="req" onchange="validen('', 'question')"><?=$arResult['arRequest']['question']?></textarea></div>
        </div>

    </div>
    <div class="qw_bottom-wrapper">
        <div class="bottom-form">
            <?foreach ($arResult['PROPERTY'] as $key=>$val){?>
                <?if (($key!=$arParams['THEME'])&&($key!='question')){?>
                    <div class="qw_block white">
                        <div class="title"><?=$val['NAME']?> <?=($val['required']=='Y') ? '<span>*</span>' : ""?></div>
                        <div class="qw_input"><input name="<?=$key?>" <?=($val['required']=='Y') ? 'onchange="validen(\'\', \''.$key.'\')"' : ''?> type="text" class="<?=($val['required']=='Y') ? "req" : ""?>" value="<?= isset($arResult['arRequest'][$key]) ? $arResult['arRequest'][$key] : ""?>"/></div>
                    </div>
                <?}?>
            <?}?>
            <div class="cls"></div>
        </div>
    </div>
    <?if(!$USER->IsAuthorized()){?>
        <?if (trim($arParams['CAPTCHA'])=='IROBOT'){?>
            <div class="capcha">
                <div class="capcha_sub">
                    <div class="title"><?=GetMessage('OUT_BLOCK')?> <span>*</span></div>
                    <div class="qw_perek qw_p_cons">
                        <div class="check" onclick="check_irobot()" id="check2"><span></span><div class="text" id="check_text"><?=getMessage('NO')?></div></div>
                    </div>
                    <div class="cls"></div>
                </div>
            </div>
        <?}elseif(trim($arParams['CAPTCHA'])=='USE_CAPTCHA'){?>
            <div class="capcha">
                <div class="capcha_sub">
                    <div class="mf-text"><?=GetMessage("MFT_CAPTCHA")?> <span>*</span></div>
                    <input type="hidden" name="captcha_sid" value="<?=$arResult["capCode"]?>">
                    <img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["capCode"]?>" width="180" height="40" alt="CAPTCHA">
                    <div class="mf-text"><?=GetMessage("MFT_CAPTCHA_CODE")?><span class="mf-req">*</span></div>
                    <input type="text" class="req" name="captcha_word" size="30" maxlength="50" value="" onchange="validen('', 'captcha_word')">
                </div>
            </div>
        <?}?>
    <?}?>
    <div class="capcha">
        <div class="button" id="check_button" >
            <span></span>
            <input type="button" name="" onclick="submit_qa()" class="qwestion_button block" value="<?=GetMessage('SUBMIT')?>"/>
        </div>
    </div>

    <input type="hidden" name="<?=$arParams['FORM_ID']?>" value="Y"/>
</form>
</div>
<?}?>

<script>
    var yes = '<?=GetMessage('YES')?>';
    var no = '<?=GetMessage('NO')?>';
    var formid = '<?=$arParams['FORM_ID']?>';
    var action = '<?=$APPLICATION->GetCurDir()//$arResult['CUR_PAGE']?>';
</script>