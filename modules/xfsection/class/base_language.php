<?php
// $Id: base_language.php,v 1.2 2005/06/20 15:03:23 ohwada Exp $

// 2004/04/22 K.OHWADA
// bug fix:
//   Downloads not working
//   add convert_download_filename

//================================================================
// class base language
// 2004/03/24 K.OHWADA
//================================================================

	include_once(XOOPS_ROOT_PATH."/modules/".$xoopsModule->dirname()."/include/functions.php");

	if (file_exists(XOOPS_ROOT_PATH."/modules/".$xoopsModule->dirname()."/language/".$xoopsConfig['language']."/convert_language.php")) 
	{
		include_once(XOOPS_ROOT_PATH."/modules/".$xoopsModule->dirname()."/language/".$xoopsConfig['language']."/convert_language.php");
	}
	else
	{
		include_once(XOOPS_ROOT_PATH."/modules/".$xoopsModule->dirname()."/language/english/convert_language.php");
	}

// dummy for non multibyte environment
	if (!extension_loaded('mbstring') && !function_exists('mb_convert_encoding'))
	{	include_once(XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/include/mb_dummy.php');
	}

class BaseLanguage
{
	var $os;
	var $browser;

// BaseLanguage
	function BaseLanguage()
	{
		list($this->os, $this->browser) = presume_agent();
	}

	function getOS()
	{	return $this->os;	}

	function getBrowser()
	{	return $this->browser;	}

// ConvertLanguage extends BaseLanguage
	function convert_telafriend_subject($text)
	{	return $text;	}

	function convert_telafriend_body($text)
	{	return $text;	}

// bug fix : Downloads not working
	function convert_download_filename($text)
	{	return $text;	}

}

?>