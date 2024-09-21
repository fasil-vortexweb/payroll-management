<?php
require_once('../crest/crest.php');
require_once('../crest/settings.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST;

    $fields = [
        'ufCrm44_1726318399141' => $data['editOvertimeName'],
        'ufCrm44_1726318406212' => $data['editOvertimeCategory'],
        'ufCrm44_1726318414156' => $data['editOvertimeRate'],
    ];

    $result = CRest::call('crm.item.update', [
        'entityTypeId' => PAYROLL_OVERTIMES_ENTITY_TYPE_ID,
        'id' => $data['editOvertimeId'],
        'fields' => $fields
    ]);

    if ($result['result']) {
        header('Location: ../payroll.php#overtime');
    }
}
