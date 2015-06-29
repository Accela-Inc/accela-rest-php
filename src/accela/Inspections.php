<?php

require_once('AccelaBase.php');

class Inspections extends AccelaBase {

	public function __construct($app_id, $app_secret, $access_token, $environment="Test", $agency=null, $endpoint=null) {
		parent::__construct($app_id, $app_secret, $access_token, $environment, $agency, $endpoint);
	}
	public function describeInspectionGroups($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function describeInspectionTypes($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function describeInspectionChecklists($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function simpleSearchInspection($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function advancedSearchInspections($path, $auth_type, $body) {
		return parent::sendPost($path, $auth_type, $body);
	}
	public function getSingleInspection($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function scheduleInspection($path, $auth_type, $body) {
		return parent::sendPost($path, $auth_type, $body);
	}
	public function reassignInspection() {
		throw new Exception('Method not implemented.');
	}
	public function rescheduleAgencyInspection() {
		throw new Exception('Method not implemented.');
	}
	public function getInspectors($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function getsthechecklistitems($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function getsthechecklists($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function cancelInspection() {
		throw new Exception('Method not implemented.');
	}
	public function availableInspectionDates($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function createInspection($path, $auth_type, $body) {
		return parent::sendPost($path, $auth_type, $body);
	}
	public function deleteInspectionDocuments() {
		throw new Exception('Method not implemented.');
	}
	public function getChecklistsForSpecificInspection($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function getInspectionDocument($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function getInspectionGrades($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function getInspectionStatus($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function getInspectionTypesByGroupCode($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function getInspectionTypesByIds($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function getInspectionTypesByRecordIds($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function getInspectionsByIds($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function getSpecificInspectionChecklistitems($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function rescheduleInspection() {
		throw new Exception('Method not implemented.');
	}
	public function resultInspection() {
		throw new Exception('Method not implemented.');
	}
	public function searchInspections($path, $auth_type, $body) {
		return parent::sendPost($path, $auth_type, $body);
	}
	public function updateInspection() {
		throw new Exception('Method not implemented.');
	}
	public function uploadInspectionDocuments($path, $auth_type, Array $params, $filename, $filetype, $filepath, $description) {
		return parent::sendFormPost($path, $auth_type, $params, $filename, $filetype, $filepath, $description);
	}
	public function createInspectionChecklists($path, $auth_type, $body) {
		return parent::sendPost($path, $auth_type, $body);
	}
	public function deleteChecklists() {
		throw new Exception('Method not implemented.');
	}
	public function getChecklistItemDocuments($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function getReferenceChecklistByGroupId($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function getReferenceChecklistGroups($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function getReferenceChecklists($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type);
	}
	public function updateCheckListItems() {
		throw new Exception('Method not implemented.');
	}
	public function uploadChecklistItemDocuments($path, $auth_type, $body) {
		return parent::sendPost($path, $auth_type, $body);
	}
	public function __destruct() {
		parent::__destruct();
	}

}