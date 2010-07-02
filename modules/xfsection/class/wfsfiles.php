<?php
// $Id: wfsfiles.php,v 1.4 2006/03/20 03:23:03 ohwada Exp $

// 2006-03-17 K.OHWADA
// $HTTP_POST_VARS   -> $_POST
// $HTTP_GET_VARS    -> $_GET

// 2003/03/27 K.OHWADA
// bug fix : warning comes out, since a full path name is not set up

// 2003/10/11 K.OHWADA
// easy to rename module and table
//   change function WfsFiles, getAllbyArticle

include_once(XOOPS_ROOT_PATH."/modules/".$xoopsModule->dirname()."/include/groupaccess.php");
include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/class/mimetype.php';
include_once XOOPS_ROOT_PATH."/class/xoopslists.php";

class WfsFiles {

        var $db;
        var $table;
        var $fileid;
        var $articleid;
        var $filerealname;
        var $fileshowname;
        var $filetext;
        var $filedescript;
        var $date;
        var $ext;
        var $minetype;
        var $downloadname;
        var $counter;
		var $groupid;

// constructor

        function WfsFiles($fileid=-1) {
        
        	global $wfsTableFiles;
        
                $this->db =& Database::getInstance();

// easy to rename module and table
//		$this->table = $this->db->prefix("wfs_files");
		$this->table = $this->db->prefix($wfsTableFiles);
		
                $this->articleid = 0;
                $this->filerealname = "";
                $this->fileshowname = "";
                $this->filetext = "";
                $this->filedescript = "";
                $this->date = "";
                $this->ext = "";
                $this->minetype = "";
                $this->downloadname = "downloadfile";
                $this->counter = 0;
                if(is_array($fileid)){
                        $this->makeFile($fileid);
                }elseif($fileid != -1){
                        $this->getFile($fileid);
                }

        }

// set

        function setFileRealName($filename) {
        // TODO: check $filename exists
                $this->filerealname = $filename;
        }

        function setFileShowName($filename) {
                $this->fileshowname = $filename;
        }

        function setArticleid($id) {
        // TODO: check Article $id exists
                $this->articleid = $id;
        }

        function setFiletext($text) {
                $this->filetext = $text;
        }

        function setFiledescript($descript) {
                $this->filedescript = $descript;
        }

        function setMinetype($value) {
		    	$this->minetype = $value;
        }

        function setExt($value) {
                $this->ext = $value;
        }

        function setDownloadname($value) {
                $this->downloadname = $value;
        }
		
		function setgroupid($value){
				$this->groupid = saveaccess($value);
		}
		
        function setByUploadFile($uploadfile){
		//  $uploadfile = uploadfile class instance
                global  $xoopsModule, $wfsConfig;

                $workdir = XOOPS_ROOT_PATH."/".$wfsConfig['filesbasepath'];

                $filename = $uploadfile->getFileName();
                $reg = "/^".implode("\/",explode("/",XOOPS_ROOT_PATH."/".$wfsConfig['filesbasepath']))."\//";
                $this->filerealname = preg_replace($reg, "",$filename);
                $this->ext = $uploadfile->getExt();
                $this->minetype = $uploadfile->getMinetype();
                $this->downloadname = $uploadfile->getOriginalName();
                $this->setFiletextByFile();
        }

