<?php
include( 'header.php' ) ;
include '../../mainfile.php';
include XOOPS_ROOT_PATH.'/header.php';

global $xoopsDB;
global $xoopsUser;
$myts =& MyTextSanitizer::getInstance();
$id_prodotto = empty( $_GET['id_prodotto'] ) ? 0 : intval( $_GET['id_prodotto'] ) ;
$uid = empty( $_GET['uid'] ) ? 0 : intval( $_GET['uid'] ) ;
$cid = empty( $_GET['cid'] ) ? 0 : intval( $_GET['cid'] ) ;
$limit = 1;
$html = 1;
$smiley = 1;
$title_length = 800; //Lunghezza massima titolo
$hometext_length = 250; //Lunghezza massima di hometext

if($cid != 0) $category = "AND s.cid = $cid";

$sql = "SELECT s.*, q.*, z.uname FROM ".$xoopsDB->prefix('myalbum_photos')." s, ".$xoopsDB->prefix('myalbum_text')." q, ".$xoopsDB->prefix('users')." z WHERE z.uid = s.submitter AND q.lid = s.lid AND s.hits = 0 AND s.date < ".time()." ORDER BY s.date DESC LIMIT 100";

$result = $xoopsDB->query($sql);
$RowsNum = $xoopsDB->getRowsNum($result);
if(!$result) {
    echo "Errore: ".mysql_error();
    exit;
    }

if($RowsNum >0) $tue_offerte = ' - <a href="marketplace.php?uid='.$xoopsUser->getVar('uid').'">LE TUE INSERZIONI</a>';

echo'
<script language="JavaScript"><!--

function goThere(form){
	var linkList=form.selectThis.selectedIndex
	if(!linkList==""){window.location.href=form.selectThis.options[linkList].value;}
}
//--></script>
';

if($cid == 0) $selected0 = "selected";
	else if($cid == 1) $selected1 = "selected";
		else if($cid == 2) $selected2 = "selected";
			else if($cid == 3) $selected3 = "selected";
				else if($cid == 4) $selected4 = "selected";

echo'
<div style="">
<div style="text-align: center; width: 100%;">
	<!--<div style="float: left; width: 520px; padding-top: 0px; padding-bottom: 15px; text-align: left;"><a href="submit.php">AGGIUNGI UN PRODOTTO</a>'.$tue_offerte.' - <a href="aste_concluse.php">ASTE CONCLUSE</a></div>-->
	<div style="float: right; width: 150px; padding-top: 0px; padding-top: 0px; padding-bottom: 20px; text-align: center; padding-right: 15px;">'.$menu_tendina.'</div>
</div>
<div style="clear: both;"></div>
<table class="index_category" cellspacing="0" width="100%">
<tr class="head">
<td>Foto</td>
<td>Titolo</td>
<td>Prezzo</td>
<td>Venditore</td>
<td>Scadenza</td>
';

echo'
</tr>
';

$count = 0;
while($myrow = $xoopsDB->fetchArray($result)) {
$count ++;

list($width, $height, $type, $attr) = getimagesize(XOOPS_URL."/uploads/photos/".$myrow['lid'].$myrow['ext']);
    if ($width >= $height)
        {$misure = 'width="70"';}
    if ($width < $height)
        {$misure = 'height="70"';}
    if($count % 2 == 0)
        $class = "even";
    else
        $class = "odd";

    if ($xoopsUser)
    {
            $uname_tmp =  $myrow['uname'];
    } else {
            $uname_tmp =  '-----';
    }



$sql_offerte = "SELECT p.prezzo FROM ".$xoopsDB->prefix('myalbum_offerte')." p WHERE lid = '".$myrow['lid']."' ORDER BY p.prezzo DESC";
$result_offerte = $xoopsDB->query($sql_offerte);
$myrow2 = $xoopsDB->fetchArray($result_offerte);
$RowsNum_offerte = $xoopsDB->getRowsNum($result_offerte);
if($RowsNum_offerte != 0 && ($myrow2['prezzo'] > $myrow['rating']))
    $prezzo_tmp = $myrow2['prezzo']; else $prezzo_tmp = $myrow['rating'];
if(!$result_offerte) {
    echo "Errore: ".mysql_error();
    exit;
}

$in_scadenza = '<div style="color: #ff0000; font-weight: bold; font-size: 9px;">VENDITA SCADUTA</div>';

echo'
<tr class="'.$class.'" align="center" valign="middle">
<td style="padding-left: 10px; padding-right: 10px;"><a href="prodotto_dettaglio.php?id_prodotto='.$myrow['lid'].'"><img src="'.XOOPS_URL.'/uploads/thumbs/'.$myrow['lid'].'.'.$myrow['ext'].'" '.$misure.' border="0" style="border: 1px solid #000000;"></a></td>
<td style="padding-left: 10px; padding-right: 10px;"><a href="prodotto_dettaglio.php?id_prodotto='.$myrow['lid'].'">'.$myrow['title'].'</a></td>
<td style="padding-left: 10px; padding-right: 10px;">&euro; '.$prezzo_tmp.',00</td>
<td style="padding-left: 10px; padding-right: 10px;"><a href="../smartprofile/user-profile.php?uid='.$myrow['submitter'].'">'.$uname_tmp.'</a></td>
<td style="padding-left: 10px; padding-right: 10px;">'.$in_scadenza.''.date("d/m/Y - G:i",$myrow['date']).'</td>
';

echo'
</tr>
';



}

echo'
</table>
</div>
';
myalbum_footer();
include XOOPS_ROOT_PATH.'/footer.php';

?>