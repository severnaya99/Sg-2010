<?php
// 2004/03/27 K.OHWADA
// add submit modify

// 2004/01/29 herve 
// multi language
//   add _WFS_ERROR_IMAGE

// 2003/11/21 K.OHWADA
// view and edit for pure html file
//   add _WFS_DISBR, _WFS_ENAAMP
// article.php
//  _WFS_ARTCLE_MORE

//%%%%%%
define("_WFS_PRINTER","Pagina di stampa");
define("_WFS_COMMENTS","Commenti?");
define("_WFS_PREVPAGE","Pagina precedente");
define("_WFS_NEXTPAGE","Pagina successiva");
//define("_WFS_RETURNTOP","<< Return to Top");

//%%%%%%

define("_WFS_TOP","Top");
define("_WFS_POSTERC","Autore:");
define("_WFS_DATEC","Data:");
define("_WFS_EDITNOTALLOWED","Non ti è consentito modificare questo commento!");
define("_WFS_ANONNOTALLOWED","Agli utenti anonimi non è consentito inviare messaggi.");
define("_WFS_THANKSFORPOST","Grazie per il tuo contributo!");
define("_WFS_DELNOTALLOWED","Non ti è consentito cancellare questo commento!");
define("_WFS_AREUSUREDEL","Sei certo di voler cancellare questo commento e tutti i suoi commenti figli?");
define("_WFS_YES","Sì");
define("_WFS_NO","No");
define("_PL_COMMENTSDEL","Commento(i) cancellati con successo!");

//%%%%%%

define("_WFS_TITLE","Titolo");
define("_WFS_CATEGORY","Sezione");
define("_WFS_HTMLISFINE","L'HTML è utile, ma controlla più volte gli indirizzi e i tag HTML!");
define("_WFS_ALLOWEDHTML","Tag HTML consentiti:");
define("_WFS_DISABLESMILEY","Disabilita faccine");
define("_WFS_DISABLEHTML","Disabilita HTML");
define("_WFS_POST","Messaggio");
define("_WFS_PREVIEW","Anteprima");
define("_WFS_GO","Invia");

//%%%%%%
define("_WFS_ARTICLES","Articoli");
define("_WFS_VIEWS","Letto: "); //********* Updated ************
define("_WFS_DATE","Data: "); //********* Updated ************
define("_WFS_WRITTEN","Scritto: "); //********* Updated ************
define("_WFS_PRINTERFRIENDLY","Pagina stampabile");

define("_WFS_TOPICC","Sezione:");
define("_WFS_URL","URL:");
define("_WFS_NOSTORY","Spiacenti, l'articolo selezionato non esiste.");
define("_WFS_RETURN2INDEX","Ritorna all'indice principale");
define("_WFS_BACK2CAT","Ritorna alla categoria");
define("_WFS_BACK2","Indietro");
//%%%%%%	File Name print.php 	%%%%%

define("_WFS_URLFORSTORY","L'indirizzo di questo articolo è:");

// %s represents your site name
define("_WFS_THISCOMESFROM","This article comes from %s");

/////// wfsection
define("_WFS_CATEGORYS","Sezione");
define("_WFS_POSTS","Articoli");
define("_WFS_PUBLISHED","Ultimi articoli");
define("_WFS_WELCOME","%s Sezione");

define("_WFS_ARTICLE","Articolo");
define("_WFS_AUTHER","Autore: "); //********* Updated ************
define("_WFS_AUTH","Autore"); //updated
define("_WFS_CAUTH","<b>Nome dell'autore</b> (Lascia vuoto per usare il nome dell'autore originale)");
define("_WFS_LASTUPDATE","Aggiornato");

// wfsarticle.php

define("_WFS_MAINTEXT","Testo");
//_WFS_ALLOWEDHTML
define("_WFS_DISAMILEY","Disabilita faccine");
define("_WFS_DISHTML","Disabilita HTML");
//_WFS_PREVIEW
define("_WFS_SAVE","Salva");
//_WFS_GO

