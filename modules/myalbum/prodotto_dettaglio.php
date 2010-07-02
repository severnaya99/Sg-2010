<?php

include '../../mainfile.php';
include XOOPS_ROOT_PATH.'/header.php';

global $xoopsDB;
global $xoopsUser;
$myts =& MyTextSanitizer::getInstance();
$id_prodotto = empty( $_GET['id_prodotto'] ) ? 0 : intval( $_GET['id_prodotto'] ) ;
$limit = 1;
$html = 1;
$smiley = 1;
$title_length = 800; //Lunghezza massima titolo
$hometext_length = 250; //Lunghezza massima di hometext

if($id_prodotto == 0)
{
redirect_header("marketplace.php", 5 , "Id non specificato. Verrai spedito alla pagina principale!");
exit();
}

$sql = "SELECT s.*, q.*, z.uname FROM ".$xoopsDB->prefix('myalbum_photos')." s, ".$xoopsDB->prefix('myalbum_text')." q, ".$xoopsDB->prefix('users')." z WHERE z.uid = s.submitter AND s.lid = q.lid AND (s.lid = $id_prodotto OR s.hits = $id_prodotto) ORDER BY s.lid ASC";
$result = $xoopsDB->query($sql);
if(!$result)
{
    echo "Errore: ".mysql_error();
    exit;
}
$count = 0;

while($myrow = $xoopsDB->fetchArray($result))
{
    $count++;
    if($count == 1)
    {

//***************************************Modifica dati
	if($myrow['trattabile'])
		$myrow['trattabile']="Si";
	else
		$myrow['trattabile']="No";
//------------------------------------------------------		
	if($myrow['carico_spedizione'])
		$myrow['carico_spedizione']="Destinatario";
	else
		$myrow['carico_spedizione']="Mittente";
//------------------------------------------------------		
	if($myrow['pagamento']==0)
		$myrow['pagamento']="Altro";
	else if($myrow['pagamento']==1)
		$myrow['pagamento']="Contrassegno";
	else if($myrow['pagamento']==2)
		$myrow['pagamento']="Bonifico";
	else if($myrow['pagamento']==3)
		$myrow['pagamento']="Vaglia";
	else if($myrow['pagamento']==4)
		$myrow['pagamento']="PostPay";
	else if($myrow['pagamento']==5)
		$myrow['pagamento']="PayPal";
//------------------------------------------------------		
	$luogo=ucwords(strtolower($myrow['luogo']));
	
//****************************************************
	
	
	
	
	
	$counter_tmp = $myrow['votes'];
	$submitter_tmp = $myrow['submitter'];
	$uname_tmp =  $myrow['uname'];
	$time_tmp =  $myrow['date'];
	$now = time();
	
	if($time_tmp < $now || !$xoopsUser)
		echo'<div id="mercatino_avviso">';

	if(!$xoopsUser)
		echo'Per poter contattare il venditore bisogna essere registrati.&nbsp;';
	if($time_tmp < $now)
		echo'Asta scaduta.';
	if($time_tmp < $now || !$xoopsUser)
		echo'</div>';
	
	echo'<table id=table_prodotto>';
	if($xoopsUser)
	{
            echo'
                <tr><td id=table_prodotto_td>Venditore:</td>
                <td colspan="2"><a href="../smartprofile/user-profile.php?uid='.$submitter_tmp.'">'.$uname_tmp.'</a></td></tr>
                ';
	}
	echo'<tr><td id=table_prodotto_td>Oggetto:</td><td colspan="2"> '.$myrow['title'].'</td></tr>';
	echo'<tr><td id=table_prodotto_td>Descrizione:</td><td colspan="2"> '.$myrow['description'].'</td></tr>';
	$descr=$myrow['description'];
	echo'<tr><td id=table_prodotto_td>Scadenza della vendita:</td><td id=table_prodotto_scadenza colspan="2"> '.date("d/m/Y - G:i",$myrow['date']).'</td></tr>';
	echo'<tr><td id=table_prodotto_td>Prezzo:</td><td colspan="2"> &euro;'.$myrow['rating'].',00</td></tr>';
	echo'<tr><td id=table_prodotto_td>Prezzo trattabile:</td><td colspan="2"> '.$myrow['trattabile'].'</td></tr>';
	echo'<tr><td id=table_prodotto_td>Spedizione a carico del:</td><td colspan="2"> '.$myrow['carico_spedizione'].'</td></tr>';
	echo'<tr><td id=table_prodotto_td>Tipo pagamento:</td><td colspan="2"> '.$myrow['pagamento'].'</td></tr>';
	echo'<tr><td id=table_prodotto_td>Dove si trova l\' oggetto:</td><td colspan="2"> '.$luogo.'</td></tr>';

	
//********************************************************FOTO**********************************************************************
    echo'<tr><td colspan="3" align="center">';
    $img_principale=$myrow['lid'];
    
    }// CHIUDO if ($count == 1)

        list($width, $height, $type, $attr) = getimagesize(XOOPS_URL."/uploads/photos/".$myrow['lid'].".".$myrow['ext']);
	//if ($width >= $height) {$misure = 'width=100';}
	//if ($width < $height) {$misure = 'height=100';}
	$misure = 'height=100';
	echo"
            <a href='".XOOPS_URL."/uploads/photos/".$myrow['lid'].".".$myrow['ext']."' target='_blank' onClick=\"window.open('".XOOPS_URL."/uploads/photos/".$myrow['lid'].".".$myrow['ext']."','','width=".$myrow['res_x'].",height=".$myrow['res_y']."');return(false);\">
            <img src='".XOOPS_URL."/uploads/thumbs/".$myrow['lid'].".".$myrow['ext']."' $misure border='0' style='border: 1px solid #000000;'>
            </a>
            ";
 }// chiusura while($myrow = $xoopsDB->fetchArray($result))
 
 
