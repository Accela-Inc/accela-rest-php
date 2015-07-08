<?php

require '../src/Construct.php';

// App, agency & environment settings.
$app_id = '635502785397498905';
$app_secret = 'f8529997f4b04d2e8f2bd082d944e31a'; 
$environment = 'TEST';
$agency = 'Islandton';

try {
	$rec = new Records($app_id, $app_secret, null, $environment, $agency);
	$response = $rec->getRecords('/v4/records', AuthType::$NoAuth, array("limit" => 1));
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