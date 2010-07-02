<?php

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

if($cid != 0)
    $category = "AND s.cid = $cid";

if($uid == 0)
    $sql = "SELECT s.*, q.*, z.uname FROM ".$xoopsDB->prefix('myalbum_photos')." s, ".$xoopsDB->prefix('myalbum_text')." q, ".$xoopsDB->prefix('users')." z WHERE z.uid = s.submitter $category AND q.lid = s.lid AND s.hits = 0 AND s.date > ".time()." ORDER BY s.date ASC LIMIT 100";
else
    $sql = "SELECT s.*, q.*, z.uname FROM ".$xoopsDB->prefix('myalbum_photos')." s, ".$xoopsDB->prefix('myalbum_text')." q, ".$xoopsDB->prefix('users')." z WHERE z.uid = s.submitter $category AND s.submitter = ".$uid." AND q.lid = s.lid AND s.hits = 0 ORDER BY s.date DESC LIMIT 100";

$result = $xoopsDB->query($sql);
$RowsNum = $xoopsDB->getRowsNum($result);
if(!$result) 
{
    echo "Errore: ".mysql_error();
    exit;
}

if($xoopsUser)
    if($RowsNum >0)
	$tue_inserzioni = ' | <a style="color: #696867; font-weight: bold;" href="marketplace.php?uid='.$xoopsUser->getVar('uid').'">LE TUE INSERZIONI</a>';

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

$menu_tendina = '
<form name="MenuTendina">
	<select name="selectThis" size="1" onChange="goThere(this.form);">
		<option selected value="">Seleziona una categoria...</option>
		<option value="marketplace.php?cid=0" '.$selected0.'>Tutte le categorie</option>
		<option value="marketplace.php?cid=2" '.$selected2.'>Tavole</option>
		<option value="marketplace.php?cid=3" '.$selected3.'>Attacchi</option>
		<option value="marketplace.php?cid=1" '.$selected1.'>Scarponi</option>
		<option value="marketplace.php?cid=4" '.$selected4.'>Altro</option>
	</select>
</form>
';

echo '<div style="">';

if(!$xoopsUser) 
	{
		echo'<div id="mercatino_avviso">Per poter utilizzare il mercatino in tutte le funzionalit&agrave; bisogna essere registrati</div>';	
	}

if($xoopsUser) { 
echo'
<div style="text-align: center; width: 100%;">
	<div style="float: left; width: 620px; padding-top: 0px; padding-bottom: 15px; text-align: center;">
		<a style="color: #696867; font-weight: bold;" href="submit.php">AGGIUNGI UN PRODOTTO</a>'.$tue_inserzioni.' |  
		<a style="color: #696867; font-weight: bold;" href="aste_concluse.php">VENDITE CONCLUSE</a> | 
		<a style="color: #696867; font-weight: bold;" href="'.XOOPS_URL.'/modules/newbb/viewforum.php?forum=16">CERCA</a>
	</div>
	<div style="float: right; width: 150px; padding-top: 0px; padding-top: 0px; padding-bottom: 20px; text-align: center; padding-right: 15px;">'.$menu_tendina.'</div>
	<div style="float: right; width: 150px; padding-top: 0px; padding-top: 0px; padding-bottom: 20px; text-align: center; padding-right: 15px;"><a href="'.XOOPS_URL.'/modules/wfsection/article.php?articleid=134">Regole del mercatino</a></div>
</div>
<div style="clear: both;"></div>
';
}


echo'
<table class="index_category" cellspacing="0" width="100%">
<tr class="head">
<td>Foto</td>
<td>Titolo</td>
<td>Prezzo</td>
<td>Venditore</td>
<td>Scadenza</td>
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
echo'
<tr class="'.$class.'" align="center" valign="middle">
<td style="padding-left: 10px; padding-right: 10px;"><a href="prodotto_dettaglio.php?id_prodotto='.$myrow['lid'].'"><img src="'.XOOPS_URL.'/uploads/thumbs/'.$myrow['lid'].'.'.$myrow['ext'].'" '.$misure.' border="0" style="border: 1px solid #000000;"></a></td>
<td style="padding-left: 10px; padding-right: 10px;"><a href="prodotto_dettaglio.php?id_prodotto='.$myrow['lid'].'">'.$myrow['title'].'</a></td>
<td style="padding-left: 10px; padding-right: 10px;">&euro; '.$myrow['rating'].',00</td>
<td style="padding-left: 10px; padding-right: 10px;"><a href="../smartprofile/user-profile.php?uid='.$myrow['submitter'].'">'.$uname_tmp.'</a></td>
<td style="padding-left: 10px; padding-right: 10px;">'.$in_scadenza.''.date("d/m/Y - G:i",$myrow['date']).'</td>
</tr>
';

}

echo'
</table>
</div>
';

if($count == 0) echo '<div style="text-align: center; padding-top: 20px;">Nessun prodotto nel marcatino</div>';
include XOOPS_ROOT_PATH.'/footer.php';

?>