<?php

echo "<center><img src='../images/formulaire_slogo.png'><H1>Formulaire</H1></center>";
echo "Script de mise � jour, 3.0x vers 3.2<br />";
echo "Upgrade script, 3.0x to 3.2<br /><br />";

echo "script permettant le passage d'une version 3.0 � la version 3.2. Attention, la restriction sur l'envoi des mails 
ne fonctionnera pas avec les formulaires d�j� cr��s, de plus, ni les titres ni les images des formulaires d�j� cr��s 
ne s'afficheront, veuillez donc modifier les param�tres des formulaires pour rendre ces options accessibles.
Attention, veuillez �viter de modifier un de vos formulaires pour le faire passer en QCM.
Mieux vaut cr�er un nouveau formulaire et le d�clarer QCM, afin d'�viter des pertes d'informations.<br /><br />";

echo "script to upgrade formulaire form a 3.0 version to the 3.2 version. Be careful, the form sending restriction
will not be active on forms already created, moreover, the titles and the pictures of the forms already created
will not be displayed, so, please modify form's parameters to access these options.
Be careful, don't change one of your form to make it became a QCM.
If you want a QCM, create a new form as a QCM, to avoid to lose information.<br /><br />";

include("../../../mainfile.php");
include_once XOOPS_ROOT_PATH."/class/module.errorhandler.php";

global $xoopsDB, $eh, $myts, $xoopsUser, $xoopsModule, $xoopsTpl, $xoopsConfig;
$eh = new ErrorHandler;

$test = mysql_query("SELECT * FROM ".$xoopsDB->prefix("form_form"));
$champs = mysql_num_fields($test);
if ($champs > 8) {
	echo "l'upgrade de la table form_form a d�j� �t� r�alis�<br />
	      the form_form table has already been upgraded<br /><br />";
	}
else {
$sql="ALTER TABLE ".$xoopsDB->prefix("form_form")." ADD COLUMN ip varchar(50) default NULL, ADD COLUMN time timestamp(8) NOT NULL,
ADD COLUMN rep text, ADD COLUMN nbrep int(5) default NULL, ADD COLUMN nbtot int(5) default NULL, ADD COLUMN pos int(10) default NULL";
$res = $xoopsDB->queryF($sql) or $eh->show("error");
}

$test = mysql_query("SELECT * FROM ".$xoopsDB->prefix("form_id"));
$champs = mysql_num_fields($test);
if ($champs > 15) {
	echo "l'upgrade de la table form_id a d�j� �t� r�alis�<br />
	      the form_id table has already been upgraded<br /><br />";
	}
else {
$sql="ALTER TABLE ".$xoopsDB->prefix("form_id")." ADD COLUMN onlyone varchar(5) default NULL, ADD COLUMN image varchar(255) default NULL,
ADD COLUMN nbjours int(10) default NULL, ADD COLUMN afftit varchar(5) default NULL, 
ADD COLUMN affimg varchar(5) default NULL, ADD COLUMN ordre varchar(50) default NULL,
ADD COLUMN qcm varchar(5) NOT NULL default '', ADD COLUMN affres varchar(5) default NULL, ADD COLUMN affrep varchar(5) default NULL";
$res = $xoopsDB->queryF($sql) or $eh->show("error");
}

echo "<center><a href=".XOOPS_URL.">OK</a></center>";

?>