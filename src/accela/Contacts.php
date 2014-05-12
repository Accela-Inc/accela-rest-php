<?php

require_once('AccelaBase.php');

class Contacts extends AccelaBase {

	public function __construct($app_id, $app_secret, $access_token, $environment="Test", $agency=null) {
		parent::__construct($app_id, $app_secret, $access_token, $environment, $agency);
	}
	public function describeContactTypes($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $params, $auth_type, $debug, $exceptions);
	}
	public function simpleSearchContacts($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $params, $auth_type, $debug, $exceptions);
	}
	public function advancedSearchContacts($path, $auth_type, $body, $debug=false, $exceptions=true) {
		return parent::sendPost($path, $auth_type, $body, $debug, $exceptions);
	}
	public function __destruct() {
		parent::__destruct();
	}

}