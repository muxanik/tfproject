<div style="height:16px;width:100%;white-space: nowrap;" class="start">
        <div class="swiper-wrapper">
<?$g = 1;?>
<?
	CModule::IncludeModule("iblock");
	$arSelect = Array("ID", "NAME", "PROPERTY_SSYLKA");
	$arFilter = Array("IBLOCK_ID"=>59, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
	$res = CIBlockElement::GetList(Array("SORT" => "ASC"), $arFilter, false, Array("nPageSize"=>8), $arSelect);
	while($ob = $res->GetNextElement()){ 
		$arFields = $ob->GetFields();
		?>
			<?$arM[] = $arFields["NAME"];?>
			<?if(count($arM) > 1):?><?$g = 0;?><?endif;?>
			<a style="color:#fff;" class="swiper-slide" <?if(!empty($arFields["PROPERTY_SSYLKA_VALUE"])):?>href="<?=$arFields["PROPERTY_SSYLKA_VALUE"];?>"> <?=$arFields["NAME"];?></a><?else:?><span style="color:#fff;" class="swiper-slide"><?=$arFields["NAME"];?></span><?endif;?>
			
                              
<? } ?> 
</div>
</div>
<?if($g == 0):?>
    <script>
    var swiper = new Swiper('.start', {
        direction: 'vertical',
        autoplay: 5500,
        spaceBetween: 30,
        loop: true
    });
    </script>
<?else:?>

<?endif;?>