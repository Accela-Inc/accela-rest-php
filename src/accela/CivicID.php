<?php

require_once('AccelaBase.php');

class CivicID extends AccelaBase {

	const AUTH_ENDPOINT = 'https://apis.accela.com';
	const PATH = 'oauth2/token';

	public function __construct($app_id, $app_secret, $access_token=null, $environment="Test", $agency=null) {
		parent::__construct($app_id, $app_secret, $access_token, $environment, $agency, self::AUTH_ENDPOINT);
	}
	public function getToken($username, $password, $scope) {
		return parent::getToken($username, $password, $scope, self::PATH);
	}
	public function refreshToken($refresh_token) {
		return patent::refreshToken($refresh_token);
	}
	public function __destruct() {
		parent::__destruct();
	}

}

