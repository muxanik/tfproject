<?

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @var $arParams array
 * @var $arResult array
 */

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

$arParams["LINK_TEXT"] = strlen($arParams["LINK_TEXT"]) > 0 ? $arParams["LINK_TEXT"] : Loc::getMessage("WSM_CBP_FORM_NAME_DEFAULT");
$arParams["FORM_NAME"] = strlen($arParams["FORM_NAME"]) > 0 ? $arParams["FORM_NAME"] : Loc::getMessage("WSM_CBP_FORM_NAME_DEFAULT");
$arParams["DESC_TEXT"] = strlen($arParams["DESC_TEXT"]) > 0 ? $arParams["DESC_TEXT"] : Loc::getMessage("WSM_CBP_FORM_DESCRIPTION");

#$this->setFrameMode(true);

$arParams["HIDE_WINDOW_BODY_CLICK"] = $arParams["HIDE_WINDOW_BODY_CLICK"] == 'N' ? 'N' : 'Y';

if(!isset($arParams["WORK_TIME_FROM"]))
    $arParams["WORK_TIME_FROM"] = 8;

if(!isset($arParams["WORK_TIME_TO"]))
    $arParams["WORK_TIME_TO"] = 18;

$arParams["WORK_TIME_FROM"] = intval($arParams["WORK_TIME_FROM"]);
$arParams["WORK_TIME_TO"] = intval($arParams["WORK_TIME_TO"]);

if(!$arParams["WORK_TIME_FROM"] && !$arParams["WORK_TIME_TO"])
{
    $options_time_period = \Bitrix\Main\Config\Option::get($module_id, 'sms_time', '', SITE_ID);
    list($arParams["WORK_TIME_FROM"], $arParams["WORK_TIME_TO"]) = explode(',', $options_time_period);
}

if($arParams["WORK_TIME_FROM"] < 0)
    $arParams["WORK_TIME_FROM"] = 0;

if($arParams["WORK_TIME_TO"] > 24)
    $arParams["WORK_TIME_TO"] = 24;

if($arParams["WORK_TIME_TO"] < $arParams["WORK_TIME_FROM"] )
    $arParams["WORK_TIME_TO"] = $arParams["WORK_TIME_FROM"] < 20 ? $arParams["WORK_TIME_FROM"] + 8 : $arParams["WORK_TIME_FROM"] + 0;


$arParams["CONTAINER_ID"] = 'wsm_callbackpro';


$arJS = array(

    'container_id' => $arParams["CONTAINER_ID"].'_'.$arResult["FORM_ID"],
    'window_id' => $arParams["CONTAINER_ID"].'_window_'.$arResult["FORM_ID"],
    'form_id' => $arParams["CONTAINER_ID"].'_form_'.$arResult["FORM_ID"],
    'message_id' => $arParams["CONTAINER_ID"].'_message_'.$arResult["FORM_ID"],
    'time_slider_id' => $arParams["CONTAINER_ID"].'_time_slider_'.$arResult["FORM_ID"],

    'fields' => array(),

    'params' => array(
        'url' => $componentPath.'/ajax.php',
        'include_jquery_maskedinput' => $arParams["INCLUDE_JQUERY_MASKEDINPUT"] === 'Y',
        'jquery_maskedinput_mask' => $arParams["JQUERY_MASKEDINPUT_MASK"],
        'hide_window_on_body_click' => $arParams["HIDE_WINDOW_BODY_CLICK"] === 'Y',
        'hour_from' => (int)$arParams["WORK_TIME_FROM"],
        'hour_to'=> (int)$arParams["WORK_TIME_TO"],
        'hour_current' => null,
    ),
    'mess' => array(
        'time_from' => Loc::getMessage("WSM_CBP_CALL_FORM"),
        'time_to' => Loc::getMessage("WSM_CBP_CALL_TO")
    )
);

$arFormFieldsID = array();
foreach($arResult["FORM_FIELDS"] as $CODE => $arField)
    $arJS['fields'][$CODE] = 'wsm_callback_input_'.$CODE.'_'.$arResult["FORM_ID"];

?>
<script>
    var WsmCallbackPro_<?=$arResult["FORM_ID"]?>,
        wsm_callbackpro_<?=$arResult["FORM_ID"]?> = <?=\Cutil::PhpToJSObject($arJS);?>;
</script>

