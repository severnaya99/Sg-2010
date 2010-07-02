<?php
// priv_msgs.php,v 1
//  ---------------------------------------------------------------- //
// Author: Bruno Barthez	                                           //
// ----------------------------------------------------------------- //

include_once XOOPS_ROOT_PATH."/class/xoopsobject.php";
/**
* priv_msgs class.  
* $this class is responsible for providing data access mechanisms to the data source 
* of XOOPS user class objects.
*/


class priv_msgs extends XoopsObject
{ 
	var $db;

// constructor
	function priv_msgs ($id=null)
	{
		$this->db =& Database::getInstance();
		$this->initVar("msg_id",XOBJ_DTYPE_INT,null,false,10);
		$this->initVar("msg_pid",XOBJ_DTYPE_INT,null,false,10);		
		$this->initVar("msg_image",XOBJ_DTYPE_TXTBOX, null, false);
		$this->initVar("subject",XOBJ_DTYPE_TXTBOX, null, false);
		$this->initVar("from_userid",XOBJ_DTYPE_INT,null,false,10);
		$this->initVar("to_userid",XOBJ_DTYPE_INT,null,false,10);
		$this->initVar("msg_time",XOBJ_DTYPE_INT,null,false,10);
		$this->initVar("msg_text",XOBJ_DTYPE_TXTBOX, null, false);
		$this->initVar("read_msg",XOBJ_DTYPE_INT,null,false,10);
		$this->initVar("reply_msg",XOBJ_DTYPE_INT,null,false,10);
		$this->initVar("anim_msg",XOBJ_DTYPE_TXTBOX, null, false);
		$this->initVar("cat_msg",XOBJ_DTYPE_INT,null,false,10);
		$this->initVar("file_msg",XOBJ_DTYPE_TXTBOX, null, false);
		if ( !empty($id) ) {
			if ( is_array($id) ) {
				$this->assignVars($id);
			} else {
					$this->load(intval($id));
			}
		} else {
			$this->setNew();
		}
		
	}

	function load($id)
	{
		$sql = 'SELECT * FROM '.$this->db->prefix("priv_msgs").' WHERE msg_id='.$id;
		$myrow = $this->db->fetchArray($this->db->query($sql));
		$this->assignVars($myrow);
		if (!$myrow) {
			$this->setNew();
		}
	}

