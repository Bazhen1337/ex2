<?php
//[ex2-610] Регулярные задачи
function Agent_ex_610()
{
    \Bitrix\Main\Loader::includeModule('iblock');
    $currentTime = new \Bitrix\Main\Type\DateTime();
    $lastTime = $currentTime->add('-1 day')->toString();
    $cnt = \Bitrix\Iblock\ElementTable::GetList([
        'filter' => [
            'IBLOCK_ID' => REVIEW_IB_ID,
            '>TIMESTAMP_X' => $lastTime
        ],
        'count_total' => true
    ])->getCount();

    CEventLog::Add([
        "AUDIT_TYPE_ID" => "ex2_610",
        "MODULE_ID" => "main",
        "DESCRIPTION" => GetMessage("AGENT_MESSAGE", [
            "#LAST_TIME#" => $lastTime,
            "#COUNT#" => $cnt,
        ])
    ]);
    return __FUNCTION__ . '();';
}
//[ex2-610] Регулярные задачи

//вариант 2
function Agent_ex_611()
{
    \Bitrix\Main\Loader::includeModule(
        'iblock'
    );
    $date = new Bitrix\Main\Type\DateTime();
    $date = $date->add('-1 day')->toString();
    $reviewsCount = \Bitrix\Iblock\ElementTable::GetList([
        'filter' => [
            'IBLOCK_ID' => REVIEW_IB_ID,
            '>TIMESTAMP_X' => $date
        ],
        'count_total' => true
    ])->getCount();
    CEventLog::Add(array(
        "AUDIT_TYPE_ID" => "ex2_610",
        "MODULE_ID" => "iblock",
        "DESCRIPTION" => GetMessage('AGENT_MESSAGE', [
            '#TIME#' => $date,
            "#COUNT#" => $reviewsCount,
        ]),
    ));
    return __FUNCTION__ . '();';
}

//вариант 3
function Agent_ex_612() {
    Bitrix\Main\Loader::includeModule("iblock");
    $date = new \Bitrix\Main\Type\DateTime();
    $date = $date->add('-1 day')->toString();
    $count = \Bitrix\Iblock\ElementTable::GetList([
        'filter' => [
            'IBLOCK_ID' => REVIEW_IB_ID,
            '>TIMESTAMP_X' => $date
        ],
        'count_total' => true
    ])->getCount();
    CEventLog::Add(array(
        "AUDIT_TYPE_ID" => "ex2_610",
        "MODULE_ID" => "iblock",
        "DESCRIPTION" => GetMessage('AGENT_MESSAGE', [
            "#TIME#" => $date,
            "#COUNT#" => $count,
        ]),
    ));
    return __FUNCTION__ . '();';
}

function Agent_ex_613() {
    \Bitrix\Main\Loader::includeModule("iblock");
    $date = new \Bitrix\Main\Type\DateTime();
    $date = $date->add('-1 day')->toString();
    $count = \Bitrix\Iblock\ElementTable::GetList([
        'filter' => [
            'IBLOCK_ID' => REVIEW_IB_ID,
            '>TIMESTAMP_X' => $date
        ],
        'count_total' => true
    ])->getCount();
    CEventLog::Add(array(
        "AUDIT_TYPE_ID" => "ex2_610",
        "MODULE_ID" => "iblock",
        "DESCRIPTION" => GetMessage('AGENT_MESSAGE', [
            "#TIME#" => $date,
            "#COUNT#" => $count,
        ]),
    ));
    return __FUNCTION__ . '();';
}