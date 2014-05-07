<?php

require_once('AccelaBase.php');

class Inspections extends AccelaBase {

	public function __construct($app_id, $app_secret, $access_token, $environment="Test", $agency=null) {
		parent::__construct($app_id, $app_secret, $access_token, $environment, $agency);
	}
	public function describeInspectionGroups($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function describeInspectionTypes($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function describeInspectionChecklists($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function simpleSearchInspection($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function advancedSearchInspections() {
		throw new Exception('Method not implemented.');
	}
	public function getSingleInspection($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function scheduleInspection() {
		throw new Exception('Method not implemented.');
	}
	public function reassignInspection() {
		throw new Exception('Method not implemented.');
	}
	public function rescheduleAgencyInspection() {
		throw new Exception('Method not implemented.');
	}
	public function getInspectors($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getsthechecklistitems($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getsthechecklists($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function cancelInspection() {
		throw new Exception('Method not implemented.');
	}
	public function availableInspectionDates($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function createInspection() {
		throw new Exception('Method not implemented.');
	}
	public function deleteInspectionDocuments() {
		throw new Exception('Method not implemented.');
	}
	public function getChecklistsForSpecificInspection($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getInspectionDocument($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getInspectionGrades($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getInspectionStatus($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getInspectionTypesByGroupCode($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getInspectionTypesByIds($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getInspectionTypesByRecordIds($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getInspectionsByIds($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getSpecificInspectionChecklistitems($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function rescheduleInspection() {
		throw new Exception('Method not implemented.');
	}
	public function resultInspection() {
		throw new Exception('Method not implemented.');
	}
	public function searchInspections() {
		throw new Exception('Method not implemented.');
	}
	public function updateInspection() {
		throw new Exception('Method not implemented.');
	}
	public function uploadInspectionDocuments() {
		throw new Exception('Method not implemented.');
	}
	public function createInspectionChecklists() {
		throw new Exception('Method not implemented.');
	}
	public function deleteChecklists() {
		throw new Exception('Method not implemented.');
	}
	public function getChecklistItemDocuments($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getReferenceChecklistByGroupId($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getReferenceChecklistGroups($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function getReferenceChecklists($path, $auth_type, Array $params) {
		return parent::sendRequest($path, $params, $auth_type, $debug=false, $exceptions=true);
	}
	public function updateCheckListItems() {
		throw new Exception('Method not implemented.');
	}
	public function uploadChecklistItemDocuments() {
		throw new Exception('Method not implemented.');
	}
	public function __destruct() {
		parent::__destruct();
	}

}