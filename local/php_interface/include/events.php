<?php

class Events
{
    //[ex2-590] Обновление элементов инфоблоков
//    static public string $authorBefore;
//    static public function OnBeforeReviewUpdate(&$fields): bool {
//        if ($fields["IBLOCK_ID"] != REVIEW_IB_ID) {
//            return true;
//        }
//
//        if (strlen($fields["PREVIEW_TEXT"]) < 5) {
//            global $APPLICATION;
//            $APPLICATION->ThrowException(GetMessage("REVIEW_UPDATE_ERROR_MESSAGE", ["#COUNT#" => strlen($fields["PREVIEW_TEXT"])]));
//            return false;
//        }
//        $fields["PREVIEW_TEXT"] = str_replace("#del#", "", $fields["PREVIEW_TEXT"]);
//
//        self::$authorBefore = CIBlockElement::GetProperty(
//            $fields["IBLOCK_ID"],
//            $fields["ID"],
//            [],
//            ["CODE" => "AUTHOR"]
//        )->Fetch()['VALUE'];
//
//        return true;
//    }
//
//    static public function OnAfterReviewUpdate(&$fields): bool {
//        if ($fields['IBLOCK_ID'] != REVIEW_IB_ID) {
//            return true;
//        }
//        $authorAfter = CIBlockElement::GetProperty(
//            $fields["IBLOCK_ID"],
//            $fields["ID"],
//            [],
//            ["CODE" => "AUTHOR"]
//        )->Fetch()['VALUE'];
//        if ($authorAfter != self::$authorBefore) {
//            CEventLog::Add(
//                [
//                    "AUDIT_TYPE_ID" => "ex2_590",
//                    "MODULE_ID" => "iblock",
//                    "DESCRIPTION" => GetMessage("REVIEW_AUTHOR_CHANGED", [
//                        "#REVIEW_ID#" => $fields["ID"],
//                        "#AUTHOR_BEFORE_ID#" => self::$authorBefore,
//                        "#AUTHOR_AFTER_ID#" => $authorAfter,
//                    ]),
//                ]
//            );
//        }
//        return true;
//    }
    //[ex2-590] Обновление элементов инфоблоков

    //вариант 2
//    static public string $authorBefore = "";
//    public static function onBeforeReviewUpdate(&$fields): bool
//    {
//        if ($fields['IBLOCK_ID'] != REVIEW_IB_ID) return true;
//        if (strlen($fields["PREVIEW_TEXT"]) < 5) {
//            global $APPLICATION;
//            $APPLICATION->ThrowException(GetMessage("REVIEW_SHORT", ["#LENGHT#" => strlen($fields["PREVIEW_TEXT"])]));
//            return false;
//        }
//        if (str_contains($fields["PREVIEW_TEXT"], "#del#")) {
//            $fields["PREVIEW_TEXT"] = str_replace("#del#", "", $fields["PREVIEW_TEXT"]);
//        }
//        self::$authorBefore = CIBlockElement::GetProperty(
//            REVIEW_IB_ID,
//            $fields['ID'],
//            [],
//            ["CODE" => "AUTHOR"]
//        )->Fetch()['VALUE'];
//        return true;
//    }
//
//    public static function onAfterReviewUpdate(&$fields):bool {
//        if ($fields['IBLOCK_ID'] != REVIEW_IB_ID) return true;
//        $authorAfter = CIBlockElement::GetProperty(
//            REVIEW_IB_ID,
//            $fields['ID'],
//            [],
//            ["CODE" => "AUTHOR"]
//        )->Fetch()['VALUE'];
//        if ($authorAfter != self::$authorBefore) {
//            CEventLog::Add(array(
//                "AUDIT_TYPE_ID" => "ex2_590",
//                "MODULE_ID" => "iblock",
//                "ITEM_ID" => $fields['ID'],
//                "DESCRIPTION" => GetMessage("AUTHOR_CHANGED", ["#ID#" => $fields['ID'], "#AUTHOR_BEFORE#" => self::$authorBefore, "#AUTHOR_AFTER#" => $authorAfter]),
//            ));
//        }
//        return true;
//    }

