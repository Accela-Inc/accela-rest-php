<?php

require_once('AccelaBase.php');

class Records extends AccelaBase {

	public function __construct($app_id, $app_secret, $access_token, $environment="Test", $agency=null) {
		parent::__construct($app_id, $app_secret, $access_token, $environment, $agency);
	}
	public function describeRecordType($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function describeWorkOrderTemplates($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function describeASI($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function describeASIDrilldown($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function describeASIT($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function describeASITDrilldown($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function describePriorities($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function describeRecordStatus($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function describeWorkOrderTaskUnit($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function simpleSearchRecords($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function advancedSearchRecords($path, $auth_type, $body) {
		return parent::sendPost($path, $auth_type, $body);
	}
	public function searchRecordsByCoordinates($path, $auth_type, $body) {
		return parent::sendPost($path, $auth_type, $body);
	}
	public function getDrilldowns($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function getRecordASIDrilldown($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function getRecordsASI($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function getRecordsASIT($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function getAddressesForRecord($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function getRecordsAssets($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function getRecordsComments($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function getRecordsConditions($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function getRecordsContacts($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function getRecordsDocuments($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function getRecordsInspections($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function getRecordsPlottableLocation($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function getRecordsOwners($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function getRecordsParcels($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function getRecordsWorkflowTasks($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function getRecordsParts($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function getRecordsCosts($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function getRecordsWorkorderTasks($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function getRelatedRecords($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function getUserComments($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function getUservotes($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function createRecord($path, $auth_type, $body) {
		return parent::sendPost($path, $auth_type, $body);
	}
	public function createUserComment($path, $auth_type, $body) {
		return parent::sendPost($path, $auth_type, $body);
	}
	public function uploadDocuments($path, $auth_type, $body) {
		return parent::sendPost($path, $auth_type, $body);
	}
	public function updateRecord() {
		throw new Exception('Method not implemented.');
	}
	public function updateWorkflowTask() {
		throw new Exception('Method not implemented.');
	}
	public function makeVotes($path, $auth_type, $body) {
		return parent::sendPost($path, $auth_type, $body);
	}
	public function describeRecordTypes($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function getRecordsConditionSummary($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function getRecordsContactSummary($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function getRecordsFeeSummary($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function getRecordsInspectionSummary($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function getRecordsProjectInformations($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function getRecordsWorkflowSummary($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function getUserActivitiesSummary($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function createCitizenRecord($path, $auth_type, $body) {
		return parent::sendPost($path, $auth_type, $body);
	}
	public function createRecordDocument($path, $auth_type, $body) {
		return parent::sendPost($path, $auth_type, $body);
	}
	public function deleteRecordDocument() {
		throw new Exception('Method not implemented.');
	}
	public function deleteRecordDocuments() {
		throw new Exception('Method not implemented.');
	}
	public function downloadDocument($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function getDocument($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function getMyRecords($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function getRecord($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function getRecordContacts($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function getRecordDocuments($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function getRecordFees($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function getRecordOwners($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function getRecordParcels($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function getRecordProfessionals($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function getRecords($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function getRecordsAddresses($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function searchRecords($path, $auth_type, Array $params, $body=null) {
		return parent::sendPost($path, $auth_type, $params, $body);
	}
	public function getRecordConditions($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function getRecordCondition($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function createRecordConditions($path, $auth_type, $body) {
		return parent::sendPost($path, $auth_type, $body);
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