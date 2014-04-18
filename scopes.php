<?php

/**
 * Static class containing names of scopes used when requesting auth tokens.
 */
class SetScope {
	public static $get_agency='get_agency';
	public static $get_agency_logo='get_agency_logo';
	public static $get_app_settings='get_app_settings';
	public static $get_gis_settings='get_gis_settings';
	public static $reverse_geocode='reverse_geocode';
	public static $search_agencies_by_geo='search_agencies_by_geo';
	public static $get_ref_street_prefixes='get_ref_street_prefixes';
	public static $get_addresses='get_addresses';
	public static $get_address='get_address';
	public static $search_parcels='search_parcels';
	public static $get_parcels='get_parcels';
	public static $get_parcel='get_parcel';
	public static $get_parcel_owners='get_parcel_owners';
	public static $get_parcel_addresses='get_parcel_addresses';
	public static $get_owners='get_owners';
	public static $get_ref_asset_types='get_ref_asset_types';
	public static $get_ref_asset_statuses='get_ref_asset_statuses';
	public static $get_ref_asset_unit_types='get_ref_asset_unit_types';
	public static $get_ref_asset_asis='get_ref_asset_asis';
	public static $get_ref_asset_asits='get_ref_asset_asits';
	public static $get_ref_asset_catypes='get_ref_asset_catypes';
	public static $get_asset='get_asset';
	public static $get_asset_attributetables='get_asset_attributetables';
	public static $get_asset_attributes='get_asset_attributes';
	public static $get_condition_assessments='get_condition_assessments';
	public static $create_asset='create_asset';
	public static $search_assets='search_assets';
	public static $get_ref_contact_types='get_ref_contact_types';
	public static $get_contacts='get_contacts';
	public static $search_contacts='search_contacts';
	public static $get_professional='get_professional';
	public static $get_professionals='get_professionals';
	public static $get_professional_records='get_professional_records';
	public static $search_professionals='search_professionals';
	public static $get_ref_document_types='get_ref_document_types';
	public static $get_document='get_document';
	public static $get_thumbnail='get_thumbnail';
	public static $download_document='download_document';
	public static $get_ref_standard_comment_groups='get_ref_standard_comment_groups';
	public static $get_ref_standard_comments='get_ref_standard_comments';
	public static $get_ref_record_type='get_ref_record_type';
	public static $get_ref_work_order_templates='get_ref_work_order_templates';
	public static $get_ref_record_type_asis='get_ref_record_type_asis';
	public static $get_ref_asi_drilldown='get_ref_asi_drilldown';
	public static $get_ref_record_type_asits='get_ref_record_type_asits';
	public static $get_ref_asit_drilldown='get_ref_asit_drilldown';
	public static $get_ref_record_priorities='get_ref_record_priorities';
	public static $get_ref_record_type_statuses='get_ref_record_type_statuses';
	public static $get_ref_workordertask_units='get_ref_workordertask_units';
	public static $get_records='get_records';
	public static $search_records='search_records';
	public static $geocode_search_records='geocode_search_records';
	public static $get_record='get_record';
	public static $get_record_asit_drilldown='get_record_asit_drilldown';
	public static $get_record_asi_drilldown='get_record_asi_drilldown';
	public static $get_record_asis='get_record_asis';
	public static $get_record_asits='get_record_asits';
	public static $get_record_addresses='get_record_addresses';
	public static $get_record_assets='get_record_assets';
	public static $get_record_comments='get_record_comments';
	public static $get_record_conditions='get_record_conditions';
	public static $get_record_contacts='get_record_contacts';
	public static $get_record_documents='get_record_documents';
	public static $get_record_inspections='get_record_inspections';
	public static $get_record_location='get_record_location';
	public static $get_record_owners='get_record_owners';
	public static $get_record_parcels='get_record_parcels';
	public static $get_record_workflow_tasks='get_record_workflow_tasks';
	public static $get_record_parts='get_record_parts';
	public static $get_record_costs='get_record_costs';
	public static $get_record_workorder_tasks='get_record_workorder_tasks';
	public static $get_related_records='get_related_records';
	public static $get_record_user_comments='get_record_user_comments';
	public static $get_record_votes='get_record_votes';
	public static $create_record='create_record';
	public static $create_record_user_comment='create_record_user_comment';
	public static $create_record_document='create_record_document';
	public static $update_record='update_record';
	public static $update_record_workflow_task='update_record_workflow_task';
	public static $create_record_vote='create_record_vote';
	public static $get_ref_record_types='get_ref_record_types';
	public static $get_record_condition_summary='get_record_condition_summary';
	public static $get_record_contact_summary='get_record_contact_summary';
	public static $get_record_fee_summary='get_record_fee_summary';
	public static $get_record_inspection_summary='get_record_inspection_summary';
	public static $get_record_project_informations='get_record_project_informations';
	public static $get_record_workflow_summary='get_record_workflow_summary';
	public static $get_record_user_activities_summary='get_record_user_activities_summary';
	public static $delete_record_document='delete_record_document';
	public static $delete_record_documents='delete_record_documents';
	public static $get_my_records='get_my_records';
	public static $get_record_fees='get_record_fees';
	public static $get_record_professionals='get_record_professionals';
	public static $get_record_condition='get_record_condition';
	public static $create_record_conditions='create_record_conditions';
	public static $update_record_condition='update_record_condition';
	public static $delete_record_conditions='delete_record_conditions';
	public static $get_ref_inspection_groups='get_ref_inspection_groups';
	public static $get_ref_inspection_types='get_ref_inspection_types';
	public static $get_ref_inspection_checklist_groups='get_ref_inspection_checklist_groups';
	public static $get_inspections='get_inspections';
	public static $search_inspections='search_inspections';
	public static $get_inspection='get_inspection';
	public static $create_inspection='create_inspection';
	public static $reassign_inspection='reassign_inspection';
	public static $reschedule_inspection='reschedule_inspection';
	public static $get_ref_inspectors='get_ref_inspectors';
	public static $get_inspection_checklist_items='get_inspection_checklist_items';
	public static $get_inspection_checklists='get_inspection_checklists';
	public static $cancel_inspection='cancel_inspection';
	public static $get_available_inspection_dates='get_available_inspection_dates';
	public static $delete_inspection_documents='delete_inspection_documents';
	public static $get_inspection_checklist='get_inspection_checklist';
	public static $get_inspection_documents='get_inspection_documents';
	public static $get_ref_inspection_grades='get_ref_inspection_grades';
	public static $get_ref_inspection_statuses='get_ref_inspection_statuses';
	public static $get_inspection_types_by_groupcode='get_inspection_types_by_groupcode';
	public static $get_inspection_types_by_ids='get_inspection_types_by_ids';
	public static $get_inspection_types_by_recordids='get_inspection_types_by_recordids';
	public static $get_inspections_by_ids='get_inspections_by_ids';
	public static $result_inspection='result_inspection';
	public static $update_inspection='update_inspection';
	public static $upload_inspection_documents='upload_inspection_documents';
	public static $create_checklists='create_checklists';
	public static $delete_checklists='delete_checklists';
	public static $get_checklistitem_documents='get_checklistitem_documents';
	public static $get_ref_checklist_by_ids='get_ref_checklist_by_ids';
	public static $get_ref_checklist_groups='get_ref_checklist_groups';
	public static $get_ref_checklists='get_ref_checklists';
	public static $update_checklist_items='update_checklist_items';
	public static $upload_checklistitem_documents='upload_checklistitem_documents';
	public static $get_assessment_attributes_describe='get_assessment_attributes_describe';
	public static $get_assessment_observation_describe='get_assessment_observation_describe';
	public static $get_assessment='get_assessment';
	public static $search_assessments='search_assessments';
	public static $get_assessment_attributes_detail='get_assessment_attributes_detail';
	public static $create_assessment='create_assessment';
	public static $create_assessment_document='create_assessment_document';
	public static $create_assessment_attributes='create_assessment_attributes';
	public static $create_assessment_observations='create_assessment_observations';
	public static $update_assessment='update_assessment';
	public static $update_assessment_attributes='update_assessment_attributes';
	public static $update_assessment_observations='update_assessment_observations';
	public static $get_assessment_observation_details='get_assessment_observation_details';
	public static $get_ref_modules='get_ref_modules';
	public static $get_user_profile='get_user_profile';
	public static $get_ref_departments='get_ref_departments';
	public static $get_departments='get_departments';
	public static $get_ref_staffs='get_ref_staffs';
	public static $get_department_staffs='get_department_staffs';
	public static $get_inspector='get_inspector';
	public static $get_report_definition='get_report_definition';
	public static $get_reports_definition='get_reports_definition';
	public static $create_report='create_report';
	public static $get_report_categories='get_report_categories';
	public static $get_condition_types='get_condition_types';
	public static $get_condition_statuses='get_condition_statuses';
	public static $get_condition_priorities='get_condition_priorities';
	public static $gisserviceapp_get_service='gisserviceapp_get_service';

