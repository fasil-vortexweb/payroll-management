<?php
require_once('../crest/crest.php');
require_once('../crest/settings.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST;

    $fields = [
        'ufCrm42_1726317240940' => $data['newAdditionName'],
        'ufCrm42_1726318090948' => $data['newAdditionCategory'],
        'ufCrm42_1726317366023' => $data['newAdditionUnitAmount'],
    ];

    $result = CRest::call('crm.item.add', [
        'entityTypeId' => PAYROLL_ADDITIONS_ENTITY_TYPE_ID,
        'fields' => $fields
    ]);

    if ($result['result']) {
        header('Location: ../payroll.php');
    }
}
