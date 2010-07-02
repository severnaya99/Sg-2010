<?php

/**
* $Id: file.php 331 2007-12-23 16:01:11Z malanciault $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

if (!defined("XOOPS_ROOT_PATH")) {
die("XOOPS root path not defined");
}

include_once XOOPS_ROOT_PATH.'/modules/smartsection/include/common.php';

// File status
define("_SSECTION_STATUS_FILE_NOTSET", -1);
define("_SSECTION_STATUS_FILE_ACTIVE", 1);
define("_SSECTION_STATUS_FILE_INACTIVE", 2);

class SmartsectionFile extends XoopsObject
{
	/**
	* constructor
	*/
	function SmartsectionFile($id = null)
	{
		$this->db =& Database::getInstance();
		$this->initVar("fileid", XOBJ_DTYPE_INT, 0, false);
		$this->initVar("itemid", XOBJ_DTYPE_INT, null, true);
		$this->initVar("name", XOBJ_DTYPE_TXTBOX, null, true, 255);
		$this->initVar("description", XOBJ_DTYPE_TXTBOX, null, false, 255);
		$this->initVar("filename", XOBJ_DTYPE_TXTBOX, null, true, 255);
		$this->initVar("mimetype", XOBJ_DTYPE_TXTBOX, null, true, 64);
		$this->initVar("uid", XOBJ_DTYPE_INT, 0, false);
		$this->initVar("datesub", XOBJ_DTYPE_INT, null, false);
		$this->initVar("status", XOBJ_DTYPE_INT, 1, false);
		$this->initVar("notifypub", XOBJ_DTYPE_INT, 0, false);
		$this->initVar("counter", XOBJ_DTYPE_INT, null, false);

		if (isset($id)) {
			global $smartsection_file_handler;
			$file =& $smartsection_file_handler->get($id);
			foreach ($file->vars as $k => $v) {
				$this->assignVar($k, $v['value']);
			}
		}
	}

	function checkUpload($post_field, &$allowed_mimetypes, &$errors)
	{
		include_once (SMARTSECTION_ROOT_PATH.'class/uploader.php');
	    $config =& smartsection_getModuleConfig();

	   /* $maxfilesize = $config['uploadSize'];
        $maxfilewidth = $config['uploadWidth'];
        $maxfileheight = $config['uploadHeight'];*/

	   	$maxfilesize = $config['maximum_filesize'];
		$maxfilewidth = $config['maximum_image_width'];
		$maxfileheight = $config['maximum_image_height'];

        $errors = array();

        if(!isset($allowed_mimetypes)){
            $hMime =& xoops_getmodulehandler('mimetype');
            $allowed_mimetypes = $hMime->checkMimeTypes($post_field);
            if(!$allowed_mimetypes){
                $errors[] = _SMARTSECTION_MESSAGE_WRONG_MIMETYPE;
                return false;
            }
        }
        $uploader = new XoopsMediaUploader(smartsection_getUploadDir(), $allowed_mimetypes, $maxfilesize, $maxfilewidth, $maxfileheight);

        if ($uploader->fetchMedia($post_field)) {
            return true;
        } else {
            $errors = array_merge($errors, $uploader->getErrors(false));
            return false;
        }
	}

	function storeUpload($post_field, $allowed_mimetypes = null, &$errors)
	{
	    global $xoopsUser, $xoopsDB, $xoopsModule;
        include_once (SMARTSECTION_ROOT_PATH.'class/uploader.php');

        $config =& smartsection_getModuleConfig();

	    $itemid = $this->getVar('itemid');

        if(!isset($allowed_mimetypes)){
            $hMime =& xoops_getmodulehandler('mimetype');
            $allowed_mimetypes = $hMime->checkMimeTypes($post_field);
            if(!$allowed_mimetypes){
                return false;
            }
        }

        /*$maxfilesize = $config['xhelp_uploadSize'];
        $maxfilewidth = $config['xhelp_uploadWidth'];
        $maxfileheight = $config['xhelp_uploadHeight'];*/

	   	$maxfilesize = $config['maximum_filesize'];
		$maxfilewidth = $config['maximum_image_width'];
		$maxfileheight = $config['maximum_image_height'];

        if(!is_dir(smartsection_getUploadDir())){
            mkdir(smartsection_getUploadDir(), 0757);
        }

        $uploader = new XoopsMediaUploader(smartsection_getUploadDir().'/', $allowed_mimetypes, $maxfilesize, $maxfilewidth, $maxfileheight);
        if ($uploader->fetchMedia($post_field)) {
            $uploader->setTargetFileName($itemid."_". $uploader->getMediaName());
            if ($uploader->upload()) {
                $this->setVar('filename', $uploader->getSavedFileName());
                if ($this->getVar('name') == '') {
                	$this->setVar('name', $this->getNameFromFilename());
                }
                $this->setVar('mimetype', $uploader->getMediaType());
                return true;
            } else {
                 $errors = array_merge($errors, $uploader->getErrors(false));
            	return false;
            }

        } else {
            $errors = array_merge($errors, $uploader->getErrors(false));
            return false;
        }
	}

	function store(&$allowed_mimetypes, $force = true, $doupload =true)
	{
		if ($this->isNew()) {
			$errors = array();
			if ($doupload) {
				$ret = $this->storeUpload('userfile', $allowed_mimetypes, $errors);
			} else {
				$ret = true;
			}
			if (!$ret) {
				foreach ($errors as $error) {
					$this->setErrors($error);
				}
				return false;
			}
		}

		global $smartsection_file_handler;
		return $smartsection_file_handler->insert($this, $force);
	}

	function fileid()
    {
        return $this->getVar("fileid");
    }

	function itemid()
    {
        return $this->getVar("itemid");
    }

    function name($format="S")
    {
        return $this->getVar("name", $format);
    }

    function description($format="S")
    {
        return $this->getVar("description", $format);
    }

    function filename($format="S")
    {
        return $this->getVar("filename", $format);
    }

    function mimetype($format="S")
    {
        return $this->getVar("mimetype", $format);
    }

    function uid()
    {
        return $this->getVar("uid");
    }

	function datesub($dateFormat='s', $format="S")
	{
		return formatTimestamp($this->getVar('datesub', $format), $dateFormat);
	}

    function status()
    {
        return $this->getVar("status");
    }

    function notifypub()
    {
        return $this->getVar("notifypub");
    }

    function counter()
    {
        return $this->getVar("counter");
    }

	function notLoaded()
	{
	   return ($this->getVar('itemid')== 0);
	}

	function getFileUrl()
	{
 		$hModule =& xoops_gethandler('module');
	 	$hModConfig =& xoops_gethandler('config');
     	$smartsection_module =& $hModule->getByDirname('smartsection');
	 	$smartsection_config = &$hModConfig->getConfigsByCat(0, $smartsection_module->getVar('mid'));

		return smartsection_getUploadDir(false) .  $this->filename();
	}

	function getFilePath()
	{
 		$hModule =& xoops_gethandler('module');
	 	$hModConfig =& xoops_gethandler('config');
     	$smartsection_module =& $hModule->getByDirname('smartsection');
	 	$smartsection_config = &$hModConfig->getConfigsByCat(0, $smartsection_module->getVar('mid'));
     	return 	smartsection_getUploadDir() . $this->filename();
	}

	function getFileLink()
	{
		return "<a href='" . XOOPS_URL . "/modules/smartsection/visit.php?fileid=" . $this->fileid() . "'>" . $this->name()	. "</a>";
	}

	function getItemLink() {
		return "<a href='" . XOOPS_URL . "/modules/smartsection/item.php?itemid=" . $this->itemid() . "'>" . $this->name()	. "</a>";
	}

	function updateCounter()
	{
	  	$this->setVar('counter', $this->counter() + 1);
	  	$this->store();
	}

	function displayFlash() {
		if (!defined('MYTEXTSANITIZER_EXTENDED_MEDIA')) {
			include_once(SMARTSECTION_ROOT_PATH . 'include/media.textsanitizer.php');
		}
		$media_ts = MyTextSanitizerExtension::getInstance();
		return $media_ts->_displayFlash($this->getFileUrl());
	}

	function getNameFromFilename() {
		$ret = $this->filename();
		$sep_pos = strpos($ret, '_');
		$ret = substr($ret, $sep_pos+1, strlen($ret) - $sep_pos);
		return $ret;
	}
}

