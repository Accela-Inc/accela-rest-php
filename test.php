<?php 

/**
 * A simple script to test the Accela PHP class library.
 */

include 'src/Construct.php';
include 'config.php';

try {

	// File to upload.
	$fileName = 'smile.png';
	$filePath = getcwd() . '/' . $fileName;
	$fileType = 'image/png';
	$fileDescription = 'A test doc';

	$inspectionID = ''; // Enter an inpsection ID to test.
	$params = array();
	$path = '/v4/inspections/' . $inspectionID . '/documents';

	// Create new Inspections object.
	$inspection = new Inspections($app_id, $app_secret, $token, $environment, $agency_name);
	
	// Upload new inspection doc
	$response = $inspection->uploadInspectionDocuments($path, AuthType::$AccessToken, $params, $fileName, $fileType, $filePath, $description);

	// Vie response
	var_dump($response);
}

catch(Exception $ex) {
	echo $ex->getMessage();
}