        function setFiletextByFile(){
                global $WfsHelperDir, $xoopsModule, $xoopsConfig, $wfsConfig;

                $workdir = XOOPS_ROOT_PATH."/".$wfsConfig['filesbasepath'];
                
                // set fullpath of $this->filerealname
                if(preg_match("/^\/|~[ABCDEFGHIJKLMNOPQRSTQVWXYZ]:\//",$this->filerealname)) {
                        $filename = $this->filerealname;
                } else {

// bug fix : warning comes out, since a full path name is not set up
//                      $filename = $this->filerealname;
                        $filename = $workdir.'/'.$this->filerealname;
                        
                }

                // helper app & character set convertor
                if (file_exists(XOOPS_ROOT_PATH."/modules/".$xoopsModule->dirname()."/language/".$xoopsConfig['language']."/convert.php")) {
                        $langdir = XOOPS_ROOT_PATH."/modules/".$xoopsModule->dirname()."/language/".$xoopsConfig['language'];
                } else {
                        $langdir = XOOPS_ROOT_PATH."/modules/".$xoopsModule->dirname()."/language/english";
                }

                include_once($langdir."/convert.php");

                //
                switch($this->minetype) {
                        case "text/plain":
                                $this->filetext = join(' ', file($filename));
                                $this->filetext = WfsConvert::TextPlane($this->filetext);
                                break;
                        case "text/html":
                                $this->filetext = join(' ', file($filename));
                                //echo "text/html<br />";
                                $this->filetext = WfsConvert::TextHtml($this->filetext);
                                break;
                        case "application/vnd.ms-excel":
                                if (!empty($WfsHelperDir['application/vnd.ms-excel'])) {
                                        exec(XOOPS_ROOT_PATH."/modules/".$xoopsModule->dirname()."/helper/".$WfsHelperDir['application/vnd.ms-excel']."/xlhtml -te ".
                                                $filename, $ret);
                                        $this->filetext = join(' ', $ret);
                                        $this->filetext = WfsConvert::TextHtml($this->filetext);
                                        //echo "filetext = ".$this->filetext."<br />";
                                }
                                break;
                        case "application/pdf":
                                if (!empty($WfsHelperDir['application/pdf'])) {
                                        $distfile = tempnam($workdir."/temp/", "pdf");
                                        exec(XOOPS_ROOT_PATH."/modules/".$xoopsModule->dirname()."/helper/".$WfsHelperDir['application/pdf']."/pdftotext ".
                                        "-cfg ".$langdir."/xpdfrc ".
                                        $filename." ".$distfile);
                                        $this->filetext = join(' ', file($distfile));
                                        $this->filetext = WfsConvert::stripSpaces($this->filetext);
                                        unlink($distfile);
                                }
                                break;
                        case "default":
                        default:
                        $this->filetext="";

                }
        }

// get

        function getFileShowName($format="S") {
                $myts =& MyTextSanitizer::getInstance();
                $smiley = 1;
                switch($format){
                        case "S":
                        case "Show":
                                $fileShowName = $myts->makeTboxData4Show($this->fileshowname,$smiley);
                                break;
                        case "E":
                        case "Edit":
                                $fileShowName = $myts->makeTboxData4Edit($this->fileshowname);
                                break;
                        case "P":
                        case "Preview":
                                $fileShowNamee = $myts->makeTboxData4Preview($this->fileshowname,$smiley);
                                break;
                        case "F":
                        case "InForm":
                                $fileShowName = $myts->makeTboxData4PreviewInForm($this->fileshowname);
                                break;
                }
                return $fileShowName;
        }

        function getFileRealName($format="S") {
                $myts =& MyTextSanitizer::getInstance();
                $smiley = 0;
                switch($format){
                        case "S":
                        case "Show":
                                $filerealname = $myts->makeTboxData4Show($this->filerealname,$smiley);
                                break;
                        case "E":
                        case "Edit":
                                $filerealname = $myts->makeTboxData4Edit($this->filerealname);
                                break;
                        case "P":
                        case "Preview":
                                $filerealname = $myts->makeTboxData4Preview($this->filerealname,$smiley);
                                break;
                        case "F":
                        case "InForm":
                                $filerealname = $myts->makeTboxData4PreviewInForm($this->filerealname);
                                break;
                }
                return $filerealname;
        }

        function getExt($format="S") {
                $myts =& MyTextSanitizer::getInstance();
                $smiley = 0;
                switch($format){
                        case "S":
                        case "Show":
                                $fileext = $myts->makeTboxData4Show($this->ext,$smiley);
                                break;
                        case "E":
                        case "Edit":
                                $fileext = $myts->makeTboxData4Edit($this->ext);
                                break;
                        case "P":
                        case "Preview":
                                $fileext = $myts->makeTboxData4Preview($this->ext,$smiley);
                                break;
                        case "F":
                        case "InForm":
                                $fileext = $myts->makeTboxData4PreviewInForm($this->ext);
                                break;
                }
                return $fileext;
        }

