<?php
/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code 
 which is considered copyrighted (c) material of the original comment or credit authors.
 
 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

/**
 *  Xoops Form Class Elements
 *
 * @copyright       The XOOPS Project http://sourceforge.net/projects/xoops/ 
 * @license         http://www.fsf.org/copyleft/gpl.html GNU public license
 * @package         kernel
 * @subpackage      form
 * @since           2.0.0
 * @author          Kazumi Ono <onokazu@xoops.org>
 * @author          John Neill <catzwolf@xoops.org>
 * @version         $Id: formelementtray.php 3295 2009-07-01 02:26:05Z beckmi $
 */
defined('XOOPS_ROOT_PATH') or die('Restricted access');

/**
 *
 * @author 		Kazumi Ono <onokazu@xoops.org>
 * @author 		John Neill <catzwolf@xoops.org>
 * @copyright   The XOOPS Project http://sourceforge.net/projects/xoops/ 
 * @package 	kernel
 * @subpackage 	form
 * @access 		public
 */

/**
 * A group of form elements
 *
 * @author Kazumi Ono <onokazu@xoops.org>
 * @author John Neill <catzwolf@xoops.org>
 * @copyright copyright (c) 2000-2003 XOOPS.org
 * @package kernel
 * @subpackage form
 */
class XoopsFormElementTray extends XoopsFormElement {
	/**
	 * array of form element objects
	 *
	 * @var array
	 * @access private
	 */
	var $_elements = array();

	/**
	 * required elements
	 *
	 * @var array
	 */
	var $_required = array();

	/**
	 * HTML to seperate the elements
	 *
	 * @var string
	 * @access private
	 */
	var $_delimeter;

	/**
	 * constructor
	 *
	 * @param string $caption Caption for the group.
	 * @param string $delimiter HTML to separate the elements
	 */
	function XoopsFormElementTray( $caption, $delimeter = "&nbsp;", $name = "" ) {
		$this->setName( $name );
		$this->setCaption( $caption );
		$this->_delimeter = $delimeter;
	}

	/**
	 * Is this element a container of other elements?
	 *
	 * @return bool true
	 */
	function isContainer() {
		return true;
	}

	/**
	 * Find out if there are required elements.
	 *
	 * @return bool
	 */
	function isRequired() {
		return !empty( $this->_required );
	}

	/**
	 * Add an element to the group
	 *
	 * @param object $ &$element    {@link XoopsFormElement} to add
	 */
	function addElement( &$formElement, $required = false ) {
		$this->_elements[] = &$formElement;
		if ( !$formElement->isContainer() ) {
			if ( $required ) {
				$formElement->_required = true;
				$this->_required[] = &$formElement;
			}
		} else {
			$required_elements = &$formElement->getRequired();
			$count = count( $required_elements );
			for ( $i = 0 ; $i < $count; $i++ ) {
				$this->_required[] = &$required_elements[$i];
			}
		}
	}

	/**
	 * get an array of "required" form elements
	 *
	 * @return array array of {@link XoopsFormElement}s
	 */
	function &getRequired() {
		return $this->_required;
	}

	/**
	 * Get an array of the elements in this group
	 *
	 * @param bool $recurse get elements recursively?
	 * @return array Array of {@link XoopsFormElement} objects.
	 */
	function &getElements( $recurse = false ) {
		if ( !$recurse ) {
			return $this->_elements;
		} else {
			$ret = array();
			$count = count( $this->_elements );
			for ( $i = 0; $i < $count; $i++ ) {
				if ( !$this->_elements[$i]->isContainer() ) {
					$ret[] = &$this->_elements[$i];
				} else {
					$elements = &$this->_elements[$i]->getElements( true );
					$count2 = count( $elements );
					for ( $j = 0; $j < $count2; $j++ ) {
						$ret[] = &$elements[$j];
					}
					unset( $elements );
				}
			}
			return $ret;
		}
	}

	/**
	 * Get the delimiter of this group
	 *
	 * @param bool $encode To sanitizer the text?
	 * @return string The delimiter
	 */
	function getDelimeter( $encode = false ) {
		return $encode ? htmlspecialchars( str_replace( '&nbsp;', ' ', $this->_delimeter ) ) : $this->_delimeter;
	}

	/**
	 * prepare HTML to output this group
	 *
	 * @return string HTML output
	 */
	function render() {
		$count = 0;
		$ret = "";
		foreach ( $this->getElements() as $ele ) {
			if ( $count > 0 ) {
				$ret .= $this->getDelimeter();
			}
			if ( $ele->getCaption() != '' ) {
				$ret .= $ele->getCaption() . "&nbsp;";
			}
			$ret .= $ele->render() . NWLINE ;
			if ( !$ele->isHidden() ) {
				$count++;
			}
		}
		return $ret;
	}
}

?>