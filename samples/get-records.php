<?php

require '../src/Construct.php';

// App, agency & environment settings.
$app_id = '';
$app_secret = ''; 
$environment = 'TEST';
$agency = 'Islandton';

try {
	$rec = new Records($app_id, $app_secret, null, $environment, $agency);
	$response = $rec->getRecords('/v4/records', AuthType::$NoAuth, array("limit" => 1), true);
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