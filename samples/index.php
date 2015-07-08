<?php

/**
 * Simple example showing how to use Accela CivicID for OAuth.
 * Note - this sample needs to be tested.
 */

// Include required files.
require '../src/Construct.php';
require '../src/Scopes.php';
require '../src/Authorize.php';

// App, agency & environment settings.
$app_id = '';
$app_secret = ''; 
$token = '';
$environment = 'TEST';
$agency = 'Islandton';
$redirect_uri = '';

// Create a new Authorize object.
$auth = new Authorize($app_id, $app_secret, $environment, $agency, $scope, $redirect_uri);

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

	echo $token;

}