<div class="wsm_callbackpro_container" id="<?=$arJS['container_id']?>">
    <?
    $frame = $this->createFrame($arJS['container_id'], false)->begin();
    ?>

    <span class="link toggle" onclick="ga('send', 'event', 'ZOZ', 'click');yaCounter16377226.reachGoal('ZOZ'); return true;"><?=$arParams["LINK_TEXT"]?></span>

    <div id="<?=$arJS['window_id']?>" class="window <?if($arParams["FLOAT_RIGHT"] == 'Y'):?>right<?else:?>left<?endif;?>">

        <h2 class="toggle"><?=$arParams["FORM_NAME"]?></h2>
        <a class="close toggle"></a>

        <div class="message" id="<?=$arJS['message_id']?>"><?=$arParams["DESC_TEXT"]?></div>

        <form id="<?=$arJS['form_id']?>" action="<?=$arJS['params']['url']?>" method="post" name="form">

            <?foreach($arResult["FORM_FIELDS"] as $CODE => $arField):?>
                <div class="line">
                    <label for="<?=$arJS['fields'][$CODE]?>">
                        <?=$arField['NAME']?>:

                        <?if($CODE == 'CTIME'):?>
                            <span id="<?=$arJS['fields']['CTIME']?>_text" class="time_info"></span>
                        <?endif;?>

                        <?if($CODE == 'CTIME'):?>
                            <span id="<?=$arJS['fields']['CTIME']?>_text" class="time_info"></span>
                        <?endif;?>

                        <?if($arField['IS_REQUIRED'] == 'Y'):?><span class="red">*</span><?endif;?>

                    </label>
                    <?
                    switch($arField['TYPE'])
                    {
                        case 'S':

                            if($CODE == 'CTIME')
                            {
                                ?>
                                <input id="<?=$arJS['fields'][$CODE]?>" type="hidden" name="<?=$CODE?>" value="<?=$arResult["CTIME"]?>"/>
                                <div id="<?=$arJS['time_slider_id']?>" class="slider"></div>
                            <?
                            }
                            else
                            {
                                ?>
                                <input id="<?=$arJS['fields'][$CODE]?>" type="text" name="<?=$CODE;?>" placeholder="<?=$arField['HINT']?>" maxlength="70" value=""/>
                            <?
                            }

                            break;

                        case 'L':
                            ?>
                            <select name="<?=$CODE;?>"  id="<?=$arJS['fields'][$CODE]?>">
                                <?if($arField['IS_REQUIRED'] != 'Y'):?>
                                    <option value="0">...</option>
                                <?endif;?>
                                <?foreach($arField['VALUES'] as $id => $value):?>
                                    <option value="<?=$id?>"><?=$value?></option>
                                <?endforeach;?>
                            </select>
                            <?
                            break;
                    }
                    ?>
                </div>
            <?endforeach;?>

            <?if($arParams["FORM_CAPTCHA"] == 'Y'):?>
                <input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>"/>

                <div class="line captcha-code">
                    <img class="captcha" name="captcha" src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" />

                    <div class="captcha">
                        <label for="wsm_callback_captcha_word"><?=Loc::getMessage("WSM_CBP_CAPTCHA_CODE")?>:<span class="red">*</span></label>
                        <input type="text" name="captcha_word" maxlength="50" value="" placeholder="<?=Loc::getMessage("WSM_CBP_CAPTCHA_CODE_PH")?>"/>
                    </div>
                </div>
            <?endif;?>

            <div class="line">
                <input class="btn wwb" type="submit" value="<?=Loc::getMessage("WSM_CBP_SEND_FORM")?>"></button>
            </div>
        </form>

        <script>
            ;(function(arParmas){

                var current_time = new Date();

                arParmas.params.hour_current = current_time.getHours();

                if(arParmas.params.hour_current < arParmas.params.hour_from || arParmas.params.hour_current >= arParmas.params.hour_to)
                    arParmas.params.hour_current = parseInt(arParmas.params.hour_from);

                BX.ready(function(){

                    //document.body.appendChild(BX(arParmas.window_id));

                    if (window.BX.WSMCallbackPro){

                        WsmCallbackPro_<?=$arResult["FORM_ID"]?> = new BX.WSMCallbackPro({
                            url: arParmas.params.url,
                            form: arParmas.form_id,
                            message: arParmas.message_id,
                            captcha_word: 'captcha_word',
                            captcha_sid:  'captcha_sid',
                            captcha_img:  'captcha',
                            started: function(data){

                            },
                            success: function(data){

                            },
                            error: function(data){

                            }
                        });
                    }

                    // set data
                    var v = arParmas.mess.time_from + " " + arParmas.params.hour_current + ":00 " + arParmas.mess.time_to + ' ' + (arParmas.params.hour_current + 8) + ':00';
                    BX(arParmas.fields.CTIME).value = v;
                    BX(arParmas.fields.CTIME + '_text').innerHTML = v;

                });

                $(function(){

                    if(typeof $.fn.slider == 'function') {

                        $('#' + arParmas.time_slider_id).slider({
                            range: true,
                            min: parseInt(arParmas.params.hour_from),
                            max: parseInt(arParmas.params.hour_to),
                            values: [arParmas.params.hour_current, arParmas.params.hour_current + 8],
                            slide: function( event, ui ) {

                                var val = arParmas.mess.time_from + " " + ui.values[ 0 ] + ":00 " + arParmas.mess.time_to + ' ' + ui.values[ 1 ] + ':00';
                                $( "#" + arParmas.fields.CTIME ).val(val);
                                $( "#" + arParmas.fields.CTIME + '_text' ).text(val);

                                }
                            });

                        }

                    // jquery masked input for PHONE
                    if(arParmas.params.include_jquery_maskedinput && typeof $.fn.mask == 'function'){
                        $("#"+arParmas.fields.PHONE).mask(arParmas.params.jquery_maskedinput_mask,{placeholder:""});
                    }
                    else {
                        $("#"+arParmas.fields.PHONE).bind("change keyup input click", function() {
                            if (this.value.match(/[^0-9-()]/g))
                                this.value = this.value.replace(/[^0-9-()?]/g, '');
                        });
                    }

                    var window = $('#' + arParmas.window_id);

                    if(arParmas.params.hide_window_on_body_click){
                        $('#' + arParmas.window_id).bind('click', function(event){
                            event.stopPropagation();
                           });
                        }
                    // toggle form
                    $('#' + arParmas.container_id + ' .toggle, #' + arParmas.window_id + ' .toggle').bind('click', function(){

                        $(window).toggle();

                        if(arParmas.params.hide_window_on_body_click){

                            if(window.is(":visible")){
                                $('body').bind('click', function(){
                                    window.hide();
                                    });
                                }
                            else{
                                $('body').unbind('click');
                                }
                            }

                        return false;

                        });



                });

            })(wsm_callbackpro_<?=$arResult["FORM_ID"]?>);

        </script>

    </div>
    <?
    $frame->beginStub();

    echo 'Loading...';

    $frame->end();
    ?>
</div>