    //вариант 3
//    public static string $authorBefore = "";
//    public static function OnBeforeReviewUpdate(&$fields): bool {
//        if ($fields['IBLOCK_ID'] != REVIEW_IB_ID) return true;
//        if (strlen($fields['PREVIEW_TEXT']) < 5) {
//            global $APPLICATION;
//            $APPLICATION->ThrowException(GetMessage('REVIEW_SHORT', ['#LENGHT#' => strlen($fields['PREVIEW_TEXT'])]));
//            return false;
//        }
//        if (str_contains($fields["PREVIEW_TEXT"], '#del#')) {
//            $fields["PREVIEW_TEXT"] = str_replace('#del#', '', $fields["PREVIEW_TEXT"]);
//        }
//        self::$authorBefore = CIBlockElement::GetProperty(
//            REVIEW_IB_ID,
//            $fields["ID"],
//            [],
//            ["CODE" => "AUTHOR"]
//        )->Fetch()['VALUE'];
//        return true;
//    }
//
//    public static function OnAfterReviewUpdate(&$fields): bool {
//        if ($fields['IBLOCK_ID'] != REVIEW_IB_ID) return true;
//        $authorAfter = CIBlockElement::GetProperty(
//            REVIEW_IB_ID,
//            $fields["ID"],
//            [],
//            ["CODE" => "AUTHOR"]
//        )->Fetch()['VALUE'];
//        if ($authorAfter != self::$authorBefore) {
//            CEventLog::Add(array(
//                "AUDIT_TYPE_ID" => "ex2_590",
//                "MODULE_ID" => "iblock",
//                "ITEM_ID" => $fields['ID'],
//                "DESCRIPTION" => GetMessage("AUTHOR_CHANGED", [
//                    "#ID#" => $fields['ID'],
//                    "#AUTHOR_BEFORE#" => self::$authorBefore,
//                    "#AUTHOR_AFTER#" => $authorAfter
//                ]),
//            ));
//        }
//        return true;
//    }

    //вариант 4
//    public static string $authorBefore = "";
//    public static function onBeforeReviewUpdate(&$fields): bool
//    {
//        if($fields["IBLOCK_ID"] != REVIEW_IB_ID) return true;
//        if (strlen($fields["PREVIEW_TEXT"]) < 5) {
//            global $APPLICATION;
//            $APPLICATION->ThrowException(GetMessage('REVIEW_SHORT', ["#LENGHT#" => strlen($fields["PREVIEW_TEXT"])]));
//            return false;
//        }
//        if (str_contains($fields["PREVIEW_TEXT"], '#del#')) {
//            $fields['PREVIEW_TEXT'] = str_replace('#del#', '', $fields["PREVIEW_TEXT"]);
//        }
//        self::$authorBefore = CIBlockElement::GetProperty(
//            REVIEW_IB_ID,
//            $fields['ID'],
//            [],
//            ["CODE"=>"AUTHOR"]
//        )->Fetch()['VALUE'];
//        return true;
//    }
//
//    public static function onAfterReviewUpdate(&$fields): bool {
//        if($fields["IBLOCK_ID"] != REVIEW_IB_ID) return true;
//        $authorAfter = CIBlockElement::GetProperty(
//            REVIEW_IB_ID,
//            $fields['ID'],
//            [],
//            ["CODE"=>"AUTHOR"]
//        )->Fetch()['VALUE'];
//        if ($authorAfter != self::$authorBefore) {
//            CEventLog::Add(array(
//                "AUDIT_TYPE_ID" => "ex2_590",
//                "MODULE_ID" => "iblock",
//                "ITEM_ID" => $fields['ID'],
//                "DESCRIPTION" => GetMessage('AUTHOR_CHANGED', [
//                    '#ID#' => $fields['ID'],
//                    '#AUTHOR_BEFORE#' => self::$authorBefore,
//                    '#AUTHOR_AFTER#' => $authorAfter,
//                ]),
//            ));
//        }
//        return true;
//    }

    //вариант 5
    public static string $authorBefore = "";
    public static function onBeforeReviewUpdate(&$fields):bool {
        if ($fields['IBLOCK_ID'] != REVIEW_IB_ID) return true;
        if (strlen($fields["PREVIEW_TEXT"]) < 5) {
            global $APPLICATION;
            $APPLICATION->ThrowException(GetMessage("REVIEW_UPDATE_ERROR", [
                "#COUNT#" => strlen($fields["PREVIEW_TEXT"]),
            ]));
            return false;
        }
        if (str_contains($fields["PREVIEW_TEXT"], "#del#")) {
            $fields["PREVIEW_TEXT"] = str_replace('#del#', '', $fields["PREVIEW_TEXT"]);
        }
        self::$authorBefore = CIBlockElement::GetProperty(
            REVIEW_IB_ID,
            $fields['ID'],
            [],
            ["CODE" => "AUTHOR"]
        )->Fetch()['VALUE'];
        return true;
    }

