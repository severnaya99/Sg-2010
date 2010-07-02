<?php
// $Id: xfblock_wfstree.php,v 1.1 2005/06/24 09:20:07 ohwada Exp $

// 2005-06-20 K.OHWADA
// xfs -> xfblock

// 2004/07/01 K.OHWADA
// this file is same as wfstree.php
// change class name WfsTree to xfs_WfsTree
// change function name checkAccess to xfs_checkAccess
// for avoiding to collide with WFsection.
// block function read twice wfstree.php

// 2004/04/04 K.OHWADA
// getNicePathFromId
//   & -> &amp;

// 2004/01/29 herve 
// bug?  an unnecessary code
//   $string

// 2003/10/11 K.OHWADA
// easy to rename module and table
//   change function makeMyRootedSelBox
// multiple install of same module
// bug? I feel this line is meaningless.
//   $xoopsModule

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
// Author: Kazumi Ono (AKA onokazu)                                          //
// URL: http://www.myweb.ne.jp/, http://www.xoops.org/, http://jp.xoops.org/ //
// Project: The XOOPS Project                                                //
// ------------------------------------------------------------------------- //

// multiple install of same module
//if ( !defined("_WFS_WFSTREE_PHP") ) { define("_WFS_WFSTREE_PHP",1); }

// change class name WfsTree to xfs_WfsTree

// xfs -> xfblock
//class xfs_WfsTree
class xfblock_WfsTree

{
	var $table;     //table with parent-child structure
	var $id;    //name of unique id for records in table $table
	var $pid;     // name of parent id used in table $table
	var $order;    //specifies the order of query results
	var $title;     // name of a field in table $table which will be used when  selection box and paths are generated
	var $db;

// change class name WfsTree to xfs_WfsTree
	//constructor of class XoopsTree
	//sets the names of table, unique id, and parend id

// xfs -> xfblock
//	function xfs_WfsTree($table_name, $id_name, $pid_name)
	function xfblock_WfsTree($table_name, $id_name, $pid_name)

	{
		$this->db =& Database::getInstance();
		$this->table = $table_name;
		$this->id = $id_name;
		$this->pid = $pid_name;
	}


	// returns an array of first child objects for a given id($sel_id)
	function getFirstChild($sel_id, $order="")
	{
		$arr =array();
		$sql = "SELECT * FROM ".$this->table." WHERE ".$this->pid."=".$sel_id."";
		if ( $order != "" ) {
			$sql .= " ORDER BY $order";
		}
		$result = $this->db->query($sql);
		$count = $this->db->getRowsNum($result);
		if ( $count==0 ) {
			return $arr;
		}
		while ( $myrow=$this->db->fetchArray($result) ) {
			array_push($arr, $myrow);
		}
		return $arr;
	}

	// returns an array of all FIRST child ids of a given id($sel_id)
	function getFirstChildId($sel_id)
	{
		$idarray =array();
		$result = $this->db->query("SELECT ".$this->id." FROM ".$this->table." WHERE ".$this->pid."=".$sel_id."");
		$count = $this->db->getRowsNum($result);
		if ( $count == 0 ) {
			return $idarray;
		}
		while ( list($id) = $this->db->fetchRow($result) ) {
			array_push($idarray, $id);
		}
		return $idarray;
	}

	//returns an array of ALL child ids for a given id($sel_id)
	function getAllChildId($sel_id, $order="", $idarray = array())
	{
		$sql = "SELECT ".$this->id." FROM ".$this->table." WHERE ".$this->pid."=".$sel_id."";
		if ( $order != "" ) {
			$sql .= " ORDER BY $order";
		}
		$result=$this->db->query($sql);
		$count = $this->db->getRowsNum($result);
		if ( $count==0 ) {
			return $idarray;
		}
		while ( list($r_id) = $this->db->fetchRow($result) ) {
			array_push($idarray, $r_id);
			$idarray = $this->getAllChildId($r_id,$order,$idarray);
		}
		return $idarray;
	}

