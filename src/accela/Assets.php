<?php

require_once('AccelaBase.php');

class Assets extends AccelaBase {

	public function __construct($app_id, $app_secret, $access_token, $environment="Test", $agency=null) {
		parent::__construct($app_id, $app_secret, $access_token, $environment, $agency);
	}
	public function describeAssetTypes($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $params, $auth_type, $debug, $exceptions);
	}
	public function describeAssetStatuses($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $params, $auth_type, $debug, $exceptions);
	}
	public function describeAssetUniTypes($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $params, $auth_type, $debug, $exceptions);
	}
	public function describeAssetASI($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $params, $auth_type, $debug, $exceptions);
	}
	public function describeAssetASIT($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $params, $auth_type, $debug, $exceptions);
	}
	public function getAssetCATypes($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $params, $auth_type, $debug, $exceptions);
	}
	public function getAssets($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $params, $auth_type, $debug, $exceptions);
	}	 
	public function getAssetAttributeTables($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $params, $auth_type, $debug, $exceptions);
	}	 
	public function getAssetAttributes($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $params, $auth_type, $debug, $exceptions);
	}
	public function getAssetConditionAssessments($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $params, $auth_type, $debug, $exceptions);
	}
	public function createAsset($path, $auth_type, $body, $debug=false, $exceptions=true) {
		return parent::sendPost($path, $auth_type, $body, $debug, $exceptions);
	}	 
	public function searchAssets($path, $auth_type, $body, $debug=false, $exceptions=true) {
		return parent::sendPost($path, $auth_type, $body, $debug, $exceptions);
	}
	public function __destruct() {
		parent::__destruct();
	}

}