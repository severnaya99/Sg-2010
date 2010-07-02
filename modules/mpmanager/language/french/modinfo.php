<?php
// Nom du module
define('_MI_MP_NAME','MP Manager');

// Description du module
define('_MI_MP_DESC',' Gestion des messages priv&#233;s');

// Nom des menus
define('_MI_MP_ADMENU0','Index');
define('_MI_MP_ADMENU1','Tri / Purge');
define("_MI_MP_ADMENU2","Ecrire");
define("_MI_MP_ADMENU3","Purge");
define("_MI_MP_ADMENU4","Notification");
define("_MI_MP_ADMENU5","Stats");
define("_MI_MP_ADMENU6","Dossiers");
define("_MI_MP_ADMENU7","Clin d&#39;Oeil");
define("_MI_MP_ADMENU8","Permissions");

//menu utilisateur
define("_MPMANAGER_MI_MES","Message");
define("_MPMANAGER_MI_CONT","Contact");
define("_MPMANAGER_MI_FILE","Dossier");
define("_MPMANAGER_MI_OPTION","Option");
	
//block
define("_BL_MP_NEW","Nouveau message");
define("_BL_MP_CONT","Mes Contacts");

//form
define("_PM_FALALERT","Alerte stockage en octets");
define("_PM_FALALERTCOM","Vous avertira si le seuil de votre base de donn&#233;es arrive &#224; ce chiffre.");
define("_PM_ALERTBOITE","Alerte Bo&#238;te pleine");
define("_PM_COMALERTBOITE","Avertira les utilisateurs par une popup css que leur bo&#238;te est pleine.");

define("_PM_ALERTCOOK","Fr&#233;quence de l&#39;alerte");
define("_PM_COMALERTCOOK","Nombre de minutes avant la R&#233;apparition de l&#39;indication de messages / 0 pour un affichage des r&#233;ception d&#39;un nouveau message.");

define("_PM_FALOPT","Optimise la table des messages");
define("_PM_USEALERT","Nombre maxi de messages pour vos utilisateurs");
define("_PM_FILEMAX","Nombre maxi de dossiers pour vos utilisateurs");
define("_PM_NEWMSG","Indiquer les nouveaux messages");
define("_PM_POPUP","Popup Css");
define("_PM_NONE","Aucun");
define("_PM_TEXTE","Texte");
define("_PM_IMAGE","Image");
define("_PM_SON","Son");
define("_PM_ANIM","Anim");
define("_PM_FALOPTCOM","Optimisera la table apr&#232;s chaque suppression de message");
define("_PM_CSSBTEXT","Texte barre de progression / Couleur du Texte block");
define("_PM_CLINOEIL","Activer les Clins d&#39;Oeils");
define("_PM_SENDUSER","Nombre maxi d&#39;utilisateurs s&#233;lectionn&#233;s pour l&#39;envoi");
define("_PM_NOTIF","Activer la notification par email");
define("_PM_DESC_NOTIF","L&#39;utilisateur pourra toujours d&#233;sactiver pour son compte");
define("_MP_WYSIWYG","Choisir l&#39;&#233;diteur Wysiwyg");
define("_MP_WYSIWYG_DESC","L&#39;utilisateur pouras choisir entre les editeurs s&#233;l&#233;ctionner.");
define("_PM_CORP_NOTIF","Corps de l&#39;email");
define("_PM_CORP_DESC","
<strong>Balises utiles</strong> :<br /><span class='small'>
{X_UNAME} imprimera le nom de l&#39;utilisateur<br />
{X_ADMINMAIL} imprimera l&#39;e-mail du webmaster<br />
{X_SITENAME} imprimera le nom du site<br />
{X_SITEURL} imprimera l&#39;adresse du site<br />
{X_LINK} imprimera le lien de la bo&#238;te de r&#233;ception</span>");
define("_MP_AUTO","Message auto");
define("_MP_AUTO_DESC","Envoie un message &#224; vos nouveaux membres");
define("_MP_AUTO_SUBJECT","Suject du message auto");
define("_MP_AUTO_TEXT","Texte du message auto");

define("_MP_NOTIF_MAIL","Bonjour {X_UNAME},

Vous avez un nouveau message dans votre bo&#238;te de r&#233c&#233ption situ&#233e sur {X_SITENAME} 

Vous pouvez le consulter directement a cette adresse :

{X_LINK}

-----------
({X_SITEURL}) 
Le Webmestre
{X_ADMINMAIL}

------------
");

define("_MP_AUTO_MAILS","Bienvenue");
define("_MP_AUTO_MAIL","Bonjour {X_UNAME},

Nous sommes ravis de t&#39;accueillir sur {X_SITENAME} 

-----------
({X_SITEURL}) 
Le Webmestre
{X_ADMINMAIL}

------------
");

define("_PM_AUTO_PRUNE","Message de la purge");
define("_PM_PRUNE_DESC","
<strong>Balises utiles</strong> :<br /><span class='small'>
{X_COUNT} imprimera le nombre de message supprim&#233;</span>");
define("_MP_NOTIF_PRUNE","Bonjour

Pendant un nettoyage de messages priv&#233;e, 
nous avons supprim&#233; {X_COUNT} message(s) dans votre bo&#238;te de r&#233;ception.
Ceci afin de sauver de l&#39;espace et nos ressources web.");
// Nom des blocks
define('_MI_MP_BNAME','MP Manager');

//fichier joint
define("_MP_UPMAX","Nombre maxi de fichier par envoi:");
define("_MP_OPMIMETYPE","Extensions des fichiers autoris&#233;s:");
define("_MP_MIMEMAX","Taille maxi des fichiers attach&#233;s en octets:");

//profile
define("_MP_MI_LINK_TITLE", "MP");
define("_MP_MI_LINK_DESCRIPTION", "Montrer le lien pour l&#39;envoi de message");
define("_MP_MI_MESSAGE", "Ecrire un message a:");

//2.7
define("_MP_AUTOHTML", "Autoriser HTML");
define('_MP_AUTOHTML_DESC','Autoriser html dans les messages.');
define("_MP_AUTO_MESS", "Uid de votre dernier membre.");
define("_MP_MAXTITLE", "Nombre de caract&#233;res pris en compte pour le suject d'un message.");
?>