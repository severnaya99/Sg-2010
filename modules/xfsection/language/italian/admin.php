<?php
// 2004/03/27 K.OHWADA
// error message
//   _AM_DIR_NOT_WRITABLE
//   _AM_EDIT_ARTICLE_RETURN
// copy mode
//   _AM_COPY_ARTICLE_EXPLANE
// multi language in reorder.php
//   _AM_CATEGORY_REORDERED
//   _AM_ARTICLE_REORDERED
//   _AM_CATEGORY_REORDER_RETURN

// 2004/02/28 K.OHWADA
// admin menu same as popup menu
//   add _AM_PATH_MANAGEMENT  _AM_LIST_BROKEN
// multi langauge
//   add _AM_DUPLICATE_ARTICLES
// unify a article menu and a title

// 2003/11/21 K.OHWADA
// rename WFsection to XFsection
// add menu: bulk import

// admin menu same as popup menu
define("_AM_PREFERENCE",'Preferenze');
define("_AM_PATH_MANAGEMENT","Configurazione Percorsi");
define("_AM_LIST_BROKEN",'Lista Download Malfunzionanti');

//%%%%%%        Admin Module Name  Articles         %%%%%
define("_AM_DBUPDATED","Database aggiornato con successo!");
define("_AM_STORYID","ID");
define("_AM_TITLE","Titolo");
define("_AM_SUMMARY","Sommario");
define("_AM_CATEGORY","Nome sezione"); //******
define("_AM_CATEGORY2","Modifica questa Sezione:"); //******
define("_AM_POSTER","Autore");
define("_AM_SUBMITTED2","Data di invio");
define("_AM_NOSHOWART2","Non in Mostra");
define("_AM_ACTION","Azione");
define("_AM_EDIT","Modifica");
define("_AM_DELETE","Cancella");
define("_AM_LAST10ARTS","Articoli pubblicati");
define("_AM_PUBLISHED","Pubblicato"); // Published Date
define("_AM_PUBLISHEDON","Data Pubblicazione"); 
define("_AM_GO","invia");
define("_AM_EDITARTICLE","Modifica articolo");
define("_AM_POSTNEWARTICLE","Invia un nuovo articolo");
define("_AM_RUSUREDEL","Sei certo di voler cancellare questo articolo e tutti i suoi commenti?");
define("_AM_YES","Sì");
define("_AM_NO","No");
define("_AM_ALLOWEDHTML","Consenti l'uso dell'HTML:");
define("_AM_DISAMILEY","Disabilita faccine");
define("_AM_DISHTML","Disabilita l'HTML");
define("_AM_PREVIEW","Anteprima");
define("_AM_SAVE","Salva");
define("_AM_ADD","Aggiungi");
define("_AM_SMILIE","Aggiungi una faccina all'articolo");
define("_AM_EXGRAPHIC","Aggiungi della grafica esterna all'articolo");
define("_AM_GRAPHIC","Aggiungi della grafica locale all'articolo");
define("_AM_FILESHOWDESCRIPT","Carica la descrizione del file"); //new
define("_AM_ARTICLEMANAGEMENT","Gestione degli articoli");
define("_AM_ARTICLEMANAGEMENTLINKS","Links di gestione degli articoli");
define("_AM_ARTICLEPREVIEW","Anteprima dell'articolo");
define("_AM_ADDMCATEGORY","Aggiungi una Sezione");
define("_AM_CATEGORYNAME","Nome della sezione");
define("_AM_CATEGORYTAKEMETO","Clicca qui per creare una nuova categoria.");
define("_AM_NOCATEGORY","ERRORE - Nessuna categoria creata.");
define("_AM_MAX40CHAR","(max: 40 caratteri)");
define("_AM_CATEGORYIMG","Immagine della Sezione");
define("_AM_IMGNAEXLOC","nome immagine + estensione situata in %s");
define("_AM_IN","<b>Aggiungi una Sezione</b> <br />(Vuoto: Sezione Principale, altrimenti Sotto-Sezione)");
define("_AM_MOVETO","<b>Muovi nella sezione</b> (Vuoto: non muovere sezione)");
define("_AM_MODIFYCATEGORY","Modifica Sezione");
define("_AM_MODIFY","Modifica");
define("_AM_PARENTCATEGORY","Sezione Padre");
define("_AM_SAVECHANGE","Salva modifiche");
define("_AM_DEL","Cancella");
define("_AM_CANCEL","Annulla");
define("_AM_WAYSYWTDTTAL","ATTENZIONE: Sei certo di voler cancellare questa sezione con tutti i suoi articoli e commenti?");
// Added in Beta6
define("_AM_CATEGORYSMNGR","Gestione delle Sezioni");
define("_AM_PEARTICLES","Crea un nuovo Articolo");
define("_AM_GENERALCONF","Impostazioni Generali");

