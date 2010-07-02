<?php

/**
* $Id: modinfo.php 331 2007-12-23 16:01:11Z malanciault $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Dutch translation: Maurits Lamers <maurits@weidestraat.nl>
* License: GNU
*/

// Module Info
// The name of this module

global $xoopsModule;

define("_MI_SSECTION_ADMENU1", "Index");
define("_MI_SSECTION_ADMENU2", "Categorieën");
define("_MI_SSECTION_ADMENU3", "Artikelen");
define("_MI_SSECTION_ADMENU4", "Bevoegdheden");
define("_MI_SSECTION_ADMENU5", "Blokken en Groepen");
define("_MI_SSECTION_ADMENU6", "Mimetypes");
define("_MI_SSECTION_ADMENU7", "Ga naar de module");


define("_MI_SSECTION_ADMINHITS", "[INHOUD OPTIES] Admin teller staat op:");
define("_MI_SSECTION_ADMINHITSDSC", "Beheerderbezoek meetellen in de teller statistieken?");
define("_MI_SSECTION_ALLOWSUBMIT", "[BEVOEGDHEDEN] Inzendingen van de gebruiker:");
define("_MI_SSECTION_ALLOWSUBMITDSC", "Gebruikers toestaan om artikelen in te sturen op uw website?");
define("_MI_SSECTION_ANONPOST", "[BEVOEGDHEDEN] Anonieme inzendingen toestaan");
define("_MI_SSECTION_ANONPOSTDSC", "Anonieme gebruikers toestaan artikelen in te sturen.");
define('_MI_SSECTION_AUTHOR_INFO', "Ontwikkelaars");
define('_MI_SSECTION_AUTHOR_WORD', "Het Woord van de Auteur");
define('_MI_SSECTION_AUTOAPP', "[BEVOEGDHEDEN] Automatisch goedkeuren van ingezonden artikelen:");
define('_MI_SSECTION_AUTOAPPDSC', "Automatisch goedkeuren van ingezonden artikelen zonder ingreep van de beheerder.");
define('_MI_SSECTION_BCRUMB','[PRINT OPTIES] De modulenaam weergeven in de "breadcrumb"');
define('_MI_SSECTION_BRCRUMBDSC','Als u ja kiest, zal de "breadcrumb" "Smartsection > category name > article name" weergeven. <br>Anders wordt slechts "category name > article name" weergegeven worden.');
define('_MI_SSECTION_BOTH_FOOTERS','Beide voetnoten');
define('_MI_SSECTION_BY', "door");
define('_MI_SSECTION_CATEGORY_ITEM_NOTIFY', 'Categorie-items');
define('_MI_SSECTION_CATEGORY_ITEM_NOTIFY_DSC', 'Notificatie-opties voor de huidige categorie.');
define('_MI_SSECTION_CATEGORY_ITEM_PUBLISHED_NOTIFY', 'Nieuw artikel gepubliceerd');
define('_MI_SSECTION_CATEGORY_ITEM_PUBLISHED_NOTIFY_CAP', "Stel me op de hoogte als er een nieuw artikel gepubliceerd wordt in deze categorie.");   
define('_MI_SSECTION_CATEGORY_ITEM_PUBLISHED_NOTIFY_DSC', "Ontvang een bericht als er een nieuw artikel gepubliceerd wordt in deze categorie.");      
define('_MI_SSECTION_CATEGORY_ITEM_PUBLISHED_NOTIFY_SBJ', "[{X_SITENAME}] {X_MODULE} Systeembericht : Nieuw artikel gepubliceerd in de categorie"); 
define('_MI_SSECTION_CATEGORY_ITEM_SUBMITTED_NOTIFY', "'Artikel ingestuurd");
define('_MI_SSECTION_CATEGORY_ITEM_SUBMITTED_NOTIFY_CAP', "Stel me op de hoogte als er een nieuw artikel is ingestuurd in deze categorie.");   
define('_MI_SSECTION_CATEGORY_ITEM_SUBMITTED_NOTIFY_DSC', "Ontvang een bericht als er een nieuw artikel is ingestuurd in deze categorie.");      
define('_MI_SSECTION_CATEGORY_ITEM_SUBMITTED_NOTIFY_SBJ', "[{X_SITENAME}] {X_MODULE} Systeembericht : Nieuw artikel ingestuurd in de categorie"); 
define('_MI_SSECTION_CATPERPAGE', '[OPMAAKOPTIES] Maximaal aantal categorieën per pagina (Gebruikerskant):');
define('_MI_SSECTION_CATPERPAGEDSC', 'Maximaal aantal tegelijk te tonen topcategorieën per pagina aan de gebruikerskant.');
define("_MI_SSECTION_CLONE", "[BEVOEGDHEDEN] Artikelduplicatie toestaan ?");
define("_MI_SSECTION_CLONEDSC", "Kies 'Ja' om gebruikers met de juiste bevoegdheden de mogelijkheid te geven een artikel te vermenigvuldigen.");
define('_MI_SSECTION_COLLHEAD', "[OPMAAKOPTIES] Toon de inschuifbare balk:");
define('_MI_SSECTION_COLLHEADDSC', "Als u deze optie instelt op 'Ja' zal zowel het categorie-overzicht als de artikelen weergeven worden in een inschuifbare balk. Als u dit instelt op 'Nee' zal de inschuifbare balk niet getoond worden.");
define('_MI_SSECTION_COMMENTS', "[BEVOEGDHEDEN] Commentaar controleren op het artikelniveau:");
define('_MI_SSECTION_COMMENTSDSC', "Als u deze optie instelt met 'Ja', krijgt u alleen maar commentaar te zien bij de items waarbij commentaar aangevinkt is. <br /><br />Kies 'Nee' om het commentaar te laten beheren op globaal niveau (kijk hieronder bij de label 'Regels voor commantaar').");
define('_MI_SSECTION_DATEFORMAT', '[OPMAAKOPTIES] Datumopmaak:');
define('_MI_SSECTION_DATEFORMATDSC', 'Gebruik het laatste deel van language/nederlands/global.php om een weergavestijl te kiezen. Bijvoorbeeld "d-M-Y H:i" wordt "30-Maart-2004 22:35"');
define('_MI_SSECTION_DEMO_SITE', "SmartFactory Demo Site");
define('_MI_SSECTION_DEVELOPER_CONTRIBUTOR', "Contribuant(en)");
define('_MI_SSECTION_DEVELOPER_CREDITS', "Met dank aan");
define('_MI_SSECTION_DEVELOPER_EMAIL', "E-mail");
define('_MI_SSECTION_DEVELOPER_LEAD', "Hoofdontwikkelaar(s)");
define('_MI_SSECTION_DEVELOPER_WEBSITE', "Website");
define("_MI_SSECTION_DISCOM", "[INHOUDOPTIES] Hoeveeheid commentaar weergeven?");
define("_MI_SSECTION_DISCOMDSC", "Kies 'Ja' om de hoeveelheid commentaar weer te geven in elk artikel");
define('_MI_SSECTION_DISDATECOL', "[INHOUDOPTIES] 'Gepubliceerd op'-kolom weergeven ?");
define('_MI_SSECTION_DISDATECOLDSC', "Als het weergavetype 'Overzicht' is ingesteld, kies 'Ja' om de publicatiedatum weer te geven in de tabellen op de index- en categorie-pagina.");
define('_MI_SSECTION_DISPLAY_CAT_SUMMARY', "[INHOUDOPTIES] Categorie-overzicht weergeven ?");
define('_MI_SSECTION_DISPLAY_CAT_SUMMARY_DSC', "Kies 'Ja' om het categorie-overzicht te tonen in de module.");
define("_MI_SSECTION_DISPLAY_CATEGORY", "Categorienaam weergeven ?");
define("_MI_SSECTION_DISPLAY_CATEGORY_DSC", "Kies 'Ja' om een link naar de categorie weer te geven in elk artikel");
define('_MI_SSECTION_DISPLAYTYPE_FULL', 'Volledige weergave');
define('_MI_SSECTION_DISPLAYTYPE_LIST', 'Gemarkeerde lijst');
define('_MI_SSECTION_DISPLAYTYPE_SUMMARY', 'Overzicht');
define('_MI_SSECTION_DISSBCATDSC', '[INHOUDOPTIES] Omschrijvingen subcategorieën weergeven ?');
define('_MI_SSECTION_DISSBCATDSCDSC', "Kies 'Ja' om een beschrijving weer te geven van de subcategorieën in de index- en categoriepagina.");
define('_MI_SSECTION_DISTYPE', "[OPMAAKOPTIES] Weergavetype voor artikelen:");
define('_MI_SSECTION_DISTYPEDSC', "Als 'Overzicht' wordt gekozen, worden slechts de Titel, Datum en Aantal keer gelezen van elk item weergegeven in een geselecteerde categorie. Als 'Volledige weergave' is geselecteerd zal elk artikel worden weergegeven in een geselecteerde categorie.");
define('_MI_SSECTION_FILEUPLOADDIR', 'Directory waar toegevoegde bestanden worden opgeslagen:');
define('_MI_SSECTION_FILEUPLOADDIRDSC', "Directory waar de bestanden die toegevoegd zijn aan een artikel zullen worden opgeslagen. Gebruik geen slash aan het begin of einde.");
define('_MI_SSECTION_FOOTERPRINT', '[PRINT OPTIES] Print voettekst');
define('_MI_SSECTION_FOOTERPRINTDSC', 'Voettekst die zal worden geprint voor elk artikel');
define('_MI_SSECTION_GLOBAL_ITEM_CATEGORY_CREATED_NOTIFY', 'Nieuwe categorie');
define('_MI_SSECTION_GLOBAL_ITEM_CATEGORY_CREATED_NOTIFY_CAP', 'Stel me op de hoogte als er een nieuwe categorie aangemaakt wordt.');
define('_MI_SSECTION_GLOBAL_ITEM_CATEGORY_CREATED_NOTIFY_DSC', 'Ontvang een bericht als er een nieuwe categorie is aangemaakt.');
define('_MI_SSECTION_GLOBAL_ITEM_CATEGORY_CREATED_NOTIFY_SBJ', '[{X_SITENAME}] {X_MODULE} Systeembericht : Nieuwe categorie');
define('_MI_SSECTION_GLOBAL_ITEM_NOTIFY', "Globale Items");
define('_MI_SSECTION_GLOBAL_ITEM_NOTIFY_DSC', "Notificatie opties voor alle artikelen.");
define('_MI_SSECTION_GLOBAL_ITEM_PUBLISHED_NOTIFY', "Nieuw artikel gepubliceerd");
define('_MI_SSECTION_GLOBAL_ITEM_PUBLISHED_NOTIFY_CAP', "Stel me op de hoogte als er een nieuw artikel wordt gepubliceerd.");
define('_MI_SSECTION_GLOBAL_ITEM_PUBLISHED_NOTIFY_DSC', "Ontvang een bericht als er een nieuw artikel wordt gepubliceerd.");
define('_MI_SSECTION_GLOBAL_ITEM_PUBLISHED_NOTIFY_SBJ', "[{X_SITENAME}] {X_MODULE} Systeembericht : Nieuw artikel gepubliceerd");
define('_MI_SSECTION_GLOBAL_ITEM_SUBMITTED_NOTIFY', "Artikel ingestuurd");
define('_MI_SSECTION_GLOBAL_ITEM_SUBMITTED_NOTIFY_CAP', "Stel me op de hoogte als er een artikel is ingestuurd en op goedkeuring wacht.");
define('_MI_SSECTION_GLOBAL_ITEM_SUBMITTED_NOTIFY_DSC', "Ontvang een bericht als er een artikel is ingestuurd en op goedkeuring wacht.");
define('_MI_SSECTION_GLOBAL_ITEM_SUBMITTED_NOTIFY_SBJ', "[{X_SITENAME}] {X_MODULE} Systeembericht : Nieuw artikel ingestuurd");
define('_MI_SSECTION_HEADERPRINT', '[PRINT OPTIES] Print koptekst');
define('_MI_SSECTION_HEADERPRINTDSC', 'Koptekst die zal worden geprint voor elk artikel');
define('_MI_SSECTION_HELP_CUSTOM', "Aangepast Pad");
define('_MI_SSECTION_HELP_INSIDE', "Lokaal in de module");
define('_MI_SSECTION_HELP_PATH_CUSTOM', "Aangepast pad naar de helpbestanden van SmartSection");
define('_MI_SSECTION_HELP_PATH_CUSTOM_DSC', "Als u 'Aangepast Pad' gekozen hebt in de vorige optie 'Pad naar de helpbestanden van SmartSection', specificeer dan de URL naar de helpbestanden van SmartSection, in de vorm : http://www.yoursite.com/doc");
define('_MI_SSECTION_HELP_PATH_SELECT', "Pad naar de helpbestanden van SmartSection");
define('_MI_SSECTION_HELP_PATH_SELECT_DSC', "Kies vanaf waar u toegang wilt krijgen tot de helpbestanden van SmartSection. Als u het 'SmartSection's Help Pakket' hebt gedownload en uitgepakt hebt in 'modules/smartsection/doc/', kunt u selecteren 'Lokaal in de module'. Als alternatief kunt u de helpbestanden direct benaderen via docs.xoops.org door dit te kiezen in het keuzemenu. U kunt ook 'Aangepast Pad' kiezen en zelf het pad opgeven naar de hulpbestanden in het volgende configuratieoptie 'Aangepast pad naar de helpbestanden van SmartSection'");
define('_MI_SSECTION_HITSCOL', "[INHOUDOPTIES] 'Aantal keer gelezen'-kolom weergeven?");
define('_MI_SSECTION_HITSCOLDSC', "Als het weergavetype 'Overzicht' is ingesteld, kies 'Ja' om de kolom te tonen met het aantal keer gelezen op de index- en categoriepagina.");
define('_MI_SSECTION_HLCOLOR', "[OPMAAKOPTIES] Markeerkleur voor sleutelwoorden");
define('_MI_SSECTION_HLCOLORDSC', "Kleur van de markering van sleutelwoorden voor de zoekfunctie");
define('_MI_SSECTION_IMAGENAV', '[OPMAAKOPTIES] Gebruik de Afbeeldingen-paginanavigatie:');
define('_MI_SSECTION_IMAGENAVDSC', 'Als u deze optie instelt op "Ja", zal de paginanavigatie weergegeven worden met een afbeelding, anders wordt de oorspronkelijke paginanavigatie gebruikt.');
define('_MI_SSECTION_INDEXFOOTER','[INHOUDOPTIES] Index Voettekst');
define('_MI_SSECTION_INDEXFOOTER_SEL', 'Index Voettekst');
define('_MI_SSECTION_INDEXFOOTERDSC', 'Voettekst die zal worden gebruikt op de indexpagina van de module');
define('_MI_SSECTION_INDEXMSG', '[INHOUDOPTIES] Welkomstbericht op de indexpagina:');
define('_MI_SSECTION_INDEXMSGDEF', ""); 
define('_MI_SSECTION_INDEXMSGDSC', 'Welkomstbericht dat zal worden gebruikt in de indexpagina van de module.');
define('_MI_SSECTION_ITEM_APPROVED_NOTIFY', "Artikel goedgekeurd");
define('_MI_SSECTION_ITEM_APPROVED_NOTIFY_CAP', "Stel me op de hoogte als dit artikel is goedgekeurd.");   
define('_MI_SSECTION_ITEM_APPROVED_NOTIFY_DSC', "Ontvang een bericht als dit artikel is goedgekeurd.");      
define('_MI_SSECTION_ITEM_APPROVED_NOTIFY_SBJ', "[{X_SITENAME}] {X_MODULE} Systeembericht : artikel goedgekeurd"); 
define('_MI_SSECTION_ITEM_NOTIFY', "Artikel");
define('_MI_SSECTION_ITEM_NOTIFY_DSC', "Notificatie-opties voor het huidige artikel.");
define('_MI_SSECTION_ITEM_REJECTED_NOTIFY', "Artikel afgekeurd");
define('_MI_SSECTION_ITEM_REJECTED_NOTIFY_CAP', "Stel me op de hoogte als dit artikel is afgekeurd.");   
define('_MI_SSECTION_ITEM_REJECTED_NOTIFY_DSC', "Ontvang een bericht als dit artikel is afgekeurd.");      
define('_MI_SSECTION_ITEM_REJECTED_NOTIFY_SBJ', "[{X_SITENAME}] {X_MODULE} Systeembericht : Artikel afgekeurd"); 
define("_MI_SSECTION_ITEM_TYPE", "Item type:");
define("_MI_SSECTION_ITEM_TYPEDSC", "Kies het soort item dat deze module zal gaan bevatten.");
define('_MI_SSECTION_ITEMFOOTER', '[INHOUDOPTIES] Item voettekst');
define('_MI_SSECTION_ITEMFOOTER_SEL', 'Item voettekst');
define('_MI_SSECTION_ITEMFOOTERDSC', 'Voettekst die zal worden gebruikt voor elk artikel');
define("_MI_SSECTION_ITEMSMENU", "Categorie Menu blok");

