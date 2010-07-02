<?php

function bExtcalMinicalAddEventToArray(&$event, &$eventsArray, $extcalTimeHandler, $startMonth, $endMonth) {
	
	// Calculating the start and the end of the event
	$startEvent = xoops_getUserTimestamp($event['event_start'], $extcalTimeHandler->_getUserTimeZone($GLOBALS['xoopsUser']));
	$endEvent = xoops_getUserTimestamp($event['event_end'], $extcalTimeHandler->_getUserTimeZone($GLOBALS['xoopsUser']));

	// This event start before this month and finish after
	if($startEvent < $startMonth && $endEvent > $endMonth) {
		$endFor = date('t',mktime(0,0,0,$month,1,$year));
		for($i=1;$i<=$endFor;$i++) {
			$eventsArray[$i] = true;
		}
	// This event start before this month and finish during
	} else if($startEvent < $startMonth) {
		$endFor = date('j', $endEvent);
		for($i=1;$i<=$endFor;$i++) {
			$eventsArray[$i] = true;
		}
	// This event start during this month and finish after
	} else if($endEvent > $endMonth) {
		$startFor = date('j', $startEvent);
		$endFor = date('t',mktime(0,0,0,$month,1,$year));
		for($i=$startFor;$i<=$endFor;$i++) {
			$eventsArray[$i] = true;
		}
	// This event start and finish during this month
	} else {
		$startFor = date('j', $startEvent);
		$endFor = date('j', $endEvent);
		for($i=$startFor;$i<=$endFor;$i++) {
			$eventsArray[$i] = true;
		}
	}
	
}

function bExtcalMinicalShow($options) {

	define('CALENDAR_ROOT', XOOPS_ROOT_PATH.'/modules/extcal/class/pear/Calendar/');

	include_once XOOPS_ROOT_PATH.'/modules/extcal/class/config.php';
	require_once CALENDAR_ROOT.'Util/Textual.php';
	require_once CALENDAR_ROOT.'Month/Weeks.php';
	require_once CALENDAR_ROOT.'Day.php';

	// Retriving Image for block if enabled
	if($options[0] == 1) {
		$imageHandler =& xoops_gethandler('image');
		$criteria = new Criteria('imgcat_id', $options[1]);
		$criteria->setSort('image_id');
		$criteria->setOrder('RAND()');
		$criteria->setLimit(1);
		$image = $imageHandler->getObjects($criteria);
		if(isset($image[0])) {
			$imageArray = array('displayImage'=>true, 'image_name'=>$image[0]->getVar('image_name'), 'image_nicename'=>$image[0]->getVar('image_nicename'));
		} else {
			$imageArray = array('displayImage'=>false);
		}
	} else {
		$imageArray = array('displayImage'=>false);
	}

	// Retriving module config
	$extcalConfig = ExtcalConfig::getHandler();
	$xoopsModuleConfig = $extcalConfig->getModuleConfig();

	// Getting eXtCal object's handler
	$catHandler = xoops_getmodulehandler('cat', 'extcal');
	$eventHandler = xoops_getmodulehandler('event', 'extcal');
	$extcalTimeHandler = ExtcalTime::getHandler();

	// Retriving month and year value according to block options
	$month = date('n');
	$year = date('Y');
	if($options[2] == -1) {
		$month--;
		if($month == 0) {
			$month = 12;
			$year--;
		}
	} else if($options[2] == 1) {
		$month++;
		if($month == 13) {
			$month = 1;
			$year++;
		}
	}

	// Saving display link preference
	$displayLink = $options[3];

	// Delete options to keep only categorie data
	array_shift($options);
	array_shift($options);
	array_shift($options);
	array_shift($options);

	// Retriving events and formatting them
	$events = $eventHandler->objectToArray($eventHandler->getEventCalendarMonth($month, $year, $options));
	//$eventHandler->formatEventDate($events, "l dS \of F Y h:i:s A");

	// Calculating timestamp for the begin and the end of the month
	$startMonth = mktime(0,0,0,$month,1,$year);
	$endMonth = mktime(23,59,59,$month+1,0,$year);

	/*
	*  Adding all event occuring during this month to an array indexed by day number
	*/
	$eventsArray = array();
	foreach($events as $event) {

		if(!$event['event_isrecur']) {
		
			bExtcalMinicalAddEventToArray($event, $eventsArray, $extcalTimeHandler, $startMonth, $endMonth);
			
		} else {
			
			$recurEvents = $eventHandler->getRecurEventToDisplay($event, $startMonth, $endMonth);
			
			foreach($recurEvents as $recurEvent) {
				bExtcalMinicalAddEventToArray($recurEvent, $eventsArray, $extcalTimeHandler, $startMonth, $endMonth);
			}
			
		}
		
	}

	/*
	*  Making an array to create tabbed output on the template
	*/
	// Flag current day
	$selectedDays = array(new Calendar_Day(
		date('Y', xoops_getUserTimestamp(time(), $extcalTimeHandler->_getUserTimeZone($GLOBALS['xoopsUser']))),
		date('n', xoops_getUserTimestamp(time(), $extcalTimeHandler->_getUserTimeZone($GLOBALS['xoopsUser']))),
		date('j', xoops_getUserTimestamp(time(), $extcalTimeHandler->_getUserTimeZone($GLOBALS['xoopsUser'])))
	));

	// Build calendar object
	$monthCalObj = new Calendar_Month_Weeks($year, $month, $xoopsModuleConfig['week_start_day']);
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
			if(isset($eventsArray[$dayCalObj->thisDay()]) && !$dayCalObj->isEmpty()) {
				$tableRows[$rowId]['week'][$cellId]['haveEvents'] = true;
			} else {
				$tableRows[$rowId]['week'][$cellId]['haveEvents'] = false;
			}
			$cellId++;
		}
		$cellId = 0;
		$rowId++;
	}

	// Retriving weekdayNames
	$weekdayNames = Calendar_Util_Textual::weekdayNames('one');
	for($i=0;$i<$xoopsModuleConfig['week_start_day'];$i++) {
		$weekdayName = array_shift($weekdayNames);
		$weekdayNames[] = $weekdayName;
	}

	// Making navig data
	$navig = array(
					'uri'=>'year='.$monthCalObj->thisYear().'&amp;month='.$monthCalObj->thisMonth(),
					'name'=>$extcalTimeHandler->getFormatedDate($xoopsModuleConfig['nav_date_month'], $monthCalObj->getTimestamp())
			);
	$ret = array(
				'image'=>$imageArray,
				'displayLink'=>$displayLink,
				'submitText'=>_MB_EXTCAL_SUBMIT_LINK_TEXT,
				'tableRows'=>$tableRows,
				'weekdayNames'=>$weekdayNames,
				'navig'=>$navig
			);
	return $ret;

}

