<?php
// $Id: mb_dummy.php,v 1.2 2005/06/20 15:03:23 ohwada Exp $

//=================================================
// Name:     mb_dummy.php
// Function: dummy function for non multibyte environment
// Date:     2003.11.21
// Author:   Kenichi OHWADA
//=================================================

function mb_convert_encoding($str,$to_encoding,$from_encoding='')
{	return $str;	}

function mb_convert_kana($str, $option, $encoding='')
{	return $str;	}

function mb_convert_variables($to_encoding,$from_encoding,&$vars)
{	return $from_encoding;	}

function mb_decode_mimeheader($str)
{	return $str;	}

function mb_decode_numericentity($str, $convmap, $encoding='')
{	return $str;	}

function mb_detect_encoding($str,$encoding_list='')
{	return 'ASCII';	}

function mb_detect_order($encoding_list='')
{	return FALSE;	}	// error

function mb_encode_mimeheader($str,$charset='',$transfer_encoding='',$linefeed='')
{	return $str;	}

function mb_encode_numericentity($str, $convmap, $encoding='')
{	return $str;	}

function mb_ereg_match($pattern, $string, $option='')
{	return FALSE;	}	// unmatch

// overload ereg_replace
function mb_ereg_replace($pattern, $replacement, $string)
{	return ereg_replace($pattern, $replacement, $string);	}

function mb_ereg_search_getpos()
{	return 0;	}

function mb_ereg_search_getregs()
{	return FALSE;	}	// error

function mb_ereg_search_init($string, $pattern='', $option='')
{	return FALSE;	}	// error

function mb_ereg_search_pos($pattern, $option='')
{	return 0;	}

function mb_ereg_search_regs($pattern, $option='')
{	return FALSE;	}	// error

function mb_ereg_search_setpos()
{	return;	}

function mb_ereg_search($pattern, $option='')
{	return FALSE;	}	// unmatch

// overload ereg
function mb_ereg($pattern, $string ,$regs=NULL)
{	return ereg($pattern, $string, $regs);	}

// overload eregi_replace
function mb_eregi_replace($pattern, $replace, $string)
{	return eregi_replace($pattern, $replace, $string);	}

// overload eregi
function mb_eregi($pattern, $string, $regs=NULL)
{	return eregi($pattern, $string, $regs=NULL);	}

function mb_get_info($type='')
{	return 'ASCII';	}

function mb_http_input($type)
{	return FALSE;	}	// error

function mb_http_output($encoding='')
{	return FALSE;	}	// error

function mb_internal_encoding($encoding='')
{	return FALSE;	}	// error

function mb_language($language=NULL)
{	return FALSE;	}	// error

function mb_output_handler($contents, $status)
{	return;	}

function mb_parse_str($encoded_string, $result=NULL)
{	return FALSE;	}	// error

function mb_preferred_mime_name($encoding)
{	return 'ISO-8859-1';	}	// us ascii

function mb_regex_encoding($encoding='')
{	return 'ASCII';	}

function mb_send_mail($to, $subject, $message, $headers='', $parameter='')
{	mail($to, $subject, $message, $headers, $parameter);	}

// overload split
function mb_split($pattern, $string, $limit=NULL)
{	return split($pattern, $string, $limit);	}

function mb_strcut($str, $start, $length=NULL, $encoding='')
{	return $str;	}

function mb_strimwidth($str,$start,$width,$trimmarker='',$encoding='')
{	return $str;	}

// overload strlen
function mb_strlen($str,$encoding='')
{	return strlen($str);	}

// overload strpos
function mb_strpos($haystack, $needle, $offset=0, $encoding='')
{	return strpos($haystack, $needle, $offset, $encoding);	}

// overload strrpos
function mb_strrpos($haystack, $needle, $encoding='')
{	return strrpos($haystack, $needle, $encoding);	}

function mb_strwidth($str, $encoding='')
{	return 1;	}	// single byte

function mb_substitute_character($substrchar=NULL)
{	return FALSE;	}	// error

function mb_substr($str,$start,$length=NULL,$encoding='')
{	return substr($str,$start,$length);	}

?>