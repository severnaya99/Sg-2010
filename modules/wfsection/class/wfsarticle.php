<?php
// $Id: wfsarticle.php,v 1.7 Date: 06/01/2003, Author: Catzwolf Exp $

include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/class/wfscategory.php';
include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/class/wfsfiles.php';
include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/class/uploadfile.php';
//include_once(XOOPS_ROOT_PATH."/modules/".$xoopsModule->dirname()."/cache/uploadconfig.php");
include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/include/wysiwygeditor.php';
include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/include/functions.php';
//include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/include/htmlcleaner.php';
include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/class/common.php';
include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/class/mimetype.php';
include_once XOOPS_ROOT_PATH.'/class/xoopslists.php';
include_once XOOPS_ROOT_PATH.'/class/xoopscomments.php';

//Global $wfsConfig;
$myts =& MyTextSanitizer::getInstance();

class WfsArticle {
        var $db;
        var $table;
        var $commentstable;
        var $categorytable;
        var $filestable;
        var $articleid;
        var $categoryid;
        var $uid;
        var $title;
        var $maintext;
        var $counter;
        var $created;
        var $changed;
        var $nohtml=0;
        var $nosmiley=0;
        var $summary;
        var $url;
		var $urlname;
        var $page = 1;
        var $groupid;
        var $rating;
        var $votes;
        var $popular;
        var $notifypub;
		var $type;
		var $approved;
        var $htmlpage;
        var $ishtml;
        var $groupid;
		var $offline;
		var $weight;
		var $approved;
        var $changeuser;
		var $hostname;
		var $noshowart; 
// class instance
        var $category;
        var $files;
// temp	
		var $fileshowname;
// flag
        var $titleFlag;
        var $maintextFlag;
        var $summaryFlag;

// constructor

        function WfsArticle($articleid=-1){
                $this->db =& Database::getInstance();
                $this->table = $this->db->prefix("wfs_article");
                $this->commentstable = $this->db->prefix("wfs_comments");
                $this->categorytable = $this->db->prefix("wfs_category");
                $this->filestable = $this->db->prefix("wfs_files");
                $this->titleFlag = 0;
                $this->maintextFlag = 0;
                $this->summaryFlag = 0;

                if(is_array($articleid)){
                        $this->makeArticle($articleid);
                        $this->category = $this->category();
                }elseif($articleid != -1){
                        $this->getArticle($articleid);
                        $this->category = $this->category();
                }
        }

    function loadArticle($id){
	$sql = "SELECT * FROM ".$this->table." WHERE articleid=".$id." and published < ".time()." AND published > 0 AND (expired = 0 OR expired > ".time().") AND offline = 0 AND nowshow = 1";

	//$sql = "SELECT * FROM ".$this->table." WHERE articleid=".$id." and published > 0 and offline ='0' ";
	$array = $this->db->fetchArray($this->db->query($sql));
	$this->makeArticle($array);
	}

// create instance of other classes
        function category() {
                return new WfsCategory($this->categoryid);
        }
// set property
        function setArticleid($value){
                $this->articleid = $value;
        }

        function setCategoryid($value){
                $this->categoryid = $value;
                if ( !isset($this->category)) $this->category = $this->category();
        }

        function setUid($value){
                $this->uid=$value;
        }

        function setTitle($value){
                $this->title=$value;
                $this->titleFlag = 1;
        }

        function setMaintext($value){
                $this->maintext=$value;
				//$this->maintext = htmlcleaner::cleanup($value);
				$this->maintext = preg_replace('/<P>/', '<P style="margin: 0.4cm 0cm 0pt">', $this->maintext);
				$this->maintext = preg_replace('/<DIV style="margin: 0.4cm 0cm 0pt">/', '<DIV style="MARGIN: 0.0cm 0cm 0pt">', $this->maintext); 
				$this->maintext = ereg_replace ('<TBODY>', '', $this->maintext);
				$this->maintext = ereg_replace ('</TBODY>', '', $this->maintext);
				$this->maintextFlag = 1;
        }

        function setNohtml($value){
                $this->nohtml=$value;
        }

        function setNosmiley($value){
                $this->nosmiley=$value;
        }

        function setFileshowname($value){
                $this->fileshowname=$value;
        }

        function setSummary($value){
                $this->summary=$value;
                $this->summaryFlag = 1;
        }

        function setUrl($value){
                $this->url=$value;
        }

		function setUrlname($value){
                $this->urlname=$value;
        }

		function setPage($value){
                $this->page=$value;
        }

		function setNotifypub($value){
                $this->notifypub=$value;
        }
		function setType($value){
                $this->type=$value;
        }
		function setPublished($value){
                $this->published=$value;
        }

		function setExpired($value){
                $this->expired=$value;
        }

		function setApproved($value){
                $this->approved=$value;
        }

        function setHtmlpage($value){
                $this->htmlpage=$value;
        }

        function setIshtml($value){
                $this->ishtml=$value;
        }

		function setGroupid($value){
                $this->groupid=saveAccess($value);
        }

        function setOffline($value){
                $this->offline=$value;
        }

        function setWeight($value){
                $this->weight = $value;
        }

		function setChangeuser($value){
                $this->changeuser = $value;
        }
		
		function setNoshowart($value){
                $this->nowshowart = $value;
        }
		
		
		// $file : WfsFile class instance
		function addFile($file="") {
                $file->setArticleid($this->articleid);
                $file->store();
                $this->store();
        }

// database