// themenews.php
define("_WFS_POSTEDBY","Da");
define("_WFS_ON","Su");
define("_WFS_READS","Click");
define("_WFS_FILEUPLOAD","Carica il file allegato");
define("_WFS_FILESHOWNAME","Titolo del file allegato");
define("_WFS_ATTACHEDFILES","Modifica i files allegati");
define("_WFS_NOFILE","Non ci sono 'Files' allegati a questo articolo.");
define("_WFS_AFTERREGED","I files non possono essere allegati ad un articolo vuoto. <br />Crea un articolo, salva e ritorna per allegare il tuo file.");
define("_WFS_FILES","File");
define("_WFS_COMMENTSNUM","Commento");
define("_WFS_CATEGORYDESC","Descrizione");
define("_WFS_CATEGORYHEAD","Intestazione della Sezione. Questo file html o testo apparirà in cima alla Sezione.");
define("_WFS_CATEGORYFOOT","Piè di pagina della Sezione. Questo file html o testo apparirà in fondo alla Sezione.");
define("_WFS_FILEID","ID del file");
define("_WFS_FILEREALNAME","Nome del file quando salvato");
define("_WFS_FILETEXT","Testo della ricerca");
define("_WFS_ARTICLEID","ID dell'articolo");
define("_WFS_EXT","Estensione");
define("_WFS_MINETYPE","Mine Type");
define("_WFS_UPDATEDATE","Ultimo aggiornamento");
define("_WFS_DEL","Cancella");
define("_WFS_CANCEL","Annulla");
define("_WFS_IMGADD","Aggiungi");
define("_WFS_UPLOAD","Carica");
define("_WFS_LINKURL","Indirizzo da collegare");
define("_WFS_LINKURLNAME","Nome da dare al collegamento");
define("_WFS_SUMMARY","Sommario");
define("_WFS_LINK","Link");
define("_WFS_NOTREADFILE","Non è possibile leggere il file!");
define("_WFS_DOWNLOADNAME","Nome del file quando scaricato");
define("_WFS_PAGEBREAK","Pagina delimitata da: [pagebreak]");

