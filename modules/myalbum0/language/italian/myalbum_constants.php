<?php

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( 'MYALBUM_CNST_LOADED' ) ) {

define( 'MYALBUM_CNST_LOADED' , 1 ) ;

// System Constants (Don't Edit)
define( "GPERM_INSERTABLE" , 1 ) ;
define( "GPERM_SUPERINSERT" , 2 ) ;
define( "GPERM_EDITABLE" , 4 ) ;
define( "GPERM_SUPEREDIT" , 8 ) ;
define( "GPERM_DELETABLE" , 16 ) ;
define( "GPERM_SUPERDELETE" , 32 ) ;
define( "GPERM_TOUCHOTHERS" , 64 ) ;
define( "GPERM_SUPERTOUCHOTHERS" , 128 ) ;
define( "GPERM_RATEVIEW" , 256 ) ;
define( "GPERM_RATEVOTE" , 512 ) ;

// Global Group Permission
define( "_ALBM_GPERM_G_INSERTABLE" , "Invia (con approvazione)" ) ;
define( "_ALBM_GPERM_G_SUPERINSERT" , "Invia" ) ;
define( "_ALBM_GPERM_G_EDITABLE" , "Modifica (con aprovazione)" ) ;
define( "_ALBM_GPERM_G_SUPEREDIT" , "Modifica" ) ;
define( "_ALBM_GPERM_G_DELETABLE" , "Elimina (con approvazione)" ) ;
define( "_ALBM_GPERM_G_SUPERDELETE" , "Elimina" ) ;
define( "_ALBM_GPERM_G_TOUCHOTHERS" , "Aggiorna foto inviate da altri (con approvazione)" ) ;
define( "_ALBM_GPERM_G_SUPERTOUCHOTHERS" , "Aggiona foto inviate da altri" ) ;
define( "_ALBM_GPERM_G_RATEVIEW" , "Visione voto" ) ;
define( "_ALBM_GPERM_G_RATEVOTE" , "Vota" ) ;

// Caption
define( "_ALBM_CAPTION_TOTAL" , "Totale:" ) ;
define( "_ALBM_CAPTION_GUESTNAME" , "Anonimo" ) ;
define( "_ALBM_CAPTION_REFRESH" , "Aggiorna" ) ;
define( "_ALBM_CAPTION_IMAGEXYT" , "Dim(Tipo)" ) ;
define( "_ALBM_CAPTION_CATEGORY" , "Categoria" ) ;

}

?>
