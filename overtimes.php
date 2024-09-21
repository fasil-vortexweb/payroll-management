<?php
require_once(__DIR__ . '/crest/crest.php');
require_once(__DIR__ . '/crest/settings.php');

$result = CRest::call('crm.item.list', [
  'entityTypeId' => PAYROLL_OVERTIMES_ENTITY_TYPE_ID,
]);

$overtimes = $result['result']['items'];

// echo '<pre>';
// print_r($overtimes);
// echo '</pre>';

return $overtimes;