// WFSECTION
define("_AM_UPDATEFAIL","Aggiornamento Fallito!");
define("_AM_EDITFILE","Modifica il File Allegato");
define("_AM_CATEGORYDESC","Descrizione della Sezione");
define("_AM_FILESBASEPATH","Imposta la Cartella per i Files Allegati:");
define("_AM_AGRAPHICPATH","Imposta la cartella per 'Articoli' grafica/immagini:");
define("_AM_SGRAPHICPATH","Imposta la cartella per 'Sezioni' grafica/immagini:");
define("_AM_SMILIECPATH","Imposta la cartella per le faccine:");
define("_AM_HTMLCPATH","Imposta la cartella per i files HTML:");
define("_AM_FILEUPLOADSPATH","Files allegati: ");
define("_AM_FILEUPLOADSTEMPPATH","Temp per gli allegati: ");
define("_AM_ARTICLESFILEPATH","Immagini degli articoli: ");
define("_AM_SECTIONFILEPATH","Immagini delle sezioni: ");
define("_AM_SMILIEFILEPATH","Immagini faccine: ");
define("_AM_HTMLFILEPATH","Files HTML: ");
define("_AM_UPLOADCONFIGFILE","Carica il file Config: ");
define("_AM_ARTICLESAPAGE","Mostra gli articoli per pagina");
define("_AM_ARTICLESAPAGE2","Quanti articoli mostrare su ogni pagina prima che venga mostrato il menu di navigazione");
define("_AM_NOIMG","Nessua immagine");
define("_AM_PIDINVALID","La sezione madre non è valida.");
define("_AM_NOTITLE","Non c'è il titolo.");
define("_AM_FILEDEL","ATTENZIONE: Sei certo di voler cancellare questo file?");
define("_AM_AFERTSETCATE","Dopo aver aggiunto delle sezioni sarai in grado di aggiungere articoli.");
define("_AM_IMGUPLOAD","Carica l'immagine della sezione");
define("_AM_IMGUPLOAD2","L'attuale cartella dell'immagine è ");
define("_AM_IMGNAME","Nome file (Vuoto: Come l'originale (caricata) nome del file)");
define("_AM_UPLOADED","Caricata!");
define("_AM_ISNOTWRITABLE","non è scrivibile!");
define("_AM_UPLOADFAIL","Caricamento fallito!");
define("_AM_NOTALLOWEDMINETYPE","Non puoi caricare file di questo tipo.");
define("_AM_FILETOOBIG","La dimensione del file è eccessiva per essere caricata!");

define("_AM_CATEGORYMENU","Configurazione dell'indice di categoria");
define("_AM_ARTICLE2MENU","Configurazione dell'indice dell'articoli");
define("_AM_ARTICLEPAGEMENU","Configurazione della pagina dell'articolo");
define("_AM_BLOCKMENU","Configurazione dei blocchi");
define("_AM_ADMINEDITMENU","Configurazione generale degli articoli");
define("_AM_ADMINCONFIGMENU","Configurazione dell'amministrazione");

define("_AM_ARTIMGUPLOAD","Carica immagine");
define("_AM_TOPPAGETYPE","Mostra i link agli articoli nella pagina principale del menu.");
define("_AM_SHOWCATPIC","Mostra le immagini delle sezioni nella pagina principale del menu.");
define("_AM_WYSIWYG","WYSIWYG Editor invece dell'editor originale.");
define("_AM_SHOWCOMMENTS","Mostra i commenti degli utenti nella pagina dell'articolo?");
define("_AM_SUBMITTED","Articoli inviati dagli utenti"); //added