    public static function onAfterReviewUpdate(&$fields):bool {
        if ($fields['IBLOCK_ID'] != REVIEW_IB_ID) return true;
        $authorAfter = CIBlockElement::GetProperty(
            REVIEW_IB_ID,
            $fields['ID'],
            [],
            ["CODE" => "AUTHOR"]
        )->Fetch()['VALUE'];
        if ($authorAfter != self::$authorBefore) {
            CEventLog::Add(array(
                "AUDIT_TYPE_ID" => "ex2_590",
                "MODULE_ID" => "iblock",
                "ITEM_ID" => $fields['ID'],
                "DESCRIPTION" => GetMessage('CHANGE_AUTHOR', [
                    '#ID#' => $fields['ID'],
                    '#AUTHOR_BEFORE#' => self::$authorBefore,
                    '#AUTHOR_AFTER#' => $authorAfter,
                ]),
            ));
        }
        return true;
    }

    //[ex2-600] Работа с авторами
    public static array $userClassBefore;
    public static function OnBeforeUserClassUpdate(&$fields): bool {
        self::$userClassBefore = \Bitrix\Main\UserTable::GetList(
            [
                'filter' => ['ID' => $fields["ID"]],
                'select' => ['UF_USER_CLASS']
            ]
        )->Fetch();
        return true;
    }
    public static function OnAfterUserClassUpdate(&$fields): bool {
        if (!self::$userClassBefore) return true;
        if ($fields['ID'] != self::$userClassBefore["ID"] && $fields['UF_USER_CLASS'] == self::$userClassBefore["UF_USER_CLASS"]) return true;

        $oldClass = CUserFieldEnum::GetList(
            aFilter: ["ID" => self::$userClassBefore["UF_USER_CLASS"]]
        )->Fetch();
        $newClass = CUserFieldEnum::GetList(
            aFilter: ["ID" => $fields["UF_USER_CLASS"]]
        )->Fetch();
        $res =             [
            "OLD_USER_CLASS" => $oldClass["VALUE"],
            "NEW_USER_CLASS" => $newClass["VALUE"],
        ];
        CEvent::Send(
            "EX2_AUTHOR_INFO",
            SITE_ID,
            $res
        );
        return true;
    }

    //[ex2-600] Работа с авторами
    //[ex2-620] Изменение данных при отправке почты
    public static function OnBeforeUserUpdateEmail(&$arFields) {
        $user = CUser::GetList(
            ($by = 'id'),
            ($order = 'asc'),
            [
                'ID' => $arFields['USER_ID']
            ],
            [
                'FETCH' => ['ID'],
                'SELECT' => ['UF_AUTHOR_STATUS', 'UF_USER_CLASS'],
            ],
        )->fetch();

        if ($user['UF_USER_CLASS']) {
            $arProp = CUserFieldEnum::GetList(
                [],
                [
                    'ID' => $user['UF_USER_CLASS'],
                    'USER_FIELD_ID' => 10
                ]
            )->fetch();
            $class = $arProp['VALUE'];
        } else {
            $class = Loc::getMessage('NOT_CLASS');
        }

        $arFields['CLASS'] = $class;
    }
    //[ex2-620] Изменение данных при отправке почты

    //[ex2-630] Индексация элементов
//    public static function OnBeforeSearchIndex($fields)
//    {
//        if ($fields["MODULE_ID"] == 'iblock' && $fields["PARAM2"] == REVIEW_IB_ID) {
//            $res = CIBlockElement::GetByID($fields["ITEM_ID"])->Fetch();
//            $author = CIBlockElement::GetProperty(
//                $res['IBLOCK_ID'],
//                $res['ID'],
//                arFilter: [
//                    "CODE" => "AUTHOR",
//                ]
//            )->Fetch()['VALUE'];
//
//            $arUser = CUser::GetList(
//                ($by = 'id'),
//                ($order = 'asc'),
//                ['ID' => $author],
//                [
//                    'FIELDS' => ['ID'],
//                    'SELECT' => ['UF_USER_CLASS']
//                ]
//            )->Fetch();
//
//            $enum = CUserFieldEnum::GetList(
//                [],
//                ['ID' => $arUser['UF_USER_CLASS']]
//            )->Fetch();
//            $fields["TITLE"] .= ' [' . $enum['VALUE'] . ']';
//        }
//        return $fields;
//    }
    //[ex2-630] Индексация элементов

