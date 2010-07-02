<?php
// $Id$
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <http://www.xoops.org/>                             //
//  ------------------------------------------------------------------------ //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //
/**
 * Module Cloner file
 *
 * Enable webmasters to clone the news module.
 *
 * NOTE : Please give credits if you copy this code !
 *
 * @package News
 * @author DNPROSSI
 * @copyright (c) DNPROSSI
 */

function nw_cloneFileFolder($path, $patterns)
{
	$patKeys = array_keys($patterns);
	$patValues = array_values($patterns);

	// work around for PHP < 5.0.x
	if(!function_exists('file_put_contents')) {
		function file_put_contents($filename, $data, $file_append = false) {
			$fp = fopen($filename, (!$file_append ? 'w+' : 'a+'));
			if ( !$fp ) {
				trigger_error('file_put_contents cannot write in file.', E_USER_ERROR);
				return;
			}
			fputs($fp, $data);
			fclose($fp);
		}
	}
    
    $newpath = str_replace($patKeys[0], $patValues[0], $path);
	
	if ( is_dir($path) )
	{
		// create new dir
		if ( !is_dir($newpath) ){ mkdir($newpath); };
		
		// check all files in dir, and process them
		if ( $handle = opendir($path) )
		{
			while ( $file = readdir($handle) )
			{
				if ( $file != '.' && $file != '..' )
				{
					nw_cloneFileFolder("$path/$file", $patterns);
				}
			}
			closedir($handle);
		}
	}
	else
	{
		//trigger_error('in else', E_USER_ERROR);
		if ( preg_match('/(.jpg|.gif|.png|.zip)$/i', $path) )
		{
			copy($path, $newpath);
		}
		else
		{
			$content = file_get_contents($path);			
			for ( $i = 0; $i < sizeof($patterns); ++$i )
			{
				$content = str_replace($patKeys[$i], $patValues[$i], $content);   
			}
			file_put_contents($newpath, $content);
			//trigger_error($path. ' ---- ' .$newpath , E_USER_WARNING);
		}  
	}
}

//DNPROSSI
function nw_clonefilename($path, $old_subprefix, $new_subprefix)	
{
	for ($i = 0; $i <= 1; $i++) 
	{
		if ( $handle = opendir($path[$i]) )
		{
			while ( $file = readdir($handle) )
			{
				if ( $file != '.' && $file != '..' )
				{
					$newfilename = str_replace($old_subprefix, $new_subprefix, $file);
					@rename( $path[$i].$file, $path[$i].$newfilename );
				}				
			}
			closedir($handle);
		}
	}	
}

//DNPROSSI
function nw_deleteclonefile($path, $new_subprefix)	
{
	for ($i = 0; $i <= 1; $i++) 
	{
		if ( $handle = opendir($path[$i]) )
		{
			while ( $file = readdir($handle) )
			{
				if ( $file != '.' && $file != '..' )
				{   
					$pos = strpos($file, $new_subprefix);
					if ( $pos !== false )
					{
					   //trigger_error($file. ' ---- Deleted' , E_USER_WARNING);
					   @unlink( $path[$i].$file );

					}
				}				
			}
			closedir($handle);
		}
	}	
}

//DNPROSSI
function nw_clonecopyfile($srcpath, $destpath, $filename)	
{
	if ( $handle = opendir($srcpath) )
	{
		if ( $filename == '' ) 
		{
			while ( $file = readdir($handle) )
			{
				if ( $file != '.' && $file != '..' )
				{   
					@copy($srcpath.$file, $destpath.$file );
				}				
			}
		} else {
			if ( file_exists($srcpath.$filename) ) 
			{
				@copy($srcpath.$filename, $destpath.$filename);
			}	
	    }		
		closedir($handle);
	}	
}
?>
