<?php 

/**
 * A simple script to test the Accela PHP class library.
 */

require 'accela.php';
require 'config.php';

// Search owners by last name and write out the full name for each record returned.
try {

	// Create a new Owners object.
	$owners = new Owners($$app_id, $secret, $token);
	$path = 'v3/owners';
	$auth_type = AuthType::$AccessToken;
	$json = $owners->searchOwners($path, $auth_type, array('lastName=' =>	'Jones', 'offset' => 25, 'limit' => 2));
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

}
catch(Exception $ex) {
 	echo $ex->getMessage();
}