	function getAllpriv_msgss($criteria=array(), $asobject=false, $sort="msg_id", $order="ASC", $limit=0, $start=0)
	{
		$db =& Database::getInstance();
		$ret = array();
		$where_query = "";
		if ( is_array($criteria) && count($criteria) > 0 ) {
			$where_query = " WHERE";
			foreach ( $criteria as $c ) {
				$where_query .= " $c AND";
			}
			$where_query = substr($where_query, 0, -4);
		} elseif ( !is_array($criteria) && $criteria) {
			$where_query = " WHERE ".$criteria;
		}
		if ( !$asobject ) {
			$sql = "SELECT msg_id FROM ".$db->prefix("priv_msgs")."$where_query ORDER BY $sort $order";
			$result = $db->query($sql,$limit,$start);
			while ( $myrow = $db->fetchArray($result) ) {
				$ret[] = $myrow['priv_msgs_id'];
			}
		} else {
			$sql = "SELECT * FROM ".$db->prefix("priv_msgs")."$where_query ORDER BY $sort $order";
			$result = $db->query($sql,$limit,$start);
			while ( $myrow = $db->fetchArray($result) ) {
				$ret[] = new priv_msgs ($myrow);
			}
		}
		return $ret;
	}
	
	
	    function getForm($action = false)
    {
 global $xoopsDB, $xoopsModule, $xoopsModuleConfig;
 
   $start2 = empty($_REQUEST['start2'])? 0 : intval($_REQUEST['start2']);
   
        if ($action === false) {
            $action = $_SERVER['REQUEST_URI'];
        }
        $title = $this->isNew() ? sprintf(_MP_TRIE) : sprintf(_MP_TRIE);

        include_once(XOOPS_ROOT_PATH."/class/xoopsformloader.php");

        $form = new XoopsThemeForm($title, 'form', $action, 'post', true);
		$form->setExtra('enctype="multipart/form-data"');
		
		$form->addElement(new XoopsFormTextDateSelect(_PM_AM_PRUNEAFTER, 'after', '15', $after = isset($_REQUEST['after']) ? strtotime($_REQUEST['after']) : time())); 
		$form->addElement(new XoopsFormTextDateSelect(_PM_AM_PRUNEBEFORE, 'before', '15', $before = isset($_REQUEST['before']) ? strtotime($_REQUEST['before']) : time()));
        
		if (!$this->isNew()) {
            //Load groups
            $form->addElement(new XoopsFormHidden('id', $this->getVar('art_id')));
        }


//editor
	  //  $editor_configs=array();
    //	$editor_configs["name"] ="art_text'";
    	//$editor_configs["value"] = $this->getVar('art_text', 'e');
    	//$editor_configs["rows"] = 20;
    	//$editor_configs["cols"] = 140;
    	//$editor_configs["width"] = "100%";
    	//$editor_configs["height"] = "400px";
    	//$editor_configs["editor"] = $xoopsModuleConfig["editor"];				
		//$form->addElement( new XoopsFormEditor(_AM_TDMSOUND_TEXT, "art_text", $editor_configs), false );		
	
//upload
	//affiche membre
    $member_handler =& xoops_gethandler('member');
    $usercount = $member_handler->getUserCount();
    $nav = new XoopsPageNav($usercount, 200, $start2, "start2", "op=purge");
    $user_select = new XoopsFormSelect('', "del_userid", @$_REQUEST['del_userid'], 5, true);
    $user_select -> setExtra("style=\"width:170px;\" ");
    $criteria = new CriteriaCompo();
    $criteria->setSort('uname');
    $criteria->setOrder('ASC');
    $criteria->setLimit(200);
    $criteria->setStart($start2);
    $user_select->addOptionArray($member_handler->getUserList($criteria));
    $user_select_tray = new XoopsFormElementTray(_MP_NICKNAME, "<br />");
    $user_select_tray->addElement($user_select);
    $user_select_nav = new XoopsFormLabel('', $nav->renderNav(4));
    $user_select_tray->addElement($user_select_nav);
    $form->addElement($user_select_tray);

	//

		//groupe
		$groupe_select = new XoopsFormSelectGroup(_MP_GROUPE, "del_groupe", false, @$_REQUEST['del_groupe'], 5, true);
		$groupe_select -> setExtra("style=\"width:170px;\" ");
		$form->addElement($groupe_select);
		//
 
		$form->addElement(new XoopsFormRadioYN(_PM_AM_ONLYREADMESSAGES, 'onlyread', $onlyread = isset($_REQUEST['onlyread']) ? $_REQUEST['onlyread'] : 0 ));
		$form->addElement(new XoopsFormRadioYN(_PM_AM_INCLUDEBOX, 'includebox', $includebox = isset($_REQUEST['includebox']) ? $_REQUEST['includebox'] : 0 ));
		$form->addElement(new XoopsFormRadioYN(_PM_AM_INCLUDESEND, 'includesend', $includesend = isset($_REQUEST['includesend']) ? $_REQUEST['includesend'] : 0 ));
		$form->addElement(new XoopsFormRadioYN(_PM_AM_INCLUDESAVE, 'includesave', $includesave = isset($_REQUEST['includesave']) ? $_REQUEST['includesave'] : 0 ));
		$form->addElement(new XoopsFormRadioYN(_PM_AM_INCLUDEFILE, 'includefile', $includefile = isset($_REQUEST['includefile']) ? $_REQUEST['includefile'] : 0 ));
 
		$form->addElement($texte_hidden);
		$form->addElement($promotray);
		$form->addElement($liste_read);
 
		$button_tray = new XoopsFormElementTray(_MP_ACTION ,'');
		$button_tray->addElement(new XoopsFormButton('', 'op', _MP_VISU, 'submit'));
		$form->addElement($button_tray);
//option purge
		$form->insertBreak(_MP_WARNING, 'odd');
		$form->addElement(new XoopsFormRadioYN(_PM_AM_NOTIFYUSERS, 'notifyusers', $notifyusers = isset($_REQUEST['notifyusers']) ? $_REQUEST['notifyusers'] : 0 ));
		$form->addElement(new XoopsFormRadioYN(_MP_NOTIFYFILE, 'notifyfile', $notifyfile = isset($_REQUEST['notifyfile']) ? $_REQUEST['notifyfile'] : 0 ));
		$purge_tray = new XoopsFormElementTray(_MP_ACTION ,'');
		$purge_tray->addElement(new XoopsFormButton('', 'op', _MP_PURGE_OK, 'submit'));
		$form->addElement($purge_tray);

        return $form;
	}
}


// -------------------------------------------------------------------------
// ------------------priv_msgs user handler class -------------------
// -------------------------------------------------------------------------
/**
* priv_msgshandler class.  
* This class provides simple mecanisme for priv_msgs object
*/

class Xoopspriv_msgsHandler extends XoopsObjectHandler
{

	/**
	* create a new priv_msgs
	* 
	* @param bool $isNew flag the new objects as "new"?
	* @return object priv_msgs
	*/
	function &create($isNew = true)	{
		$priv_msgs = new priv_msgs();
		if ($isNew) {
			$priv_msgs->setNew();
		}
		return $priv_msgs;
	}

