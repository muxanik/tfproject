<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
$arParams["FORM_NAME"] = strlen($arParams["FORM_NAME"]) > 0 ? $arParams["FORM_NAME"] : GetMessage("WSM_CBP_FORM_NAME_DEFAULT");
$arParams["LINK_TEXT"] = strlen($arParams["LINK_TEXT"]) > 0 ? $arParams["LINK_TEXT"] : GetMessage("WSM_CBP_FORM_NAME_DEFAULT");
$arParams["DESC_TEXT"] = strlen($arParams["DESC_TEXT"]) > 0 ? $arParams["DESC_TEXT"] : GetMessage("WSM_CBP_FORM_DESCRIPTION");

if(!isset($arParams["WORK_TIME_FROM"]))
	$arParams["WORK_TIME_FROM"] = 8;

if(!isset($arParams["WORK_TIME_TO"]))
	$arParams["WORK_TIME_TO"] = 18;
	
$arParams["WORK_TIME_FROM"] = intval($arParams["WORK_TIME_FROM"]);
$arParams["WORK_TIME_TO"] = intval($arParams["WORK_TIME_TO"]); 

if($arParams["WORK_TIME_FROM"] < 0)
	$arParams["WORK_TIME_FROM"] = 0;
	
if($arParams["WORK_TIME_TO"] > 24)
	$arParams["WORK_TIME_TO"] = 24;

if($arParams["WORK_TIME_TO"] < $arParams["WORK_TIME_FROM"] )
 $arParams["WORK_TIME_TO"] = $arParams["WORK_TIME_FROM"] < 22 ? $arParams["WORK_TIME_FROM"] + 2 : $arParams["WORK_TIME_FROM"] + 0;
?>
<script>
var h = new Date();

var WSM_CBP_CALL_FORM = '<?=GetMessage("WSM_CBP_CALL_FORM")?>',
	WSM_CBP_CALL_TO = '<?=GetMessage("WSM_CBP_CALL_TO")?>',
	hour_from = <?=$arParams["WORK_TIME_FROM"]?>,
	hour_to = <?=$arParams["WORK_TIME_TO"]?>,
	hour_current = h.getHours();
	
	if(hour_current < hour_from || hour_current > hour_to)
		hour_current = hour_from;
	

</script>