function bExtcalMinicalEdit($options) {
	global $xoopsUser;

	$catHandler = xoops_getmodulehandler('cat', 'extcal');
	$cats = $catHandler->getAllCat($xoopsUser, 'extcal_cat_view');

	$imageCatHandler =& xoops_gethandler('imagecategory');

	$form = _MB_EXTCAL_DISPLAY_IMG."&nbsp;\n";
	if($options[0] == 1) {
		$form .= "<input name='options[0]' value='1' type='radio' checked='checked'>&nbsp;"._YES."\n<input name='options[0]' value='0' type='radio'>&nbsp;"._NO."<br /><br />";
	} else {
		$form .= "<input name='options[0]' value='1' type='radio'>&nbsp;"._YES."\n<input name='options[0]' value='0' type='radio' checked='checked'>&nbsp;"._NO."<br /><br />";
	}
	$form .= _MB_EXTCAL_IMG_CAT."&nbsp;\n<select name='options[1]'>\n";
	$imageCats = $imageCatHandler->getObjects();
	$selected = ($options[1] == 0) ? ' selected="selected"' : '';
	$form .= "<option value=\"0\">&nbsp;</option>";
	foreach($imageCats as $cat) {
		if($cat->getVar('imgcat_id') == $options[1]) {
			$form .= "<option value=\"".$cat->getVar('imgcat_id')."\" selected=\"selected\">".$cat->getVar('imgcat_name')."</option>";
		} else {
			$form .= "<option value=\"".$cat->getVar('imgcat_id')."\">".$cat->getVar('imgcat_name')."</option>";
		}
	}
	$form .= "</select><br /><br />\n";
	$form .= _MB_EXTCAL_DISPLAY_MONTH."&nbsp;\n<select name='options[2]'>\n";
	if($options[2] == -1) {
		$form .= "<option value=\"-1\" selected=\"selected\">"._MB_EXTCAL_PREVIEW."</option>";
		$form .= "<option value=\"0\">"._MB_EXTCAL_CURRENT."</option>";
		$form .= "<option value=\"1\">"._MB_EXTCAL_NEXT."</option>";
	} else if($options[2] == 1) {
		$form .= "<option value=\"-1\">"._MB_EXTCAL_PREVIEW."</option>";
		$form .= "<option value=\"0\">"._MB_EXTCAL_CURRENT."</option>";
		$form .= "<option value=\"1\" selected=\"selected\">"._MB_EXTCAL_NEXT."</option>";
	} else {
		$form .= "<option value=\"-1\">"._MB_EXTCAL_PREVIEW."</option>";
		$form .= "<option value=\"0\" selected=\"selected\">"._MB_EXTCAL_CURRENT."</option>";
		$form .= "<option value=\"1\">"._MB_EXTCAL_NEXT."</option>";
	}
	$form .= "</select><br /><br />\n";
	$form .= _MB_EXTCAL_DISPLAY_SUBMIT_LINK."&nbsp;\n";
	if($options[3] == 1) {
		$form .= "<input name='options[3]' value='1' type='radio' checked='checked'>&nbsp;"._YES."\n<input name='options[3]' value='0' type='radio'>&nbsp;"._NO."<br /><br />";
	} else {
		$form .= "<input name='options[3]' value='1' type='radio'>&nbsp;"._YES."\n<input name='options[3]' value='0' type='radio' checked='checked'>&nbsp;"._NO."<br /><br />";
	}
	array_shift($options);
	array_shift($options);
	array_shift($options);
	array_shift($options);
	$form .= _MB_EXTCAL_CAT_TO_USE."<br /><select name=\"options[]\" multiple=\"multiple\" size=\"5\">";
	if(array_search(0, $options) === false) {
		$form .= "<option value=\"0\">"._MB_EXTCAL_ALL_CAT."</option>";
	} else {
		$form .= "<option value=\"0\" selected=\"selected\">"._MB_EXTCAL_ALL_CAT."</option>";
	}
	foreach($cats as $cat) {
		if(array_search($cat->getVar('cat_id'), $options) === false) {
			$form .= "<option value=\"".$cat->getVar('cat_id')."\">".$cat->getVar('cat_name')."</option>";
		} else {
			$form .= "<option value=\"".$cat->getVar('cat_id')."\" selected=\"selected\">".$cat->getVar('cat_name')."</option>";
		}
	}
	$form .= "</select>";

	return $form;
}