	/**
	* retrieve a priv_msgs
	* 
	* @param int $id of the priv_msgs
	* @return mixed reference to the {@link priv_msgs} object, FALSE if failed
	*/
	function &get($id)	{
			$sql = 'SELECT * FROM '.$this->db->prefix('priv_msgs').' WHERE msg_id='.$id;
			if (!$result = $this->db->query($sql)) {
				return false;
			}
			$numrows = $this->db->getRowsNum($result);
			if ($numrows == 1) {
				$priv_msgs = new priv_msgs();
				$priv_msgs->assignVars($this->db->fetchArray($result));
				return $priv_msgs;
			}
				return false;
	}

/**
* insert a new priv_msgs in the database
* 
* @param object $priv_msgs reference to the {@link priv_msgs} object
* @param bool $force
* @return bool FALSE if failed, TRUE if already present and unchanged or successful
*/
	function insert(&$priv_msgs, $force = false) {
		Global $xoopsConfig;
		if (get_class($priv_msgs) != 'priv_msgs') {
				return false;
		}
		if (!$priv_msgs->isDirty()) {
				return true;
		}
		if (!$priv_msgs->cleanVars()) {
				return false;
		}
		foreach ($priv_msgs->cleanVars as $k => $v) {
				${$k} = $v;
		}
		$now = "date_add(now(), interval ".$xoopsConfig['server_TZ']." hour)";
		if ($priv_msgs->isNew()) {
			// ajout/modification d'un priv_msgs
			$msg_id = $this->db->genId('priv_msgs_msg_id_seq');
			$priv_msgs = new priv_msgs();
			$format = "INSERT INTO %s (msg_id, msg_pid, msg_image, subject, from_userid, to_userid, msg_time, msg_text, read_msg, reply_msg, anim_msg, cat_msg, file_msg)";
			$format .= "VALUES (%u, %u, %s, %s, %u, %u, %u, %s, %u, %u, %s, %u, %s)";
			$sql = sprintf($format , 
			$this->db->prefix('priv_msgs'), 
			$msg_id,$msg_pid
			,$this->db->quoteString($msg_image)
			,$this->db->quoteString($subject)
			,$from_userid
			,$to_userid
			,$msg_time
			,$this->db->quoteString($msg_text)
			,$read_msg
			,$reply_msg
			,$this->db->quoteString($anim_msg)
			,$cat_msg
			,$this->db->quoteString($file_msg)
			);
			$force = true;
		} else {
			$format = "UPDATE %s SET ";
			$format .="msg_id=%u, msg_pid=%u, msg_image=%s, subject=%s, from_userid=%u, to_userid=%u, msg_time=%u, msg_text=%s, read_msg=%u, reply_msg=%u, anim_msg=%s, cat_msg=%u, file_msg=%s";
			$format .=" WHERE msg_id = %u";
			$sql = sprintf($format, $this->db->prefix('priv_msgs'),
			$msg_id, $msg_pid
			,$this->db->quoteString($msg_image)
			,$this->db->quoteString($subject)
			,$from_userid
			,$to_userid
			,$msg_time
			,$this->db->quoteString($msg_text)
			,$read_msg
			,$reply_msg
			,$this->db->quoteString($anim_msg)
			,$cat_msg
			,$this->db->quoteString($file_msg)
			, $msg_id, $msg_pid);
		}
		if (false != $force) {
			$result = $this->db->queryF($sql);
		} else {
			$result = $this->db->query($sql);
		}
		if (!$result) {
			return false;
		}
		if (empty($msg_id)) {
			$msg_id = $this->db->getInsertId();
		}
		$priv_msgs->assignVar('msg_id', $msg_id);
		return true;
	}