//new version 0.9.2
define("_WFS_MAININDEX","Indice principale");
define("_WFS_NOVIEWPERMISSION","Spiacenti! Non hai i permessi per entrare in quest'area.");
define("_WFS_WEBLINK","Link:");
define("_WFS_VOTEAPPRE","Il tuo voto è stato apprezzato.");
define("_WFS_THANKYOU","Grazie per aver votato qui su %s");
define("_WFS_VOTEFROMYOU","Il contributo degli utenti aiuterà gli altri visitatori a decidere quale files scaricare.");
define("_WFS_VOTEONCE","Si prega di non votare più volte per la stessa risorsa.");
define("_WFS_RATINGSCALE","La scala varia da 1 a 10, con 1 che significa scarso e 10 ottimo.");
define("_WFS_BEOBJECTIVE","Si prega di essere obiettivi, se tutti ricevessero 1 o 10, il voto non sarebbe molto utile.");
define("_WFS_DONOTVOTE","Non votare per le tue risorse.");
define("_WFS_RATEIT","Vota!");
define("_WFS_DESCRIPTIONC","Descrizione: ");
define("_WFS_EMAILC","Email: ");
define("_WFS_CATEGORYC","Categoria: ");
define("_WFS_LASTUPDATEC","Ultimo aggiornamento: ");
define("_WFS_DLNOW","Scarica!");
define("_WFS_VERSION","Versione");
define("_WFS_SUBMITDATE","Data d'invio");
define("_WFS_DLTIMES","Scaricato %s volte");
define("_WFS_FILESIZE","Dimensione del file");
define("_WFS_SUPPORTEDPLAT","Piattaforme supportate");
define("_WFS_HOMEPAGE","Home page");
define("_WFS_HITSC","Click: ");
define("_WFS_RATINGC","Voti: ");
define("_WFS_ONEVOTE","1 voto");
define("_WFS_NUMVOTES","%s voti");
define("_WFS_ONEPOST","1 commento");
define("_WFS_NUMPOSTS","%s commenti");
define("_WFS_COMMENTSC","Commenti: ");
define("_WFS_RATETHISFILE","Vota questo file");
define("_WFS_MODIFY","Modifica");
define("_WFS_TELLAFRIEND","Segnala ad un amico");
define("_WFS_VSCOMMENTS","Mostra/Invia commenti");
define("_WFS_EDIT","Modifica");
define("_WFS_SUBMIT","Invia");
define("_WFS_BYTES","Bytes");
define("_WFS_ALREADYREPORTED","Hai già inviato una segnalazione di download corrotto per questa risorsa.");
define("_WFS_MUSTREGFIRST","Spiacenti, non hai i permessi per eseguire questa azione.<br>Si prega di registrarsi od effettuare prima il login!");
define("_WFS_NORATING","Nessun voto selezionato.");
define("_WFS_CANTVOTEOWN","Non puoi votare una risorsa da te inviata.<br>Tutti i voti sono registrati e controllati.");
define("_WFS_RANK","Posizione");
define("_WFS_HITS","Click"); //updated
define("_WFS_RATING","Voto");
define("_WFS_VOTE","Vota");
define("_WFS_TOP10","Top 10 di %s"); // %s is a review category name
define("_WFS_CATEGORIES","Categorie");
define("_WFS_THANKSFORHELP","Grazie per averci aiutato a mantenere integra questa directory.");
define("_WFS_FORSECURITY","Per ragioni di sicurezza il tuo nick e il tuo indirizzo IP verranno temporaneamente registrati.");
define("_WFS_NUMBYTES","%s bytes");
define("_WFS_TIMES"," volte");
define("_WFS_DOWNLOADS","Downloads per ");
define("_WFS_FILETYPE","Tipo di file: ");
define("_WFS_GROUPPROMPT","Consenti l'accesso ai seguenti gruppi:");
define("_WFS_REPORTBROKEN","Segnalazione di file corrotto");
define("_WFS_IMGNAME","Nome del file (Vuoto: Come il file originale (caricato))");
define("_WFS_POSTNEWARTICLE","Invia articolo");
define("_WFS_SMILIE","Aggiungi una faccina all'articolo");
define("_WFS_EXGRAPHIC","Aggiungi della grafica esterna all'articolo");
define("_WFS_GRAPHIC","Aggiungi della grafica locale all'articolo");
define("_WFS_NOIMG","Nessuna immagine");
define("_WFS_ARTIMGUPLOAD","Carica immagine");
define("_WFS_POPULAR","Popolare");
define("_WFS_RATEFILE","Vota");
define("_WFS_COMMENT","Commenti");
define("_WFS_RATED","Voto");
define("_WFS_SUBMIT1","Inviato");
define("_WFS_VOTES","Voti");
define("_WFS_SORTBY1","Ordina per:");
define("_WFS_TITLE1","Titolo");
define("_WFS_DATE1","Data");
define("_WFS_ARTICLEID1","ID dell'articolo");
define("_WFS_POPULARITY1","Popolarità");
define("_WFS_CURSORTBY1","Articoli attualmente ordinati per: %s");
define("_WFS_RATING1","Voto");
define("_WFS_NOTIFYPUBLISH","Notifica via email quando pubblicato");
define("_WFS_POPULARITYLTOM","Popolarità (Dal meno al più cliccato)");
define("_WFS_POPULARITYMTOL","Popolarità (Dal più al meno cliccato)");
define("_WFS_ARTICLEIDLTOM","ID dell'articolo (da 1 a 9)");
define("_WFS_ARTICLEIDMTOL","ID dell'articolo (da 9 a 1)");
define("_WFS_TITLEZTOA","Titolo (dalla Z alla A)");
define("_WFS_TITLEATOZ","Titolo (dalla A alla Z)");
define("_WFS_DATEOLD","Data (Articoli vecchi elencati per primi)");
define("_WFS_DATENEW","Data (Articoli nuovi elencati per primi)");
define("_WFS_RATINGLTOH","Voto (dal punteggio più basso al più alto)");
define("_WFS_RATINGHTOL","Voto (dal punteggio più alto al èiù basso)");
define("_WFS_SUBMITLTOH","Inviato (dai vecchi ai nuovi inviati)");
define("_WFS_SUBMITHTOL","Inviato (dai nuovi ai vecchi inviati)");
define("_WFS_WEIGHT","Peso");
define("_WFS_NOTITLE","ERRORE: Nessun titolo - Si prega di tornare indietro ed inserire un titolo per l'articolo");
define("_WFS_NOMAINTEXT","ERRORE: Nessun corpo principale - Si prega di tornare indietro ed inserire un corpo principale per l'articolo");
define("_WFS_RATINGA","Valutazione dell'articolo: ");
define("_WFS_HTMLPAGE","File HTML </b>(Questo avrà priorità sull'editor di testo)");
define("_WFS_DBUPDATED","Grazie per il tuo contributo.");
define("_WFS_INTFILEAT","Dai un'occhiata a questo articolo su %s");
define("_WFS_INTFILEFOUND","Qui c'è un'interessante articolo che ho trovato su %s");
define("_WFS_DESCRIPTION","Descrizione del file");
define("_WFS_ARTICLEADDIT","Addons dell articolo");
define("_WFS_ARTICLELINK","Indirizzo dell'articolo");
define("_WFS_MISCSETTINGS","Altre impostazioni dell'articolo");
define("_WFS_FILEDESCRIPT","Descrizione del file");
define("_WFS_ATTACHEDFILESTXT","<b>Caricamento dei files</b><br/><br />Questo mostrerà un elenco di files che sono allegati a questo articolo. Puoi modificare ogni file allegato cliccando su link modifica.<br /><br />I files possono essere allegati all'articolo solo quando si editi un articolo salvato.");
define("_WFS_DOWNLOAD","Carica il file allegato");
define("_WFS_PUBLISHEDHOME","Pubblicato");
define("_WFS_ARTSIZE","Dimensione %s");
define("_WFS_DISCLAIMER","<b>Disclaimer:</b>Questo sito non è in alcun modo responsabile per i commenti inviati dai suoi utenti.");
define("_WFS_ONLYREGISTEREDUSERS","Solo gli utenti registrati possono segnalare un download interrotto!");
define("_WFS_THANKSFORINFO","Grazie del contributo. Cercheremo di accontentare la tua richiesta quanto prima.");
define("_WFS_FILEPERMISSION","Permessi per il file");
define("_WFS_DOWNLOADED","Numero di downloads");
define("_WFS_DOWNLOADSIZE","Dimensione del file quando scaricato");
define("_WFS_LASTACCESS","Ultimo accesso sul server");
define("_WFS_LASTUPDATED","Ultimo aggiornamento");
define("_WFS_ERRORCHECK","Il file esiste?");
define("_AM_FILEATTACHED","File allegati all'articolo?");
define("_WFS_NODESCRIPT","Nessuna descrizione per il file.");
define("_WFS_UPLOADED","Aggiornato: ");
define("_WFS_FILEMIMETYPE","Tipo MIME del File");