//define("_AM_ALLTXT","<h4>Article Management</h4></div><div>With <b>Article Management</b> you can edit, delete or rename any article. This mode will show every article within the database.<br /><br />"); //added
// WF -> XF
//define("_AM_PUBLISHEDTXT","<h4>Article Published Management</h4></div><div><b>Article Published Management</b> will show all articles that have been published (Approved by Webmaster).<br /><br />These are all the articles that will be shown in category listing of the XF-Section index page (including all those controlled by groupaccess).<br /><br />"); //added
//define("_AM_SUBMITTEDTXT","<h4>Article Submission Management</h4></div><div><b>Article Submission management</b> will show all articles submitted by your website users and allow you to moderate them.<br /><br />To approve an article, click on <b>Edit</b> link, then highlight the <b>Approve</b> checkbox and the save the article. The submitted article will then be published.<br /><br />"); //added
//define("_AM_ONLINETXT","<h4>Article Online Management</h4></div><div><b>Article Online Management</b> will show all articles which status has been set to 'online'.<br /><br />To change the status of an article, click on the <b>Edit</b> link and highlight the <b>online</b> checkbox off/on.<br /><br />"); //added
//define("_AM_OFFLINETXT","<h4>Article Offline Management</h4></div><div><b>Article Offline Management</b> will show all articles which status has been set to <b>offline</b>.<br /><br />To change the status of an article, click on the <b>Edit</b> link and highlight the <b>online</b> checkbox off/on.<br /><br />"); //added
//define("_AM_EXPIREDTXT","<h4>Article Expired Management</h4></div><div><b>Article Expired Management</b> will show all articles that have expired.<br /><br />You can easily reset the expire date by clicking on <b>Edit</b> link and by changing the <b>Set the date/time of expiration</b> setting.<br /><br />"); //added
//define("_AM_AUTOEXPIRETXT","<h4>Article Auto Expired Management</h4></div><div><b>Article Auto Expired Management</b> will show all articles that have been set to expire on a certain date.<br /><br />You can reset the expire date by clicking on <b>Edit</b> link and changing the <b>Set the date/time of expiration</b> setting.<br /><br />"); //added
//define("_AM_AUTOTXT","<h4>Article Auto Management</h4></div><div><b>Article Auto Publish Management</b> will show all articles that have been set to publish at a future date.<br /><br />This setting can be changed by clicking on the <b>edit</b> link and changing the 'Set the date/time of publish' setting.<br /><br />"); //added
// WF -> XF
//define("_AM_NOSHOWTXT","<h4>No Show Article</h4></div><div><b>No Show Article</b> The are a special type of article, unlike your normal articles these will not show up in article index pages and will not be seen that way.&nbsp;&nbsp; Instead, these article will only show in the `XF-Section Menu block`.<br /><br />Using this option with HTML Pages and `No Display info` (Option on the edit article page) you can show just what you want. &nbsp;&nbsp;An example of this would be a `privacy notice` page etc.<br /><br />All other options control these types of articles also. i.e. published, expired, online/offline.<br /><br />"); //added