//bd tree block hack
define("_MI_SSECTION_ITEMSTREE", "Blok met boomstructuur");
//--/bd
define('_MI_SSECTION_ITEMSNEW', "Lijst met recente items");
define("_MI_SSECTION_ITEMSPOT", "In de Aandacht !");
define("_MI_SSECTION_ITEMSRANDOM_ITEM", "Willekeurig item !");
define('_MI_SSECTION_LASTITEM', '[INHOUDOPTIES] Laatste item weergeven ?');
define('_MI_SSECTION_LASTITEMDSC', "Kies 'Ja' om het laatste item in elke categorie weer te geven op de index- en categoriepagina.");
define('_MI_SSECTION_LASTITEMS', '[INHOUDOPTIES] Weergeven van de lijst met recent gepubliceerde artikelen:');
define('_MI_SSECTION_LASTITEMSDSC', "Kies 'Ja' om de lijst weer te geven onder aan de eerste pagina van de module");
define('_MI_SSECTION_LASTITSIZE', '[OPMAAKOPTIES] Grootte van het Laatste Item :');
define('_MI_SSECTION_LASTITSIZEDSC', "Stel de maximum grootte in van de titel in de kolom Laatste Item.");
define('_MI_SSECTION_LINKPATH', '[OPMAAKOPTIES] Links naar het huidige pad aanzetten:');
define('_MI_SSECTION_LINKPATHDSC', "Deze optie geeft de gebruiker de mogelijkheid om omhoog te gaan in het pad door te klikken op een element van het huidige pad dat weergegeven wordt boven aan de pagina");
define("_MI_SSECTION_MAX_HEIGHT", "[BEVOEGDHEDEN] Maximale hoogte van de geuploade afbeelding");
define("_MI_SSECTION_MAX_HEIGHTDSC", "Maximum hoogte van een te uploaden afbeelding.");
define("_MI_SSECTION_MAX_SIZE", "[BEVOEGDHEDEN] Maximale bestandsgrootte");
define("_MI_SSECTION_MAX_SIZEDSC", "Maximale bestandsgrootte (in bytes) van een te uploaden bestand.");
define("_MI_SSECTION_MAX_WIDTH", "[BEVOEGDHEDEN] Maximale breedte van de geuploade afbeelding");
define("_MI_SSECTION_MAX_WIDTHDSC", "Maximale breedte van een te uploaden afbeelding.");


