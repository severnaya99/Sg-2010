<?php
// 2003/11/21 K.OHWADA
// multiple install of same module
// rename WFS -> XFS
// rename WF-Section to XF-Section
// add menu: bulk import

// Module Info

// The name of this module
// WF -> XF
define('_MI_XFS_NAME', 'XF-Section');

// A brief description of this module
// WF -> XF
define('_MI_XFS_DESC','');

// Names of blocks for this module (Not all module has blocks)
// WF -> XF
define('_MI_XFS_BNAME','Articoli Recenti');
define('_MI_XFS_BNAME_MENU','Menù Sezioni');
define('_MI_XFS_TOPICS','Argomenti');
define('_MI_XFS_BNAME3','Articolo in Rilievo');
define('_MI_XFS_BNAME4','Articoli più letti');
define('_MI_XFS_BNAME5','Articoli Recenti');
define('_MI_XFS_BNAME6','Downloads Articoli');
define('_MI_XFS_BNAME7','Dossiers Recenti');
define('_MI_XFS_BNAME8','Articoli Recenti Ecumene');
define('_MI_XFS_BNAME9','Articoli Recenti Esperienze Formative');
define('_MI_XFS_BNAME10','Articoli Recenti Famiglia Giovani Anziani');
define('_MI_XFS_BNAME11','Articoli Recenti Formazione');
define('_MI_XFS_BNAME12','Articoli Recenti Mondo Oggi');
define('_MI_XFS_BNAME13','Un Pensiero Al Giorno');
define('_MI_XFS_BNAME14','Articoli Recenti Spiritualità');
define('_MI_XFS_BNAME15','La Redazione Consiglia');
define('_MI_XFS_BNAME16','La Redazione Segnala...');
define('_MI_XFS_BNAME_ARTMENU','Links agli Articoli');

// Sub menus in main menu block
define('_MI_XFS_SUBMIT','Invia Articolo');
define('_MI_XFS_POPULAR','I più letti');
define('_MI_XFS_RATEFILE','I più votati');

// multiple install of same module
if ( !defined("_WFS_MODINFO_PHP") ) 
{
define("_WFS_MODINFO_PHP",1);

// Names of admin menu items
define('_MI_XFS_ADMENU1','Impostazioni Generali');
define('_MI_XFS_ADMENU2','Configurazione Indice Principale');
define('_MI_XFS_ADMENU3','Configurazione Percorsi');
define('_MI_XFS_ADMENU4','Gestione Sezioni');
define('_MI_XFS_ADMENU5','Gestione Articoli');
define('_MI_XFS_ADMENU6','-- Crea Nuovo Articolo');
define('_MI_XFS_ADMENU7','File Manager');
define('_MI_XFS_ADMENU8','Lista Downloads Malfunzionanti');
define('_MI_XFS_ADMENU9','Lista Articoli Inviati');
define('_MI_XFS_ADMENU10','Ordinamento Sezione');
define('_MI_XFS_ADMENU11','Gestione Files allegati');

// add menu: bulk import
define('_MI_XFS_ADMENU12','Importazione di massa di file HTML');
}

?>
