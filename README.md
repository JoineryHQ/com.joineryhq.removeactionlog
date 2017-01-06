CiviCRM extension to clear the civicrm_action_log table to workaround CiviCRM Scheduled Reminders being sent only once. See Agileware Issue 21275 for more details.

The CiviCRM ActionSchedule interface (Schedule Reminders) checks on an hourly basis for membership events that have happened in the last day +/- an offset interval in months or weeks.
When building the list of contacts to send a reminder to, it inserts a row into the civicrm_action_log table that is then used to filter out memberships that have already have a reminder sent.

There is an issue where this does not reliably send renewal reminders in subsequent years due to the latter condition.

The extension needs to create a daily scheduled job to clear rows from the civicrm_action_log table where the entity_table is civicrm_membership and the action_date_time is too old (at least > 1 day or some reminders will be sent multiple times).

The canonical approach is to add an API call to do the processing and create the scheduled job as a managed entity (see civix tool options / command line documentation).
