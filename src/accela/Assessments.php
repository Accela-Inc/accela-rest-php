<?php

require_once('AccelaBase.php');

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