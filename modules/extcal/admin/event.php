<?php

include '../../../include/cp_header.php';
include '../../../class/xoopsformloader.php';
include '../../../class/pagenav.php';
include '../class/form/extcalform.php';
include 'function.php';

if(isset($_GET['op'])) {
	$op = $_GET['op'];
} else {
	$op = 'default';
}
$fct = isset($_POST['fct']) ? $_POST['fct'] : '';

if(isset($_GET['start'])) {
	$start = $_GET['start'];
} else {
	$start = 0;
}

switch($op) {

	case 'enreg':

		$eventHandler = xoops_getmodulehandler('event', 'extcal');

		// If the date format is wrong
		if(!preg_match('`[0-9]{4}-[01][0-9]-[0123][0-9]`', $_POST['event_start']['date']) ||
			!preg_match('`[0-9]{4}-[01][0-9]-[0123][0-9]`', $_POST['event_end']['date'])) {
			redirect_header('event.php', 3, _MD_EXTCAL_WRONG_DATE_FORMAT."<br />".implode('<br />', $GLOBALS['xoopsSecurity']->getErrors()));
			exit;
		}

		$data = array(
			'event_title'=>$_POST['event_title'],
			'cat_id'=>$_POST['cat_id'],
			'event_desc'=>$_POST['event_desc'],
			'event_nbmember'=>$_POST['event_nbmember'],
			'event_contact'=>$_POST['event_contact'],
			'event_url'=>$_POST['event_url'],
			'event_email'=>$_POST['event_email'],
			'event_address'=>$_POST['event_address'],
			'event_approved'=>1,
			'event_start'=>$_POST['event_start'],
			'have_end'=>$_POST['have_end'],
			'event_end'=>$_POST['event_end'],
			'dohtml'=>0
		);

		// Event edited
		if(isset($_POST['event_id'])) {

			$eventHandler->modifyEvent($_POST['event_id'], $data);
			redirect_header("event.php", 3, _AM_EXTCAL_EVENT_EDITED, false);

		// New event
		} else {
			$notification_handler =& xoops_gethandler('notification');
			$catHandler = xoops_getmodulehandler('cat', 'extcal');

			$data['event_submitter'] = ($xoopsUser) ? $xoopsUser->getVar('uid') : 0;
			$data['event_submitdate'] = time();

			$eventHandler->createEvent($data, $_POST);
			$cat = $catHandler->getCat($_POST['cat_id'], $xoopsUser, 'all');
			$notification_handler->triggerEvent('global', 0, 'new_event', array('EVENT_TITLE'=>$_POST['event_title']));
			$notification_handler->triggerEvent('cat', $_POST['cat_id'], 'new_event_cat', array('EVENT_TITLE'=>$_POST['event_title'], 'CAT_NAME'=>$cat->getVar('cat_name')));
			redirect_header("event.php", 3, _AM_EXTCAL_EVENT_CREATED, false);
		}

		break;

	case 'modify':

		xoops_cp_header();
		adminMenu(3);

		$eventId = $_GET['event_id'];
		$eventHandler = xoops_getmodulehandler('event', 'extcal');

		echo '<fieldset><legend style="font-weight:bold; color:#990000;">'._MD_EXTCAL_EDIT_EVENT.'</legend>';

		if($form = $eventHandler->getEventForm('admin', 'edit', array('event_id'=>$eventId)))
			$form->display();

		echo '</fieldset><br />';

		xoops_cp_footer();

		break;

	case 'delete':

		if(isset($_POST['confirm'])) {
			if (!$GLOBALS['xoopsSecurity']->check()) {
				redirect_header('index.php', 3, _NOPERM."<br />".implode('<br />', $GLOBALS['xoopsSecurity']->getErrors()));
				exit;
			}
			$eventHandler = xoops_getmodulehandler('event', 'extcal');
			$eventHandler->deleteEvent($_POST['event_id']);
			redirect_header("event.php", 3, _AM_EXTCAL_EVENT_DELETED, false);
		} else {
			xoops_cp_header();
			adminMenu(3);

			$hiddens = array('event_id'=>$_GET['event_id'], 'form_delete'=>'', 'confirm'=>1);
			xoops_confirm($hiddens, 'event.php?op=delete', _AM_EXTCAL_CONFIRM_DELETE_EVENT, _DELETE, 'event.php');

			xoops_cp_footer();
		}

		break;

	case 'default':
	default:

		xoops_cp_header();
		adminMenu(3);

		$eventHandler = xoops_getmodulehandler('event', 'extcal');
		$events = $eventHandler->objectToArray($eventHandler->getNewEvent(10, 0, true), array('cat_id'));
		$eventHandler->formatEventsDate($events, 'd/m/Y');

		echo '<fieldset><legend style="font-weight:bold; color:#990000;">'._AM_EXTCAL_APPROVED_EVENT.'</legend>';
		echo '<fieldset><legend style="font-weight:bold; color:#0A3760;">'._AM_EXTCAL_INFORMATION.'</legend>';
		echo '<img src="../images/edit.gif" style="vertical-align:middle;" />&nbsp;&nbsp;'._AM_EXTCAL_INFO_EDIT.'<br />';
		echo '<img src="../images/delete.gif" style="vertical-align:middle;" />&nbsp;&nbsp;'._AM_EXTCAL_INFO_DELETE;
		echo '</fieldset><br />';

		echo '<fieldset><legend style="font-weight:bold; color:#0A3760;">'._MD_EXTCAL_SUBMITED_EVENT.'</legend>';

		echo '<table class="outer" style="width:100%;">';
		echo '<tr style="text-align:center;">';
		echo '<th>#</th>';
		echo '<th>'._AM_EXTCAL_CATEGORY.'</th>';
		echo '<th>'._AM_EXTCAL_TITLE.'</th>';
		echo '<th>'._AM_EXTCAL_START_DATE.'</th>';
		echo '<th>'._AM_EXTCAL_ACTION.'</th>';
		echo '</tr>';

		if(count($events) > 0) {
			$i=0;
			foreach($events as $event) {
				$class = ($i++%2 == 0) ? 'even' : 'odd';
				echo '<tr style="text-align:center;" class="'.$class.'">';
				echo '<td>'.$event['event_id'].'</td>';
				echo '<td>'.$event['cat']['cat_name'].'</td>';
				echo '<td>'.$event['event_title'].'</td>';
				if($event['event_isrecur']) {
					echo '<td>'.$event['formated_reccur_rule'].'</td>';
				} else {
					echo '<td>'.$event['formated_event_start'].'</td>';
				}
				echo '<td style="width:10%; text-align:center;">';
				echo '<a href="event.php?op=modify&amp;event_id='.$event['event_id'].'"><img src="../images/edit.gif" /></a>&nbsp;&nbsp;';
				echo '<a href="event.php?op=delete&amp;event_id='.$event['event_id'].'"><img src="../images/delete.gif" /></a>';
				echo '</td>';
				echo '</tr>';
			}
		} else {
			echo '<tr><td colspan="4">'._AM_NO_PENDING_EVENT.'</td></tr>';
		}
		echo '</table>';

		echo '</fieldset>';
		echo '</fieldset><br /><br />';

		echo '<fieldset><legend style="font-weight:bold; color:#990000;">'._MD_EXTCAL_SUBMIT_EVENT.'</legend>';

		$form = $eventHandler->getEventForm('admin');
		$form->display();

		echo '</fieldset>';

		xoops_cp_footer();

		break;
}

?>