// unify a article menu and a title
define("_AM_ALLTXT","<h4>Gestione degli articoli</h4></div><div>Nella sezione che gestisce gli articoli puoi modificare, cancellare o rinominare qualsiasi articolo. Questa modalità mostrerà ogni articolo all'interno del database.");
define("_AM_PUBLISHEDTXT","<h4>Gestione degli articoli pubblicati</h4></div><div>La sezione che gestisce gli articoli pubblicati mostrerà tutti gli articli che sono stati pubblicati (approvati dal webmaster)."); //added
define("_AM_SUBMITTEDTXT","<h4>Gestione dell'invio degli articoli</h4></div><div>La sezione che gestice l'invio degli articoli vi consentirà di moderare gli articoli inviati dai vostri utenti, inoltre potrete modificare, cancellare o rinominare tutti od ogni aspetto di ogni articolo."); //added
define("_AM_ONLINETXT","<h4>Gestione degli articoli online</h4></div><div>La sezione che gestisce gli articoli online vi mostrerà tutti gli articoli il cui stato sia 'online'. Per modificare lo stato di un articolo, cliccate su modifica e cambiate lo stato della checkbox."); //added
define("_AM_OFFLINETXT","<h4>Gestione degli articoli offline</h4></div><div>La sezione che gestisce gli articoli offline vi mostrerà tutti gli articoli il cui stato sia 'offline'. Per modificare lo stato di un articolo, cliccate su modifica e cambiate lo stato della checkbox."); //added
define("_AM_EXPIREDTXT","<b>Gestione Articoli Scaduti</b> Mostrerà tutti gli articoli Scaduti.<br /><br />Puoi facilmente resettare la data di scadenza cliccando sul link <b>Modifica</b> e cambiando il valore <b>Imposta la data\orario di scadenza.</b><br /><br />"); //added
define("_AM_AUTOEXPIRETXT","<div><b>Amministrazione Articoli a scadenza automatica</b> Mostrerà tutti gli articoli la cui scadenza è stata impostata a una certa data.<br /><br />Puoi facilmente resettare la data di scadenza cliccando sul link <b>Modifica</b> e cambiando il valore <b>Imposta la data\orario di scadenza.</b><br /><br />"); //added
define("_AM_AUTOTXT","<b>Amministrazione Articoli a pubblicazione automatica</b> Mostrerà tutti gli articoli la cui pubblicazione è stata posticipata a una data definita.<br /><br />Questo parametro può essere impostato cliccando sul link <b>Modifica</b> e cambiando il valore <b>Imposta la data\orario di pubblicazione.</b><br /><br />"); //added
define("_AM_NOSHOWTXT","<b>Articoli Non in Mostra</b> Sono un tipo speciale di articoli, diversamente dai normali articoli questi non verranno mostrati nell'indice degli articoli.&nbsp;&nbsp; Invece questi articoli verranno mostrati nel blocco <b>XF-Section Menu</b>.<br /><br />Usando questa opzione con pagine HTML e l'opzione <b>Non mostrare info</b> (Presente nella pagina <b>Modifica Articolo</b>) puoi mostrare solo quello che desideri. &nbsp;&nbsp;Un esempio di ciò potrebbe essere una pagina con le `norme sulla privacy` etc.<br /><br />Tutte le altre opzioni valgono anche su questo tipo di articoli. Es. Pubblicato, Scaduto, Online/Offline.<br /><br />"); //added

define("_AM_BLOCKCONF","Configurazione dei blocchi");
define("_AM_TITLE1","Nome del blocco del Menu principale:");
define("_AM_TITLE4","Nome del blocco degli Articoli recenti:");
define("_AM_TITLE5","Nome del blocco dei Migliori articoli:");
define("_AM_ORDER","Testo alternativo ad 'Ordina':");
define("_AM_DATE","Testo alternativo a 'Data':");
define("_AM_HITS","Testo alternativo a 'Clicks':");
define("_AM_DISP","Testo alternativo a 'Mostra':");
define("_AM_ARTCLS","Nome del blocco Articoli");
define("_AM_MENU_LINKS","<b>Menù Principale</b>");
define("_AM_BAN","Banna l'utente");
//New to version 0.9.2
define("_AM_CMODHEADER","Controllo dei permessi dei files");

// WF -> XF
define("_AM_CMODERRORINFO","Controllo delle cartelle e dei file per verificare i permessi di scrittura.<br/><br/>Xf-Section proverà a impostare i permessi corretti ai files e alle cartelle che seguono, e un messaggio di errore verrà mostrato qualora i permessi di scrittura non siano corretti.");
define("_AM_FILEPATH","Configurazione delle immagini e dell'upload");

// WF -> XF
define("_AM_FILEPATHWARNING","Imposta il percorso per le directory usate da XF-Section.  Un messaggio di errore verrà visualizzato se il percorso non è corretto.<br/><br/>Lascia un campo vuoto se vuoi che XF-Section usi i percorsi di default.<br/><br/>");

define("_AM_FILEUSEPATH","Cambia il percorso utente");
define("_AM_PATHEXIST","Il percorso esiste!");
define("_AM_PATHNOTEXIST","Il percorso non esiste! Si prega di controllare!");
define("_AM_USERPATH","Percorso utente definito");
define("_AM_SHOWSELIMAGE","Mostra l'immagine attualmente selezionata: "); //******* Updated *******
define("_AM_SHOWSUBMENU","Mostra i sottomenu sull'indice della pagina principale?");
define("_AM_MENUS","Configurazione dell'indice principale");
define("_AM_DEFAULTPATH","Percorso usato di default");
define("_AM_SCROLLINGBLOCK","Usa lo scrolling per il blocco degli articoli recenti?");
define("_AM_BLOCKHEIGHT","Imposta l'altezza dello scrolling nel blocco");
define("_AM_DEFAULT"," Default");
define("_AM_BLOCKAMOUNT","Numero di linee da scrollare?");
define("_AM_BLOCKDELAY","Ritardo di scrolling del blocco (per linea)");
define("_AM_LASTART","Mostra questo numero di nuovi articoli nel pannello di controllo: ");
define("_AM_NUMUPLOADS","Numero di file da trasferire: ");