        function getMinetype($format="S") {
                $myts =& MyTextSanitizer::getInstance();
                $smiley = 0;
                switch($format){
                        case "S":
                        case "Show":
                                $filemimetype = $myts->makeTboxData4Show($this->minetype,$smiley);
                                break;
                        case "E":
                        case "Edit":
                                $filemimetype = $myts->makeTboxData4Edit($this->minetype);
                                break;
                        case "P":
                        case "Preview":
                                $filemimetype = $myts->makeTboxData4Preview($this->minetype,$smiley);
                                break;
                        case "F":
                        case "InForm":
                                $filemimetype = $myts->makeTboxData4PreviewInForm($this->minetype);
                                break;
                }
                return $filemimetype;
        }

        function getFileText($format="S") {
                $myts =& MyTextSanitizer::getInstance();
                $smiley = 0;
                switch($format){
                        case "S":
                        case "Show":
                                $filetext = $myts->makeTareaData4Show($this->filetext,$smiley);
                                break;
                        case "E":
                        case "Edit":
                                $filetext = $myts->makeTareaData4Edit($this->filetext);
                                break;
                        case "P":
                        case "Preview":
                                $filetext = $myts->makeTareaData4Preview($this->filetext,$smiley);
                                break;
                        case "F":
                        case "InForm":
                                $filetext = $myts->makeTareaData4PreviewInForm($this->filetext);
                                break;
                }
                return $filetext;
        }

        function getFiledescript($format="S") {
                $myts =& MyTextSanitizer::getInstance();
                $html = 1;
	        	$smiley = 1;
            	$xcodes = 1;
				
                switch($format){
                        case "S":
                        case "Show":
                                $filedescript = $myts->makeTareaData4Show($this->filedescript, $html, $smiley, $xcodes);
                                break;
                        case "E":
                        case "Edit":
                                $filedescript = $myts->makeTareaData4Edit($this->filedescript);
                                break;
                        case "P":
                        case "Preview":
                                $filedescript = $myts->makeTareaData4Preview($this->filedescript,$smiley);
                                break;
                        case "F":
                        case "InForm":
                                $filedescript = $myts->makeTareaData4PreviewInForm($this->filedescript);
                                break;
                }
                return $filedescript;
        }

        function getDownloadname($format="S") {
                $myts =& MyTextSanitizer::getInstance();
                $smiley = 0;
                switch($format){
                        case "S":
                        case "Show":
                                $filedownname = $myts->makeTboxData4Show($this->downloadname,$smiley);
                                break;
                        case "E":
                        case "Edit":
                                $filedownname = $myts->makeTboxData4Edit($this->downloadname);
                                break;
                        case "P":
                        case "Preview":
                                $filedownname = $myts->makeTboxData4Preview($this->downloadname,$smiley);
                                break;
                        case "F":
                        case "InForm":
                                $filedownname = $myts->makeTboxData4PreviewInForm($this->downloadname);
                                break;
                }
                return $filedownname;
        }

        function getFileid() {
                return $this->fileid;
        }

        function getLinkedName($funcURL) {
                $myts =& MyTextSanitizer::getInstance();
                return "<a href='".$funcURL.$this->fileid."'>".$myts->makeTboxData4Show($this->fileshowname)."</a>";
        }
   
        function getArticleid() {
                return $this->articleid;
        }

        function getCounter() {
                return $this->counter;
        }

// public - WfsArticle::* style

        function getAllbyArticle($articleid) {
        
        	global $wfsTableFiles;	// add
        
                $db =& Database::getInstance();

// easy to rename module and table
//		$table = $db->prefix("wfs_files");
		$table = $db->prefix($wfsTableFiles);

                $ret = array();
                $sql = "SELECT * FROM ".$table." WHERE articleid=".$articleid."";
                $result = $db->query($sql);

                while( $myrow = $db->fetchArray($result) ){
                        $ret[] = new WfsFiles($myrow);
                }
                return $ret;
        }

// database

        function getFile($id){
                $sql = "SELECT * FROM ".$this->table." WHERE fileid=".$id."";
                $array = $this->db->fetchArray($this->db->query($sql));
                $this->makeFile($array);
        }

        function makeFile($array){
                foreach($array as $key=>$value){
                        $this->$key = $value;
                }
        }

