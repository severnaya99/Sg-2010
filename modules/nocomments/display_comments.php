<?php
// Include all language files from your module, if no exist then use default english
if (!defined('_CM_TITLE')) {
if (file_exists('language/'.$GLOBALS['xoopsConfig']['language'].'/noitemcomments_lang.php')) {
  include_once 'language/'.$GLOBALS['xoopsConfig']['language'].'/noitemcomments_lang.php';
}else{
  include_once 'language/english/noitemcomments_lang.php';

}
}
global $xoopsDB, $xoopsModule, $xoopsUser,$xoopsTpl, $xoopsModuleConfig;

// Overwrite any existing $variables
$com_title = '';
$com_icon = '';
$com_text = '';
$doxcode = '';
$dobr = '';
$com_pid = '';
$com_rootid = '';
$com_id = '';
$com_order = '';
$com_mode = '';
$dosmiley = '';
$dohtml = '';

$commenthackid = $xoopsModuleConfig['hackcomid'];

// Sanitize all $_REQUESTS
$myts =& MyTextSanitizer::getInstance();
foreach ($_REQUEST as $key => $value) {
	$_REQUEST[$key]= $myts -> stripSlashesGPC(($_REQUEST[$key]));
}

$sql= "select * from ".$xoopsDB->prefix('xoopscomments')." where com_itemid='".$commenthackid.$xoopsModule->getVar('mid')."' ORDER by com_created DESC";
	$query = $xoopsDB->queryF($sql);
	$i = $xoopsDB->getRowsNum($query);
	$commentItemID = $commenthackid.$xoopsModule->getVar("mid");
	if ( $xoopsUser ){
	if ($i<=0) {
//******************** CHANGE FOLDER NAME TO YOUR MODULE **************************
		echo '<br/><div style="text-align:center;"><a id="slick-togglewrite" href="'.XOOPS_ROOT_PATH.'/modules/nocomments/comment_new.php?com_itemid='.$commentItemID.'">'._MI_NOITEMCOMMENTS_WRITENEW.'</a></div><br/>';
		echo '<div id="nocomments_combox" style="display: none;">';
		} else {
		echo '<br/><div style="text-align:center;"><a id="slick-togglewrite" href="javascript:void(0)">'._MI_NOITEMCOMMENTS_WRITENEW.'</a>'.'&nbsp;&nbsp;|&nbsp;&nbsp;<a id="slick-toggle" href="javascript:void(0)">'._MI_NOITEMCOMMENTS_SEEALL.'</a><br/></div>';
		echo '<div id="nocomments_combox" style="display: none;">';
		}
	
		
	while($row=$xoopsDB->fetchArray($query))
	{
		$id = sanitize($row['com_id']);
		$pageid = sanitize($row['com_pid']);
		$rootid = sanitize($row['com_rootid']);
		$moid = sanitize($row['com_modid']);
		$itemid = sanitize($row['com_itemid']);
		$icon = sanitize($row['com_icon']);
		$created = sanitize((date("d-m-Y H:i:s", $row['com_created'])));
		$modified = sanitize((date("d-m-Y H:i:s", $row['com_modified'])));
		$userid = sanitize($row['com_uid']);
		$ip = sanitize($row['com_ip']);
		$title = sanitize($row['com_title']);
		$text = sanitize($row['com_text']);
		$signature = sanitize($row['com_sig']);
		$status = sanitize($row['com_status']);
		$params = sanitize($row['com_exparams']);
		$dohtml = sanitize($row['dohtml']);
		$dosmiley = sanitize($row['dosmiley']);
		$xcode = sanitize($row['doxcode']);
		$doimage = sanitize($row['doimage']);
		$linebreak = sanitize($row['dobr']);
		
		$user = new XoopsUser($row['com_uid']);
		$avatar = $user->user_avatar($row['com_uid']);
		$rank = $user->rank($row['com_uid']);
		$rank_title = $rank['title'];
		$rank_image = XOOPS_UPLOAD_URL."/".$rank['image'];
			$regdate = date("d-m-Y",$user->user_regdate($row['com_uid']));
			
		$userLocation = $user->user_from($row['com_uid']);
		$numposts = $user->getVar("posts");
		$checkstatus = $user->isOnline();
			if ($checkstatus >0) {
			$status = "Online";
			} else {
			$status = "Offline";
			}

		if ($icon = '') {
			$comment_image = '';
		} else {
			$comment_image = '<img src="'.XOOPS_UPLOAD_URL."/".$icon.'"></img>';
		}
		
			if ($avatar == '') {
			$avatar = 'blank.gif';
			}
		$uname = $user->getVar('uname');
		$userinfo = "<a href='".XOOPS_URL."/modules/profile/userinfo.php?uid=".$userid."' title='".$uname."'>".$uname."</a>";
		$user_img = XOOPS_UPLOAD_URL.'/'.$avatar;
		$ip = $_SERVER["REMOTE_ADDR"];

		// Showing comments from query
		
		echo '<div class="box" id="nocomments_combox" style="display: hide;">';
		echo '<table class="outer" cellpadding="5" cellspacing="1">
				<tr></tr>';
		echo '<tr>
				<td class="head">'._MI_NOITEMCOMMENTS_BY.' '.$userinfo.'<div class="comTitle"></div></td>
				 <td class="head"><div class="comDate"><span class="comDateCaption">'._MI_NOITEMCOMMENTS_DATEPOSTED.'&nbsp;:</span>&nbsp;'.$created.'&nbsp;&nbsp;<span class="comDateCaption">'._MI_NOITEMCOMMENTS_MODERATED.':</span> '.$modified.'</div></td>
			</tr>';
		
		echo '<tr>';
		if ($id !=0) {
		echo'
          <td class="odd">
			<div class="comUserRank"><div class="comUserRankText">'.$rank_title.'</div><img class="comUserRankImg" src="'.$rank_image.'" alt="" /></div>
			<img class="comUserImg" src="'.$user_img.'" alt="" />
			<div class="comUserStat"><span class="comUserStatCaption">'._MI_NOITEMCOMMENTS_MEMBERSINCE.':</span> '.$regdate.'</div>
			<div class="comUserStat"><span class="comUserStatCaption">'._MI_NOITEMCOMMENTS_LOCATION.':</span> '.$userLocation.'</div>
			<div class="comUserStat"><span class="comUserStatCaption">'._MI_NOITEMCOMMENTS_POSTS.':</span> '.$numposts.'</div>
			<div class="comUserStatus">'.$status.'</div>
		</td>';
		} else {
		echo '<td class="odd"> </td>';
		}
		
		echo '<td class="odd">
            <div class="comTitle"><h3 style=\"font-variant: small-caps\">'.$title.'</h3></div><div class="comText">'.$text.'</div>
          </td>
        </tr>
        <tr>
			<td class="even"></td>';
          
		  // If admin show edit / delete
		if ( $xoopsUser ){	
		 if ( $xoopsUser->isAdmin() ) {


          echo '<td class="even" style="text-align:right;">
            <a href="comment_edit.php?com_id='.$id.'" title="'._MI_NOITEMCOMMENTS_EDIT.'"><img src="'.XOOPS_URL.'/images/icons/edit.gif" alt="_edit" /></a>
			<a href="comment_delete.php?com_id='.$id.'" title="'._MI_NOITEMCOMMENTS_DELETE.'"><img src="'.XOOPS_URL.'/images/icons/delete.gif" alt="_delete" /></a>
          </td>';
		  }
          
		  /* IF user posting then show edit delete
		  elseif ($xoops_isuser == true && $xoops_userid == $uid) {

          echo '<td class="even" align="right">
            <a href="comment_edit.php?com_id='.$id.'" title="_edit"><img src="'.XOOPS_URL.'/images/icons/edit.gif" alt="_edit" /></a>
				</td>';
		  }*/
		 }
			  else {
			  echo '<td class="even"> </td>';
			  }
          

        echo '</tr>
<!-- end comment post -->
</table>';
		echo "</div>";
	}
	echo '</div>';
	
}
else
if ($i<=0) {
		echo '<br/><div style="text-align:center;"><a href="'.XOOPS_URL.'/register.php">Register</a> or <a href="'.XOOPS_URL.'/user.php">login</a> to post comment</div><br/>';
		echo '<div id="nocomments_combox" style="display: none;">';
		} else {
		echo '<br/><div style="text-align:center;"><a href="'.XOOPS_URL.'/register.php">Register</a> or <a href="'.XOOPS_URL.'/user.php">login</a> to post comment'.'&nbsp;&nbsp;|&nbsp;&nbsp;<a id="slick-toggle" href="javascript:void(0)">'._MI_NOITEMCOMMENTS_SEEALL.'</a></div><br/>';
		echo '<div id="nocomments_combox" style="display: none;">';
		}
	
		
	while($row=$xoopsDB->fetchArray($query))
	{
		$id = sanitize($row['com_id']);
		$pageid = sanitize($row['com_pid']);
		$rootid = sanitize($row['com_rootid']);
		$moid = sanitize($row['com_modid']);
		$itemid = sanitize($row['com_itemid']);
		$icon = sanitize($row['com_icon']);
		$created = sanitize((date("d-m-Y H:i:s", $row['com_created'])));
		$modified = sanitize((date("d-m-Y H:i:s", $row['com_modified'])));
		$userid = sanitize($row['com_uid']);
		$ip = sanitize($row['com_ip']);
		$title = sanitize($row['com_title']);
		$text = sanitize($row['com_text']);
		$signature = sanitize($row['com_sig']);
		$status = sanitize($row['com_status']);
		$params = sanitize($row['com_exparams']);
		$dohtml = sanitize($row['dohtml']);
		$dosmiley = sanitize($row['dosmiley']);
		$xcode = sanitize($row['doxcode']);
		$doimage = sanitize($row['doimage']);
		$linebreak = sanitize($row['dobr']);
		
		$user = new XoopsUser($row['com_uid']);
		$avatar = $user->user_avatar($row['com_uid']);
		$rank = $user->rank($row['com_uid']);
		$rank_title = $rank['title'];
		$rank_image = XOOPS_UPLOAD_URL."/".$rank['image'];
		$regdate = date("d-m-Y",$user->user_regdate($row['com_uid']));
		$userLocation = $user->user_from($row['com_uid']);
		$numposts = $user->getVar("posts");
		$checkstatus = $user->isOnline();
			if ($checkstatus >0) {
			$status = "Online";
			} else {
			$status = "Offline";
			}

		if ($icon = '') {
			$comment_image = '';
		} else {
			$comment_image = '<img src="'.XOOPS_UPLOAD_URL."/".$icon.'" alt=""></img>';
		}
		
			if ($avatar == '') {
			$avatar = 'blank.gif';
			}
		$uname = $user->getVar('uname');
		$userinfo = "<a href='".XOOPS_URL."/modules/profile/userinfo.php?uid=".$userid."' title='".$uname."'>".$uname."</a>";
		$user_img = XOOPS_UPLOAD_URL.'/'.$avatar;
		$ip = $_SERVER["REMOTE_ADDR"];

		// Showing comments from query
		
		echo '<div class="box" id="nocomments_combox" style="display: hide;">';
		echo '<table class="outer" cellpadding="5" cellspacing="1">
				<tr></tr>';
		echo '<tr>
				<td class="head">'._MI_NOITEMCOMMENTS_BY.' '.$userinfo.'<div class="comTitle"></div></td>
				 <td class="head"><div class="comDate"><span class="comDateCaption">'._MI_NOITEMCOMMENTS_DATEPOSTED.'&nbsp;:</span>&nbsp;'.$created.'&nbsp;&nbsp;<span class="comDateCaption">'._MI_NOITEMCOMMENTS_MODERATED.':</span> '.$modified.'</div></td>
			</tr>';
		
		echo '<tr>';
		if ($id !=0) {
		echo'
          <td class="odd">
			<div class="comUserRank"><div class="comUserRankText">'.$rank_title.'</div><img class="comUserRankImg" src="'.$rank_image.'" alt="" /></div>
			<img class="comUserImg" src="'.$user_img.'" alt="" />
			<div class="comUserStat"><span class="comUserStatCaption">'._MI_NOITEMCOMMENTS_MEMBERSINCE.':</span> '.$regdate.'</div>
			<div class="comUserStat"><span class="comUserStatCaption">'._MI_NOITEMCOMMENTS_LOCATION.':</span> '.$userLocation.'</div>
			<div class="comUserStat"><span class="comUserStatCaption">'._MI_NOITEMCOMMENTS_POSTS.':</span> '.$numposts.'</div>
			<div class="comUserStatus">'.$status.'</div>
		</td>';
		} else {
		echo '<td class="odd"> </td>';
		}
		
		echo '<td class="odd">
            <div class="comTitle"><h3 style=\"font-variant: small-caps\">'.$title.'</h3></div><div class="comText">'.$text.'</div>
          </td>
        </tr>
        <tr>
			<td class="even"></td>';
          
		  // If admin show edit / delete
		if ( $xoopsUser ){	
		 if ( $xoopsUser->isAdmin() ) {


          echo '<td class="even" style="text-align:right;">
            <a href="comment_edit.php?com_id='.$id.'" title="'._MI_NOITEMCOMMENTS_EDIT.'"><img src="'.XOOPS_URL.'/images/icons/edit.gif" alt="_edit" /></a>
			<a href="comment_delete.php?com_id='.$id.'" title="'._MI_NOITEMCOMMENTS_DELETE.'"><img src="'.XOOPS_URL.'/images/icons/delete.gif" alt="_delete" /></a>
          </td>';
		  }
          
		  /* IF user posting then show edit delete
		  elseif ($xoops_isuser == true && $xoops_userid == $uid) {

          echo '<td class="even" align="right">
            <a href="comment_edit.php?com_id='.$id.'" title="_edit"><img src="'.XOOPS_URL.'/images/icons/edit.gif" alt="_edit" /></a>
				</td>';
		  }*/
		 }
			  else {
			  echo '<td class="even"> </td>';
			  }
          

        echo '</tr>
<!-- end comment post -->
</table>';
		echo "</div></div>";
	}


?>