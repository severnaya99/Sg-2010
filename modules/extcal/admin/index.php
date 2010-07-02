<?php

include '../../../include/cp_header.php';
include '../../../class/xoopsformloader.php';
include 'function.php';

function extgalleryLastVersion() {
	return @file_get_contents("http://www.zoullou.net/extcal.version");
}

function isUpToDate() {
	$version = extgalleryLastVersion();
	return $GLOBALS['xoopsModule']->getVar('version') >= $version;
}

xoops_cp_header();
adminMenu(1);

$catHandler = xoops_getmodulehandler('cat', 'extcal');
$eventHandler = xoops_getmodulehandler('event', 'extcal');

echo '<fieldset><legend style="font-weight:bold; color:#990000;">'._AM_EXTCAL_MODULE_ADMIN_SUMMARY.'</legend>';
echo '<fieldset><legend style="font-weight:bold; color:#0A3760;">'._AM_EXTCAL_UPDATE_INFO.'</legend>';
if(!extgalleryLastVersion()) {
	echo "<span style=\"color:black; font-weight:bold;\">"._AM_EXTCAL_CHECK_UPDATE_ERROR."</span>";
} else if(!isUpToDate()) {
	echo "<h3 style=\"color:red;\">"._AM_EXTCAL_UPDATE_KO."</h3>";
} else {
	echo "<span style=\"color:green;\">"._AM_EXTCAL_UPDATE_OK."</span>";
}
echo '</fieldset>';
echo '<br />';
echo '<a href="cat.php">'._AM_EXTCAL_CATEGORY.'</a> : <b>'.$catHandler->getCount().'</b> | ';
echo '<a href="event.php">'._AM_EXTCAL_EVENT.'</a> : <b>'.$eventHandler->getCount(new Criteria('event_approved', 1)).'</b> | ';
echo _AM_EXTCAL_PENDING.' : <b>'.$eventHandler->getCount(new Criteria('event_approved', 0)).'</b> | ';
$criteriaCompo = new CriteriaCompo();
$criteriaCompo->add(new Criteria('event_approved', 1));
$criteriaCompo->add(new Criteria('event_start', time(), '>='));
echo _AM_EXTCAL_APPROVED.' : <b>'.$eventHandler->getCount($criteriaCompo).'</b>';
echo '</fieldset><br />';

$pendingEvent = $eventHandler->objectToArray($eventHandler->getPendingEvent(), array('cat_id'));
$eventHandler->formatEventsDate($pendingEvent, 'd/m/Y');

echo '<fieldset><legend style="font-weight:bold; color:#990000;">'._AM_EXTCAL_PENDING_EVENT.'</legend>';
echo '<fieldset><legend style="font-weight:bold; color:#0A3760;">'._AM_EXTCAL_INFORMATION.'</legend>';
echo '<img src="../images/approve.gif" style="vertical-align:middle;" />&nbsp;&nbsp;'._AM_EXTCAL_INFO_APPROVE_PENDING_EVENT.'<br />';
echo '<img src="../images/edit.gif" style="vertical-align:middle;" />&nbsp;&nbsp;'._AM_EXTCAL_INFO_EDIT_PENDING_EVENT.'<br />';
echo '<img src="../images/delete.gif" style="vertical-align:middle;" />&nbsp;&nbsp;'._AM_EXTCAL_INFO_DELETE_PENDING_EVENT;
echo '</fieldset><br />';

echo '<table class="outer" style="width:100%;">';
echo '<tr style="text-align:center;">';
echo '<th>'._AM_EXTCAL_CATEGORY.'</th>';
echo '<th>'._AM_EXTCAL_TITLE.'</th>';
echo '<th>'._AM_EXTCAL_START_DATE.'</th>';
echo '<th>'._AM_EXTCAL_ACTION.'</th>';
echo '</tr>';

if(count($pendingEvent) > 0) {
	$i=0;
	foreach($pendingEvent as $event) {
		$class = ($i++%2 == 0) ? 'even' : 'odd';
		echo '<tr style="text-align:center;" class="'.$class.'">';
		echo '<td>'.$event['cat']['cat_name'].'</td>';
		echo '<td>'.$event['event_title'].'</td>';
		echo '<td>'.$event['formated_event_start'].'</td>';
		echo '<td style="width:10%; text-align:center;">';
		echo '<a href="event.php?op=modify&amp;event_id='.$event['event_id'].'"><img src="../images/edit.gif" /></a>&nbsp;&nbsp;';
		echo '<a href="event.php?op=delete&amp;event_id='.$event['event_id'].'"><img src="../images/delete.gif" /></a>';
		echo '</td>';
		echo '</tr>';
	}
} else {
	echo '<tr><td colspan="4">'._AM_NO_PENDING_EVENT.'</td></tr>';
}

echo '</table></fieldset><br />';

xoops_cp_footer();

?>
