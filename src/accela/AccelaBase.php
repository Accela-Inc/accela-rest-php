<?php 
/**
 * Base class for Accela API classes.
 */ 
class AccelaBase {

	// Default endpoints for Accela APIs. Optionally modifiable in class constructor.
	const ENDPOINT = 'https://apis.accela.com/';

	private $api_endpoint; // Endpoint for API calls.
	private $app_id; // The application ID (provisioned when app is created).
	private $app_secret; // The application secret (provisioned when app is created).
	private $access_token; // The access token for making calls to the Accela API.
	private $environment; // The environment in which the app is running.
	private $agency; // The name of the agency.
	private $client; // cURL client used to make API calls.

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
	protected function sendRequest($path, $auth_type, Array $params=null, $debug=null) {
		return self::makeRequest($path, $auth_type, $params, null, $debug);
	}

	/**
	 * Method to send POST requests to Accela API.
	 */ 
	protected function sendPost($path, $auth_type, Array $params, $body, $debug=null) {
		$post_body = $body ? json_encode($body) : json_encode(new stdClass());
		curl_setopt($this->client, CURLOPT_POST, true);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $post_body);
		return self::makeRequest($path, $auth_type, $params, null, $debug);
	}

	/**
	 * Method to POST files via 'multipart/form-data'.
	 */ 
	protected function sendFormPost($path, $auth_type, Array $params, $filename, $filetype, $filepath, $description, $debug=null) {

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
		curl_setopt($this->client, CURLOPT_POST, true);
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $body);
		return self::makeRequest($path, $auth_type, $params, $headers, $debug);
	}

	// Method to send PUT requests to Accela API.	
	protected function sendPut($path, $auth_type, Array $params=null, $body, $debug=null) {
		$put_body = $body ? json_encode($body) : json_encode(new stdClass());
		curl_setopt($this->client, CURLOPT_CUSTOMREQUEST, 'PUT');
		curl_setopt($this->client, CURLOPT_POSTFIELDS, $put_body);
		return self::makeRequest($path, $auth_type, $params, null, $debug);
	}

	// Method to send DELETE requests to Accela API.
	protected function sendDelete($path, $auth_type, Array $params=null, $debug=null) {
		curl_setopt($this->client, CURLOPT_CUSTOMREQUEST, 'DELETE');
		return self::makeRequest($path, $auth_type, $params, null, $debug);
	}

	/**
	 * Class destructor.
	 */
	protected function __destruct() {
		curl_close($this->client);
	}

	private function makeRequest($path, $auth_type, $params, $headerArray=null, $debug=null) {
		@ $url = $this->api_endpoint . $path . '?' . self::escapeCharacters($params);
		curl_setopt($this->client, CURLOPT_URL, $url);

		if(empty($headerArray)) {
			$headers = self::setAuthorizationHeaders($auth_type);
			array_push($headers, 'Content-Type: application/json', 'Accept: application/json');
		} else {
			$headers = $headerArray;
		}
		curl_setopt($this->client, CURLOPT_HTTPHEADER, $headers);

		$result = curl_exec($this->client);
		$error = curl_error($this->client);
		$curl_info = curl_getinfo($this->client);

		if($debug) {
			syslog(LOG_WARNING, json_encode($curl_info));
		}

		$curl_http_code = $curl_info['http_code'];

		if($result === false) {
	    	throw new Exception($error, $curl_http_code);
		 } else {
		 	if (substr($curl_http_code, 0, 2) != '20') {
		 		if(json_decode($result)) {
		 			throw new ConstructException($result, $curl_http_code);		
		 		} else {
		 			throw new Exception($result, $curl_http_code);
		 		}
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
	private function escapeCharacters($params) {
		$search = array('.','-','%','/','\\\\',':','*','\\','<','>','|','?',' ','&','#');
		$replace = array('.0','.1','.2','.3','.4','.5','.6','.7','.8','.9','.a','.b','.c','.d','.e');
		$new_params = array();
		foreach($params as $key => $value) {
			if(preg_match("/^(19|20)\d\d[-](0[1-9]|1[012])[-](0[1-9]|[12][0-9]|3[01])$/", $value)) {
				$new_params[$key] = $value;
			} else {
				$new_params[$key] = str_replace($search, $replace, $value);
			}
		}
		return http_build_query($new_params);
	}

}

/**
 * Class for wrapping exceptions.
 */
class ConstructException extends Exception {
	public function __construct($details, $code) {
		parent::__construct($details, $code);
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