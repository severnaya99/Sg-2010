<?php
// Module Info

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'MYALBUM_MI_LOADED' ) ) {


// Appended by Xoops Language Checker -GIJOE- in 2004-10-04 16:06:34
define('_ALBM_CFG_DEFAULTORDER','Default order in category\'s view');

define( 'MYALBUM_MI_LOADED' , 1 ) ;

// The name of this module
define("_ALBM_MYALBUM_NAME","MyAlbum");

// A brief description of this module
define("_ALBM_MYALBUM_DESC","Crea una sezione di immagini dove gli utenti possono gestire immagini e fotografie.");

// Names of blocks for this module (Not all module has blocks)
define("_ALBM_BNAME_RECENT","Foto recenti");
define("_ALBM_BNAME_HITS","Foto migliori");
define("_ALBM_BNAME_RANDOM","Foto a caso");
define("_ALBM_BNAME_RECENT_P","Foto recenti (anteprima)");
define("_ALBM_BNAME_HITS_P","Foto migliori (anteprima)");

// Config Items
define( "_ALBM_CFG_PHOTOSPATH" , "Percorso delle immagini" ) ;
define( "_ALBM_CFG_DESCPHOTOSPATH" , "Percorso relativo alla cartella d'installazione di XOOPS.<br />(Il PRIMO carattere deve essere '/' e non l'ultimo)<br />Setta i permessi a 777 o 707 su Unix." ) ;
define( "_ALBM_CFG_THUMBSPATH" , "Percorso delle anteprime" ) ;
define( "_ALBM_CFG_DESCTHUMBSPATH" , "(come per 'Percorso delle immagini')." ) ;
//define( "_ALBM_CFG_USEIMAGICK" , "Use ImageMagick for treating images" ) ;
//define( "_ALBM_CFG_DESCIMAGICK" , "Not use ImageMagick cause Not work resize or rotate the main photo, and make thumbnails by GD.<br />You'd better use ImageMagick if you can." ) ;
define( "_ALBM_CFG_IMAGINGPIPE" , "Metodo di trattamento delle immagini" ) ;
define( "_ALBM_CFG_DESCIMAGINGPIPE" , "Praticamente ogni ambiente PHP può utilizzare GD, ma le funzionalità sono limitate. Utlizza ImageMagick o NetPBM se puoi." ) ;
define( "_ALBM_CFG_FORCEGD2" , "Forza conversione GD2" ) ;
define( "_ALBM_CFG_DESCFORCEGD2" , "Anche se GD è presente  forza la conversione GD2(truecolor).<br />(Valido solo se stai usando GD)" ) ;
define( "_ALBM_CFG_IMAGICKPATH" , "Percorso di ImageMagick" ) ;
define( "_ALBM_CFG_DESCIMAGICKPATH" , "Può anche essere lasciato vuoto.<br />(Valido solo se stai usando ImageMagick)" ) ;
define( "_ALBM_CFG_NETPBMPATH" , "Percorso di NetPBM" ) ;
define( "_ALBM_CFG_DESCNETPBMPATH" , "Può anche essere lasciato vuoto.<br />(Valido solo se stai usando NetPBM)" ) ;
define( "_ALBM_CFG_POPULAR" , "Visite per essere 'popolare'" ) ;
define( "_ALBM_CFG_NEWDAYS" , "Durata delle icone 'nuovo' e 'aggiornato'" ) ;
define( "_ALBM_CFG_NEWPHOTOS" , "Numero di nuove foto nella pagina principale" ) ;
define( "_ALBM_CFG_PERPAGE" , "Foto per pagina" ) ;
define( "_ALBM_CFG_DESCPERPAGE" , "Immeti i valori separati da '|'<br />Es. 10|20|50|100" ) ;
define( "_ALBM_CFG_ALLOWNOIMAGE" , "Permetti un'invio senza immagini" ) ;
define( "_ALBM_CFG_MAKETHUMB" , "Crea anteprime" ) ;
define( "_ALBM_CFG_DESCMAKETHUMB" , "Se cambi da 'No' a 'Si' faresti meglio a ricreare le anteprime." ) ;
//define( "_ALBM_CFG_THUMBWIDTH" , "Thumb Image Width" ) ;
//define( "_ALBM_CFG_DESCTHUMBWIDTH" , "The height of thumbs will be decided from the width automatically." ) ;
define( "_ALBM_CFG_THUMBSIZE" , "Dimensioni anteprime (pixel)" ) ;
define( "_ALBM_CFG_THUMBRULE" , "Aspetto delle anteprime" ) ;
define( "_ALBM_CFG_WIDTH" , "Larghezza massima" ) ;
define( "_ALBM_CFG_DESCWIDTH" , "Larghezza massima nel caso l'immagine venga ridimensionata.<br />Se stai usando GD (e non GD2) viene inteso come limitatore di larghezza." ) ;
define( "_ALBM_CFG_HEIGHT" , "Altezza massima" ) ;
define( "_ALBM_CFG_DESCHEIGHT" , "(come per 'Larghezza massima')." ) ;
define( "_ALBM_CFG_FSIZE" , "Dimensione massima (byte)" ) ;
define( "_ALBM_CFG_DESCFSIZE" , "Limitazione delle immagini inviate con upload." ) ;
define( "_ALBM_CFG_MIDDLEPIXEL" , "Dimensione massima da mostrare" ) ;
define( "_ALBM_CFG_DESCMIDDLEPIXEL" , "Specifica (larghezza)x(altezza)<br />Es. 480x480" ) ;
define( "_ALBM_CFG_ADDPOSTS" , "Numero di post aggiunti all'utente che invia una foto" ) ;
define( "_ALBM_CFG_DESCADDPOSTS" , "Normalmente 0 o 1. Valori negativi vengono considerati come 0" ) ;
define( "_ALBM_CFG_CATONSUBMENU" , "Registra le categorie principali nel sottomenu" ) ;
define( "_ALBM_CFG_NAMEORUNAME" , "Mostra chi ha inviato le foto" ) ;
define( "_ALBM_CFG_DESCNAMEORUNAME" , "Seleziona il tipo di 'nome' mostrato" ) ;
define( "_ALBM_CFG_VIEWCATTYPE" , "Vista utilizzata" ) ;
define( "_ALBM_CFG_COLSOFTABLEVIEW" , "Numero di colonne visualizzate in modalità 'Tabella'" ) ;
define( "_ALBM_CFG_ALLOWEDEXTS" , "Estensioni consentite negli upload" ) ;
define( "_ALBM_CFG_DESCALLOWEDEXTS" , "Inserisci le estensioni separate da '|'. (Es. 'jpg|jpeg|gif|png') .<br />tutti i caratteri devono essere minuscoli. Non inserire punti o spazi<br />NON aggiungere php or phtml, etc." ) ;
define( "_ALBM_CFG_ALLOWEDMIME" , "MIME Types consentiti" ) ;
define( "_ALBM_CFG_DESCALLOWEDMIME" , "Iserisci i MIME Types separati da '|'. (Es. 'image/gif|image/jpeg|image/png')" ) ;
define( "_ALBM_CFG_USESITEIMG" , "Usa [siteimg] nel Gestore Immagini di XOOPS" ) ;
define( "_ALBM_CFG_DESCUSESITEIMG" , "Il Gestore Immagini di XOOPS utilizzerà [siteimg] al posto di [img].<br />Vedi il README per le istruzioni su come abilitare il tag [siteimg]" ) ;

define( "_ALBM_OPT_USENAME" , "Nome" ) ;
define( "_ALBM_OPT_USEUNAME" , "Login" ) ;

define( "_ALBUM_OPT_CALCFROMWIDTH" , "Larghezza specificata" ) ;
define( "_ALBUM_OPT_CALCFROMHEIGHT" , "Altezza specificata" ) ;
define( "_ALBUM_OPT_CALCWHINSIDEBOX" , "Mantieni aspetto" ) ;

define( "_ALBM_OPT_VIEWLIST" , "Elenco" ) ;
define( "_ALBM_OPT_VIEWTABLE" , "Tabella" ) ;


// Sub menu titles
define("_ALBM_TEXT_SMNAME1","Invia");
define("_ALBM_TEXT_SMNAME2","Le più viste");
define("_ALBM_TEXT_SMNAME3","Le più votate");
define("_ALBM_TEXT_SMNAME4","Le mie foto");

// Names of admin menu items
define("_ALBM_MYALBUM_ADMENU0","Immagini inviate");
define("_ALBM_MYALBUM_ADMENU1","Gestione immagini");
define("_ALBM_MYALBUM_ADMENU2","Gestione categorie");
define("_ALBM_MYALBUM_ADMENU_GPERM","Permessi globali");
define("_ALBM_MYALBUM_ADMENU3","Controllo configurazione del server");
define("_ALBM_MYALBUM_ADMENU4","Registrazione 'batch'");
define("_ALBM_MYALBUM_ADMENU5","Generazione anteprime");
define("_ALBM_MYALBUM_ADMENU_IMPORT","Importa immagini");
define("_ALBM_MYALBUM_ADMENU_EXPORT","Esporta immagini");
define("_ALBM_MYALBUM_ADMENU_MYBLOCKSADMIN","Gestione Blocchi e Gruppi");


// Text for notifications
define('_MI_MYALBUM_GLOBAL_NOTIFY', 'Generale');
define('_MI_MYALBUM_GLOBAL_NOTIFYDSC', 'Opzioni di notifica globale in myAlbum-P');
define('_MI_MYALBUM_CATEGORY_NOTIFY', 'Categoria');
define('_MI_MYALBUM_CATEGORY_NOTIFYDSC', 'Opzioni di notifica per la categoria corrente');
define('_MI_MYALBUM_PHOTO_NOTIFY', 'Foto');
define('_MI_MYALBUM_PHOTO_NOTIFYDSC', 'Opzioni di notifica per la foto corrente');

define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFY', 'Nuova foto');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYCAP', 'Notificami quando viene pubblicata una nuova foto');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYDSC', 'Ricevi una notifica  quando viene pubblicata una nuova foto');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE}: auto-notifica : Nuova foto');

define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFY', 'Nuova foto');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYCAP', 'Notificami quando viene pubblicata una  nuova foto in questa categoria');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYDSC', 'Ricevi una notifica quando viene pubblicata una  nuova foto in questa categoria');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE}: auto-notifica : Nuova foto');

}

?>
