<?php
global $xoopsDB;
require_once(XOOPS_ROOT_PATH. '/modules/osC/includes/classes/currencies.php');
include_once (XOOPS_ROOT_PATH."/modules/osC/includes/database_tables.php");


function b_shop_currencies() {
global $currencies,$currencies,$currency, $xoopsConfig, $HTTP_GET_VARS,$PHP_SELF,$languages_id;

if(isset($_GET['currency'])) $_SESSION['currency'] = $_GET['currency'];
$currency = (isset($_GET['currency'])) ? $_GET['currency'] : $_SESSION['currency'];

$block=array();
$block['title']=BOX_HEADING_CURRENCIES;
$block['datum']="2003-04-03";
if(!isset($currencies) || !is_object($currencies)) $currencies = new currencies;
$block['content']="<form name=\"currencies\" action=\"$PHP_SELF\" method=\"GET\">";
$block['content'].="<select name=\"currency\" onChange=\"this.form.submit();\">";
reset($currencies->currencies);
$currencies_array = array();
while (list($key, $value) = each($currencies->currencies)) {
	$block['content'].="<option value=\"$key\"";
	if ($key==$currency)
		$block['content'].=" selected";
	$block['content'].=">".$value['title']."</option>";
}
$block['content'].="</select>";
reset($HTTP_GET_VARS);
while (list($key, $value) = each($HTTP_GET_VARS)) {
	if ( ($key != 'currency') && ($key != tep_session_name()) && ($key != 'x') && ($key != 'y') ) {
		$block['content'].="<input type=\"hidden\" name=\"$key\" value=\"$value\">";
	}

}
$block['content'].="</form>";
return $block;
}
?>
