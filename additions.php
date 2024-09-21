<?php
require_once(__DIR__ . '/crest/crest.php');
require_once(__DIR__ . '/crest/settings.php');

$result = CRest::call('crm.item.list', [
  'entityTypeId' => PAYROLL_ADDITIONS_ENTITY_TYPE_ID,
]);

$additions = $result['result']['items'];

// echo '<pre>';
// print_r($additions);
// echo '</pre>';

return $additions;
