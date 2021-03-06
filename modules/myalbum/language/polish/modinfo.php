<?php
//Polish translation by kaper@zk-p.pl

// Module Info

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'MYALBUM_MI_LOADED' ) ) {


// Appended by Xoops Language Checker -GIJOE- in 2006-05-26 06:00:53
define('_ALBM_MYALBUM_ADMENU_MYTPLSADMIN','Templates');

define( 'MYALBUM_MI_LOADED' , 1 ) ;

// The name of this module
define("_ALBM_MYALBUM_NAME","Zdj��ia");

// A brief description of this module
define("_ALBM_MYALBUM_DESC","Creates a photos section where users can search/submit/rate various photos.");

// Names of blocks for this module (Not all module has blocks)
define("_ALBM_BNAME_RECENT","Najnowsze zdj��ia");
define("_ALBM_BNAME_HITS","Najpopularniejsze zdj��ia");
define("_ALBM_BNAME_RANDOM","Losowe zdj��ie");
define("_ALBM_BNAME_RECENT_P","Najnowsze zdj��ia z miniaturami");
define("_ALBM_BNAME_HITS_P","Najpopularniejsze zdj��ia z miniaturami");

// Config Items
define( "_ALBM_CFG_PHOTOSPATH" , "��cie��ka do plik�� zdj��" ) ;

define( "_ALBM_CFG_DESCPHOTOSPATH" , "��cie��ka wzgl��na - podkatalog g����nego katalogu XOOPS<br />(��cie��ka powinna zaczyna� si� od znaku '/', nie powinna ko��zy� si� znakiem '/'.)<br />W systemie Unix prawa dost��u powinny by� 777 lub 707." ) ;
define( "_ALBM_CFG_THUMBSPATH" , "��cie��ka do plik�� miniaturek" ) ;
define( "_ALBM_CFG_DESCTHUMBSPATH" , "Uwagi analogiczne jak wobec ��cie��ki do plik�� zdj��" );
//define( "_ALBM_CFG_USEIMAGICK" , "Do obr��ki obraz�� u��ywaj biblioteki ImageMagick") ;
//define( "_ALBM_CFG_DESCIMAGICK" , "Not use ImageMagick cause Not work resize or rotate the main photo, and make thumbnails by GD.<br />You'd better use ImageMagick if you can." ) ;
define( "_ALBM_CFG_IMAGINGPIPE" , "Biblioteka do obr��ki obraz��" ) ;
define( "_ALBM_CFG_DESCIMAGINGPIPE" , "PHP standardowo korzysta z biblioteki GD. Jednak ze wzgl��u na problemy wyst��uj��ce z t�� bibliotek��, wskazane jest u��ycie jednej z pozosta��ych bibliotek." ) ;
define( "_ALBM_CFG_FORCEGD2" , "Wymu�� konwersj� do formatu GD2" ) ;
define( "_ALBM_CFG_DESCFORCEGD2" , "Wymusza konwersj� do formatu GD2 (truecolor) nawet je��li dystrybucja PHP zawiera bibliotek� GD. Uwaga - w niekt��ych konfiguracjach PHP mo��e nie utworzy� miniatur GD2.<br />Ta opcja ma znaczenie jedynie w przypadku u��ycia biblioteki GD." ) ;
define( "_ALBM_CFG_IMAGICKPATH" , "��cie��ka do biblioteki ImageMagick" ) ;
define( "_ALBM_CFG_DESCIMAGICKPATH" , "��cie��ka do pliku 'convert'<br />(nie powinna ko��zy� si� '/'.)<br />Opcja ma znaczenie jedynie w przypadku u��ycia biblioteki ImageMagick" ) ;
define( "_ALBM_CFG_NETPBMPATH" , "��cie��ka do biblioteki NetPBM" ) ;
define( "_ALBM_CFG_DESCNETPBMPATH" , "��cie��ka do plik�� 'pnmscale' itd.<br />(nie powinna ko��zy� si� '/'.)<br />Opcja ma znaczenie jedynie w przypadku u��ycia biblioteki NetPBM" ) ;
define( "_ALBM_CFG_POPULAR" , "Liczba ods��on do uznania za popularny" ) ;
define( "_ALBM_CFG_NEWDAYS" , "Liczba dni wy��wietlania oznacze� 'nowy', 'zmieniony'" ) ;
define( "_ALBM_CFG_NEWPHOTOS" , "Liczba nowych zdj�� wy��wietlanych na g����nej stronie modu��u" ) ;
define( "_ALBM_CFG_DEFAULTORDER" , "Default order in category's view" ) ;
define( "_ALBM_CFG_PERPAGE" , "Opcje wyboru liczby zdj�� na stronie" ) ;
define( "_ALBM_CFG_DESCPERPAGE" , "Liczby rozdzielone znakiem '|'<br />np. 10|20|50|100" ) ;
define( "_ALBM_CFG_ALLOWNOIMAGE" , "Dopuszczalne nadsy��anie bez obraz��" ) ;
define( "_ALBM_CFG_MAKETHUMB" , "Miniatury z plik��" ) ;
define( "_ALBM_CFG_DESCMAKETHUMB" , "Zamiast generowa� miniatury przy ka��dym otwieraniu strony (obci����enie serwera!), korzysta z gotowych plik�� miniatur. Je��li nie ma miniatur, mo��na utworzy� je w opcji Zarz��dzanie Miniaturami." ) ;
//define( "_ALBM_CFG_THUMBWIDTH" , "Szeroko��� miniatury" ) ;
//define( "_ALBM_CFG_DESCTHUMBWIDTH" , "Wysoko��� miniatury zostanie obliczona proporcjonalnie do szeroko��ci" ) ;
define( "_ALBM_CFG_THUMBSIZE" , "Rozmiar miniatur (piksele)" ) ;
define( "_ALBM_CFG_THUMBRULE" , "Metoda obliczania rozmiaru miniatury" ) ;
define( "_ALBM_CFG_WIDTH" , "Dopuszczalna szeroko��� zdj��ia" ) ;
define( "_ALBM_CFG_DESCWIDTH" , "Zdj��ie zostanie przeskalowane do tego rozmiaru." ) ;
define( "_ALBM_CFG_HEIGHT" , "Dopuszczalna wysoko��� zdj��ia" ) ;
define( "_ALBM_CFG_DESCHEIGHT" , "Zdj��ie zostanie przeskalowane do tego rozmiaru" ) ;
define( "_ALBM_CFG_FSIZE" , "Dopuszczalny rozmiar pliku" ) ;
define( "_ALBM_CFG_DESCFSIZE" , "Rozmiar pliku sprawdzany przy nadsy��aniu zdj��ia" ) ;
define( "_ALBM_CFG_MIDDLEPIXEL" , "Dopuszczalna wielko��� zdj��ia wy��wietlanego pojedynczo" ) ;
define( "_ALBM_CFG_DESCMIDDLEPIXEL" , "(szeroko���)x(wysoko���)<br />np. 480x480" ) ;
define( "_ALBM_CFG_ADDPOSTS" , "Zwi��szenie licznika nades��anych wiadomo��ci" ) ;
define( "_ALBM_CFG_DESCADDPOSTS" , "Warto���, o jak��, po nades��aniu ka��dego zdj��ia, zostanie zwi��szony licznik wiadomo��ci nades��anych przez u��ytkownika. <br/> Zwykle 0 lub 1. Warto��� ujemna oznacza 0" ) ;
define( "_ALBM_CFG_CATONSUBMENU" , "Wy��wietla� kategorie g����ne w podmenu menu systemowego" ) ;
define( "_ALBM_CFG_NAMEORUNAME" , "Wy��wietlana nazwa / imi� u��ytkownika" ) ;
define( "_ALBM_CFG_DESCNAMEORUNAME" , "Autor wy��wietlany pod nazw�� (login) lub nazwiskiem" ) ;
define( "_ALBM_CFG_VIEWCATTYPE" , "Spos�� wy��wietlania w kategorii" ) ;
define( "_ALBM_CFG_ALLOWEDEXTS" , "Dopuszczalne rozszerzenia plik��" ) ;
define( "_ALBM_CFG_DESCALLOWEDEXTS" , "Rozszerzenia rozdzielone znakiem '|'<br/> np. 'jpg|jpeg|gif|png' .<br />Ma��e litery, bez kropek. <br/>Ze wzg�Ņ� bezpiecze��twa nie dopuszczaj rozszerze� 'php', 'html'...!" ) ;
define( "_ALBM_CFG_ALLOWEDMIME" , "Dopuszczalne typy MIME" ) ;
define( "_ALBM_CFG_DESCALLOWEDMIME" , "Typy MIME rozdzielone znakiem '|' (np 'image/gif|image/jpeg|image/png')<br />Puste pole - brak sprawdzania typu MIME" ) ;
define( "_ALBM_CFG_USESITEIMG" , "Obs��uga znacznika [siteimg] przez Mened��er Obraz��" ) ;
define( "_ALBM_CFG_DESCUSESITEIMG" , "Znacznik [siteimg] udost��nia obrazy z podkatalog�� XOOPS:<br>
[siteimg=images/obraz.gif] daje kod<br>
<.img src= 'http://adres.xoops/images/obraz.gif'><br>
Uwaga: obs��uga znacznika dotyczy tylko tego modu��u. Dla innych modu���� nale��y zmodyfikowa� odpowiedni plik textsanitizer.php." ) ;
define( "_ALBM_CFG_COLSOFTABLEVIEW" , "Liczba kolumn w widoku tabelarycznym" ) ;
define( "_ALBM_OPT_USENAME" , "Nazwisko" ) ;
define( "_ALBM_OPT_USEUNAME" , "Nazwa (login)" ) ;

define( "_ALBUM_OPT_CALCFROMWIDTH" , "szeroko���:podana wysoko���:auto" ) ;
define( "_ALBUM_OPT_CALCFROMHEIGHT" , "szeroko���:auto  wysoko���:podana" ) ;
define( "_ALBUM_OPT_CALCWHINSIDEBOX" , "kwadrat podanej wielko��ci" ) ;

define( "_ALBM_OPT_VIEWLIST" , "Lista" ) ;
define( "_ALBM_OPT_VIEWTABLE" , "Tabela" ) ;


// Sub menu titles
define("_ALBM_TEXT_SMNAME1","Wy��lij nowe");
define("_ALBM_TEXT_SMNAME2","Najpopularniejsze");
define("_ALBM_TEXT_SMNAME3","Najwy��ej oceniane");
define("_ALBM_TEXT_SMNAME4","Moje");

// Names of admin menu items
define("_ALBM_MYALBUM_ADMENU0","Nades��ane zdj��ia");
define("_ALBM_MYALBUM_ADMENU1","Zarz��dzanie zdj��iami");
define("_ALBM_MYALBUM_ADMENU2","Zarz��dzanie kategoriami");
define("_ALBM_MYALBUM_ADMENU_GPERM","Uprawnienia");
define("_ALBM_MYALBUM_ADMENU3","��rodowisko");
define("_ALBM_MYALBUM_ADMENU4","Wgrywanie wsadowe");
define("_ALBM_MYALBUM_ADMENU5","Zarz��dzanie miniaturami");
define("_ALBM_MYALBUM_ADMENU_IMPORT","Importuj");
define("_ALBM_MYALBUM_ADMENU_EXPORT","Eksportuj");
define("_ALBM_MYALBUM_ADMENU_MYBLOCKSADMIN","Bloki");


// Text for notifications
define('_MI_MYALBUM_GLOBAL_NOTIFY', 'Modu��');
define('_MI_MYALBUM_GLOBAL_NOTIFYDSC', 'Powiadomienia w module');
define('_MI_MYALBUM_CATEGORY_NOTIFY', 'Kategoria');
define('_MI_MYALBUM_CATEGORY_NOTIFYDSC', 'Powiadomienia dotycz��ce bie����cej kategorii');
define('_MI_MYALBUM_PHOTO_NOTIFY', 'Zdj��ie');
define('_MI_MYALBUM_PHOTO_NOTIFYDSC', 'Powiadomienia dotycz��ce bie����cego zdj��ia');

define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFY', 'Nowe zdj��ie');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYCAP', 'Powiadomienie o opublikowaniu nowego zdj��ia');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYDSC', 'Powiadomienie o opublikowaniu nowego zdj��ia');
define('_MI_MYALBUM_GLOBAL_NEWPHOTO_NOTIFYSBJ', '{X_SITENAME} - {X_MODULE}: Nowe zdj��ie');

define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFY', 'Nowe zdj��ie');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYCAP', 'Powiadomienie o opublikowaniu nowego zdj��ia');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYDSC', 'Powiadomienie o opublikowaniu nowego zdj��ia');
define('_MI_MYALBUM_CATEGORY_NEWPHOTO_NOTIFYSBJ', '{X_SITENAME} - {X_MODULE}: Nowe zdj��ie');

}

?>
