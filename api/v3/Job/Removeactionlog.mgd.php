<?php
// This file declares a managed database record of type "Job".
// The record will be automatically inserted, updated, or deleted from the
// database as appropriate. For more details, see "hook_civicrm_managed" at:
// http://wiki.civicrm.org/confluence/display/CRMDOC42/Hook+Reference
return array (
  0 => 
  array (
    'name' => 'Cron:Job.Removeactionlog',
    'entity' => 'Job',
    'params' => 
    array (
      'version' => 3,
      'name' => 'Clean Scheduled Reminders log',
      'description' => 'Remove excess civicrm_membership entries from the action log to allow membership reminders to be sent correctly',
      'run_frequency' => 'Daily',
      'api_entity' => 'Job',
      'api_action' => 'Removeactionlog',
      'parameters' => '',
    ),
  ),
);