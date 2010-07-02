<?
include "header.php";
// Appel obligatoire de l'ent�te
include XOOPS_ROOT_PATH."/header.php";

// Autre appel n�cessaie
include XOOPS_ROOT_PATH."/modules/".$xoopsModule->getVar('dirname')."/include/function.php";

function edit_anniversaire() {
        
	global $xoopsUser, $xoopsDB, $xoopsModule;
	$sql = "SELECT * FROM ".$xoopsDB->prefix("users_birthday")." WHERE u_id='".$xoopsUser->getVar('uid')."'";
  	$result = $xoopsDB->query($sql);
	$nb=$xoopsDB->getRowsNum($result);
	if ($nb=='0') {
		$jour="1";
		$mois="1";
		$annee="1930";
	} else {
		while ($en = $xoopsDB->fetchArray($result)) {
			$jour=$en['jour'];
			$mois=$en['mois'];
			$annee=$en['annee'];
		}
	}
	
	echo "
	<h3 align='center'>"._MI_BD_TITRE_2."</h3>
	<p>&nbsp;</p>
	<p>
		<a href='../../userinfo.php?uid=".$xoopsUser->getVar("uid")."'>Profil</a>&nbsp;
		<span style='font-weight:bold;'>&raquo;&raquo;</span>&nbsp;"._MI_BD_EDITER."
	</p>
	<p>&nbsp;</p>
	<p> 
		<form action='".XOOPS_URL."/modules/".$xoopsModule->getVar('dirname')."/index.php' method='post'>
			<table width='40%' align='center' class='outer' border=1>
				<tr>
					<td colspan='2' class='odd'><strong>"._MI_BD_ENTRER." :</strong></td>
				</tr>
				<tr>
					<td colspan='2'>&nbsp;</td>
				</tr>
				<tr>
					<td width='30%' align='right' valign='middle'><strong>"._MI_BD_VOTRE_DATE.$jour." :</strong></td>
					<td width='70%' align='center' valign='middle'>"
						.listejour("jour",$jour)."&nbsp;<strong>/</strong>&nbsp;"
						.listemois("mois",$mois)."&nbsp;<strong>/</strong>&nbsp;"
						.listeannee("annee",(date("Y",time())-10),$annee)."
					</td>
				</tr>
				<tr>
					<td colspan='2'>&nbsp;</td>
				</tr>
				<tr>
					<td colspan='2' align='center'>
						<input type='hidden' name='uid' value='".$xoopsUser->uid()."'>
						<input type='hidden' name='op' value='save_anniversaire'>
						<input type='submit' value='"._MI_BD_SAVE."'>
					</td>
				</tr>
			</table>
		</form>
	</p>
	<p>&nbsp;</p>";
}

function save_anniversaire() {
    global $xoopsUser, $xoopsDB, $xoopsModule;
    $myts =& MyTextSanitizer::getInstance();

    $jour=$myts->htmlSpecialChars($_POST['jour']);
    $mois=$myts->htmlSpecialChars($_POST['mois']);
    $annee=$myts->htmlSpecialChars($_POST['annee']);
    $uid=$myts->htmlSpecialChars($_POST['uid']);
    

    if ($xoopsUser) {
        $sql = "SELECT * FROM ".$xoopsDB->prefix("users_birthday")." WHERE u_id='$uid'";
        $result = $xoopsDB->query($sql);
        $nb=$xoopsDB->getRowsNum($result);

        if ($nb==0) {
            $unix_time=mktime(12,0,0,$mois,$jour,$annee);
            $sql="INSERT ".$xoopsDB->prefix("users_birthday")." (u_id,jour,mois,annee,unix_time) VALUES ('$uid','$jour','$mois','$annee','$unix_time')";
            $result = $xoopsDB->query($sql);

            if ($result)
                redirect_header(XOOPS_URL,5,_MI_BD_DBUPDATED);
            //redirect_header(XOOPS_URL, 1, "OK");

            else
                redirect_header(XOOPS_URL,3,_MI_BD_NOBIRTHDAYSAVED);
        } else {
            $unix_time=mktime(12,0,0,$mois,$jour,$annee);
            $sql="UPDATE ".$xoopsDB->prefix("users_birthday")." SET jour='$jour',mois='$mois',annee='$annee', unix_time=$unix_time WHERE u_id='$uid'";
            
            $result = $xoopsDB->query($sql);

            if ($result)
                redirect_header(XOOPS_URL,5,_MI_BD_DBUPDATED);
                //redirect_header(XOOPS_URL, 10, "$unix_time");
            else
                redirect_header(XOOPS_URL,3,_MI_BD_NOBIRTHDAYSAVED);
        }
    } else {
        redirect_header(XOOPS_URL."/",3,_MI_BD_NO_ACCES);
    }
}





if(!isset($_POST['op'])) {
	$op = isset($_GET['op']) ? $_GET['op'] : 'edit_anniversaire';
} else {
	$op = $_POST['op'];
}
echo $op;
switch($op) {
	case "edit_anniversaire":
		edit_anniversaire();
		break;
	case "save_anniversaire" :
		save_anniversaire();
		break;
}

include "footer.php";
?>