/**
* Files handler class.
* This class is responsible for providing data access mechanisms to the data source
* of File class objects.
*
* @author marcan <marcan@notrevie.ca>
* @package SmartSection
*/

class SmartsectionFileHandler extends XoopsObjectHandler
{

	/**
	* create a new file
	*
	* @param bool $isNew flag the new objects as "new"?
	* @return object SmartsectionFile
	*/
	function &create($isNew = true)
	{
		$file = new SmartsectionFile();
		if ($isNew) {
			$file->setNew();
		}
		return $file;
	}

	/**
	* retrieve an file
	*
	* @param int $id fileid of the file
	* @return mixed reference to the {@link SmartsectionFile} object, FALSE if failed
	*/
	function &get($id)
	{
		if (intval($id) > 0) {
			$sql = 'SELECT * FROM '.$this->db->prefix('smartsection_files').' WHERE fileid='.$id;
			if (!$result = $this->db->query($sql)) {
				return false;
			}

			$numrows = $this->db->getRowsNum($result);
			if ($numrows == 1) {
				$file = new SmartsectionFile();
				$file->assignVars($this->db->fetchArray($result));
				return $file;
			}
		}
		return false;
	}

	/**
	* insert a new file in the database
	*
	* @param object $file reference to the {@link SmartsectionFile} object
	* @param bool $force
	* @return bool FALSE if failed, TRUE if already present and unchanged or successful
	*/
	function insert(&$fileObj, $force = false)
	{
		if (strtolower(get_class($fileObj)) != 'smartsectionfile') {
            return false;
        }
        if (!$fileObj->isDirty()) {
            return true;
        }
        if (!$fileObj->cleanVars()) {
            return false;
        }

        foreach ($fileObj->cleanVars as $k => $v) {
            ${$k} = $v;
        }

		if ($fileObj->isNew()) {
			$sql = sprintf("INSERT INTO %s (fileid, itemid, name, description, filename, mimetype, uid, datesub, `status`, notifypub, counter) VALUES (NULL, %u, %s, %s, %s, %s, %u, %u, %u, %u, %u)", $this->db->prefix('smartsection_files'), $itemid,  $this->db->quoteString($name), $this->db->quoteString($description), $this->db->quoteString($filename), $this->db->quoteString($mimetype), $uid, time(), $status, $notifypub, $counter);
		} else {
			$sql = sprintf("UPDATE %s SET itemid = %u, name = %s, description = %s, filename = %s, mimetype = %s, uid = %u, datesub = %u, status = %u, notifypub = %u, counter = %u WHERE fileid = %u", $this->db->prefix('smartsection_files'), $itemid, $this->db->quoteString($name), $this->db->quoteString($description), $this->db->quoteString($filename), $this->db->quoteString($mimetype), $uid, $datesub, $status, $notifypub, $counter, $fileid);
		}

		//echo "<br />$sql<br />";

		if (false != $force) {
			$result = $this->db->queryF($sql);
		} else {
			$result = $this->db->query($sql);
		}

		if (!$result) {
			$fileObj->setErrors('The query returned an error. ' . $this->db->error());
			return false;
		}

		if ($fileObj->isNew()) {
			$fileObj->assignVar('fileid', $this->db->getInsertId());
		}

		$fileObj->assignVar('fileid', $fileid);
		return true;
	}