// WF -> XF
define("_AM_WEBMASTONLY","Solo i webmaster possono modificare le impostazioni di XF-Section?");

define("_AM_DEFAULTS","Riporta la configurazione alle impostazioni di default?");

define("_AM_NOCMODERROR","( corretto )");
define("_AM_CMODERROR","( Incorretto/La cartella non esiste! )");

// WF -> XF
define("_AM_REVERTED","Configurazione di XF-Section riportata ai valori di default");

define("_AM_GROUPPROMPT","Consenti l'accesso ai seguenti gruppi:");
define("_AM_NOVIEWPERMISSION","Spiacenti! Non hai i permessi per entrare in quest'area.");
define("_AM_FILE","File: ");
define("_AM_NOMAINTEXT","ERRORE: Non c'è il testo nel tuo articolo! L'articolo non può essere vuoto!");
define("_AM_DIR","Cartella: ");
define("_AM_MISC","Impostazioni varie");

define("_AM_ISNOTWRITABLE2"," non esiste sul server! Si prega di modificarlo in un percorso valido!");
define("_AM_CANNOTMODIFY","Non è possibile modificarlo senza dare un percorso valido!");
define("_AM_PATH","Percorso: ");

define("_AM_CMODHEADER2","Controllo file");
define("_AM_ARTICLEMENU","Configurazione dell'indice degli articoli");
define("_AM_APPROVE","Approva");
define("_AM_MOVETOTOP","Muovi questo articolo all'inizio");
define("_AM_CHANGEDATETIME","Modifica data/ora di pubblicazione");
define("_AM_NOWSETTIME","Attualmente è impostato a: %s"); // %s is datetime of publish
define("_AM_CURRENTTIME","L'ora è: %s");  // %s is the current datetime
define("_AM_SETDATETIME","Imposta data/ora di pubblicazione");
define("_AM_MONTHC","Mese:");
define("_AM_DAYC","Giorno:");
define("_AM_YEARC","Anno:");
define("_AM_TIMEC","Ora:");
define("_AM_AUTOAPPROVE","Approva automaticamente gli articoli inviati?");

// WF -> XF
define("_AM_DEFAULTTIME","Formato dell'ora");
define("_AM_TURNOFFLINE","Nascondi XF-Section? (Solo i Webmasters possono accedere a XF-Section)");

define("_AM_SHOWMARTICLES","Mostra la colonna del contatore nell'indice degli articoli");
define("_AM_SHOWMUPDATED","Mostra la colonna aggiornata nell'indice degli articoli");
define("_AM_SHORTCATTITLE","Abbrevia automaticamente il titolo della categoria?");
define("_AM_SHOWAUTHOR","Mostra la colonna dell'autore nell'indice degli articoli");
define("_AM_SHOWCOMMENTS2","Mostra la colonna dei commenti nell'indice degli articoli");
define("_AM_SHOWFILE","Mostra la colonna dei file allegati nell'indice degli articoli");
define("_AM_SHOWRATED","Mostra la colonna del voto nell'indice degli articoli");
define("_AM_SHOWVOTES","Mostra la colonna dei voti nell'indice degli articoli");
define("_AM_SHOWPUBLISHED","Mostra la colonna con la data di pubblicazione?");
define("_AM_SHOWHITS","Mostra la colonna dei click nell'indice degli articoli");
define("_AM_SHORTARTTITLE","Abbrevia automaticamente il titolo dell'articolo?");
define("_AM_OFFLINE","<b>Imposta l'articolo come offline</b> (L'articolo non verrà visualizzato)");
define("_AM_BROKENREPORTS","Segnalazione di files corrotti");
define("_AM_NOBROKEN","Nessuna segnalazione di files corrotti.");
define("_AM_IGNORE","Ignora");
define("_AM_FILEDELETED","File cancellato.");
define("_AM_BROKENDELETED","Segnalazione di files corrotti cancellata.");
define("_AM_IGNOREDESC","Ignora (Ignora la segnalazione ed cancella solo la <b>segnalazione di files corrotti</b>)");
define("_AM_DELETEDESC","Cancella (Cancella la <b>segnalazione dei dati del download</b> e la <b>segnalazione di files corrotti</b> per il file.)");
define("_AM_REPORTER","Mittente della segnalazione");
define("_AM_FILETITLE","Titolo del download: ");

