<?php 
/**
 * Base class for Accela API classes.
 */ 
class AccelaBase {

	// Default endpoints for Accela APIs.
	const ENDPOINT = 'https://apis.accela.com/';

	// Endpoint for API calls.
	private $api_endpoint;
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
	protected function __construct($app_id, $app_secret, $access_token, $environment, $agency, $endpoint=null) {
		$this->api_endpoint = $endpoint == null ? self::ENDPOINT : $endpoint;
		$this->app_id = $app_id;
		$this->app_secret = $app_secret;
		$this->access_token = $access_token;
		$this->environment = $environment;
		$this->agency = $agency;
		$this->client = curl_init();
		curl_setopt($this->client, CURLOPT_RETURNTRANSFER, true);
	}

	/**
	 * Method to send GET requests to Accela API.
	 */
	protected function sendRequest($path, Array $params=null, $auth_type) {
		$url = $this->api_endpoint . $path . '?' . http_build_query(self::escapeCharacters($params));
		$headers = self::setAuthorizationHeaders($auth_type);
		array_push($headers, 'Content-Type: application/json', 'Accept: application/json');
		curl_setopt($this->client, CURLOPT_URL, $url);
		curl_setopt($this->client, CURLOPT_HTTPHEADER, $headers);
		return self::makeRequest();
	}

	/**
	 * Method to send POST requests to Accela API.
	 */ 
	protected function sendPost($path, $auth_type, Array $params, $body) {
		$url = $this->api_endpoint . $path . '?' . http_build_query(self::escapeCharacters($params));
		$post_body = $body ? json_encode($body) : json_encode(new stdClass());
		$headers = self::setAuthorizationHeaders($auth_type);
		array_push($headers, 'Content-Type: application/json', 'Accept: application/json', 'Content-Length: ' . strlen($post_body));
		curl_setopt($this->client, CURLOPT_URL, $url);
		curl_setopt($this->client, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($this->client, CURLOPT_POST, true);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $post_body);
		return self::makeRequest();
	}

	/**
	 * Method to POST files via 'multipart/form-data'.
	 */ 
	protected function sendFormPost($path, $auth_type, Array $params, $filename, $filetype, $filepath, $description) {

		// Assemble URL
		$url = $this->api_endpoint . $path . '?' . http_build_query(self::escapeCharacters($params));
		
		// Set headers
		$headers = self::setAuthorizationHeaders($auth_type);
		$boundary = '----'.md5(time());
		array_push($headers, 'Content-Type: multipart/form-data; boundary=' . $boundary, 'Accept: application/json');
		
		// Construct body
		$fileInfo = array(array('serviceProviderCode'=>$this->agency,'fileName'=>$filename,'type'=>$filetype,'description'=>$description));
		$eol = "\r\n";
		$body = "--$boundary$eol";
		$body .= "Content-Disposition: form-data; name=\"uploadedFile\"; filename=\"$filename\"$eol";
		$body .= "Content-Type: $filetype$eol$eol";
		$body .= file_get_contents($filepath).$eol;
		$body .= "--$boundary$eol";
		$body .= "Content-Disposition: form-data; name=\"fileInfo\"$eol$eol";
		$body .= json_encode($fileInfo).$eol;
		$body .= "--$boundary--$eol";

		// Set cURL headers
		curl_setopt($this->client, CURLOPT_URL, $url);
		curl_setopt($this->client, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($this->client, CURLOPT_POST, true);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $body);

		// Make API call
		return self::makeRequest();
	}

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
	protected function __destruct() {
		curl_close($this->client);
	}

	private function makeRequest() {
		$result = curl_exec($this->client);
		$error = curl_error($this->client);
		$curl_http_code = curl_getinfo($this->client, CURLINFO_HTTP_CODE);

		if($result === false) {
	    	throw new Exception('An error occurred: '.$error);
		 } else {
		 	if (substr($curl_http_code, 0, 2) != '20') {
		     throw new Exception('An error occurred: http_code: '.$curl_http_code.' error:'.$result);
		    }
		  return json_decode($result);
		 }
	}

	/**
	 * Method to set authorization headers for API calls.
	 */	
	private function setAuthorizationHeaders($auth_type) {
		$headers = array(
			'x-accela-appid: '. $this->app_id,
			'x-accela-agency: ' . $this->agency
		);

		switch($auth_type) {
			// Access token authorization required.
			case 'AccessToken':
				array_push($headers, 'Authorization: ' . $this->access_token);
				break;
			// App Credentials authorization required.
			case 'AppCredentials':
				array_push($headers, 'x-accela-appsecret: ' . $this->app_secret);
				break;
			// No authorization required.
			default:
				array_push($headers, 'x-accela-environment: ' . $this->environment);
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