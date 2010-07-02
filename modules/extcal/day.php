<?php

$year = isset($_GET['year']) ? $_GET['year'] : date('Y');
$month = isset($_GET['month']) ? $_GET['month'] : date('n');
$day = isset($_GET['day']) ? $_GET['day'] : date('j');
$cat = isset($_GET['cat']) ? $_GET['cat'] : 0;

include '../../mainfile.php';
$GLOBALS['xoopsOption']['template_main'] = 'extcal_day.html';
include XOOPS_ROOT_PATH.'/header.php';

if(!defined('CALENDAR_ROOT')) {
	define('CALENDAR_ROOT', XOOPS_ROOT_PATH.'/modules/extcal/class/pear/Calendar/');
}

include XOOPS_ROOT_PATH.'/class/xoopsformloader.php';
require_once CALENDAR_ROOT.'Day.php';

// Getting eXtCal object's handler
$catHandler = xoops_getmodulehandler('cat', 'extcal');
$eventHandler = xoops_getmodulehandler('event', 'extcal');
$extcalTimeHandler = ExtcalTime::getHandler();

// Title of the page
$xoopsTpl->assign('xoops_pagetitle', $day.' - '.$month.' - '.$year);

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
$yearSelect = new XoopsFormSelect('', 'year', $year);
for($i=2004;$i<2015;$i++) {
	$yearSelect->addOption($i);
}

// Month selectbox
$monthSelect = new XoopsFormSelect('', 'month', $month);
for($i=1;$i<13;$i++) {
	$monthSelect->addOption($i, $extcalTimeHandler->getMonthName($i));
}

// Day selectbox
$daySelect = new XoopsFormSelect('', 'day', $day);
for($i=1;$i<32;$i++) {
	$daySelect->addOption($i);
}

// Category selectbox
$catsList = $catHandler->getAllCat($xoopsUser);
$catSelect = new XoopsFormSelect('', 'cat', $cat);
$catSelect->addOption(0, ' ');
foreach($catsList as $catList) {
	$catSelect->addOption($catList->getVar('cat_id'), $catList->getVar('cat_name'));
}

$form = new XoopsSimpleForm('', 'navigSelectBox', 'day.php', 'get');
$form->addElement($yearSelect);
$form->addElement($monthSelect);
$form->addElement($daySelect);
$form->addElement($catSelect);
$form->addElement(new XoopsFormButton("", "", _SEND, "submit"));

// Assigning the form to the template
$form->assign($xoopsTpl);

// Retriving events
$events = $eventHandler->objectToArray($eventHandler->getEventDay($day, $month, $year, $cat), array('cat_id'));

// Treatment for recurring event
$startDay = mktime(0,0,0,$month,$day,$year);
$endDay = $startDay + 86400;
$eventsArray = array();
foreach($events as $event) {

	if(!$event['event_isrecur']) {
		
		$eventsArray[] = $event;
		
	} else {
		
		$recurEvents = $eventHandler->getRecurEventToDisplay($event, $startDay, $endDay);
		
		foreach($recurEvents as $recurEvent) {
			$eventsArray[] = $recurEvent;
		}
		
	}
	
}

// Formating date
$eventHandler->formatEventsDate($eventsArray, $xoopsModuleConfig['event_date_day']);

// Assigning events to the template
$xoopsTpl->assign('events', $eventsArray);

// Retriving categories
$cats = $catHandler->objectToArray($catHandler->getAllCat($xoopsUser));
// Assigning categories to the template
$xoopsTpl->assign('cats', $cats);

// Making navig data
$dayCalObj = new Calendar_Day($year, $month, $day);
$pDayCalObj = $dayCalObj->prevDay('object');
$nDayCalObj = $dayCalObj->nextDay('object');

$navig = array(
			'prev'=>array(
						'uri'=>'year='.$pDayCalObj->thisYear().'&amp;month='.$pDayCalObj->thisMonth().'&amp;day='.$pDayCalObj->thisDay(),
						'name'=>$extcalTimeHandler->getFormatedDate($xoopsModuleConfig['nav_date_day'], $pDayCalObj->getTimestamp())
			),
			'this'=>array(
						'uri'=>'year='.$dayCalObj->thisYear().'&amp;month='.$dayCalObj->thisMonth().'&amp;day='.$dayCalObj->thisDay(),
						'name'=>$extcalTimeHandler->getFormatedDate($xoopsModuleConfig['nav_date_day'], $dayCalObj->getTimestamp())
			),
			'next'=>array(
						'uri'=>'year='.$nDayCalObj->thisYear().'&amp;month='.$nDayCalObj->thisMonth().'&amp;day='.$nDayCalObj->thisDay(),
						'name'=>$extcalTimeHandler->getFormatedDate($xoopsModuleConfig['nav_date_day'], $nDayCalObj->getTimestamp())
			)
);

// Assigning navig data to the template
$xoopsTpl->assign('navig', $navig);

// Assigning current form navig data to the template
$xoopsTpl->assign('selectedCat', $cat);
$xoopsTpl->assign('year', $year);
$xoopsTpl->assign('month', $month);
$xoopsTpl->assign('day', $day);
$xoopsTpl->assign('view', "day");

include XOOPS_ROOT_PATH.'/footer.php';

?>
