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
	public function refreshAccessToken() {

	}

	/**
	 * Class destructor.
	 */
	public function __destruct() {}

}

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

class Agencies extends AccelaBase {

	public function __construct($app_id, $app_secret, $access_token, $environment="Test", $agency=null) {
		parent::__construct($app_id, $app_secret, $access_token, $environment, $agency);
	}
	public function getAgency($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getAgencyLogo($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function __destruct() {
		parent::__destruct();
	}
}

class AppSettings extends AccelaBase {

	public function __construct($app_id, $app_secret, $access_token, $environment="Test", $agency=null) {
		parent::__construct($app_id, $app_secret, $access_token, $environment, $agency);
	}
	public function getAppSettings($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function __destruct() {
		parent::__destruct();
	}
}

class GISSettings extends AccelaBase {

	public function __construct($app_id, $app_secret, $access_token, $environment="Test", $agency=null) {
		parent::__construct($app_id, $app_secret, $access_token, $environment, $agency);
	}
	public function getAppSettings($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function __destruct() {
		parent::__destruct();
	}

}

class GeoCoding extends AccelaBase {

	public function __construct($app_id, $app_secret, $access_token, $environment="Test", $agency=null) {
		parent::__construct($app_id, $app_secret, $access_token, $environment, $agency);
	}
	public function reverseGeocodeAddres($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function __destruct() {
		parent::__destruct();
	}

}

class AgencyLocator extends AccelaBase {

	public function __construct($app_id, $app_secret, $access_token, $environment="Test", $agency=null) {
		parent::__construct($app_id, $app_secret, $access_token, $environment, $agency);
	}
	public function searchAgenciesByCoordinates() {
		throw new Exception('Method not implemented.');
	}
	public function __destruct() {
		parent::__destruct();
	}

}

class Addresses extends AccelaBase {

	public function __construct($app_id, $app_secret, $access_token, $environment="Test", $agency=null) {
		parent::__construct($app_id, $app_secret, $access_token, $environment, $agency);
	}
	public function describeStreetPrefixes($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function searchAddress($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getAddress($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function __destruct() {
		parent::__destruct();
	}

}

class Parcels extends AccelaBase {

	public function __construct($app_id, $app_secret, $access_token, $environment="Test", $agency=null) {
		parent::__construct($app_id, $app_secret, $access_token, $environment, $agency);
	}
	public function searchParcels() {
		throw new Exception('Method not implemented.');
	}
	public function simpleSearchParcels($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getParcelsByIds($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getParcelOwners($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getParcelAddresses($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function __destruct() {
		parent::__destruct();
	}

}

class Owners extends AccelaBase {

	public function __construct($app_id, $app_secret, $access_token, $environment="Test", $agency=null) {
		parent::__construct($app_id, $app_secret, $access_token, $environment, $agency);
	}
	public function searchOwners($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function __destruct() {
		parent::__destruct();
	}

}

class Assets extends AccelaBase {

	public function __construct($app_id, $app_secret, $access_token, $environment="Test", $agency=null) {
		parent::__construct($app_id, $app_secret, $access_token, $environment, $agency);
	}
	public function describeAssetTypes($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function describeAssetStatuses($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function describeAssetUniTypes($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function describeAssetASI($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function describeAssetASIT($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getAssetCATypes($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getAssets($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}	 
	public function getAssetAttributeTables($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}	 
	public function getAssetAttributes($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getAssetConditionAssessments($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function createAsset() {
		throw new Exception('Method not implemented.');
	}	 
	public function searchAssets() {
		throw new Exception('Method not implemented.');
	}
	public function __destruct() {
		parent::__destruct();
	}

}

class Contacts extends AccelaBase {

	public function __construct($app_id, $app_secret, $access_token, $environment="Test", $agency=null) {
		parent::__construct($app_id, $app_secret, $access_token, $environment, $agency);
	}
	public function describeContactTypes($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function simpleSearchContacts($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function advancedSearchContacts() {
		throw new Exception('Method not implemented.');
	}
	public function __destruct() {
		parent::__destruct();
	}

}

class Professionals extends AccelaBase {

	public function __construct($app_id, $app_secret, $access_token, $environment="Test", $agency=null) {
		parent::__construct($app_id, $app_secret, $access_token, $environment, $agency);
	}
	public function getProfessionalsByID($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getProfessionals($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getProfessionalRecords($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function searchprofessionals() {
		throw new Exception('Method not implemented.');
	}
	public function __destruct() {
		parent::__destruct();
	}

}

class Documents extends AccelaBase {

	public function __construct($app_id, $app_secret, $access_token, $environment="Test", $agency=null) {
		parent::__construct($app_id, $app_secret, $access_token, $environment, $agency);
	}
	public function describeDocumentTypes($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function downloadAttachment($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function downloadImageThumbnail($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function downloaddocument($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getDocument($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function __destruct() {
		parent::__destruct();
	}

}

class StandardComments extends AccelaBase {

	public function __construct($app_id, $app_secret, $access_token, $environment="Test", $agency=null) {
		parent::__construct($app_id, $app_secret, $access_token, $environment, $agency);
	}
	public function getStandardCommentGroups($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getStandardComments($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function __destruct() {
		parent::__destruct();
	}

}

class Records extends AccelaBase {

	public function __construct($app_id, $app_secret, $access_token, $environment="Test", $agency=null) {
		parent::__construct($app_id, $app_secret, $access_token, $environment, $agency);
	}
	public function describeRecordType($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function describeWorkOrderTemplates($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function describeASI($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function describeASIDrilldown($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function describeASIT($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function describeASITDrilldown($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function describePriorities($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function describeRecordStatus($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function describeWorkOrderTaskUnit($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function simpleSearchRecords($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function advancedSearchRecords() {
		throw new Exception('Method not implemented.');
	}
	public function searchRecordsByCoordinates() {
		throw new Exception('Method not implemented.');
	}
	public function getDrilldowns($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getRecordASIDrilldown($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getRecordsASI($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getRecordsASIT($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getAddressesForRecord($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getRecordsAssets($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getRecordsComments($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getRecordsConditions($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getRecordsContacts($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getRecordsDocuments($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getRecordsInspections($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getRecordsPlottableLocation($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getRecordsOwners($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getRecordsParcels($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getRecordsWorkflowTasks($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getRecordsParts($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getRecordsCosts($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getRecordsWorkorderTasks($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getRelatedRecords($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getUserComments($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getUservotes($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function createRecord() {
		throw new Exception('Method not implemented.');
	}
	public function createUserComment() {
		throw new Exception('Method not implemented.');
	}
	public function uploadDocuments() {
		throw new Exception('Method not implemented.');
	}
	public function updateRecord($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function updateWorkflowTask() {
		throw new Exception('Method not implemented.');
	}
	public function makeVotes() {
		throw new Exception('Method not implemented.');
	}
	public function describeRecordTypes($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getRecordsConditionSummary($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getRecordsContactSummary($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getRecordsFeeSummary($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getRecordsInspectionSummary($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getRecordsProjectInformations($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getRecordsWorkflowSummary($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getUserActivitiesSummary($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function createCitizenRecord() {
		throw new Exception('Method not implemented.');
	}
	public function createRecordDocument() {
		throw new Exception('Method not implemented.');
	}
	public function deleteRecordDocument() {
		throw new Exception('Method not implemented.');
	}
	public function deleteRecordDocuments() {
		throw new Exception('Method not implemented.');
	}
	public function downloadDocument($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getDocument($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getMyRecords($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getRecord($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getRecordContacts($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getRecordDocuments($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getRecordFees($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getRecordOwners($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getRecordParcels($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getRecordProfessionals($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getRecords($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getRecordsAddresses($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function searchRecords() {
		throw new Exception('Method not implemented.');
	}
	public function getRecordConditions($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getRecordCondition($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function createRecordConditions() {
		throw new Exception('Method not implemented.');
	}
	public function updateRecordCondition() {
		throw new Exception('Method not implemented.');
	}
	public function deleteRecordConditions() {
		throw new Exception('Method not implemented.');
	}
	public function __destruct() {
		parent::__destruct();
	}

}

class Inspections extends AccelaBase {

	public function __construct($app_id, $app_secret, $access_token, $environment="Test", $agency=null) {
		parent::__construct($app_id, $app_secret, $access_token, $environment, $agency);
	}
	public function describeInspectionGroups($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function describeInspectionTypes($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function describeInspectionChecklists($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function simpleSearchInspection($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function advancedSearchInspections() {
		throw new Exception('Method not implemented.');
	}
	public function getSingleInspection($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function scheduleInspection() {
		throw new Exception('Method not implemented.');
	}
	public function reassignInspection() {
		throw new Exception('Method not implemented.');
	}
	public function rescheduleAgencyInspection() {
		throw new Exception('Method not implemented.');
	}
	public function getInspectors($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getsthechecklistitems($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getsthechecklists($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function cancelInspection() {
		throw new Exception('Method not implemented.');
	}
	public function availableInspectionDates($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function createInspection() {
		throw new Exception('Method not implemented.');
	}
	public function deleteInspectionDocuments() {
		throw new Exception('Method not implemented.');
	}
	public function getChecklistsForSpecificInspection($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getInspectionDocument($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getInspectionGrades($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getInspectionStatus($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getInspectionTypesByGroupCode($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getInspectionTypesByIds($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getInspectionTypesByRecordIds($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getInspectionsByIds($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getSpecificInspectionChecklistitems($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function rescheduleInspection() {
		throw new Exception('Method not implemented.');
	}
	public function resultInspection() {
		throw new Exception('Method not implemented.');
	}
	public function searchInspections() {
		throw new Exception('Method not implemented.');
	}
	public function updateInspection() {
		throw new Exception('Method not implemented.');
	}
	public function uploadInspectionDocuments() {
		throw new Exception('Method not implemented.');
	}
	public function createInspectionChecklists() {
		throw new Exception('Method not implemented.');
	}
	public function deleteChecklists() {
		throw new Exception('Method not implemented.');
	}
	public function getChecklistItemDocuments($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getReferenceChecklistByGroupId($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getReferenceChecklistGroups($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getReferenceChecklists($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function updateCheckListItems() {
		throw new Exception('Method not implemented.');
	}
	public function uploadChecklistItemDocuments() {
		throw new Exception('Method not implemented.');
	}
	public function __destruct() {
		parent::__destruct();
	}

}

class Assessments extends AccelaBase {

	public function __construct($app_id, $app_secret, $access_token, $environment="Test", $agency=null) {
		parent::__construct($app_id, $app_secret, $access_token, $environment, $agency);
	}
	public function describeAssessmentAttributes($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function describeAssessmentObservation($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function simpleSearchAssessment($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function advancedSearchAssessments() {
		throw new Exception('Method not implemented.');
	}
	public function getAssessmentAttributesDetail($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function createAssessment() {
		throw new Exception('Method not implemented.');
	}
	public function createAssessmentAttachment() {
		throw new Exception('Method not implemented.');
	}
	public function createAssessmentAttributes() {
		throw new Exception('Method not implemented.');
	}
	public function createAssessmentObservations() {
		throw new Exception('Method not implemented.');
	}
	public function updateAssessment() {
		throw new Exception('Method not implemented.');
	}
	public function updateAssessmentAttributes() {
		throw new Exception('Method not implemented.');
	}
	public function updateAssessmentObservations() {
		throw new Exception('Method not implemented.');
	}
	public function getAssessmentObservationDetails($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function __destruct() {
		parent::__destruct();
	}

}

class Modules extends AccelaBase {

	public function __construct($app_id, $app_secret, $access_token, $environment="Test", $agency=null) {
		parent::__construct($app_id, $app_secret, $access_token, $environment, $agency);
	}
	public function getModules($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function __destruct() {
		parent::__destruct();
	}

}

class Users extends AccelaBase {

	public function __construct($app_id, $app_secret, $access_token, $environment="Test", $agency=null) {
		parent::__construct($app_id, $app_secret, $access_token, $environment, $agency);
	}
	public function getUserProfile($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function __destruct() {
		parent::__destruct();
	}

}

class Departments extends AccelaBase {

	public function __construct($app_id, $app_secret, $access_token, $environment="Test", $agency=null) {
		parent::__construct($app_id, $app_secret, $access_token, $environment, $agency);
	}
	public function getDepartments($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function __destruct() {
		parent::__destruct();
	}

}

class Staff extends AccelaBase {

	public function __construct($app_id, $app_secret, $access_token, $environment="Test", $agency=null) {
		parent::__construct($app_id, $app_secret, $access_token, $environment, $agency);
	}
	public function getDepartmentStaff($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getDepartmentStaffs($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function __destruct() {
		parent::__destruct();
	}

}

class Inspector extends AccelaBase {

	public function __construct($app_id, $app_secret, $access_token, $environment="Test", $agency=null) {
		parent::__construct($app_id, $app_secret, $access_token, $environment, $agency);
	}
	public function getUserInspectorProfile	($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getInspector($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function __destruct() {
		parent::__destruct();
	}

}

class Reports extends AccelaBase {

	public function __construct($app_id, $app_secret, $access_token, $environment="Test", $agency=null) {
		parent::__construct($app_id, $app_secret, $access_token, $environment, $agency);
	}
	public function getReportDefinition($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getReportsDefinition($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function createReport() {
		throw new Exception('Method not implemented.');
	}
	public function reportCategories($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function __destruct() {
		parent::__destruct();
	}

}

class Conditions extends AccelaBase {

	public function __construct($app_id, $app_secret, $access_token, $environment="Test", $agency=null) {
		parent::__construct($app_id, $app_secret, $access_token, $environment, $agency);
	}
	public function getConditionTypes($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getConditionStatuses($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getConditionPriorities($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function __destruct() {
		parent::__destruct();
	}

}

class GisSerivceApp extends AccelaBase {

	public function __construct($app_id, $app_secret, $access_token, $environment="Test", $agency=null) {
		parent::__construct($app_id, $app_secret, $access_token, $environment, $agency);
	}
	public function getGisService($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function __destruct() {
		parent::__destruct();
	}

}