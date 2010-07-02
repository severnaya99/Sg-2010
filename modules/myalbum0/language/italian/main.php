<?php

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'MYALBUM_MB_LOADED' ) ) {


// Appended by Xoops Language Checker -GIJOE- in 2004-10-04 16:06:34
define('_ALBM_LIDASC','Record Number (Bigger is latter)');
define('_ALBM_LIDDESC','Record Number (Smaller is latter)');

define( 'MYALBUM_MB_LOADED' , 1 ) ;

//%%%%%%		Module Name 'myAlbum-P'		%%%%%

// New in myAlbum-P

// only "Y/m/d" , "d M Y" , "M d Y" can be interpreted
define( "_ALBM_DTFMT_YMDHI" , "d M Y H:i" ) ;

define( "_ALBM_NEXT_BUTTON" , "Prossimo" ) ;
define( "_ALBM_REDOLOOPDONE" , "Fatto." ) ;

define( "_ALBM_BTN_SELECTALL" , "Seleziona tutto" ) ;
define( "_ALBM_BTN_SELECTNONE" , "Annula seleziona" ) ;
define( "_ALBM_BTN_SELECTRVS" , "Inverti selezione" ) ;

define( "_ALBM_FMT_PHOTONUM" , "%s per pagina" ) ;

define( "_ALBM_AM_ADMISSION" , "Approva foto" ) ;
define( "_ALBM_AM_ADMITTING" , "Foto approvate" ) ;
define( "_ALBM_AM_LABEL_ADMIT" , "Approva le foto selezionate" ) ;
define( "_ALBM_AM_BUTTON_ADMIT" , "Approva" ) ;
define( "_ALBM_AM_BUTTON_EXTRACT" , "Estrai" ) ;

define( "_ALBM_AM_PHOTOMANAGER" , "Gestione Immagini" ) ;
define( "_ALBM_AM_PHOTONAVINFO" , "%s-%s (su %s totali)" ) ;
define( "_ALBM_AM_LABEL_REMOVE" , "Elimina le foto selezionate" ) ;
define( "_ALBM_AM_BUTTON_REMOVE" , "Elimina!" ) ;
define( "_ALBM_AM_JS_REMOVECONFIRM" , "Elimina foto. Ok?" ) ;
define( "_ALBM_AM_LABEL_MOVE" , "Cambia categoria alle foto selezionate" ) ;
define( "_ALBM_AM_BUTTON_MOVE" , "Sposta" ) ;
define( "_ALBM_AM_BUTTON_UPDATE" , "Modifica" ) ;
define( "_ALBM_AM_DEADLINKMAINPHOTO" , "La pagina princiapale non esiste" ) ;

define( "_ALBM_RADIO_ROTATETITLE" , "Rotazione immagine" ) ;
define( "_ALBM_RADIO_ROTATE0" , "Nessuna" ) ;
define( "_ALBM_RADIO_ROTATE90" , "Destra 90&deg;" ) ;
define( "_ALBM_RADIO_ROTATE180" , "180°" ) ;
define( "_ALBM_RADIO_ROTATE270" , "Sinistra 90&deg;" ) ;


// New MyAlbum 1.0.1 (and 1.2.0)
define("_ALBM_MOREPHOTOS","Altre foto da %s");
define("_ALBM_REDOTHUMBS","Ricrea Anteprime (<a href='redothumbs.php'>ricomincia</a>)");
define("_ALBM_REDOTHUMBSINFO","Un numero troopo elevato può mandare il server in timeout.");
define("_ALBM_REDOTHUMBSNUMBER","Numero di immagini processate per volta");
define("_ALBM_REDOING","Redoing: ");
define("_ALBM_BACK","Ritorna");
define("_ALBM_ADDPHOTO","Aggiungi nuova");


// New MyAlbum 1.0.0
define("_ALBM_PHOTOBATCHUPLOAD","Registra foto già caricate sul server");
define("_ALBM_PHOTOUPLOAD","Invia una foto");
define("_ALBM_PHOTOEDITUPLOAD","Modifica foto e re-upload");
define("_ALBM_MAXPIXEL","Dimensione massima (pixel)");
define("_ALBM_MAXSIZE","Dimensione massima (byte)");
define("_ALBM_PHOTOTITLE","Titolo");
define("_ALBM_PHOTOPATH","Percorso");
define("_ALBM_TEXT_DIRECTORY","Directory");
define("_ALBM_DESC_PHOTOPATH","Inserisci il percorso completo delle foto da registrare");
define("_ALBM_MES_INVALIDDIRECTORY","Cartella specificata non valida.");
define("_ALBM_MES_BATCHDONE","%s foto registrate.");
define("_ALBM_MES_BATCHNONE","Nessuna foto trovata nella cartella specificata.");
define("_ALBM_PHOTODESC","Descrizione");
define("_ALBM_PHOTOCAT","Categoria");
define("_ALBM_SELECTFILE","Seleziona foto");
define("_ALBM_NOIMAGESPECIFIED","Errore: Nessuna foto caricata");
define("_ALBM_FILEERROR","Errore: Foto troppo grossa (o errore di configurazione)");
define("_ALBM_FILEREADERROR","Errore: Foto non leggibile");

define("_ALBM_BATCHBLANK","Lascia vuoto per utilizzare il nome del file come titolo");
define("_ALBM_DELETEPHOTO","Cancella?");
define("_ALBM_VALIDPHOTO","Approvato");
define("_ALBM_PHOTODEL","Elimina foto?");
define("_ALBM_DELETINGPHOTO","Eliminazione foto");
define("_ALBM_MOVINGPHOTO","Spostamento foto");

define("_ALBM_POSTERC","Inviato da: ");
define("_ALBM_DATEC","Data: ");
define("_ALBM_EDITNOTALLOWED","Non hai il permesso per modificare questo commento!");
define("_ALBM_ANONNOTALLOWED","Gli utenti non registrati non hanno il permesso di inviare commenti.");
define("_ALBM_THANKSFORPOST","Grazie per i ltuo commento.");
define("_ALBM_DELNOTALLOWED","Non hai il permesso per cancellare questo commento!");
define("_ALBM_GOBACK","Torna indietro");
define("_ALBM_AREYOUSURE","Sei sicuro di voler cancellare questo commento e tutti quelli correlati?");
define("_ALBM_COMMENTSDEL","Commento cancellato!");

// End New

define("_ALBM_THANKSFORINFO","Grazie per l'informazione.");
define("_ALBM_BACKTOTOP","Torna all'inizio");
define("_ALBM_THANKSFORHELP","Grazie per il tuoi aiuto.");
define("_ALBM_FORSECURITY","Per ragioni di sicurezza il tuo username e indirizzo IP saranno temporaneamente registrati.");

define("_ALBM_MATCH","Cerca");
define("_ALBM_ALL","AND");
define("_ALBM_ANY","OR");
define("_ALBM_NAME","Nome");
define("_ALBM_DESCRIPTION","Descrizione");

define("_ALBM_MAIN","Foto");
define("_ALBM_NEW","Nuovo");
define("_ALBM_UPDATED","Aggiornato");
define("_ALBM_POPULAR","Popolare");
define("_ALBM_TOPRATED","Top");

define("_ALBM_POPULARITYLTOM","Popolarità (Prima le meno viste)");
define("_ALBM_POPULARITYMTOL","Popolarità (Prima le più viste)");
define("_ALBM_TITLEATOZ","Titolo (A - Z)");
define("_ALBM_TITLEZTOA","Titolo (Z - A)");
define("_ALBM_DATEOLD","Data (Prima le più vecchie)");
define("_ALBM_DATENEW","Data (Prima le più nuove)");
define("_ALBM_RATINGLTOH","Voto (Ascendente)");
define("_ALBM_RATINGHTOL","Voto (Discendente)");

define("_ALBM_NOSHOTS","Nessuna anteprima disponibile");
define("_ALBM_EDITTHISPHOTO","Modifica");

define("_ALBM_DESCRIPTIONC","Descrizione");
define("_ALBM_EMAILC","Email");
define("_ALBM_CATEGORYC","Categoria");
define("_ALBM_SUBCATEGORY","Sottocategorie");
define("_ALBM_LASTUPDATEC","Ultima modifica");
define("_ALBM_HITSC","Visite");
define("_ALBM_RATINGC","Voto");
define("_ALBM_ONEVOTE","1 voto");
define("_ALBM_NUMVOTES","%s voti");
define("_ALBM_ONEPOST","1 post");
define("_ALBM_NUMPOSTS","%s post");
define("_ALBM_COMMENTSC","Commenti");
define("_ALBM_RATETHISPHOTO","Vota questa foto!");
define("_ALBM_MODIFY","Modifica");
define("_ALBM_VSCOMMENTS","Guarda/invia commenti");

define("_ALBM_DIRECTCATSEL","Seleziona una categoria");
define("_ALBM_THEREARE","Ci sono <b>%s</b> immagini nel database.");
define("_ALBM_LATESTLIST","Ultime foto inserite:");

define("_ALBM_VOTEAPPRE","Grazie per aver votato!");
define("_ALBM_THANKURATE","Grazie per il tuo tempo speso a votare su %s.");
define("_ALBM_VOTEONCE","E' possibile votare una volta sola.");
define("_ALBM_RATINGSCALE","La scala va da 1 a 5");
define("_ALBM_BEOBJECTIVE","Cerca di essere obiettivo se tutte le immagini ricevessero un 1 o un 10, il voto non sarebbe molto utile, no?");
define("_ALBM_DONOTVOTE","Non puoi votare per le immagine inviate da te");
define("_ALBM_RATEIT","Vota!");

define("_ALBM_RECEIVED","Immagine ricevuta. Grazie!");
define("_ALBM_ALLPENDING","Tutte le foto inviate sono in attesa di approvazione.");

define("_ALBM_RANK","Pos.");
define("_ALBM_CATEGORY","Categoria");
define("_ALBM_HITS","Visite");
define("_ALBM_RATING","Voto");
define("_ALBM_VOTE","N.Voti");
define("_ALBM_TOP10","%s Top 10 "); // %s is a photo category title

define("_ALBM_SORTBY","Ordina per:");
define("_ALBM_TITLE","Titolo");
define("_ALBM_DATE","Data");
define("_ALBM_POPULARITY","Popolarità");
define("_ALBM_CURSORTEDBY","Foto ordinate per: %s");
define("_ALBM_FOUNDIN","Trovato in:");
define("_ALBM_PREVIOUS","Precedente");
define("_ALBM_NEXT","Immagine successiva");
define("_ALBM_FIRST","Inizio");
define("_ALBM_LAST","Fine");
define("_ALBM_NOMATCH","Nessuna foto presente");

define("_ALBM_CATEGORIES","Categorie");

define("_ALBM_SUBMIT","Invia");
define("_ALBM_CANCEL","Annulla");

define("_ALBM_MUSTREGFIRST","Non hai il permesso per questa operazione.<br>Registrati o esgui il login, prima!");
define("_ALBM_MUSTADDCATFIRST","Devi creare almeno una categoria prima di poer inserire una foto!");
define("_ALBM_NORATING","Nessun voto selezionato.");
define("_ALBM_CANTVOTEOWN","Non puoi votare per un'immagine che hai inviato tu!");
define("_ALBM_VOTEONCE2","Puoi votare una volta sola!");

//%%%%%%	Module Name 'MyAlbum' (Admin)	  %%%%%

define("_ALBM_PHOTOSWAITING","Immagini in attesa di approvazione");
define("_ALBM_PHOTOMANAGER","Gestione Immagini");
define("_ALBM_CATEDIT","Aggiungi Modifica o Elimina categorie");
define("_ALBM_GROUPPERM_GLOBAL","Permessi globali");
define("_ALBM_CHECKCONFIGS","Controlla configurazione");
define("_ALBM_BATCHUPLOAD","Registraziuone multipla");
define("_ALBM_GENERALSET","Opzioni myAlbum-P");
define("_ALBM_REDOTHUMBS2","Ricrea anteprime");

define("_ALBM_SUBMITTER","Inviato da");
define("_ALBM_DELETE","Elimina");
define("_ALBM_NOSUBMITTED","Nessuna foto inviata.");
define("_ALBM_ADDMAIN","Aggiungi una categoria principale");
define("_ALBM_IMGURL","URL immagine (OPZIONALE, l'altezza sarà ridimensionata a 50): ");
define("_ALBM_ADD","Aggiungi");
define("_ALBM_ADDSUB","Aggiungi una sottocategoria");
define("_ALBM_IN","in");
define("_ALBM_MODCAT","Modifica categoria");
define("_ALBM_DBUPDATED","Database aggiornato!");
define("_ALBM_MODREQDELETED","Richiesta di mofifica cancellata.");
define("_ALBM_IMGURLMAIN","URL immagine(OPZIONALE, l'altezza sarà ridimensionata a 50. Valido solo per le categorie principali): ");
define("_ALBM_PARENT","Categoria precedente:");
define("_ALBM_SAVE","Salva cambiamenti");
define("_ALBM_CATDELETED","Categoria eliminata.");
define("_ALBM_CATDEL_WARNING","ATTENZIONE: Sei sicuro di vole cancellare questa categoria con tutte le immagini ed i commenti contenuti?");
define("_ALBM_YES","Si");
define("_ALBM_NO","No");
define("_ALBM_NEWCATADDED","Aggiunta una nuova categoria!");
define("_ALBM_ERROREXIST","ERRORE: La foto inviata è già presente nel database!");
define("_ALBM_ERRORTITLE","ERRORE: Devi inserire il TITOLO");
define("_ALBM_ERRORDESC","ERRORE: Devi inserire la DESCRIZIONE!");
define("_ALBM_WEAPPROVED","La tua immagine è stata approvata.");
define("_ALBM_THANKSSUBMIT","Grazie per l'invio!");
define("_ALBM_CONFUPDATED","Configurazione aggiornata!");

}

?>
