<?php

require '../src/Construct.php';

// App, agency & environment settings.
require '../config.php';

$customID = '';

$params = array("limit" => 1000, "expand" => 'addresses,professionals');
$data = array("customId" => $customID, "offset" => 0, "module" => 'Building');

try {
	$rec = new Records($app_id, $app_secret, $token, $environment, $agency);
	$response = $rec->advancedSearchRecords('/v4/search/records', AuthType::$AccessToken, $params, $data, true, true);
	echo json_encode($response); // To output JSON string.
}
catch(ConstructException $ex) {
	$details = json_decode($ex->getMessage());
	echo "Code: " . $ex->getCode() . "\n";
	echo "Message: " . $details->message . "\n";
	echo "TraceID: " . $details->traceId . "\n\n";
}

catch(Exception $ex) {
	echo "Code: " . $ex->getCode() . "\n";
	echo $ex->getMessage() . "\n\n";
}