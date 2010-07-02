<?php

include '../../mainfile.php';
//include XOOPS_ROOT_PATH.'/header.php';

// spedire mail al vincitore

global $xoopsDB;
global $xoopsUser;

//$lid = empty( $_GET['lid'] ) ? 0 : intval( $_GET['lid'] ) ;
//$uid = empty( $_GET['uid'] ) ? 0 : intval( $_GET['uid'] ) ;

//if($lid == 0 || $uid != 1) exit();


$sql = "SELECT s.*, q.lid AS lid_tmp, z.uname FROM ".$xoopsDB->prefix('myalbum_photos')." s, ".$xoopsDB->prefix('myalbum_text')." q, ".$xoopsDB->prefix('users')." z WHERE s.status != 2 AND z.uid = s.submitter AND q.lid = s.lid AND s.hits = 0 AND s.date < ".time()." ORDER BY s.date DESC LIMIT 100";

$result = $xoopsDB->query($sql);
$RowsNum = $xoopsDB->getRowsNum($result);
if(!$result) {
    echo "Errore: ".mysql_error();
    exit;
    }

$count = 0;

while ($myrow_x = $xoopsDB->fetchArray($result)) {

	$count++;
	$lid = $myrow_x['lid_tmp'];

	$sql_update = "UPDATE ".$xoopsDB->prefix("myalbum_photos")." SET status = '2' WHERE lid = '".$lid."'";
	$result_update = $xoopsDB->queryF($sql_update);
	
	if(!$result_update) {
	       echo "Errore update: ".mysql_error();
	       exit;
	       }
	
	
	// spedire mail a quelli che lo tenevano sotto occhio
	$sql3 = "SELECT s.*, t.* FROM ".$xoopsDB->prefix('myalbum_osservati')." s, ".$xoopsDB->prefix('users')." t WHERE t.uid = s.uid AND s.lid = ". $lid;
	$result3 = $xoopsDB->query($sql3);
	//$RowsNum3 = $xoopsDB->getRowsNum($result3);
	if(!$result3) {
		echo "Errore: ".mysql_error();
		exit ();
		}
	
	while ($myrow3 = $xoopsDB->fetchArray($result3)) {
	#################### mail per offerta ####################
	include XOOPS_ROOT_PATH."/class/xoopsmailer.php";
	$xoopsMailer =& getMailer();
	$xoopsMailer->useMail(); 
	$xoopsMailer->setTemplateDir(XOOPS_ROOT_PATH.'/language/italian/mail_template');
	define("_PM_MESSAGEPOSTED_EMAILSUBJ","SnowGang.com - Asta conclusa dell'oggetto del mercatino!");
	$xoopsMailer->setTemplate("mercatino_concluso.tpl");
	$xoopsMailer->setToEmails($myrow3['email']);
	$xoopsMailer->assign('X_UNAME', $myrow3['uname']);
	$url_tmp = XOOPS_URL."/modules/myalbum/prodotto_dettaglio.php?id_prodotto=".$lid;
	$xoopsMailer->assign('X_URL_OGGETTO', $url_tmp);
	$xoopsMailer->setFromEmail($xoopsConfig['adminmail']);
	$xoopsMailer->assign('X_SITENAME', "Snowgang.com Web Site");
	$xoopsMailer->assign('X_SITEURL', XOOPS_URL."/");
	$xoopsMailer->assign('X_TITLE', $subject1);
	$xoopsMailer->setSubject(sprintf(_PM_MESSAGEPOSTED_EMAILSUBJ, $xoopsConfig['sitename']));
	$xoopsMailer->send();
	#################### mail per offerta ####################
	}
	
	
	$sql3 = "SELECT s.*, t.* FROM ".$xoopsDB->prefix('users')." t, ".$xoopsDB->prefix('myalbum_photos')." s WHERE s.lid = ". $lid ." AND s.submitter = t.uid LIMIT 1";
	$result3 = $xoopsDB->query($sql3);
	//$RowsNum3 = $xoopsDB->getRowsNum($result3);
	if(!$result3) {
		echo "Errore: ".mysql_error();
		exit ();
		}
	$myrow3 = $xoopsDB->fetchArray($result3);
	
	#################### mail per offerta ####################
	include XOOPS_ROOT_PATH."/class/xoopsmailer.php";
	$xoopsMailer =& getMailer();
	$xoopsMailer->useMail(); 
	$xoopsMailer->setTemplateDir(XOOPS_ROOT_PATH.'/language/italian/mail_template');
	define("_PM_MESSAGEPOSTED_EMAILSUBJ","SnowGang.com - Asta conclusa dell'oggetto del mercatino!");
	$xoopsMailer->setTemplate("mercatino_concluso_proprietario.tpl");
	$xoopsMailer->setToEmails($myrow3['email']);
	$xoopsMailer->assign('X_UNAME', $myrow3['uname']);
	$url_tmp = XOOPS_URL."/modules/myalbum/prodotto_dettaglio.php?id_prodotto=".$lid;
	$xoopsMailer->assign('X_URL_OGGETTO', $url_tmp);
	$xoopsMailer->setFromEmail($xoopsConfig['adminmail']);
	$xoopsMailer->assign('X_SITENAME', "Snowgang.com Web Site");
	$xoopsMailer->assign('X_SITEURL', XOOPS_URL."/");
	$xoopsMailer->assign('X_TITLE', $subject1);
	$xoopsMailer->setSubject(sprintf(_PM_MESSAGEPOSTED_EMAILSUBJ, $xoopsConfig['sitename']));
	$xoopsMailer->send();
	#################### mail per offerta ####################

} // while ($myrow_x = $xoopsDB->fetchArray($result))	


//redirect_header("aste_concluse.php", 2 , "Asta Conclusa! Grazie Fulvio!");
//exit () ;

/*
$a="stefanoitalia@gmail.com";
$oggetto="Prodotti dal mercatino (". $count .")";
$messaggio= $count." aste concluse dal sistema automatico";
mail($a, $oggetto, $messaggio);
*/

//include XOOPS_ROOT_PATH.'/footer.php';

?>