define("_MI_SSECTION_MD_DESC", "Sectie Management Systeem voor uw XOOPS Site");
define("_MI_SSECTION_MD_NAME", "SmartSection");
define('_MI_SSECTION_MODULE_BUG', "Rapporteer een bug in deze module");
define('_MI_SSECTION_MODULE_DEMO', "Demo Site");
define('_MI_SSECTION_MODULE_DISCLAIMER', "Disclaimer");
define('_MI_SSECTION_MODULE_FEATURE', "Doe een suggestie voor een nieuwe functie voor deze module");
define('_MI_SSECTION_MODULE_INFO', "Informatie over de Ontwikkeling van Modules");
define('_MI_SSECTION_MODULE_RELEASE_DATE', "Versie datum (Release Date)");
define('_MI_SSECTION_MODULE_STATUS', "Status");
define('_MI_SSECTION_MODULE_SUBMIT_BUG', "Stuur een bug in");
define('_MI_SSECTION_MODULE_SUBMIT_FEATURE', "Stuur een verzoek voor een functie in");
define('_MI_SSECTION_MODULE_SUPPORT', "Officiële ondersteuningssite");
define('_MI_SSECTION_NO_FOOTERS', 'Geen');

define("_MI_SSECTION_ORDERBY", "[OPMAAKOPTIES] Sorteervolgorde");
define("_MI_SSECTION_ORDERBY_DATE", "Datum Aflopend");
define("_MI_SSECTION_ORDERBY_TITLE", "Titel Oplopend");
define("_MI_SSECTION_ORDERBY_WEIGHT", "Gewicht Oplopend");
define("_MI_SSECTION_ORDERBYDSC", "Kies de standaard sorteervolgorde van de items voor heel de module.");