// WF -> XF
define("_AM_DLCONF","Configurazione dei downloads di XF Section");

define("_AM_FILEDESCRIPT","Descrizione del file");
define("_AM_STATUS","Stato");
define("_AM_UPLOAD","Upload");
define("_AM_NOTIFYPUBLISH","Notifica via email quando pubblicato");
define("_AM_VIEWHTML","Modifica HTML");
define("_AM_VIEWWAYSIWIG","Modifica WYSIWYG");
define("_AM_CATEGORYT","Categoria");
define("_AM_ACCESS","Accesso");
define("_AM_PAGE","Pagina");
define("_AM_ARTICLEMANAGE","Gestione degli articoli");
define("_AM_WEIGHTMANAGE","Ordinamento Sezioni");
define("_AM_UPLOADMAN","File Manager");

// WF -> XF
define("_AM_NOADMINRIGHTS","Spiacenti, solo il Webmaster può accedere a questa sezione!");

define("_AM_FILECount","Contatore del file");
define("_AM_ALLARTICLES","Elenca tutti gli articoli");
define("_AM_PUBLARTICLES","Elenca gli articoli pubblicati");
define("_AM_SUBLARTICLES","Elenca gli articoli inviati");
define("_AM_ONLINARTICLES","Elenca gli articoli online");
define("_AM_OFFLIARTICLES","Elenca gli articoli offline");
define("_AM_EXPIREDARTICLES","Elenca articoli la cui validità è scaduta");
define("_AM_AUTOEXPIREARTICLES","Elenca articoli la cui validità è scaduta automaticamente");
define("_AM_AUTOARTICLES","Elenca articoli auto pubblicati");
define("_AM_NOSHOWARTICLES","Elenca articoli da non mostrare");
define("_NOADMINRIGHTS2","Solo il webmaster può modificare i parametri di configurazione");
define("_AM_CANNOTHAVECATTHERE","ERRORE: Questa categoria non può essere figlia di sè stessa!");
define("_AM_SECTIONMANAGE","Gestione delle Sezioni");
define("_AM_SECTIONMANAGELINK","Links di gestione delle sezioni");
define("_AM_FILEID","File");
define("_AM_FILEICON","Icona");
define("_AM_FILESTORE","Salvata come");
define("_AM_REALFILENAME","Nome reale");
define("_AM_USERFILENAME","Nome utente");
define("_AM_FILEMIMETYPE","Tipo di file");
define("_AM_FILESIZE","Dimensione del file");
define("_AM_FDCOUNTER","Contatore");
define("_AM_EXPARTS","Articoli scaduti");
define("_AM_EXPIRED","Data per far scadere in automatico gli articoli");
define("_AM_CREATED","Data creata");
define("_AM_CHANGEEXPDATETIME","Modifica data/ora del termine");
define("_AM_SETEXPDATETIME","Imposta data/ora del termine");
define("_AM_NOWSETEXPTIME","La data del termine della validità degli artcioli è impostata per il : %s");
define("_AM_ANONPOST","Consenti ad utenti anonimi l'invio di nuovi articoli?");
define("_AM_NOTIFYSUBMIT","Invia un email al webmaster in seguito all'invio di un articolo?");
define("_AM_SECTIONIMAGE","Immagine dell'indice principale");
define("_AM_SECTIONHEAD","Intestazione dell'indice principale");
define("_AM_SECTIONFOOT","Piede dell'indice principale");
define("_AM_SHOWVOTESINART","Consenti agli utenti di votare gli articoli?");
define("_AM_SHOWREALNAME","Mostra il nome reale degli utenti come nome dell'autore? (Restituirà il nick se il nome reale è vuoto)");
define("_AM_SHOWCATEGORYIMG","Mostra l'immagine qui sopra nella sua Sezione?");
define("_AM_EDITSERVERFILE","Modifica il file del server");
define("_AM_CURRENTFILENAME","Nome del file attuale: ");
define("_AM_CURRENTFILESIZE","Dimensione del file: ");
define("_AM_UPLOADFOLD","Trasferisci cartella: ");
define("_AM_UPLOADPATH","Percorso: ");
define("_AM_FREEDISKSPACE","Spazio libero sul disco:");
define("_AM_RENAMETHIS","Rinomina questo file?");
define("_AM_RENAMEFILE","Rinomina file");
define("_AM_SHOWSUMMARY","Mostra la colonna Sommario?"); 
define("_AM_SHOWICON","Mostra le icone 'Popolare e aggiornato'?");
define("_AM_INDEXHEADING","Titolo dell'indice principale");
define("_AM_EXTERNALARTICLE","Articolo esterno </b> Questo avrà priorità sull'editor di testo e il file HTML");

