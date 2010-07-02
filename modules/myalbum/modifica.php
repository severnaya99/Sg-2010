<?php

include ('header.php') ;
include ('../../mainfile.php');
include (XOOPS_ROOT_PATH.'/header.php');
include_once ('../../class/xoopsformloader.php') ;
include_once ('class/myalbum.textsanitizer.php'); 

$myts =& MyTextSanitizer::getInstance();
$now = time();

$id_foto_principale = empty( $_GET['id_foto_principale'] ) ? 0 : intval( $_GET['id_foto_principale'] ) ;
$rmiv = empty( $_GET['rmiv'] ) ? 0 : intval( $_GET['rmiv'] );

if($id_foto_principale == 0)
{
    redirect_header("marketplace.php", 5 , "Id non specificato. Verrai spedito alla pagina principale!");
    exit();
}
if(!$xoopsUser)
{
    redirect_header("marketplace.php", 5 , "Errore!! Accesso non effettuato.");
    exit();
}


//********************************************* SQL RECUPERO DATI*****************************************************************************
$sql = "SELECT * FROM ".$xoopsDB->prefix('myalbum_photos')." WHERE lid = $id_foto_principale";
$sql2 = "SELECT * FROM ".$xoopsDB->prefix('myalbum_text')." WHERE lid = $id_foto_principale";

$result = $xoopsDB->query($sql);
$result2 = $xoopsDB->query($sql2);
if(!$result || !$result2)
{
    echo "Errore: ".mysql_error();
    exit;
}


$myrow = $xoopsDB->fetchArray($result);
$myrow2 = $xoopsDB->fetchArray($result2);
$lid = $id_foto_principale;
$title = $myrow['title'];
$scadenza_db=$myrow['date'];
$description=$myrow2['description'];
$rating = $myrow['rating'];
$luogo=ucwords(strtolower($myrow['luogo']));
$prezzo = $myrow['rating'];
$prezzo_trattabile_db=$myrow['trattabile'];
$carico_spedizione_db=$myrow['carico_spedizione'];
$pagamento_db=$myrow['pagamento'];
$cid_db=$myrow['cid'];

$venditore = $myrow['submitter'];
$user=$xoopsUser->getVar('uid'); // VISITATORE

//*************************************************************************************************************************************
//per modificare bisogna essere o admin o proprietari dell'asta	
if(!$xoopsUser->isAdmin() && $venditore!=$user)
{
    redirect_header("../../user.php?op=logout", 5 , "Tentativo di hack. Verrai disconnesso");
    exit();
}	

if($scadenza_db>$now && $rmiv) // prodotto non scaduto ma tentativo di rinnovo vendita
{
	$rmiv=0;
}
	
//*************************************************************************************************************************************	
$cid = empty( $_POST['cid'] ) ? 0 : intval( $_POST['cid'] ) ;

	include( XOOPS_ROOT_PATH . "/header.php" ) ;
	OpenTable() ;
	 myalbum_header();
	

if($cid) //inserimento dati
{
	$id = empty( $_POST['id'] ) ? 0 : intval( $_POST['id'] );
	$scadenza = intval( $_POST['scadenza'] );
	$rmiv = empty( $_POST['rmiv'] ) ? 0 : intval( $_POST['rmiv'] );
	$title = $myts->stripSlashesGPC( $_POST["title"] );
	$desc_text = $myts->stripSlashesGPC( $_POST["desc_text"] );
	$prezzo = empty( $_POST['prezzo'] ) ? 0 : intval( $_POST['prezzo'] );
	$trattabile = empty( $_POST['trattabile'] ) ? 0 : intval( $_POST['trattabile'] );
	$carico_spedizione = empty( $_POST['carico_spedizione'] ) ? 0 : intval( $_POST['carico_spedizione'] ) ;
	$pagamento = empty( $_POST['pagamento'] ) ? 0 : intval( $_POST['pagamento'] ) ;
	$cid = empty( $_POST['cid'] ) ? 0 : intval( $_POST['cid'] ) ;
	$giorni_asta = empty( $_POST['giorni_asta'] ) ? 0 : intval( $_POST['giorni_asta'] ) ;
	$luogo = $myts->stripSlashesGPC( $_POST["luogo"] ) ;
    
	if($giorni_asta == 0) $date = $scadenza ;
		else if($giorni_asta == 10) $date = time() + (86400*10*90) ;
			else if($giorni_asta == 7) $date = time() + (86400*7*30) ;
				else if($giorni_asta == 5) $date = time() + (86400*5*15) ;
					else if($giorni_asta == 1) $date = time() + (86400*1*7) ;
	
	if($rmiv)
	{
		$scadenza=($date);
	}

	$sql = "UPDATE ".$xoopsDB->prefix('myalbum_photos')."  SET `cid` = '$cid', `title` = '".addslashes($title)."',
`rating` = '$prezzo', `trattabile` = '$trattabile', `carico_spedizione` = '$carico_spedizione', `pagamento` = '$pagamento', `luogo` = '$luogo', `date` = '$scadenza' WHERE `lid` =$id LIMIT 1 ";

	$sql2 = "UPDATE ".$xoopsDB->prefix('myalbum_text')." SET description='".addslashes($desc_text)."' WHERE lid = $id LIMIT 1";

        $result = $xoopsDB->query($sql);
	$result2 = $xoopsDB->query($sql2);
	if(!$result || !$result2)
	{
	    redirect_header("../../modules/myalbum/marketplace.php", 3 , "Errore modifica dati!");
		exit () ;
	}
	
	redirect_header("../../modules/myalbum/prodotto_dettaglio.php?id_prodotto=".$id_foto_principale."", 3, "Modifica avvenuta con successo!!");
	exit () ;

}

