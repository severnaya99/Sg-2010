<?php

if (!function_exists("adminMenu")) {
  function adminMenu ($currentoption = 0)  {
		$module_handler = xoops_gethandler('module');
		$xoopsModule = $module_handler->getByDirname('genobio');

	  /* Nice buttons styles */
	    echo "
    	<style type='text/css'>
		#form {float:left; width:100%; background: #e7e7e7 url('" . XOOPS_URL . "/modules/genobio/images/bg.gif') repeat-x left bottom; font-size:93%; line-height:normal; border-bottom: 1px solid black; border-top: 1px solid black; border-left: 1px solid black; border-right: 1px solid black;}
		    	#buttontop { float:left; width:100%; background: #e7e7e7; font-size:93%; line-height:normal; border-top: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; margin: 0; }
    	#buttonbar { float:left; width:100%; background: #e7e7e7 url('" . XOOPS_URL . "/modules/genobio/images/bg.gif') repeat-x left bottom; font-size:93%; line-height:normal; border-left: 1px solid black; border-right: 1px solid black; margin-bottom: 0px; border-bottom: 1px solid black; }
    	#buttonbar ul { margin:0; margin-top: 15px; padding:10px 10px 0; list-style:none; }
		  #buttonbar li { display:inline; margin:0; padding:0; }
		  #buttonbar a { float:left; background:url('" . XOOPS_URL . "/modules/genobio/images/left_both.gif') no-repeat left top; margin:0; padding:0 0 0 9px;  text-decoration:none; }
		  #buttonbar a span { float:left; display:block; background:url('" . XOOPS_URL . "/modules/genobio/images/right_both.gif') no-repeat right top; padding:5px 15px 4px 6px; font-weight:bold; color:#765; }
		  /* Commented Backslash Hack hides rule from IE5-Mac \*/
		  #buttonbar a span {float:none;}
		  /* End IE5-Mac hack */
		  #buttonbar a:hover span { color:#333; }
		  #buttonbar #current a { background-position:0 -150px; border-width:0; }
		  #buttonbar #current a span { background-position:100% -150px; padding-bottom:5px; color:#333; }
		  #buttonbar a:hover { background-position:0% -150px; }
		  #buttonbar a:hover span { background-position:100% -150px; }
		  </style>";
	
	   // global $xoopsDB, $xoopsModule, $xoopsConfig, $xoopsModuleConfig;
	
	   $myts = &MyTextSanitizer::getInstance();
	
	   $tblColors = Array();
		// $adminmenu=array();
	   if (file_exists(XOOPS_ROOT_PATH . '/modules/genobio/language/' . $xoopsConfig['language'] . '/modinfo.php')) {
		   include_once XOOPS_ROOT_PATH . '/modules/genobio/language/' . $xoopsConfig['language'] . '/modinfo.php';
	   } else {
		   include_once XOOPS_ROOT_PATH . '/modules/genobio/language/english/modinfo.php';
	   }
       
	   require_once XOOPS_ROOT_PATH . '/modules/genobio/admin/menu.php';
	   global $adminmenu;
	   echo "<table width=\"100%\" border='0'><tr><td>";
	   echo "<div id='buttontop'>";
	   echo "<table style=\"width: 100%; padding: 0; \" cellspacing=\"0\"><tr>";
	   echo "<td style=\"width: 45%; font-size: 10px; text-align: left; color: #2F5376; padding: 0 6px; line-height: 18px;\"><!--<a class=\"nobutton\" href=\"".XOOPS_URL."/modules/system/admin.php?fct=preferences&amp;op=showmod&amp;mod=" . $xoopsModule->getVar('mid') . "\">" . _PREFERENCES . "</a>--></td>";
	   echo "<td style='font-size: 10px; text-align: right; color: #2F5376; padding: 0 6px; line-height: 18px;'><b>" . $myts->displayTarea($xoopsModule->name()) ."</td>";
	   echo "</tr></table>";
	   echo "</div>";
	   echo "<div id='buttonbar'>";
	   echo "<ul>";
		 foreach ($adminmenu as $key => $value) {
		   $tblColors[$key] = '';
		   $tblColors[$currentoption] = 'current';
	     echo "<li id='" . $tblColors[$key] . "'><a href=\"" . XOOPS_URL . "/modules/".$xoopsModule->getVar('dirname')."/".$value['link']."\"><span>" . $value['title'] . "</span></a></li>";
		 }
		 
	   echo "</ul></div>";
	   echo "</td></tr>";
	   echo "<tr'><td><div id='form'>";
    
  }
  
  function footer_adminMenu()
  {
		echo "</div></td></tr>";
  		echo "</table>";
  }
}

/**
 * Write-enable the specified folder
 * @param string $path
 * @param bool $recurse
 * @return false on failure, method (u-ser,g-roup,w-orld) on success
 */
function genobio_makeWritable( $path, $create = true )
{
	$mode = intval('0777', 8);
	if ( !file_exists( $path ) ) {
		if (!$create) {
			return false;
		} else {
			mkdir($path, $mode);
		}
	}
	if ( !is_writable($path) ) {
		chmod( $path, $mode );
	}
	clearstatcache();
	if ( is_writable( $path ) ) {
		$info = stat( $path );
		if ( $info['mode'] & 0002 ) {
			return 'w';
		} elseif ( $info['mode'] & 0020 ) {
			return 'g';
		}
		return 'u';
	}
	return false;
}

function genobio_uploading( $uploaddir = "uploads", $allowed_mimetypes = '', $redirecturl = "index.php", $num = 0, $redirect = 0, $usertype = 1, $index = 0 )
{
    global $_FILES, $xoopsConfig, $xoopsModuleConfig, $xoopsModule;

    $down = array();
    include_once XOOPS_ROOT_PATH . "/modules/genobio/class/uploader.php";

    $upload_dir = XOOPS_ROOT_PATH . "/" . $uploaddir . "/";

	genobio_makeWritable($upload_dir);
	
    $maxfilesize = isset($xoopsModuleConfig['maxfilesize'])?$xoopsModuleConfig['maxfilesize']:10000000000;
    $maxfilewidth = isset($xoopsModuleConfig['maximgwidth'])?$xoopsModuleConfig['maximgwidth']:5000;
    $maxfileheight = isset($xoopsModuleConfig['maximgheight'])?$xoopsModuleConfig['maximgheight']:5000;

    $uploader = new XoopsMediaUploader( $upload_dir, $allowed_mimetypes, $maxfilesize, $maxfilewidth, $maxfileheight );
    $uploader -> setPrefix( 'img_'.time() );
	$uploader -> noAdminSizeCheck( 1 );
    if ( $uploader -> fetchMedia( $_POST['xoops_upload_file'][$num] ) )
    {
        if ( !$uploader -> upload() )
        {
            $down['error'] = $uploader -> getErrors() ;
			return $down;
        } 
        else
        {
            if ( $redirect )
            {
                redirect_header( $redirecturl, 1 , _AM_PDD_UPLOADFILE );
            } 
            else
            {
                if ( is_file( $uploader -> savedDestination ) )
                {
                    $down['path'] = "/" . $uploaddir . "/" . strtolower( $uploader -> savedFileName );
                    $down['size'] = filesize( XOOPS_ROOT_PATH . "/" . $uploaddir . "/" . strtolower( $uploader -> savedFileName ) );
                } 
                return $down;
            } 
        } 
    } 
    else
    {
		$down['error'] = $uploader -> getErrors() ;
		return $down;
    } 
} 

?>