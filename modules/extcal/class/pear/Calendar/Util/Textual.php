<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
//
// +----------------------------------------------------------------------+
// | PHP Version 4                                                        |
// +----------------------------------------------------------------------+
// | Copyright (c) 1997-2002 The PHP Group                                |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.02 of the PHP license,      |
// | that is bundled with this package in the file LICENSE, and is        |
// | available at through the world-wide-web at                           |
// | http://www.php.net/license/3_0.txt.                                  |
// | If you did not receive a copy of the PHP license and are unable to   |
// | obtain it through the world-wide-web, please send a note to          |
// | license@php.net so we can mail you a copy immediately.               |
// +----------------------------------------------------------------------+
// | Authors: Harry Fuecks <hfuecks@phppatterns.com>                      |
// |          Lorenzo Alberton <l dot alberton at quipo dot it>           |
// +----------------------------------------------------------------------+
//
// $Id: Textual.php,v 1.2 2004/08/16 13:13:09 hfuecks Exp $
//
/**
 * @package Calendar
 * @version $Id: Textual.php,v 1.2 2004/08/16 13:13:09 hfuecks Exp $
 */

/**
 * Allows Calendar include path to be redefined
 * @ignore
 */
if (!defined('CALENDAR_ROOT')) {
    define('CALENDAR_ROOT', 'Calendar'.DIRECTORY_SEPARATOR);
}

/**
 * Load Calendar decorator base class
 */
require_once CALENDAR_ROOT.'Decorator.php';

include_once XOOPS_ROOT_PATH."/language/".$GLOBALS['xoopsConfig']['language']."/calendar.php";
if(file_exists(XOOPS_ROOT_PATH."/modules/extcal/language/".$GLOBALS['xoopsConfig']['language']."/main.php")) {
	include_once XOOPS_ROOT_PATH."/modules/extcal/language/".$GLOBALS['xoopsConfig']['language']."/main.php";
} else {
	include_once XOOPS_ROOT_PATH."/modules/extcal/language/english/main.php";
}

/**
 * Static utlities to help with fetching textual representations of months and
 * days of the week.
 * @package Calendar
 * @access public
 */
class Calendar_Util_Textual
{

    /**
     * Returns an array of 12 month names (first index = 1)
     * @param string (optional) format of returned months (one,two,short or long)
     * @return array
     * @access public
     * @static
     */
    function monthNames($format='long')
    {
        $formats = array('one'=>'%b', 'two'=>'%b', 'short'=>'%b', 'long'=>'%B');
        if (!array_key_exists($format,$formats)) {
            $format = 'long';
        }
        $months = array();
        for ($i=1; $i<=12; $i++) {
            $stamp = mktime(0, 0, 0, $i, 1, 2003);
            $month = Calendar_Util_Textual::translatedName(date($formats[$format], $stamp));
            switch($format) {
                case 'one':
                    $month = substr($month, 0, 1);
                break;
                case 'two':
                    $month = substr($month, 0, 2);
                break;
            }
            $months[$i] = $month;
        }
        return $months;
    }

    /**
     * Returns an array of 7 week day names (first index = 0)
     * @param string (optional) format of returned days (one,two,short or long)
     * @return array
     * @access public
     * @static
     */
    function weekdayNames($format='long')
    {
        $formats = array('one'=>'D', 'two'=>'D', 'short'=>'D', 'long'=>'l');
        if (!array_key_exists($format,$formats)) {
            $format = 'long';
        }
        $days = array();
        for ($i=0; $i<=6; $i++) {
            $stamp = mktime(0, 0, 0, 11, $i+2, 2003);
            $day = Calendar_Util_Textual::translatedName(date($formats[$format], $stamp));
            switch($format) {
                case 'one':
                    $day = substr($day, 0, 1);
                break;
                case 'two':
                    $day = substr($day, 0, 2);
                break;
            }
            $days[$i] = $day;
        }
        return $days;
    }

    /**
     * Returns textual representation of the previous month of the decorated calendar object
     * @param object subclass of Calendar e.g. Calendar_Month
     * @param string (optional) format of returned months (one,two,short or long)
     * @return string
     * @access public
     * @static
     */
    function prevMonthName($Calendar, $format='long')
    {
        $months = Calendar_Util_Textual::monthNames($format);
        return $months[$Calendar->prevMonth()];
    }

    /**
     * Returns textual representation of the month of the decorated calendar object
     * @param object subclass of Calendar e.g. Calendar_Month
     * @param string (optional) format of returned months (one,two,short or long)
     * @return string
     * @access public
     * @static
     */
    function thisMonthName($Calendar, $format='long')
    {
        $months = Calendar_Util_Textual::monthNames($format);
        return $months[$Calendar->thisMonth()];
    }

    /**
     * Returns textual representation of the next month of the decorated calendar object
     * @param object subclass of Calendar e.g. Calendar_Month
     * @param string (optional) format of returned months (one,two,short or long)
     * @return string
     * @access public
     * @static
     */
    function nextMonthName($Calendar, $format='long')
    {
        $months = Calendar_Util_Textual::monthNames($format);
        return $months[$Calendar->nextMonth()];
    }

    /**
     * Returns textual representation of the previous day of week of the decorated calendar object
     * <b>Note:</b> Requires PEAR::Date
     * @param object subclass of Calendar e.g. Calendar_Month
     * @param string (optional) format of returned months (one,two,short or long)
     * @return string
     * @access public
     * @static
     */
    function prevDayName($Calendar, $format='long')
    {
        $days = Calendar_Util_Textual::weekdayNames($format);
        $stamp = $Calendar->prevDay('timestamp');
        $cE = $Calendar->getEngine();
        require_once 'Date/Calc.php';
        $day = Date_Calc::dayOfWeek($cE->stampToDay($stamp),
            $cE->stampToMonth($stamp), $cE->stampToYear($stamp));
        return $days[$day];
    }