function bExtcalSpotlightShow($options) {

}

function bExtcalSpotlightEdit($options) {

}

function bExtcalUpcomingShow($options) {

	include_once XOOPS_ROOT_PATH.'/modules/extcal/class/config.php';

	// Retriving module config
	$extcalConfig = ExtcalConfig::getHandler();
	$xoopsModuleConfig = $extcalConfig->getModuleConfig();

	$eventHandler = xoops_getmodulehandler('event', 'extcal');

	$nbEvent = $options[0];
	$titleLenght = $options[1];
	array_shift($options);
	array_shift($options);

	// Checking if no cat is selected
	if(count($options) == 1 && $options[0] == 0) {
		$options = 0;
	}

	$events = $eventHandler->objectToArray($eventHandler->getUpcommingEvent($nbEvent, $options));
	$eventHandler->formatEventsDate($events, $xoopsModuleConfig['event_date_month']);

	return $events;
}

function bExtcalUpcomingEdit($options) {
	global $xoopsUser;

	$catHandler = xoops_getmodulehandler('cat', 'extcal');

	$cats = $catHandler->getAllCat($xoopsUser, 'extcal_cat_view');

	$form = _MB_EXTCAL_DISPLAY."&nbsp;\n";
	$form .= "<input name=\"options[0]\" size=\"5\" maxlength=\"255\" value=\"".$options[0]."\" type=\"text\" />&nbsp;"._MB_EXTCAL_EVENT."<br />";
	$form .= _MB_EXTCAL_TITLE_LENGTH." : <input name=\"options[1]\" size=\"5\" maxlength=\"255\" value=\"".$options[1]."\" type=\"text\" /><br />";
	array_shift($options);
	array_shift($options);
	$form .= _MB_EXTCAL_CAT_TO_USE."<br /><select name=\"options[]\" multiple=\"multiple\" size=\"5\">";
	if(array_search(0, $options) === false) {
		$form .= "<option value=\"0\">"._MB_EXTCAL_ALL_CAT."</option>";
	} else {
		$form .= "<option value=\"0\" selected=\"selected\">"._MB_EXTCAL_ALL_CAT."</option>";
	}
	foreach($cats as $cat) {
		if(array_search($cat->getVar('cat_id'), $options) === false) {
			$form .= "<option value=\"".$cat->getVar('cat_id')."\">".$cat->getVar('cat_name')."</option>";
		} else {
			$form .= "<option value=\"".$cat->getVar('cat_id')."\" selected=\"selected\">".$cat->getVar('cat_name')."</option>";
		}
	}
	$form .= "</select>";
	return $form;
}