        function store($timestamp=""){

		global $HTTP_POST_VARS, $groupid, $myts, $xoopsDB, $xoopsConfig;

                $myts =& MyTextSanitizer::getInstance();
                $title =$myts->censorString($this->title);
                $maintext =$myts->censorString($this->maintext);
 				$summary =$myts->censorString($this->summary);
                $title = $myts->makeTboxData4Save($title);
                $maintext = $myts->makeTareaData4Save($maintext);
                $summary = $myts->makeTareaData4Save($summary);
                $url = $myts->makeTboxData4Save($this->url);
				$urlname = $myts->makeTboxData4Save($this->urlname);
	            $page = $myts->makeTboxData4Save($this->page);
                $type = $myts->makeTboxData4Save($this->type);
                $offline = $myts->makeTboxData4Save($this->offline);
                $htmlpage = $myts->makeTboxData4Save($this->htmlpage);
                $ishtml = $myts->makeTboxData4Save($this->ishtml);
                $published = $myts->makeTboxData4Save($this->published);
				$expired = $myts->makeTboxData4Save($this->expired);
                $notifypub = $myts->makeTboxData4Save($this->notifypub);
                $userid = $myts->makeTboxData4Save($this->changeuser);
				$hostname = $myts->makeTboxData4Save($this->hostname);
				$weight = $myts->makeTboxData4Save($this->weight);
				$noshowart = $myts->makeTboxData4Save($this->noshowart);
				$userid = $myts->makeTboxData4Save($this->uid);
				

				if(empty($groupid))	{
					$groupid = '';
				} else {
					$groupid = $myts->makeTboxData4Save($this->groupid);
				}

				if(!isset($this->nohtml) || $this->nohtml != 1)	{
					$this->nohtml = 0;
                }
                if(!isset($this->nosmiley) || $this->nosmiley != 1)	{
                	$this->nosmiley = 0;
                }
                if(!isset($this->categoryid))	{
                	$this->categoryid = 0;
                }
                if(!isset($this->page))	{
                	$this->page = 1;
                }

				if(!isset($this->articleid)){
                        $newarticleid = $this->db->genId($this->table."_articleid_seq");
                        $created = ($created = time() );
                        $changed = $created;
						$sql = "INSERT INTO ".$this->table.
                        " (articleid, uid, title, created, changed, nohtml, nosmiley, maintext, counter, categoryid, summary, url, groupid, published, type, notifypub, urlname, htmlpage, ishtml, offline, page, weight, noshowart) ".
                        "VALUES (".$newarticleid.",".$userid.",'".$title."',".$created.",".$changed.",".$this->nohtml.",".$this->nosmiley.",'".$maintext."',0,".
                        $this->categoryid.",'".$summary."','".$url."','".$groupid."','".$published."', '".$type."', '".$notifypub."', '".$urlname."', '".$htmlpage."', ".$this->ishtml.", '".$offline."', '".$page."', '".$weight."', '".$noshowart."')";
                }else{
                        $this->changed = time();
                        $sql = "UPDATE ".$this->table.
                        " SET
						uid=".$userid.",
						title='".$title."',
						changed=".$this->changed.",
						nohtml=".$this->nohtml.",
						nosmiley=".$this->nosmiley.",
						maintext='".$maintext."',
						categoryid=".$this->categoryid.",
						summary='".$summary."',
						url='".$url."',
						groupid='".$groupid."',
						published='".$published."',
						expired='".$expired."',
						offline='".$offline."',
						urlname='".$urlname."',
						ishtml=".$this->ishtml.",
						page='".$page."',
						weight='".$weight."',
						htmlpage='".$htmlpage."',
						noshowart ='".$noshowart."'  
						"." WHERE articleid=".$this->articleid."";

                }
                if(!$result = $this->db->query($sql)) {
                return false;
                }
                return true;
        }

      	function getArticle($articleid){
		$sql = "SELECT * FROM ".$this->table." WHERE articleid=".$articleid." ";
        $array = $this->db->fetchArray($this->db->query($sql));
        	if (count($array) == 0) {
        		return false;
          	}
        $this->makeArticle($array);
        }

        function makeArticle($array){

        foreach($array as $key=>$value){
            $this->$key = $value;
        	}
        $this->files = WfsFiles::getAllbyArticle($this->articleid);
        }

        function delete(){
        	global $xoopsDB, $HTTP_POST_VARS, $HTTP_GET_VARS, $xoopsConfig, $xoopsModule;
			
			$sql = "DELETE FROM ".$this->table." WHERE articleid=".$this->articleid."";

			if(!$result = $this->db->query($sql)){
        		return false;
        	}

			if ( isset($this->commentstable) && $this->commentstable != "" ) {
        		xoops_comment_delete($xoopsModule->getVar('mid'), $this->articleid);
				
			}
			if ( isset($this->filestable) && $this->filestable != "" ) {
            	$this->files = WfsFiles::getAllbyArticle($this->articleid);
            		foreach($this->files as $file) {
            		$file->delete();
            }

		}

            return true;
        }

        function updateCounter(){
        	$sql = "UPDATE ".$this->table." SET counter=counter+1 WHERE articleid=".$this->articleid."";
        		if(!$result = $this->db->queryF($sql)){
        		return false;
        	}
        	return true;
        }

// get
        function categoryid() {
			return $this->categoryid;
		}
        function categoryTitle() {
			return $this->category->title();
		}
        function uid() {
			return $this->uid;
		}

         function uname(){
        	global $xoopsUser;
        	return XoopsUser::getUnameFromId($this->uid);
        }

        function title($format="Show"){
        $myts =& MyTextSanitizer::getInstance();
        $smiley = 1;

			if($this->nosmiley()){
        		$smiley = 0;
        	}
            	switch($format){
            	case "S":
                case "Show":
                	$title = $myts->makeTboxData4Show($this->title, $smiley);
                break;
                case "E":
                case "Edit":
                    $title = $myts->makeTboxData4Edit($this->title);
                break;
                case "P":
                        case "Preview":
                                $title = $myts->makeTboxData4Preview($this->title,$smiley);
                                break;
                        case "F":
                        case "InForm":
                                $title = $myts->makeTboxData4PreviewInForm($this->title);
                                break;
                }
                return $title;
        }

        function maintext($format="Show", $page= -1) {
               global $xoopsModule;

                $myts =& MyTextSanitizer::getInstance();
                $html = 1;
                $smiley = 1;
                $xcodes = 1;
                
				if ( $this->nohtml() ) $html = 0;
                if ( $this->nosmiley() ) $smiley = 0;
				if ( $page == -1 ) {
                        $maintext = $this->maintext;
                } else {
                        $maintextarr = explode("[pagebreak]", $this->maintext);
                        if ( $page > count($maintextarr) ) {
                                $maintext = $maintextarr[count($maintextarr)];
                        } else {
                                $maintext = $maintextarr[$page];
                        }
                }

                switch($format){
                        case "S":
                        case "Show":
                                $maintext = $myts->makeTareaData4Show($maintext,$html,$smiley,$xcodes);
                                break;
                        case "E":
                        case "Edit":
                                $maintext = $myts->makeTareaData4Edit($maintext);
                                break;
                        case "P":
                        case "Preview":
                                $maintext = $myts->makeTareaData4Preview($maintext,$html,$smiley,$xcodes);
                                break;
                        case "F":
                        case "InForm":
                                $maintext = $myts->makeTareaData4PreviewInForm($maintext);
								break;
                }
                return $maintext;
        }


        function maintextPages() {
        	$maintextarr = explode("[pagebreak]", $this->maintext);
            return count($maintextarr);
        }

		function maintextWithFile($format="Show", $page="") {
            global $xoopsModule;
            	$maintext = $this->maintext($format,$page);
            return $maintext;
        }


        function summary($format="Show"){
                $myts =& MyTextSanitizer::getInstance();
                $html = 1;
                $smiley = 1;
                $xcodes = 1;
                if ( $this->nohtml() ) $html = 0;
                if ( $this->nosmiley() ) $smiley = 0;
                $summary = $this->summary;
                switch($format){
                        case "S":
                        case "Show":
                                $summary = $myts->makeTareaData4Show($summary,$html,$smiley,$xcodes);
                                break;
                        case "E":
                        case "Edit":
                                $summary = $myts->makeTareaData4Edit($summary);
                                break;
                        case "P":
                        case "Preview":
                                $summary = $myts->makeTareaData4Preview($summary,$html,$smiley,$xcodes);
                                break;
                        case "F":
                        case "InForm":
                                $summary = $myts->makeTareaData4PreviewInForm($summary);
                                break;
                }
                return $summary;
        }

