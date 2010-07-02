<?php

echo "<center><img src='../images/formulaire_slogo.png'><H1>Formulaire</H1></center>";
echo "Script de mise à jour, 3.1x vers 3.2<br />";
echo "Upgrade script, 3.1x to 3.2<br /><br />";

echo "script permettant le passage d'une version 3.1 à la version 3.2. Attention, veuillez éviter de modifier un de vos formulaires pour le faire passer en QCM.
Mieux vaut créer un nouveau formulaire et le déclarer QCM, afin d'éviter des pertes d'informations.<br /><br />";

echo "script to upgrade formulaire form a 3.1 version to the 3.2 version. Be careful, don't change one of your form to make it became a QCM.
If you want a QCM, create a new form as a QCM, to avoid to lose information.<br /><br />";

include("../../../mainfile.php");
include_once XOOPS_ROOT_PATH."/class/module.errorhandler.php";

global $xoopsDB, $eh, $myts, $xoopsUser, $xoopsModule, $xoopsTpl, $xoopsConfig;
$eh = new ErrorHandler;

$test = mysql_query("SELECT * FROM ".$xoopsDB->prefix("form_form"));
$champs = mysql_num_fields($test);
if ($champs > 10) {
	echo "l'upgrade de la table form_form a déjà été réalisé<br />
	      the form_form table has already been upgraded<br /><br />";
	}
else {
$sql="ALTER TABLE ".$xoopsDB->prefix("form_form")." ADD COLUMN rep text, ADD COLUMN nbrep int(5) default NULL, 
ADD COLUMN nbtot int(5) default NULL, ADD COLUMN pos int(10) default NULL";
$res = $xoopsDB->queryF($sql) or $eh->show("error");
}

$test = mysql_query("SELECT * FROM ".$xoopsDB->prefix("form_id"));
$champs = mysql_num_fields($test);
if ($champs > 21) {
	echo "l'upgrade de la table form_id a déjà été réalisé<br />
	      the form_id table has already been upgraded<br /><br />";
	}
else {
$sql="ALTER TABLE ".$xoopsDB->prefix("form_id")." ADD COLUMN qcm varchar(5) default NULL, ADD COLUMN affres varchar(5) default NULL,
ADD COLUMN affrep varchar(5) NOT NULL default ''";
$res = $xoopsDB->queryF($sql) or $eh->show("error");
}

echo "<center><a href=".XOOPS_URL.">OK</a></center>";

?>