// added in WFS v1b6
define("_AM_POPULARITY", "Popolarità");
define("_AM_ARTICLESSORT", "Ordine degli articoli");
define("_AM_NAVTOOLTYPE", "Tipo di navigazione");
define("_AM_SELECTBOX", "Box di selezione");
define("_AM_SELECTSUBS", "Box di selezione con sotto-sezioni");
define("_AM_LINKEDPATH", "Percorso collegato");
define("_AM_LINKSANDSELECT", "Collegamenti e box di selezione");
define("_AM_NONE", "Nessuno");
define("_AM_CATEGORYWEIGHT", "Peso della sezione");
define("_AM_ARTICLEWEIGHT", "Peso dell'articolo");
define("_AM_WEIGHT", "Peso");
define('_AM_DUPLICATECATEGORY','Duplica Sezione');

// add
define('_AM_DUPLICATE_ARTICLES','Copia anche gli Articoli');

define('_AM_COPY', 'Copia');
define('_AM_TO', 'in');
define('_AM_NEWCATEGORYNAME', 'Nuovo nome di sezione');
define('_AM_DUPLICATE', 'Duplica');
define('_AM_DUPLICATEWSUBS', 'Duplica con le sotto-sezioni');
define('_AM_ALLOWEDMIMETYPES', 'Consenti file MIME');
define('_AM_MODIFYFILE', "Modifica file dell'articolo");
define('_AM_FILESTATS', 'Statistiche dei files allegati');
define('_AM_FILESTAT', "Statistiche del file per l'articolo: ");
define('_AM_ERRORCHECK', 'Controlla file');
define('_AM_LASTACCESS', 'Ultimo accesso');
define('_AM_DOWNLOADED', 'Numero di downloads');
define('_AM_DOWNLOADSIZE', 'Dimensione del file');
define('_AM_UPLOADFILESIZE', 'Dimensione massima di upload dei files (KB) 1048576 = 1 Meg');
define('_AM_FILEMODE', 'Impostazioni dei permessi di upload');
define('_AM_IMGHEIGHT', "Altezza massima dell'immagine da caricare");
define('_AM_IMGWIDTH', "Larghezza massima dell'immagine da caricare");
define('_AM_FILEPERMISSION', 'Permessi del file');
define('_AM_IMGESIZETOBIG', "L'altezza/larghezza dell'immagine supera i limiti consentiti");
define('_AM_CATREORDERTEXT', "Puoi riordinare tutte le Sezioni da qui.<br />Le sezioni principali sono in blu scuro, sotto-sezioni in blu chiaro e poi grigio. Ogni sezione è ordinata per dimensione.<br /><br />Per riordinare gli articoli, clicca sul titolo di una sezione e ti verrà mostrato l'elenco degli articoli.");
define('_WFS_ATTACHFILE', 'Allega file');
define('_WFS_ATTACHFILEACCESS', "I permessi di accesso saranno gli stessi dell'articolo. Puoi modificare questi quando modifichi il file allegato.");
define('_AM_WFSFILESHOW', 'Files allegati');
define('_AM_ATTACHEDFILE', 'Files mostrati');
define('_AM_ATTACHEDFILEM', 'Gestione Files allegati');
define('_AM_UPOADMANAGE', 'Gestione Files');
define('_AM_CAREORDER', "Peso di Sezioni e Articoli");
define('_AM_CAREORDER2', 'Riordina Sezioni');
define('_AM_CAREORDER3', 'Riordina Articoli');   

