<?php
// $Id: uploadfile.php,v 1.3 2006/03/20 03:23:03 ohwada Exp $

// 2006-03-17 K.OHWADA
// $HTTP_POST_FILES -> $_FILES

// 2003/03/27 K.OHWADA
// add function
//   getMaxFilesize()
//   getErrorCode()
// doUpload, doUploadToRandumFile : add error code
// isAllowedMineType : add no check mode
// bug fix : cannot change maxFilesize

// File Upload Class
// By Haruki Setoyama   http://harux.net   haruki@harux.net
// License: GPL2 or later

include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/class/common.php';
include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/class/mimetype.php';
include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/include/groupaccess.php';

mt_srand((double) microtime() * 1000000);

class UploadFile {

        var $fieldName;
        var $fileName;
        var $filesize;
        var $minetype;
        var $originalName;
        var $ext;
        var $allowedMinetype;
        var $bannedMinetype;
        var $maxImageWidth;
        var $maxImageHight;
        var $maxFilesize;       // Byte
        var $mode;              // file mode of Unix Style
        var $stripSpaces;       // 0 or 1
        var $bannedChars;
        var $addExt;     // 0 or 1

        var $errormsg;

// error code
// 11  : is_dir($distpath)
// 12  : is_writable($distpath)
// 13  : over 10 random names
// 14  : empty($this->fileName)
// 15  : isAllowedImageSize
// 16  : isAllowedFileSize
// 17  : isAllowedMineType
// 18  : isAllowedChars($distfilename)
// 19  : move_uploaded_file
		var $error_code;

// constructor

        function UploadFile ($fieldName="uploadfile") {
                $this->fieldName = "uploadfile";
                //$this->allowedMinetype = array();
                //$this->bannedMinetype = array();
                $this->maxImageWidth = 0;
                $this->maxImageHight = 0;

// bug fix : cannot change maxFilesize
//              $this->maxFilesize = 1048576 * 2; // 2MB
                global $wfsConfig;
                $this->maxFilesize = $wfsConfig['filesize'];
                
                $this->addExt = 1;
                $this->mode = "";
                $this->stripSpaces = 1;
                $this->bannedChars = "";
                if (is_array($fieldName)) {
                        foreach($fieldName as $key => $value) {
                                $this->$key = $value;
                        }
                } else {
                        $this->fieldName = $fieldName;
                }
        }

// set
        function setAllowedMinetype($value){
                $this->allowedMinetype = $value;
        }

        function setMaxImageWidth($value){
                $this->maxImageWidth = $value;
        }

        function setMaxImageHight($value){
                $this->maxImageHight = $value;
        }

        function setMaxFilesize($value){
                $this->maxFilesize = $value;
        }

        function getMaxFilesize(){
                return $this->maxFilesize;
        }

        function setAddExt($value){
                $this->addExt = $value;
        }

        function setMode($value){
                $this->mode = $value;
        }

// load $_FILES
        function loadPostVars() {

                if (!isset($_FILES[$this->fieldName])) return false;
                $this->fileName = $_FILES[$this->fieldName]['tmp_name'];
                $this->filesize = $_FILES[$this->fieldName]['size'];
                $mimetype = new mimetype();
      			$this->minetype = $mimetype->getType($_FILES[$this->fieldName]['name']);
				//$this->minetype = $_FILES[$this->fieldName]['type'];
                $this->originalName = $_FILES[$this->fieldName]['name'];
                //echo $this->fileName."<br />".$this->filesize."<br />".$this->minetype."<br />".$this->originalName;
                $tmparr = explode(".", $this->originalName);
                array_shift($tmparr);
                $ret = array();
                foreach($tmparr as $arr) {
                        if (!preg_match("/\W/",$arr)) {
                                array_push($ret,$arr);
                        }
                }
                $this->ext = implode(".",$ret);
                return true;
        }

// get
        function getFileName() {
                return $this->fileName;
        }

        function getFilesize() {
                return $this->filesize;
        }

        function getMinetype() {
                return $this->minetype;
        }

        function getOriginalName() {
                return $this->originalName;
        }

        function getExt() {
                return $this->ext;
        }

// add this function
// error code
        function getErrorCode() {
                return $this->error_code;
        }

// read file contents

        function readFile(){
                if (!is_readable($this->fileName)) return false;
                return file($this->fileName);
        }

// check

        function isAllowedImageSize() {
                
				if ( $this->maxImageWidth == 0 || $this->maxImageHight == 0) return true;
                $size = GetImageSize($this->fileName);
                
				if ( $size[0] > $this->maxImageWidth) return false;
                if ( $size[1] > $this->maxImageHight) return false;
                return true;
        }

        function isAllowedFileSize() {
                if ( $this->maxFilesize == 0) return true;
                if ( $this->filesize > $this->maxFilesize) return false;
                return true;
        }

