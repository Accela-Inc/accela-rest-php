<?php

/**
 * Simple example showing how to use Accela CivicID for OAuth.
 */

// Include required files.
require 'config.php';
require 'accela.php';
require 'scopes.php';

// Set up scope list for authorization request.
$scopes = setScope::$get_agency . '%20' . setScope::$get_agency_logo;

// Create a new Authorize object.
$auth = new Authorize($app_id, $app_secret, $redirect_uri, $environment, $agency_name, $scopes);

// If first visit, redirect to CivicID login.
if(!$_GET) {
	echo '<a href="' . $auth->getAuthorizationURL() . '">Log in with Accela CivicID.';
} 

// After CivicID login, user is redirected back to this page.
else {

	// When Authorization Code is received, use it to request Access Token.
	$auth_code = $_GET['code'];
	$response = $auth->getAccessToken($auth_code);
	$auth_object = json_decode($response->getBody());
	$token = $auth_object->access_token;

	// Make a request with access tioken.
	$agency = new Agencies($app_id, $app_secret, $token);
	$path = 'v3/agencies/' . $agency_name;

	// Print out response from Construct API.
	echo $agency->getAgency($path, AuthType::$AccessToken, array());

}