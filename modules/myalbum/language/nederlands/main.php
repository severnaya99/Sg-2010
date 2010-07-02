<?php

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'MYALBUM_MB_LOADED' ) ) {




// Appended by Xoops Language Checker -GIJOE- in 2005-08-31 15:23:36
define('_ALBM_STORETIMESTAMP','Don\'t touch timestamp');
define('_ALBM_TELLAFRIEND','Tell a friend');
define('_ALBM_SUBJECT4TAF','A photo for you!');

// Appended by Xoops Language Checker -GIJOE- in 2004-10-04 16:06:33
define('_ALBM_LIDASC','Record Number (Bigger is latter)');
define('_ALBM_LIDDESC','Record Number (Smaller is latter)');

// Appended by Xoops Language Checker -GIJOE- in 2004-05-17 18:42:56
define('_ALBM_BTN_SELECTALL','Select All');
define('_ALBM_BTN_SELECTNONE','Select None');
define('_ALBM_BTN_SELECTRVS','Select Reverse');
define('_ALBM_FMT_PHOTONUM','%s every a page');
define('_ALBM_AM_BUTTON_UPDATE','Modify');
define('_ALBM_NOIMAGESPECIFIED','Error: No photo is uploaded');
define('_ALBM_FILEREADERROR','Error: Photos are not readable.');
define('_ALBM_DIRECTCATSEL','SELECT A CATEGORY');

define( 'MYALBUM_MB_LOADED' , 1 ) ;

//%%%%%%		Module Name 'MyAlbum-P'		%%%%%

// New in MyAlbum-p

// only "Y/m/d" , "d M Y" , "M d Y" can be interpreted
define( "_ALBM_DTFMT_YMDHI" , "d M Y H:i" ) ;

define( "_ALBM_NEXT_BUTTON" , "Volgende" ) ;
define( "_ALBM_REDOLOOPDONE" , "Voltooid." ) ;

define( "_ALBM_AM_ADMISSION" , "Foto's toevoegen" ) ;
define( "_ALBM_AM_ADMITTING" , "Toegevoegde foto(s)" ) ;
define( "_ALBM_AM_LABEL_ADMIT" , "Gecontroleerde foto's toevoegen" ) ;
define( "_ALBM_AM_BUTTON_ADMIT" , "Toevoegen" ) ;
define( "_ALBM_AM_BUTTON_EXTRACT" , "Uitpakken" ) ;

define( "_ALBM_AM_PHOTOMANAGER" , "Foto Manager" ) ;
define( "_ALBM_AM_PHOTONAVINFO" , "Foto's %s-%s (van %s gevonden foto's)" ) ;
define( "_ALBM_AM_LABEL_REMOVE" , "Gecontroleerde foto's verwijderen" ) ;
define( "_ALBM_AM_BUTTON_REMOVE" , "Verwijder!" ) ;
define( "_ALBM_AM_JS_REMOVECONFIRM" , "OK om te verwijderen?" ) ;
define( "_ALBM_AM_LABEL_MOVE" , "Categorie van gecontroleerde foto's wijzigen" ) ;
define( "_ALBM_AM_BUTTON_MOVE" , "Verplaats" ) ;
define( "_ALBM_AM_DEADLINKMAINPHOTO" , "De foto bestaat niet" ) ;

define( "_ALBM_RADIO_ROTATETITLE" , "Foto roteren" ) ;
define( "_ALBM_RADIO_ROTATE0" , "niet draaien" ) ;
define( "_ALBM_RADIO_ROTATE90" , "draai naar rechts" ) ;
define( "_ALBM_RADIO_ROTATE180" , "draai 180 graden" ) ;
define( "_ALBM_RADIO_ROTATE270" , "draai naar links" ) ;


// New MyAlbum 1.0.1 (and 1.2.0)
define("_ALBM_MOREPHOTOS","Meer foto's van %s");
define("_ALBM_REDOTHUMBS","Thumbnails herstellen (<a href='redothumbs.php'>herstart</a>)");
define("_ALBM_REDOTHUMBSINFO","Een te groot aantal kan tot server time-outs leiden.");
define("_ALBM_REDOTHUMBSNUMBER","Aantal thumbnails tegelijk");
define("_ALBM_REDOING","Verwerken: ");
define("_ALBM_BACK","Terug");
define("_ALBM_ADDPHOTO","Foto toevoegen");


// New MyAlbum 1.0.0
define("_ALBM_PHOTOBATCHUPLOAD","Registreer foto's die al op de server aanwezig zijn");
define("_ALBM_PHOTOUPLOAD","Foto upload");
define("_ALBM_PHOTOEDITUPLOAD","Foto bewerken en opnieuw uploaden");
define("_ALBM_MAXPIXEL","Max aantal pixels");
define("_ALBM_MAXSIZE","Max bestandsgrootte");
define("_ALBM_PHOTOTITLE","Titel");
define("_ALBM_PHOTOPATH","Pad");
define("_ALBM_TEXT_DIRECTORY","Directory");
define("_ALBM_DESC_PHOTOPATH","Vul de volledige padnaam in van de foto's die geregistreerd moeten worden");
define("_ALBM_MES_INVALIDDIRECTORY","De opgegeven directory is onjuist.");
define("_ALBM_MES_BATCHDONE","%s foto(s) is/zijn geregistreerd.");
define("_ALBM_MES_BATCHNONE","Er zijn in deze directory geen foto's gevonden.");
define("_ALBM_PHOTODESC","Beschrijving");
define("_ALBM_PHOTOCAT","Categorie");
define("_ALBM_SELECTFILE","Kies foto");
define("_ALBM_FILEERROR","Geen foto ge-upload of foto te groot.");

define("_ALBM_BATCHBLANK","Laat de titel leeg om de bestandsnamen als titel te gebruiken");
define("_ALBM_DELETEPHOTO","Verwijder?");
define("_ALBM_VALIDPHOTO","Geldig");
define("_ALBM_PHOTODEL","Foto verwijderen?");
define("_ALBM_DELETINGPHOTO","Foto verwijderen");
define("_ALBM_MOVINGPHOTO","Foto verplaatsen");

define("_ALBM_POSTERC","Gepost door: ");
define("_ALBM_DATEC","Datum: ");
define("_ALBM_EDITNOTALLOWED","Je bent niet bevoegd om dit commentaar te bewerken!");
define("_ALBM_ANONNOTALLOWED","Anonieme gebruikers mogen geen foto's toevoegen.");
define("_ALBM_THANKSFORPOST","Bedankt!");
define("_ALBM_DELNOTALLOWED","Je bent niet bevoegd om dit commentaar te verwijderen!");
define("_ALBM_GOBACK","Ga terug");
define("_ALBM_AREYOUSURE","Weet je zeker dat je dit commentaar en de bijbehorende thread wilt verwijderen?");
define("_ALBM_COMMENTSDEL","Verwijderen geslaagd!");

// End New

define("_ALBM_THANKSFORINFO","Bedankt voor je bericht. We zullen hier zo snel mogelijk naar kijken.");
define("_ALBM_BACKTOTOP","Terug");
define("_ALBM_THANKSFORHELP","Bedankt voor je hulp met het schoonhouden van de fotogallerij.");
define("_ALBM_FORSECURITY","In verband met veiligheid zullen je gebruikersnaam en IP adres tijdelijk worden bewaard.");

define("_ALBM_MATCH","Overeenkomst");
define("_ALBM_ALL","Alle");
define("_ALBM_ANY","Elke");
define("_ALBM_NAME","Naam");
define("_ALBM_DESCRIPTION","Beschrijving");

define("_ALBM_MAIN","Index");
define("_ALBM_NEW","Nieuw");
define("_ALBM_UPDATED","Bijgewerkt");
define("_ALBM_POPULAR","Populair");
define("_ALBM_TOPRATED","Top Noteringen");

define("_ALBM_POPULARITYLTOM","Populariteit (minste naar meeste hits)");
define("_ALBM_POPULARITYMTOL","Populariteit (meeste naar minste hits)");
define("_ALBM_TITLEATOZ","Titel (A tot Z)");
define("_ALBM_TITLEZTOA","Titel (Z tot A)");
define("_ALBM_DATEOLD","Datum (oudste eerst)");
define("_ALBM_DATENEW","Datum (nieuwste eerst)");
define("_ALBM_RATINGLTOH","Beoordeling (laagste tot hoogste score)");
define("_ALBM_RATINGHTOL","Beoordeling (hoogste tot laagste score)");

define("_ALBM_NOSHOTS","Geen screenshots beschikbaar");
define("_ALBM_EDITTHISPHOTO","Foto bewerken");

define("_ALBM_DESCRIPTIONC","Beschrijving: ");
define("_ALBM_EMAILC","Email: ");
define("_ALBM_CATEGORYC","Categorie: ");
define("_ALBM_SUBCATEGORY","SubcategoriõÏ: ");
define("_ALBM_LASTUPDATEC","Laatste update: ");
define("_ALBM_HITSC","Hits: ");
define("_ALBM_RATINGC","Score: ");
define("_ALBM_ONEVOTE","1 stem");
define("_ALBM_NUMVOTES","%s stemmen");
define("_ALBM_ONEPOST","1 post");
define("_ALBM_NUMPOSTS","%s posts");
define("_ALBM_COMMENTSC","Commentaar: ");
define("_ALBM_RATETHISPHOTO","Beoordeel deze foto");
define("_ALBM_MODIFY","Wijzigen");
define("_ALBM_VSCOMMENTS","Lees/stuur commentaar");

define("_ALBM_THEREARE","Er zijn <b>%s</b> foto's in onze database.");
define("_ALBM_LATESTLIST","Meest recente foto's");

define("_ALBM_VOTEAPPRE","Wij stellen uw beoordeling op prijs.");
define("_ALBM_THANKURATE","Bedankt voor het beoordelen van een foto op %s.");
define("_ALBM_VOTEONCE","Kies aub niet meer dan òën keer voor dezelfde foto.");
define("_ALBM_RATINGSCALE","De schaal is 1 - 10, 1 is slecht en 10 is uitstekend.");
define("_ALBM_BEOBJECTIVE","Wees aub objektief, wanneer iedereen een 1 of een 10 ontvangt, zijn de beoordelingen niet erg waardevol.");
define("_ALBM_DONOTVOTE","Kies aub niet voor uw eigen foto.");
define("_ALBM_RATEIT","Waardeer nu!");

define("_ALBM_RECEIVED","We hebben uw foto ontvangen. Bedankt!");
define("_ALBM_ALLPENDING","Alle foto's worden na verificatie gepost.");

define("_ALBM_RANK","Notering");
define("_ALBM_CATEGORY","Categorie");
define("_ALBM_HITS","Hits");
define("_ALBM_RATING","Beoordeling");
define("_ALBM_VOTE","Stem");
define("_ALBM_TOP10","%s Top 10"); // %s is a photo category title

define("_ALBM_SORTBY","Sorteer op:");
define("_ALBM_TITLE","Titel");
define("_ALBM_DATE","Datum");
define("_ALBM_POPULARITY","Populariteit");
define("_ALBM_CURSORTEDBY","Foto's zijn nu gesorteerd op: %s");
define("_ALBM_FOUNDIN","Gevonden in:");
define("_ALBM_PREVIOUS","Vorige");
define("_ALBM_NEXT","Volgende");
define("_ALBM_NOMATCH","Geen foto die aan uw criteria voldoet");

define("_ALBM_CATEGORIES","CategoriõÏ");

define("_ALBM_SUBMIT","Verstuur");
define("_ALBM_CANCEL","Annuleren");

define("_ALBM_MUSTREGFIRST","Sorry, je hebt geen bevoegdheid voor deze aktie.<br>Registreer eerst of login!");
define("_ALBM_MUSTADDCATFIRST","Sorry, je hebt nog geen categoriõÏ waaraan je foto's kunt toevoegen.<br>Maak eerst een categorie!");
define("_ALBM_NORATING","Geen notering geselekteerd.");
define("_ALBM_CANTVOTEOWN","Je kunt niet stemmen op de foto die je hebt toegevoegd.<br>Alle stemmen worden bewaard en bekeken.");
define("_ALBM_VOTEONCE2","Stem slechts òënmaal op een foto.<br>Alle stemmen worden bewaard en bekeken.");

//%%%%%%	Module Name 'MyAlbum' (Admin)	  %%%%%

define("_ALBM_PHOTOSWAITING","Wachtende foto's voor controle");
define("_ALBM_PHOTOMANAGER","Foto Management");
define("_ALBM_CATEDIT","CategoriõÏ toevoegen, wijzigen of verwijderen");
define("_ALBM_GROUPPERM_GLOBAL","Globale permissies");
define("_ALBM_CHECKCONFIGS","Check configuratie");
define("_ALBM_BATCHUPLOAD","Batch registratie");
define("_ALBM_GENERALSET","Voorkeuren voor myAlbum-P");
define("_ALBM_REDOTHUMBS2","Herstel thumbnails");

define("_ALBM_SUBMITTER","Toegevoegd door");
define("_ALBM_DELETE","Verwijderen");
define("_ALBM_NOSUBMITTED","Geen nieuwe foto's.");
define("_ALBM_ADDMAIN","Voeg HOOFDcategorie toe");
define("_ALBM_IMGURL","Icoon URL (OPTIONAL Hoogte van het icoon wordt geschaald naar 50): ");
define("_ALBM_ADD","Toevoegen");
define("_ALBM_ADDSUB","Voeg een SUBcategorie toe");
define("_ALBM_IN","in");
define("_ALBM_MODCAT","Categorie wijzigen");
define("_ALBM_DBUPDATED","Database succesvol ververst!");
define("_ALBM_MODREQDELETED","Verzoek tot wijziging verwijderd.");
define("_ALBM_IMGURLMAIN","Icoon URL (OPTIONEEL en alleen geldig voor hoofdcategoriõÏ. Icoon hoogte wordt geschaald naar 50): ");
define("_ALBM_PARENT","Bovenliggende categorie:");
define("_ALBM_SAVE","Wijzigingen opslaan");
define("_ALBM_CATDELETED","Categorie verwijderd.");
define("_ALBM_CATDEL_WARNING","LET OP: Wilt u deze categorie met alle foto's en commentaren verwijderen?");
define("_ALBM_YES","Yes");
define("_ALBM_NO","No");
define("_ALBM_NEWCATADDED","Nieuwe categorie toegevoegd!");
define("_ALBM_ERROREXIST","FOUT: De foto die u wilde toevoegen zit al in de database!");
define("_ALBM_ERRORTITLE","FOUT: U moet de TITEL invullen!");
define("_ALBM_ERRORDESC","FOUT: U moet een BESCHRIJVING invullen!");
define("_ALBM_WEAPPROVED","We hebben uw link aan onze foto database toegevoegd.");
define("_ALBM_THANKSSUBMIT","Bedankt!");
define("_ALBM_CONFUPDATED","Configuratie met succes bijgewerkt!");

}

?>