function bExtcalDayShow($options) {

	include_once XOOPS_ROOT_PATH.'/modules/extcal/class/config.php';

	// Retriving module config
	$extcalConfig = ExtcalConfig::getHandler();
	$xoopsModuleConfig = $extcalConfig->getModuleConfig();

	$eventHandler = xoops_getmodulehandler('event', 'extcal');

	$nbEvent = $options[0];
	$titleLenght = $options[1];
	array_shift($options);
	array_shift($options);

	// Checking if no cat is selected
	if(count($options) == 1 && $options[0] == 0) {
		$options = 0;
	}

	$events = $eventHandler->objectToArray($eventHandler->getThisDayEvent($nbEvent, $options));
	$eventHandler->formatEventsDate($events, $xoopsModuleConfig['event_date_month']);

	return $events;
}

function bExtcalDayEdit($options) {
	global $xoopsUser;

	$catHandler = xoops_getmodulehandler('cat', 'extcal');

	$cats = $catHandler->getAllCat($xoopsUser, 'extcal_cat_view');

	$form = _MB_EXTCAL_DISPLAY."&nbsp;\n";
	$form .= "<input name=\"options[0]\" size=\"5\" maxlength=\"255\" value=\"".$options[0]."\" type=\"text\" />&nbsp;"._MB_EXTCAL_EVENT."<br />";
	$form .= _MB_EXTCAL_TITLE_LENGTH." : <input name=\"options[1]\" size=\"5\" maxlength=\"255\" value=\"".$options[1]."\" type=\"text\" /><br />";
	array_shift($options);
	array_shift($options);
	$form .= _MB_EXTCAL_CAT_TO_USE."<br /><select name=\"options[]\" multiple=\"multiple\" size=\"5\">";
	if(array_search(0, $options) === false) {
		$form .= "<option value=\"0\">"._MB_EXTCAL_ALL_CAT."</option>";
	} else {
		$form .= "<option value=\"0\" selected=\"selected\">"._MB_EXTCAL_ALL_CAT."</option>";
	}
	foreach($cats as $cat) {
		if(array_search($cat->getVar('cat_id'), $options) === false) {
			$form .= "<option value=\"".$cat->getVar('cat_id')."\">".$cat->getVar('cat_name')."</option>";
		} else {
			$form .= "<option value=\"".$cat->getVar('cat_id')."\" selected=\"selected\">".$cat->getVar('cat_name')."</option>";
		}
	}
	$form .= "</select>";
	return $form;
}

function bExtcalNewShow($options) {

	include_once XOOPS_ROOT_PATH.'/modules/extcal/class/config.php';

	// Retriving module config
	$extcalConfig = ExtcalConfig::getHandler();
	$xoopsModuleConfig = $extcalConfig->getModuleConfig();

	$eventHandler = xoops_getmodulehandler('event', 'extcal');

	$nbEvent = $options[0];
	$titleLenght = $options[1];
	array_shift($options);
	array_shift($options);

	// Checking if no cat is selected
	if(count($options) == 1 && $options[0] == 0) {
		$options = 0;
	}

	$events = $eventHandler->objectToArray($eventHandler->getNewEvent($nbEvent, $options));
	$eventHandler->formatEventsDate($events, $xoopsModuleConfig['event_date_month']);

	return $events;
}

