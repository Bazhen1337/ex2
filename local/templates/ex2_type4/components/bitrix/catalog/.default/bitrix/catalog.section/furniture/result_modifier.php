<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

//foreach ($arResult['ITEMS'] as $key => $arItem)
//{
//    $arItem['PRICES']['PRICE']['PRINT_VALUE'] = number_format((float)$arItem['PRICES']['PRICE']['PRINT_VALUE'], 0, '.', ' ');
//    $arItem['PRICES']['PRICE']['PRINT_VALUE'] .= ' '.$arItem['PROPERTIES']['PRICECURRENCY']['VALUE_ENUM'];
//
//    $arResult['ITEMS'][$key] = $arItem;
//}

//[ex2-580] Кастомизация каталога товаров
//$productsIds = array_column($arResult['ITEMS'], 'ID');
//
//
//$statusId = CIBlockElement::GetList(
//    arFilter: ["NAME" => 'Публикуется', 'IBLOCK_ID' => STATUSES_IB_ID],
//    arSelectFields: ["ID", "NAME"],
//)->Fetch()['ID'];
//
//$users = CUser::GetList(
//    $by = 'ID',
//    $order = 'ASC',
//    ['UF_AUTHOR_STATUS' => $statusId], // Пустой фильтр — выберет всех
//    [
//        "FIELDS" => ["ID"]     // Выбрать все стандартные поля
//    ]
//);
//
//$arUsersIds = array();
//while ($arUser = $users->Fetch()) {
//    $arUsersIds[] = $arUser['ID'];
//}
//
//$arReviews = [];
//
//$reviews = CIBlockElement::GetList(
//    arFilter: ['PROPERTY_PRODUCT' => $productsIds, "IBLOCK_ID" => REVIEW_IB_ID, 'PROPERTY_AUTHOR' => $arUsersIds],
//    arSelectFields: ["ID", "NAME", "PROPERTY_AUTHOR", "PROPERTY_PRODUCT"],
//);
//while($arReview = $reviews->Fetch()){
//    $arReviews[] = $arReview;
//}
//
//foreach ($arResult['ITEMS'] as $key => &$arItem) {
//    foreach ($arReviews as $arReview) {
//        if ($arReview['PROPERTY_PRODUCT_VALUE'] == $arItem['ID']) {
//            $arItem['REVIEWS'][] = $arReview;
//        }
//    }
//}
//unset($arItem);
//
//$arResult['COUNT_REVIEWS'] = count($arReviews);
//$arResult['FIRST_REV'] = $arReviews[0];
//$this->__component->SetResultCacheKeys(['COUNT_REVIEWS']);
//[ex2-580] Кастомизация каталога товаров

//вариант 2
//$productsIds = array_column($arResult['ITEMS'], 'ID');
//$statusId = CIBlockElement::GetList(
//    arFilter: ['IBLOCK_ID' => STATUSES_IB_ID, 'NAME' => PUBLISH_STATUS_NAME],
//    arSelectFields: ["ID", "NAME"],
//)->Fetch()['ID'];
//
//$users = CUser::GetList(
//    ($by="id"),
//    ($order="desc"),
//    ['UF_AUTHOR_STATUS' => $statusId],
//);
//
//$arUsersId = [];
//while($arUser = $users->GetNext()) {
//    $arUsersId[] = $arUser['ID'];
//}
//
//$reviews = CIBlockElement::GetList(
//    arFilter: ['IBLOCK_ID' => REVIEW_IB_ID, 'PROPERTY_AUTHOR' => $arUsersId, 'PROPERTY_PRODUCT' => $productsIds],
//    arSelectFields: ['ID', "NAME", "PROPERTY_PRODUCT", "PROPERTY_AUTHOR"],
//);
//$arReviews = [];
//while($arRev = $reviews->GetNext()) {
//    $arReviews[$arRev['PROPERTY_PRODUCT_VALUE']][] = $arRev;
//}
//foreach ($arResult['ITEMS'] as $key => $arItem)
//{
//    $arItem['PRICES']['PRICE']['PRINT_VALUE'] = number_format((float)$arItem['PRICES']['PRICE']['PRINT_VALUE'], 0, '.', ' ');
//    $arItem['PRICES']['PRICE']['PRINT_VALUE'] .= ' '.$arItem['PROPERTIES']['PRICECURRENCY']['VALUE_ENUM'];
//
//    $arResult['ITEMS'][$key] = $arItem;
//    $arResult['ITEMS'][$key]['REV'] = $arReviews[$arItem['ID']];
//}
//
//$arResult['COUNT'] = count($arReviews);
//$arResult['FIRST_REV'] = reset($arReviews)[0];
//$this->__component->SetResultCacheKeys(["COUNT"]);