        function store(){

                $myts =& MyTextSanitizer::getInstance();
                $fileRealName = $myts->makeTboxData4Save($this->filerealname);
                $fileShowName = $myts->censorString($this->fileshowname);
                $fileShowName = $myts->makeTboxData4Save($fileShowName);
                $filetext = $myts->makeTboxData4Save($this->filetext);
                $filedescript = $myts->makeTboxData4Save($this->filedescript);
                $downloadname = $myts->makeTboxData4Save($this->downloadname);
				$groupid = saveaccess($this->groupid);
                $date = time();
                $ext = $myts->makeTboxData4Save($this->ext);
                $minetype = $myts->makeTboxData4Save($this->minetype);
                $counter = intval($this->counter);
                $articleid = intval($this->articleid);

                if(!isset($this->fileid)){
                        $newid = $this->db->genId($this->table."_fileid_seq");
                        $sql = "INSERT INTO ".$this->table.
                        " (fileid, articleid, filerealname, fileshowname, filetext, filedescript, date, ext, minetype, downloadname, counter, groupid) ".
                        "VALUES (".$newid.",".$articleid.",'".$fileRealName."','".$fileShowName.
                        "','".$filetext."','".$filedescript."',".$date.",'".$ext."','".$minetype."','".$downloadname."',".$counter.",'".$groupid."')";
                }else{
                        $sql = "UPDATE ".$this->table.
                        " SET articleid=".$articleid.",filerealname='".$this->filerealname.
                        "',fileshowname='".$fileShowName."',filetext='".$filetext."', filedescript='".$filedescript."',date=".$date.
                        ",ext='".$ext."',minetype='".$minetype."',downloadname='".$downloadname."', groupid='".$groupid."',counter=".$counter.
                        " WHERE fileid=".$this->fileid."";
                }
                if(!$result = $this->db->query($sql)){
                return false;
                }
                return true;
        }

        function delete(){
                global $WfsHelperDir,$xoopsModule,$xoopsConfig, $wfsConfig;

                $sql = "DELETE FROM ".$this->table." WHERE fileid=".$this->fileid."";
                if(!$result = $this->db->query($sql)){
                        return false;
                }
                $workdir = XOOPS_ROOT_PATH."/".$wfsConfig['filesbasepath'];
                
				if (file_exists($workdir."/".$this->filerealname)) unlink($workdir."/".$this->filerealname);
                return true;
        }

        function updateCounter(){
                $sql = "UPDATE ".$this->table." SET counter=counter+1 WHERE fileid=".$this->fileid."";
                if(!$result = $this->db->queryF($sql)){
                        return false;
                }
                return true;
        }

// HTML output

