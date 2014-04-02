<?php 

/**
 * A simple script to test the Accela PHP class library.
 */

require 'accela.php';

// App ID and secret generated when app is created.
$id = '';
$secret = '';

// The access token for API calls - the result of OAuth ot test token generation.
$token = '';

// Search owners by last name and write out the full name for each record returned.
try {

	// Create a new Owners object.
	$owners = new Owners($id, $secret, $token);
	$path = 'v3/owners';
	$auth_type = AuthType::$AccessToken;
	$json = $owners->searchOwners($path, $auth_type, array('lastName=' =>	'Smith', 'offset' => 25, 'limit' => 2));
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

