<?php

// Include require files.
require 'vendor/autoload.php';
use Guzzle\Http\Client;

/**
 * Class to obtain access credentials for using the Accela API.
 */
class Authorize {

	// Endpoints used to obtain authorization code and access token.
	const AUTH_ENDPOINT = 'https://auth.accela.com/oauth2/authorize';
	const ACCESS_TOKEN_ENDPOINT = 'https://apis.accela.com/oauth2/token';

	private $response_type = 'code';
	// The application ID (provisioned when app is created).
	private $app_id;
	// The application secret (provisioned when app is created).
	private $app_secret;
	// URI that the authorization server redirects back to the client with an authorization code.
	private $redirect_uri;
	// The Accela environment name.
	private $environment;
	// The namr of the agency defined in the admin portal.
	private $agency_name;
	// The scope of the respurces that the client requests.
	private $scope;
	// Value that the client uses for maintaining the state between the request and callback. 
	private $state;

	/**
	 * Class constructor.
	 */
	public function __construct($app_id, $app_secret, $redirect_uri, $environment, $agency_name, $scope, $state=null) {
		$this->app_id = $app_id;
		$this->app_secret = $app_secret;
		$this->client_id = $client_id;
		$this->redirect_uri = $redirect_uri;
		$this->environment = $environment;
		$this->agency_name = $agency_name;
		$this->scope = $scope;
		$this->state = $state;
	}

	/**
	 * Obtain an authorization URL.
	 */
	public function getAuthorizationURL() {
		$url = self::AUTH_ENDPOINT . "?client_id=" . $this->app_id;
		$url .= "&agency_name=" . $this->agency_name;
		$url .= "&environment=" . $this->environment;
		$url .= "&redirect_uri=" . $this->redirect_uri;
		$url .= "&state=" . $this->state;
		$url .= "&scope=" . $this->scope;
		$url .= "&response_type=" . $this->response_type;
		return $url;
	}

	/**
	 * Make request for an access token.
	 */
	public function getAccessToken($code) {
		$body = array(
		    'grant_type' => 'authorization_code',
		    'client_id'   => $this->app_id,
		    'client_secret' => $this->app_secret,
		    'redirect_uri' => $this->redirect_uri,
		    'code' => $code);
		$client = new Client();
		$request = $client->post(self::ACCESS_TOKEN_ENDPOINT, array(), $body);
		$request->setHeader('x-accela-appid', $this->app_id);
		return $request->send();
	}

	/**
	 * Refresh an existing access token.
	 */
	public function refreshAccessToken($refresh_token) {
		$body = array(
		    'grant_type' => 'refresh_token',
		    'client_id'   => $this->app_id,
		    'client_secret' => $this->app_secret,
		    'refresh_token' => $refresh_token);
		$client = new Client();
		$request = $client->post(self::ACCESS_TOKEN_ENDPOINT, array(), $body);
		$request->setHeader('x-accela-appid', $this->app_id);
		return $request->send();
	}

	/**
	 * Class destructor.
	 */
	public function __destruct() {}

}