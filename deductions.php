<?php
require_once(__DIR__ . '/crest/crest.php');
require_once(__DIR__ . '/crest/settings.php');

$result = CRest::call('crm.item.list', [
  'entityTypeId' => PAYROLL_DEDUCTIONS_ENTITY_TYPE_ID,
]);

$deductions = $result['result']['items'];

// echo '<pre>';
// print_r($deductions);
// echo '</pre>';

return $deductions;