        function isAllowedMineType(){

        global $wfsConfig;

// no check mode
		global $xoopsUser;
		global $wfsAdminNotCheckMineType, $wfsUserNotCheckMineType;
		if ( $xoopsUser )
		{
			if ($xoopsUser->isAdmin() && $wfsAdminNotCheckMineType)  return TRUE;
			if ($wfsUserNotCheckMineType)  return TRUE;
		}

			$mimetype = new mimetype();

			//foreach(explode(" ", $wfsConfig['selmimetype']) as $type)
				
				foreach(explode(" ", $wfsConfig['selmimetype']) as $type)
				if ($this->minetype == $mimetype->privFindType($type))
					return TRUE;												
				return false;

		}

        function isAllowedChars($distfilename) {
                if ( empty($this->allowedChars) ) return true;
                if ( preg_match("/".$this->allowedChars."/", $distfilename)) return false;
                return true;
        }

		// HTML
        function formStart($action="./", $name="", $extra="") {
                $ret= "<form enctype='multipart/form-data' method='post'";
                $ret.= " action='".$action."'";
                if(!empty($name)) $ret.= " name='".$name."'"." id='".$name."'";
                if(!empty($extra)) $ret.= " ".$extra;
                $ret.= ">";
                return $ret;
        }

        function formMax() {
                if(empty($this->maxFilesize)) return "";
                return "<input type='hidden' name='MAX_FILE_SIZE' value='".$this->maxFilesize."'>";
        }

        function formField() {
                return "<input type='file' name='".$this->fieldName."' id='".$this->fieldName."'>";
        }

        function formSubmit($value="UPLOAD", $name="", $extra=""){
                $ret= "<br /><input type='submit' value='".$value."'";
                if(!empty($name)) $ret.= " name='".$name."' id='".$name."'";
                if(!empty($extra)) $ret.= " ".$extra;
                $ret.= ">";
                return $ret;
        }

        function formEnd(){
                return "</form>";
        }

// upload

        function doUpload($distfilename) {
                
				Global $wfsConfig;
				
				$this->setAllowedMinetype(array($wfsConfig['selmimetype']));

// error code
//				if (empty($this->fileName)) return false;
//              if (!$this->isAllowedImageSize()) return false;
//              if (!$this->isAllowedFileSize()) return false;
//              if (!$this->isAllowedMineType()) return false;
//              if (!$this->isAllowedChars($distfilename)) return false;
				if (empty($this->fileName))
				{	$this->error_code = 14;
					return false;
				}
				if (!$this->isAllowedImageSize())
				{	$this->error_code = 15;
					return false;
				}
				if (!$this->isAllowedFileSize())
				{	$this->error_code = 16;
					return false;
				}
				if (!$this->isAllowedMineType())
				{	$this->error_code = 17;
					return false;
				}
				if (!$this->isAllowedChars($distfilename))
				{	$this->error_code = 18;
					return false;
				}

                if (!empty($this->ext) && $this->addExt) $distfilename .= ".".$this->ext;
                if ($this->stripSpaces) $distfilename = preg_replace("/\s/","",$distfilename);

// error code
//              if (!move_uploaded_file($this->fileName,$distfilename)) return false;
				if (!move_uploaded_file($this->fileName,$distfilename))
				{	$this->error_code = 19;
					return false;
				}

				if (!empty($this->mode) && is_numeric($this->mode)) chmod($distfilename, octdec($this->mode)) ;
                $this->fileName = $distfilename;
                return $distfilename;
        }

        function doUploadToRandumFile($distpath, $prefix="") {

// error code
//              if (!is_dir($distpath) && !is_writable($distpath)) return false;
				$this->error_code = 0;
                if (!is_dir($distpath))
                {	$this->error_code = 11;
					return false;
				}
                if (!is_writable($distpath))
                {	$this->error_code = 12;
					return false;
				}

                if (!empty($this->ext) && $this->addExt) {
                        $ext = ".".$this->ext;
                } else {
                        $ext = "";
                }
                for($i=0; $i<10; $i++) {
                        $distfilename = $distpath."/".$prefix.mt_rand(100000,999999);

                        if (!file_exists($distfilename.$ext)) {
                                touch($distfilename.$ext);
                                return $this->doUpload($distfilename);
                        }
                }

// error code
				$this->error_code = 13;
                return false;
        }

        function doUploadImage($distpath, $filename="", $exti = "0") {
                											
				Global $wfsConfig, $xoopsModule;
						
				//if (!$this->isAllowedMineType()) return false;										
                //if (is_file($distpath."/".$this->originalName)) return false;
				if (empty($filename)) $filename = $this->originalName;
                $ext ="";
                
                $this->setAddExt($exti);
                return $this->doUpload($distpath."/".$filename.$ext);
        }
}

?>