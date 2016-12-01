<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
?>
										<div class="clear"></div>
									</div>

					<div class="clear"></div>
				</div>
			</div><div class="clear"></div>
			<div class="footer">
				<div class="footer_inner">
					<div class="footer_red_border"></div>
					<div class="bottom_menu_main">
						<div class="bottom_menu">
							<div class="bottom_menu_inner">
<?$APPLICATION->IncludeFile(
	SITE_TEMPLATE_PATH."/include_areas/footer_menu.php",
	Array(), //переменные
	Array(
	"MODE" => "html",                                  // будет редактировать в веб-редакторе
	"NAME" => "Редактирование"      // имя шаблона для нового файла
	)
);?>
							</div>
						</div>
						<div class="clear"></div>
					</div>
					<div class="footer_left">
						<div class="red_color bottom_contacts_number">
							<?$APPLICATION->IncludeFile(
								SITE_TEMPLATE_PATH."/include_areas/footer_phone.php",
								Array(), //переменные
								Array(
								"MODE" => "html",                                  // будет редактировать в веб-редакторе
								"NAME" => "Редактирование"      // имя шаблона для нового файла
								)
							);?>
						</div><br>
						<div><span class="visafooter"></span></div>

					</div>
					<div class="footer_right">

						<div class="soc_media">
							<div class="soc_media_element"><a href="https://www.facebook.com/thomifelgen" title="Мы на Facebook"><i class="fa fa-facebook-official"></i></a></div>
						<div class="soc_media_element"><a href="http://vk.com/thomifelgen" title="Наша группа Вконтакте"><i class="fa fa-vk"></i></a></div>
						<div class="soc_media_element"><a href="http://thomifelgen.livejournal.com/" title="Наш Live Journal"><span style="color:#6499cb;" class="glyphicon el-icon-livejournal"></span></a></div>
						<div class="soc_media_element"><a href="http://www.youtube.com/user/thomifelgenru?sub_confirmation=1" title="Наша канал на Youtube"><i class="fa fa-youtube-square"></i></a></div>
						<div class="soc_media_element"><a href="http://instagram.com/thomifelgen?ref=badge" title="Наша профиль в Instagram"><i class="fa fa-instagram"></i></a></div>
						<div class="soc_media_element"><a href="http://www.pinterest.com/thomifelgen/" title="Мы в Pinterest"><i class="fa fa-pinterest-square"></i></a></div>
						</div><div class="metrics">


						</div>

					</div>
					<div class="clear"></div>
					<?if(!CSite::InDir('/disk_kreator/')):?> <nav id="menu">
					<?$APPLICATION->IncludeComponent("bitrix:menu", "top", Array(
						"ROOT_MENU_TYPE" => "top",  // Тип меню для первого уровня
						"MENU_CACHE_TYPE" => "N", // Тип кеширования
						"MENU_CACHE_TIME" => "3600",  // Время кеширования (сек.)
						"MENU_CACHE_USE_GROUPS" => "Y", // Учитывать права доступа
						"MENU_CACHE_GET_VARS" => "",  // Значимые переменные запроса
						"MAX_LEVEL" => "1", // Уровень вложенности меню
						"CHILD_MENU_TYPE" => "left",  // Тип меню для остальных уровней
						"USE_EXT" => "N", // Подключать файлы с именами вида .тип_меню.menu_ext.php
						"DELAY" => "N", // Откладывать выполнение шаблона меню
						"ALLOW_MULTI_SELECT" => "N",  // Разрешить несколько активных пунктов одновременно
						),
						false
					);?>
						
			</nav><?endif;?>
					<div class="copyright">
						<?$APPLICATION->IncludeFile(
							SITE_TEMPLATE_PATH."/include_areas/copyright.php",
							Array(), //переменные
							Array(
							"MODE" => "html",                                  // будет редактировать в веб-редакторе
							"NAME" => "Редактирование"      // имя шаблона для нового файла
							)
						);?>
					</div>
				</div>
			</div>
						</div>
		<script type="text/javascript">
			/* <![CDATA[ */
			var google_conversion_id = 979682777;
			var google_custom_params = window.google_tag_params;
			var google_remarketing_only = true;
			/* ]]> */
		</script>
		
		<noscript>
			<div style="display:inline;"><img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/979682777/?value=0&amp;guid=ON&amp;script=0"/></div>
		</noscript>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-42247092-1', 'thomifelgen.ru');
  ga('require', 'displayfeatures');
  ga('send', 'pageview');
</script>
<script type=”text/javascript”>
var url = window.location.href;

// Will only work if string in href matches with location
$('#bactive li a[href="'+ url +'"]').addClass('active');

// Will also work for relative and absolute hrefs
$('#bactive li a').filter(function() {
    return this.href == url;
}).addClass('better-active');

</script>
<script async src='https://www.google.com/recaptcha/api.js?hl=ru'></script>
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter16377226 = new Ya.Metrika({
                    id:16377226,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/16377226" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<?if (!isset($_COOKIE['lcheck'])):?>   
<script>
function getCookie(c_name)
{
var i,x,y,ARRcookies=document.cookie.split(";");
for (i=0;i<ARRcookies.length;i++)
  {
  x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
  y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
  x=x.replace(/^\s+|\s+$/g,"");
  if (x==c_name)
    {
    return unescape(y);
    }
  }
}

function setCookie(c_name,value,exdays)
{
var exdate=new Date();
exdate.setDate(exdate.getDate() + exdays);
var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString())+ "; path=/";;
document.cookie=c_name + "=" + c_value;
}

$('.interactive').click(function(){
var lcheck=getCookie("lcheck");
    setCookie("lcheck",lcheck,75);
	$('.tel0').css('display','none');
    $('.hid1').css('display','none');
    $('.hid2').css('display','none');
    $('.tel1').css('display','block');
    ga('send', 'event', 'Contacts', 'show');
    yaCounter16377226.reachGoal('mclead'); return true;
})
$('.interactive1').click(function(){
var lcheck=getCookie("lcheck");
    setCookie("lcheck",lcheck,75);
	$('.tel0').css('display','none');
    $('.hid1').css('display','none');
    $('.hid2').css('display','none');
    $('.tel1').css('display','block');
    ga('send', 'event', 'Contacts', 'show');
    yaCounter16377226.reachGoal('mclead1'); return true;
})

	</script>

<?endif;?>

	</body>
</html>