else if(!$cid) //modifica dati
{
	switch ($prezzo_trattabile_db)
	{
		case 0:
			$prezzo_trattabile = new XoopsFormSelect( "Prezzo trattabile?" , "trattabile"  ) ;
       		$prezzo_trattabile->addOption( "0" , "No" ) ;
			$prezzo_trattabile->addOption( "1" , "Si" ) ;
       		break;
		case 1:
      		$prezzo_trattabile = new XoopsFormSelect( "Prezzo trattabile?" , "trattabile"  ) ;
       		$prezzo_trattabile->addOption( "1" , "Si" ) ;
			$prezzo_trattabile->addOption( "0" , "No" ) ;			
   	   		break;
	} 
	
	switch ($carico_spedizione_db)
	{
        case 0:
     	   	$carico_spedizione = new XoopsFormSelect( "Spedizione a carico del:" , "carico_spedizione"  ) ;
			$carico_spedizione->addOption( "0" , "Mittente" ) ;
			$carico_spedizione->addOption( "1" , "Destinatario" ) ;
     	 	break;
        case 1:
        	$carico_spedizione = new XoopsFormSelect( "Spedizione a carico del:" , "carico_spedizione"  ) ;
        	$carico_spedizione->addOption( "1" , "Destinatario" ) ;	
			$carico_spedizione->addOption( "0" , "Mittente" ) ;
		  	break;
	}
	switch ($pagamento_db)
	{
        case 0:
     	   	$pagamento = new XoopsFormSelect( "Tipo di pagamento:" , "pagamento"  ) ;
			$pagamento->addOption( "0" , "Altro" ) ;
			$pagamento->addOption( "1" , "Contrassegno" ) ;
			$pagamento->addOption( "2" , "Bonifico" ) ;
			$pagamento->addOption( "3" , "Vaglia" ) ;
			$pagamento->addOption( "4" , "PostPay" ) ;
			$pagamento->addOption( "5" , "PayPal" ) ;
     	 	break;
        case 1:
     	   	$pagamento = new XoopsFormSelect( "Tipo di pagamento:" , "pagamento"  ) ;
			$pagamento->addOption( "1" , "Contrassegno" ) ;
			$pagamento->addOption( "0" , "Altro" ) ;
			$pagamento->addOption( "2" , "Bonifico" ) ;
			$pagamento->addOption( "3" , "Vaglia" ) ;
			$pagamento->addOption( "4" , "PostPay" ) ;
			$pagamento->addOption( "5" , "PayPal" ) ;
     	 	break;
        case 2:
     	   	$pagamento = new XoopsFormSelect( "Tipo di pagamento:" , "pagamento"  ) ;
			$pagamento->addOption( "2" , "Bonifico" ) ;
			$pagamento->addOption( "0" , "Altro" ) ;
			$pagamento->addOption( "1" , "Contrassegno" ) ;
			$pagamento->addOption( "3" , "Vaglia" ) ;
			$pagamento->addOption( "4" , "PostPay" ) ;
			$pagamento->addOption( "5" , "PayPal" ) ;
     	 	break;
        case 3:
     	   	$pagamento = new XoopsFormSelect( "Tipo di pagamento:" , "pagamento"  ) ;
			$pagamento->addOption( "3" , "Vaglia" ) ;
			$pagamento->addOption( "0" , "Altro" ) ;
			$pagamento->addOption( "1" , "Contrassegno" ) ;
			$pagamento->addOption( "2" , "Bonifico" ) ;
			$pagamento->addOption( "4" , "PostPay" ) ;
			$pagamento->addOption( "5" , "PayPal" ) ;
     	 	break;
        case 4:
     	   	$pagamento = new XoopsFormSelect( "Tipo di pagamento:" , "pagamento"  ) ;
			$pagamento->addOption( "4" , "PostPay" ) ;
			$pagamento->addOption( "0" , "Altro" ) ;
			$pagamento->addOption( "1" , "Contrassegno" ) ;
			$pagamento->addOption( "2" , "Bonifico" ) ;
			$pagamento->addOption( "3" , "Vaglia" ) ;
			$pagamento->addOption( "5" , "PayPal" ) ;
     	 	break;
        case 5:
     	   	$pagamento = new XoopsFormSelect( "Tipo di pagamento:" , "pagamento"  ) ;
			$pagamento->addOption( "5" , "PayPal" ) ;
			$pagamento->addOption( "0" , "Altro" ) ;
			$pagamento->addOption( "1" , "Contrassegno" ) ;
			$pagamento->addOption( "2" , "Bonifico" ) ;
			$pagamento->addOption( "3" , "Vaglia" ) ;
			$pagamento->addOption( "4" , "PostPay" ) ;
     	 	break;
        
	} 
	switch ($cid_db)
	{

        case 1:
     	   	$cat_select = new XoopsFormSelect( "Tipo oggetto" , "cid"  ) ;
			$cat_select->addOption( "1" , "Scarponi" ) ;
			$cat_select->addOption( "4" , "Altro" ) ;
			$cat_select->addOption( "2" , "Tavole" ) ;
			$cat_select->addOption( "3" , "Attacchi" ) ;
     	 	break;
        case 2:
     	    $cat_select = new XoopsFormSelect( "Tipo oggetto" , "cid"  ) ;
			$cat_select->addOption( "2" , "Tavole" ) ;
			$cat_select->addOption( "1" , "Scarponi" ) ;
			$cat_select->addOption( "4" , "Altro" ) ;
			$cat_select->addOption( "3" , "Attacchi" ) ;
     	 	break;
        case 3:
     	   	$cat_select = new XoopsFormSelect( "Tipo oggetto" , "cid"  ) ;
			$cat_select->addOption( "3" , "Attacchi" ) ;
			$cat_select->addOption( "2" , "Tavole" ) ;
			$cat_select->addOption( "1" , "Scarponi" ) ;
			$cat_select->addOption( "4" , "Altro" ) ;
     	 	break;
        case 4:
     	   	$cat_select = new XoopsFormSelect( "Tipo oggetto" , "cid"  ) ;
			$cat_select->addOption( "4" , "Altro" ) ;
			$cat_select->addOption( "3" , "Attacchi" ) ;
			$cat_select->addOption( "2" , "Tavole" ) ;
			$cat_select->addOption( "1" , "Scarponi" ) ;
     	 	break;        
	} 
	
	$giorni_asta = new XoopsFormSelect( "Rimetti in vendita per altri:" , "giorni_asta"  ) ;
	$giorni_asta->addOption( "0" , "Nessun giorno" ) ;
	$giorni_asta->addOption( "10" , "3 mesi" ) ;
	$giorni_asta->addOption( "7" , "1 mese" ) ;
	$giorni_asta->addOption( "5" , "15 giorni" ) ;
	$giorni_asta->addOption( "1" , "1 settimana" ) ;
	
	
	$form = new XoopsThemeForm( "Modifica prodotto in vendita" , "" , "modifica.php?id_foto_principale=$id_foto_principale" ) ;
	$id = new XoopsFormHidden( "id" , $id_foto_principale  ) ; 
	$rmiv_form = new XoopsFormHidden( "rmiv" , $rmiv );	
	$scadenza = new XoopsFormHidden( "scadenza" , $scadenza_db );
	$title_text = new XoopsFormText( _ALBM_PHOTOTITLE , "title" , 50 , 255 , $title );
	//$description_text = new XoopsFormText( "Descrizione:" , "desc_text" , 50 , 255, $description  );
	$description_text = new XoopsFormTextArea( "Descrizione:" , "desc_text" , $description , 1 , 50) ;
	$luogo_text = new XoopsFormText( "Luogo in cui si trova l'oggetto:" , "luogo" , 50 , 255, $luogo  );
	$prezzo_text = new XoopsFormText( "Prezzo:" , "prezzo" , 50 , 255, $prezzo  );
	$submit_button = new XoopsFormButton( "" , "submit" , _SUBMIT , "submit" ) ;
	$submit_tray = new XoopsFormElementTray( '' ) ;
	$submit_tray->addElement( $submit_button ) ;

	$form->addElement( $id ) ;
	$form->addElement( $rmiv_form ) ;
	$form->addElement( $scadenza ) ; 
	$form->addElement( $title_text );
	$form->addElement( $description_text );
	$form->addElement( $prezzo_text );
	$form->addElement( $prezzo_trattabile );
	$form->addElement( $carico_spedizione ); 
	$form->addElement( $pagamento);
	$form->addElement( $cat_select);
	if ($rmiv)
	{
		$form->addElement($giorni_asta);	
	}
	$form->addElement( $luogo_text );
	$form->addElement( $submit_tray ) ;
	$form->setRequired( $cat_select );
	$form->display() ;
	CloseTable() ;
	myalbum_footer() ;
	include( XOOPS_ROOT_PATH . "/footer.php" ) ;
//*************************************************************************************************************************************

}//chiudo if (!$cid)





myalbum_footer() ;
include XOOPS_ROOT_PATH.'/footer.php';

?>