<div id="wsm-callbackpro" class="btn" style="display:block; width:280px">
	
	<span class="link toggle" style="color:#fff;border:none !important;font-size:14px;"><?=$arParams["LINK_TEXT"]?></span>

	<div class="window" id="wsm_callbackpro_window">
		<div class="wsm_h2"><?=$arParams["FORM_NAME"]?></div>
		<a class="close toggle">X</a>
		
		<div class="message" id="wsm_callbackpro_message"><?=$arParams["DESC_TEXT"]?></div>

		<form action="#" method="post" name="form" id="wsm_callbackpro_form">

			<?foreach($arResult["FORM_FIELDS"] as $CODE => $arField):?>
			<div class="line">
				<label for="wsm_callback_<?=$CODE?>"><?=$arField['NAME']?>:<?if($arField['IS_REQUIRED'] == 'Y'):?><span class="red">*</span><?endif;?>
				
				<?if($CODE == 'TIME'):?>
				<span id="wsm-callbackpro-calltime"></span>
				<?endif;?>
				
				</label>
				<?
				switch($arField['TYPE'])
				{
					case 'S':
					?>
						<?if($CODE == 'TIME'):?>
						<input id="wsm_callback_<?=$CODE?>" type="hidden" name="CALLBACKPRO[TIME]" value="<?=$arResult["TIME"]?>"/>
						<div id="wsm-callbackpro-calltime-slider"></div>
						<script>
						$(function() {
							
							if(typeof $.fn.slider == 'function') {
										
								$( "#wsm-callbackpro-calltime-slider" ).slider({
									range: true,
									min: hour_from,
									max: hour_to,
									values: [ hour_current, hour_current + 8 ],
									slide: function( event, ui ) {
									var val = WSM_CBP_CALL_FORM + " " + ui.values[ 0 ] + ":00 " + WSM_CBP_CALL_TO + ' ' + ui.values[ 1 ] + ':00';
										$( "#wsm-callbackpro-calltime" ).text(val);
										$( "#wsm_callback_TIME" ).val(val);
										
										}
									});
									
									var v = WSM_CBP_CALL_FORM + " " + $( "#wsm-callbackpro-calltime-slider" ).slider( "values", 0 ) + ":00 " + WSM_CBP_CALL_TO + ' ' + $( "#wsm-callbackpro-calltime-slider" ).slider( "values", 1 ) + ':00';
									$( "#wsm-callbackpro-calltime" ).text(v);
									$( "#wsm_callback_TIME" ).val(v);
								}
								
							});
								
							
						</script>
						<?else:?>
							<input id="wsm_callback_<?=$CODE?>" type="text" name="CALLBACKPRO[<?=$CODE;?>]" placeholder="<?=$arField['HINT']?>" maxlength="70" value=""/>
						<?endif;?>
						<?
						break;
					
					case 'L':
						?>
						<select name="CALLBACKPRO[<?=$CODE;?>]">
							<?if($arField['IS_REQUIRED'] != 'Y'):?>
							<option value="0">...</option>
							<?endif;?>
							<?foreach($arField['VALUES'] as $id => $value):?>
								<option value="<?=$id?>"><?=$value['NAME']?></option>
							<?endforeach;?>
						</select>
						<?
						break;
				}
				?>
			</div>
			<?endforeach;?>

			<?if($arParams["FORM_CAPTCHA"] == 'Y'):?>
				<input type="hidden" name="CALLBACKPRO[captcha_sid]" value="<?=$arResult["CAPTCHA_CODE"]?>"/>
				
				<div class="line">
					<img class="captcha" name="captcha" src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" />
					<div class="captcha">
						<label for="wsm_callback_captcha_word"><?=GetMessage("WSM_CBP_CAPTCHA_CODE")?>:<span class="red">*</span></label>
						<input type="text" name="CALLBACKPRO[captcha_word]" maxlength="50" value="" placeholder="<?=GetMessage("WSM_CBP_CAPTCHA_CODE_PH")?>"/>	
					</div>
				</div>
			<?endif;?>
			
			<div class="line">
				<input type="submit" value="<?=GetMessage("WSM_CBP_SEND_FORM")?>"/>
			</div>
		</form>
	</div>
</div>


<script>
var CallbackPro;
document.body.appendChild(BX('wsm_callbackpro_window'));

BX.ready(function(){

	if (window.BX.WSMCallbackPro){
	
		CallbackPro = new BX.WSMCallbackPro({
			form: 			'wsm_callbackpro_form',
			message: 		'wsm_callbackpro_message',
			captcha_word: 	'CALLBACKPRO[captcha_word]',
			captcha_sid:  	'CALLBACKPRO[captcha_sid]',
			captcha_img:  	'captcha',
			started: function(data){
				
				},
			success: function(data){

				},
			error: function(data){

				}
			});
		}

	});	

$(document).ready(function(){

	$('input[name="CALLBACKPRO[PHONE]"]').bind("change keyup input click", function() {
		if (this.value.match(/[^0-9-()]/g))
			this.value = this.value.replace(/[^0-9-()?]/g, '');
		});
		
	$('#wsm-callbackpro .toggle, #wsm_callbackpro_window .toggle').bind('click', function(){
	
		var window = $('#wsm_callbackpro_window');
		var h, mt, top;
		
		if($(window).is(":visible")){
			$('.wsm-callbackpro-overlay').remove();
			}
		else{
			h = $(window).height();
			mt = -Math.ceil(h/2) + 10;
			$(window).css('margin-top', mt + 'px');

            //console.log(h, mt);

            $('body').append('<div class="wsm-callbackpro-overlay"></div>');
			$('.wsm-callbackpro-overlay').bind('click', function(){
				$(window).hide();
				$(this).remove();
				});
			
			}

		$(window).toggle();

		});
		
	});

</script>