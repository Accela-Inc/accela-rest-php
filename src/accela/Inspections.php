<?php

require_once('AccelaBase.php');

class Inspections extends AccelaBase {

	public function __construct($app_id, $app_secret, $access_token, $environment="Test", $agency=null) {
		parent::__construct($app_id, $app_secret, $access_token, $environment, $agency);
	}
	public function describeInspectionGroups($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $params, $auth_type, $debug, $exceptions);
	}
	public function describeInspectionTypes($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $params, $auth_type, $debug, $exceptions);
	}
	public function describeInspectionChecklists($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $params, $auth_type, $debug, $exceptions);
	}
	public function simpleSearchInspection($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $params, $auth_type, $debug, $exceptions);
	}
	public function advancedSearchInspections($path, $auth_type, $body, $debug=false, $exceptions=true) {
		return parent::sendPost($path, $auth_type, $body, $debug, $exceptions);
	}
	public function getSingleInspection($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $params, $auth_type, $debug, $exceptions);
	}
	public function scheduleInspection($path, $auth_type, $body, $debug=false, $exceptions=true) {
		return parent::sendPost($path, $auth_type, $body, $debug, $exceptions);
	}
	public function reassignInspection() {
		throw new Exception('Method not implemented.');
	}
	public function rescheduleAgencyInspection() {
		throw new Exception('Method not implemented.');
	}
	public function getInspectors($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $params, $auth_type, $debug, $exceptions);
	}
	public function getsthechecklistitems($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $params, $auth_type, $debug, $exceptions);
	}
	public function getsthechecklists($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $params, $auth_type, $debug, $exceptions);
	}
	public function cancelInspection() {
		throw new Exception('Method not implemented.');
	}
	public function availableInspectionDates($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $params, $auth_type, $debug, $exceptions);
	}
	public function createInspection($path, $auth_type, $body, $debug=false, $exceptions=true) {
		return parent::sendPost($path, $auth_type, $body, $debug, $exceptions);
	}
	public function deleteInspectionDocuments() {
		throw new Exception('Method not implemented.');
	}
	public function getChecklistsForSpecificInspection($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $params, $auth_type, $debug, $exceptions);
	}
	public function getInspectionDocument($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $params, $auth_type, $debug, $exceptions);
	}
	public function getInspectionGrades($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $params, $auth_type, $debug, $exceptions);
	}
	public function getInspectionStatus($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $params, $auth_type, $debug, $exceptions);
	}
	public function getInspectionTypesByGroupCode($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $params, $auth_type, $debug, $exceptions);
	}
	public function getInspectionTypesByIds($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $params, $auth_type, $debug, $exceptions);
	}
	public function getInspectionTypesByRecordIds($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $params, $auth_type, $debug, $exceptions);
	}
	public function getInspectionsByIds($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $params, $auth_type, $debug, $exceptions);
	}
	public function getSpecificInspectionChecklistitems($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $params, $auth_type, $debug, $exceptions);
	}
	public function rescheduleInspection() {
		throw new Exception('Method not implemented.');
	}
	public function resultInspection() {
		throw new Exception('Method not implemented.');
	}
	public function searchInspections($path, $auth_type, $body, $debug=false, $exceptions=true) {
		return parent::sendPost($path, $auth_type, $body, $debug, $exceptions);
	}
	public function updateInspection() {
		throw new Exception('Method not implemented.');
	}
	public function uploadInspectionDocuments($path, $auth_type, $body, $debug=false, $exceptions=true) {
		return parent::sendPost($path, $auth_type, $body, $debug, $exceptions);
	}
	public function createInspectionChecklists($path, $auth_type, $body, $debug=false, $exceptions=true) {
		return parent::sendPost($path, $auth_type, $body, $debug, $exceptions);
	}
	public function deleteChecklists() {
		throw new Exception('Method not implemented.');
	}
	public function getChecklistItemDocuments($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $params, $auth_type, $debug, $exceptions);
	}
	public function getReferenceChecklistByGroupId($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $params, $auth_type, $debug, $exceptions);
	}
	public function getReferenceChecklistGroups($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $params, $auth_type, $debug, $exceptions);
	}
	public function getReferenceChecklists($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $params, $auth_type, $debug, $exceptions);
	}
	public function updateCheckListItems() {
		throw new Exception('Method not implemented.');
	}
	public function uploadChecklistItemDocuments($path, $auth_type, $body, $debug=false, $exceptions=true) {
		return parent::sendPost($path, $auth_type, $body, $debug, $exceptions);
	}
	public function __destruct() {
		parent::__destruct();
	}

}