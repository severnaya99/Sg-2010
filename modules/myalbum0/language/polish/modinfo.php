<?php
//Polish translation by kaper@zk-p.pl

// Module Info

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'MYALBUM_MI_LOADED' ) ) {


// Appended by Xoops Language Checker -GIJOE- in 2006-05-26 06:00:53
define('_ALBM_MYALBUM_ADMENU_MYTPLSADMIN','Templates');

define( 'MYALBUM_MI_LOADED' , 1 ) ;

// The name of this module
define("_ALBM_MYALBUM_NAME","ZdjóÄia");

// A brief description of this module
define("_ALBM_MYALBUM_DESC","Creates a photos section where users can search/submit/rate various photos.");

// Names of blocks for this module (Not all module has blocks)
define("_ALBM_BNAME_RECENT","Najnowsze zdjóÄia");
define("_ALBM_BNAME_HITS","Najpopularniejsze zdjóÄia");
define("_ALBM_BNAME_RANDOM","Losowe zdjóÄie");
define("_ALBM_BNAME_RECENT_P","Najnowsze zdjóÄia z miniaturami");
define("_ALBM_BNAME_HITS_P","Najpopularniejsze zdjóÄia z miniaturami");

// Config Items
define( "_ALBM_CFG_PHOTOSPATH" , "¦cie¿ka do plik…Ø zdjôè" ) ;

define( "_ALBM_CFG_DESCPHOTOSPATH" , "¦cie¿ka wzglóÅna - podkatalog g³…Ønego katalogu XOOPS<br />(¦cie¿ka powinna zaczynaæ siê od znaku '/', nie powinna koÄzyæ siê znakiem '/'.)<br />W systemie Unix prawa dostóÑu powinny byæ 777 lub 707." ) ;
define( "_ALBM_CFG_THUMBSPATH" , "¦cie¿ka do plik…Ø miniaturek" ) ;
define( "_ALBM_CFG_DESCTHUMBSPATH" , "Uwagi analogiczne jak wobec ¶cie¿ki do plik…Ø zdjôè" );
//define( "_ALBM_CFG_USEIMAGICK" , "Do obr…Ãki obraz…Ø u¿ywaj biblioteki ImageMagick") ;
//define( "_ALBM_CFG_DESCIMAGICK" , "Not use ImageMagick cause Not work resize or rotate the main photo, and make thumbnails by GD.<br />You'd better use ImageMagick if you can." ) ;
define( "_ALBM_CFG_IMAGINGPIPE" , "Biblioteka do obr…Ãki obraz…Ø" ) ;
define( "_ALBM_CFG_DESCIMAGINGPIPE" , "PHP standardowo korzysta z biblioteki GD. Jednak ze wzglóÅu na problemy wystóÑuj±ce z t± bibliotek±, wskazane jest u¿ycie jednej z pozosta³ych bibliotek." ) ;
define( "_ALBM_CFG_FORCEGD2" , "Wymu¶ konwersjê do formatu GD2" ) ;
define( "_ALBM_CFG_DESCFORCEGD2" , "Wymusza konwersjê do formatu GD2 (truecolor) nawet je¶li dystrybucja PHP zawiera bibliotekê GD. Uwaga - w niekt…Óych konfiguracjach PHP mo¿e nie utworzyæ miniatur GD2.<br />Ta opcja ma znaczenie jedynie w przypadku u¿ycia biblioteki GD." ) ;
define( "_ALBM_CFG_IMAGICKPATH" , "¦cie¿ka do biblioteki ImageMagick" ) ;
define( "_ALBM_CFG_DESCIMAGICKPATH" , "¦cie¿ka do pliku 'convert'<br />(nie powinna koÄzyæ siê '/'.)<br />Opcja ma znaczenie jedynie w przypadku u¿ycia biblioteki ImageMagick" ) ;
define( "_ALBM_CFG_NETPBMPATH" , "¦cie¿ka do biblioteki NetPBM" ) ;
define( "_ALBM_CFG_DESCNETPBMPATH" , "¦cie¿ka do plik…Ø 'pnmscale' itd.<br />(nie powinna koÄzyæ siê '/'.)<br />Opcja ma znaczenie jedynie w przypadku u¿ycia biblioteki NetPBM" ) ;
define( "_ALBM_CFG_POPULAR" , "Liczba ods³on do uznania za popularny" ) ;
define( "_ALBM_CFG_NEWDAYS" , "Liczba dni wy¶wietlania oznaczeñ 'nowy', 'zmieniony'" ) ;
define( "_ALBM_CFG_NEWPHOTOS" , "Liczba nowych zdjôè wy¶wietlanych na g³…Ønej stronie modu³u" ) ;
define( "_ALBM_CFG_DEFAULTORDER" , "Default order in category's view" ) ;
define( "_ALBM_CFG_PERPAGE" , "Opcje wyboru liczby zdjôè na stronie" ) ;
define( "_ALBM_CFG_DESCPERPAGE" , "Liczby rozdzielone znakiem '|'<br />np. 10|20|50|100" ) ;
define( "_ALBM_CFG_ALLOWNOIMAGE" , "Dopuszczalne nadsy³anie bez obraz…Ø" ) ;
define( "_ALBM_CFG_MAKETHUMB" , "Miniatury z plik…Ø" ) ;
define( "_ALBM_CFG_DESCMAKETHUMB" , "Zamiast generowaæ miniatury przy ka¿dym otwieraniu strony (obci±¿enie serwera!), korzysta z gotowych plik…Ø miniatur. Je¶li nie ma miniatur, mo¿na utworzyæ je w opcji Zarz±dzanie Miniaturami." ) ;
//define( "_ALBM_CFG_THUMBWIDTH" , "Szeroko¶æ miniatury" ) ;
//define( "_ALBM_CFG_DESCTHUMBWIDTH" , "Wysoko¶æ miniatury zostanie obliczona proporcjonalnie do szeroko¶ci" ) ;
define( "_ALBM_CFG_THUMBSIZE" , "Rozmiar miniatur (piksele)" ) ;
define( "_ALBM_CFG_THUMBRULE" , "Metoda obliczania rozmiaru miniatury" ) ;
define( "_ALBM_CFG_WIDTH" , "Dopuszczalna szeroko¶æ zdjóÄia" ) ;
define( "_ALBM_CFG_DESCWIDTH" , "ZdjóÄie zostanie przeskalowane do tego rozmiaru." ) ;
define( "_ALBM_CFG_HEIGHT" , "Dopuszczalna wysoko¶æ zdjóÄia" ) ;
define( "_ALBM_CFG_DESCHEIGHT" , "ZdjóÄie zostanie przeskalowane do tego rozmiaru" ) ;
define( "_ALBM_CFG_FSIZE" , "Dopuszczalny rozmiar pliku" ) ;
define( "_ALBM_CFG_DESCFSIZE" , "Rozmiar pliku sprawdzany przy nadsy³aniu zdjóÄia" ) ;
define( "_ALBM_CFG_MIDDLEPIXEL" , "Dopuszczalna wielko¶æ zdjóÄia wy¶wietlanego pojedynczo" ) ;
define( "_ALBM_CFG_DESCMIDDLEPIXEL" , "(szeroko¶æ)x(wysoko¶æ)<br />np. 480x480" ) ;
define( "_ALBM_CFG_ADDPOSTS" , "ZwióÌszenie licznika nades³anych wiadomo¶ci" ) ;
define( "_ALBM_CFG_DESCADDPOSTS" , "Warto¶æ, o jak±, po nades³aniu ka¿dego zdjóÄia, zostanie zwióÌszony licznik wiadomo¶ci nades³anych przez u¿ytkownika. <br/> Zwykle 0 lub 1. Warto¶æ ujemna oznacza 0" ) ;
define( "_ALBM_CFG_CATONSUBMENU" , "Wy¶wietlaæ kategorie g³…Øne w podmenu menu systemowego" ) ;
define( "_ALBM_CFG_NAMEORUNAME" , "Wy¶wietlana nazwa / imiê u¿ytkownika" ) ;
define( "_ALBM_CFG_DESCNAMEORUNAME" , "Autor wy¶wietlany pod nazw± (login) lub nazwiskiem" ) ;
define( "_ALBM_CFG_VIEWCATTYPE" , "Spos…Ã wy¶wietlania w kategorii" ) ;
define( "_ALBM_CFG_ALLOWEDEXTS" , "Dopuszczalne rozszerzenia plik…Ø" ) ;
define( "_ALBM_CFG_DESCALLOWEDEXTS" , "Rozszerzenia rozdzielone znakiem '|'<br/> np. 'jpg|jpeg|gif|png' .<br />Ma³e litery, bez kropek. <br/>Ze wzgóÅ…Ø bezpieczeÔtwa nie dopuszczaj rozszerzeñ 'php', 'html'...!" ) ;
define( "_ALBM_CFG_ALLOWEDMIME" , "Dopuszczalne typy MIME" ) ;
define( "_ALBM_CFG_DESCALLOWEDMIME" , "Typy MIME rozdzielone znakiem '|' (np 'image/gif|image/jpeg|image/png')<br />Puste pole - brak sprawdzania typu MIME" ) ;
define( "_ALBM_CFG_USESITEIMG" , "Obs³uga znacznika [siteimg] przez Mened¿er Obraz…Ø" ) ;
define( "_ALBM_CFG_DESCUSESITEIMG" , "Znacznik [siteimg] udostóÑnia obrazy z podkatalog…Ø XOOPS:<br>
[siteimg=images/obraz.gif] daje kod<br>
<.img src= 'http://adres.xoops/images/obraz.gif'><br>
Uwaga: obs³uga znacznika dotyczy tylko tego modu³u. Dla innych modu³…Ø nale¿y zmodyfikowaæ odpowiedni plik textsanitizer.php." ) ;
define( "_ALBM_CFG_COLSOFTABLEVIEW" , "Liczba kolumn w widoku tabelarycznym" ) ;
define( "_ALBM_OPT_USENAME" , "Nazwisko" ) ;
define( "_ALBM_OPT_USEUNAME" , "Nazwa (login)" ) ;

define( "_ALBUM_OPT_CALCFROMWIDTH" , "szeroko¶æ:podana wysoko¶æ:auto" ) ;
define( "_ALBUM_OPT_CALCFROMHEIGHT" , "szeroko¶æ:auto  wysoko¶æ:podana" ) ;
define( "_ALBUM_OPT_CALCWHINSIDEBOX" , "kwadrat podanej wielko¶ci" ) ;

define( "_ALBM_OPT_VIEWLIST" , "Lista" ) ;
define( "_ALBM_OPT_VIEWTABLE" , "Tabela" ) ;


// Sub menu titles
define("_ALBM_TEXT_SMNAME1","Wy¶lij nowe");
define("_ALBM_TEXT_SMNAME2","Najpopularniejsze");
define("_ALBM_TEXT_SMNAME3","Najwy¿ej oceniane");
define("_ALBM_TEXT_SMNAME4","Moje");

// Names of admin menu items
define("_ALBM_MYALBUM_ADMENU0","Nades³ane zdjóÄia");
define("_ALBM_MYALBUM_ADMENU1","Zarz±dzanie zdjóÄiami");
define("_ALBM_MYALBUM_ADMENU2","Zarz±dzanie kategoriami");
define("_ALBM_MYALBUM_ADMENU_GPERM","Uprawnienia");
define("_ALBM_MYALBUM_ADMENU3","¦rodowisko");
define("_ALBM_MYALBUM_ADMENU4","Wgrywanie wsadowe");
define("_ALBM_MYALBUM_ADMENU5","Zarz±dzanie miniaturami");
define("_ALBM_MYALBUM_ADMENU_IMPORT","Importuj");
define("_ALBM_MYALBUM_ADMENU_EXPORT","Eksportuj");
define("_ALBM_MYALBUM_ADMENU_MYBLOCKSADMIN","Bloki");


// Text for notifications
define('_MI_MYALBUM_GLOBAL_NOTIFY', 'Modu³');
define('_MI_MYALBUM_GLOBAL_NOTIFYDSC', 'Powiadomienia w module');
define('_MI_MYALBUM_CATEGORY_NOTIFY', 'Kategoria');
define('_MI_MYALBUM_CATEGORY_NOTIFYDSC', 'Powiadomienia dotycz±ce bie¿±cej kategorii');
define('_MI_MYALBUM_PHOTO_NOTIFY', 'ZdjóÄie');
define('_MI_MYALBUM_PHOTO_NOTIFYDSC', 'Powiadomienia dotycz±ce bie¿±cego zdjóÄia');

define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFY', 'Nowe zdjóÄie');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYCAP', 'Powiadomienie o opublikowaniu nowego zdjóÄia');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYDSC', 'Powiadomienie o opublikowaniu nowego zdjóÄia');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYSBJ', '{X_SITENAME} - {X_MODULE}: Nowe zdjóÄie');

define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFY', 'Nowe zdjóÄie');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYCAP', 'Powiadomienie o opublikowaniu nowego zdjóÄia');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYDSC', 'Powiadomienie o opublikowaniu nowego zdjóÄia');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYSBJ', '{X_SITENAME} - {X_MODULE}: Nowe zdjóÄie');

}

?>