define('_AM_PICON', 'Mostra le icone degli articoli?');
define('_AM_JUSTHTML', "<b> Non mostrare informazioni</b> (Questa opzione eviterà che vengano mostrate tutte le informazioni  nell'articolo. Solo semplice testo o HTML.)");
define('_AM_NOSHOART', "<b> Non mostrare l'articolo</b> (Usando questa opzione questo articolo non verrà mostrato nell'indice principale. Invece sarà visibile solamente come link nel menu del blocco.)");
define('_AM_INDEXPAGECONFIG', 'Configurazione Indice Principale');
define('_AM_INDEXPAGECONFIGTXT', "Da qui puoi modificare elementi dell'indice principale.<br /><br />Puoi facilmente modificare il logo, l'intestazione, e il piè di pagina.");
//define('_AM_VISITSUPPORT', 'Visit the WF-section website for information, updates and help on its usage.<br /> WF-Sections v1 B6 &copy; 2003 <a href="http://wfsections.xoops2.com/" target="_blank">WF-Sections</a>');
define('_AM_VISITSUPPORT', '');

define('_AM_REORDERID', 'ID'); 
define('_AM_REORDERPID', 'PID'); 
define('_AM_REORDERTITLE', 'Titolo');
define('_AM_REORDERDESCRIPT', 'Descrizione');
define('_AM_REORDERWEIGHT', 'Peso');
define('_AM_REORDERSUMMARY', 'Sommario');

// index.php
define("_AM_DIR_NOT_WRITABLE","La cartella non è scrivibile");
define("_AM_EDIT_ARTICLE_RETURN","Ritorna a modifica Articolo");

// copy mode in index.php
define("_AM_COPY_ARTICLE_EXPLANE","Copia Articolo. L'articolo originale viene lasciato. I Files allegati non saranno copiati.");

// multi language in reorder.php
define("_AM_CATEGORY_REORDERED","Le Sezioni sono state riordinate!");
define("_AM_ARTICLE_REORDERED","Gli Articoli sono stati riordinati!");
define("_AM_CATEGORY_REORDER_RETURN","Ritorna a Riordina Sezioni");

// *** add menu: bulk import ***
define("_AM_IMPORT", "Importazione di massa di files HTML");
define("_AM_IMPORT_DIRNAME", "Nome directory o Nome File");
define("_AM_IMPORT_HTMLPROC", "Processamento dei Files HTML");
define("_AM_IMPORT_EXTFILTER", "External filter program name");

define("_AM_IMPORT_BODY", "Solo la parte BODY viene estratta.");
define("_AM_IMPORT_INDEXHTML", "Delete a link to index.html, there are in the same directory or in one upper directory.");
define("_AM_IMPORT_LINK", "Change a link to a title = file name");
define("_AM_IMPORT_IMAGE", "Chage a link of an image file into an image directory. ");
define("_AM_IMPORT_ATMARK", "cambia @ in &amp;#064;");
define("_AM_IMPORT_TEXTPROC", "Processamento dei files di testo");
define("_AM_IMPORT_TEXTPRE", "Surround Text file by &lt;pre&gt; &lt;/pre&gt;");
define("_AM_IMPORT_IMAGEPROC", "Processing of Image files");
define("_AM_IMPORT_IMAGEDIR", "Image directory name");
define("_AM_IMPORT_IMAGECOPY", "Copy image files to a image directory.");
define("_AM_IMPORT_TESTMODE", "Test mode");
define("_AM_IMPORT_TESTDB", "Not store in DB. Please remove a check, when you store. ");
define("_AM_IMPORT_TESTEXEC", "Test");
define("_AM_IMPORT_TESTTEXT", "Text display");
define("_AM_IMPORT_EXPLANE", "A judgment of the kind of file is performed by the extension.<br>HTML file have extension of html or htm.<br>Text file have extension of txt.<br>Image file have extension of gif, jpg, jpeg, or png.<br>");
define("_AM_IMPORT_ERRDIREXI", "Directory or file does not exist");
define("_AM_IMPORT_ERRFILEXI", "Filter program does not exist");
define("_AM_IMPORT_ERRFILEXEC", "Filter program is not executable");
define("_AM_IMPORT_ERRNOCOPY", "No specification of image copy");
define("_AM_IMPORT_ERRNOIMGDIR", "No specification of image directory");
define("_AM_IMPORT_ERRIMGDIREXI", "Specified image directory is not directory");
define("_AM_IMPORT_ERRFILEEXI", "File does not exist");

?>