	//returns an array of ALL parent ids for a given id($sel_id)
	function getAllParentId($sel_id, $order="", $idarray = array())
	{
		$sql = "SELECT ".$this->pid." FROM ".$this->table." WHERE ".$this->id."=".$sel_id."";
		if ( $order != "" ) {
			$sql .= " ORDER BY $order";
		}
		$result=$this->db->query($sql);
		list($r_id) = $this->db->fetchRow($result);
		if ( $r_id == 0 ) {
			return $idarray;
		}
		array_push($idarray, $r_id);
		$idarray = $this->getAllParentId($r_id,$order,$idarray);
		return $idarray;
	}

	//generates path from the root id to a given id($sel_id)
	// the path is delimetered with "/"
	function getPathFromId($sel_id, $title, $path="")
	{
		$result = $this->db->query("SELECT ".$this->pid.", ".$title." FROM ".$this->table." WHERE ".$this->id."=$sel_id");
		if ( $this->db->getRowsNum($result) == 0 ) {
			return $path;
		}
		list($parentid,$name) = $this->db->fetchRow($result);
		$myts =& MyTextSanitizer::getInstance();
		$name = $myts->makeTboxData4Show($name);
		$path = "/".$name.$path."";
		if ( $parentid == 0 ) {
			return $path;
		}
		$path = $this->getPathFromId($parentid, $title, $path);
		return $path;
	}

	//makes a nicely ordered selection box
	//$preset_id is used to specify a preselected item
	//set $none to 1 to add a option with value 0
	
	/**
 	* Outputs an html selectbox 
 	*
 	* Outputs an html selectbox containing the whole tree ($root=0) or a specified sub-tree.
 	* If $recurse is false, the box will only contain direct children of the specified <i>$root</i>.
	 *
 	* @param string  $title Database field to use for elements title
 	* @param string  $order Database field to use for ordering elements
 	* @param integer $root Element to use as root (0 for all the tree)
 	* @param boolean $recurse
 	* @param integer $preset_id Originally selected element
 	* @param boolean $showroot Show root element as first one
 	* @param string  $sel_name HTML select element name
 	* @param string  $onchange Value of HTML onchange attribute
 	* @author Kazumi Ono
 	* @author Catzwolf
 	* @author Skalpa Keo
 	*/
	

	function makeMyRootedSelBox($title, $order="", $root=0, $recurse=false, $preset_id=0, $showroot=0, $sel_name="", $onchange="") {
		global $xoopsUser, $xoopsModule;

		$admincheck = true;
		
		if (empty($sel_name)) {
			$sel_name = $this->id;
		}
		
		$myts =& MyTextSanitizer::getInstance();
		echo "<select name='".$sel_name."'";
		
		if ( $onchange != "" ) {
			echo ' onchange="' . $onchange . '"';
		}
		echo ">\n";
		
		// Get root category name and check for access
		if ($root == 0) {
			$roottitle  = '-----------';
			$rootaccess = 1;
		} else {
			$rootres = $this->db->query("SELECT $title, groupid, editaccess FROM {$this->table} WHERE {$this->id}=$root");
			if (list($roottitle, $rootaccess) = $this->db->fetchRow($rootres)) {

// change function name checkAccess to xfs_checkAccess
//				$rootaccess = checkAccess($rootaccess);

// xfs -> xfblock
//				$rootaccess = xfs_checkAccess($rootaccess);
				$rootaccess = xfblock_checkAccess($rootaccess);

		} else {
				$rootaccess = 0;
			}
		}
		
		if ($rootaccess) {
			if ($showroot) {
				echo "<option value='$root'>$roottitle</option>\n";
			}

// bug? I feel this line is meaningless.
//			$xoopsModule = XoopsModule::getByDirname("wfsection");

			$sql = "SELECT {$this->id}, $title, groupid, editaccess  FROM {$this->table} WHERE {$this->pid}=$root";
			if ( $order != "" ) {
				$sql .= " ORDER BY $order";
			}
			$result = $this->db->query($sql);
			
			while ( list($catid, $name, $groupid, $editaccess) = $this->db->fetchRow($result) ) {

// bug?  an unnecessary code
//			echo $string;

// change function name checkAccess to xfs_checkAccess
//			if (checkAccess($groupid)) {

// xfs -> xfblock
//			if (xfs_checkAccess($groupid)) {
			if (xfblock_checkAccess($groupid)) {

				$sel = ($catid == $preset_id) ? " selected='selected'" : "";
				if (($root != 0) && $showroot) {
					$name = "--&nbsp;$name";
				}
				echo "<option value='$catid'$sel>$name</option>\n";
				
				if ($recurse) {
					$arr = $this->getChildTreeArray($catid, $order);
					foreach ( $arr as $option ) {
						$option['prefix'] = str_replace(".","--",$option['prefix']);
						$catpath = $option['prefix']."&nbsp;".$myts->makeTboxData4Show($option[$title]);
						if (($root != 0) && $showroot) {
							$catpath = "--$catpath";
						}
						$sel = ($option[$this->id] == $preset_id) ? " selected='selected'" : "";
						echo "<option value='{$option[$this->id]}'$sel>$catpath</option>\n";
					}
				}
			}
			}
		}
		echo "</select>\n";	
	}


