<?php
//[ex2-580] Кастомизация каталога товаров
//require_once ("include/const.php");
//require_once  ("include/const.php");
//[ex2-580] Кастомизация каталога товаров

require_once ("include/const.php");

//[ex2-610] Регулярные задачи
require_once ("include/agents.php");
//[ex2-610] Регулярные задачи

//[ex2-590] Обновление элементов инфоблоков
require_once ("include/events.php");
//AddEventHandler('iblock', 'OnBeforeIBlockElementUpdate', ["Events", "OnBeforeReviewUpdate"]);
//AddEventHandler('iblock', 'OnAfterIBlockElementUpdate', ["Events", "OnAfterReviewUpdate"]);
//
//AddEventHandler('iblock', 'OnBeforeIBlockElementAdd', ["Events", "OnBeforeReviewUpdate"]);
//[ex2-590] Обновление элементов инфоблоков

//вариант 2
//AddEventHandler(
//    'iblock',
//	'OnBeforeIBlockElementUpdate',
//	["Events", "onBeforeReviewUpdate"],
//);
//AddEventHandler(
//    'iblock',
//    'OnBeforeIBlockElementAdd',
//    ["Events", "onBeforeReviewUpdate"],
//);
//
//addEventHandler('iblock', 'OnAfterIBlockElementUpdate', ["Events", "onAfterReviewUpdate"]);

//вариант 3
//AddEventHandler('iblock', 'OnBeforeIBlockElementUpdate', ["Events", 'OnBeforeReviewUpdate']);
//AddEventHandler('iblock', 'OnBeforeIBlockElementAdd', ["Events", 'OnBeforeReviewUpdate']);
//
//AddEventHandler('iblock', 'OnAfterIBlockElementUpdate', ["Events", 'OnAfterReviewUpdate']);

//вариант 4
//AddEventHandler('iblock', 'OnBeforeIBlockElementUpdate', ["Events", "onBeforeReviewUpdate"]);
//AddEventHandler('iblock', 'OnBeforeIBlockElementAdd', ["Events", "onBeforeReviewUpdate"]);
//
//AddEventHandler('iblock', 'OnAfterIBlockElementUpdate', ["Events", 'onAfterReviewUpdate']);

//вариант 5
AddEventHandler('iblock', 'OnBeforeIBlockElementUpdate', ["Events", "onBeforeReviewUpdate"]);
AddEventHandler('iblock', 'OnBeforeIBlockElementAdd', ["Events", "onBeforeReviewUpdate"]);

AddEventHandler('iblock', 'OnAfterIBlockElementUpdate', ["Events", "onAfterReviewUpdate"]);

//[ex2-600] Работа с авторами
AddEventHandler('main', 'OnBeforeUserUpdate', ["Events", "OnBeforeUserClassUpdate"]);
AddEventHandler('main', 'OnAfterUserUpdate', ["Events", "OnAfterUserClassUpdate"]);
//[ex2-600] Работа с авторами
//[ex2-620] Изменение данных при отправке почты
AddEventHandler('main', 'OnBeforeEventSend', ["Events", "OnBeforeUserUpdateEmail"]);
//[ex2-620] Изменение данных при отправке почты

//[ex2-630] Индексация элементов
//AddEventHandler('search', 'BeforeIndex', ["Events", "OnBeforeSearchIndex"]);
//[ex2-630] Индексация элементов
//вариант 2-3
//AddEventHandler('search', 'BeforeIndex', ["Events", "onBeforeIndex"]);

//вариант 4
AddEventHandler('search', 'BeforeIndex', ["Events", "onBeforeIndex"]);

//[ex2-190] Изменить административную часть сайта
AddEventHandler('main', 'OnBuildGlobalMenu', ['Events', 'OnBuildMenuItem']);
//[ex2-190] Изменить административную часть сайта