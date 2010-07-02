<?php

$year = isset($_GET['year']) ? $_GET['year'] : date('Y');
$cat = isset($_GET['cat']) ? $_GET['cat'] : 0;

include '../../mainfile.php';
$GLOBALS['xoopsOption']['template_main'] = 'extcal_year.html';
include XOOPS_ROOT_PATH.'/header.php';

include XOOPS_ROOT_PATH.'/class/xoopsformloader.php';

// Getting eXtCal object's handler
$catHandler = xoops_getmodulehandler('cat', 'extcal');
$eventHandler = xoops_getmodulehandler('event', 'extcal');

// Title of the page
$xoopsTpl->assign('xoops_pagetitle', $year);

$lang = array(
	'calmonth'=>_MD_EXTCAL_NAV_CALMONTH,
	'calweek'=>_MD_EXTCAL_NAV_CALWEEK,
	'year'=>_MD_EXTCAL_NAV_YEAR,
	'month'=>_MD_EXTCAL_NAV_MONTH,
	'week'=>_MD_EXTCAL_NAV_WEEK,
	'day'=>_MD_EXTCAL_NAV_DAY
);
// Assigning language data to the template
$xoopsTpl->assign('lang', $lang);

// ### Create the navigation form ###

// Year selectbox
$yearSelect = new XoopsFormSelect('', 'navigSelectBox', $year);
for($i=2004;$i<2015;$i++) {
	$yearSelect->addOption($i);
}

// Category selectbox
$catsList = $catHandler->getAllCat($xoopsUser);
$catSelect = new XoopsFormSelect('', 'cat', $cat);
$catSelect->addOption(0, ' ');
foreach($catsList as $catList) {
	$catSelect->addOption($catList->getVar('cat_id'), $catList->getVar('cat_name'));
}

$form = new XoopsSimpleForm('', 'navigSelectBox', 'year.php', 'get');
$form->addElement($yearSelect);
$form->addElement($catSelect);
$form->addElement(new XoopsFormButton("", "form_submit", _SEND, "submit"));

// Assigning the form to the template
$form->assign($xoopsTpl);

// Retriving events
$events = $eventHandler->objectToArray($eventHandler->getEventYear($year, $cat), array('cat_id'));

// Treatment for recurring event
$startYear = mktime(0,0,0,1,1,$year);
$endYear = mktime(23,59,59,12,31,$year);
$eventsArray = array();
foreach($events as $event) {

	if(!$event['event_isrecur']) {

		$eventsArray[] = $event;

	} else {

		$recurEvents = $eventHandler->getRecurEventToDisplay($event, $startYear, $endYear);

		foreach($recurEvents as $recurEvent) {
			$eventsArray[] = $recurEvent;
		}

	}

}

// Formating date
$eventHandler->formatEventsDate($eventsArray, $xoopsModuleConfig['event_date_year']);

// Assigning events to the template
$xoopsTpl->assign('events', $eventsArray);

// Retriving categories
$cats = $catHandler->objectToArray($catHandler->getAllCat($xoopsUser));

// Assigning categories to the template
$xoopsTpl->assign('cats', $cats);

$prevYear = $year-1;
$nexYear = $year+1;
// Making navig data
$navig = array(
			'prev'=>array(
						'uri'=>'year='.$prevYear,
						'name'=>$prevYear
			),
			'this'=>array(
						'uri'=>'year='.$year,
						'name'=>$year
			),
			'next'=>array(
						'uri'=>'year='.$nexYear,
						'name'=>$nexYear
			)
);

// Assigning navig data to the template
$xoopsTpl->assign('navig', $navig);

// Assigning current form navig data to the template
$xoopsTpl->assign('selectedCat', $cat);
$xoopsTpl->assign('year', $year);
$xoopsTpl->assign('view', "year");

include XOOPS_ROOT_PATH.'/footer.php';

?>
