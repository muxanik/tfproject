if (typeof($) !== 'undefined') {
	$(document).ready(function() {
		$('#asd_subscribe_submit').click(function(){
			if (!$.trim($('#asd_subscribe_form input[name$="asd_email"]').val()).length) {
				return false;
			}
			var arPost = {};
			$.each($('#asd_subscribe_form input'), function() {
				if ($(this).attr('type')!='checkbox' || ($(this).attr('type')=='checkbox' && $(this).is(':checked'))) {
					arPost[$(this).attr('name')] = $(this).val();
				}
			})
			$('#asd_subscribe_res').hide();
			$('#asd_subscribe_submit').attr('disabled', 'disabled');
			$.post('/bitrix/components/asd/subscribe.quick.form/action.php', arPost,
					function(data) {
						$('#asd_subscribe_submit').removeAttr('disabled');
						if (data.status == 'error') {
							$('#asd_subscribe_res').css('color', 'red');
						} else {
							$('#asd_subscribe_res').css('color', 'green');
						}
						$('#asd_subscribe_res').html(data.message);
						$('#asd_subscribe_res').show();
					}, 'json');
			return false;
		});
	});
}
if (typeof($) !== 'undefined') {
	$(document).ready(function() {
		$('#asd_subscribe_submit1').click(function(){
			if (!$.trim($('#asd_subscribe_form1 input[name$="asd_email"]').val()).length) {
				return false;
			}
			var arPost = {};
			$.each($('#asd_subscribe_form1 input'), function() {
				if ($(this).attr('type')!='checkbox' || ($(this).attr('type')=='checkbox' && $(this).is(':checked'))) {
					arPost[$(this).attr('name')] = $(this).val();
				}
			})
			$('#asd_subscribe_res1').hide();
			$('#asd_subscribe_submit1').attr('disabled', 'disabled');
			$.post('/bitrix/components/asd/subscribe.quick.form/action.php', arPost,
					function(data) {
						$('#asd_subscribe_submit1').removeAttr('disabled');
						if (data.status == 'error') {
							$('#asd_subscribe_res1').css('color', 'red');
						} else {
							$('#asd_subscribe_res1').css('color', 'green');
						}
						$('#asd_subscribe_res1').html(data.message);
						$('#asd_subscribe_res1').show();
					}, 'json');
			return false;
		});
	});
}