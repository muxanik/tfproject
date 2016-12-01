<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

?>
<?
	$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/jquery.event.move.js');
	$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/jquery.twentytwenty.js');
	$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/css/twentytwenty.css');
?>

<script>
$(window).load(function(){
  $(".container1").twentytwenty();
});
	</script>
<style>
.preloader{
  background:rgba(255,255,255,0.9);
		position:absolute;
  top:0px;
  left:0px;
  width:100%;
  height:100%;
  z-index:9998;
  opacity:1;

}
.preloader .preimg{
		position:absolute;
  height:40px;
  width:40px !important;
  z-index:9999;
  top:40%;
  left:45%;
  transition: all 0.5s ease-in-out;
  -moz-transition: all 0.5s ease-in-out;
  -o-transition: all 0.5s ease-in-out;
  -webkit-transition: all 0.5s ease-in-out;
}

</style>
<div class="catalog-section">
<div class="body_inner">
	<div class="catalog-section-descr"><?=$arResult["~DESCRIPTION"]?></div>
	</div>
	<div class="col-2">
<?foreach($arResult["ITEMS"] as $arItems):?>


		<div class="col-2-div">
			<div style="position:relative;overflow:hidden;">
				<a href="<?=$arItems["DETAIL_PAGE_URL"]?>"><div class="button_rab">Смотреть</div></a>
		<div class="loader-container arc-rotate">
			<div class="loader">
				<div class="arc"></div>
			</div>
		</div>



		<?if($arItems["PROPERTIES"]["NETDO"]["VALUE"] == "Да"):?>
<?if(is_array($arItems["PICTURE_FOR_SLIDER"])):?>
			<div class="owl-carousel-catalog_section effect2">

				<a href="<?=$arItems["DETAIL_PAGE_URL"]?>"><img class="lazyOwl" data-src="<?=$arItems['PICTURE_PREVIEW']['SRC']?>" data-src-retina="<?=$arItems['PICTURE_PREVIEW']['SRC']?>" alt="<?=$arItems["NAME"]?>"></a>
	
		<?foreach($arItems["PICTURE_FOR_SLIDER"]["VALUE"] as $key => $arImages):?>		
				<a href="<?=$arItems["DETAIL_PAGE_URL"]?>"><img class="lazyOwl" data-src="<?=$arImages['SRC']?>" data-src-retina="<?=$arImages['SRC']?>" alt="<?=$arItems["NAME"]?>"></a>
		<?endforeach;?>
	<?else:?>
			<div class="catalog_item_image owl-carousel-1_item">
				<a href="<?=$arItems["DETAIL_PAGE_URL"]?>"><img src="<?=$arItems['PICTURE_PREVIEW']['SRC']?>" alt="<?=$arItems["NAME"]?>"></a>
<?endif;?>
<?else:?>
				<div class="container1 effect2" style="width:100%;height:100%;">

		<img src="<?=$arItems["PICTURE_FOR_SLIDER"]["VALUE"]["0"]['SRC']?>" data-src-retina="<?=$arImages['SRC']?>" alt="<?=$arItems["NAME"]?>" title="<?=$arItems["NAME"]?>">
		<img style="position:absolute;" src="<?=$arItems['PICTURE_PREVIEW']['SRC']?>" data-src-retina="<?=$arItems['PICTURE_PREVIEW']['SRC']?>" alt="<?=$arItems["NAME"]?>" title="<?=$arItems["NAME"]?>">


	<?endif;?>
			</div>
<div class="clear"></div>
			<div class="catalog_item_conteiner">
				<a href="<?=$arItems["DETAIL_PAGE_URL"]?>"><div class="catalog_item_name">
					<span style="font-weight:800;font-size:16px;padding:10px;"><?=$arItems["NAME"]?></span>
					</div></a>

				
			</div>

			<div class="clear"></div>
				</div></div>	
<?endforeach;?>
		<div class="clear"></div>
	</div>	

<div class="news_pagenav">
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
</div>
<script>
$(window).load(function(){
  $(".loader-container").fadeOut("slow");

});
</script>
