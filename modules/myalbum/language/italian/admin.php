<?php

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'MYALBUM_AM_LOADED' ) ) {


// Appended by Xoops Language Checker -GIJOE- in 2007-08-24 18:18:03
define('_MD_A_MYMENU_MYTPLSADMIN','Templates');
define('_MD_A_MYMENU_MYBLOCKSADMIN','Blocks/Permissions');
define('_MD_A_MYMENU_MYPREFERENCES','Preferences');

define( 'MYALBUM_AM_LOADED' , 1 ) ;

// Index (Categories)
define( "_AM_H3_FMT_CATEGORIES" , "Gestione categorie (%s)" ) ;
define( "_AM_CAT_TH_TITLE" , "Nome" ) ;
define( "_AM_CAT_TH_PHOTOS" , "Immagini" ) ;
define( "_AM_CAT_TH_OPERATION" , "Operazione" ) ;
define( "_AM_CAT_TH_IMAGE" , "Immagine" ) ;
define( "_AM_CAT_TH_PARENT" , "Crea in" ) ;
define( "_AM_CAT_TH_IMGURL" , "URL immagine" ) ;
define( "_AM_CAT_MENU_NEW" , "Creating a category" ) ;
define( "_AM_CAT_MENU_EDIT" , "Editing a category" ) ;
define( "_AM_CAT_INSERTED" , "Categoria aggiunta" ) ;
define( "_AM_CAT_UPDATED" , "Categoria moficiata" ) ;
define( "_AM_CAT_BTN_BATCH" , "Applica" ) ;
define( "_AM_CAT_LINK_MAKETOPCAT" , "Crea una categoria principale" ) ;
define( "_AM_CAT_LINK_ADDPHOTOS" , "Aggiungi una foto in questa categoria" ) ;
define( "_AM_CAT_LINK_EDIT" , "Modifica questa categoria" ) ;
define( "_AM_CAT_LINK_MAKESUBCAT" , "Crea una sottocategoria" ) ;
define( "_AM_CAT_FMT_NEEDADMISSION" , "%s foto in attesa di approvazione" ) ;
define( "_AM_CAT_FMT_CATDELCONFIRM" , "%s sarà cancellata con tutte le immagini, commenti e sottocategorie. Procedo?" ) ;


// Admission
define( "_AM_H3_FMT_ADMISSION" , "Approvazione immagini (%s)" ) ;
define( "_AM_TH_SUBMITTER" , "Inviato da" ) ;
define( "_AM_TH_TITLE" , "Titolo" ) ;
define( "_AM_TH_DESCRIPTION" , "Descrizione" ) ;
define( "_AM_TH_CATEGORIES" , "Categoria" ) ;
define( "_AM_TH_DATE" , "Ultimo aggiornamento" ) ;


// Photo Manager
define( "_AM_H3_FMT_PHOTOMANAGER" , "Gestione Immagini (%s)" ) ;
define( "_AM_TH_BATCHUPDATE" , "Aggiorna tutte le foto selezionate" ) ;
define( "_AM_OPT_NOCHANGE" , "- NESSUN CAMBIAMENTO -" ) ;
define( "_AM_JS_UPDATECONFIRM" , "Le foto selezionate sarann aggiornate. Procedo?" ) ;


// Module Checker
define( "_AM_H3_FMT_MODULECHECKER" , "myAlbum-P - Controllo configurazione (%s)" ) ;

define( "_AM_H4_ENVIRONMENT" , "Controllo variabili d'ambiente" ) ;
define( "_AM_MB_PHPDIRECTIVE" , "PHP" ) ;
define( "_AM_MB_BOTHOK" , "entrambi ok" ) ;
define( "_AM_MB_NEEDON" , "deve essere on" ) ;


define( "_AM_H4_TABLE" , "Controllo tabelle" ) ;
define( "_AM_MB_PHOTOSTABLE" , "Tebella Foto" ) ;
define( "_AM_MB_DESCRIPTIONTABLE" , "Tabella Descrizioni" ) ;
define( "_AM_MB_CATEGORIESTABLE" , "Tabelle Categorie" ) ;
define( "_AM_MB_VOTEDATATABLE" , "Tabella Voti" ) ;
define( "_AM_MB_COMMENTSTABLE" , "Tabella Commenti" ) ;
define( "_AM_MB_NUMBEROFPHOTOS" , "N. immagini" ) ;
define( "_AM_MB_NUMBEROFDESCRIPTIONS" , "N. descrizioni" ) ;
define( "_AM_MB_NUMBEROFCATEGORIES" , "N. categorie" ) ;
define( "_AM_MB_NUMBEROFVOTEDATA" , "N. di voti" ) ;
define( "_AM_MB_NUMBEROFCOMMENTS" , "N. di commenti" ) ;


define( "_AM_H4_CONFIG" , "Controllo Configurazione" ) ;
define( "_AM_MB_PIPEFORIMAGES" , "Gestore immagini" ) ;
define( "_AM_MB_DIRECTORYFORPHOTOS" , "Directory delle immagini" ) ;
define( "_AM_MB_DIRECTORYFORTHUMBS" , "Directory delle anteprime" ) ;
define( "_AM_ERR_LASTCHAR" , "Errore: L'ultimo carattere non deve essere '/'" ) ;
define( "_AM_ERR_FIRSTCHAR" , "Errore: Il primo carattere deve essere '/'" ) ;
define( "_AM_ERR_PERMISSION" , "Errore: Crea una cartella con i permessi appropriati. (chmod 777)" ) ;
define( "_AM_ERR_NOTDIRECTORY" , "Errore: Non è una directory!" ) ;
define( "_AM_ERR_READORWRITE" , "Errore: Questa directory deve avere permessi di lettura e scrittura. (chmod 777)" ) ;
define( "_AM_ERR_SAMEDIR" , "Errore: I percorsi delle immagini e delle anteprime devono essere diversi!" ) ;
define( "_AM_LNK_CHECKGD2" , "Controlla il funzionamento delle librerie 'GD2'" ) ;
define( "_AM_MB_CHECKGD2" , "Se la pagina qui linkata non funziona   nonworking your GD as truecolor mode." ) ;
define( "_AM_MB_GD2SUCCESS" , "Tutto OK!<br />Le estesioni GD2 (truecolor) sono funzionanati!" ) ;


define( "_AM_H4_PHOTOLINK" , "Controllo consistenza foto e anteprime" ) ;
define( "_AM_MB_NOWCHECKING" , "Controllo ." ) ;
define( "_AM_FMT_PHOTONOTREADABLE" , "immagine (%s) non è leggibile." ) ;
define( "_AM_FMT_THUMBNOTREADABLE" , "anteprima (%s) non è leggibile." ) ;
define( "_AM_FMT_NUMBEROFDEADPHOTOS" , "%s foto non trovate." ) ;
define( "_AM_FMT_NUMBEROFDEADTHUMBS" , "%s anteprime non trovate." ) ;
define( "_AM_FMT_NUMBEROFREMOVEDTMPS" , "%s file estranei eliminati." ) ;
define( "_AM_LINK_REDOTHUMBS" , "ricrea anteprime" ) ;
define( "_AM_LINK_TABLEMAINTENANCE" , "maintain tables" ) ;



// Redo Thumbnail
define( "_AM_H3_FMT_RECORDMAINTENANCE" , "myAlbum-P - Manutenzione immagini (%s)" ) ;

define( "_AM_FMT_CHECKING" , "%s ..." ) ;

define( "_AM_FORM_RECORDMAINTENANCE" , "Operazioni di manutenzione: creazione anteprime, etc." ) ;

define( "_AM_MB_FAILEDREADING" , "failed reading." ) ;
define( "_AM_MB_CREATEDTHUMBS" , "anteprima creata." ) ;
define( "_AM_MB_BIGTHUMBS" , "anteprima non creata. immagine copiata." ) ;
define( "_AM_MB_SKIPPED" , "anteprima già esistente." ) ;
define( "_AM_MB_SIZEREPAIRED" , "(campo 'dimensione' riparato)" ) ;
define( "_AM_MB_RECREMOVED" , "record rimosso." ) ;
define( "_AM_MB_PHOTONOTEXISTS" , "la foto principale non esiste." ) ;
define( "_AM_MB_PHOTORESIZED" , "la foto principale è stata ridimensionata." ) ;

define( "_AM_TEXT_RECORDFORSTARTING" , "Record iniziale" ) ;
define( "_AM_TEXT_NUMBERATATIME" , "Numero di record processati per volta" ) ;
define( "_AM_LABEL_DESCNUMBERATATIME" , "Attenzione, un numero troppo elevato può mandare il server in timeout." ) ;

define( "_AM_RADIO_FORCEREDO" , "Ricrea anteprima anche se già esistente" ) ;
define( "_AM_RADIO_REMOVEREC" , "Elimina immagini che non esisteno nel database" ) ;
define( "_AM_RADIO_RESIZE" , "Ridimensiona immagini più grandi di quelle specificate" ) ;

define( "_AM_MB_FINISHED" , "Finito!" ) ;
define( "_AM_LINK_RESTART" , "Ricomincia" ) ;
define( "_AM_SUBMIT_NEXT" , "Continua" ) ;



// Batch Register
define( "_AM_H3_FMT_BATCHREGISTER" , "myAlbum-P - Registrazione batch (%s)" ) ;


// GroupPerm Global
define( "_AM_ALBM_GROUPPERM_GLOBAL" , "Permessi globali" ) ;
define( "_AM_ALBM_GROUPPERM_GLOBALDESC" , "Configura i permessi di gruppo" ) ;
define( "_AM_ALBM_GPERMUPDATED" , "Permessi cambiati" ) ;


// Import
define( "_AM_H3_FMT_IMPORTTO" , 'Importa immagini da un\'altro modulo a %s' ) ;
define( "_AM_FMT_IMPORTFROMMYALBUMP" , 'Importa da "%s" come  clone di myAlbum-P' ) ;
define( "_AM_FMT_IMPORTFROMIMAGEMANAGER" , 'Importa dal gestore immagini di XOOPS' ) ;
define( "_AM_CB_IMPORTRECURSIVELY" , 'Importa le sottocategorie' ) ;
define( "_AM_RADIO_IMPORTCOPY" , 'Copia immagini (i commenti non verrano copiati' ) ;
define( "_AM_RADIO_IMPORTMOVE" , 'Sposta immagini (e i loro commenti)' ) ;
define( "_AM_MB_IMPORTCONFIRM" , 'Importo le immagini?' ) ;
define( "_AM_FMT_IMPORTSUCCESS" , '%s immagini importate' ) ;


// Export
define( "_AM_H3_FMT_EXPORTTO" , 'Esporta immagini da %s ad un altro modulo' ) ;
define( "_AM_FMT_EXPORTTOIMAGEMANAGER" , 'Esporta nel gestore immagini di XOOPS' ) ;
define( "_AM_FMT_EXPORTIMSRCCAT" , 'Sorgente' ) ;
define( "_AM_FMT_EXPORTIMDSTCAT" , 'Destinazione' ) ;
define( "_AM_CB_EXPORTRECURSIVELY" , 'con le sottocategorie' ) ;
define( "_AM_CB_EXPORTTHUMB" , 'Esporta le anteprime al posto delle immagini principali' ) ;
define( "_AM_MB_EXPORTCONFIRM" , 'Esporto le immagini?' ) ;
define( "_AM_FMT_EXPORTSUCCESS" , '%s immagini esportate' ) ;


}

?>