	/**
	 * delete a priv_msgs from the database
	 * 
	 * @param object $priv_msgs reference to the priv_msgs to delete
	 * @param bool $force
	 * @return bool FALSE if failed.
	 */
	function delete(&$priv_msgs, $force = false)
	{
		if (get_class($priv_msgs) != 'priv_msgs') {
			return false;
		}
		$sql = sprintf("DELETE FROM %s WHERE msg_id = %u", $this->db->prefix("priv_msgs"), $priv_msgs->getVar('msg_id'));
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
	
		function setReply(&$priv_msgs, $val=1)
	{
		if (get_class($priv_msgs) != 'priv_msgs') {
			return false;
		}
		$sql = sprintf("UPDATE %s SET reply_msg = '$val' WHERE msg_id = %u", $this->db->prefix("priv_msgs"), $priv_msgs->getVar('msg_id'));
		$result = $this->db->queryF($sql);
	
		if (!$result) {
			return false;
		}
		return true;
	}
	
		function setRead(&$priv_msgs, $val=0)
	{
		if (get_class($priv_msgs) != 'priv_msgs') {
			return false;
		}
		$sql = sprintf("UPDATE %s SET read_msg = '$val' WHERE msg_id = %u", $this->db->prefix("priv_msgs"), $priv_msgs->getVar('msg_id'));
			$result = $this->db->queryF($sql);
		if (!$result) {
			return false;
		}
		return true;
	}
	
		function setReadall(&$priv_msgs, $val=1)
	{
		if (get_class($priv_msgs) != 'priv_msgs') {
			return false;
		}
		$sql = sprintf("UPDATE %s SET read_msg = '$val' WHERE msg_pid = %u", $this->db->prefix("priv_msgs"), $priv_msgs->getVar('msg_pid'));
			$result = $this->db->queryF($sql);
		if (!$result) {
			return false;
		}
		return true;
	}
	
			function setMove(&$priv_msgs, $val=1)
	{
		if (get_class($priv_msgs) != 'priv_msgs') {
			return false;
		}
		$sql = sprintf("UPDATE %s SET cat_msg = '$val' WHERE msg_id = %u", $this->db->prefix("priv_msgs"), $priv_msgs->getVar('msg_id'));
			$result = $this->db->queryF($sql);
		if (!$result) {
			return false;
		}
		return true;
	}
	
		function setMoveall(&$priv_msgs, $val=1)
	{
		if (get_class($priv_msgs) != 'priv_msgs') {
			return false;
		}
		$sql = sprintf("UPDATE %s SET cat_msg = '$val' WHERE msg_pid = %u", $this->db->prefix("priv_msgs"), $priv_msgs->getVar('msg_pid'));
			$result = $this->db->queryF($sql);
		if (!$result) {
			return false;
		}
		return true;
	}
	
	/**
	* retrieve priv_msgss from the database
	* 
	* @param object $criteria {@link CriteriaElement} conditions to be met
	* @param bool $id_as_key use the UID as key for the array?
	* @return array array of {@link priv_msgs} objects
	*/
	function &getObjects($criteria = null, $id_as_key = false)
	{
		$ret = array();
		$limit = $start = 0;
		$sql = 'SELECT * FROM '.$this->db->prefix('priv_msgs');
		if (isset($criteria) && is_subclass_of($criteria, 'criteriaelement')) {
			$sql .= ' '.$criteria->renderWhere();
			$sort = !$criteria->getSort() ? 'msg_time' : $criteria->getSort();
			$sql .= ' ORDER BY '.$sort.' '.$criteria->getOrder();
			//$sql .= ' '.$criteria->getGroupby();
			$limit = $criteria->getLimit();
		    $start = $criteria->getStart();
		}

		$result = $this->db->query($sql, $limit, $start);
		if (!$result) {
			return $ret;
		}
		while ($myrow = $this->db->fetchArray($result)) {
			$priv_msgs = new priv_msgs();
			$priv_msgs->assignVars($myrow);
			if (!$id_as_key) {
				$ret[] =& $priv_msgs;
			} else {
				$ret[$myrow['msg_id']] =& $priv_msgs;
			}
			unset($priv_msgs);
		}
		return $ret;
	}
	
		function &getMpGroups($criteria = null, $id_as_key = false)
	{
		$ret = array();
		$limit = $start = 0;
		$sql = 'SELECT * FROM '.$this->db->prefix('priv_msgs');
		if (isset($criteria) && is_subclass_of($criteria, 'criteriaelement')) {
			$sql .= ' '.$criteria->renderWhere()." and msg_pid = '0'";
			$sort = !in_array($criteria->getSort(), array('msg_id', 'msg_pid', 'msg_time', 'from_userid')) ? 'msg_id' : $criteria->getSort();
            $sql .= ' ORDER BY msg_time '.$criteria->getOrder();
			$limit = $criteria->getLimit();
		    $start = $criteria->getStart();
		}

		$result = $this->db->query($sql, $limit, $start);
		if (!$result) {
			return $ret;
		}
		while ($myrow = $this->db->fetchArray($result)) {
			$priv_msgs = new priv_msgs();
			$priv_msgs->assignVars($myrow);
			if (!$id_as_key) {
				$ret[] =& $priv_msgs;
			} else {
				$ret[$myrow['msg_id']] =& $priv_msgs;
			}
			unset($priv_msgs);
		}
		return $ret;
	}

 function &getMpTree($criteria = null, $id_as_key = false, $pid)
	{
		$ret = array();
		$limit = $start = 0;
		$criteria->add(new Criteria('msg_pid', $pid));
		$sql = 'SELECT * FROM '.$this->db->prefix('priv_msgs');
		if (isset($criteria) && is_subclass_of($criteria, 'criteriaelement')) {
			$sql .= ' '.$criteria->renderWhere();
			$sort = !in_array($criteria->getSort(), array('msg_id', 'msg_pid', 'msg_time', 'from_userid')) ? 'msg_id' : $criteria->getSort();
            $sql .= ' ORDER BY msg_time '.$criteria->getOrder();
			$limit = $criteria->getLimit();
		    $start = $criteria->getStart();
		}

		$result = $this->db->query($sql, $limit, $start);
		if (!$result) {
			return $ret;
		}
		while ($myrow = $this->db->fetchArray($result)) {
			$priv_msgs = new priv_msgs();
			$priv_msgs->assignVars($myrow);
			if (!$id_as_key) {
				$ret[] =& $priv_msgs;
			} else {
				$ret[$myrow['msg_id']] =& $priv_msgs;
			}
			unset($priv_msgs);
		}
		return $ret;
	}

	/**
	* count priv_msgss matching a condition
	* 
	* @param object $criteria {@link CriteriaElement} to match
	* @return int count of priv_msgss
	*/
	function getCount($criteria = null)
	{
		$sql = 'SELECT COUNT(*) FROM '.$this->db->prefix('priv_msgs');
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

	function getPid($criteria = null)
	{
		$sql = 'SELECT MAX(msg_pid) FROM '.$this->db->prefix('priv_msgs');
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


	function getCountTouser($criteria = null)
	{
	    $ret = array();
		$sql = 'SELECT to_userid, COUNT(*) as count FROM '.$this->db->prefix('priv_msgs');
		if (isset($criteria) && is_subclass_of($criteria, 'criteriaelement')) {
			$sql .= ' '.$criteria->renderWhere().' Group by to_userid';
		}
		$result = $this->db->query($sql);
		if (!$result) {
			return 0;
		}
		//list($count) = $this->db->fetchRow($result);
		while ( $myrow = $this->db->fetchArray($result) ) {
			$ret[$myrow['to_userid']] = array('count' => $myrow['count']);
			}
			
		return $ret;
	} 

	function getCountFile($criteria = null)
	{
	    $ret = array();
		$sql = 'SELECT file_msg, COUNT(*) as file FROM '.$this->db->prefix('priv_msgs');
		if (isset($criteria) && is_subclass_of($criteria, 'criteriaelement')) {
			$sql .= ' '.$criteria->renderWhere().'Group by file_msg';
		}
		$result = $this->db->query($sql);
		if (!$result) {
			return 0;
		}
		//list($count) = $this->db->fetchRow($result);
		while ( $myrow = $this->db->fetchArray($result) ) {
			$ret[$myrow['file_msg']] = array('file' => $myrow['file']);
			}
		return $ret;
	} 
	
	/**
	* delete priv_msgss matching a set of conditions
	* 
	* @param object $criteria {@link CriteriaElement} 
	* @return bool FALSE if deletion failed
	*/
	function deleteAll($criteria = null)
	{
		$sql = 'DELETE FROM '.$this->db->prefix('priv_msgs');
		if (isset($criteria) && is_subclass_of($criteria, 'criteriaelement')) {
			$sql .= ' '.$criteria->renderWhere();
		}
		if (!$result = $this->db->query($sql)) {
			return false;
		}
		return true;
	}
}


function mp_post($view_perms, $pm, $mpstop)
    {
 global $xoopsConfig, $xoopsModule, $xoopsModuleConfig, $xoopsUser, $myts, $xoopsTpl, $sortorder, $order, $start, $mp_alert;

$xoopsTpl->assign('xoops_pagetitle', $myts->htmlSpecialChars($xoopsModule->name())." - ".$myts->htmlSpecialChars($pm->getVar('subject')));

 $poster = new XoopsUser($pm->getVar("from_userid"));

 if ( !$poster->isActive() ) {
 $poster = array( 'name' => $myts->HtmlSpecialChars($xoopsConfig['anonymous']));
 } else {
 $poster_rank = $poster->rank();
 
 if ($poster->isOnline()) {
 $msg_uline = '<div class="comUserStatus"><img src="'.XOOPS_URL.'/modules/'.$xoopsModule->dirname().'/images/online.png" title="'._MP_ONLINE.'" style="width: 20px; height: 20px;"/></div>';
 } else {
 $msg_uline = '<div class="comUserStatus"><img src="'.XOOPS_URL.'/modules/'.$xoopsModule->dirname().'/images/offline.png" title="'._MP_OFFLINE.'" style="width: 20px; height: 20px;"/></div>';
 }
 
 if ($poster->getVar("attachsig")) {
	$signature = "<p><br />_________________<br />". $poster->user_sig()."</p>";
	    } else { $signature = false; }

if (is_file(XOOPS_UPLOAD_PATH."/".$poster->getVar('user_avatar'))) {
$avatar = '<img class="comUserImg" src="'.XOOPS_UPLOAD_URL."/".$poster->getVar("user_avatar").'" alt=""/>';
} else { $avatar = '<img class="comUserImg" src="'.XOOPS_UPLOAD_URL.'"/blank.gif" alt=""/>';}

 $poster = array(
  'name' => '<a href="'.XOOPS_URL.'/userinfo.php?uid='.$poster->getVar("uid").'">'.$poster->getVar("uname").'</a>',
  'title' => $poster_rank['title'],
  'img' => '<img class="comUserRankImg" src="'.XOOPS_UPLOAD_URL."/".$poster_rank['image'].'" alt="" />',
  'avatar' => $avatar,
  'regdate' => formatTimestamp($poster->getVar('user_regdate'), 's'),
  'from' => $poster->getVar('user_from'),
  'posts' => $poster->getVar('posts'),
  'id' => $pm->getVar('msg_id'),
  'uline' => $msg_uline,
  'sign' => $signature,
  'addcont' => "<img onclick='document.prvmsg.action=\"contbox.php?op=envoimp&to_userid[]=".$poster->getVar("uid")."\";document.prvmsg.submit()' src='".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/addcont.png' title="._MP_ADDCONT." style='cursor:pointer; width: 15px; height: 15px;'></a>"
 );
  }

if ($pm->getVar('file_msg') > 0) {
 $file_msg = "";
 $up_handler  = & xoops_gethandler('priv_msgsup');
 $criteria = new CriteriaCompo();
 $criteria->add(new Criteria('u_id', $pm->getVar('file_msg')));
 $pm_up =& $up_handler->getObjects($criteria);
 
 foreach (array_keys($pm_up) as $i) { 
 $file_msg .= "<br /><br /><img src='".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/upload.png' alt='' />&nbsp;"._MP_MIMEFILE."<a href='visit.php?fileup=".$pm_up[$i]->getVar('u_file')."'>".$pm_up[$i]->getVar('u_name')."</a> (".$pm_up[$i]->getVar('u_mimetype')." | ".MPPrettySize($pm_up[$i]->getVar('u_weight')).")";
 }
	
		} else { $file_msg = false; }
		
if (!$pm->getVar('msg_image')) {
 $msg_img = "<img src='".XOOPS_URL."/images/read.gif' alt='' />";
 } else {
 $msg_img = "<img src='".XOOPS_URL."/images/subject/".$pm->getVar('msg_image')."' alt='' />";
 }
 
if ($pm->getVar('anim_msg')) { 
 $anim = '<div id="anim'.$pm->getVar('msg_id').'" name="anim" style="width: 640px; position: absolute; height: 130px; left: 50%; 
 margin-left: -375px; text-align: center; visibility: hidden;"> 
 <embed src="'.XOOPS_URL.'/modules/'.$xoopsModule->dirname().'/swf/'.$pm->getVar('anim_msg').'" wmode="transparent" id="flash'.$pm->getVar('msg_id').'" name="flash" loop="false"  autostart="0" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="640" height="380"></embed>
 <NOEMBED>'._MP_NOOEIL.'</NOEMBED></div><a href="#'.$pm->getVar('msg_id').'" onclick="document.getElementById(\'anim'.$pm->getVar('msg_id').'\').style.visibility=\'visible\';flash'.$pm->getVar('msg_id').'.TPlay(\'_level0\');" >'._MP_OEIL.'</a> / <a href="#'.$pm->getVar('msg_id').'" onclick="document.getElementById(\'anim'.$pm->getVar('msg_id').'\').style.visibility=\'hidden\';flash'.$pm->getVar('msg_id').'.TStopPlay(\'_level0\');" >'._MP_OEILOFF.'</a>';
  } else { $anim = false; }
	
//boutton message
if( ( $view_perms & GPERM_MESS ) ) {
if (empty($mpstop)) {
if ($pm->getVar('cat_msg') == 2) {
$view_actions[] = "<input type='submit'  class='xo-message-form' name='quote_messages'  value='". _MP_QUOTE."' onclick='javascript: document.getElementById(\"msg_mp[]\").value=\"".$pm->getVar('msg_id')."\";document.prvmsg.action=\"msgbox.php?op=sendbox&reply=1&quotedac=1\";' id='stop' disabled>";
$view_actions[] = "<input type='submit'  class='xo-message-form'  name='reply'  value='". _MP_MREPLY."' onclick='javascript: document.getElementById(\"msg_mp[]\").value=\"".$pm->getVar('msg_id')."\";document.prvmsg.action=\"msgbox.php?op=sendbox&reply=1\";' id='stop' disabled>";
}else {
$view_actions[] = "<input type='submit' class='xo-message-form'  name='quote_messages'  value='". _MP_QUOTE."' onclick='javascript: document.getElementById(\"msg_mp[]\").value=\"".$pm->getVar('msg_id')."\";document.prvmsg.action=\"msgbox.php?op=sendbox&reply=1&quotedac=1\";' >";
$view_actions[] = "<input type='submit'  class='xo-message-form'  value='". _MP_MREPLY."' onclick='javascript: document.getElementById(\"msg_mp[]\").value=\"".$pm->getVar('msg_id')."\";document.prvmsg.action=\"msgbox.php?op=sendbox&reply=1\";' >";
} }else {
$view_actions[] = "<input type='submit'  class='xo-message-form'  name='quote_messages'  value='". _MP_QUOTE."' onclick='javascript: document.getElementById(\"msg_mp\").value=\"".$pm->getVar('msg_id')."\";document.prvmsg.action=\"msgbox.php?op=sendbox&reply=1&quotedac=1\";' id='stop' disabled>";
$view_actions[] = "<input type='submit' class='xo-message-form'  value='". _MP_MREPLY."' onclick='javascript: document.getElementById(\"msg_mp[]\").value=\"".$pm->getVar('msg_id')."\";document.prvmsg.action=\"msgbox.php?op=sendbox&reply=1\";' id='stop' disabled>";
}
}
$view_actions[] = "<input type='submit'  class='xo-message-form'  id='del' value='"._MP_MDEL."' onclick='document.getElementById(\"msg_mp[]\").value=\"".$pm->getVar('msg_id')."\";document.prvmsg.action=\"delbox.php?option=delete_messages\"'>";


$view_actions[] = "<input type='submit' class='xo-message-form'  onclick='document.prvmsg.action=\"delbox.php?option=read_messages&read=0\"' id='nlu' value='"._MP_MNLU."'>";
$view_actions[] = "<input type='submit' class='xo-message-form'  onclick='document.prvmsg.action=\"delbox.php?option=move_messages\"' id='move'  value='"._MP_MMOVE."'>";
//$xoopsTpl->assign('view_actions', $view_actions);

if( ( $view_perms & GPERM_EXP ) ) {
$exporte = "<img src='".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/smallprint.png' style=\" cursor:pointer; border-width: 0px; width: 16px; height: 20px;\" onclick='document.getElementById(\"msg_mp[]\").value=\"".$pm->getVar('msg_id')."\";document.prvmsg.action=\"print.php?option=print_messages\";document.prvmsg.submit()'>&nbsp;<img src='".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/smallpdf.png' style=\"cursor:pointer; border-width: 0px; width: 16px; height: 20px;\" onclick='document.getElementById(\"msg_mp[]\").value=\"".$pm->getVar('msg_id')."\";document.prvmsg.action=\"makepdf.php?option=pdf_messages\";document.prvmsg.submit()'>&nbsp;<img src='".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/smallemail.png' title='"._MP_DESCEMAIL."' style=\" cursor:pointer; border-width: 0px; width: 16px; height: 20px;\" onclick='document.getElementById(\"msg_mp[]\").value=\"".$pm->getVar('msg_id')."\";document.prvmsg.action=\"email.php?option=email_messages\";document.prvmsg.submit()'>";
} else { $exporte = false;}

$mp_subject = $pm->getVar('subject') ? $myts->displayTarea($pm->getVar('subject')) : _MP_NONESUBJ ;
	
 $xoopsTpl->append('prive',
        	array(
	    			//'msg_id' => $pm->getVar('msg_id'),
'msg_time' => '<a id="'.$pm->getVar('msg_id').'"></a>'.formatTimestamp($pm->getVar('msg_time')),
'msg_subject' => $mp_subject,
'msg_text' => $myts->displayTarea($myts->undoHtmlSpecialChars($pm->getVar('msg_text')),$xoopsModuleConfig['html']),
'file_msg' => $file_msg,
'msg_img' => $msg_img,
'poster' => $poster,
'anim' => $anim,
'export' => $exporte,
'view_actions' => $view_actions,
	       	)
        );
		
        unset($thread_buttons);
	
        unset($eachposter);
    }
	

function round_range($n, $r)
{
  $reste = $n % $r;
  
  if($reste < ($r / 2))
  {
    $n -= $reste;
  }
  else
  {
    $n += ($r - $reste);
  }
  
  return $n;
}
	
function mp_box($pm, $i)
    {
 global $xoopsConfig, $xoopsModule, $xoopsModuleConfig, $xoopsUser, $myts, $xoopsTpl, $sortname, $sortorder, $order, $start, $limit_msg, $total_messages, $after, $catbox;
//viewstart
 $pm_handler  = & xoops_gethandler('priv_msgs');
 $viewstartcriteria = new CriteriaCompo();
 $viewstartcriteria->add(new Criteria('to_userid', $xoopsUser->getVar('uid')));
 $viewstartcriteria->add(new Criteria('cat_msg', $catbox)); 
 $viewstartcriteria->add(new Criteria('msg_pid', $pm->getVar("msg_pid"))); 
 $viewstartcriteria->setSort($sortname);
 $viewstartcriteria->setOrder($sortorder);
 $view =& $pm_handler->getObjects($viewstartcriteria);  
 foreach (array_keys($view) as $e) { 
 if ($view[$e]->getVar("msg_id") == $pm->getVar("msg_id")) {
// $viewstart = intval($e);
$viewstart = intval($e) - (intval($e)%$limit_msg) + $limit_msg - $limit_msg;
}
 } 

 
 $postername = new XoopsUser($pm->getVar("from_userid"));
 if ($postername) {
 $msg_poster = "<a href='".XOOPS_URL."/userinfo.php?uid=".$postername->getVar("uid")."'>".$postername->getVar("uname")."</a>";
 } else {
 $msg_poster = $xoopsConfig['anonymous'];
 }
		
 if ($pm->getVar('read_msg') == 1 && $pm->getVar('reply_msg') == 0) {
 $check = 1;
 $msg_icon = "<img src='".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/lus.png' id='24' alt='"._MP_R."' />";
 } elseif ($pm->getVar('reply_msg') == 1) {
 $check = 2;
 $msg_icon = "<img src='".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/reply.png' alt='"._MP_RE."' />";
 } else {  
 $check = 3;
 $msg_icon = "<img src='".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/new.png' alt='"._MP_N."' />";
 }
 if (!$pm->getVar('msg_image')) {
 $msg_img = "<img src='../../images/read.gif' alt='' />";
 } else {
 $msg_img = "<img src='../../images/subject/".$pm->getVar('msg_image')."' alt='' />";
 }
 
  if ($pm->getVar('file_msg') > 0) {
 $msg_file = "<img src='".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/upload.png' alt='' />";
 } else {  
 $msg_file = "";
 }


 $msg_view = "<img src='".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/deplierhaut.gif' alt='"._MP_R."' onclick='lookupM(".$pm->getVar('msg_id').");' />&nbsp;<img src='".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/deplierbas.gif' alt='"._MP_RE."' onclick='closefillv(".$pm->getVar('msg_id').");' />";
 
  if ($pm->getVar('anim_msg') != "") {
 $msg_anim = "<img src='".XOOPS_URL."/modules/".$xoopsModule->dirname()."/images/anim.png' alt='' />";
 } else {  
 $msg_anim = "";
 }

if (strlen($pm->getVar("subject")) >= $xoopsModuleConfig['MPmaxtitle']) {
$mp_subject = $pm->getVar('subject') ? $myts->displayTarea(substr($pm->getVar('subject'), 0, $xoopsModuleConfig['MPmaxtitle'])).'...' : _MP_NONESUBJ ;
} else {
$mp_subject = $pm->getVar('subject') ? $myts->displayTarea($pm->getVar('subject')) : _MP_NONESUBJ ;
}


        $xoopsTpl->append('prive',
        	array( 
	    			'msg_mp' => '<input type="checkbox" id="msg_mp[]" name="msg_mp[]" onClick="ChangeStatut(this)" class="'.$check.'" value="'.$pm->getVar('msg_id').'">',
	                'msg_time' => formatTimestamp($pm->getVar('msg_time')),
	                'msg_subject' => "<a href='viewbox.php?op=view&sortname=".$sortname."&sortorder=".$sortorder."&after=".$after."&start=".$i."&viewstart=".$viewstart."&catbox=".$pm->getVar('cat_msg')."#".$pm->getVar('msg_id')."'>".$mp_subject." </a>",
'msg_previous' => "<div class=\"viewBox\" id=\"suggestions".$pm->getVar('msg_id')."\" style=\"display: none;\">
 <div class=\"viewList\" id=\"autoSuggestionsList".$pm->getVar('msg_id')."\">&nbsp;</div></div>",
					'msg_icon' => $msg_icon,
					'msg_file' => $msg_file.$msg_anim,
					'msg_img' => $msg_img,
                                        'msg_view' => $msg_view,
	               'msg_poster' => $msg_poster
	       	)
        );
		
        unset($thread_buttons);
        unset($eachposter);
    }

?>