<?php
// $Id: uploader.php,v 4.03 2008/06/05 15:35:32 wishcraft Exp $
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <http://www.chronolabs.org/>                             //
//  ------------------------------------------------------------------------ //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License 2.0 as published by //
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
//  Author: wishcraft (S.A.R., sales@chronolabs.org.au)                      //
//  URL: http://www.chronolabs.org.au/forums/X-Forum/0,17,0,0,100,0,DESC,0   //
//  Project: X-Forum 4                                                       //
//  ------------------------------------------------------------------------ //
 
if (!defined("XOOPS_ROOT_PATH")) {
	exit();
}
include_once XOOPS_ROOT_PATH . "/class/uploader.php";
class forum_uploader extends XoopsMediaUploader {
    var $ext = "";
    var $ImageSizeCheck = false;
    var $FileSizeCheck = true;
    var $CheckMediaTypeByExt = true;

    /**
     * No admin check for uploads
     */
    /**
     * Constructor
     *
     * @param string 	$uploadDir
     * @param array 	$allowedMimeTypes
     * @param int 		$maxFileSize
     * @param int 		$maxWidth
     * @param int 		$maxHeight
     */
    function forum_uploader($uploadDir, $allowedMimeTypes = 0, $maxFileSize = 0, $maxWidth = 0, $maxHeight = 0)
    {
        if (!is_array($allowedMimeTypes)) {
	        if(empty($allowedMimeTypes) || $allowedMimeTypes == "*"){
                $allowedMimeTypes = array();
	        }else{
	            $allowedMimeTypes = explode("|", strtolower($allowedMimeTypes));
            }
        }
	    $allowedMimeTypes = array_filter(array_map("trim", $allowedMimeTypes));
        $this->XoopsMediaUploader($uploadDir, $allowedMimeTypes, $maxFileSize, $maxWidth, $maxHeight);
    }

    /**
     * Set the CheckMediaTypeByExt
     *
     * @param string $value
     */
    function setCheckMediaTypeByExt($value = true)
    {
        $this->CheckMediaTypeByExt = $value;
    }

    /**
     * Set the imageSizeCheck
     *
     * @param string $value
     */
    function setImageSizeCheck($value)
    {
        $this->ImageSizeCheck = $value;
    }

    /**
     * Set the fileSizeCheck
     *
     * @param string $value
     */
    function setFileSizeCheck($value)
    {
        $this->FileSizeCheck = $value;
    }

    /**
     * Get the file extension
     *
     * @return string
     */
    function getExt()
    {
        $this->ext = strtolower(ltrim(strrchr($this->getMediaName(), '.'), '.'));
        return $this->ext;
    }

    /**
     * Is the file the right size?
     *
     * @return bool
     */
    function checkMaxFileSize()
    {
        if (!$this->FileSizeCheck) {
            return true;
        }
        if ($this->mediaSize > $this->maxFileSize) {
            return false;
        }
        return true;
    }

    /**
     * Is the picture the right width?
     *
     * @return bool
     */
    function checkMaxWidth()
    {
        if (!$this->ImageSizeCheck) {
            return true;
        }
        if (false !== $dimension = getimagesize($this->mediaTmpName)) {
            if ($dimension[0] > $this->maxWidth) {
                return false;
            }
        } else {
            trigger_error(sprintf('Failed fetching image size of %s, skipping max width check..', $this->mediaTmpName), E_USER_WARNING);
        }
        return true;
    }

    /**
     * Is the picture the right height?
     *
     * @return bool
     */
    function checkMaxHeight()
    {
        if (!$this->ImageSizeCheck) {
            return true;
        }
        if (false !== $dimension = getimagesize($this->mediaTmpName)) {
            if ($dimension[1] > $this->maxHeight) {
                return false;
            }
        } else {
            trigger_error(sprintf('Failed fetching image size of %s, skipping max height check..', $this->mediaTmpName), E_USER_WARNING);
        }
        return true;
    }

    /**
     * Is the file the right Mime type
     *
     * (is there a right type of mime? ;-)
     *
     * @return bool
     */
    function checkMimeType()
    {
        if ($this->CheckMediaTypeByExt) $type = $this->getExt();
        else $type = $this->mediaType;
        if (count($this->allowedMimeTypes) > 0 && !in_array($type, $this->allowedMimeTypes)) {
            return false;
        }
        return true;
    }
}

?>