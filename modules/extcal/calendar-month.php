<?php

$year = isset($_GET['year']) ? $_GET['year'] : date('Y');
$month = isset($_GET['month']) ? $_GET['month'] : date('n');
$cat = isset($_GET['cat']) ? $_GET['cat'] : 0;

include '../../mainfile.php';
$GLOBALS['xoopsOption']['template_main'] = 'extcal_calendar-month.html';
include XOOPS_ROOT_PATH.'/header.php';

if(!defined('CALENDAR_ROOT')) {
	define('CALENDAR_ROOT', XOOPS_ROOT_PATH.'/modules/extcal/class/pear/Calendar/');
}

include XOOPS_ROOT_PATH.'/class/xoopsformloader.php';
require_once CALENDAR_ROOT.'Util/Textual.php';
require_once CALENDAR_ROOT.'Month/Weeks.php';
require_once CALENDAR_ROOT.'Day.php';

// Getting eXtCal object's handler
$catHandler = xoops_getmodulehandler('cat', 'extcal');
$eventHandler = xoops_getmodulehandler('event', 'extcal');
$extcalTimeHandler = ExtcalTime::getHandler();

// Title of the page
$xoopsTpl->assign('xoops_pagetitle', $month.' - '.$year);

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

// Category selectbox
$catsList = $catHandler->getAllCat($xoopsUser);
$catSelect = new XoopsFormSelect('', 'cat', $cat);
$catSelect->addOption(0, ' ');
foreach($catsList as $catList) {
	$catSelect->addOption($catList->getVar('cat_id'), $catList->getVar('cat_name'));
}

$form = new XoopsSimpleForm('', 'navigSelectBox', 'calendar-month.php', 'get');
$form->addElement($yearSelect);
$form->addElement($monthSelect);
$form->addElement($catSelect);
$form->addElement(new XoopsFormButton("", "form_submit", _SEND, "submit"));

// Assigning the form to the template
$form->assign($xoopsTpl);

// Retriving events and formatting them
$events = $eventHandler->objectToArray($eventHandler->getEventCalendarMonth($month, $year, $cat), array('cat_id'));
$eventHandler->formatEventsDate($events, "l dS \of F Y h:i:s A");

// Calculating timestamp for the begin and the end of the month
$startMonth = mktime(0,0,0,$month,1,$year);
$endMonth = mktime(23,59,59,$month+1,0,$year);

// This function is used to add event to an array indexed by day num in month
function addEventToArray(&$event, &$eventsArray) {

	global $extcalTimeHandler, $startMonth, $endMonth, $xoopsUser, $month, $year;
//print_r($GLOBALS);
	// Calculating the start and the end of the event
	$startEvent = xoops_getUserTimestamp($event['event_start'], $extcalTimeHandler->_getUserTimeZone($xoopsUser));
	$endEvent = xoops_getUserTimestamp($event['event_end'], $extcalTimeHandler->_getUserTimeZone($xoopsUser));

	// This event start before this month and finish after
	if($startEvent < $startMonth && $endEvent > $endMonth) {
		$endFor = date('t',mktime(0,0,0,$month,1,$year));
		for($i=1;$i<=$endFor;$i++) {
			$event['status'] = 'middle';
			$eventsArray[$i][] = $event;
		}
	// This event start before this month and finish during
	} else if($startEvent < $startMonth) {
		$endFor = date('j', $endEvent);
		for($i=1;$i<=$endFor;$i++) {
			$event['status'] = ($i!=$endFor) ? 'middle' : 'end';
			$eventsArray[$i][] = $event;
		}
	// This event start during this month and finish after
	} else if($endEvent > $endMonth) {
		$startFor = date('j', $startEvent);
		$endFor = date('t',mktime(0,0,0,$month,1,$year));
		for($i=$startFor;$i<=$endFor;$i++) {
			$event['status'] = ($i==$startFor) ? 'start' : 'middle';
			$eventsArray[$i][] = $event;
		}
	// This event start and finish during this month
	} else {
		$startFor = date('j', $startEvent);
		$endFor = date('j', $endEvent);
		for($i=$startFor;$i<=$endFor;$i++) {
			if($startFor == $endFor) {
				$event['status'] = 'single';
			} else if($i == $startFor) {
				$event['status'] = 'start';
			} else if($i == $endFor) {
				$event['status'] = 'end';
			} else {
				$event['status'] = 'middle';
			}
			$eventsArray[$i][] = $event;
		}
	}
	
}


