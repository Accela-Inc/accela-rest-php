<?php

require '../src/Construct.php';

// App, agency & environment settings.
$app_id = '';
$app_secret = ''; 
$token = '';
$environment = 'TEST';
$agency = 'Islandton';

try {
	$i = new Inspections($app_id, $app_secret, $token, $environment, $agency);
	$params = array("scheduledDateFrom"=>"2014-01-01", "scheduledDateTo" => "2014-01-15", "limit" => 1);
	$result = $i->simpleSearchInspection('/v4/inspections', AuthType::$AccessToken, $params, true);
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