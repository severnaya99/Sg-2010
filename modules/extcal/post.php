<?php

include '../../mainfile.php';
$GLOBALS['xoopsOption']['template_main'] = 'extcal_post.html';

include XOOPS_ROOT_PATH.'/class/xoopsformloader.php';
include 'class/form/extcalform.php';

// Getting eXtCal object's handler
$eventHandler = xoops_getmodulehandler('event', 'extcal');

if(isset($_POST['form_preview'])) {

	include XOOPS_ROOT_PATH.'/header.php';

	// Title of the page
	$xoopsTpl->assign('xoops_pagetitle', _MI_EXTCAL_SUBMIT_EVENT);

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

	if(isset($_POST['event_id'])) {
		$data['event_id'] = $_POST['event_id'];
	}

	// Creating tempory event object to apply Object data filtering
	$event = $eventHandler->createEventForPreview($data);
	$event = $eventHandler->objectToArray($event, array('cat_id'), 'p');

	// Adding formated date for start and end event
	$eventHandler->formatEventDate($event, $xoopsModuleConfig['event_date_event']);

	// Assigning event to the template
	$xoopsTpl->assign('event', $event);

	$lang = array(
		'start'=>_MD_EXTCAL_START,
		'end'=>_MD_EXTCAL_END,
		'contact_info'=>_MD_EXTCAL_CONTACT_INFO,
		'email'=>_MD_EXTCAL_EMAIL,
		'url'=>_MD_EXTCAL_URL,
		'whos_going'=>_MD_EXTCAL_WHOS_GOING,
		'whosnot_going'=>_MD_EXTCAL_WHOSNOT_GOING
	);
	// Assigning language data to the template
	$xoopsTpl->assign('lang', $lang);

	$event['cat_id'] = $_POST['cat_id'];
	$event['have_end'] = $_POST['have_end'];

	// Display the submit form
	$form = $eventHandler->getEventForm('user', 'preview', $event);
	$formBody = $form->render();
	$xoopsTpl->assign('preview', true);
	$xoopsTpl->assign('formBody', $formBody);

	include XOOPS_ROOT_PATH.'/footer.php';

} elseif(isset($_POST['form_submit'])) {

	// If the date format is wrong
	if(!preg_match('`[0-9]{4}-[01][0-9]-[0123][0-9]`', $_POST['event_start']['date']) ||
		!preg_match('`[0-9]{4}-[01][0-9]-[0123][0-9]`', $_POST['event_end']['date'])) {
		redirect_header('event.php', 3, _MD_EXTCAL_WRONG_DATE_FORMAT."<br />".implode('<br />', $GLOBALS['xoopsSecurity']->getErrors()));
		exit;
	}

	include_once XOOPS_ROOT_PATH.'/modules/extcal/class/perm.php';

	$fileHandler = xoops_getmodulehandler('file', 'extcal');
	$permHandler = ExtcalPerm::getHandler();

	$data = array(
		'event_title'=>$_POST['event_title'],
		'cat_id'=>$_POST['cat_id'],
		'event_desc'=>$_POST['event_desc'],
		'event_nbmember'=>$_POST['event_nbmember'],
		'event_contact'=>$_POST['event_contact'],
		'event_url'=>$_POST['event_url'],
		'event_email'=>$_POST['event_email'],
		'event_address'=>$_POST['event_address'],
		'event_approved'=>$permHandler->isAllowed($xoopsUser, 'extcal_cat_autoapprove', $_POST['cat_id']),
		'event_start'=>$_POST['event_start'],
		'have_end'=>$_POST['have_end'],
		'event_end'=>$_POST['event_end'],
		'dohtml'=>0
	);

	if(isset($_POST['event_id'])) {

		$eventHandler->modifyEvent($_POST['event_id'], $data);
		$fileHandler->updateEventFile($_POST['event_id']);
		$fileHandler->createFile($_POST['event_id']);

	} else {

		$data['event_submitter'] = ($xoopsUser) ? $xoopsUser->getVar('uid') : 0;
		$data['event_submitdate'] = time();

		$eventHandler->createEvent($data);
		$fileHandler->createFile($eventHandler->getInsertId());

	}

	redirect_header("index.php", 3, _MD_EXTCAL_EVENT_CREATED, false);

}

?>