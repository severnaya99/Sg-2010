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
define( "GPERM_TELLAFRIEND" , 1024 ) ;

// Global Group Permission
define( "_ALBM_GPERM_G_INSERTABLE" , "Poster (avec approbation)" ) ;
define( "_ALBM_GPERM_G_SUPERINSERT" , "Super Post" ) ;
define( "_ALBM_GPERM_G_EDITABLE" , "Edition (avec approbation)" ) ;
define( "_ALBM_GPERM_G_SUPEREDIT" , "Super edition" ) ;
define( "_ALBM_GPERM_G_DELETABLE" , "Suppression (avec approbation)" ) ;
define( "_ALBM_GPERM_G_SUPERDELETE" , "Super suppression" ) ;
define( "_ALBM_GPERM_G_TOUCHOTHERS" , "Modifier les photos post&eacute;es par les autres" ) ;
define( "_ALBM_GPERM_G_SUPERTOUCHOTHERS" , "Super modification des photos des autres" ) ;
define( "_ALBM_GPERM_G_RATEVIEW" , "Voir les votes" ) ;
define( "_ALBM_GPERM_G_RATEVOTE" , "Voter" ) ;
define( "_ALBM_GPERM_G_TELLAFRIEND" , "Envoyer &agrave; un amis" ) ;

// Caption
define( "_ALBM_CAPTION_TOTAL" , "Total :" ) ;
define( "_ALBM_CAPTION_GUESTNAME" , "Invit&eacute;" ) ;
define( "_ALBM_CAPTION_REFRESH" , "Rafra&icirc;chir" ) ;
define( "_ALBM_CAPTION_IMAGEXYT" , "Taille (Type)" ) ;
define( "_ALBM_CAPTION_CATEGORY" , "Cat&eacute;gorie" ) ;

}

?>
