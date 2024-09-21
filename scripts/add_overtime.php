<?php
require_once('../crest/crest.php');
require_once('../crest/settings.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST;

    $fields = [
        'ufCrm44_1726318399141' => $data['newOvertimeName'],
        'ufCrm44_1726318406212' => $data['newOvertimeCategory'],
        'ufCrm44_1726318414156' => $data['newOvertimeRate'],
    ];

    $result = CRest::call('crm.item.add', [
        'entityTypeId' => PAYROLL_OVERTIMES_ENTITY_TYPE_ID,
        'fields' => $fields
    ]);

    if ($result['result']) {
        header('Location: ../payroll.php');
    }
}
