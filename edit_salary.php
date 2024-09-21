<?php
require_once(__DIR__ . '/crest/crest.php');
require_once(__DIR__ . '/crest/settings.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST;

    print_r($data);

    $fields = [
        'ufCrm40_1726317122244' => $data['employeeSalary'],
        'ufCrm40_1726317023423' => $data['basic'],
        'ufCrm40_1726317034173' => $data['tds'],
        'ufCrm40_1726317043138' => $data['da'],
        'ufCrm40_1726317049030' => $data['esi'],
        'ufCrm40_1726317056585' => $data['hra'],
        'ufCrm40_1726317064611' => $data['pf'],
        'ufCrm40_1726317073737' => $data['conveyance'],
        'ufCrm40_1726317080335' => $data['leave'],
        'ufCrm40_1726317091326' => $data['allowance'],
        'ufCrm40_1726317099237' => $data['profTax'],
        'ufCrm40_1726317106914' => $data['medical'],
        'ufCrm40_1726317115510' => $data['labourWelfare'],
    ];

    $result = CRest::call('crm.item.update', [
        'entityTypeId' => EMPLOYEE_ENTITY_TYPE_ID,
        'id' => $data['editEmployeeId'],
        'fields' => $fields
    ]);

    if ($result['result']) {
        echo 'success';
        header('Location: employee_salary.php');
    }
}