        function editform() {
                
				global $xoopsModule, $wfsConfig, $xoopsConfig;
				
				include_once XOOPS_ROOT_PATH."/class/xoopsformloader.php";
				$mimetype = new mimetype();
																
				xoops_cp_header();
				$article = new WfsArticle($this->articleid);
				$atitle = "<a href='" . XOOPS_URL . "/modules/" . $xoopsModule->dirname() . "/article.php?articleid=" . $this->articleid . "'>" . $article->title . "</a>";
				$stform = new XoopsThemeForm(_AM_FILESTATS, "op", xoops_getenv('PHP_SELF'));
				
				echo "<div><h3>" . _AM_FILEATTACHED . "</h3></div>";
				$stform->addElement(new XoopsFormLabel(_AM_FILESTAT, $atitle));
				$stform->addElement(new XoopsFormLabel(_WFS_FILEID, "No: ".$this->fileid));
				$workdir = XOOPS_ROOT_PATH."/".$wfsConfig['filesbasepath'];
                
				if (file_exists(realpath($workdir."/".$this->filerealname))) {
					$error = 'File <b>'. $this->filerealname .'</b> exists on server.';
				}else{
					$error = 'ERROR, File <b>'. $this->filerealname .'</b> please check!';
				}    
				
				$stform->addElement(new XoopsFormLabel(_WFS_ERRORCHECK, $error));
				$stform->addElement(new XoopsFormLabel(_WFS_FILEREALNAME, $this->getFileRealName("F")));
				$stform->addElement(new XoopsFormLabel(_WFS_DOWNLOADNAME, $this->getDownloadname("F")));
				$stform->addElement(new XoopsFormLabel(_WFS_MINETYPE, $this->getMinetype("F")));
				$stform->addElement(new XoopsFormLabel(_WFS_EXT, ".".$this->getExt("F")));
				$stform->addElement(new XoopsFormLabel(_WFS_FILEPERMISSION, get_perms(XOOPS_ROOT_PATH."/".$wfsConfig['filesbasepath']."/".$this->getFileRealName("F"))));
				$stform->addElement(new XoopsFormLabel(_WFS_DOWNLOADED, $this->getCounter("F")." times" ));
				$stform->addElement(new XoopsFormLabel(_WFS_DOWNLOADSIZE, PrettySize(filesize(XOOPS_ROOT_PATH."/".$wfsConfig['filesbasepath']."/".$this->getFileRealName("F")))));
				$stform->addElement(new XoopsFormLabel(_WFS_LASTACCESS, lastaccess($workdir."/".$this->filerealname, 'E1')));
				$stform->addElement(new XoopsFormLabel(_WFS_LASTUPDATED, formatTimestamp($this->date, $wfsConfig['timestamp'])));
				
				//$stform->addElement(new XoopsFormLabel(_WFS_FILEREALNAME, $this->getFileRealName("F")));
				$stform->display();
				clearstatcache();
				
				$sform = new XoopsThemeForm(_AM_MODIFYFILE, "op", xoops_getenv('PHP_SELF'));				
				echo "<div><h3>" . _AM_EDITFILE . "</h3></div>";
                
  				include_once XOOPS_ROOT_PATH.'/class/xoopsformloader.php';
        		
				$sform = new XoopsThemeForm(_AM_MENUS, "op", xoops_getenv('PHP_SELF'));
				$sform->addElement(new XoopsFormSelectGroup(_WFS_GROUPPROMPT, 'groupid', true, getGroupIda($this->groupid), 5, true));
				$sform->addElement(new XoopsFormLabel(_WFS_FILEID, "No: ".$this->fileid));
				$sform->addElement(new XoopsFormText(_WFS_ARTICLEID, 'articleid', 5, 5, $this->articleid));
				$sform->addElement(new XoopsFormText(_WFS_FILEREALNAME, 'filerealname', 40, 40, $this->getFileRealName("F")));
				$sform->addElement(new XoopsFormText(_WFS_DOWNLOADNAME, 'downloadname', 40, 40, $this->getDownloadname("F")));
   		        $sform->addElement(new XoopsFormText(_WFS_FILESHOWNAME, 'fileshowname', 40, 80, $this->getFileShowName("F")));
				$sform->addElement(new XoopsFormDhtmlTextArea(_WFS_FILEDESCRIPT, 'filedescript', $this->getFiledescript("F"), 10, 60));
				$sform->addElement(new XoopsFormTextArea(_WFS_FILETEXT, 'filetext', $this->getFileText("F")));
               	$sform->addElement(new XoopsFormText(_WFS_EXT, 'ext', 30, 80, $this->getExt("F")));
                $sform->addElement(new XoopsFormText(_WFS_MINETYPE, 'minetype', 40, 80, $this->getMinetype("F")));
                $sform->addElement(new XoopsFormLabel(_WFS_UPDATEDATE, formatTimestamp($this->date, $wfsConfig['timestamp'])));
				$sform->addElement(new XoopsFormHidden('fileid', $this->fileid));
				
				//echo $this->fileid;
				//echo "<input type='hidden' name='fileid' value='$this->fileid' />\n";
                ///$sform->addElement(new XoopsFormHidden('fileid', ".$this->fileid."));
				$button_tray = new XoopsFormElementTray('','');
				//$hidden = new XoopsFormHidden('fileid', $this->fileid);
				$hidden = new XoopsFormHidden('op', 'filesave');
				$button_tray->addElement($hidden);
				$button_tray->addElement(new XoopsFormButton('', 'post', _AM_SAVECHANGE, 'submit'));
				$sform->addElement($button_tray);
				$sform->display();
				unset($hidden); 
				        		
		}

        function loadPostVars() {
            global $myts, $xoopsUser, $xoopsConfig;
       			
			$this->setFileRealName($_POST['filerealname']); 
            $this->setFileShowName($_POST['fileshowname']);
       		$this->setArticleid($_POST['articleid']);
            $this->setFiletext($_POST['filetext']);
            $this->setFiledescript($_POST['filedescript']);
			$this->setMinetype($_POST['minetype']);
        	$this->setExt($_POST['ext']);
        	$this->setDownloadname($_POST['downloadname']);
			$this->setGroupid($_POST['groupid']);
        }

}

?>