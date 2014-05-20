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

	// Set the path for the API method to be called.
	$path = 'v3/owners';

	// Set the authentication type.
	$auth_type = AuthType::$AccessToken;

	// Make API call and get JSON response.
	$json = $owners->searchOwners($path, $auth_type, array('fullName' => 'Jones'));
	$response = json_decode($json);

	// Loop over response and print out owner name.
	foreach($response->owners as $owner) {
		echo ucwords(strtolower($owner->fullName)) . "\n";
	}
	echo "\n";
}
catch(Exception $ex) {
 	echo $ex->getMessage();
}