        function url($format="Show"){
                $myts =& MyTextSanitizer::getInstance();
                switch($format){
                        case "S":
                        case "Show":
                                $title = $myts->makeTboxData4Show($this->url,0);
                                break;
                        case "E":
                        case "Edit":
                                $title = $myts->makeTboxData4Edit($this->url);
                                break;
                        case "P":
                        case "Preview":
                                $title = $myts->makeTboxData4Preview($this->url,0);
                                break;
                        case "F":
                        case "InForm":
                                $title = $myts->makeTboxData4PreviewInForm($this->url);
                                break;
                }
                return $title;
        }

        function counter(){
                return $this->counter;
        }

        function created(){
                return $this->created;
        }

		function urlname(){
                return $this->urlname;
        }

		function htmlpage(){
                return $this->htmlpage;
        }

		function ishtml(){
                return $this->ishtml;
        }

		function changed(){
                return $this->changed;
        }

        function articleid(){
                return $this->articleid;
        }

        function nohtml(){
                return $this->nohtml;
        }

        function nosmiley(){
                return $this->nosmiley;
        }

		function page(){
                return $this->page;
        }

		function notifypub(){
                return $this->notifypub;
        }

		function type(){
                return $this->type;
        }

		function published(){
                return $this->published;
        }

		function expired(){
                return $this->expired;
        }

		function groupid(){
                return $this->groupid;
        }

		function offline(){
                return $this->offline;
        }

		function weight(){
                return $this->weight;
        }

        function approved(){
                return $this->approved;
        }

        function changeuser(){
                return $this->changeuser;
        }
		
		function noshowart(){
                return $this->noshowart;
        }
		
        function getCommentsCount(){
                global $xoopsDB, $HTTP_POST_VARS, $HTTP_GET_VARS, $xoopsConfig, $xoopsModule;
				$count = xoops_comment_count($xoopsModule->getVar('mid'), $this->articleid);
                return $count;
        }

        function getFilesCount(){
                if (empty($this->articleid)) return 0;
                $this->files = WfsFiles::getAllbyArticle($this->articleid);
                return @count($this->files);
        }

        function getNicePathToPid($funcURL){
                $ret = $category->getNicePathToPid($funcURL);
                return $ret;
        }

// public - WfsArticle::* style

        function getAllArticle($limit=0, $start=0, $category=0, $dataselect, $asobject=true) {

		global $orderby;
				
							
				$db =& Database::getInstance();
                $myts =& MyTextSanitizer::getInstance();
                $ret = array();

				if ($dataselect == '1') { //all published articles
				$sql = "SELECT * FROM ".$db->prefix("wfs_article")." where published <= ".time()." and expired = 0"; } 
                if ($dataselect == '2') { //submitted articles
				$sql = "SELECT * FROM ".$db->prefix("wfs_article")." where published = '0' and offline != '1'"; }  
				if ($dataselect == '3') { //Gets all articles
				$sql = "SELECT * FROM ".$db->prefix("wfs_article")." "; } 
				if ($dataselect == '4') { //online articles
				$sql = "SELECT * FROM ".$db->prefix("wfs_article")." where (published > 0 AND published <= ".time().") AND noshowart = 0 AND offline = '0' AND (expired = 0 OR expired > ".time().") "; }
				if ($dataselect == '5') { //offline articles
				$sql = "SELECT * FROM ".$db->prefix("wfs_article")." where published > 0 and offline = '1'"; }
				if ($dataselect == '6') { //autoexpired articles
				$sql = "SELECT * FROM ".$db->prefix("wfs_article")." where expired > ".time().""; }
				if ($dataselect == '7') { //auto published articles
				$sql = "SELECT * FROM ".$db->prefix("wfs_article")." where published > ".time().""; }
				if ($dataselect == '8') { //expired articles
				$sql = "SELECT * FROM ".$db->prefix("wfs_article")." where expired > 0 and expired < ".time()." "; }
				if ($dataselect == '9') { //expired articles
				$sql = "SELECT * FROM ".$db->prefix("wfs_article")." where noshowart = 1 "; }
				if ( !empty($category) ) {
                        $sql .= " and categoryid=$category " ;
                }
                $sql .= " ORDER BY ".$orderby."";
                $result = $db->query($sql,$limit,$start);
                while ( $myrow = $db->fetchArray($result) ) {
                        if ( $asobject ) {
                                $ret[] = new WfsArticle($myrow);
                        } else {
                                $ret[$myrow['articleid']] = $myts->makeTboxData4Show($myrow['title']);
                        }
                }
                return $ret;
        }


        function getByCategory($categoryid){
                $db =& Database::getInstance();
                $ret = array();
                $result = $db->query("SELECT * FROM ".$db->prefix("wfs_article")." WHERE categoryid=$categoryid ORDER BY ".$categoryid."");
                while( $myrow = $db->fetchArray($result) ){
                	if (checkAccess($groupid) == '1') {
						$ret[] = new WfsArticle($myrow);
                	}
				}
                return $ret;
        }

        function countByCategory($categoryid=0){
                $count = 0;
				$db =& Database::getInstance();
               	$sql = "SELECT * FROM ".$db->prefix("wfs_article")." WHERE published < ".time()." AND published > 0 AND (expired = 0 OR expired > ".time().") AND offline = 0";

				if ( $categoryid != 0 ) {
                        $sql .= " and categoryid=$categoryid ";
                }
               	$result = $db->query($sql);
			
				while( $myrow = $db->fetchArray($result) ){
					$groupid = $myrow['groupid'];
					if (checkAccess($groupid) == '1') {
						$count++;
                	}
				}
				return $count;
        }

        function getLastChangedByCategory($categoryid=0){
                $db =& Database::getInstance();
               	$sql = "SELECT MAX(changed) FROM ".$db->prefix("wfs_article")." WHERE published < ".time()." AND published > 0 AND (expired = 0 OR expired > ".time().") AND offline = 0";
                if ( $categoryid != 0 ) {
                        $sql .= " AND categoryid=$categoryid ";
                }
                $result = $db->query($sql);
                list($count) = $db->fetchRow($result);
                return $count;
        }

// HTML

        function textLink($format="Show") {
                global $xoopsModule, $wfsConfig;
               
				if ($wfsConfig['shortart']) {
					if ( !XOOPS_USE_MULTIBYTES ) {
						if (strlen($this->title) >= 19) {
							$this->title = substr($this->title,0,18)."...";
						}
					}
                }
				$ret = "<a href='".XOOPS_URL."/modules/".$xoopsModule->dirname()."/article.php?articleid=".$this->articleid()."'>".$this->title($format)."</a>";
                return $ret;
        }

        function iconLink($format="Show") {
               	global $xoopsModule;
               	$ret = "";
               	if ($this->getFilesCount() || !empty($this->maintext) || $this->ishtml =='1') {
               	if ($this->url || $this->ishtml) {
               		$ret .= "<a href='".$this->url()."'><img align='absmiddle' src='".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/icon/html.gif' /> </a>";
               	} else {
			   		$ret .= "<img align='absmiddle' src='".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/icon/default.gif' /> ";
				}
                $ret .= $this->textLink($format);
                return $ret;
                }
                return $this->title($format);
         }


// HTML output

