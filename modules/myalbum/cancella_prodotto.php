<?php

include '../../mainfile.php';

global $xoopsDB;
global $xoopsUser;
$myts =& MyTextSanitizer::getInstance();
$id_prodotto = empty( $_GET['id_prodotto'] ) ? 0 : intval( $_GET['id_prodotto'] ) ;
$limit = 1;
$html = 1;
$smiley = 1;
$title_length = 800; //Lunghezza massima titolo
$hometext_length = 250; //Lunghezza massima di hometext
$user=$xoopsUser->getVar('uid');

$sql = "SELECT submitter FROM ".$xoopsDB->prefix('myalbum_photos')." WHERE lid = ".$id_prodotto."";
//echo "$sql";
$result = $xoopsDB->query($sql);
if(!$result) {
    echo "Errore: ".mysql_error();
    exit;
    }
$myrow = $xoopsDB->fetchArray($result);
$venditore = $myrow['submitter'];

if($id_prodotto == 0)
{
	redirect_header("marketplace.php", 5 , "Id non specificato. Verrai spedito alla pagina principale!");
	exit();
}

if($venditore!=$user && !($xoopsUser->isAdmin()))
{
    redirect_header("marketplace.php", 5 , "Non puoi cancellare questo prodotto.");
    exit();
}

$sql1 = "DELETE FROM ".$xoopsDB->prefix('myalbum_photos')." WHERE lid = ".$id_prodotto."";
$result1 = $xoopsDB->queryF($sql1);
if(!$result1) {
    echo "Errore: ".mysql_error();
    exit();
    }
    
$sql2 = "DELETE FROM ".$xoopsDB->prefix('myalbum_photos')." WHERE hits = ".$id_prodotto."";
$result2 = $xoopsDB->queryF($sql2);
if(!$result2) {
    echo "Errore: ".mysql_error();
    exit();
    }
      
redirect_header("marketplace.php", 5 , "Prodotto cancellato!");
exit();

?>