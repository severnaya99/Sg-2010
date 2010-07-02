<?php
// Class for Category management for WfSection
// $Id: wfscategory.php,v 1.4 Date: 06/01/2003, Author: Catzwolf Exp $

include_once(XOOPS_ROOT_PATH."/class/xoopstree.php");
include_once(XOOPS_ROOT_PATH."/modules/wfsection/include/functions.php");
include_once XOOPS_ROOT_PATH . '/modules/wfsection/class/wfstree.php';

class WfsCategory{

    var $db;
	var $table;
	var $id;
	var $pid;
	var $title;
	var $imgurl;
	var $displayimg;
	var $description;
	var $catdescription;
    var $catfooter;
	var $articles;
	var $newest_time;
	var $newest_uid;
    var $groupid;
	var $editaccess;
	var $orders;
// constructor

	function WfsCategory($catid=0){
		$this->db =& Database::getInstance();
        $this->table = $this->db->prefix("wfs_category");

		if ( is_array($catid) ) {
			$this->makeCategory($catid);
		} elseif ( $catid != 0 ) {
			$this->loadCategory($catid);
		} else {
			$this->id = $catid;
		}
	}

// set

	function setTitle($value){
		$this->title = $value;
	}

	function setImgurl($value){
		$this->imgurl = $value;
	}
	
	function setDisplayimg($value){
		$this->displayimg = $value;
	}
	
	function setDescription($description){
		$this->description = $description;
	}

	function setcatdescription($catdescription){
		$this->catdescription = $catdescription;
	}

	function setcatfooter($catfooter){
		$this->catfooter = $catfooter;
	}
    function setPid($value){
        $this->pid = $value;
    }
	
	function setOrders($value){
        $this->orders = $value;
    }
	
	function setgroupid($value){
		$this->groupid = saveaccess($value);
	}
	
	function seteditaccess($value){
		$this->editaccess = saveaccess($value);
	}
// database

	function loadCategory($id){
		$sql = "SELECT * FROM ".$this->table." WHERE id=".$id."";
		$array = $this->db->fetchArray($this->db->query($sql));
		$this->makeCategory($array);
	}

	function makeCategory($array){
		foreach($array as $key=>$value){
			$this->$key = $value;
		}
	}

	function store(){
		global $myts;

        $myts =& MyTextSanitizer::getInstance();
        $title = "";
		$imgurl = "";
		$description = "";
        $catdescription = "";
        $catfooter = "";

		if ( isset($this->title) && $this->title != "" ) {
			$title = $myts->makeTboxData4Save($this->title);
		}
        if ( isset($this->imgurl) && $this->imgurl != "" ) {
			$imgurl = $myts->makeTboxData4Save($this->imgurl);
		}
		
		if ( isset($this->displayimg) && $this->displayimg != "" ) {
			$displayimg = $myts->makeTboxData4Save($this->displayimg);
		}
		
        if ( isset($this->description) && $this->description != "" ) {
        	$description = $myts->makeTareaData4Save($this->description);
        }

		if ( isset($this->catdescription) && $this->catdescription != "" ) {
        	$catdescription = $myts->makeTareaData4Save($this->catdescription);
        }

        if ( isset($this->catfooter) && $this->catfooter != "" ) {
            $catfooter = $myts->makeTareaData4Save($this->catfooter);
        }

 		if ( !isset($this->pid) || !is_numeric($this->pid) ) {
			$this->pid = 0;
		}

		if ( empty($this->id) ) {
			$this->id = $this->db->genId($this->table."_id_seq");
			$sql = "INSERT INTO ".$this->table." (id, pid, imgurl, displayimg, title, description, catdescription, groupid, catfooter, orders, editaccess) VALUES (".$this->id.", ".$this->pid.", '".$imgurl."', ".$displayimg.", '".$title."', '".$description."', '".$catdescription."','".$this->groupid."', '".$catfooter."', ".$this->orders.",'".$this->editaccess."')";
		} else {
			$sql = "UPDATE ".$this->table." SET pid=".$this->pid.", imgurl='".$imgurl."', displayimg=".$displayimg.", title='".$title."', description='".$description."', catdescription='".$catdescription."', groupid='".$this->groupid."', catfooter='".$catfooter."', orders='".$this->orders."', editaccess='".$this->editaccess."' WHERE id=".$this->id." ";
		}

		if ( !$result = $this->db->query($sql) ) {
			ErrorHandler::show('0022');
		}
		return true;
	}