    //вариант 2
//    public static function onBeforeIndex($fields) {
//        if ($fields['PARAM2'] == REVIEW_IB_ID && $fields["MODULE_ID"] == 'iblock') {
//            $author = CIBlockElement::GetProperty(
//                REVIEW_IB_ID,
//                $fields['ITEM_ID'],
//                [],
//                ["CODE" => "AUTHOR"]
//            )->Fetch()['VALUE'];
//
//            $user = CUser::GetList(
//                ($by = 'ID'),
//                ($order = 'asc'),
//                ["ID" => $author],
//                ["FIELDS" => ["ID"], "SELECT" => ["UF_USER_CLASS"]]
//            )->Fetch()['UF_USER_CLASS'];
//
//
//            $class = CUserFieldEnum::GetList(
//                [],
//                ["ID" => $user]
//            )->Fetch()['VALUE'];
//            if ($class) {
//                $fields["TITLE"] .= '. Класс: [' . $class . ']';
//            }
//        }
//        return $fields;
//    }

    //вариант 3
//    public static function onBeforeIndex($fields) {
//        if ($fields["MODULE_ID"] == 'iblock' && $fields["PARAM2"] == REVIEW_IB_ID) {
//            $res = CIBlockElement::GetByID($fields["ITEM_ID"])->Fetch();
//            $author = CIBlockElement::GetProperty(
//                REVIEW_IB_ID,
//                $res['ID'],
//                [],
//                ["CODE" => "AUTHOR"]
//            )->Fetch()['VALUE'];
//
//            $user = CUser::GetList(
//                ($by = 'id'),
//                ($order = 'asc'),
//                ["ID" => $author],
//                [
//                    "FIELD" => ["ID"],
//                    "SELECT" => ["UF_USER_CLASS"]
//                ]
//            )->Fetch();
//
//            $class = CUserFieldEnum::GetList(
//                [],
//                ["ID" => $user["UF_USER_CLASS"]]
//            )->Fetch();
//            $fields['TITLE'] .= '. Класс [' . $class["VALUE"] . ']';
//        }
//        return $fields;
//    }

    //вариант 4
//    public static function onBeforeIndex($fields) {
//        if ($fields["PARAM2"] == REVIEW_IB_ID && $fields["MODULE_ID"] == 'iblock') {
//            $author = CIBlockElement::GetProperty(
//                REVIEW_IB_ID,
//                $fields['ITEM_ID'],
//                [],
//                ["CODE" => "AUTHOR"]
//            )->Fetch()["VALUE"];
//
//            $userClassId = CUser::GetList(
//                ($by = 'id'),
//                ($order = 'asc'),
//                ["ID" => $author],
//                [
//                    "SELECT" => ["UF_USER_CLASS"],
//                ]
//            )->Fetch()["UF_USER_CLASS"];
//
//            $class = CUserFieldEnum::GetList(
//                [],
//                ["ID" => $userClassId],
//            )->fetch()['VALUE'];
//
//            if ($class) {
//                $fields["TITLE"] .= ' Класс: [' . $class . ']';
//            }
//        }
//        return $fields;
//    }

    //вариант 5
//    public static function onBeforeIndex($fields) {
//        if ($fields["MODULE_ID"] == 'iblock' && $fields["PARAM2"] == REVIEW_IB_ID) {
//            $author = CIBlockElement::GetProperty(
//                REVIEW_IB_ID,
//                $fields['ITEM_ID'],
//                [],
//                ["CODE" => "AUTHOR"]
//            )->Fetch()["VALUE"];
//
//            $userClassId = CUser::GetList(
//                ($by = 'id'),
//                ($order = 'asc'),
//                ["ID" => $author],
//                ["SELECT" => ["UF_USER_CLASS"]],
//            )->Fetch()["UF_USER_CLASS"];
//
//
//            $class = CUserFieldEnum::GetList(
//                [],
//                ["ID" => $userClassId],
//            )->Fetch()['VALUE'];
//            if ($class) {
//                $fields["TITLE"] .= ' Класс: [' . $class . ']';
//            }
//        }
//        return $fields;
//    }