	/**
	 * Convenience method for generating lsit of scopes for working with Records.
	 */
	public static function getRecordScopes()  {
		$scopes = array(
		self::$get_ref_record_type,
		self::$get_ref_work_order_templates,
		self::$get_ref_record_type_asis,
		self::$get_ref_asi_drilldown,
		self::$get_ref_record_type_asits,
		self::$get_ref_asit_drilldown,
		self::$get_ref_record_priorities,
		self::$get_ref_record_type_statuses,
		self::$get_ref_workordertask_units,
		self::$get_records,
		self::$search_records,
		self::$geocode_search_records,
		self::$get_record,
		self::$get_record_asit_drilldown,
		self::$get_record_asi_drilldown,
		self::$get_record_asis,
		self::$get_record_asits,
		self::$get_record_addresses,
		self::$get_record_assets,
		self::$get_record_comments,
		self::$get_record_conditions,
		self::$get_record_contacts,
		self::$get_record_documents,
		self::$get_record_inspections,
		self::$get_record_location,
		self::$get_record_owners,
		self::$get_record_parcels,
		self::$get_record_workflow_tasks,
		self::$get_record_parts,
		self::$get_record_costs,
		self::$get_record_workorder_tasks,
		self::$get_related_records,
		self::$get_record_user_comments,
		self::$get_record_votes,
		self::$create_record,
		self::$create_record_user_comment,
		self::$create_record_document,
		self::$update_record,
		self::$update_record_workflow_task,
		self::$create_record_vote,
		self::$get_ref_record_types,
		self::$get_record_condition_summary,
		self::$get_record_contact_summary,
		self::$get_record_fee_summary,
		self::$get_record_inspection_summary,
		self::$get_record_project_informations,
		self::$get_record_workflow_summary,
		self::$get_record_user_activities_summary,
		self::$create_record,
		self::$create_record_document,
		self::$delete_record_document,
		self::$delete_record_documents,
		self::$download_document,
		self::$get_document,
		self::$get_my_records,
		self::$get_record,
		self::$get_record_contacts,
		self::$get_record_documents,
		self::$get_record_fees,
		self::$get_record_owners,
		self::$get_record_parcels,
		self::$get_record_professionals,
		self::$get_records,
		self::$get_record_addresses,
		self::$search_records,
		self::$get_record_conditions,
		self::$get_record_condition,
		self::$create_record_conditions,
		self::$update_record_condition,
		self::$delete_record_conditions);
		return implode("%20", $scopes);
	}

