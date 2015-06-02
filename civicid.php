<?php 

/**
 * A simple script to obtain an auth token via CivicID.
 */

include 'src/Accela.php';
include 'config.php';

$username = $argv[1];
$password = $argv[2];

try {

	$civicid = new CivicID($app_id, $app_secret, $token, $environment, $agency_name);
	echo $civicid->getToken($username, $password, 'get_user_profile');
}
catch(Exception $ex) {
 	echo $ex->getMessage();
}