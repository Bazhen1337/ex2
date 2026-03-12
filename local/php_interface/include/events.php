<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    exit;
}

class Events
{
    public static string $revBefore = "";

    public static function onBeforeReviewsUpdate(&$fields): bool
    {
        if ($fields['IBLOCK_ID'] != REVIEWS_IB_ID) {
            return true;
        }

        $textLen = strlen($fields['PREVIEW_TEXT']);
        if ($textLen < 5) {
            global $APPLICATION;
            $APPLICATION->ThrowException(GetMessage('REVIEWS_BEFORE_UPDATE_ERROR_LEN', ['#CUR_LEN#' => $textLen]));
            return false;
        }

        $fields['PREVIEW_TEXT'] = str_replace('#del#', '', $fields['PREVIEW_TEXT']);


        $dbRes = \CIBlockElement::GetProperty(
            $fields['IBLOCK_ID'],
            $fields['ID'],
            [],
            ['CODE' => 'AUTHOR']
        );

        if ($arProp = $dbRes->Fetch()) {
            self::$revBefore = $arProp['VALUE'];
        }

        return true;
    }

    public static function onAfterReviewsUpdate(&$fields): bool
    {
        if ($fields['IBLOCK_ID'] != REVIEWS_IB_ID) {
            return true;
        }

        $revAfter = null;

        $dbRes = \CIBlockElement::GetProperty(
            $fields['IBLOCK_ID'],
            $fields['ID'],
            [],
            ['CODE' => 'AUTHOR']
        );

        if ($arProp = $dbRes->Fetch()) {
            $revAfter = $arProp['VALUE'];
        }

        if (self::$revBefore != $revAfter) {
            CEventLog::Add(array(
                "SEVERITY" => "INFO",
                "AUDIT_TYPE_ID" => "ex2_590",
                "MODULE_ID" => "iblock",
                "DESCRIPTION" => GetMessage('REVIEWS_AFTER_UPDATE_AUTHOR_CHANGED', [
                    '#REV_ID#' => $fields['ID'],
                    '#AUTHOR_BEFORE#' => self::$revBefore,
                    '#AUTHOR_AFTER#' => $revAfter
                ])
            ));
        }

        return true;
    }

    protected static array $userBefore = [];

    public static function OnBeforeUserUpdateHandler(&$fields)
    {
        self::$userBefore = \Bitrix\Main\UserTable::GetList([
                'filter' => ['ID' => $fields['ID']],
                'select' => ['UF_USER_CLASS', 'ID']]
        )->fetch();
    }

    public static function OnAfterUserUpdateHandler(&$fields): bool
    {
        if (!self::$userBefore) return true;

        if (self::$userBefore['ID'] == $fields['ID']
            &&
            self::$userBefore['UF_USER_CLASS'] != $fields['UF_USER_CLASS']
        ) {
            $listIDs = [self::$userBefore['UF_USER_CLASS'], $fields['UF_USER_CLASS']];
            $res = CUserFieldEnum::GetList(
                aFilter: ['ID' => $listIDs]
            );
            while ($val = $res->GetNext()) {
                $data[$val['ID']] = $val['VALUE'];
            }
            $res = [
                'OLD_USER_CLASS' => $data[self::$userBefore['UF_USER_CLASS']],
                'NEW_USER_CLASS' => $data[$fields['UF_USER_CLASS']]
            ];

            $lid = \Bitrix\Main\SiteTable::GetList(['filter' => ['ACTIVE' => 'Y'], 'limit' => 1])->fetch()['LID'];
            CEvent::Send('EX2_AUTHOR_INFO', $lid, $res);
        }
        return true;
    }

    public static function OnBeforeUserUpdateInfo(&$event, &$lid, &$arFields, &$messageId) {
        $arFields['CLASS'] = 'zxc';
//        if ($event == "USER_INFO")
//        {
//            // Получаем ID пользователя из полей. Обычно в USER_INFO передается USER_ID, ID и т.д.
//            $userId = 0;
//            if (isset($arFields["USER_ID"]) && $arFields["USER_ID"] > 0)
//                $userId = $arFields["USER_ID"];
//            elseif (isset($arFields["ID"]) && $arFields["ID"] > 0)
//                $userId = $arFields["ID"];
//
//            if ($userId > 0)
//            {
//                // Получаем пользовательское поле UF_USER_CLASS
//                $user = CUser::GetByID($userId)->Fetch();
//                if ($user['UF_USER_CLASS']) {
//                    $arFields['CLASS'] = $fields['UF_USER_CLASS'];
//                } else {
//                    $arFields['CLASS'] = Loc::getMessage('NOT_CLASS');
//                }
//            }
//        }
    }

