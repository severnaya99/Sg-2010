<?php/*
 * $Id: seo.php,v 1.5 2006/08/15 19:52:08 malanciault Exp $ * Module: xNews * Author: Sudhaker Raj <http://xoops.biz> * Licence: GNU
 */
$seoOp = $_GET['seoOp'];$seoArg = $_GET['seoArg'];$seoLang = $_GET['lang'];
if (empty($seoOp)){	// SEO mode is path-info	/*	Sample URL for path-info	http://localhost/modules/news/seo.php/item.2/can-i-turn-the-ads-off.html	*/	$data = explode("/",$HTTP_SERVER_VARS['PATH_INFO']);
	$seoParts = explode('.', $data[1]);	$seoOp = $seoParts[0];	$seoArg = $seoParts[1];	
	// for multi-argument modules, where itemid and catid both are required.	// $seoArg = substr($data[1], strlen($seoOp) + 1);}
$seoMap = array(	'cat' => 'index.php',	'item' => 'article.php',	'print' => 'print.php',
	'pdf' => 'makepdf.php'
);if (! empty($seoOp) && ! empty($seoMap[$seoOp])){	// module specific dispatching logic, other module must implement as	// per their requirements.	$newUrl = '/modules/xnews/' . $seoMap[$seoOp];
	$_ENV['PHP_SELF'] = $newUrl;	$_SERVER['SCRIPT_NAME'] = $newUrl;	$_SERVER['PHP_SELF'] = $newUrl;	switch ($seoOp) {		case 'cat':			$_SERVER['REQUEST_URI'] = $newUrl . '?storytopic=' . $seoArg;			$_GET['storytopic'] = $seoArg;			break;		case 'item':		case 'print':
		case 'pdf':		default:			$_SERVER['REQUEST_URI'] = $newUrl . '?storyid=' . $seoArg;			$_GET['storyid'] = $seoArg;
	}
	include( $seoMap[$seoOp]);	//trigger_error($seoMap[$seoOp], E_USER_WARNING); }
exit;
?>
