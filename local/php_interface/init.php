<?php
require_once("include/const.php");
require_once("include/events.php");
require_once("include/agents.php");

AddEventHandler('iblock', 'OnBeforeIBlockElementUpdate', ['Events','onBeforeReviewsUpdate']);
AddEventHandler('iblock', 'OnAfterIBlockElementUpdate', ['Events','onAfterReviewsUpdate']);

AddEventHandler("main", "OnBeforeUserUpdate", Array("Events", "OnBeforeUserUpdateHandler"));
AddEventHandler("main", "OnAfterUserUpdate", Array("Events", "OnAfterUserUpdateHandler"));

AddEventHandler("main", "OnBeforeEventAdd", Array("Events", "OnBeforeUserUpdateInfo"));

AddEventHandler("search", "BeforeIndex", Array("Events", "BeforeIndexHandler"));

AddEventHandler("main", "OnBuildGlobalMenu", Array("Events", "addGlobalMenuItem"));