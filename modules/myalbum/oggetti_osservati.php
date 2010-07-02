<?php

include '../../mainfile.php';
include XOOPS_ROOT_PATH.'/header.php';

global $xoopsDB;
global $xoopsUser;

$uid = empty( $_GET['uid'] ) ? 0 : intval( $_GET['uid'] ) ;
$lid = empty( $_GET['lid'] ) ? 0 : intval( $_GET['lid'] ) ;

if($uid == 0 && $lid == 0) {
redirect_header("marketplace.php", 5 , "Non hai alcun oggetto osservato...");
exit();
}


if($uid != 0 && $lid != 0) {
// insert into table per osservare oggetto

$sql3 = "SELECT * FROM ".$xoopsDB->prefix('myalbum_osservati')." WHERE lid = $lid AND uid = '".$xoopsUser->getVar('uid')."'";
$result3 = $xoopsDB->query($sql3);
$RowsNum3 = $xoopsDB->getRowsNum($result3);
if(!$result3) {
	echo "Errore: ".mysql_error();
	exit ();
	}


$sql3 = "INSERT INTO ".$xoopsDB->prefix('myalbum_osservati')." (lid, uid, offerta, date) VALUES ($lid, '".$xoopsUser->getVar('uid')."', 'no', ".time().")";
if($RowsNum3 == 0) $result3 = $xoopsDB->queryF($sql3);
if(!$result3) {
	echo "Errore: ".mysql_error();
	exit ();
	}

redirect_header("oggetti_osservati.php?uid=".$uid, 5 , "Oggetto osservato...");
exit();

}

// TODO: vericare se ha sue inserzioni come in marketplace.php
$tue_inserzioni = ' | <a style="color: #696867; font-weight: bold;"  href="marketplace.php?uid='.$xoopsUser->getVar('uid').'">LE TUE INSERZIONI</a>';

if($uid != 0 && $lid == 0) {
// lista degli oggetti osservati

$sql = "SELECT s.*, z.lid, z.offerta FROM ".$xoopsDB->prefix('myalbum_photos')." s, ".$xoopsDB->prefix('myalbum_osservati')." z WHERE z.lid = s.lid AND s.hits = 0 AND z.uid = $uid ORDER BY s.date DESC LIMIT 100";

$result = $xoopsDB->query($sql);
$RowsNum = $xoopsDB->getRowsNum($result);
if(!$result) {
    echo "Errore: ".mysql_error();
    exit;
    }

echo'
<div style="">
<div style="text-align: center; width: 100%;">
	<div style="float: left; width: 620px; padding-top: 0px; padding-bottom: 15px; text-align: center;"><a style="color: #696867; font-weight: bold;" href="submit.php">AGGIUNGI UN PRODOTTO</a>'.$tue_inserzioni.' | <a style="color: #696867; font-weight: bold;" href="oggetti_osservati.php?uid='.$xoopsUser->getVar('uid').'">LE TUE OFFERTE</a> | <a style="color: #696867; font-weight: bold;" href="aste_concluse.php">ASTE CONCLUSE</a> | <a style="color: #696867; font-weight: bold;" href="'.XOOPS_URL.'/modules/newbb/viewforum.php?forum=16">CERCA</a></div>
	<div style="float: right; width: 150px; padding-top: 0px; padding-top: 0px; padding-bottom: 20px; text-align: center; padding-right: 15px;">'.$menu_tendina.'</div>
</div>
<div style="clear: both;"></div>
<table class="index_category" cellspacing="0" width="100%">
<tr class="head">
<td>Foto</td>
<td>Titolo</td>
<td>Prezzo</td>
<td>Offerte</td>
<td>Visualizzato</td>
<td>Scadenza</td>
</tr>
';

$count = 0;
while($myrow = $xoopsDB->fetchArray($result)) {
$count ++;

list($width, $height, $type, $attr) = getimagesize(XOOPS_URL."/uploads/photos/".$myrow['lid'].$myrow['ext']);
if ($width >= $height) {$misure = 'width="70"';}
if ($width < $height) {$misure = 'height="70"';}

	$sql_offerte = "SELECT p.prezzo FROM ".$xoopsDB->prefix('myalbum_offerte')." p WHERE lid = '".$myrow['lid']."' ORDER BY p.prezzo DESC";
	$result_offerte = $xoopsDB->query($sql_offerte);
	$myrow2 = $xoopsDB->fetchArray($result_offerte);
	$RowsNum_offerte = $xoopsDB->getRowsNum($result_offerte);
	if($RowsNum_offerte != 0 && ($myrow2['prezzo'] > $myrow['rating'])) $prezzo_tmp = $myrow2['prezzo']; else $prezzo_tmp = $myrow['rating'];
	if(!$result_offerte) {
    echo "Errore: ".mysql_error();
    exit;
    }

/*
if($myrow['date'] < (time() + 86400)) $in_scadenza = '<div style="color: #ff0000; font-weight: bold; font-size: 9px;">OGGETTO IN SCADENZA</div>';
	else if($myrow['date'] < time()) $in_scadenza = '<div style="color: #ff0000; font-weight: bold; font-size: 9px;">OGGETTO SCADUTO</div>';
		else $in_scadenza = '';
*/

if($count % 2 == 0) $class = "even";
	else $class = "odd";

if($myrow['offerta'] == 'si') $style_tmp = 'style="background-color: #fde0e0;"';
	else $style_tmp = '';

if($myrow['status'] == '2') $fine_tmp = '<div><b style="color: #ff0000;">ASTA SCADUTA</b></div>';
	else $fine_tmp = '';


echo'
<tr class="'.$class.'" align="center" valign="middle" '.$style_tmp.'>
<td style="padding-left: 10px; padding-right: 10px;"><a href="prodotto_dettaglio.php?id_prodotto='.$myrow['lid'].'"><img src="'.XOOPS_URL.'/uploads/thumbs/'.$myrow['lid'].'.'.$myrow['ext'].'" '.$misure.' border="0" style="border: 1px solid #000000;"></a></td>
<td style="padding-left: 10px; padding-right: 10px;"><a href="prodotto_dettaglio.php?id_prodotto='.$myrow['lid'].'">'.$myrow['title'].'</a></td>
<td style="padding-left: 10px; padding-right: 10px;">&euro; '.$prezzo_tmp.',00</td>
<td style="padding-left: 10px; padding-right: 10px;">'.$RowsNum_offerte.'</td>
<td style="padding-left: 10px; padding-right: 10px;">'.$myrow['votes'].'</td>
<td style="padding-left: 10px; padding-right: 10px;">'.$fine_tmp.''.$in_scadenza.''.date("d/m/Y - G:i",$myrow['date']).'</td>
</tr>
';



}

echo'
</table>
</div>
<div style="padding-top: 15px; padding-bottom: 15px;">
	<div style="margin-top: 10px; background-color: #fde0e0; width: 10px; height: 10px; border: 1px solid #000000; float: left;"></div>
	<div style="margin-top: 9px; float: left; width: 600px; padding-left: 6px;">Prodotti per i quali tu hai un\'offerta in corso</div>
	<div style="clear: both;"></div>
</div>
';

} // chiudo if($uid != 0 && $lid == 0)







include XOOPS_ROOT_PATH.'/footer.php';

?>