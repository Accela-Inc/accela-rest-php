<?php

require_once('AccelaBase.php');

class Assessments extends AccelaBase {

	public function __construct($app_id, $app_secret, $access_token, $environment="Test", $agency=null) {
		parent::__construct($app_id, $app_secret, $access_token, $environment, $agency);
	}
	public function describeAssessmentAttributes($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $params, $auth_type, $debug, $exceptions);
	}
	public function describeAssessmentObservation($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $params, $auth_type, $debug, $exceptions);
	}
	public function simpleSearchAssessment($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $params, $auth_type, $debug, $exceptions);
	}
	public function advancedSearchAssessments($path, $auth_type, $body, $debug=false, $exceptions=true) {
		return parent::sendPost($path, $auth_type, $body, $debug, $exceptions);
	}
	public function getAssessmentAttributesDetail($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $params, $auth_type, $debug, $exceptions);
	}
	public function createAssessment($path, $auth_type, $body, $debug=false, $exceptions=true) {
		return parent::sendPost($path, $auth_type, $body, $debug, $exceptions);
	}
	public function createAssessmentAttachment($path, $auth_type, $body, $debug=false, $exceptions=true) {
		return parent::sendPost($path, $auth_type, $body, $debug, $exceptions);
	}
	public function createAssessmentAttributes($path, $auth_type, $body, $debug=false, $exceptions=true) {
		return parent::sendPost($path, $auth_type, $body, $debug, $exceptions);
	}
	public function createAssessmentObservations($path, $auth_type, $body, $debug=false, $exceptions=true) {
		return parent::sendPost($path, $auth_type, $body, $debug, $exceptions);
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
	public function getAssessmentObservationDetails($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $params, $auth_type, $debug, $exceptions);
	}
	public function __destruct() {
		parent::__destruct();
	}

}