function bExtcalNewEdit($options) {
	global $xoopsUser;

	$catHandler = xoops_getmodulehandler('cat', 'extcal');

	$cats = $catHandler->getAllCat($xoopsUser, 'extcal_cat_view');

	$form = _MB_EXTCAL_DISPLAY."&nbsp;\n";
	$form .= "<input name=\"options[0]\" size=\"5\" maxlength=\"255\" value=\"".$options[0]."\" type=\"text\" />&nbsp;"._MB_EXTCAL_EVENT."<br />";
	$form .= _MB_EXTCAL_TITLE_LENGTH." : <input name=\"options[1]\" size=\"5\" maxlength=\"255\" value=\"".$options[1]."\" type=\"text\" /><br />";
	array_shift($options);
	array_shift($options);
	$form .= _MB_EXTCAL_CAT_TO_USE."<br /><select name=\"options[]\" multiple=\"multiple\" size=\"5\">";
	if(array_search(0, $options) === false) {
		$form .= "<option value=\"0\">"._MB_EXTCAL_ALL_CAT."</option>";
	} else {
		$form .= "<option value=\"0\" selected=\"selected\">"._MB_EXTCAL_ALL_CAT."</option>";
	}
	foreach($cats as $cat) {
		if(array_search($cat->getVar('cat_id'), $options) === false) {
			$form .= "<option value=\"".$cat->getVar('cat_id')."\">".$cat->getVar('cat_name')."</option>";
		} else {
			$form .= "<option value=\"".$cat->getVar('cat_id')."\" selected=\"selected\">".$cat->getVar('cat_name')."</option>";
		}
	}
	$form .= "</select>";
	return $form;
}

function bExtcalRandomShow($options) {

	include_once XOOPS_ROOT_PATH.'/modules/extcal/class/config.php';

	// Retriving module config
	$extcalConfig = ExtcalConfig::getHandler();
	$xoopsModuleConfig = $extcalConfig->getModuleConfig();

	$eventHandler = xoops_getmodulehandler('event', 'extcal');

	$nbEvent = $options[0];
	$titleLenght = $options[1];
	array_shift($options);
	array_shift($options);

	// Checking if no cat is selected
	if(count($options) == 1 && $options[0] == 0) {
		$options = 0;
	}

	$events = $eventHandler->objectToArray($eventHandler->getRandomEvent($nbEvent, $options));
	$eventHandler->formatEventsDate($events, $xoopsModuleConfig['event_date_month']);

	return $events;
}

function bExtcalRandomEdit($options) {
	global $xoopsUser;

	$catHandler = xoops_getmodulehandler('cat', 'extcal');

	$cats = $catHandler->getAllCat($xoopsUser, 'extcal_cat_view');

	$form = _MB_EXTCAL_DISPLAY."&nbsp;\n";
	$form .= "<input name=\"options[0]\" size=\"5\" maxlength=\"255\" value=\"".$options[0]."\" type=\"text\" />&nbsp;"._MB_EXTCAL_EVENT."<br />";
	$form .= _MB_EXTCAL_TITLE_LENGTH." : <input name=\"options[1]\" size=\"5\" maxlength=\"255\" value=\"".$options[1]."\" type=\"text\" /><br />";
	array_shift($options);
	array_shift($options);
	$form .= _MB_EXTCAL_CAT_TO_USE."<br /><select name=\"options[]\" multiple=\"multiple\" size=\"5\">";
	if(array_search(0, $options) === false) {
		$form .= "<option value=\"0\">"._MB_EXTCAL_ALL_CAT."</option>";
	} else {
		$form .= "<option value=\"0\" selected=\"selected\">"._MB_EXTCAL_ALL_CAT."</option>";
	}
	foreach($cats as $cat) {
		if(array_search($cat->getVar('cat_id'), $options) === false) {
			$form .= "<option value=\"".$cat->getVar('cat_id')."\">".$cat->getVar('cat_name')."</option>";
		} else {
			$form .= "<option value=\"".$cat->getVar('cat_id')."\" selected=\"selected\">".$cat->getVar('cat_name')."</option>";
		}
	}
	$form .= "</select>";
	return $form;
}

?>
