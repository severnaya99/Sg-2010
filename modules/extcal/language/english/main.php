<?php

include_once XOOPS_ROOT_PATH."/language/".$GLOBALS['xoopsConfig']['language']."/calendar.php";

define('_MD_EXTCAL_NAV_CALMONTH', 'Calendar month');
define('_MD_EXTCAL_NAV_CALWEEK', 'Calendar week');
define('_MD_EXTCAL_NAV_YEAR', 'Year');
define('_MD_EXTCAL_NAV_MONTH', 'Month');
define('_MD_EXTCAL_NAV_WEEK', 'Week');
define('_MD_EXTCAL_NAV_DAY', 'Day');

define("_MD_EXTCAL_START","Start");
define("_MD_EXTCAL_END","End");
define('_MD_EXTCAL_RECCUR_RULE', 'Reccuring rule');
define("_MD_EXTCAL_CONTACT_INFO","Contact info");
define("_MD_EXTCAL_EMAIL","Email");
define("_MD_EXTCAL_URL","URL");
define("_MD_EXTCAL_WHOS_GOING","Who's Going ?");
define("_MD_EXTCAL_WHOSNOT_GOING","Who's not Going ?");
define("_MD_EXTCAL_ADD_ME","Add Me");
define("_MD_EXTCAL_REMOVE_ME","Remove Me");

define('_MD_EXTCAL_SUBMITED_EVENT', 'Submitted event');
define('_MD_EXTCAL_SUBMIT_EVENT', 'Submit event');
define('_MD_EXTCAL_EDIT_EVENT', 'Edit event');
define('_MD_EXTCAL_TITLE', 'Title');
define('_MD_EXTCAL_CATEGORY', 'Category');
define('_MD_EXTCAL_DESCRIPTION', 'Description');
define('_MD_EXTCAL_NBMEMBER', 'Member limit');
define('_MD_EXTCAL_NBMEMBER_DESC', '0 = no limit');
define('_MD_EXTCAL_CONTACT', 'Contact');
define('_MD_EXTCAL_ADDRESS', 'Address');
define('_MD_EXTCAL_START_DATE', 'Start date');
define('_MD_EXTCAL_END_DATE', 'End date');
define('_MD_EXTCAL_EVENT_END', 'Have end ?');
define('_MD_EXTCAL_FILE_ATTACHEMENT', 'Attach a file');
define('_MD_EXTCAL_PREVIEW', 'Preview');
define('_MD_EXTCAL_EVENT_CREATED', 'Event Created');
define('_MD_EXTCAL_MAX_MEMBER_REACHED', 'Maximum membre for this event reached');
define('_MD_EXTCAL_WHOS_GOING_ADDED_TO_EVENT', 'Added to who\'s going list');
define('_MD_EXTCAL_WHOS_GOING_REMOVED_TO_EVENT', 'Removed from who\'s going list');
define('_MD_EXTCAL_WHOSNOT_GOING_ADDED_TO_EVENT', 'Added to who\'s not going list');
define('_MD_EXTCAL_WHOSNOT_GOING_REMOVED_TO_EVENT', 'Removed from who\'s not going list');

define('_MD_EXTCAL_NO_RECCUR_EVENT', 'Not reccuring event');
define('_MD_EXTCAL_RECCUR_POLICY', 'Reccurence policy');
define('_MD_EXTCAL_DAILY', 'Daily');
define('_MD_EXTCAL_WEEKLY', 'Weekly');
define('_MD_EXTCAL_MONTHLY', 'Monthly');
define('_MD_EXTCAL_YEARLY', 'Yearly');
define('_MD_EXTCAL_DURING', 'During');
define('_MD_EXTCAL_DAYS', 'day(s)');
define('_MD_EXTCAL_WEEKS', 'week(s)');
define('_MD_EXTCAL_MONTH', 'month');
define('_MD_EXTCAL_ON', 'on');
define('_MD_EXTCAL_OR_THE', 'or the');
define('_MD_EXTCAL_DAY_NUM_MONTH', '(Day number on month)');
define('_MD_EXTCAL_YEARS', 'year(s)');
define('_MD_EXTCAL_SAME_ST_DATE', 'Same as event start date');

define('_MD_EXTCAL_1_MO', '1st '._CAL_MONDAY);
define('_MD_EXTCAL_1_TU', '1st '._CAL_TUESDAY);
define('_MD_EXTCAL_1_WE', '1st '._CAL_WEDNESDAY);
define('_MD_EXTCAL_1_TH', '1st '._CAL_THURSDAY);
define('_MD_EXTCAL_1_FR', '1st '._CAL_FRIDAY);
define('_MD_EXTCAL_1_SA', '1st '._CAL_SATURDAY);
define('_MD_EXTCAL_1_SU', '1st '._CAL_SUNDAY);
define('_MD_EXTCAL_2_MO', '2nd '._CAL_MONDAY);
define('_MD_EXTCAL_2_TU', '2nd '._CAL_TUESDAY);
define('_MD_EXTCAL_2_WE', '2nd '._CAL_WEDNESDAY);
define('_MD_EXTCAL_2_TH', '2nd '._CAL_THURSDAY);
define('_MD_EXTCAL_2_FR', '2nd '._CAL_FRIDAY);
define('_MD_EXTCAL_2_SA', '2nd '._CAL_SATURDAY);
define('_MD_EXTCAL_2_SU', '2nd '._CAL_SUNDAY);
define('_MD_EXTCAL_3_MO', '3rd '._CAL_MONDAY);
define('_MD_EXTCAL_3_TU', '3rd '._CAL_TUESDAY);
define('_MD_EXTCAL_3_WE', '3rd '._CAL_WEDNESDAY);
define('_MD_EXTCAL_3_TH', '3rd '._CAL_THURSDAY);
define('_MD_EXTCAL_3_FR', '3rd '._CAL_FRIDAY);
define('_MD_EXTCAL_3_SA', '3rd '._CAL_SATURDAY);
define('_MD_EXTCAL_3_SU', '3rd '._CAL_SUNDAY);
define('_MD_EXTCAL_4_MO', '4th '._CAL_MONDAY);
define('_MD_EXTCAL_4_TU', '4th '._CAL_TUESDAY);
define('_MD_EXTCAL_4_WE', '4th '._CAL_WEDNESDAY);
define('_MD_EXTCAL_4_TH', '4th '._CAL_THURSDAY);
define('_MD_EXTCAL_4_FR', '4th '._CAL_FRIDAY);
define('_MD_EXTCAL_4_SA', '4th '._CAL_SATURDAY);
define('_MD_EXTCAL_4_SU', '4th '._CAL_SUNDAY);
define('_MD_EXTCAL_LAST_MO', 'Last '._CAL_MONDAY);
define('_MD_EXTCAL_LAST_TU', 'Last '._CAL_TUESDAY);
define('_MD_EXTCAL_LAST_WE', 'Last '._CAL_WEDNESDAY);
define('_MD_EXTCAL_LAST_TH', 'Last '._CAL_THURSDAY);
define('_MD_EXTCAL_LAST_FR', 'Last '._CAL_FRIDAY);
define('_MD_EXTCAL_LAST_SA', 'Last '._CAL_SATURDAY);
define('_MD_EXTCAL_LAST_SU', 'Last '._CAL_SUNDAY);

?>