<?php 

// Include required files.
require 'vendor/autoload.php';

use Guzzle\Http\Client;

/**
 * Base class for Accela API classes.
 */ 
class AccelaBase {

	// Base endpoint for Accela API.
	const ENDPOINT = 'https://apis.accela.com/';

	// The application ID (provisioned when app is created).
	private $app_id;
	// The application secret (provisioned when app is created).
	private $app_secret;
	// The access token for making calls to the Accela API.
	private $access_token;
	// The environment in which the app is running.
	private $environment;
	// The name of the agency.
	private $agency;
	// HTTP client used to make API calls.
	private $client;

	/**
	 * Class constructor.
	 */
	protected function __construct($app_id, $app_secret, $access_token, $environment, $agency) {
		$this->app_id = $app_id;
		$this->app_secret = $app_secret;
		$this->access_token = $access_token;
		$this->environment = $environment;
		$this->agency - $agency;
		$this->client = new Client(self::ENDPOINT);
	}

	/**
	 * Method to send GET requests to Accela API.
	 */
	protected function sendRequest($path, Array $params=null, $auth_type, $debug=false, $exceptions=true) {
		$request = $this->client->get($path, array(), 
			array('headers' => self::setAuthorizationHeaders($auth_type), 
				  'query' => self::escapeCharacters($params), 
				  'debug' => $debug, 
				  'exceptions' => $exceptions)
			);
		$response = $request->send();
		return $response->getBody();
	}

	/**
	 * Method to send POST requests to Accela API.
	 */ 
	protected function sendPost() {}
	/**
	 * Method to send PUT requests to Accela API.
	 */	

	protected function sendPut() {}
	/**
	 * Method to send DELETE requests to Accela API.
	 */

	protected function sendDelete() {}

	/**
	 * Class destructor.
	 */
	protected function __destruct() {}

	/**
	 * Method to set authorization headers for API calls.
	 */	
	private function setAuthorizationHeaders($auth_type) {
		$headers = array(
			'Content-Type' => 'application/json',
			'Accept' => 'application/json',
			'x-accela-appid' => $this->app_id
		);

		switch($auth_type) {
			// Access token authorization required.
			case 'AccessToken':
				$headers['Authorization'] = $this->access_token;
				$headers['x-accela-agency'] = $this->agency;
				break;
			// App Credentials authorization required.
			case 'AppCredentials':
				$headers['x-accela-appsecret'] = $this->app_secret;
				break;
			// No authorization required.
			default:
				$headers['x-accela-environment'] = $this->environment;
				break;
		}

		return $headers;
	}

	/**
	 * Method to escape special characters prior to API calls.
	 */
	private function escapeCharacters($text) {
		$search = array('.','-','%','/','\\\\',':','*','\\','<','>','|','?',' ','&','#');
		$replace = array('.0','.1','.2','.3','.4','.5','.6','.7','.8','.9','.a','.b','.c','.d','.e');
		return str_replace($search, $replace, $text);
	}

}

/**
 * Utility class for setting autoirzation type.
 */
class AuthType {
	public static $AccessToken = 'AccessToken';
	public static $AppCredentials = 'AppCredentials';
	public static $NoAuth = 'NoAuth';
}