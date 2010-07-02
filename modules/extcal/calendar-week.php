<?php

$year = isset($_GET['year']) ? $_GET['year'] : date('Y');
$month = isset($_GET['month']) ? $_GET['month'] : date('n');
$day = isset($_GET['day']) ? $_GET['day'] : date('j');
$cat = isset($_GET['cat']) ? $_GET['cat'] : 0;

include '../../mainfile.php';
$GLOBALS['xoopsOption']['template_main'] = 'extcal_calendar-week.html';
include XOOPS_ROOT_PATH.'/header.php';

if(!defined('CALENDAR_ROOT')) {
	define('CALENDAR_ROOT', XOOPS_ROOT_PATH.'/modules/extcal/class/pear/Calendar/');
}

include XOOPS_ROOT_PATH.'/class/xoopsformloader.php';
require_once CALENDAR_ROOT.'Util/Textual.php';
require_once CALENDAR_ROOT.'Month/Weeks.php';
require_once CALENDAR_ROOT.'Week.php';
require_once CALENDAR_ROOT.'Day.php';

// Validate the date (day, month and year)
$dayTS = mktime(0,0,0,$month,$day,$year);
$offset = date('w',$dayTS) - $xoopsModuleConfig['week_start_day'];
$dayTS = $dayTS - ($offset * 86400);
$year = date('Y', $dayTS);
$month = date('n', $dayTS);
$day = date('j', $dayTS);

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

$form = new XoopsSimpleForm('', 'navigSelectBox', 'calendar-week.php', 'get');
$form->addElement($yearSelect);
$form->addElement($monthSelect);
$form->addElement($daySelect);
$form->addElement($catSelect);
$form->addElement(new XoopsFormButton("", "form_submit", _SEND, "submit"));

// Assigning the form to the template
$form->assign($xoopsTpl);

// Retriving events and formatting them
$events = $eventHandler->objectToArray($eventHandler->getEventCalendarWeek($day, $month, $year, $cat), array('cat_id'));
$eventHandler->formatEventsDate($events, "l dS \of F Y h:i:s A");

// Calculating timestamp for the begin and the end of the month
$startWeek = mktime(0,0,0,$month,$day,$year);
$endWeek = $startWeek + 604799;


// This function is used to add event to an array indexed by day num in month
function addEventToArray(&$event, &$eventsArray) {

	global $extcalTimeHandler, $startWeek, $endWeek, $xoopsUser, $month, $year;

	// Calculating the start and the end of the event
	$startEvent = xoops_getUserTimestamp($event['event_start'], $extcalTimeHandler->_getUserTimeZone($xoopsUser));
	$endEvent = xoops_getUserTimestamp($event['event_end'], $extcalTimeHandler->_getUserTimeZone($xoopsUser));

	// This event start before this month and finish after
	if($startEvent < $startWeek && $endEvent > $endWeek) {
		$endFor = date('t',mktime(0,0,0,$month,1,$year));
		for($i=1;$i<=$endFor;$i++) {
			$event['status'] = 'middle';
			$eventsArray[$i][] = $event;
		}
	// This event start before this month and finish during
	} else if($startEvent < $startWeek) {
		$endFor = date('j', $endEvent);
		for($i=1;$i<=$endFor;$i++) {
			$event['status'] = ($i!=$endFor) ? 'middle' : 'end';
			$eventsArray[$i][] = $event;
		}
	// This event start during this month and finish after
	} else if($endEvent > $endWeek) {
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
*  Adding all event occuring during this week to an array indexed by day number
*/
$eventsArray = array();
foreach($events as $event) {

	if(!$event['event_isrecur']) {
		
		addEventToArray($event, $eventsArray);
		
	} else {
		
		$recurEvents = $eventHandler->getRecurEventToDisplay($event, $startWeek, $endWeek);
		
		foreach($recurEvents as $recurEvent) {
			addEventToArray($recurEvent, $eventsArray);
		}
		
	}
	
}

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
$weekCalObj = new Calendar_Week($year, $month, $day, $xoopsModuleConfig['week_start_day']);
$pWeekCalObj = $weekCalObj->prevWeek('object');
$nWeekCalObj = $weekCalObj->nextWeek('object');
$weekCalObj->build($selectedDays);

$week = array();
$cellId = 0;
while($dayCalObj = $weekCalObj->fetch()) {
	$week[$cellId] = array('isEmpty'=>$dayCalObj->isEmpty(), 'number'=>$dayCalObj->thisDay(), 'isSelected'=>$dayCalObj->isSelected());
	if(@count($eventsArray[$dayCalObj->thisDay()]) > 0 && !$dayCalObj->isEmpty()) {
		$week[$cellId]['events'] = $eventsArray[$dayCalObj->thisDay()];
	} else {
		$week[$cellId]['events'] = '';
	}
	$cellId++;
}

// Assigning events to the template
$xoopsTpl->assign('week', $week);

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
						'uri'=>'year='.$pWeekCalObj->thisYear().'&amp;month='.$pWeekCalObj->thisMonth().'&amp;day='.$pWeekCalObj->thisDay(),
						'name'=>$extcalTimeHandler->getFormatedDate($xoopsModuleConfig['nav_date_week'], $pWeekCalObj->getTimestamp())
			),
			'this'=>array(
						'uri'=>'year='.$weekCalObj->thisYear().'&amp;month='.$weekCalObj->thisMonth().'&amp;day='.$weekCalObj->thisDay(),
						'name'=>$extcalTimeHandler->getFormatedDate($xoopsModuleConfig['nav_date_week'], $weekCalObj->getTimestamp())
			),
			'next'=>array(
						'uri'=>'year='.$nWeekCalObj->thisYear().'&amp;month='.$nWeekCalObj->thisMonth().'&amp;day='.$nWeekCalObj->thisDay(),
						'name'=>$extcalTimeHandler->getFormatedDate($xoopsModuleConfig['nav_date_week'], $nWeekCalObj->getTimestamp())
			)
);

// Assigning navig data to the template
$xoopsTpl->assign('navig', $navig);

// Assigning current form navig data to the template
$xoopsTpl->assign('selectedCat', $cat);
$xoopsTpl->assign('year', $year);
$xoopsTpl->assign('month', $month);
$xoopsTpl->assign('day', $day);
$xoopsTpl->assign('view', "calweek");

include XOOPS_ROOT_PATH.'/footer.php';

?>
