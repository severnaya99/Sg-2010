<?
function b_birthday_show() {
	global $xoopsUser, $xoopsDB, $xoopsModule;
	$block = array();

	$sql="SELECT * FROM ".$xoopsDB->prefix("users_birthday")." as B, ".$xoopsDB->prefix("users")." as U WHERE B.jour LIKE '".date("d",time())."' AND B.mois LIKE '".date("m",time())."' AND U.uid=B.uid ORDER BY B.annee ASC";
  	$result = $xoopsDB->query($sql);
	$nb=$xoopsDB->getRowsNum($result);
	$block['content'] = "";
	
	if ($nb!=0) {
		$block['content'] .= "<p>";
		$block['content'] .= _MD_DB_FELICI."<p>";
		$block['content'] .= "<table style='text-align:left'><tr>";
		while ($en=mysql_fetch_array($result)) {
//modif alain01			$block['content'] .= _MD_DB_FELICI;
			$block['content'] .= "<td>";
			$block['content'] .= "<a href='".XOOPS_URL."/userinfo.php?uid=".$en['uid']."'>".$en['uname']."</a> ";
			$block['content'] .= "</td><td>";
//modif alain01			$block['content'] .= _MB_BD_TODAY;
        		$block['content'] .= "<b>".(date("Y",time())-$en['annee'])."</b>";
			$block['content'] .= _MB_BD_YEARSOLD;
			$block['content'] .= "</td><td>";
			$block['content'] .= "<a href=\"javascript:openWithSelfMain('".XOOPS_URL."/pmlite.php?send2=1&to_userid=".$en['uid']."','pmlite',640,480);\"><img src='".XOOPS_URL."/images/icons/pm_small.gif' border='0' alt='"._MB_BD_SEND.$en['uname']._MB_BD_SEND2."' align='middle'></a>";
			$block['content'] .= "</td><tr>";
		}
			$block['content'] .= "</table>";

	} else {
		$block['content'] .= "<p>";
		$block['content'] .= _MB_BD_NOBIRTHDAY;
		$block['content'] .= "</p>";
	}
	if ($xoopsUser) {
		$block['content'] .= "<p align='right'><font size=1><strong><a href=\"".XOOPS_URL."/modules/birthday/index.php\">"._MB_BD_EDIT."</a></strong></font></p>";
	}
	return $block;

}
?>
