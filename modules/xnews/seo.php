<?php
 * $Id: seo.php,v 1.5 2006/08/15 19:52:08 malanciault Exp $
 */
$seoOp = $_GET['seoOp'];
if (empty($seoOp))
	$seoParts = explode('.', $data[1]);
	// for multi-argument modules, where itemid and catid both are required.
$seoMap = array(
	'pdf' => 'makepdf.php'
);
	$_ENV['PHP_SELF'] = $newUrl;
		case 'pdf':
	}
	include( $seoMap[$seoOp]);
exit;
?>