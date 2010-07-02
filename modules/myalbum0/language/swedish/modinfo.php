<?php
// Module Info

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'MYALBUM_MI_LOADED' ) ) {






// Appended by Xoops Language Checker -GIJOE- in 2004-10-04 16:06:33
define('_ALBM_CFG_DEFAULTORDER','Default order in category\'s view');

// Appended by Xoops Language Checker -GIJOE- in 2004-06-24 17:58:59
define('_ALBM_CFG_USESITEIMG','Använd [siteimg] vid ImageManager Integration');
define('_ALBM_CFG_DESCUSESITEIMG','Integrated Image Manager input [siteimg] istället för [img].<br />Ni måste modifiera module.textsanitizer.php eller varje modul för att aktivera [siteimg] taggen.');

// Appended by Xoops Language Checker -GIJOE- in 2004-05-19 13:56:06
define('_ALBM_CFG_MIDDLEPIXEL','Max bild storlek vid visning av bilder en och en.');
define('_ALBM_CFG_DESCMIDDLEPIXEL','Specificera (breddxhöjd) t.ex. 480x480');

// Appended by Xoops Language Checker -GIJOE- in 2004-05-17 18:42:55
define('_ALBM_CFG_DESCPERPAGE','Ange valbara nummer separerade med \'|\' t.ex.) 10|20|50|100');

// Appended by Xoops Language Checker -GIJOE- in 2004-05-05 15:14:38
define('_ALBM_CFG_ALLOWNOIMAGE','Tillåts inskickade utan bilder');
define('_ALBM_CFG_ALLOWEDEXTS','Filtyper som kan laddas upp');
define('_ALBM_CFG_DESCALLOWEDEXTS','Ange filändelser med avgränsare \'|\'. (t.ex. \'jpg|jpeg|gif|png\').<br />Alla tecken måste vara skrivna i små bokstäver. Ange inga punkter eller mellanrum');
define('_ALBM_CFG_ALLOWEDMIME','MIME Typer som kan laddas upp');
define('_ALBM_CFG_DESCALLOWEDMIME','Ange MIME Typer med avgränsare \'|\'. (t.ex. \'image/gif|image/jpeg|image/png\')<br />Om Ni inte vill att filen skall kontrolleras mot MIME Typ, lämna fältet blankt.');
define('_ALBM_MYALBUM_ADMENU_IMPORT','Importera Bilder');
define('_ALBM_MYALBUM_ADMENU_EXPORT','Exportera Bilder');
define('_ALBM_MYALBUM_ADMENU_MYBLOCKSADMIN','Block&Grupp Administration');

define( 'MYALBUM_MI_LOADED' , 1 ) ;

// The name of this module
define("_ALBM_MYALBUM_NAME","MyAlbum");

// A brief description of this module
define("_ALBM_MYALBUM_DESC","Skapar ett fotoalbum där användare kan söka/lägga till/bedömma olika foto.");

// Names of blocks for this module (Not all module has blocks)
define("_ALBM_BNAME_RECENT","Nyinkommna Foto");
define("_ALBM_BNAME_HITS","Topplacerade Foto");
define("_ALBM_BNAME_RANDOM","Slumpvalt Foto");
define("_ALBM_BNAME_RECENT_P","Nyinkommna Foto med Miniatyrer");
define("_ALBM_BNAME_HITS_P","Topplacerade Foto med Miniatyrer");

// Config Items
define( "_ALBM_CFG_PHOTOSPATH" , "Sökväg till Fotona" ) ;
define( "_ALBM_CFG_DESCPHOTOSPATH" , "Sökväg till katalogen som XOOPS är installerad i.<br />(Första tecknet måste vara '/'. Sista tecknet skall INTE vara  '/'.)<br />Denna katalogs rättigheter är 777 eller 707 i unix." ) ;
define( "_ALBM_CFG_THUMBSPATH" , "Sökväg till Miniatyrbilderna" ) ;
define( "_ALBM_CFG_DESCTHUMBSPATH" , "Samma som 'Sökväg till Fotona'." ) ;
//define( "_ALBM_CFG_USEIMAGICK" , "Använd ImageMagick för behandling av bilder" ) ;
//define( "_ALBM_CFG_DESCIMAGICK" , "Not use ImageMagick cause Not work resize or rotate the main photo, and make thumbnails by GD.<br />Det är bättre att använda ImageMagick om du kan." ) ;
define( "_ALBM_CFG_IMAGINGPIPE" , "Paket för bildbehandling" ) ;
define( "_ALBM_CFG_DESCIMAGINGPIPE" , "Nästan alla PHP installationer kan använda GD. Men GD är funktionellt underlägsen de andra två paketen.<br />Det är bättre att använda ImageMagick eller NetPBM om du kan." ) ;
define( "_ALBM_CFG_FORCEGD2" , "Tvinga GD2 konvertering" ) ;
define( "_ALBM_CFG_DESCFORCEGD2" , "Även om GD är paketerad tillsammans med PHP och den använder GD2(truecolor) konvertering.<br />Vissa PHP konfigurationer misslyckas att skapa miniatyrbilder i GD2<br />Denna inställning gäller endast om man använder GD" ) ;
define( "_ALBM_CFG_IMAGICKPATH" , "Sökväg till ImageMagick" ) ;
define( "_ALBM_CFG_DESCIMAGICKPATH" , "Fullständig sökväg till 'convert'<br />(Sista tecknet skall INTE vara '/'.)<br />Denna inställning gäller endast om man använder ImageMagick" ) ;
define( "_ALBM_CFG_NETPBMPATH" , "Sökväg till NetPBM" ) ;
define( "_ALBM_CFG_DESCNETPBMPATH" , "Fullständig sökväg till 'pnmscale' mm.<br />(Sista tecknet skall INTE vara '/'.)<br />Denna inställning gäller endast om man använder NetPBM" ) ;
define( "_ALBM_CFG_POPULAR" , "Träffar för att bli Populär" ) ;
define( "_ALBM_CFG_NEWDAYS" , "Dagar mellan visning av iconer för 'new'&'update'" ) ;
define( "_ALBM_CFG_NEWPHOTOS" , "Antal Foto som Nya på Top Page" ) ;
define( "_ALBM_CFG_PERPAGE" , "Visade Foto per sida" ) ;
define( "_ALBM_CFG_MAKETHUMB" , "Gör Miniatyr bild" ) ;
define( "_ALBM_CFG_DESCMAKETHUMB" , "När Ni ändrar 'Nej' till 'Ja', Är det lämpligt att 'Göra om Miniatyrer'." ) ;
//define( "_ALBM_CFG_THUMBWIDTH" , "Bredd på Miniatyrbild" ) ;
//define( "_ALBM_CFG_DESCTHUMBWIDTH" , "Höjden på Miniatyrbilden avgörs automatiskt utifrån bredden." ) ;
define( "_ALBM_CFG_THUMBSIZE" , "Storlek på Miniatyrer (pixel)" ) ;
define( "_ALBM_CFG_THUMBRULE" , "Beräkningsregel för att göra miniatyrer" ) ;
define( "_ALBM_CFG_WIDTH" , "Max Foto bredd" ) ;
define( "_ALBM_CFG_DESCWIDTH" , "Detta innebär att fotots bredd kommer att förändras.<br />Om du använder GD utan truecolor, innebär detta begränsning av bredden." ) ;
define( "_ALBM_CFG_HEIGHT" , "Max foto höjd" ) ;
define( "_ALBM_CFG_DESCHEIGHT" , "Samma som 'Max foto bredd'." ) ;
define( "_ALBM_CFG_FSIZE" , "Max filstorlek" ) ;
define( "_ALBM_CFG_DESCFSIZE" , "Begränsning av storleken på den uppladdade filen." ) ;
define( "_ALBM_CFG_NEEDADMIT" , "Behöver godkännande för nytt foto" ) ;
define( "_ALBM_CFG_ADDPOSTS" , "Det nummer som läggs till 'User's posts' vid publicering av ett foto." ) ;
define( "_ALBM_CFG_DESCADDPOSTS" , "Normalt, 0 eller 1. Mindre är 0 betyder 0" ) ;

define( "_ALBM_CFG_CATONSUBMENU" , "Registrera Topp kategorier i undermeny" ) ;
define( "_ALBM_CFG_NAMEORUNAME" , "Publicistens namn visas" ) ;
define( "_ALBM_CFG_DESCNAMEORUNAME" , "Välj vilket 'namn' som visas" ) ;
define( "_ALBM_OPT_USENAME" , "Riktigt Namn" ) ;
define( "_ALBM_OPT_USEUNAME" , "Alias Namn" ) ;

define( "_ALBUM_OPT_CALCFROMWIDTH" , "Bredd:specificerad  höjd:automatisk" ) ;
define( "_ALBUM_OPT_CALCFROMHEIGHT" , "Bredd:automatisk  bredd:specificerad" ) ;
define( "_ALBUM_OPT_CALCWHINSIDEBOX" , "ange storlek i specificerad ruta" ) ;

// Sub menu titles
define("_ALBM_TEXT_SMNAME1","Lägg till");
define("_ALBM_TEXT_SMNAME2","Populära");
define("_ALBM_TEXT_SMNAME3","Topplacerade");
define("_ALBM_TEXT_SMNAME4","Mina Foto");

// Names of admin menu items
define("_ALBM_MYALBUM_ADMENU0","Inskickade foto");
define("_ALBM_MYALBUM_ADMENU1","Foto Underhåll");
define("_ALBM_MYALBUM_ADMENU2","Lägg till/Editera Kategorier");
define("_ALBM_MYALBUM_ADMENU3","Kontrollera Konf&Miljö");
define("_ALBM_MYALBUM_ADMENU4","Batch Registrering");
define("_ALBM_MYALBUM_ADMENU5","Gör om Miniatyrer");

?><?php
// Appended by Xoops Language Checker -GIJOE- in 2004-01-27 15:37:03
define('_ALBM_CFG_VIEWCATTYPE','Typ av vy i Kategorier');
define('_ALBM_CFG_COLSOFTABLEVIEW','Antal kolumner i tabell vyn');
define('_ALBM_OPT_VIEWLIST','List Vy');
define('_ALBM_OPT_VIEWTABLE','Tabell Vy');
define('_ALBM_MYALBUM_ADMENU_GPERM','Globala Rättigheter');
define('_MI_MYALBUM_GLOBAL_NOTIFY','Globala');
define('_MI_MYALBUM_GLOBAL_NOTIFYDSC','Globala underrättelseval rörande myAlbum-P');
define('_MI_MYALBUM_CATEGORY_NOTIFY','Kategori');
define('_MI_MYALBUM_CATEGORY_NOTIFYDSC','Underrättelseval som gäller för denna fotokategori');
define('_MI_MYALBUM_PHOTO_NOTIFY','Foto');
define('_MI_MYALBUM_PHOTO_NOTIFYDSC','Underrättelseval som gäller för detta foto');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFY','Nytt Foto');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYCAP','Underrätta mig när något nytt foto har lagts till');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYDSC','Mottag underrättelse när något nytt foto har lagts till');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYSBJ','[{X_SITENAME}] {X_MODULE}: Automatisk underrättelse : Nytt foto');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFY','Nytt Foto');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYCAP','Underrätta mig när något nytt foto har lagts till i denna kategori');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYDSC','Mottag underrättelse när något nytt foto har lagts till i denna kategori');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYSBJ','[{X_SITENAME}] {X_MODULE}: Automatisk underrättelse : Nytt foto');

}

?>
