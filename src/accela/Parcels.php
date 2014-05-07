<?php

require_once('AccelaBase.php');

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