	/**
	* delete a file from the database
	*
	* @param object $file reference to the file to delete
	* @param bool $force
	* @return bool FALSE if failed.
	*/
	function delete(&$file, $force = false)
	{
		if (strtolower(get_class($file)) != 'smartsectionfile') {

			return false;
		}
		// Delete the actual file
		if (!smartsection_deleteFile($file->getFilePath())){

			return false;
		}
		// Delete the record in the table
		$sql = sprintf("DELETE FROM %s WHERE fileid = %u", $this->db->prefix("smartsection_files"), $file->getVar('fileid'));

		if (false != $force) {

			$result = $this->db->queryF($sql);
		} else {

			$result = $this->db->query($sql);

		}
		if (!$result) {
			return false;
		}
		return true;
	}

	/**
	* delete files related to an item from the database
	*
	* @param object $itemObj reference to the item which files to delete
	*/
	function deleteItemFiles(&$itemObj)
	{
		if (strtolower(get_class($itemObj)) != 'smartsectionitem') {
			return false;
		}
		$files =& $this->getAllFiles($itemObj->itemid());
		$result = true;
		foreach ($files as $file) {
			if (!$this->delete($file)) {
				$result = false;
			}
		}
		return $result;
	}

	/**
	* retrieve files from the database
	*
	* @param object $criteria {@link CriteriaElement} conditions to be met
	* @param bool $id_as_key use the fileid as key for the array?
	* @return array array of {@link SmartsectionFile} objects
	*/
	function &getObjects($criteria = null, $id_as_key = false)
	{
		$ret = array();
		$limit = $start = 0;
		$sql = 'SELECT * FROM '.$this->db->prefix('smartsection_files');
		if (isset($criteria) && is_subclass_of($criteria, 'criteriaelement')) {
			$sql .= ' '.$criteria->renderWhere();
			if ($criteria->getSort() != '') {
				$sql .= ' ORDER BY '.$criteria->getSort().' '.$criteria->getOrder();
			}
			$limit = $criteria->getLimit();
			$start = $criteria->getStart();
		}
		//echo "<br />" . $sql . "<br />";
		$result = $this->db->query($sql, $limit, $start);
		if (!$result) {
			return $ret;
		}
		while ($myrow = $this->db->fetchArray($result)) {
			$file = new SmartsectionFile();
			$file->assignVars($myrow);
			if (!$id_as_key) {
				$ret[] =& $file;
			} else {
				$ret[$myrow['fileid']] =& $file;
			}
			unset($file);
		}
		return $ret;
	}

