<?php

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'MYALBUM_MB_LOADED' ) ) {



// Appended by Xoops Language Checker -GIJOE- in 2004-10-04 16:06:33
define('_ALBM_LIDASC','Record Number (Bigger is latter)');
define('_ALBM_LIDDESC','Record Number (Smaller is latter)');

// Appended by Xoops Language Checker -GIJOE- in 2004-05-17 18:42:55
define('_ALBM_BTN_SELECTALL','Markera Alla');
define('_ALBM_BTN_SELECTNONE','Markera Ingen');
define('_ALBM_BTN_SELECTRVS','Markera Omvända');
define('_ALBM_FMT_PHOTONUM','%s på varje sida');
define('_ALBM_AM_BUTTON_UPDATE','Editera');
define('_ALBM_NOIMAGESPECIFIED','Fel: Inga foto har laddats upp.');
define('_ALBM_FILEREADERROR','Fel: Fotona är inte läsbara.');
define('_ALBM_DIRECTCATSEL','Välj en kategori');

define( 'MYALBUM_MB_LOADED' , 1 ) ;

//%%%%%%		Module Name 'MyAlbum-P'		%%%%%

// New in MyAlbum-p

// only "Y/m/d" , "d M Y" , "M d Y" can be interpreted
define( "_ALBM_DTFMT_YMDHI" , "d M Y H:i" ) ;

define( "_ALBM_NEXT_BUTTON" , "Nästa" ) ;
define( "_ALBM_REDOLOOPDONE" , "Klart." ) ;

define( "_ALBM_AM_ADMISSION" , "Godkänn foto" ) ;
define( "_ALBM_AM_ADMITTING" , "Godkännda foto" ) ;
define( "_ALBM_AM_LABEL_ADMIT" , "Godkänn det markerade fotot " ) ;
define( "_ALBM_AM_BUTTON_ADMIT" , "Godkänn" ) ;
define( "_ALBM_AM_BUTTON_EXTRACT" , "Packa upp" ) ;

define( "_ALBM_AM_PHOTOMANAGER" , "Foto Manager" ) ;
define( "_ALBM_AM_PHOTONAVINFO" , "Foto nr. %s-%s (av totalt %s foto träffar)" ) ;
define( "_ALBM_AM_LABEL_REMOVE" , "Ta bort markerade foto " ) ;
define( "_ALBM_AM_BUTTON_REMOVE" , "Ta bort!" ) ;
define( "_ALBM_AM_JS_REMOVECONFIRM" , "OK att ta bort?" ) ;
define( "_ALBM_AM_LABEL_MOVE" , "Byta kategori på markerade foto " ) ;
define( "_ALBM_AM_BUTTON_MOVE" , "Flytta" ) ;
define( "_ALBM_AM_DEADLINKMAINPHOTO" , "Orginal bilden finns inte " ) ;

define( "_ALBM_RADIO_ROTATETITLE" , "Bild Rotering" ) ;
define( "_ALBM_RADIO_ROTATE0" , "ingen vridning" ) ;
define( "_ALBM_RADIO_ROTATE90" , "vrid höger" ) ;
define( "_ALBM_RADIO_ROTATE180" , "vrid 180 grader" ) ;
define( "_ALBM_RADIO_ROTATE270" , "vrid vänster" ) ;


// New MyAlbum 1.0.1 (and 1.2.0)
define("_ALBM_MOREPHOTOS","Mer foto från %s");
define("_ALBM_REDOTHUMBS","Gör om Miniatyrer (<a href='redothumbs.php'>re-start</a>)");
define("_ALBM_REDOTHUMBSINFO","Förstort antal kan leda till server time out.");
define("_ALBM_REDOTHUMBSNUMBER","Antal miniatyrer åt gången");
define("_ALBM_REDOING","Görs om: ");
define("_ALBM_BACK","Tillbaka");
define("_ALBM_ADDPHOTO","Lägg till Foto");


// New MyAlbum 1.0.0
define("_ALBM_PHOTOBATCHUPLOAD","Registrera foto redan uppladdade till servern");
define("_ALBM_PHOTOUPLOAD","Ladda upp Foto");
define("_ALBM_PHOTOEDITUPLOAD","Editera Foto och ladda upp igen");
define("_ALBM_MAXPIXEL","Max pixel storlek");
define("_ALBM_MAXSIZE","Max fil storlek");
define("_ALBM_PHOTOTITLE","Titel");
define("_ALBM_PHOTOPATH","Sökväg");
define("_ALBM_TEXT_DIRECTORY","Katalog");
define("_ALBM_DESC_PHOTOPATH","Skriv komplett sökväg till katalogen som innehåller foto som skall registreras");
define("_ALBM_MES_INVALIDDIRECTORY","Ogiltig sökväg angiven.");
define("_ALBM_MES_BATCHDONE","%s foto(n) har registrerats.");
define("_ALBM_MES_BATCHNONE","Inga foto hittades i katalogen.");
define("_ALBM_PHOTODESC","Beskrivning");
define("_ALBM_PHOTOCAT","Kategori");
define("_ALBM_SELECTFILE","Välj foto");
define("_ALBM_FILEERROR","Inget foto uppladdat eller så är fotot för stort");

define("_ALBM_BATCHBLANK","Lämna titeln tom för att använda filnamnet som titel");
define("_ALBM_DELETEPHOTO","Radera?");
define("_ALBM_VALIDPHOTO","Godkänd");
define("_ALBM_PHOTODEL","Radera foto?");
define("_ALBM_DELETINGPHOTO","Raderar foto");
define("_ALBM_MOVINGPHOTO","Flyttar foto");

define("_ALBM_POSTERC","Publicerare: ");
define("_ALBM_DATEC","Datum: ");
define("_ALBM_EDITNOTALLOWED","Ni har inte tillåtelse att editera denna kommentar!");
define("_ALBM_ANONNOTALLOWED","Anonyma användare får inte publicera här.");
define("_ALBM_THANKSFORPOST","Tack för ditt bidrag!");
define("_ALBM_DELNOTALLOWED","Ni har inte tillåtelse att redera denna kommentar!");
define("_ALBM_GOBACK","Gå tillbaka");
define("_ALBM_AREYOUSURE","Är Ni säker på att Ni vill radera denna kommentar och alla efterföljande kommentarer?");
define("_ALBM_COMMENTSDEL","Radering av Kommentar(er) Lyckades!");

// End New

define("_ALBM_THANKSFORINFO","Tack för informationen. Vi kommer att ta hand om Er förfrågan inom kort.");
define("_ALBM_BACKTOTOP","Tillbaka till Foto");
define("_ALBM_THANKSFORHELP","Tack för att Ni hjälper till att upprätthålla katalogens integritet.");
define("_ALBM_FORSECURITY","På grund av säkerhets skäl så lagras Ert namn och IP adress tillfälligt.");

define("_ALBM_MATCH","Exakt matchning");
define("_ALBM_ALL","Alla");
define("_ALBM_ANY","Någon");
define("_ALBM_NAME","Namn");
define("_ALBM_DESCRIPTION","Beskrivning");

define("_ALBM_MAIN","Index");
define("_ALBM_POPULAR","Populär");
define("_ALBM_TOPRATED","Topprankad");

define("_ALBM_POPULARITYLTOM","Populärast (Minst till Flest träffar)");
define("_ALBM_POPULARITYMTOL","Populärast (Flest till Minst träffar)");
define("_ALBM_TITLEATOZ","Titel (A to Ö)");
define("_ALBM_TITLEZTOA","Titel (Ö to A)");
define("_ALBM_DATEOLD","Datum (Gamla foto listas först)");
define("_ALBM_DATENEW","Datum (Nya foto listas först)");
define("_ALBM_RATINGLTOH","Bedömning (Lägsta resultat till Högsta resultat)");
define("_ALBM_RATINGHTOL","Bedömning (Högsta resultat till Lägsta resultat)");

define("_ALBM_NOSHOTS","Ingen skärmdump tillgänglig");
define("_ALBM_EDITTHISPHOTO","Editera detta Foto");

define("_ALBM_DESCRIPTIONC","Beskrivning: ");
define("_ALBM_EMAILC","E-post: ");
define("_ALBM_CATEGORYC","Kategori: ");
define("_ALBM_SUBCATEGORY","Underkategorier: ");
define("_ALBM_LASTUPDATEC","Uppdaterad senast: ");
define("_ALBM_HITSC","Träffar: ");
define("_ALBM_RATINGC","Bedömning: ");
define("_ALBM_ONEVOTE","1 röst");
define("_ALBM_NUMVOTES","%s röster");
define("_ALBM_ONEPOST","1 publicering");
define("_ALBM_NUMPOSTS","%s publiceringar");
define("_ALBM_COMMENTSC","Kommentarer: ");
define("_ALBM_RATETHISPHOTO","Bedöm detta foto");
define("_ALBM_MODIFY","Modifiera");
define("_ALBM_VSCOMMENTS","Titta/Skicka Kommentarer");

define("_ALBM_THEREARE","Där är <b>%s</b> foto i vår databas.");
define("_ALBM_LATESTLIST","Senaste publiceringar");

define("_ALBM_VOTEAPPRE","Er röst är uppskattad.");
define("_ALBM_THANKURATE","Tack för att Ni tar Er tid att bedömma ett foto här på %s.");
define("_ALBM_VOTEONCE","Var snäll och rösta inte på samma foto flera gånger.");
define("_ALBM_RATINGSCALE","Bedömningsskalan är 1 - 10, där 1 är dålig och 10 är brilliant.");
define("_ALBM_BEOBJECTIVE","Försök att vara objektiv, om alla får en 1 eller en 10 så är inte bedömningen särskilt användbar.");
define("_ALBM_DONOTVOTE","Rösta inte på Era egna foto.");
define("_ALBM_RATEIT","Rösta!");

define("_ALBM_RECEIVED","Vi har mottagit Ert foto, tack!");
define("_ALBM_ALLPENDING","Alla foto publiceras efter verifiering/granskning.");

define("_ALBM_RANK","Placering");
define("_ALBM_CATEGORY","Kategori");
define("_ALBM_HITS","Träffar");
define("_ALBM_RATING","Bedömmning");
define("_ALBM_VOTE","Rösta");
define("_ALBM_TOP10","%s Topp 10"); // %s is a photo category title

define("_ALBM_SORTBY","Sorterad på:");
define("_ALBM_TITLE","Titel");
define("_ALBM_DATE","Datum");
define("_ALBM_POPULARITY","Populäritet");
define("_ALBM_CURSORTEDBY","Foto sorterade på: %s");
define("_ALBM_FOUNDIN","Hittade i:");
define("_ALBM_PREVIOUS","Föregående");
define("_ALBM_NEXT","Nästa");
define("_ALBM_NOMATCH","Finns inga foto som Ni efterfrågade");

define("_ALBM_CATEGORIES","Kategorier");

define("_ALBM_SUBMIT","Skicka");
define("_ALBM_CANCEL","Avbryt");

define("_ALBM_MUSTREGFIRST","Beklagar, Ni har inte tillåtelse att utföra denna procedur.<br>Vänligen registrera Er eller logga in först!");
define("_ALBM_MUSTADDCATFIRST","Beklagar, Ni har inga kategorier att lägga till i ännu.<br>Vänligen skapa en kategori först!");
define("_ALBM_NORATING","Ingen bedömmning vald.");
define("_ALBM_CANTVOTEOWN","Ni kan inte rösta på en bild som Ni själva har skickat in.<br>Alla röster loggas och kontrolleras.");
define("_ALBM_VOTEONCE2","Rösta bara en gång på det valda fotot.<br>Alla röster loggas och kontrolleras.");

//%%%%%%	Module Name 'MyAlbum' (Admin)	  %%%%%

define("_ALBM_PHOTOSWAITING","Foto som väntar på Validering");
define("_ALBM_PHOTOMANAGER","Foto underhåll");
define("_ALBM_CATEDIT","Lägg till, Modifiera och Radera Kategorier");
define("_ALBM_CHECKCONFIGS","Kontrollera Konfiguration&Miljö");
define("_ALBM_BATCHUPLOAD","Batch Uppladdningar");
define("_ALBM_GENERALSET","Inställningar för myAlbum-P");
define("_ALBM_REDOTHUMBS2","Gör om Miniatyrer");

define("_ALBM_SUBMITTER","Inskickad av");
define("_ALBM_DELETE","Radera");
define("_ALBM_NOSUBMITTED","Inga nypublicerade Foto.");
define("_ALBM_ADDMAIN","Lägg till en HUVUD Kategori");
define("_ALBM_IMGURL","Bild URL (FRIVILLIG, bildhöjden kommer att ändras till 50): ");
define("_ALBM_ADD","Lägg till");
define("_ALBM_ADDSUB","Lägg till en Underkategori");
define("_ALBM_IN","i");
define("_ALBM_MODCAT","Modifiera Kategori");
define("_ALBM_DBUPDATED","Uppdateringen av databasen lyckades!");
define("_ALBM_MODREQDELETED","Förfrågan om modifiering raderad.");
define("_ALBM_IMGURLMAIN","Bild URL (FRIVILLIG och ENDAST giltig för huvudkategorier. Bildhöjden kommer att ändras till 50): ");
define("_ALBM_PARENT","Övergripande kategori:");
define("_ALBM_SAVE","Spara ändringarna");
define("_ALBM_CATDELETED","Kategori Raderad.");
define("_ALBM_CATDEL_WARNING","VARNING: Är Ni säker på att Ni vill radera denna Kategori och ALLA dess Foto och Kommentarer?");
define("_ALBM_YES","Ja");
define("_ALBM_NO","Nej");
define("_ALBM_NEWCATADDED","Ny Kategori sparad!");
define("_ALBM_ERROREXIST","FEL: Fotot som Ni skickade in finns redan i databasen!");
define("_ALBM_ERRORTITLE","FEL: Ni måste ange en TITEL!");
define("_ALBM_ERRORDESC","Fel: Ni måste ange en BESKRIVNING!");
define("_ALBM_WEAPPROVED","Vi godkänner Ert inskickade bidrag till foto databasen.");
define("_ALBM_THANKSSUBMIT","Tack för Ert bidrag!");
define("_ALBM_CONFUPDATED","Uppdateringen av Konfigurationen lyckades!");
?>
<?php
// Appended by Xoops Language Checker -GIJOE- in 2004-01-27 15:37:03
define('_ALBM_NEW','Ny');
define('_ALBM_UPDATED','Uppdaterad');
define('_ALBM_GROUPPERM_GLOBAL','Globala Rättigheter');

}

?>
