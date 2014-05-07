<?php

require_once('AccelaBase.php');

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