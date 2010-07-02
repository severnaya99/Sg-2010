<?php

if( ! defined( 'XOOPS_ROOT_PATH' ) ) exit ;

$myalbum_assign_globals = array(
	'lang_total' => _ALBM_CAPTION_TOTAL ,
	'mod_url' => $mod_url ,
	'mod_copyright' => $mod_copyright ,
	'lang_latest_list' => _ALBM_LATESTLIST ,
	'lang_descriptionc' => _ALBM_DESCRIPTIONC ,
	'lang_lastupdatec' => _ALBM_LASTUPDATEC ,
	'lang_tellafriend' => _ALBM_TELLAFRIEND ,
	'lang_subject4taf' => _ALBM_SUBJECT4TAF ,
	'lang_submitter' => _ALBM_SUBMITTER ,
	'lang_hitsc' => _ALBM_HITSC ,
	'lang_commentsc' => _ALBM_COMMENTSC ,
	'lang_new' => _ALBM_NEW ,
	'lang_updated' => _ALBM_UPDATED ,
	'lang_popular' => _ALBM_POPULAR ,
	'lang_ratethisphoto' => _ALBM_RATETHISPHOTO ,
	'lang_editthisphoto' => _ALBM_EDITTHISPHOTO ,
	'lang_guestname' => _ALBM_CAPTION_GUESTNAME ,
	'lang_category' => _ALBM_CAPTION_CATEGORY ,
	'lang_nomatch' => _ALBM_NOMATCH ,
	'lang_directcatsel' => _ALBM_DIRECTCATSEL ,
	'photos_url' => $photos_url ,
	'thumbs_url' => $thumbs_url ,
	'thumbsize' => $myalbum_thumbsize ,
	'colsoftableview' => $myalbum_colsoftableview ,
	'canrateview' => $global_perms & GPERM_RATEVIEW ,
	'canratevote' => $global_perms & GPERM_RATEVOTE ,
	'cantellafriend' => $global_perms & GPERM_TELLAFRIEND ,
) ;

?>