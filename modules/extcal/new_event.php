<?php

include '../../mainfile.php';

include XOOPS_ROOT_PATH.'/class/xoopsformloader.php';
include 'class/form/extcalform.php';

// Getting eXtCal object's handler
$eventHandler = xoops_getmodulehandler('event', 'extcal');

include XOOPS_ROOT_PATH.'/header.php';

// Title of the page
$xoopsTpl->assign('xoops_pagetitle', _MI_EXTCAL_SUBMIT_EVENT);

// Display the submit form
$form = $eventHandler->getEventForm();
$form->display();

include XOOPS_ROOT_PATH.'/footer.php';

?>