	/**
	 * Convenience method for generating lsit of scopes for working with Inspections.
	 */
	public static function getInspectionScopes() {
		$scopes = array(
		self::$get_ref_inspection_groups,
		self::$get_ref_inspection_types,
		self::$get_ref_inspection_checklist_groups,
		self::$get_inspections,
		self::$search_inspections,
		self::$get_inspection,
		self::$create_inspection,
		self::$reassign_inspection,
		self::$reschedule_inspection,
		self::$get_ref_inspectors,
		self::$get_inspection_checklist_items,
		self::$get_inspection_checklists,
		self::$cancel_inspection,
		self::$get_available_inspection_dates,
		self::$create_inspection,
		self::$delete_inspection_documents,
		self::$get_inspection_checklist,
		self::$get_inspection_documents,
		self::$get_ref_inspection_grades,
		self::$get_ref_inspection_statuses,
		self::$get_inspection_types_by_groupcode,
		self::$get_inspection_types_by_ids,
		self::$get_inspection_types_by_recordids,
		self::$get_inspections_by_ids,
		self::$get_inspection_checklist_items,
		self::$reschedule_inspection,
		self::$result_inspection,
		self::$search_inspections,
		self::$update_inspection,
		self::$upload_inspection_documents,
		self::$create_checklists,
		self::$delete_checklists,
		self::$get_checklistitem_documents,
		self::$get_ref_checklist_by_ids,
		self::$get_ref_checklist_groups,
		self::$get_ref_checklists,
		self::$update_checklist_items,
		self::$upload_checklistitem_documents);
		return implode("%20", $scopes);
	}

	/**
	 * Convenience method for generating lsit of scopes for working with Assessments.
	 */
	public static function getAssessmentScopes() {
		$scopes = array(
		self::$get_assessment_attributes_describe,
		self::$get_assessment_observation_describe,
		self::$get_assessment,
		self::$search_assessments,
		self::$get_assessment_attributes_detail,
		self::$create_assessment,
		self::$create_assessment_document,
		self::$create_assessment_attributes,
		self::$create_assessment_observations,
		self::$update_assessment,
		self::$update_assessment_attributes,
		self::$update_assessment_observations,
		self::$get_assessment_observation_details);
		return implode("%20", $scopes);	
	}
}