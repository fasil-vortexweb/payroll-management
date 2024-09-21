<?php
require_once('../crest/crest.php');
require_once('../crest/settings.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST;

    $fields = [
        'ufCrm42_1726317240940' => $data['editAdditionName'],
        'ufCrm42_1726318090948' => $data['editAdditionCategory'],
        'ufCrm42_1726317366023' => $data['editAdditionUnitAmount'],
    ];

    $result = CRest::call('crm.item.update', [
        'entityTypeId' => PAYROLL_ADDITIONS_ENTITY_TYPE_ID,
        'id' => $data['editAdditionId'],
        'fields' => $fields
    ]);

    if ($result['result']) {
        header('Location: ../payroll.php');
    }
}