define('_MI_SSECTION_OTHER_ITEMS_TYPE_ALL', "Alle artikelen");
define('_MI_SSECTION_OTHER_ITEMS_TYPE_NONE', "Geen");
define('_MI_SSECTION_OTHER_ITEMS_TYPE_PREVIOUS_NEXT', "Vorige en volgend artikel");
define('_MI_SSECTION_OTHERITEMS', '[OPMAAKOPTIES] Weergavetype van andere artikelen');
define('_MI_SSECTION_OTHERITEMSDSC', 'Kies hoe u de andere artikelen van de categorie weergegeven wilt hebben op de artikelpagina.');
define('_MI_SSECTION_PERPAGE', "[OPMAAKOPTIES] Maximum aantal artikelen per pagina (Beheerderskant):");
define('_MI_SSECTION_PERPAGEDSC', "Maximum aantal weer te geven artikelen per pagina aan de beheerderskant.");
define('_MI_SSECTION_PERPAGEINDEX', "[OPMAAKOPTIES] Maximum aantal artikelen per pagina (Gebruikerskant):");
define('_MI_SSECTION_PERPAGEINDEXDSC', "[PRINT OPTIES] Maximum aantal artikelen weer te geven per pagina aan de gebruikerskant.");
define('_MI_SSECTION_PRINTLOGOURL', "[PRINT OPTIES] Logo print url");
define('_MI_SSECTION_PRINTLOGOURLDSC', 'Url van het logo dat boven aan de pagina zal worden geprint');
define("_MI_SSECTION_RECENTITEMS", "Recente items (Detail)");

