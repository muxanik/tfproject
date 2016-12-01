<?php
$obCache = new CPageCache;
$life_time = 120*60;
$cache_id = "slider_top";

if($obCache->StartDataCache($life_time, $cache_id, "/")){
?>











<!-- Slider main container -->
<div class="swiper-container slider_ng">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
        <!-- Slides -->
<?
	CModule::IncludeModule("iblock");
	$arSelect = Array("ID", "NAME", "PROPERTY_SSYLKAS", "DETAIL_PICTURE");
	$arFilter = Array("IBLOCK_ID"=>58, "ACTIVE"=>"Y");
	$res = CIBlockElement::GetList(Array("SORT" => "ASC"), $arFilter, false, Array("nPageSize"=>8), $arSelect);
	while($ob = $res->GetNextElement()){ 
		$arFields = $ob->GetFields();
		$arFilter = '';
		$arFileTmp = CFile::ResizeImageGet(
				$arFields["DETAIL_PICTURE"],
				array("width" => "839", "height" => "370"),
				BX_RESIZE_IMAGE_EXACT,
				true, $arFilter
		);
		
		$arFields['PICTURE_FOR_SLIDER'] = array(
				'SRC' => $arFileTmp["src"],
				'WIDTH' => $arFileTmp["width"],
				'HEIGHT' => $arFileTmp["height"],
		);
	
		?>

        <div class="swiper-slide"><?if(!empty($arFields["PROPERTY_SSYLKAS_VALUE"])):?><a href="<?=str_replace('/landing/', '/', $arFields["PROPERTY_SSYLKAS_VALUE"]);?>"><img class="lazyOwl"  src="<?=($arFields["PICTURE_FOR_SLIDER"]["SRC"]);?>" alt="Наши работы. Thomi Felgen"></a><?else:?><img class="lazyOwl"  src="<?=($arFields["PICTURE_FOR_SLIDER"]["SRC"]);?>" alt="Наши работы. Thomi Felgen"><?endif;?></div>
			
                              
<? } ?> 
    </div>
    <!-- If we need pagination -->
    <div class="swiper-pagination"></div>
    
    <!-- If we need navigation buttons -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>

</div>
 <script>        
  var mySwiper = new Swiper ('.slider_ng', {
    // Optional parameters
    loop: true,
	autoplay: 5500,

    // Navigation arrows
    nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev',
  });
</script>
<?php
$obCache->EndDataCache();
}
?>

<div class="body_inner">
<div class="title_h2"><h2>ВЫБЕРИТЕ УСЛУГУ</h2></div>
<!-- Slider main container -->
<div class="swiper-container usl">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
        <!-- Slides -->
<div class="swiper-slide">
			<a href="/services/Pokraska_diskov/"><img class="borderg effect2 lazyOwl" alt="покрасить диски" src="/images/services_main_page/pokrasit.jpg" title="покрасить диски"></a>
		</div>
<div class="swiper-slide">
			 <a href="/services/zerkalnaya-polirovka/"><img class="borderg effect2 lazyOwl" alt="отполировать диски" src="/images/services_main_page/otpolirovat.jpg"  title="отполировать диски"></a>
		</div>
<div class="swiper-slide">
			 <a href="/services/repair-restoration-edit-and-rolling-disks/"><img class="borderg effect2 lazyOwl"  alt="ремонтировать диски" src="/images/services_main_page/remontirovat.jpg" title="ремонтировать диски"></a>
		</div>
<div class="swiper-slide">
			 <a href="/services/tire-service/"><img class="borderg effect2 lazyOwl" alt="шиномонтаж" src="/images/services_main_page/shinomontazh.jpg" title="шиномонтаж"></a>
		</div>
	</div>
  <script>        
    var swiper = new Swiper('.usl', {

    slidesPerView: 4,
    loop: true,
    spaceBetween: 2,
        breakpoints: {
            1024: {
                slidesPerView: 4,
                spaceBetween: 40
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 30
            },
            640: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            320: {
                slidesPerView: 1,
                spaceBetween: 10
            }
        }
    });       
  </script>
</div>

</div>

<div class="body_inner our_advan">
<div class="col-2_3">
 
<div class="title_h2"><h2>НАШИ ПРЕИМУЩЕСТВА</h2></div>
	<div class="">
		
		<div>
			<div class="block1">
				<i class="fa fa-gears" aria-hidden="true"></i><br>
				Уникальные технологии покраски дисков
			</div>
			<div class="block1">
				<i class="fa fa-star-o" aria-hidden="true"></i><br>
				Эксклюзивная услуга зеркальной полировки дисков
			</div>
			<div class="block1">
				<i class="fa fa-certificate" aria-hidden="true"></i><br>
				Оборудование и материалы ведущих мировых производителей
			</div>
			<div class="block1">
				<i class="fa fa-users" aria-hidden="true"></i><br>
				Высококвалифицированный персонал
			</div>	
			<div class="block1">
				<i class="fa fa-refresh" aria-hidden="true"></i><br>
				Мы не просто красим диски, мы их бережно реставрируем!
			</div>
			<div class="block1">
				<span class="fa">3</span><br>
				Года гарантии на порошковую покраску дисков
			</div>				

		</div>
	</div>


</div>
<div class="clear"></div>
</div>
<div class="body_inner">
<div class="title_h2"><h2>НАШИ РАБОТЫ</h2></div>
<?php
$obCache = new CPageCache;
$life_time = 120*60;
$cache_id = "banner1_top";

if($obCache->StartDataCache($life_time, $cache_id, "/")){
?>
<!-- Slider main container -->
<div class="swiper-container raboty">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
        <!-- Slides -->
<?
	CModule::IncludeModule("iblock");
	$arSelect = Array("ID", "NAME", "DETAIL_PAGE_URL", "DETAIL_PICTURE", "PROPERTY_IMAGES");
	$arFilter = Array("IBLOCK_ID"=>5, "ACTIVE"=>"Y", "!=PROPERTY_NETDO_VALUE" =>"Да");
	$res = CIBlockElement::GetList(Array("RAND" => "DESC", "PROPERTY_IMAGES" =>"SORT"), $arFilter, false, Array("nPageSize"=>8), $arSelect);
	while($ob = $res->GetNextElement()){ 
		$arFields = $ob->GetFields();
		$arFilter = '';
		$arFileTmp = CFile::ResizeImageGet(
				$arFields["DETAIL_PICTURE"],
				array("width" => "500", "height" => "500"),
				BX_RESIZE_IMAGE_EXACT,
				true, $arFilter
		);
		
		$arFields['PICTURE_FOR_SLIDER'] = array(
				'SRC' => $arFileTmp["src"],
				'WIDTH' => $arFileTmp["width"],
				'HEIGHT' => $arFileTmp["height"],
		);
		$arFile = CFile::GetFileArray ($arFields["PROPERTY_IMAGES_VALUE"]);
		?>


<div class="swiper-slide">

<a href="<?=str_replace('/landing/', '/', $arFields["DETAIL_PAGE_URL"]);?>"><img class="swiper-lazy"  data-src="<?=($arFields["PICTURE_FOR_SLIDER"]["SRC"]);?>" alt="Наши работы. Thomi Felgen"></a>
</div>




<?}?>
</div>
    <!-- If we need navigation buttons -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
	</div>

  <script>        
    var swiper = new Swiper('.raboty', {

    slidesPerView: 2,
    loop: true,
    nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev',
    spaceBetween: 2,
	lazyLoading: true,
	preloadImages: false,

    });       
  </script>
<?php
$obCache->EndDataCache();
}
?>
</div>