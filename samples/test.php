<?php 

/**
 * A simple script to test the Accela PHP class library.
 */

include '../src/Construct.php';

// App, agency & environment settings.
$app_id = '';
$app_secret = ''; 
$token = '';
$environment = 'TEST';
$agency = 'Islandton';

// File to upload.
$fileName = 'smile.png';
$filePath = getcwd() . '/images/' . $fileName;
$fileType = 'image/png';
$fileDescription = 'A test file that will make you smile';

$inspectionID = '1234567890'; // Enter an inpsection ID to test.
$params = array(); // Parameters tobe used when making API call.
$path = '/v4/inspections/' . $inspectionID . '/documents';

try {

	// Create new Inspections object.
	$inspection = new Inspections($app_id, $app_secret, $token, $environment, $agency_name);
	
	// Upload new inspection doc
	$response = $inspection->uploadInspectionDocuments($path, AuthType::$AccessToken, $params, $fileName, $fileType, $filePath, $description, true);

	// Vie response
	var_dump($response);
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