	function preview($format="Show", $page=-1, $pageurl="") {

	$myts =& MyTextSanitizer::getInstance();

			global $xoopsDB, $xoopsConfig, $xoopsModule, $xoopsUser, $popular, $groupid, $wfsConfig;

			$datetime = formatTimestamp(time(), $wfsConfig['timestamp']);
			$counter = 0;
					
			global $xoopsUser, $xoopsConfig, $wfsConfig;
			
			if ($this->uid > 0) {
				$user = new xoopsUser($this->uid);
				if (($wfsConfig['realname']) && $user->getvar('name')) {
						$poster = $user->getvar('name');
					} else {
				   		$poster = $user->getvar('uname');
					} 
				$poster = "<a href='".XOOPS_URL."/userinfo.php?uid=".$this->uid()."'>".$poster."</a>";
			} else {
				$poster = $GLOBALS['xoopsConfig']['anonymous'];
			}
// $datetime
            if ( isset($this->published)) $datetime = formatTimestamp($this->published, "$wfsConfig[timestamp]");
// $title
            $title = $this->category->textLink().": ";
			$title .= $this->title();
//Counter
			if (isset($this->counter) ) $counter = $this->counter;

			$pagenum = $this->maintextPages()-1;
                if ($page > $pagenum) $page = $pagenum;
                $maintext = "";
                if ( $page == -2 ) $page=0;
                if ($this->maintextFlag) {
                        $maintext .= $this->maintextWithFile("P",$page);
                } else {
                        $maintext .= $this->maintextWithFile("S",$page);
                }
// Setup URL link for article
		    $urllink = '';
			if (($this->url) && (!$this->urlname)) $urllink = "<a href='".$this->url()."' target='_blank'>Url Link: ".$this->url()."</a><br />";
			if ($this->urlname) $urllink .= "<a href='".$this->url()."' target='_blank'>Url Link: ".$this->urlname()."</a><br />";

//maintext for articles
            //$maintext = $this->maintext;
//Downloads links
       		$workdir = XOOPS_ROOT_PATH."/".$wfsConfig['filesbasepath'];
			$downloadlink = "<table width='100%' cellspacing='1' cellpadding='2'>";
           
		    if (isset($this->articleid) && $this->getFilesCount() >0 ) {
                        $downloadlink .= "<tr><td >";
                        if ($format=="Show") {
							$downloadlink .="<tr><td colspan='2' class='itemHead' align='left'><b>"._WFS_DOWNLOADS." $this->title</b></td></tr>";
                        } else {
							$downloadlink .="<tr><td colspan='2' class='bg3' align='left'><b>"._WFS_DOWNLOADS." $this->title</b></td></tr>";
						}
                        foreach($this->files as $file) {
                        	$filename = $file->getFileRealName();
							$mimetype = new mimetype();
							$icon = get_icon($workdir."/".$filename);
							$size = filesize(XOOPS_ROOT_PATH."/".$wfsConfig['filesbasepath']."/".$filename);
						   	
							if (empty($size)) $size = '0';
							
						   	   $downloadlink .= "<tr><td valign ='middle' height='10' width='50%' class='even'><img src=".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/icon/".$icon." align='middle'> : ".$file->getLinkedName(XOOPS_URL."/modules/".$xoopsModule->dirname()."/download.php?fileid=")."";
                               $downloadlink .= "<br /><a href='brokenfile.php?lid=$file->fileid'><div  align = right><span class='comUserStat'></b>["._WFS_REPORTBROKEN."]</span></div></a>";
				               $downloadlink .= "</td>";
							   $downloadlink .= "<td width='50%' class='even' align='left' valign='top'><b>"._WFS_DESCRIPTION.":</b><br>".$file->getFiledescript('S')."</td>";
                               $downloadlink .= "</tr>";
                               $downloadlink .= "<tr><td class='odd' align='right' width='50%'>";
							   $downloadlink .= ""._WFS_FILETYPE."".$mimetype->getType($workdir."/".$filename)."";
                               $downloadlink .= "</td>";
                               $downloadlink .= "<td class='odd' align='right' width='50%'>";
							   $downloadlink .= "<img src='".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/counter.gif' border='0' alt='downloads' align='absmiddle'/>";
							   $downloadlink .= "&nbsp;".$file->getCounter()."&nbsp;&nbsp;<img src='".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/size.gif' border='0' align='absmiddle' alt='"._WFS_FILESIZE."' />";
							   $downloadlink .= "&nbsp;".PrettySize($size)."</a>";
                               $downloadlink .="</td></tr>";
                        		}
                        $downloadlink .= "</td></tr>";
              
                $downloadlink .= "</table><br>";
	  
	   }
                $imglink = "";
                $adminlink = "&nbsp;";
                $pagelink = "";

			//Show page numbers if page > 0
		
			if ($page != -1 && $pagenum) {
           		$pagelink .= "Page: ";
				for($i=0; $i <=$pagenum; $i++) {
                	if ($page == ($i)) { 
						$pagelink .= "<a href='".$pageurl.($i)."'><span style='color:#ee0000;font-weight:bold;'>".($i+1)."</span></a>&nbsp;";
                    } else {
						$pagelink .= "<a href='".$pageurl.($i)."'>".($i+1)."</a>&nbsp;";
					}
				}
                $title .= " (".($page+1)."/".($pagenum+1).")";
             }
		
			if ($xoopsUser && $format=="Show") {
           		
				if ($xoopsUser->isAdmin($xoopsModule->mid()) ) {
					$adminlink = " [ <a href='".XOOPS_URL."/modules/".$xoopsModule->dirname().
                		"/admin/index.php?op=edit&amp;articleid=".$this->articleid."'>"._EDIT.
                		"</a> | <a href='".XOOPS_URL."/modules/".$xoopsModule->dirname().
                		"/admin/index.php?op=delete&amp;articleid=".$this->articleid."'>"._DELETE."</a> ] ";
            	}
			}

			   	$maillink = "<a href='print.php?articleid=".$this->articleid."'><img src='".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/print.gif' alt='"._WFS_PRINTERFRIENDLY."' /></a> ";
            	$maillink .= "<a target='_top' href='mailto:?subject=".rawurlencode(sprintf(_WFS_INTFILEAT, $xoopsConfig['sitename']))."&body=".rawurlencode(sprintf(_WFS_INTFILEFOUND,$xoopsConfig['sitename']).":  ".XOOPS_URL."/modules/".$xoopsModule->dirname()."/index.php?articleid=".$this->articleid)."'><img src='".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/friend.gif' alt='"._WFS_TELLAFRIEND."' /></a>";
            	$ratethisfile = "<a href='ratefile.php?lid=".$this->articleid."'>"._WFS_RATETHISFILE."</a>";
            	$catlink = "<a href='./index.php?category=".$this->categoryid()."'>"._WFS_BACK2CAT."</a><b> | </b><a href='./index.php'>"._WFS_RETURN2INDEX."</a>";
            	$rating = "<b>".sprintf(_WFS_RATINGA, number_format($this->rating, 2))."</b>";
				$votes = "<b>(".sprintf(_WFS_NUMVOTES, $this->votes).")</b>";
	        
			$fullcount = format_size(strlen($maintext)) ;
			
			if($this->ishtml == '1' && $this->htmlpage()) {
				$maintext = XOOPS_ROOT_PATH.'/'.$wfsConfig['htmlpath'].'/'.$this->htmlpage;
				$fullcount = prettysize(filesize($maintext));
			}
			
			echo "<table width='100%' border='0' cellspacing='1' cellpadding='2' class = 'outer'>";
  			echo "<tr class='bg3' >";
    		echo "<td ><span class='itemTitle' align = 'left'>".$title."</b>"; echo "".$adminlink."</span></td>";
  			echo "</tr>";
  			echo "<tr>";
    		echo "<td valign='top' class='head' colspan='2'>";
      		echo "<table width='100%' border='0' cellspacing='0' cellpadding='0'>";
        	echo "<tr><td width=84% class= 'itemPoster'  >";
			echo ""._WFS_AUTHER." $poster <br>";
			echo ""._WFS_PUBLISHEDHOME.": $datetime <br>";
			echo "".sprintf(_WFS_VIEWS, $counter)."<br>";
			echo "".sprintf(_WFS_ARTSIZE, $fullcount)."";
			echo "</td>";
			echo "<td width='16%' align='right' valign='middle'>$maillink</td>";
        	echo "</tr>";
      		echo "</table>";
    		echo "</td>";
  			echo "</tr>";
			echo "<tr><td>";
				if ($urllink) { 
					echo $urllink."<br />";
				} else {
			  		echo "&nbsp";
				}
			echo "</td></tr>";
			echo "<tr><td>";
				if($this->ishtml == '1' && $this->htmlpage()) {
					include($maintext);
            	} else {
					echo $maintext."</b>";
				}
			echo "</td></tr>";
			
			echo "<tr><td>";
				echo "&nbsp";
			echo "</td></tr>";
			echo "<tr><td>";
				if ($pagelink) echo $pagelink;
			echo "</td></tr>";
		  echo "</table>";

}

//Start of edit page for articles, more work needed I think!!!!
		function editform() {

		global $xoopsModule, $HTTP_SERVER_VARS, $HTTP_POST_VARS, $groupid, $myts, $xoopsConfig, $xoopsUser, $xoopsDB, $textareaname, $wfsConfig;

		include XOOPS_ROOT_PATH."/include/xoopscodes.php";
		$textareaname ='';
		//$maintext = '';

		echo "<table width='100%' border='0' cellspacing='0' cellpadding='1'>";
        echo "<table><tr><td><form action='index.php' method='post' name='coolsus'>";

		echo "<div><b>"._AM_GROUPPROMPT."</b><br />";

       		if(isset($this->groupid)) {
        		listGroups($this->groupid);
      		}else{
				listGroups();
       		}
			echo "<br />";
		   echo "</div><br />";
	
		echo "<div><b>"._WFS_CATEGORY."</b><br>";
        $xt = new WfsCategory();

		if(isset($this->categoryid)){
        	$xt->makeSelBox(0, $this->categoryid, "categoryid");
        }else{
            $xt->makeSelBox(0, 0, "categoryid");
        }

        echo "</div><br />";

		echo "<div><b>"._AM_ARTICLEWEIGHT."</b><br />";
        echo "<input type='text' name='weight' id='weight' value='";
		if(isset($this->weight)) {
			echo $this->weight("F");
 		} else {
			$this->weight = 0;
			echo $this->weight("F");
		}
		echo "' size='5' /></div><br>";
		
		echo "<div>"._WFS_CAUTH."<br></div>";
		echo "<div><select name='changeuser'>";
		echo "<option value='-1'>------</option>";
		$result = $xoopsDB->query("SELECT uid, uname FROM ".$xoopsDB->prefix("users")." ORDER BY uname");
		while(list($uid, $uname) = $xoopsDB->fetchRow($result)) {
			if ( $uid == $this->uid ) {
				$opt_selected = "selected='selected'";
			}else{
				$opt_selected = "";
			}
			echo "<option value='".$uid."' $opt_selected>".$uname."</option>";
		}
		echo "</select></div><br />";

		echo "<div><b>"._WFS_TITLE."</b><br />";
        echo "<input type='text' name='title' id='title' value='";
        if(isset($this->title)) {
        	if ($this->titleFlag) {
        		echo $this->title("F");
            } else {
                echo $this->title("E");
            }
        }
        echo "' size='50' /></div><br />";

        //HTML Page Seclection//

		echo "<div><b>"._WFS_HTMLPAGE."</b></div>";
		//echo " <b>HTML Path: </b>".$htmlpath."<br /><br /></div>";
		$html_array = XoopsLists::getFileListAsArray(XOOPS_ROOT_PATH.'/'.$wfsConfig['htmlpath']);

		echo "<div><select size='1' name='htmlpage'>";
		echo "<option value=' '>------</option>";
		foreach($html_array as $htmlpage){
			if ( $htmlpage == $this->htmlpage() ) {
				$opt_selected = "selected='selected'";
			}else{
				$opt_selected = "";
			}
 			echo "<option value='".$htmlpage."' $opt_selected>".$htmlpage."</option>";
		}
		 	echo "</select>";
		$htmlpath = XOOPS_ROOT_PATH.'/'.$wfsConfig['htmlpath'];
			
		
        echo " <b>HTML Path: </b>".$htmlpath."<br /><br /></div>";
		//echo "</div><br />";
		
		echo "<div><b>"._WFS_MAINTEXT."</b></div>";
		if (isset($this->maintext)) {
        	if ($this->maintextFlag) {
            	$GLOBALS['maintext'] = $this->maintext("F");
            } else {
                $GLOBALS['maintext'] = $this->maintext("E");
            }
         }
		if (!strstr($HTTP_SERVER_VARS["HTTP_USER_AGENT"], "MSIE")) $wfsConfig['wysiwygeditor'] = '0';

		if ($wfsConfig['wysiwygeditor'] == '1') {  
		html_editor('maintext');
		$smiliepath = $wfsConfig['smiliepath'];
        $smilie_array = XoopsLists::getimgListAsArray(XOOPS_ROOT_PATH."/".$smiliepath);

		echo "<br /><div style='text-align: left;'><b>" ._AM_SMILIE."</b><br />";
	    echo "<table><tr><td align='top' valign='left'>";
		echo "<div><script type='text/javascript'>
		<!--
			function showbutton() {
			   	document.all.".$textareaname."_mysmile.src = '".$xoopsConfig['xoops_url']."/$smiliepath/' + document.all.".$textareaname."_smiley.value;
			}
		// -->
		</script>";
		echo "<select name='".$textareaname."_smiley' onchange='showbutton();'>";
 		foreach($smilie_array as $file){
 			echo "<option value='".$file."' $opt_selected>".$file."</option>";
		}
		echo "</select></td><td align='top' valign='left'>";
		echo "<img name='".$textareaname."_mysmile' src='".$xoopsConfig['xoops_url']."/$smiliepath/$file' style='cursor:hand;' border='0' onclick=\"doFormat('InsertImage', document.all.".$textareaname."_mysmile.src);\" />";
		echo "</td></tr></table>
		<script type='text/javascript'>
			showbutton();
		</script>";

		//Start of article images
        $graphpath = $wfsConfig['graphicspath'];
		$graph_array =& XoopsLists::getImgListAsArray(XOOPS_ROOT_PATH."/".$graphpath);
		echo "<br><div style='text-align: left;'><b>" ._AM_GRAPHIC."</b><br />";
        echo "<table><tr><td align='top' valign='left'>";
		echo "<script type='text/javascript'>
		<!--
			function showbutton2() {
				document.all.".$textareaname."_mygraph.src = '".$xoopsConfig['xoops_url']."/$graphpath/' + document.all.".$textareaname."_graph.value;
			}
		// -->
		</script>";
		echo "<select name='".$textareaname."_graph' onchange='showbutton2();'>";
		foreach($graph_array as $file2){
 			echo "<option value='".$file2."' $opt_selected>".$file2."</option>";
		}
		echo "</select></td><td align='top' valign='left'>";
    	echo "<img name='".$textareaname."_mygraph' src='".$xoopsConfig['xoops_url']."/$graphpath/$file2' style='cursor:hand;' border='0' onclick=\"doFormat('InsertImage', document.all.".$textareaname."_mygraph.src);\" />";
		echo "</td></tr></table>
		<script type='text/javascript'>
			showbutton2();
		</script>";

		}else{
			xoopsCodeTarea("maintext", 60, 15);
            xoopsSmilies("maintext");
		}

        echo "<div><b>"._WFS_SUMMARY."</b></div>";
        echo "<div><textarea id='summary' name='summary' wrap='virtual' cols='60' rows='5'>";
        if(isset($this->summary)) {
        	if ($this->summaryFlag) {
            	echo $this->summary("F");
            } else {
            	echo $this->summary("E");
            }
        }
        echo "</textarea></div>";

		echo "<div class = 'bg3'><h4>"._WFS_ARTICLELINK."</h4></div>";
		echo "<div><b>"._WFS_LINKURL."</b><br />";
        echo "<input type='text' name='url' id='url' value='";
		if(isset($this->url)) echo $this->url("F");
        echo "' size='70' /></div><br />";

		echo "<div><b>"._WFS_LINKURLNAME."</b><br />";
        echo "<input type='text' name='urlname' id='urlname' value='";
		if(isset($this->urlname)) echo $this->urlname("F");
 		echo "' size='50' /></div><br>";

		echo "<div class = 'bg3'><h4>"._WFS_ATTACHEDFILES."</h4></div>";
		echo "<div>"._WFS_ATTACHEDFILESTXT."</div><br />";
        if (empty($this->articleid)) {
        	echo _WFS_AFTERREGED."<br />";
        } elseif ($num = $this->getFilesCount()) {

		echo "<table border='1' style='border-collapse: collapse' bordercolor='#ffffff' width='100%' >";
    	echo "<tr class='bg3'><td align='center'>"._AM_FILEID."</td><td align='center'>"._AM_FILEICON."</td><td align='center'>"._AM_FILESTORE."</td><td align='center'>"._AM_REALFILENAME."</td><td align='center'>"._AM_USERFILENAME."</td><td align='center' class='nw'>"._AM_FILEMIMETYPE."</td><td align='center' class='nw'>"._AM_FILESIZE."</td><td align='center'>"._AM_ACTION."</td></tr>";

		foreach($this->files as $attached) {
   			
			if (is_file(XOOPS_ROOT_PATH."/".$wfsConfig['filesbasepath']."/".$attached->getFileRealName())) {
				$filename = $attached->getFileRealName();
			} else {
				$filename = "File Error!";
			} 
			
			$fileid = $attached->getFileid();
			$mimetype = new mimetype();
			$icon = get_icon(XOOPS_ROOT_PATH."/".$wfsConfig['filesbasepath']."/".$filename);
			$iconshow = "<img src=".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/icon/".$icon." align='middle'>";
			if (is_file(XOOPS_ROOT_PATH."/".$wfsConfig['filesbasepath']."/".$filename)) {
				$size = Prettysize(filesize(XOOPS_ROOT_PATH."/".$wfsConfig['filesbasepath']."/".$filename));
			} else {
				$size = '0';
			}
			$filerealname = $attached->downloadname;
			$mimeshow = $mimetype->getType(XOOPS_ROOT_PATH."/".$wfsConfig['filesbasepath']."/".$filename);
			$counter = $attached->getCounter();
			$linkedname = $attached->getFileShowName();
			//$linkedname = $attached->getLinkedName(XOOPS_URL."/modules/".$xoopsModule->dirname()."/download.php?fileid=");

			$editlink = "<a href='index.php?op=fileedit&amp;fileid=".$fileid."'>"._AM_EDIT."</a>";
			$dellink = "<a href='index.php?op=delfile&amp;fileid=".$fileid."'>"._AM_DELETE."</a>";
			
			echo "<tr><td align='center'><b>".$fileid."</b>";
        	echo "</td><td align='center'>".$iconshow."";
        	echo "</td><td align='center'>".$filename."";
        	echo "</td><td align='center'>".$filerealname."";
        	echo "</td><td align='center'>".$linkedname."";
        	echo "</td><td align='center'>".$mimeshow."";
        	echo "</td><td align='center'>".$size."";
			//echo "</td><td align='center' class='nw'>".$counter."";
        	echo "</td><td align='center'>".$editlink." ".$dellink."";
       		echo "</td></tr>";
			}
			echo "</table>";

         } else {
            echo "<div align='left'>"._WFS_NOFILE."</div>";
       	 }
            echo "</div><br />";


		echo "<div class = 'bg3'><h4>"._WFS_MISCSETTINGS."</h4></div>";
		echo "<input type='checkbox' name='autodate' value='1'";
			if(isset($autodate) && $autodate==1){
			echo " checked='checked'";
			}
		echo "> ";

		$time = time();

		if (!empty($this->articleid)) {
			$isedit = 1;
		}
		if(isset($isedit) && $isedit==1 && $this->published > $time){
			echo "<b>"._AM_CHANGEDATETIME."</b><br /><br />";
			printf(_AM_NOWSETTIME,formatTimestamp($this->published));
			$published = xoops_getUserTimestamp($this->published);
			echo "<br /><br />";
			printf(_AM_CURRENTTIME,formatTimestamp($time));
			echo "<br />";
			echo "<input type='hidden' name='isedit' value='1' />";
		}else{
			echo "<b>"._AM_SETDATETIME."</b><br /><br />";
			printf(_AM_CURRENTTIME,formatTimestamp($time));
			echo "<br />";
		}

		echo "<br /> &nbsp; "._AM_MONTHC." <select name='automonth'>";
		if (isset($automonth)) {
			$automonth = intval($automonth);
		} elseif (isset($this->published)) {
			$automonth = date('m', $this->published);
		} else {
			$automonth = date('m');
		}
		for ($xmonth=1; $xmonth<13; $xmonth++) {
		if ($xmonth == $automonth) {
			$sel = 'selected="selected"';
		} else {
			$sel = '';
		}
			echo "<option value='$xmonth' $sel>$xmonth</option>";
		}
		echo "</select>&nbsp;";

		echo _AM_DAYC." <select name='autoday'>";
		if (isset($autoday)) {
			$autoday = intval($autoday);
		} elseif (isset($published)) {
			$autoday = date('d', $this->published);
		} else {
			$autoday = date('d');
		}

		for ($xday=1; $xday<32; $xday++) {
			if ($xday == $autoday) {
			$sel = 'selected="selected"';
		} else {
			$sel = '';
		}
		echo "<option value='$xday' $sel>$xday</option>";
		}
		echo "</select>&nbsp;";

		echo _AM_YEARC." <select name='autoyear'>";
		if (isset($autoyear)) {
			$autoyear = intval($autoyear);
		} elseif (isset($this->published)) {
			$autoyear = date('Y', $this->published);
		} else {
			$autoyear = date('Y');
		}

		$cyear    = date('Y');
		for ($xyear=($autoyear-8); $xyear < ($cyear+2); $xyear++) {
		if ($xyear == $autoyear) {
			$sel = 'selected="selected"';
		} else {
			$sel = '';
		}
			echo "<option value='$xyear' $sel>$xyear</option>";
		}
		echo "</select>";

		echo "&nbsp;"._AM_TIMEC." <select name='autohour'>";
		if (isset($autohour)) {
			$autohour = intval($autohour);
		} elseif (isset($this->publishedshed)) {
			$autohour = date('H', $this->published);
		} else {
			$autohour = date('H');
		}

		for ($xhour=0; $xhour<24; $xhour++) {
			if ($xhour == $autohour) {
			$sel = 'selected="selected"';
		} else {
			$sel = '';
		}
			echo "<option value='$xhour' $sel>$xhour</option>";
		}
		echo "</select>";

		echo " : <select name='automin'>";
		if (isset($automin)) {
			$automin = intval($automin);
		} elseif (isset($published)) {
			$automin = date('i', $published);
		} else {
			$automin = date('i');
		}

		for ($xmin=0; $xmin<61; $xmin++) {
			if ($xmin == $automin) {
			$sel = 'selected="selected"';
		} else {
			$sel = '';
		}
		$xxmin = $xmin;
			if ($xxmin < 10) {
			$xxmin = "$xmin";
		}
			echo "<option value='$xmin' $sel>$xxmin</option>";
		}
		echo "</select></br />";

		echo "<br /><input type='checkbox' name='autoexpdate' value='1'";
		if(isset($autoexpdate) && $autoexpdate==1){
			echo " checked='checked'";
		}
		echo "> ";
		$time = time();
		if(isset($isedit) && $isedit == 1 && $this->expired > 0){
			echo "<b>"._AM_CHANGEEXPDATETIME."</b><br /><br />";
			printf(_AM_NOWSETEXPTIME,formatTimestamp($this->expired));
			echo "<br /><br />";
			$expired = xoops_getUserTimestamp($this->expired);
			printf(_AM_CURRENTTIME,formatTimestamp($time));
			echo "<br />";
			echo "<input type='hidden' name='isedit' value='1' />";
		}else{
			echo "<b>"._AM_SETEXPDATETIME."</b><br /><br />";
			printf(_AM_CURRENTTIME,formatTimestamp($time));
			echo "<br />";
		}

		echo "<br /> &nbsp; "._AM_MONTHC." <select name='autoexpmonth'>";
		if (isset($autoexpmonth)) {
			$autoexpmonth = intval($autoexpmonth);
		} elseif (isset($expired)) {
			$autoexpmonth = date('m', $expired);
		} else {
			$autoexpmonth = date('m');
			$autoexpmonth = $autoexpmonth + 1;
		}
		for ($xmonth=1; $xmonth<13; $xmonth++) {
			if ($xmonth == $autoexpmonth) {
			$sel = 'selected="selected"';
			} else {
			$sel = '';
		}
			echo "<option value='$xmonth' $sel>$xmonth</option>";
		}
		echo "</select>&nbsp;";

		echo _AM_DAYC." <select name='autoexpday'>";
		if (isset($autoexpday)) {
			$autoexpday = intval($autoexpday);
		} elseif (isset($expired)) {
			$autoexpday = date('d', $expired);
		} else {
			$autoexpday = date('d');
		}

		for ($xday=1; $xday<32; $xday++) {
			if ($xday == $autoexpday) {
			$sel = 'selected="selected"';
		} else {
			$sel = '';
		}
		echo "<option value='$xday' $sel>$xday</option>";
		}
		echo "</select>&nbsp;";

		echo _AM_YEARC." <select name='autoexpyear'>";
		if (isset($autoexpyear)) {
			$autoyear = intval($autoexpyear);
		} elseif (isset($expired)) {
			$autoexpyear = date('Y', $expired);
		} else {
			$autoexpyear = date('Y');
		}

		$cyear = date('Y');
		for ($xyear=($autoexpyear-8); $xyear < ($cyear+2); $xyear++) {
			if ($xyear == $autoexpyear) {
			$sel = 'selected="selected"';
		} else {
			$sel = '';
		}
			echo "<option value='$xyear' $sel>$xyear</option>";
		}
		echo "</select>";

		echo "&nbsp;"._AM_TIMEC." <select name='autoexphour'>";
		if (isset($autoexphour)) {
			$autoexphour = intval($autoexphour);
		} elseif (isset($expired)) {
			$autoexphour = date('H', $expired);
		} else {
			$autoexphour = date('H');
		}

		for ($xhour=0; $xhour<24; $xhour++) {
			if ($xhour == $autoexphour) {
			$sel = 'selected="selected"';
		} else {
			$sel = '';
		}
			echo "<option value='$xhour' $sel>$xhour</option>";
		}
		echo "</select>";

		echo " : <select name='autoexpmin'>";
		if (isset($autoexpmin)) {
			$autoexpmin = intval($autoexpmin);
		} elseif (isset($expired)) {
			$autoexpmin = date('i', $expired);
		} else {
			$autoexpmin = date('i');
		}

		for ($xmin=0; $xmin<61; $xmin++) {
			if ($xmin == $autoexpmin) {
			$sel = 'selected="selected"';
		} else {
			$sel = '';
		}
		$xxmin = $xmin;
		if ($xxmin < 10) {
			$xxmin = "0$xmin";
		}
		echo "<option value='$xmin' $sel>$xxmin</option>";
		}
		echo "</select><br /><br />";

		if(isset($this->published) && $this->published == 0 && isset($this->type) && $this->type == "user") {
			echo "<div><input type='checkbox' name='approved' value='1' checked='checked'>&nbsp;<b>"._AM_APPROVE."</b></div><br />";
		}
				
		echo "<br /><div><input type='checkbox' name='nosmiley' value='1'";
       		if(isset($this->nosmiley) && $this->nosmiley==1){
       		 	echo " checked='checked'";
        }
		echo " /> <b>"._WFS_DISAMILEY."</b></div>";

        echo "<div><input type='checkbox' name='nohtml' value='1'";
			if(isset($this->nohtml) && $this->nohtml==1){
        		echo " checked='checked'";
        }
        echo " /> <b>"._WFS_DISHTML."</b><br />";
        echo "</div><br />";
				
		if(isset($isedit) && $isedit==1){
		echo "<input type='checkbox' name='movetotop' value='1'";
		if(isset($movetotop) && $movetotop==1){
			echo " checked='checked'";
		}
		echo " />&nbsp;<b>"._AM_MOVETOTOP."</b><br />";
		
		}
		
		echo "<br /><div><input type='checkbox' name='justhtml' value='2'";
			if(isset($this->htmlpage) && $this->ishtml == '2'){
			echo " checked='checked'";
			}
        echo " />"._AM_JUSTHTML."<br /></div>";
		
		echo "<div><input type='checkbox' name='noshowart' value='1'";
			if(isset($this->noshowart) && $this->noshowart == 1){
        		echo " checked='checked'";
        }
        echo " /> "._AM_NOSHOART."<br />";
        echo "</div><br />";
		       	
		echo "<input type='checkbox' name='offline' value='1'";
			if(isset($this->offline) && $this->offline==1){
			echo " checked='checked'";
			}
        echo " />&nbsp;"._AM_OFFLINE."<br />";
        echo "<br />";
		
		       
		if(!empty($this->articleid)){
            	echo "<input type='hidden' name='articleid' value='".$this->articleid."' />\n";
            }

            if(!empty($HTTP_POST_VARS['referer'])){
                echo "<input type='hidden' name='referer' value='".$HTTP_POST_VARS['referer']."' />\n";
            }
            elseif(!empty($HTTP_SERVER_VARS['HTTP_REFERER'])){
                echo "<input type='hidden' name='referer' value='".$HTTP_SERVER_VARS['HTTP_REFERER']."' />\n";
            }

            echo "<input type='submit' name='op' class='formButton' value='Preview' />&nbsp;<input type='submit' name='op' class='formButton' value='Save' />&nbsp;<input type='submit' name='op' class='formButton' value='Clean' />";
			
            echo "</form>";
            echo "</td></tr></table>";

			if (!empty($this->articleid)) {

            echo "<hr />";

            	$upload = new UploadFile();
            	echo $upload->formStart("index.php?op=fileup");
            	echo "<h4>"._WFS_FILEUPLOAD."</h4>\n";
            		echo ""._WFS_ATTACHFILEACCESS."<br />";
					echo "<br /><b>"._WFS_ATTACHFILE."</b><br />";
					echo $upload->formMax();
            		echo $upload->formField();
					
					echo "<br /><br /><b>"._WFS_FILESHOWNAME."</b><br />";
            		echo "<input type='text' name='fileshowname' id='fileshowname' value='";
						if(isset($this->fileshowname)) echo $this->fileshowname;
               		echo "' size='70' maxlength='80' /><br />";
					
					echo "<br /><b>"._WFS_FILEDESCRIPT."</b><br />";
					echo "<textarea name='textfiledescript' cols='50' rows='5'></textarea><br />";
					
					echo "<br /><b>"._WFS_FILETEXT."</b><br />";
					echo "<textarea name='textfilesearch' cols='50' rows='3'></textarea><br />";
					echo "<input type='hidden' name='groupid' value='".$this->groupip."' />";
					echo "<input type='hidden' name='articleid' value='".$this->articleid."' />";
					echo "<input type='hidden' name='groupid' value= '".$this->groupid."' />";
					echo $upload->formSubmit(_WFS_UPLOAD);
                	echo $upload->formEnd();
         		}

		}