// add disbr, enaamp
define("_WFS_DISBR","Non cambiare New-line in br.");
define("_WFS_ENAAMP","Cambia &amp; in &amp;amp; nel momento della modifica.");

// article.php
define("_WFS_ARTCLE_MORE","Ci sono due o più articoli dal titolo corrispondente.");
define("_WFS_REPORT_BREOKEN_DOWNLOAD","Segnala download malfunzionante");

// submit.php
define("_WFS_SUBMIT_FAIL","Invio Fallito.");
define("_WFS_BUT_SUBMIT_SUCCESS","Ma, questo articolo è stato inviato");
define("_WFS_SUBMITED_ARTICLE","Articolo inviato");
define("_WFS_UPLOAD_END","Caricato!");
define("_WFS_UPLOAD_FAIL","Questo upload è fallito");
define("_WFS_UPLOAD_NON","Il file da inviare non è stato impostato");
define("_WFS_UPLOAD_TOO_BIG","La dimensione del file eccede la dimensione massima inviabile!\nLa dimensione massima è %s B.");
define("_WFS_UPLOAD_NOT_ALLOWED_MINE_TYPE","Non ti è concesso di inviare questo tipo di file.");

// modify.php
define("_WFS_ARTICLE_BACK","Torna all'Articolo");
define("_WFS_MODIFY_TITLE","Modifica Articolo");
define("_WFS_MODIFY_END","Aggiornato!");
define("_WFS_MODIFY_FAIL","Aggiornamento Fallito.");
define("_WFS_ACTION","Azione");
define("_WFS_DELETE","Cancella");
define("_WFS_FILE_DOWNLOADNAME","Nome File Download");
define("_WFS_FILE_CHECK","Controlla File");
define("_WFS_FILE_NOEXIST","Non esiste");
define("_WFS_FILE_NOFILE","Non è un file corretto");
define("_WFS_FILE_MODIFY_END","File Aggiornato!");
define("_WFS_FILE_DELETE_COMFROM","ATTENZIONE: Sei sicuro di voler cancellare questo File?");
define("_WFS_FILE_DELETE_END","Cancellato!");
define("_WFS_FILE_DELETE_FAIL","Cancellazione fallita.");

// multi language in index.php
define("_WFS_ERROR_IMAGE","ERROR: Prego controlla il  path/file per l'immagine");

?>
