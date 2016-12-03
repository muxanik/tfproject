<?
AddEventHandler("main", "OnEndBufferContent", "deleteKernelJs");
AddEventHandler("main", "OnEndBufferContent", "deleteKernelCss");
AddEventHandler("iblock", "OnBeforeIBlockElementAdd", "OnBeforeIBlockElementAddHandler");

function deleteKernelJs(&$content) {
    global $USER, $APPLICATION;
    if((is_object($USER) && $USER->IsAuthorized()) || strpos($APPLICATION->GetCurDir(), "/bitrix/")!==false) return;
    if($APPLICATION->GetProperty("save_kernel") == "Y") return;

    $arPatternsToRemove = Array(
        '/<script.+?src=".+?kernel_main\/kernel_main\.js\?\d+"><\/script\>/',
        '/<script.+?src=".+?bitrix\/js\/main\/core\/core[^"]+"><\/script\>/',
        '/<script.+?>BX\.(setCSSList|setJSList)\(\[.+?\]\).*?<\/script>/',
        '/<script.+?>if\(\!window\.BX\)window\.BX.+?<\/script>/',
        '/<script[^>]+?>\(window\.BX\|\|top\.BX\)\.message[^<]+<\/script>/',
    );

    $content = preg_replace($arPatternsToRemove, "", $content);
    $content = preg_replace("/\n{2,}/", "\n\n", $content);
}

function deleteKernelCss(&$content) {
    global $USER, $APPLICATION;
    if((is_object($USER) && $USER->IsAuthorized()) || strpos($APPLICATION->GetCurDir(), "/bitrix/")!==false) return;
    if($APPLICATION->GetProperty("save_kernel") == "Y") return;

    $arPatternsToRemove = Array(
        '/<link.+?href=".+?kernel_main\/kernel_main\.css\?\d+"[^>]+>/',
        '/<link.+?href=".+?bitrix\/js\/main\/core\/css\/core[^"]+"[^>]+>/',
        '/<link.+?href=".+?bitrix\/templates\/[\w\d_-]+\/styles.css[^"]+"[^>]+>/',
        '/<link.+?href=".+?bitrix\/templates\/[\w\d_-]+\/template_styles.css[^"]+"[^>]+>/',
    );

    $content = preg_replace($arPatternsToRemove, "", $content);
    $content = preg_replace("/\n{2,}/", "\n\n", $content);
}

function OnBeforeIBlockElementAddHandler(&$arFields) {
    $params = Array(
        "max_len" => "200",
        "change_case" => "L",
        "replace_space" => "_",
        "replace_other" => "_",
        "delete_repeat_replace" => "true",
        "use_google" => "false",
    );
    if(!empty($arFields["PROPERTY_VALUES"][32])) {
        foreach ($arFields["PROPERTY_VALUES"][32] as $key => $arItems) {
            if ($arFields["PROPERTY_VALUES"][32][$key]["VALUE"]["type"] == 'image/jpeg') {
                $arFields["PROPERTY_VALUES"][32][$key]["VALUE"]["name"] = CUtil::translit($arFields["PROPERTY_VALUES"][32][$key]["VALUE"]["description"], "ru" , $params);
                $arFields["PROPERTY_VALUES"][32][$key]["VALUE"]["name"] = $arFields["PROPERTY_VALUES"][32][$key]["VALUE"]["name"].".jpg";
            }
        }
    }
    return $arFields;
}


function my_crop($text, $length, $clearTags = true)
{
    $text = trim($text);
    if ($clearTags === true)
        $text = strip_tags($text);
    if ($length <= 0 || strlen($text) <= $length)
        return $text;
    $out = mb_substr($text, 0, $length);
    $pos = mb_strrpos($out, ' ');
    if ($pos)
        $out = mb_substr($out, 0, $pos);
    return $out.'…';
}
@require_once 'include/autoload.php';
define("RE_SITE_KEY","6Lf4FhITAAAAAGk7nZyXsBFE0Y2YVhZvvIgl3a_t");
define("RE_SEC_KEY","6Lf4FhITAAAAAOZDVqC4NIYS1pBIAcuyCGB-u3i5");
?>