define("_MI_SSECTION_SHOW_RSS","[INHOUDOPTIONS] Weergave link voor RSS feed");
define("_MI_SSECTION_SHOW_RSSDSC","");

define("_MI_SSECTION_SHOW_SUBCATS", "[INHOUDOPTIES] Weergave subcategorieën");
define("_MI_SSECTION_SHOW_SUBCATS_ALL", "Geef alle subcategorieën weer");
define("_MI_SSECTION_SHOW_SUBCATS_DSC", "Kies dit indien u de subcategorieën wilt weergeven in de categorielijst op de indexpagina van de module");
define("_MI_SSECTION_SHOW_SUBCATS_NO", "Geef de subcategorieën niet weer");
define("_MI_SSECTION_SHOW_SUBCATS_NOTEMPTY", "Geef de subcategorieën weer die niet leeg zijn");
define("_MI_SSECTION_SUB_SMNAME1", "Stuur een artikel in");
define("_MI_SSECTION_SUB_SMNAME2", "Populaire artikelen");
define("_MI_SSECTION_SUBMITMSG", "[INHOUDOPTIES] Introductiebericht op de instuurpagina:");
define("_MI_SSECTION_SUBMITMSGDEF", "");
define("_MI_SSECTION_SUBMITMSGDSC", "Introductiebericht dat weergegeven wordt in op de instuurpagina van de module.");
define("_MI_SSECTION_TITLE_SIZE", "[OPMAAKOPTIES] Titelgrootte :");
define("_MI_SSECTION_TITLE_SIZEDSC", "Stel de maximale grootte van de titel in voor de pagina die een enkel item weergeeft.");
define("_MI_SSECTION_UPLOAD", "[BEVOEGDHEDEN] Upload van bestanden door de gebruiker?");
define("_MI_SSECTION_UPLOADDSC", "Gebruikers toestaan bestanden te uploaden die gelinked worden aan artikelen op uw website?");
define("_MI_SSECTION_USEREALNAME", "[OPMAAKOPTIES] De Echte Naam van de gebruikers gebruiken");
define('_MI_SSECTION_USEREALNAMEDSC', 'Als een gebruikersnaam wordt weergegeven, wordt de echte Naam weergegeven als de gebruiker zijn echte naam heeft ingesteld.');
define('_MI_SSECTION_VERSION_HISTORY', "Versiegeschiedenis");
define('_MI_SSECTION_WARNING_BETA', "Deze module wordt geleverd zoals hij is, zonder enige vorm van garantie. Deze module is BETA, wat betekent dat hij nog steeds in actieve ontwikkeling is. Het vrijgeven van deze versie heeft <b>slechts testen tot doel</b> en wij raden u dan ook <b>zeer dringend aan</b> dat u het niet gebruikt op een actieve server of in een productieomgeving.");
define('_MI_SSECTION_WARNING_FINAL', "Deze module wordt geleverd zoals hij is, zonder enige vorm van garantie. Alhoewel deze module geen beta-status meer heeft, is hij nog altijd in actieve ontwikkeling. Deze versie kan gebruikt worden op een actieve website of een productieomgeving, maar het gebruik ervan valt onder uw eigen verantwoordelijkheid, wat betekent dat de auteur niet verantwoordelijk is.");
define('_MI_SSECTION_WARNING_RC', "Deze module wordt geleverd zoals hij is, zonder enige vorm van garantie. Deze module is een vrijgave-kandidaat en zou niet gebruikt mogen worden op een actieve website of productieomgeving. De module is nog steeds in actieve ontwikkeling en het gebruik ervan is strict uw eigen verantwoordelijkheid, wat betekent dat de auteur niet verantwoordelijk is.");

define("_MI_SSECTION_WELCOME", "[INHOUDOPTIES] Weergave van de welkomsttitel en welkomstbericht:");
define("_MI_SSECTION_WELCOMEDSC", "Indien deze optie ingesteld is op 'Ja' zal de indexpagina van de module de welkomsttitel 'Welkom in de SmartSection van...', gevolgd door het welkomstbericht dat hieronder gedefinieerd wordt. Indien deze optie ingesteld is op 'Nee', zal geen van deze twee teksten weergegeven worden.");
define("_MI_SSECTION_WHOWHEN", "[INHOUDOPTIES] Weergave van afzender en datum?");
define("_MI_SSECTION_WHOWHENDSC", "Kies 'Ja' om de afzender- en datuminformatie weer te geven in elk artikel");
define("_MI_SSECTION_WYSIWYG", "[OPMAAKOPTIES] Editor type");
define("_MI_SSECTION_WYSIWYGDSC", "Kies hier welke editor u graag wilt gebruiken. Hou er rekening mee dat, indien u een andere editor dan de XoopsEditor kiest, deze geïnstalleerd moet zijn op uw site.");


?>