		function loadPostVars() {

                global $HTTP_POST_VARS, $myts, $xoopsUser, $xoopsConfig;
				
                $this->groupid = saveAccess($HTTP_POST_VARS['groupid']);
				$this->setTitle($HTTP_POST_VARS['title']);
                $this->setMainText($HTTP_POST_VARS['maintext']);
                $this->setCategoryid($HTTP_POST_VARS['categoryid']);
				$htmlpage = $myts->stripSlashesGPC($HTTP_POST_VARS['htmlpage']);
				$this->setChangeuser($HTTP_POST_VARS['changeuser']);
                $this->setHtmlpage($HTTP_POST_VARS['htmlpage']);
				$this->setWeight($HTTP_POST_VARS['weight']);
							
				if ( !empty($HTTP_POST_VARS['autodate']) ) {
					$pubdate = mktime($HTTP_POST_VARS['autohour'],$HTTP_POST_VARS['automin'] , 0, $HTTP_POST_VARS['automonth'], $HTTP_POST_VARS['autoday'], $HTTP_POST_VARS['autoyear']);
					$offset = $xoopsUser->timezone() - $xoopsConfig['server_TZ'];
					$pubdate = $pubdate - ($offset * 3600);
					$this->setPublished($pubdate);
				}

				if ( !empty($HTTP_POST_VARS['autoexpdate']) ) {
					$expdate = mktime($HTTP_POST_VARS['autoexphour'], $HTTP_POST_VARS['autoexpmin'], 0, $HTTP_POST_VARS['autoexpmonth'], $HTTP_POST_VARS['autoexpday'], $HTTP_POST_VARS['autoexpyear']);
					$offset = $xoopsUser->timezone() - $xoopsConfig['server_TZ'];
					$expdate = $expdate - ($offset * 3600);
					$this->setExpired($expdate);
				} else {
				  $this->setExpired(0);
				}
				
				if ( !empty($HTTP_POST_VARS['movetotop']) ) {
					$this->setPublished(time());
				}
				
				$this->noshowart = ( isset($HTTP_POST_VARS['noshowart']))		? 1 : 0;
				$this->nohtml = ( isset($HTTP_POST_VARS['nohtml']))		? 1 : 0;
				$this->nosmiley = ( isset($HTTP_POST_VAR['nosmiley']))		? 1 : 0;
				$this->approved = ( isset($HTTP_POST_VARS['approved']))		? 1 : 0;
				$this->offline = ( isset($HTTP_POST_VARS['offline']))		? 1 : 0;
				$this->notifypub = ( isset($HTTP_POST_VARS['notifypub']))		? 1 : 0;
				$this->ishtml = ( isset($HTTP_POST_VARS['htmlpage']) && $HTTP_POST_VARS['htmlpage'] != ' ' )  ? 1 : 0;
				
				if ( $HTTP_POST_VARS['justhtml'] == 2 ) {
					$this->ishtml = 2;
				}
				if ( isset($HTTP_POST_VARS['summary']))
                        $this->setSummary($HTTP_POST_VARS['summary']);

				if ( isset($HTTP_POST_VARS['url']))
                        $this->setUrl($HTTP_POST_VARS['url']);

				if ( isset($HTTP_POST_VARS['urlname']))
                        $this->setUrlname($HTTP_POST_VARS['urlname']);

				if ( isset($HTTP_POST_VARS['page']))
                        $this->setPage($HTTP_POST_VARS['page']);
        }
}

?>
