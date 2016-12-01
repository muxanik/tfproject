<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$this->SetFrameMode(true);
?>
<?if(is_array($arResult["ITEMS"]) && count($arResult["ITEMS"])>0):?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 instagram-wrapper">
            <div class="instagram-block">
				<div class="header_left_banner">Мы в <a href="https://www.instagram.com/<?=$arParams["INSTAGRAM_NAME"]?>" target="_blank"><img class="instlogo" src="/upload/medialibrary/962/instimg.png"></a></div> 
            </div>
            <div id="instagram-slider" class="instagram-slider owl-theme owl-carousel">
                <?foreach($arResult["ITEMS"] as $arItem):?>
                    <?
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    ?>
                    <div class="item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                        <div class="ware_item_holder">
                            <div class="img_wrapper">
								<div class="img_holder"><div class="hoverinst"><div class="col-2_3"><div style="text-align:center; width:20%;float:left;"><?=$arItem["PROPERTIES"]["likes"]["VALUE"];?><img style="width:27px !important;margin: 0 auto;" src="/upload/medialibrary/f67/heart.png"></div><div style="width:80%;float:left;"><?=strip_tags($arItem["PREVIEW_TEXT"])?></div></div></div>
                                    <a href="<?=$arItem["PROPERTIES"]["link"]["VALUE"]?>" target="_blank" title="<?=strip_tags($arItem["PREVIEW_TEXT"])?>">
                                        <img src="<?=$arItem["PICTURE"]["SRC"]?>" alt="">
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                <?endforeach?>
            </div>
        </div>
        </div>
    </div>
<? endif; ?>
