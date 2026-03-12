<?php
function Agent_ex_610()
{
    \Bitrix\Main\Loader::includeModule('iblock');
    $curTime = (new \Bitrix\Main\Type\DateTime());
    $lastTimeStr = $curTime->add('-1 day')->toString();
    $cnt = \Bitrix\Iblock\ElementTable::GetList([
        'filter' => [
            'IBLOCK_ID' => REVIEWS_IB_ID,
            '>TIMESTAMP_X' => $lastTimeStr
        ],
        'count_total' => true
    ])->getCount();

    CEventLog::Add(array(
        "SEVERITY" => "INFO",
        "AUDIT_TYPE_ID" => "ex2_610",
        "MODULE_ID" => "iblock",
        "DESCRIPTION" => GetMessage('AGENT_CNT_REV_MESSAGE', [
            '#REV_CNT#' => $cnt,
            '#LAST_TIME#' => $lastTimeStr
        ])
    ));
    return __FUNCTION__ . "(\"" . $curTime->toString() . "\");";
}