	function makeMySelBox($title, $order="", $preset_id=0, $none=0, $sel_name="", $onchange="") {
		return $this->makeMyRootedSelBox($title, $order, 0, true, $preset_id, $none, $sel_name, $onchange);
	}

	//generates nicely formatted linked path from the root id to a given id
	function getNicePathFromId($sel_id, $title, $funcURL, $path="")
	{
		$sql = "SELECT ".$this->pid.", ".$title." FROM ".$this->table." WHERE ".$this->id."=$sel_id";
		$result = $this->db->query($sql);
		if ( $this->db->getRowsNum($result) == 0 ) {
			return $path;
		}
		list($parentid,$name) = $this->db->fetchRow($result);
		$myts =& MyTextSanitizer::getInstance();
		$name = $myts->makeTboxData4Show($name);

// & -> &amp;
//		$path = "<a href='".$funcURL."&".$this->id."=".$sel_id."'>".$name."</a>&nbsp;:&nbsp;".$path."";
		$path = "<a href='".$funcURL."&amp;".$this->id."=".$sel_id."'>".$name."</a>&nbsp;:&nbsp;".$path."";

		if ( $parentid == 0 ) {
			return $path;
		}
		$path = $this->getNicePathFromId($parentid, $title, $funcURL, $path);
		return $path;
	}

	//generates id path from the root id to a given id
	// the path is delimetered with "/"
	function getIdPathFromId($sel_id, $path="")
	{
		$result = $this->db->query("SELECT ".$this->pid." FROM ".$this->table." WHERE ".$this->id."=$sel_id");
		if ( $this->db->getRowsNum($result) == 0 ) {
			return $path;
		}
		list($parentid) = $this->db->fetchRow($result);
		$path = "/".$sel_id.$path."";
		if ( $parentid == 0 ) {
			return $path;
		}
		$path = $this->getIdPathFromId($parentid, $path);
		return $path;
	}

	function getAllChild($sel_id=0,$order="",$parray = array())
	{
		$sql = "SELECT * FROM ".$this->table." WHERE ".$this->pid."=".$sel_id."";
		if ( $order != "" ) {
			$sql .= " ORDER BY $order";
		}
		$result = $this->db->query($sql);
		$count = $this->db->getRowsNum($result);
		if ( $count == 0 ) {
			return $parray;
		}
		while ( $row = $this->db->fetchArray($result) ) {
			array_push($parray, $row);
			$parray=$this->getAllChild($row[$this->id],$order,$parray);
		}
		return $parray;
	}

	function getChildTreeArray($sel_id=0,$order="",$parray = array(),$r_prefix="")
	{
		$sql = "SELECT * FROM ".$this->table." WHERE ".$this->pid."=".$sel_id."";
		if ( $order != "" ) {
			$sql .= " ORDER BY $order";
		}
		$result = $this->db->query($sql);
		$count = $this->db->getRowsNum($result);
		if ( $count == 0 ) {
			return $parray;
		}
		while ( $row = $this->db->fetchArray($result) ) {
			$row['prefix'] = $r_prefix.".";
			array_push($parray, $row);
			$parray = $this->getChildTreeArray($row[$this->id],$order,$parray,$row['prefix']);
		}
		return $parray;
	}
}
?>