		function delete(){
			$sql = "DELETE FROM ".$this->table." WHERE id=".$this->id."";
			$this->db->query($sql);
		}

		// get

		function id(){
			return $this->id;
		}

		function pid(){
			return $this->pid;
		}

		function title($format="S"){
	        if (!isset($this->title)) return "";
				$myts =& MyTextSanitizer::getInstance();
				switch($format){
				case "S":
					$title = $myts->makeTboxData4Show($this->title);
					break;
				case "E":
					$title = $myts->makeTboxData4Edit($this->title);
					break;
				case "P":
					$title = $myts->makeTboxData4Preview($this->title);
					break;
				case "F":
					$title = $myts->makeTboxData4PreviewInForm($this->title);
					break;
			}
		return $title;
		}

		function imgurl($format="S"){
			$myts =& MyTextSanitizer::getInstance();
			switch($format){
				case "S":
					$imgurl= $myts->makeTboxData4Show($this->imgurl);
					break;
				case "E":
					$imgurl = $myts->makeTboxData4Edit($this->imgurl);
					break;
				case "P":
					$imgurl = $myts->makeTboxData4Preview($this->imgurl);
					break;
				case "F":
					$imgurl = $myts->makeTboxData4PreviewInForm($this->imgurl);
					break;
			}
			return $imgurl;
		}

        function description($format="S"){
        	if (!isset($this->description)) return "";
            $html = 1;
	        $smiley = 1;
            $xcodes = 1;
			
			$myts =& MyTextSanitizer::getInstance();
            switch($format){
            	case "S":
                $description= $myts->makeTareaData4Show($this->description,$html,$smiley,$xcodes);
                break;
                case "E":
                $description = $myts->makeTareaData4Edit($this->description);
                break;
                case "P":
                $description = $myts->makeTareaData4Preview($this->description,$html,$smiley,$xcodes);
                break;
                case "F":
                $description = $myts->makeTareaData4PreviewInForm($this->description);
                break;
            }
            return $description;
        }

	 	function catdescription($format="S"){
        	if (!isset($this->catdescription)) return "";
            $html = 1;
	        $smiley = 1;
            $xcodes = 1;
     			
			$myts =& MyTextSanitizer::getInstance();
            
			switch($format){
            	case "S":
                	$catdescription= $myts->makeTareaData4Show($this->catdescription,$html,$smiley,$xcodes);
                	break;
                case "E":
	                $catdescription = $myts->makeTareaData4Edit($this->catdescription);
                	break;
                case "P":
                	$catdescription = $myts->makeTareaData4Preview($this->catdescription, $html,$smiley,$xcodes);
                	break;
                case "F":
                	$catdecription = $myts->makeTareaData4PreviewInForm($this->catdescription);
                	break;
        		}
            return $catdescription;
        }

		function catfooter($format="S"){
        	if (!isset($this->catfooter)) return "";
            $html = 1;
	        $smiley = 1;
            $xcodes = 1;
			$myts =& MyTextSanitizer::getInstance();
            switch($format){
            	case "S":
                	$catfooter= $myts->makeTareaData4Show($this->catfooter, $html,$smiley,$xcodes);
                	break;
                case "E":
                    $catfooter = $myts->makeTareaData4Edit($this->catfooter);
                    break;
                case "P":
                    $catfooter = $myts->makeTareaData4Preview($this->catfooter,$html,$smiley,$xcodes);
                    break;
                case "F":
                	$catfooter = $myts->makeTareaData4PreviewInForm($this->catfooter);
                    break;
        	}
            return $catfooter;
        }
	function orders(){
			return $this->orders;
		}
	