echo'</td></tr>'; //chiudo riga immagini
if($xoopsUser)
	echo'<tr><td id=table_prodotto_td colspan="3">Azioni:</td></tr>';
//********************************************************************PULSANTI PER UTENTI REGISTRATI******************************************

echo'<tr><td align="center">';
if($xoopsUser)
{
        if($submitter_tmp == $xoopsUser->getVar('uid'))
        {
// entro qui dentro se il visitatore � uguale al venditore
            $dis_tmp = 'disabled';
            $user=true;
        }
	if($time_tmp > $now)
	{
            if (!$user)
            {
            	echo'
                	<button  style="background:#ea892a; width:130px; height:20px;" OnClick="openWithSelfMain(\''.XOOPS_URL.'/pmmercatino.php?send2=1&obj=1&to_userid='.$submitter_tmp.'\', \'pmlite\', 600, 500);">
                	<b>Contatta venditore</b>
	                </button>
                	';
            }
    } 
}
echo'</td><td align="center">';
echo'';
	
echo'</td><td align="center">';
if($xoopsUser)
    {
        if($submitter_tmp == $xoopsUser->getVar('uid'))
        {
// entro qui dentro se il visitatore � uguale al venditore
            $dis_tmp = 'disabled';
            $user=true;
        }
		if($time_tmp > $now)
		{
            if (!$user)
            echo'
                <button  style="background:#ea892a; width:130px; height:20px;" OnClick="openWithSelfMain(\''.XOOPS_URL.'/pmmercatino.php?send2=1&obj=2&to_userid='.$s.'\', \'pmlite\', 600, 500);">
                <b>Segnala abuso</b>
                </button>
                ';
    	} 
    }
echo'</td></tr>'; //chiudo riga pulsanti 1

//**************************PULSANTI PER UTENTI Speciali****************************
echo'<tr ><td align="center" width="200">';
if($xoopsUser && $xoopsUser->isAdmin() || $user )
    echo'
        <a href="modifica.php?rmiv=0&id_foto_principale='.$img_principale.'">
        <button  style="background:#ea892a; width:130px; height:20px;">
        <b>Modifica</b>
        </button>
        </a>';
        
echo'</td><td align="center">';
if($xoopsUser && $time_tmp > $now && $submitter_tmp == $xoopsUser->getVar('uid'))
    echo'
        <a href="submit.php?id_foto_principale='.$img_principale.'">
        <button style="background:#ea892a; width:130px; height:20px;">
        <b>Aggiungi foto</b>
        </button>
        </a>';
elseif($xoopsUser && ($xoopsUser->isAdmin() || $user) &&  $time_tmp < $now)
	 echo'
        <a href="modifica.php?rmiv=1&id_foto_principale='.$img_principale.'">
        <button style="background:#ea892a; width:130px; height:20px;">
        <b>Rimetti in vendita</b>
        </button>
        </a>';
        
        
echo'</td><td align="center" width="200">';
if($xoopsUser && $xoopsUser->isAdmin() || $user )
    echo'<a href="cancella_prodotto.php?id_prodotto='.$img_principale.'">
        <button style="background:#ff0000; width:130px; height:20px;">
        <b>Cancella vendita</b>
        </button>
        </a>';

echo'</td></tr>'; //chiudo riga pulsanti 2
//*************************CHIUSURA TABELLA**************************
echo'</table>';
echo'<p></p><div id="mercatino_ritorno"><a href="marketplace.php">Ritorna al mercatino.</a></div>';


include XOOPS_ROOT_PATH.'/footer.php';

?>