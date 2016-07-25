<?php

require_once('AccelaBase.php');

class Records extends AccelaBase {

	public function __construct($app_id, $app_secret, $access_token, $environment="Test", $agency=null, $endpoint=null) {
		parent::__construct($app_id, $app_secret, $access_token, $environment, $agency, $endpoint);
	}
	public function describeRecordType($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function describeWorkOrderTemplates($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function describeASI($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function describeASIDrilldown($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function describeASIT($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function describeASITDrilldown($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function describePriorities($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function describeRecordStatus($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function describeWorkOrderTaskUnit($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function simpleSearchRecords($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function advancedSearchRecords($path, $auth_type, Array $params, $body, $debug=false, $exceptions=true) {
		return parent::sendPost($path, $auth_type, $params, $body, $debug);
	}
	public function searchRecordsByCoordinates($path, $auth_type, Array $params, $body, $debug=false, $exceptions=true) {
		return parent::sendPost($path, $auth_type, $params, $body, $debug);
	}
	public function getDrilldowns($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function getRecordASIDrilldown($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function getRecordsASI($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function getRecordsASIT($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function getAddressesForRecord($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function getRecordsAssets($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function getRecordsComments($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function getRecordsConditions($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function getRecordsContacts($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function getRecordsDocuments($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function getRecordsInspections($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function getRecordsPlottableLocation($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function getRecordsOwners($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function getRecordsParcels($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function getRecordsWorkflowTasks($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function getRecordsParts($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function getRecordsCosts($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function getRecordsWorkorderTasks($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function getRelatedRecords($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function getUserComments($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function getUservotes($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function createRecord($path, $auth_type, Array $params, $body, $debug=false, $exceptions=true) {
		return parent::sendPost($path, $auth_type, $params, $body, $debug);
	}
	public function createUserComment($path, $auth_type, Array $params, $body, $debug=false, $exceptions=true) {
		return parent::sendPost($path, $auth_type, $params, $body, $debug);
	}
	public function uploadDocuments($path, $auth_type, Array $params, $body, $debug=false, $exceptions=true) {
		return parent::sendPost($path, $auth_type, $params, $body, $debug);
	}
	public function updateRecord() {
		throw new Exception('Method not implemented.');
	}
	public function updateWorkflowTask() {
		throw new Exception('Method not implemented.');
	}
	public function makeVotes($path, $auth_type, Array $params, $body, $debug=false, $exceptions=true) {
		return parent::sendPost($path, $auth_type, $params, $body, $debug);
	}
	public function describeRecordTypes($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function getRecordsConditionSummary($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function getRecordsContactSummary($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function getRecordsFeeSummary($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function getRecordsInspectionSummary($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function getRecordsProjectInformations($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function getRecordsWorkflowSummary($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function getUserActivitiesSummary($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function createCitizenRecord($path, $auth_type, Array $params, $body, $debug=false, $exceptions=true) {
		return parent::sendPost($path, $auth_type, $params, $body, $debug);
	}
	public function createRecordDocument($path, $auth_type, Array $params, $body, $debug=false, $exceptions=true) {
		return parent::sendPost($path, $auth_type, $params, $body, $debug);
	}
	public function deleteRecordDocument() {
		throw new Exception('Method not implemented.');
	}
	public function deleteRecordDocuments() {
		throw new Exception('Method not implemented.');
	}
	public function downloadDocument($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function getDocument($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function getMyRecords($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function getRecord($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function getRecordContacts($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function getRecordDocuments($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function getRecordFees($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function getRecordOwners($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function getRecordParcels($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function getRecordProfessionals($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function getRecords($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function getRecordsAddresses($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function searchRecords($path, $auth_type, Array $params, $debug=false, $exceptions=true, $body=null) {
		return parent::sendPost($path, $auth_type, $params, $body);
	}
	public function getRecordConditions($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function getRecordCondition($path, $auth_type, Array $params, $debug=false, $exceptions=true) {
		return parent::sendRequest($path, $auth_type, $params, $debug, $exceptions);
	}
	public function createRecordConditions($path, $auth_type, Array $params, $body, $debug=false, $exceptions=true) {
		return parent::sendPost($path, $auth_type, $params, $body, $debug);
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