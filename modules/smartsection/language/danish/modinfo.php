<?php

/**
* $Id: modinfo.php,v 1.48 2007/02/03 16:23:35 malanciault Exp $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

// Module Info
// The name of this module

global $xoopsModule;

define('_MI_SSECTION_ADMENU1', 'Indeks');
define('_MI_SSECTION_ADMENU2', 'Kategorier');
define('_MI_SSECTION_ADMENU3', 'Artikler');
define('_MI_SSECTION_ADMENU4', 'Rettigheder');
define('_MI_SSECTION_ADMENU5', 'Blokke og grupper');
define('_MI_SSECTION_ADMENU6', 'Filtyper');
define('_MI_SSECTION_ADMENU7', 'G� til modulet');

define('_MI_SSECTION_ADMINHITS', '[INDHOLDS MULIGHEDER] L�st af administrator?');
define('_MI_SSECTION_ADMINHITSDSC', 'Tillad at administrators hits t�lles med i antallet af l�ste gange?');
define('_MI_SSECTION_ALLOWSUBMIT', '[RETTIGHEDER] Bruger indsendelser?');
define('_MI_SSECTION_ALLOWSUBMITDSC', 'Tillad brugere at indsende artikler til din side?');
define('_MI_SSECTION_ANONPOST', '[RETTIGHEDER] Tillad anonym indsendelse?');
define('_MI_SSECTION_ANONPOSTDSC', 'Tillad at anonyme brugere indsender artikler?');
define('_MI_SSECTION_AUTHOR_INFO', 'Udviklere');
define('_MI_SSECTION_AUTHOR_WORD', 'Udviklernes ord');
define('_MI_SSECTION_AUTOAPP', '[RETTIGHEDER] Auto-godkend indsendte artikler?');
define('_MI_SSECTION_AUTOAPPDSC', 'Auto-godkender artikler uden administrators indblanding');
define('_MI_SSECTION_BCRUMB', '[PRINT MULIGHEDER] Vis modulnavnet i brevhovedet?');
define('_MI_SSECTION_BCRUMBDSC', 'hvis du v�lger ja, vil brevhovedet vise "Smartsection > kategori-navn > artikel navn". <br>ellers vil kun "kategori navn > artikel navn" blive vist.');
define('_MI_SSECTION_BOTH_FOOTERS', 'Begge fodnoter');
define('_MI_SSECTION_BY', 'af');
define('_MI_SSECTION_CATEGORY_ITEM_NOTIFY', 'Artikler i kategorien');
define('_MI_SSECTION_CATEGORY_ITEM_NOTIFY_DSC', 'Notifikations muligheder til den aktuelle kategori');
define('_MI_SSECTION_CATEGORY_ITEM_PUBLISHED_NOTIFY', 'Ny artikel udgivet');
define('_MI_SSECTION_CATEGORY_ITEM_PUBLISHED_NOTIFY_CAP', 'Inform�r mig n�r en ny artikel udgives i den aktuelle kategori');
define('_MI_SSECTION_CATEGORY_ITEM_PUBLISHED_NOTIFY_DSC', 'Modtag notifikation n�r en ny artikel udgives i den aktuelle kategori.');
define('_MI_SSECTION_CATEGORY_ITEM_PUBLISHED_NOTIFY_SBJ', '[{X_SITENAME}] {X_MODULE} Auto-besked : Ny artikel udgivet i kategorien');
define('_MI_SSECTION_CATEGORY_ITEM_SUBMITTED_NOTIFY', '\'Artikel indsendt');
define('_MI_SSECTION_CATEGORY_ITEM_SUBMITTED_NOTIFY_CAP', 'Informer mig n�r en ny artikel er indsendt i den aktuelle kategori');
define('_MI_SSECTION_CATEGORY_ITEM_SUBMITTED_NOTIFY_DSC', 'Modtag notifikation n�r en ny artikel er indsendt i den aktuelle kategori');
define('_MI_SSECTION_CATEGORY_ITEM_SUBMITTED_NOTIFY_SBJ', '[{X_SITENAME}] {X_MODULE} Auto-besked : Ny artikel indsendt i kategorien');
define('_MI_SSECTION_CATLIST_IMG_W', '[FORMATERINGS MULIGHEDER] Kategori billed liste bredde');
define('_MI_SSECTION_CATLIST_IMG_WDSC', 'Angiver bredden p� kategori billedet n�r kategorier listes');
define('_MI_SSECTION_CATMAINIMG_W', '[FORMATERINGS MULIGHEDER] Kategori billed bredde');
define('_MI_SSECTION_CATMAINIMG_WDSC', 'Angiver bredden p� kategori billedet');
define('_MI_SSECTION_CATPERPAGE', '[FORMATERINGS MULIGHEDER] Maksimalt antal kategorier p� side (for bruger)?');
define('_MI_SSECTION_CATPERPAGEDSC', 'Angiver det maksimale antal top-kategorier der vises pr. side for brugeren?');
define('_MI_SSECTION_CLONE', '[Rettigheder] Tillad artikel kopiering ?');
define('_MI_SSECTION_CLONEDSC', 'V�lg \'Ja\' for at tillade brugere med gyldige rettigheder, at kopierer en artikel.');
define('_MI_SSECTION_COLLHEAD', '[FORMATERINGS MULIGHEDER] Vis den sammenfoldelige menubar?');
define('_MI_SSECTION_COLLHEADDSC', 'Hvis du s�tter denne mulighed til \'Ja\', vil kategoriernes the Categories resum� blive vist i en sammenfoldet menu, som selve artiklerne. Hvis du s�tter muligheden til  \'Nej\', vil den sammenfoldede bar ikke blive vist.');
define('_MI_SSECTION_COMMENTS', '[RETTIGHEDER] Kontroller kommentar i artikel niveau?');
define('_MI_SSECTION_COMMENTSDSC', 'Hvis du s�tter denne mulighed til  \'Ja\', vil du kun se kommentar p� de artikler, der tillader kommentar.<br /><br />V�lg \'Nej\' for at have kommentar vedligeholdt globalt. (Kig under \'Kommentar regler\'.');
define('_MI_SSECTION_DATEFORMAT', '[FORMAT MULIGHEDER] Dato format:');
define('_MI_SSECTION_DATEFORMATDSC', 'Brug den sidste del af language/english/global.php for at vise den stil du vil vise. F.eks: "d-M-Y H:i" Skriver "30-Mar-2004 22:35"');
define('_MI_SSECTION_DEMO_SITE', 'SmartFactory Demo Side');
define('_MI_SSECTION_DEVELOPER_CONTRIBUTOR', 'Bidragyder(e)');
define('_MI_SSECTION_DEVELOPER_CREDITS', 'Anerkendelser');
define('_MI_SSECTION_DEVELOPER_EMAIL', 'Email');
define('_MI_SSECTION_DEVELOPER_LEAD', 'Hoved udvikler(e)');
define('_MI_SSECTION_DEVELOPER_WEBSITE', 'Website');
define('_MI_SSECTION_DISCOM', '[INDHOLD MULIGHEDER] Vis kommentar t�ller ?');
define('_MI_SSECTION_DISCOMDSC', 'V�lg \'Ja\' for at vise kommentar antal i den individuelle artikel');
define('_MI_SSECTION_DISDATECOL', '[INDHOLD MULIGHEDER] Vis \'Udgivet den\' r�kken ?');
define('_MI_SSECTION_DISDATECOLDSC', 'N�r \'Resume\' visningen er valgt, marker \'Ja\' for at vise en \'Udgivet den\' dato i genstans tabellen p� indeks og brugersiden.');
define('_MI_SSECTION_DCS', '[INDHOLD MULIGHEDER] Vis kategori resume ?');
define('_MI_SSECTION_DCS_DSC', 'V�lg \'Nej\' for ikke at vise kategoriresume p� en kategoriside der ikke har subkategorier.');
define('_MI_SSECTION_DISPLAY_CATEGORY', 'Vis kategori navn ?');
define('_MI_SSECTION_DISPLAY_CATEGORY_DSC', 'V�lg \'Ja\' for at vise kategori link p� den individuelle artikel');
define('_MI_SSECTION_DISPLAYTYPE_FULL', 'Fuld visning');
define('_MI_SSECTION_DISPLAYTYPE_LIST', 'Punktliste');
define('_MI_SSECTION_DISPLAYTYPE_WFSECTION', 'WFSection stil');
define('_MI_SSECTION_DISPLAYTYPE_SUMMARY', 'Resume Visning');
define('_MI_SSECTION_DISSBCATDSC', '[INDHOLD MULIGHEDER] Vis sub-kategori beskrivelse ?');
define('_MI_SSECTION_DISSBCATDSCDSC', 'V�lg \'Ja\' for at vise beskrivelsen af en sub-kategori p� indeks og kategori siden.');
define('_MI_SSECTION_DISTYPE', '[FORMAT MULIGHEDER] Artiklers visnings type:');
define('_MI_SSECTION_DISTYPEDSC', 'Hvis \'Resume visning\' er valgt, bliver kun dato, titel og hits vist i en valgt kategori. if \'Fuld Visning\' er valgt, bliver hver artikel vist fuldt ud i en valgt kategori.');
define('_MI_SSECTION_FILEUPLOADDIR', 'Tilf�jede filer oploads mappe:');
define('_MI_SSECTION_FILEUPLOADDIRDSC', 'Mappen hvori filerne vil blive importeret n�r tilknyttet artikler. Skriv ikke begyndende eller afsluttende skr�streger.');
define('_MI_SSECTION_FOOTERPRINT', '[PRINT MULIGHEDER] Print sidefod');
define('_MI_SSECTION_FOOTERPRINTDSC', 'Sidefod der printes for hver artikel');
define('_MI_SSECTION_GLOBAL_ITEM_CATEGORY_CREATED_NOTIFY', 'Ny kategori');
define('_MI_SSECTION_GLOBAL_ITEM_CATEGORY_CREATED_NOTIFY_CAP', 'Giv besked n�r en ny kategori oprettes.');
define('_MI_SSECTION_GLOBAL_ITEM_CATEGORY_CREATED_NOTIFY_DSC', 'Modtage besked n�r en ny kategori er oprettet.');
define('_MI_SSECTION_GLOBAL_ITEM_CATEGORY_CREATED_NOTIFY_SBJ', '[{X_SITENAME}] {X_MODULE} auto-besked : Ny kategori');
define('_MI_SSECTION_GLOBAL_ITEM_NOTIFY', 'Globale Artikler');
define('_MI_SSECTION_GLOBAL_ITEM_NOTIFY_DSC', 'Besked muligheder der g�lder alle artikler');
define('_MI_SSECTION_GLOBAL_ITEM_PUBLISHED_NOTIFY', 'Ny artikel udgivet');
define('_MI_SSECTION_GLOBAL_ITEM_PUBLISHED_NOTIFY_CAP', 'Giv besked n�r en ny artikel er udgivet.');
define('_MI_SSECTION_GLOBAL_ITEM_PUBLISHED_NOTIFY_DSC', 'Modtag besked n�r en ny artikel er udgivet.');
define('_MI_SSECTION_GLOBAL_ITEM_PUBLISHED_NOTIFY_SBJ', '[{X_SITENAME}] {X_MODULE} auto-besked : Ny artikel udgivet');
define('_MI_SSECTION_GLOBAL_ITEM_SUBMITTED_NOTIFY', 'Artikel indgivet');
define('_MI_SSECTION_GLOBAL_ITEM_SUBMITTED_NOTIFY_CAP', 'Giv besked n�r en ny artikel er indgivet og venter p� godkendelse');
define('_MI_SSECTION_GLOBAL_ITEM_SUBMITTED_NOTIFY_DSC', 'Modtag besked n�r en ny artikel indgives og den venter p� godkendelse');
define('_MI_SSECTION_GLOBAL_ITEM_SUBMITTED_NOTIFY_SBJ', '[{X_SITENAME}] {X_MODULE} auto-besked : Ny artikel indgivet');
define('_MI_SSECTION_HEADERPRINT', '[PRINT MULIGHEDER] Print sidehoved');
define('_MI_SSECTION_HEADERPRINTDSC', 'Sidehoved der printes for hver artikel');
define('_MI_SSECTION_HELP_CUSTOM', 'Brugerdefineret sti');
define('_MI_SSECTION_HELP_INSIDE', 'Indeni modulet');
define('_MI_SSECTION_HELP_PATH_CUSTOM', 'Brugerdefineret sti til SmartSections hj�lpefiler');
define('_MI_SSECTION_HELP_PATH_CUSTOM_DSC', 'if you selected \'Custom path\' in the previous option \'Path of SmartSection\'s help files\', please specify the URL of SmartSection\'s help files, in that format : http:
define("_MI_SSECTION_HELP_PATH_SELECT", "Path of SmartSection\'s help files');
define('_MI_SSECTION_HELP_PATH_SELECT_DSC', 'V�lg hvorfra du gerne vil ha adgang til smartsections hj�lpesider. Hvis du har downloaded pakken med \'SmartSections\'s Help Package\' og oploadedet det til \'modules/smartsection/doc/\', s� kan du v�lge \'Inside the module\'. Du kan ogs� f� adgang til modulets hj�lpefiler direkte fra docs.xoops.org ved at v�lge denne i valgfeltet. Du kan ogs� v�lge \'brugerbestemt sti\' og selv specificere adressen i det n�ste konfigurations felt \'Brugerbestemt sti til SmartSection\'s hj�lpe filer\'');
define('_MI_SSECTION_HITSCOL', '[INDHOLDS MULIGHEDER] Vis \'Hits\' r�kken');
define('_MI_SSECTION_HITSCOLDSC', 'N�r \'Resume\' visning er valgt, v�lg \'Ja\' for at vise \'Hits\' column in the items table on the index and category page.');
define('_MI_SSECTION_HLCOLOR', '[FORMAT MULIGHEDER] Fremh�vningsfarve ved stikord');
define('_MI_SSECTION_HLCOLORDSC', 'Farven p� stikord i s�ge funktionen');
define('_MI_SSECTION_IMAGENAV', '[FORMAT OPTIONS] Use the image Page Navigation:');
define('_MI_SSECTION_IMAGENAVDSC', 'Hvis du har sat denne mulighed til "Ja", vil sidenavigationen blive vist med ikoner ellers vil den originale side navigation blive anvendt.');
define('_MI_SSECTION_INDEXFOOTER', '[INDHOLDS MULIGHEDER] Indeks sidefod');
define('_MI_SSECTION_INDEXFOOTER_SEL', 'Indeks sidefod');
define('_MI_SSECTION_INDEXFOOTERDSC', 'Sidefod der vises p� indeks siden til modulet');
define('_MI_SSECTION_INDEXMSG', '[INDHOLDS MULIGHEDER] Hovedsides velkomst hilsen:');
define('_MI_SSECTION_INDEXMSGDEF', '');
define('_MI_SSECTION_INDEXMSGDSC', 'Velkomsthilsen der vises p� hovedsiden af modulet');
define('_MI_SSECTION_ITEM_APPROVED_NOTIFY', 'Artiklen er godkendt');
define('_MI_SSECTION_ITEM_APPROVED_NOTIFY_CAP', 'Giv besked n�r artiklen er godkendt');
define('_MI_SSECTION_ITEM_APPROVED_NOTIFY_DSC', 'Modtag besked n�r artiklen er godkendt');
define('_MI_SSECTION_ITEM_APPROVED_NOTIFY_SBJ', '[{X_SITENAME}] {X_MODULE} auto-besked : Artiklen er godkendt');
define('_MI_SSECTION_ITEM_NOTIFY', 'Artikel');
define('_MI_SSECTION_ITEM_NOTIFY_DSC', 'Beskeds mulighed som g�lder denne artikel');
define('_MI_SSECTION_ITEM_REJECTED_NOTIFY', 'Artiklen er ikke godkendt');
define('_MI_SSECTION_ITEM_REJECTED_NOTIFY_CAP', 'Giv besked hvis artiklen ikke godkendes');
define('_MI_SSECTION_ITEM_REJECTED_NOTIFY_DSC', 'Modtag besked hvis artiklen ikke godkendes');
define('_MI_SSECTION_ITEM_REJECTED_NOTIFY_SBJ', '[{X_SITENAME}] {X_MODULE} auto-besked : Artiklen blev ikke godkendt');
define('_MI_SSECTION_ITEM_TYPE', 'Element type:');
define('_MI_SSECTION_ITEM_TYPEDSC', 'V�lg det element som dette modul skal h�ndtere');
define('_MI_SSECTION_ITEMFOOTER', '[INDHOLDS MULIGHEDER] Element fod');
define('_MI_SSECTION_ITEMFOOTER_SEL', 'Element fod');
define('_MI_SSECTION_ITEMFOOTERDSC', 'Fod som vises for hver artikel');
define("_MI_SSECTION_ITEMSMENU", "Kategoriers Menu block");
//bd tree block hack
define('_MI_SSECTION_ITEMSTREE', 'Tree blok');
//--/bd
define('_MI_SSECTION_ITEMSNEW', 'Seneste elementer liste');
define('_MI_SSECTION_ITEMSPOT', 'I s�gelyset !');
define('_MI_SSECTION_ITEMSRANDOM_ITEM', 'Tilf�ldig element !');
define('_MI_SSECTION_LASTITEM', '[INDHOLDS MULIGHEDER] Vis seneste element kolonne ?');
define('_MI_SSECTION_LASTITEMDSC', 'V�lg \'Ja\' for at vise det seneste element i hver kategori p� hoved og kategori siden');
define('_MI_SSECTION_LASTITEMS', '[INDHOLDS MULIGHEDER] Vis listen af seneste udgivet artikler?');
define('_MI_SSECTION_LASTITEMSDSC', 'V�lg \'Ja\' for at vise listen p� den f�rste side af modulet');
define('_MI_SSECTION_LASTITSIZE', '[FORMATERINGS MULIGHEDER] Senest elements st�rrelse :');
define('_MI_SSECTION_LASTITSIZEDSC', 'Indstil maksimum st�rrelsen p� titlen i det seneste elemnts kolonne');
define('_MI_SSECTION_LINKPATH', '[FORMATERINGS MULIGHEDER] Vis link p� nuv�rende sti:');
define('_MI_SSECTION_LINKPATHDSC', 'Denne mulighed tillader brugeren at g� tilbage via klik p� et element der viser nuv�rende sti p� hver sidetop.');
define('_MI_SSECTION_MAX_HEIGHT', '[TILLADELSER] Maksimumh�jde p� oploadet billede');
define('_MI_SSECTION_MAX_HEIGHTDSC', 'Maksimum h�jden p� billeder der kan oploades');
define('_MI_SSECTION_MAX_SIZE', '[TILLADELSER] Maksimum filst�rrelse');
define('_MI_SSECTION_MAX_SIZEDSC', 'Maksimum st�rrelsen (I bytes) p� en fil der kan oploades');
define('_MI_SSECTION_MAX_WIDTH', '[TILLADELSER] Maksimum oploadet billed bredde');
define('_MI_SSECTION_MAX_WIDTHDSC', 'Maksimum bredde p� et billede der kan oploades');
define('_MI_SSECTION_MD_DESC', 'Sektions Styrings System for din XOOPS side');
define('_MI_SSECTION_MD_NAME', 'SmartSection');
define('_MI_SSECTION_MODULE_BUG', 'Rapporter en fejl i dette modul');
define('_MI_SSECTION_MODULE_DEMO', 'Demo side');
define('_MI_SSECTION_MODULE_DISCLAIMER', 'Fral�ggelse af ansvar');
define('_MI_SSECTION_MODULE_FEATURE', 'Foresl� en ny egenskab til dette modul');
define('_MI_SSECTION_MODULE_INFO', 'Modul udviklings detaljer');
define('_MI_SSECTION_MODULE_RELEASE_DATE', 'Udgivelses dato');
define('_MI_SSECTION_MODULE_STATUS', 'Status');
define('_MI_SSECTION_MODULE_SUBMIT_BUG', 'Forel�g en fejl');
define('_MI_SSECTION_MODULE_SUBMIT_FEATURE', 'Forel�g et �nske om en egenskab');
define('_MI_SSECTION_MODULE_SUPPORT', 'Officiel hj�lpe side');
define('_MI_SSECTION_NO_FOOTERS', 'Ingen');
define('_MI_SSECTION_ORDERBY', '[FORMAT MULIGHEDER] Sorterings orden');
define('_MI_SSECTION_ORDERBY_DATE', 'Dato Faldende');
define('_MI_SSECTION_ORDERBY_TITLE', 'Titel Stigende');
define('_MI_SSECTION_ORDERBY_WEIGHT', 'V�gt Stigende');
define('_MI_SSECTION_ORDERBYDSC', 'V�lg ordenen p� elementerne gennem modulet');
define('_MI_SSECTION_OTHER_ITEMS_TYPE_ALL', 'Alle artikler');
define('_MI_SSECTION_OTHER_ITEMS_TYPE_NONE', 'Ingen');
define('_MI_SSECTION_OTHER_ITEMS_TYPE_PREVIOUS_NEXT', 'Foreg�ende og N�ste artikel');
define('_MI_SSECTION_OTHERITEMS', '[FORMAT MULIGHEDER] Andre artiklers visnings type');
define('_MI_SSECTION_OTHERITEMSDSC', 'V�lg hvordan du vil vise de andre artikler i kategorien p� artikelsiden');
define('_MI_SSECTION_PERPAGE', '[FORMAT MULIGHEDER] Maks. antal artikler per side (Admin siden)');
define('_MI_SSECTION_PERPAGEDSC', 'Maksimum antal artikler der vises p� en gang p� admin siden');
define('_MI_SSECTION_PERPAGEINDEX', '[FORMAT MULIGHEDER] Maks. artikler per side (bruger side)');
define('_MI_SSECTION_PERPAGEINDEXDSC', '[UDSKRIVNINGS MULIGHEDER] Maks antal artikler der vises p� en gang p� bruger siden');
define('_MI_SSECTION_PRINTLOGOURL', '[UDSKRIVNINGS MULIGHEDER] Logo udskriv url');
define('_MI_SSECTION_PRINTLOGOURLDSC', 'Url p� logoet som vil blive udskrevet p� toppen af siden');
define('_MI_SSECTION_RECENTITEMS', 'Nyere elementer (detaljer)');
define('_MI_SSECTION_SHOW_RSS', '[INDHOLDS MULIGHEDER] Vis link p� RSS ');
define('_MI_SSECTION_SHOW_RSSDSC', '');
define('_MI_SSECTION_SHOW_SUBCATS', '[INDHOLDS MULIGHEDER] Vis under kategorier');
define('_MI_SSECTION_SHOW_SUBCATS_ALL', 'Vis alle underkategorier');
define('_MI_SSECTION_SHOW_SUBCATS_DSC', 'V�lg hvorvidt du vil vise alle underkategorierne i kategorilisten p� hovedsiden og p� kategori siden af modulet');
define('_MI_SSECTION_SHOW_SUBCATS_NO', 'Vis ikke underkategorier');
define('_MI_SSECTION_SHOW_SUBCATS_NOTEMPTY', 'Vis ingen tomme underkategorier');
define('_MI_SSECTION_SUB_SMNAME1', 'Indgiv artikel');
define('_MI_SSECTION_SUB_SMNAME2', 'Popul�re artikler');
define('_MI_SSECTION_SUBMITMSG', '[INDHOLDS MULIGHEDER] Indgiv sideintro besked:');
define('_MI_SSECTION_SUBMITMSGDEF', '');
define('_MI_SSECTION_SUBMITMSGDSC', 'Intro besked der vises p� indgivelses siden af modulet');
define('_MI_SSECTION_TITLE_SIZE', '[FORMAT MULIGHEDER] Titel st�rrelse:');
define('_MI_SSECTION_TITLE_SIZEDSC', 'Skriv maksimumst�rrelsen p� titlen p� enkelt-element visnings siden.');
define('_MI_SSECTION_UPLOAD', '[TILLADELSER] Bruger filopload?');
define('_MI_SSECTION_UPLOADDSC', 'Tillad brugere at oploade filer vedh�ftet artikler p� din side?');
define('_MI_SSECTION_USEREALNAME', '[FORMAT MULIGHEDER] Anvend brugers rigtige navne');
define('_MI_SSECTION_USEREALNAMEDSC', 'N�r der vises brugernavne s� anvend brugerens rigtige navn hvis han har angivet et');
define('_MI_SSECTION_VERSION_HISTORY', 'Versions historik');
define('_MI_SSECTION_WARNING_BETA', 'Dette modul er som det er, uden nogen somhelst garantier. Dette modul er BETA, hvilket betyder det stadig underg�r aktiv udvikling. Denne udgivelses anvendelse er sigtet <b>Test form�l alene</b> og vi foresl�r p� det <b>kraftigste</b> at du ikke anvender det p� en offentliggjort side elelr i et produktions milj�.');
define('_MI_SSECTION_WARNING_FINAL', 'Dette modul er som det er, uden nogen som helts garanti. Selvom modulet ikke er beta, s� er det stadig under aktiv udvikling. Denne udgivelse kan anvendes p� en offentliggjort side, men det er stadig p� dit eget ansvar, hvilket betyder at forfatteren ikke kan blive gjort ansvarlig.');
define('_MI_SSECTION_WARNING_RC', 'Dette modul er som det er, uden nogen som helst garanti. Dette modul er kandidat til udgivelse og burde ikke anvendes p� en offentliggjort side. Modulet er stadig under aktiv udvikling og anvendelsen er dit eget ansvar. Dette betyder at forfatteren ikke kan blive gjort ansvarlig.');
define('_MI_SSECTION_WELCOME', '[INDHOLDS MULIGHEDER] Vis velkomst titel og bested:');
define('_MI_SSECTION_WELCOMEDSC', 'hvis denne mulighed er sat til \'JA\', vil modulets hovedside vise titlen \'Velkommen til SmartSections p�...\', efterfult af underst�ende velkomstbesked. Hvis muligheden er sat til \'Nej\', vil ingen af linjerne blive vist.');
define('_MI_SSECTION_WHOWHEN', '[INDHOLDSMULIGHEDER] Vis posterings dato');
define('_MI_SSECTION_WHOWHENDSC', 'Set to \'Yes\' to display the poster and date information in the individual article');
define('_MI_SSECTION_WYSIWYG', '[FORMAT MULIGHEDER] Editor type');
define('_MI_SSECTION_WYSIWYGDSC', 'Hvilken type af editor vil du anvende. V�r opm�rksom p� at den du v�lger forskellig fra XoopsEditor skal v�re installeret p� din side');

define('_MI_SSECTION_PV_TEXT', 'Delvis se artikel');
define('_MI_SSECTION_PV_TEXTDSC', 'Besked til artikler der tillader kun delvis visning.');
define('_MI_SSECTION_PV_TEXT_DEF', 'For at se den komplette side skal du v�re registreret bruger');

define('_MI_SSECTION_SEOMODNAME', 'Url omskrivnings modulnavn');
define('_MI_SSECTION_SEOMODNAMEDSC', 'Hvis URL omskrivning er tilladt for dette modul, er dette navnet p� modulet der anvendes. F.eks. :Http:

define("_MI_SSECTION_ARTCOUNT", "Vis antal atikler');
define('_MI_SSECTION_ARTCOUNTDSC', 'V�lg \'Ja\' for at vise antal af artikler i hver kategori p� kategori resumesiden. V�r opm�rksom p� at modulet nuv�rende kun t�ller artikler fra hver kategori og t�ller ikke underkategorier');

define('_MI_SSECTION_LATESTFILES', 'Seneste oploadet filer');

define('_MI_SSECTION_PATHSEARCH', '[FORMAT MULIGHEDER] Vis kategori sti i s�ge resultaterne');
define('_MI_SSECTION_PATHSEARCHDSC', '');
define("_MI_SSECTION_SHOW_SUBCATS_NOMAIN", "Display sub-categories on index page only");
define("_MI_SSECTION_RATING_ENABLED", "Enable rating system");
define("_MI_SSECTION_RATING_ENABLEDDSC", "This features requires the SmartObject Framework");

define("_MI_SSECTION_DISPBREAD", "Display the breadcrumb");
define("_MI_SSECTION_DISPBREADDSC", "Breadcrumb navigation displays the current page's context within the site structure.");

define('_MI_SSECTION_DATE_TO_DATE', 'Articles from date to date')
?>