/*
*  Adding all event occuring during this month to an array indexed by day number
*/
$eventsArray = array();
foreach($events as $event) {

	if(!$event['event_isrecur']) {
		
		addEventToArray($event, $eventsArray);
		
	} else {
		
		$recurEvents = $eventHandler->getRecurEventToDisplay($event, $startMonth, $endMonth);
		
		foreach($recurEvents as $recurEvent) {
			addEventToArray($recurEvent, $eventsArray);
		}
		
	}
}
//echo "<pre>";print_r($eventsArray);echo "</pre>";
/*
*  Making an array to create tabbed output on the template
*/
// Flag current day
$selectedDays = array(new Calendar_Day(
	date('Y', xoops_getUserTimestamp(time(), $extcalTimeHandler->_getUserTimeZone($xoopsUser))),
	date('n', xoops_getUserTimestamp(time(), $extcalTimeHandler->_getUserTimeZone($xoopsUser))),
	date('j', xoops_getUserTimestamp(time(), $extcalTimeHandler->_getUserTimeZone($xoopsUser)))
));

// Build calendar object
$monthCalObj = new Calendar_Month_Weeks($year, $month, $xoopsModuleConfig['week_start_day']);
$pMonthCalObj = $monthCalObj->prevMonth('object');
$nMonthCalObj = $monthCalObj->nextMonth('object');
$monthCalObj->build();

$tableRows = array();
$rowId = 0;
$cellId = 0;
while($weekCalObj = $monthCalObj->fetch()) {
	$weekCalObj->build($selectedDays);
	$tableRows[$rowId]['weekInfo'] = array(
										'week'=>$weekCalObj->thisWeek('n_in_year'),
										'day'=>$weekCalObj->thisDay(),
										'month'=>$weekCalObj->thisMonth(),
										'year'=>$weekCalObj->thisYear()
									);
	while($dayCalObj = $weekCalObj->fetch()) {
		$tableRows[$rowId]['week'][$cellId] = array('isEmpty'=>$dayCalObj->isEmpty(), 'number'=>$dayCalObj->thisDay(), 'isSelected'=>$dayCalObj->isSelected());
		if(@count($eventsArray[$dayCalObj->thisDay()]) > 0 && !$dayCalObj->isEmpty()) {
			$tableRows[$rowId]['week'][$cellId]['events'] = $eventsArray[$dayCalObj->thisDay()];
		} else {
			$tableRows[$rowId]['week'][$cellId]['events'] = '';
		}
		$cellId++;
	}
	$cellId = 0;
	$rowId++;
}

// Assigning events to the template
$xoopsTpl->assign('tableRows', $tableRows);

// Retriving categories
$cats = $catHandler->objectToArray($catHandler->getAllCat($xoopsUser));
// Assigning categories to the template
$xoopsTpl->assign('cats', $cats);

// Retriving weekdayNames
$weekdayNames = Calendar_Util_Textual::weekdayNames();
for($i=0;$i<$xoopsModuleConfig['week_start_day'];$i++) {
	$weekdayName = array_shift($weekdayNames);
	$weekdayNames[] = $weekdayName;
}
// Assigning weekdayNames to the template
$xoopsTpl->assign('weekdayNames', $weekdayNames);

// Retriving monthNames
$monthNames = Calendar_Util_Textual::monthNames();

// Making navig data
$navig = array(
			'prev'=>array(
						'uri'=>'year='.$pMonthCalObj->thisYear().'&amp;month='.$pMonthCalObj->thisMonth(),
						'name'=>$extcalTimeHandler->getFormatedDate($xoopsModuleConfig['nav_date_month'], $pMonthCalObj->getTimestamp())
			),
			'this'=>array(
						'uri'=>'year='.$monthCalObj->thisYear().'&amp;month='.$monthCalObj->thisMonth(),
						'name'=>$extcalTimeHandler->getFormatedDate($xoopsModuleConfig['nav_date_month'], $monthCalObj->getTimestamp())
			),
			'next'=>array(
						'uri'=>'year='.$nMonthCalObj->thisYear().'&amp;month='.$nMonthCalObj->thisMonth(),
						'name'=>$extcalTimeHandler->getFormatedDate($xoopsModuleConfig['nav_date_month'], $nMonthCalObj->getTimestamp())
			)
);

// Assigning navig data to the template
$xoopsTpl->assign('navig', $navig);

// Assigning current form navig data to the template
$xoopsTpl->assign('selectedCat', $cat);
$xoopsTpl->assign('year', $year);
$xoopsTpl->assign('month', $month);
$xoopsTpl->assign('view', "calmonth");

include XOOPS_ROOT_PATH.'/footer.php';

?>