    //вариант 6
//    public static function onBeforeIndex($fields) {
//        if ($fields["MODULE_ID"] == 'iblock' && $fields["PARAM2"] == REVIEW_IB_ID) {
//            $author = CIBlockElement::GetProperty(
//                REVIEW_IB_ID,
//                $fields["ITEM_ID"],
//                [],
//                ["CODE" => "AUTHOR"]
//            )->Fetch()['VALUE'];
//
//            $userClassId = CUser::GetByID(
//                $author,
//            )->Fetch()['UF_USER_CLASS'];
//
//            $class = CUserFieldEnum::GetList(
//                [],
//                ["ID" => $userClassId],
//            )->Fetch()['VALUE'];
//
//            if ($class) {
//                $fields["TITLE"] .= ' Класс: [' . $class . ']';
//            }
//
//        }
//        return $fields;
//    }

    //вариант 7
//    public static function onBeforeIndex($fields) {
//        if ($fields['PARAM2'] == REVIEW_IB_ID && $fields["MODULE_ID"] == 'iblock') {
//            $author = CIBlockElement::GetProperty(
//                REVIEW_IB_ID,
//                $fields['ITEM_ID'],
//                [],
//                ["CODE" => "AUTHOR"]
//            )->Fetch()['VALUE'];
//
//            $userClassId = CUser::GetByID($author)->Fetch();
//
//            $class = CUserFieldEnum::GetList(
//                [],
//                ["ID" => $userClassId["UF_USER_CLASS"]],
//            )->Fetch()["VALUE"];
//
//            if ($class) {
//                $fields["TITLE"] .= ' sss: [' . $class . ']';
//            }
//        }
//        return $fields;
//    }

    //вариант 8
//    public static function onBeforeIndex($fields) {
//        if ($fields["PARAM2"] == REVIEW_IB_ID && $fields["MODULE_ID"] == 'iblock') {
//            $author = CIBlockElement::GetProperty(
//                REVIEW_IB_ID,
//                $fields["ITEM_ID"],
//                [],
//                ["CODE" => "AUTHOR"]
//            )->Fetch()['VALUE'];
//
//            $user = CUser::GetByID($author)->Fetch();
//
//            $class = CUserFieldEnum::GetList(
//                [],
//                ["ID" => $user["UF_USER_CLASS"]]
//            )->Fetch()['VALUE'];
//
//            if ($class) {
//                $fields['TITLE'] .= ' Клайцу [' . $class . ']';
//            }
//        }
//        return $fields;
//    }

    //вариант 9
    public static function onBeforeIndex($fields) {
        if ($fields['PARAM2'] == REVIEW_IB_ID && $fields["MODULE_ID"] == 'iblock') {
            $author = CIBlockElement::GetProperty(
                REVIEW_IB_ID,
                $fields['ITEM_ID'],
                [],
                ["CODE" => "AUTHOR"]
            )->Fetch()["VALUE"];

            $user = CUser::GetByID($author)->Fetch();

            $class = CUserFieldEnum::GetList(
                [],
                ["ID" => $user["UF_USER_CLASS"]]
            )->Fetch()['VALUE'];

            if ($class) {
                $fields["TITLE"] .= ' class: [' . $class . ']';
            }
        }
        return $fields;
    }

    //[ex2-190] Изменить административную часть сайта
    public static function OnBuildMenuItem(&$aGlobalMenu, &$aModuleMenu) {
        global $USER;
        if (in_array(5, $USER->GetUserGroupArray())) {
            $aGlobalMenuFilter["global_menu_content"] = $aGlobalMenu["global_menu_content"];

            foreach ($aModuleMenu as $item) {
                if ($item['parent_menu'] == 'global_menu_content') {
                    $aModuleMenuFilter[] = $item;
                }
            }

            $aGlobalMenuFilter["global_menu_quick"] = [
                'menu_id' => 'global_menu_quick',
                'text' => 'Быстрый доступ',
                'sort' => 100,
                'items' => [
                    [
                        'text' => 'ссылка 1',
                        'url' => 'https://test1/'
                    ],
                    [
                        'text' => 'ссылка 2',
                        'url' => 'https://test2/'
                    ]
                ]
            ];
            $aGlobalMenu = $aGlobalMenuFilter;
            $aModuleMenu = $aModuleMenuFilter;
        }
    }
    //[ex2-190] Изменить административную часть сайта
}