    public static function BeforeIndexHandler123($arFields)
    {
        // Проверяем, что это рецензия (адаптируйте под ваш инфоблок)
        if ($arFields['MODULE_ID'] == 'iblock' && $arFields['PARAM2'] == REVIEWS_IB_ID) {
            // Получаем элемент инфоблока

            $res = CIBlockElement::GetByID($arFields['ITEM_ID']);
            if ($element = $res->Fetch()) {
                // Получаем значение свойства "Класс автора" (адаптируйте под ваше свойство)
                $property = CIBlockElement::GetProperty(
                    $element['IBLOCK_ID'],
                    $element['ID'],
                    [],
                    ['CODE' => 'AUTHOR'] // Код свойства класса автора
                )->Fetch();

                if ($property['PROPERTY_AUTHOR_VALUE']) {
                    $arUser = CUser::GetList(
                        ($by = 'id'),
                        ($order = 'asc'),
                        [
                            'ID' => $property['PROPERTY_AUTHOR_VALUE']
                        ],
                        [
                            'FIELDS' => ['ID'],
                            'SELECT' => ['UF_USER_CLASS'],
                        ],
                    )->fetch();

                    if ($arUser) {
                        $authorClass = $arUser['VALUE'];
                        if ($authorClass) {
                            // Добавляем класс автора к заголовку
                            $arFields['TITLE'] .= ' [' . $authorClass . ']';
                        }
                    }
                }
            }
        }

        return $arFields;
    }

    public static function BeforeIndexHandler($arFields)
    {
        if ($arFields['MODULE_ID'] == 'iblock' && $arFields['PARAM2'] == REVIEWS_IB_ID) {

            $res = CIBlockElement::GetByID($arFields['ITEM_ID']);

            if ($element = $res->Fetch()) {

                $property = CIBlockElement::GetProperty(
                    $element['IBLOCK_ID'],
                    $element['ID'],
                    [],
                    ['CODE' => 'AUTHOR']
                )->Fetch();

                if ($property['VALUE']) {

                    $arUser = CUser::GetList(
                        ($by = 'id'),
                        ($order = 'asc'),
                        ['ID' => $property['VALUE']],
                        [
                            'FIELDS' => ['ID'],
                            'SELECT' => ['UF_USER_CLASS']
                        ]
                    )->Fetch();

                    if ($arUser) {
                        $enum = CUserFieldEnum::GetList(
                            [],
                            ['ID' => $arUser['UF_USER_CLASS']]
                        )->Fetch();

                        $authorClass = $enum['VALUE'];

                        if ($authorClass) {
                            $arFields['TITLE'] .= ' [' . $authorClass . ']';
                        }
                    }
                }
            }
        }

        return $arFields;
    }

    public static function addGlobalMenuItem(&$aGlobalMenu, &$aModuleMenu)
    {
        global $USER;
        if (in_array(5, $USER->GetUserGroupArray())) {
            if (array_key_exists("global_menu_content", $aGlobalMenu)) {
                $aGlobalMenuFilter["global_menu_content"] = $aGlobalMenu["global_menu_content"];
            }

            foreach ($aModuleMenu as $item) {
                if ($item['parent_menu'] == 'global_menu_content') {
                    $aModuleMenuFilter[] = $item;
                }
            }

            $aGlobalMenuFilter['global_menu_quick'] = [
                'menu_id' => 'quick_access',
                'text' => 'Быстрый доступ',
                'title' => 'Быстрый доступ',
                'sort' => 100,
                'items_id' => 'global_menu_quick',
                'items' => [
                    [
                        'text' => 'Ссылка 1',
                        'url' => 'https://test1/'
                    ],
                    [
                        'text' => 'Ссылка 2',
                        'url' => 'https://test2/'
                    ]
                ]
            ];


            $aGlobalMenu = $aGlobalMenuFilter;
            $aModuleMenu = $aModuleMenuFilter;
        }
    }
}