	function getFirstChild(){
		$ret = array();
		$xt = new XoopsTree($this->table, "id", "pid");
		$category_arr = $xt->getFirstChild($this->id, 'orders');
		if ( is_array($category_arr) && count($category_arr) ) {
			foreach($category_arr as $category){
				$ret[] = new WfsCategory($category);
			}
		}
		return $ret;
	}

	function getAllChild(){
		$ret = array();
		$xt = new XoopsTree($this->table, "id", "pid");
		$category_arr = $xt->getAllChild($this->id, orders);
		if ( is_array($category_arr) && count($category_arr) ) {
			foreach($category_arr as $category){
				$ret[] = new WfsCategory($category);
			}
		}
		return $ret;
	}

	function getChildTreeArray(){
		$ret = array();
		$xt = new XoopsTree($this->table, "id", "pid");
		$category_arr = $xt->getChildTreeArray($this->id, "orders");
		if ( is_array($category_arr) && count($category_arr) ) {
			foreach($category_arr as $category){
				$ret[] = new WfsCategory($category);
			}
		}
		return $ret;
	}

        function getAllChildId($sel_id=0,$order="",$parray = array()) {
                //$db =& Database::getInstance();
                $sql = "SELECT id FROM ".$this->table." WHERE pid=".$sel_id."";
                if ( $order != "" ) {
                        $sql .= " ORDER BY $order";
                }
                $result = $this->db->query($sql);
                $count = $this->db->getRowsNum($result);
                if ( $count == 0 ) {
                        return $parray;
                }
                while ( $row = $this->db->fetchArray($result) ) {
                        array_push($parray, $row['id']);
                        $parray=$this->getAllChildId($row['id'],$order,$parray);
                }
                return $parray;
        }

        function isInChild($sel_id) {
                if (empty($this->id)) return false;
                if ($sel_id == $this->id) return true;
                $child = $this->getAllChildId();
                if (in_array($sel_id, $child)) return true;
                return false;
        }

// public - WfsCategory::* style

        function countByArticle($articleid=0){
                $db =& Database::getInstance();
                $sql = "SELECT COUNT(*) FROM ".$db->prefix("wfs_category")."";
                if ( $articleid != 0 ) {
                        $sql .= " WHERE articleid=$articleid";
                }
                $result = $db->query($sql);
                list($count) = $db->fetchRow($result);
                return $count;
        }


// HTML output

	function makeSelBox($none=0, $selcategory=-1, $selname="", $onchange=""){
		$xt = new wfsTree($this->table, "id", "pid");
		if ( $selcategory != -1 ) {
			$xt->makeMySelBox("title", "title", $selcategory, $none, $selname, $onchange);
		} elseif ( !empty($this->id) ) {
			$xt->makeMySelBox("title", "title", $this->id, $none, $selname, $onchange);
		} else {
			$xt->makeMySelBox("title", "title", 0, $none, $selname, $onchange);
		}
	}

// HTML string

	//generates nicely formatted linked path from the root id to a given id
	function getNicePathFromId($funcURL){
		$xt = new XoopsTree($this->table, "id", "pid");
		$ret = $xt->getNicePathFromId($this->id, "title", $funcURL);
		return $ret;
	}


	function getNicePathToPid($funcURL) {
	        if ( $this->pid() != 0) {
        	        $xt = new WfsCategory($this->pid());
        	        $ret = $xt->getNicePathToPid($funcURL).
        	                " >> <a href='".$funcURL.$this->pid()."'>".$xt->title()."</a>";
        	        return $ret;
        	} else  {
        	        return "";
        	}
	}

	function imgLink(){
                global $xoopsModule;

                $ret = "<a href='".XOOPS_URL."/modules/".$xoopsModule->dirname()."/index.php?category=".$this->id()."'>".
                "<img src='".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/topics/".$this->imgurl().
                "' alt='".$this->title()."' /></a>";
				return $ret;
        }

        function textLink(){
                global $xoopsModule;

                $ret = "<a href='".XOOPS_URL."/modules/".$xoopsModule->dirname().
                "/index.php?category=".$this->id()."'>".
                $this->title()."</a>";
                return $ret;
        }
}
?>