    /**
     * Returns textual representation of the day of week of the decorated calendar object
     * <b>Note:</b> Requires PEAR::Date
     * @param object subclass of Calendar e.g. Calendar_Month
     * @param string (optional) format of returned months (one,two,short or long)
     * @return string
     * @access public
     * @static
     */
    function thisDayName($Calendar, $format='long')
    {
        $days = Calendar_Util_Textual::weekdayNames($format);
        require_once 'Date/Calc.php';
        $day = Date_Calc::dayOfWeek($Calendar->thisDay(), $Calendar->thisMonth(), $Calendar->thisYear());
        return $days[$day];
    }

    /**
     * Returns textual representation of the next day of week of the decorated calendar object
     * @param object subclass of Calendar e.g. Calendar_Month
     * @param string (optional) format of returned months (one,two,short or long)
     * @return string
     * @access public
     * @static
     */
    function nextDayName($Calendar, $format='long')
    {
        $days = Calendar_Util_Textual::weekdayNames($format);
        $stamp = $Calendar->nextDay('timestamp');
        $cE = $Calendar->getEngine();
        require_once 'Date/Calc.php';
        $day = Date_Calc::dayOfWeek($cE->stampToDay($stamp),
            $cE->stampToMonth($stamp), $cE->stampToYear($stamp));
        return $days[$day];
    }

    /**
     * Returns the days of the week using the order defined in the decorated
     * calendar object. Only useful for Calendar_Month_Weekdays, Calendar_Month_Weeks
     * and Calendar_Week. Otherwise the returned array will begin on Sunday
     * @param object subclass of Calendar e.g. Calendar_Month
     * @param string (optional) format of returned months (one,two,short or long)
     * @return array ordered array of week day names
     * @access public
     * @static
     */
    function orderedWeekdays($Calendar, $format='long')
    {
        $days = Calendar_Util_Textual::weekdayNames($format);
        
        // Not so good - need methods to access this information perhaps...
        if (isset($Calendar->tableHelper)) {
            $ordereddays = $Calendar->tableHelper->daysOfWeek;
        } else {
            $ordereddays = array(0, 1, 2, 3, 4, 5, 6);
        }
        
        $ordereddays = array_flip($ordereddays);
        $i = 0;
        $returndays = array();
        foreach ($ordereddays as $key => $value) {
            $returndays[$i] = $days[$key];
            $i++;
        }
        return $returndays;
    }
    
    function translatedName($string)
    {
		$patterns = array(
			'/January/',
			'/February/',
			'/March/',
			'/April/',
			'/May/',
			'/June/',
			'/July/',
			'/August/',
			'/September/',
			'/October/',
			'/November/',
			'/December/',
			'/Jan /',
			'/Feb /',
			'/Mar /',
			'/Apr /',
			'/May /',
			'/Jun /',
			'/Jul /',
			'/Aug /',
			'/Sep /',
			'/Oct /',
			'/Nov /',
			'/Dec /',
			'/Sunday/',
			'/Monday/',
			'/Tuesday/',
			'/Wednesday/',
			'/Thursday/',
			'/Friday/',
			'/Saturday/',
			'/Sun /',
			'/Mon /',
			'/Tue /',
			'/Wed /',
			'/Thu /',
			'/Fri /',
			'/Sat /'
		);
		$replacements = array(
			_CAL_JANUARY,
			_CAL_FEBRUARY,
			_CAL_MARCH,
			_CAL_APRIL,
			_CAL_MAY,
			_CAL_JUNE,
			_CAL_JULY,
			_CAL_AUGUST,
			_CAL_SEPTEMBER,
			_CAL_OCTOBER,
			_CAL_NOVEMBER,
			_CAL_DECEMBER,
			substr(_CAL_JANUARY,0,3).' ',
			substr(_CAL_FEBRUARY,0,3).' ',
			substr(_CAL_MARCH,0,3).' ',
			substr(_CAL_APRIL,0,3).' ',
			substr(_CAL_MAY,0,3).' ',
			substr(_CAL_JUNE,0,3).' ',
			substr(_CAL_JULY,0,3).' ',
			substr(_CAL_AUGUST,0,3).' ',
			substr(_CAL_SEPTEMBER,0,3).' ',
			substr(_CAL_OCTOBER,0,3).' ',
			substr(_CAL_NOVEMBER,0,3).' ',
			substr(_CAL_DECEMBER,0,3).' ',
			_CAL_SUNDAY,
			_CAL_MONDAY,
			_CAL_TUESDAY,
			_CAL_WEDNESDAY,
			_CAL_THURSDAY,
			_CAL_FRIDAY,
			_CAL_SATURDAY,
			substr(_CAL_SUNDAY,0,3).' ',
			substr(_CAL_MONDAY,0,3).' ',
			substr(_CAL_TUESDAY,0,3).' ',
			substr(_CAL_WEDNESDAY,0,3).' ',
			substr(_CAL_THURSDAY,0,3).' ',
			substr(_CAL_FRIDAY,0,3).' ',
			substr(_CAL_SATURDAY,0,3).' '
		);
		return preg_replace($patterns,$replacements,$string);
	}
    
}
?>
