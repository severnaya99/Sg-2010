<?php

include '../../mainfile.php';
//include XOOPS_ROOT_PATH.'/header.php';
include XOOPS_ROOT_PATH."/class/xoopsmailer.php";

global $xoopsDB;
global $xoopsUser;

if(!$xoopsUser) exit;

$lid = empty( $_POST['lid'] ) ? 0 : intval( $_POST['lid'] ) ;
$uid = empty( $_POST['uid'] ) ? 0 : intval( $_POST['uid'] ) ;
$prezzo = empty( $_POST['prezzo'] ) ? 0 : intval( $_POST['prezzo'] ) ;

if($prezzo == 0) 
{
redirect_header("../../modules/myalbum/prodotto_dettaglio.php?id_prodotto=".$lid, 5 , "Offerta non consentita...");
exit () ;
}

if($lid == 0) exit();

$sql = "INSERT INTO ".$xoopsDB->prefix('myalbum_offerte')." (lid, uid, prezzo, timestamp) VALUES ($lid, $uid, $prezzo, ".time().")";

$result = $xoopsDB->query($sql);

if(!$result) {
    echo "Errore: ".mysql_error();
    exit;
    }

$sql3 = "SELECT s.*, t.* FROM ".$xoopsDB->prefix('myalbum_osservati')." s, ".$xoopsDB->prefix('users')." t WHERE t.uid = s.uid AND s.lid = ". $lid;
$result3 = $xoopsDB->query($sql3);
//$RowsNum3 = $xoopsDB->getRowsNum($result3);
if(!$result3) {
	echo "Errore: ".mysql_error();
	exit ();
	}

while ($myrow3 = $xoopsDB->fetchArray($result3)) {

if($uid != $myrow3['uid']) {
#################### mail per offerta ####################
/*
$a = $myrow3['email'];
$oggetto = "Nuova offerta nel mercatino Snowgang";
$messaggio = "Salve ".$myrow3['uname']."<br /><br />E' appena stata fatta un'offerta per un prodotto da te osservato e per il quale tu stesso hai fatto un'offerta.<br /><br />L'url diretto per questo prodotto è: ".XOOPS_URL."/modules/myalbum/prodotto_dettaglio.php?id_prodotto=".$lid.".<br /><br />A presto!";
mail($a, $oggetto, $messaggio);
*/
$xoopsMailer =& getMailer();
$xoopsMailer->useMail(); 
$xoopsMailer->setTemplateDir(XOOPS_ROOT_PATH.'/language/italian/mail_template');
define("_PM_MESSAGEPOSTED_EMAILSUBJ","SnowGang.com - Nuova offerta all'oggetto del mercatino");
$xoopsMailer->setTemplate("mercatino_offerta.tpl");
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

if($uid == $myrow3['uid']) {
#################### mail per offerta ####################
/*
$a = $myrow3['email'];
$oggetto = "Offerta confermata nel mercatino Snowgang";
$messaggio = "Salve ".$myrow3['uname']."<br /><br />La tua offerta è stata ricevuta e confermata.<br /><br />L'url diretto per questo prodotto è: ".XOOPS_URL."/modules/myalbum/prodotto_dettaglio.php?id_prodotto=".$lid.".<br /><br />A presto!";
mail($a, $oggetto, $messaggio);
*/
$xoopsMailer =& getMailer();
$xoopsMailer->useMail(); 
$xoopsMailer->setTemplateDir(XOOPS_ROOT_PATH.'/language/italian/mail_template');
define("_PM_MESSAGEPOSTED_EMAILSUBJ","SnowGang.com - Offerta confermata");
$xoopsMailer->setTemplate("mercatino_offerta_confermata.tpl");
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

} // chiuso while

###### inserisco anche in prodotti osservati
$sql3 = "SELECT * FROM ".$xoopsDB->prefix('myalbum_osservati')." WHERE lid = $lid AND uid = '$uid'";
$result3 = $xoopsDB->query($sql3);
$RowsNum3 = $xoopsDB->getRowsNum($result3);
if(!$result3) {
	echo "Errore: ".mysql_error();
	exit ();
	}

$sql3 = "INSERT INTO ".$xoopsDB->prefix('myalbum_osservati')." (lid, uid, offerta, date) VALUES ($lid, '$uid', 'si', ".time().")";
if($RowsNum3 == 0) $result3 = $xoopsDB->queryF($sql3);
if(!$result3) {
	echo "Errore: ".mysql_error();
	exit ();
	}











redirect_header("../../modules/myalbum/prodotto_dettaglio.php?id_prodotto=".$lid, 5 , "Offerta confermata! Grazie!");
exit () ;

//include XOOPS_ROOT_PATH.'/footer.php';

?>