<?php
require_once( '../../../include/cp_header.php' ) ;
require_once( '../include/gtickets.php' ) ;
require_once( 'mygrouppermform.php' ) ;
include_once( '../include/read_configs.php' ) ;

// check $xoopsModule
if( ! is_object( $xoopsModule ) ) redirect_header( "$mod_url/" , 1 , _NOPERM ) ;

// language files
include_once( XOOPS_ROOT_PATH."/modules/system/language/".$xoopsConfig['language']."/admin.php" ) ;



function list_groups()
{
	global $xoopsModule ;

	$global_perms_array = array(
		GPERM_INSERTABLE => _ALBM_GPERM_G_INSERTABLE ,
		GPERM_SUPERINSERT | GPERM_INSERTABLE => _ALBM_GPERM_G_SUPERINSERT ,
//		GPERM_EDITABLE => _ALBM_GPERM_G_EDITABLE ,
		GPERM_SUPEREDIT | GPERM_EDITABLE => _ALBM_GPERM_G_SUPEREDIT ,
//		GPERM_DELETABLE => _ALBM_GPERM_G_DELETABLE ,
		GPERM_SUPERDELETE | GPERM_DELETABLE => _ALBM_GPERM_G_SUPERDELETE ,
		GPERM_RATEVIEW => _ALBM_GPERM_G_RATEVIEW ,
		GPERM_RATEVOTE | GPERM_RATEVIEW => _ALBM_GPERM_G_RATEVOTE ,
		GPERM_TELLAFRIEND => _ALBM_GPERM_G_TELLAFRIEND ,
	) ;

	$form = new MyXoopsGroupPermForm( '' , $xoopsModule->mid() , 'myalbum_global' , _AM_ALBM_GROUPPERM_GLOBALDESC ) ;
	foreach( $global_perms_array as $perm_id => $perm_name ) {
		$form->addItem( $perm_id , $perm_name ) ;
	}

	echo $form->render() ;
}



if( ! empty( $_POST['submit'] ) ) {
	include( "mygroupperm.php" ) ;
	redirect_header( XOOPS_URL."/modules/".$xoopsModule->dirname()."/admin/groupperm_global.php" , 1 , _AM_ALBM_GPERMUPDATED );
}

xoops_cp_header() ;
include( './mymenu.php' ) ;
echo "" ;
echo "<h3 style='text-align:left;'>".$xoopsModule->name()."</h3>\n" ;
echo "<h4 style='text-align:left;'>"._AM_ALBM_GROUPPERM_GLOBAL."</h4>\n" ;
list_groups() ;
xoops_cp_footer() ;

?>