	/**
	* retrieve all files
	*
	* @param object $criteria {@link CriteriaElement} conditions to be met
	* @param int $itemid
	* @return array array of {@link SmartsectionFile} objects
	*/
	function &getAllFiles($itemid=0, $status = -1, $limit = 0, $start = 0, $sort = 'datesub', $order = 'DESC')
	{
		$hasStatusCriteria = false;
		$criteriaStatus = new CriteriaCompo();
		if ( is_array($status)) {
			$hasStatusCriteria = true;
			foreach ($status as $v) {
				$criteriaStatus->add(new Criteria('status', $v), 'OR');
			}
		} elseif ( $status != -1) {
			$hasStatusCriteria = true;
			$criteriaStatus->add(new Criteria('status', $status), 'OR');
		}
		$criteriaItemid = new Criteria('itemid', $itemid);

		$criteria = new CriteriaCompo();

		if ($itemid !=0) {
			$criteria->add($criteriaItemid);
		}

		if ($hasStatusCriteria) {
			$criteria->add($criteriaStatus);
		}

		$criteria->setSort($sort);
		$criteria->setOrder($order);
		$criteria->setLimit($limit);
		$criteria->setStart($start);
		$files =& $this->getObjects($criteria);

		return $files;
	}

	/**
	* count files matching a condition
	*
	* @param object $criteria {@link CriteriaElement} to match
	* @return int count of files
	*/
	function getCount($criteria = null)
	{
		$sql = 'SELECT COUNT(*) FROM '.$this->db->prefix('smartsection_files');
		if (isset($criteria) && is_subclass_of($criteria, 'criteriaelement')) {
			$sql .= ' '.$criteria->renderWhere();
		}
		$result = $this->db->query($sql);
		if (!$result) {
			return 0;
		}
		list($count) = $this->db->fetchRow($result);
		return $count;
	}

	/**
	* delete files matching a set of conditions
	*
	* @param object $criteria {@link CriteriaElement}
	* @return bool FALSE if deletion failed
	*/
	function deleteAll($criteria = null)
	{
		$sql = 'DELETE FROM '.$this->db->prefix('smartsection_files');
		if (isset($criteria) && is_subclass_of($criteria, 'criteriaelement')) {
			$sql .= ' '.$criteria->renderWhere();
		}
		if (!$result = $this->db->query($sql)) {
			return false;
		}
		return true;
	}

	/**
	* Change a value for files with a certain criteria
	*
	* @param   string  $fieldname  Name of the field
	* @param   string  $fieldvalue Value to write
	* @param   object  $criteria   {@link CriteriaElement}
	*
	* @return  bool
	**/
	function updateAll($fieldname, $fieldvalue, $criteria = null)
	{
		$set_clause = is_numeric($fieldvalue) ? $fieldname.' = '.$fieldvalue : $fieldname.' = '.$this->db->quoteString($fieldvalue);
		$sql = 'UPDATE '.$this->db->prefix('smartsection_files').' SET '.$set_clause;
		if (isset($criteria) && is_subclass_of($criteria, 'criteriaelement')) {
			$sql .= ' '.$criteria->renderWhere();
		}
		//echo "<br />" . $sql . "<br />";
		if (!$result = $this->db->queryF($sql)) {
			return false;
		}
		return true;
	}

}
?>