//вариант 3
//$productsIds = array_column($arResult['ITEMS'], 'ID');
//
//$statusId = CIBlockElement::GetList(
//    arFilter: ["IBLOCK" => STATUSES_IB_ID, "NAME" => PUBLISH_STATUS_NAME, 'ACTIVE' => 'Y'],
//)->GetNext()['ID'];
//
//$userIds = CUser::GetList(
//    ($by="id"),
//    ($order="desc"),
//    ["UF_AUTHOR_STATUS" => $statusId]
//);
//
//$users = [];
//while ($userId = $userIds->GetNext()) {
//    $users[] = $userId['ID'];
//}
//
//$arReviews = CIBlockElement::GetList(
//    arFilter: ["IBLOCK" => REVIEW_IB_ID, 'PROPERTY_PRODUCT' => $productsIds, 'ACTIVE' => 'Y', 'PROPERTY_AUTHOR' => $users],
//    arSelectFields: ['ID', 'NAME', 'PROPERTY_PRODUCT', 'PROPERTY_AUTHOR']
//);
//
//$reviews = [];
//while ($arReview = $arReviews->GetNext()) {
//    $reviews[$arReview['PROPERTY_PRODUCT_VALUE']][] = $arReview;
//}
//foreach ($arResult['ITEMS'] as $key => $arItem)
//{
//    $arItem['PRICES']['PRICE']['PRINT_VALUE'] = number_format((float)$arItem['PRICES']['PRICE']['PRINT_VALUE'], 0, '.', ' ');
//    $arItem['PRICES']['PRICE']['PRINT_VALUE'] .= ' '.$arItem['PROPERTIES']['PRICECURRENCY']['VALUE_ENUM'];
//
//    $arResult['ITEMS'][$key] = $arItem;
//    $arResult['ITEMS'][$key]["REV"] = $reviews[$arItem["ID"]];
//}
//
//$arResult['COUNT'] = count($reviews);
//$arResult['FIRST_REV'] = reset($reviews)[0];
//$this->__component->SetResultCacheKeys(['COUNT']);

//вариант 4
//$productIds = array_column($arResult["ITEMS"], "ID");
//
//$statusId = CIBlockElement::GetList(
//    arFilter: ["IBLOCK" => STATUSES_IB_ID, "NAME" => PUBLISH_STATUS_NAME, "ACTIVE" => "Y"],
//    arSelectFields: ["ID"],
//)->Fetch()["ID"];
//
//$users = [];
//$arUsers = CUser::GetList(
//    ($by="id"),
//    ($order="desc"),
//    ["UF_AUTHOR_STATUS" => $statusId],
//);
//
//while($arUser = $arUsers->Fetch()) {
//    $users[] = $arUser['ID'];
//}
//
//$reviews = [];
//$arReviews = CIBlockElement::GetList(
//    arFilter: ["IBLOCK" => REVIEW_IB_ID, "ACTIVE" => "Y", "PROPERTY_AUTHOR" => $users, "PROPERTY_PRODUCT" => $productIds],
//    arSelectFields: ["ID", "NAME", "PROPERTY_PRODUCT", "PROPERTY_AUTHOR"],
//);
//while($arReview = $arReviews->Fetch()) {
//    $reviews[$arReview["PROPERTY_PRODUCT_VALUE"]][] = $arReview;
//}
//foreach ($arResult['ITEMS'] as $key => $arItem)
//{
//    $arItem['PRICES']['PRICE']['PRINT_VALUE'] = number_format((float)$arItem['PRICES']['PRICE']['PRINT_VALUE'], 0, '.', ' ');
//    $arItem['PRICES']['PRICE']['PRINT_VALUE'] .= ' '.$arItem['PROPERTIES']['PRICECURRENCY']['VALUE_ENUM'];
//
//    $arResult['ITEMS'][$key] = $arItem;
//    $arResult['ITEMS'][$key]['REV'] = $reviews[$arItem['ID']];
//}
//
//$arResult["COUNT"] = count($reviews);
//$arResult["FIRST_REV"] = reset($reviews)[0];
//$this->__component->SetResultCacheKeys(["COUNT"]);

//вариант 5
$productsIds = array_column($arResult["ITEMS"], 'ID');

$correctUsersIds = [];

$statusId = CIBlockElement::GetList(
    arFilter: ["IBLOCK" => STATUSES_IB_ID, "NAME" => PUBLISH_STATUS_NAME, "ACTIVE" => "Y"],
    arSelectFields: ['ID']
)->Fetch()['ID'];

$arUsers = CUser::GetList(
    $by='id',
    $order='ASC',
    ['UF_AUTHOR_STATUS' => $statusId, "GROUP_ID" => USER_REVIEW_GROUP_ID],
);
while ($user = $arUsers->GetNext()) {
    $correctUsersIds[] = $user['ID'];
}

$reviews = [];
$arReviews = CIBlockElement::GetList(
    arFilter: ["IBLOCK" => REVIEW_IB_ID, "PROPERTY_AUTHOR" => $correctUsersIds, 'PROPERTY_PRODUCT' => $productsIds, 'ACTIVE' => 'Y'],
    arSelectFields: ['ID', 'NAME', 'PROPERTY_PRODUCT']
);
while ($rev = $arReviews->GetNext()) {
    $reviews[$rev["PROPERTY_PRODUCT_VALUE"]][] = $rev;
}
foreach ($arResult['ITEMS'] as $key => $arItem)
{
    $arItem['PRICES']['PRICE']['PRINT_VALUE'] = number_format((float)$arItem['PRICES']['PRICE']['PRINT_VALUE'], 0, '.', ' ');
    $arItem['PRICES']['PRICE']['PRINT_VALUE'] .= ' '.$arItem['PROPERTIES']['PRICECURRENCY']['VALUE_ENUM'];

    $arResult['ITEMS'][$key] = $arItem;
    $arResult['ITEMS'][$key]['REV'] = $reviews[$arItem['ID']];
}

$arResult['COUNT'] = count($reviews);
$arResult['FIRST_REV'] = reset($reviews)[0];
$this->__component->SetResultCacheKeys(['COUNT']);

//$arResult['REV'] = $correctUsersIds;