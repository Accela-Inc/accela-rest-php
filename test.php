<?php 

/**
 * A simple script to test the Accela PHP class library.
 */

include 'src/Accela.php';
include 'config.php';

// Search owners by last name and write out the full name for each record returned.
try {

	// Create a new Owners object.
	$owners = new Owners($app_id, $secret, $token);
	$path = 'v3/owners';
	$auth_type = AuthType::$AccessToken;
	$json = $owners->searchOwners($path, $auth_type, array('fullName' => 'Smith'));
	$response = json_decode($json);

	foreach($response->owners as $owner) {
		echo $owner->fullName . "\n";
	}

	// Sample response:
	// {
	//     "owners": [
	//         {
	//             "id": "1864347",
	//             "fullName": "ABEL JERRY A",
	//             "isPrimary": "true",
	//             "entityState": "Unchanged"
	//         },
	//         {
	//             "id": "1864348",
	//             "fullName": "ABERS JON K ET AL",
	//             "isPrimary": "true",
	//             "entityState": "Unchanged"
	//         }
	//     ]
	// }

	// $locator = new AgencyLocator($app_id, $secret, $token);
	// $path = 'v3/geo/search/agencies';
	// $coordinates = '{ "longitude": 39.2833, "latitude": -76.6167 }';
	// $json = $locator->searchAgenciesByCoordinates($path, AuthType::$NoAuth, $coordinates);
	// $response = json_decode($json);

	// var_dump($response);

	// Sample response:
	// {
	//   "agencies": [
	//     {
	//       "isForDemo": false,
	//       "hostedACA": true,
	//       "enabled": true,
	//       "serviceProviderCode": "BIGBUCKET",
	//       "name": "BIGBUCKET"
	//     }
	//   ]
	// }

	// $inspections = new Inspections($app_id, $secret, $token);
	// $path = 'v3/inspections';
	// $auth_type = AuthType::$AccessToken;
	// $json = $inspections->simpleSearchInspection($path, $auth_type, array('scheduleDateRange' => '20080101-20140101'));
	// $response = json_decode($json);

	// var_dump($response);


}
catch(Exception $ex) {
 	echo $ex->getMessage();
}

