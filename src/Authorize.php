<?php
/**
 * Class to obtain access credentials for using the Accela API.
 */
class CivicID {

	// Endpoints used to obtain authorization code and access token.
	const AUTH_ENDPOINT = 'https://auth.accela.com/oauth2/authorize';
	const ACCESS_TOKEN_ENDPOINT = 'https://apis.accela.com/oauth2/token';

	// Indicates the grant type that the client requests. 
	const RESPONSE_TYPE = 'code';

	// Indicates the authorization code grant type of the current request.
	const GRANT_TYPE = 'grant_type';

	private $app_id; // The application ID (provisioned when app is created).
	private $app_secret; // The application secret (provisioned when app is created).
	private $redirect_uri; // URI that the authorization server redirects back to the client with an authorization code.
	private $environment; // The Accela environment name.
	private $agency_name; // The name of the agency defined in the admin portal.
	private $scope; // The scope of the respurces that the client requests.
	private $state; // Value that the client uses for maintaining the state between the request and callback. 
	private $client; // cURL client used to make API calls.

	/**
	 * Class constructor.
	 */
	public function __construct($app_id, $app_secret, $environment, $agency_name, $scope, $redirect_uri=null, $state=null) {
		$this->app_id = $app_id;
		$this->app_secret = $app_secret;
		$this->client_id = $client_id;
		$this->environment = $environment;
		$this->agency_name = $agency_name;
		$this->scope = $scope;
		$this->state = $state;
		$this->redirect_uri = $redirect_uri;
		$this->client = curl_init();
		curl_setopt($this->client, CURLOPT_RETURNTRANSFER, true);
	}

	/**
	 * Convenience method for setting redirect URI.
	 */
	public function setRedirectURI($redirect_uri) {
		$this->redirect_uri = $redirect_uri;
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
		$url .= "&response_type=" . self::RESPONSE_TYPE;
		return $url;
	}

	/**
	 * Make request for an access token.
	 */
	public function getAccessToken($code) {
		$body = array(
		    'grant_type' => self::GRANT_TYPE,
		    'client_id'   => $this->app_id,
		    'client_secret' => $this->app_secret,
		    'redirect_uri' => $this->redirect_uri,
		    'code' => $code);
		return self::makeRequest(self::ACCESS_TOKEN_ENDPOINT, $body);
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
		return self::makeRequest(self::ACCESS_TOKEN_ENDPOINT, $body);
	}

	// Class destructor.
	public function __destruct() {
		curl_close($this->client);
	}

	private function makeRequest($url, $body) {
		curl_setopt($this->client, CURLOPT_URL, $url);
		$headers = array('x-accela-appid', $this->app_id);

		curl_setopt($this->client, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($this->client, CURLOPT_POST, true);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, http_build_query($body));

		$result = curl_exec($this->client);
		$error = curl_error($this->client);
		$curl_http_code = curl_getinfo($this->client, CURLINFO_HTTP_CODE);

		if($result === false) {
	    	throw new Exception($error, $curl_http_code);
		 } else {
		 	if (substr($curl_http_code, 0, 2) != '20') {
		 		if(json_decode($result)) {
		 			throw new AuthorizationException($result, $curl_http_code);		
		 		} else {
		 			throw new Exception($result, $curl_http_code);
		 		}
		    }
		  return json_decode($result);
		 }
	}

}

/**
 * Class for wrapping exceptions.
 */
class AuthorizationException extends Exception {
	public function __construct($details, $code) {
		parent::__construct($details, $code);
	}
}