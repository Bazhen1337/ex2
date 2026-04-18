<?php
//[ex2-580] Кастомизация каталога товаров
//if ($arResult["COUNT_REVIEWS"]) {
//    $meta = $APPLICATION->GetProperty('ex2_meta');
//    if (str_contains($meta, "#count#")) {
//        $meta = str_replace("#count#", $arResult["COUNT_REVIEWS"], $meta);
//        $APPLICATION->SetDirProperty('ex2_meta', $meta);
//    }
//}

//вариант 2
//if ($arResult['COUNT']) {
//    $prop = $APPLICATION->GetProperty('ex2_meta');
//    $prop = str_replace("#count#", $arResult['COUNT'], $prop);
//    $APPLICATION->SetPageProperty('ex2_meta', $prop);
//}

//вариант 3
//if ($arResult['COUNT']) {
//    $prop = $APPLICATION->GetProperty("ex2_meta");
//    $prop = str_replace("#count#", $arResult['COUNT'], $prop);
//    $APPLICATION->SetDirProperty("ex2_meta", $prop);
//}

//вариант 5
if ($arResult['COUNT']) {
    $prop = $APPLICATION->GetProperty("ex2_meta");
    $prop = str_replace("#count#", $arResult['COUNT'], $prop);
    $APPLICATION->SetPageProperty("ex2_meta", $prop);
}