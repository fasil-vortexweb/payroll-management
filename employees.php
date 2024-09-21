<?php
require_once(__DIR__ . '/crest/crest.php');
require_once(__DIR__ . '/crest/settings.php');

$result = CRest::call('crm.item.list', [
    'entityTypeId' => EMPLOYEE_ENTITY_TYPE_ID,
]);


$employees = $result['result']['items'] ?? [];

// echo '<pre>';
// print_r($employees);
// echo '</pre>';

return $employees;
