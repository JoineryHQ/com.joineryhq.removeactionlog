<?php

/**
 * Job.Removeactionlog API specification (optional)
 * This is used for documentation and validation.
 *
 * @param array $spec description of fields supported by this API call
 * @return void
 * @see http://wiki.civicrm.org/confluence/display/CRMDOC/API+Architecture+Standards
 */
function _civicrm_api3_job_Removeactionlog_spec(&$spec) {
}

/**
 * Job.Removeactionlog API
 *
 * @param array $params
 * @return array API result descriptor
 * @see civicrm_api3_create_success
 * @see civicrm_api3_create_error
 * @throws API_Exception
 */
function civicrm_api3_job_Removeactionlog($params) {
  // Initialize the ActionLog table
  $action_log = new CRM_Core_DAO_ActionLog();
  // Only delete entries more than a month older than the current day
  $action_log->whereAdd('action_date_time < DATE(DATE_ADD(NOW(), INTERVAL -1 MONTH))');
  // Only delete rows that are from the Membership table
  $action_log->whereAdd("entity_table = '" . CRM_Member_DAO_Membership::getTableName() . "'");

  // Execute the DELETE query using "where" conditions.
  $action_log->delete(true);

  // Always assume success.
  return civicrm_api3_create_success($returnValues, $params, 'Job', 'Removeactionlog');
}
