<?php

define("_DOC_MOD_INSTALL","Installation du module");
define("_DOC_PRE_INSTALL","Pr&eacute;-requis");
define("_DOC_NEW_INSTALL","Nouvelle installation");
define("_DOC_MAJ_INSTALL","Mise &agrave; jour d'une version ant&eacute;rieure");
define("_DOC_PROC_INSTALL","Proc&eacute;dure d'installation");

define("_DOC_PRE","Afin d'utiliser le module formulaire, sont n&eacute;cessaires :
<ul>
	<li>la version 2.0.7 de xoops, ou plus r&eacute;cent</li>
	<li>il faut faire un chmod 777 sur le r&eacute;pertoire upload du module</li>
	<li>xoops doit &ecirc;tre configur&eacute; pour pouvoir envoyer des mails</li>");

define("_DOC_INSTALL","Vous d&eacute;marrez de z&eacute;ro et n'avez pas de migration &agrave; faire, voici la proc&eacute;dure &agrave; suivre : 
<ul>
  <li>t&eacute;l&eacute;chargez le module</li>
  <li>v&eacute;rifiez que votre r&eacute;pertoire modules ne contient pas d&eacute;j&agrave; un dossier formulaire, si c'est le cas supprimez-le</li>
  <li>d&eacute;compressez le contenu du fichier dans le r&eacute;pertoire modules de votre site </li>
  <li>installer le module </li>
  <li>note : il n'y a pas d'accès au module dans le menu principal</li>");

define("_DOC_MAJ","Suite aux nombreuses modifications effectu&eacute;es dans la version 3, il n'est pas possible de r&eacute;aliser de mise &agrave; jour d'une version ant&eacute;rieure.<br /> Il est donc pr&eacute;f&eacute;rable de d&eacute;sinstaller votre version de formulaire puis d'installer cette nouvelle mouture.");
define("_DOC_PROC","Apr&egrave;s avoir install&eacute; le module : <ul>
<li>activez les blocs dans la partie 'Blocs et Groupes' du module</li>
<li>un formulaire de d&eacute;mo est cr&eacute;&eacute; &agrave; l'installation, il faut accorder les permissions aux utilisateurs afin que ce formulaire soit visible c&ocirc;t&eacute; utilisateur</li>
<li>si vous travaillez en local, le formulaire de d&eacute;mo est accessible, si vous travaillez sur un site distant, vous devez aller dans la partie menu du module et modifier l'url d'acc&egrave;s du formulaire</li>
<li>le formulaire est maintenant accessible et l'installation termin&eacute;e</li>");

define("_DOC_MOD_CONFIG","Configuration du module");
define("_DOC_PREF_CONFIG","Pr&eacute;f&eacute;rences");
define("_DOC_BLGR_CONFIG","Blocs et Groupes");

define("_DOC_PREF","Ceux sont des param&egrave;tres valables dans tout le module, pour n'importe quel formulaire, mais qui peuvent &ecirc;tre modifi&eacute;es pour chaque &eacute;l&eacute;ment concern&eacute;. On trouve :
<ul>
	<li>Largeur par d&eacute;faut des text boxes : correspond &agrave; la largeur des boites de texte lorsqu'elles s'affichent &agrave; l'&eacute;cran</li>
	<li>Longueur maximum par d&eacute;faut des text boxes : correspond &agrave; la longueur maximale de la valeur rentr&eacute;e dans une boite de texte</li>
	<li>Nombre de lignes par d&eacute;faut des text areas : correspond &agrave; la hauteur qu'auront les zones de texte lors de leur affichage</li>
	<li>Nombre de colonnes par d&eacute;faut des text areas : correspond &agrave; la largeur qu'auront les zones de texte lors de leur affichage</li>
	<li>Poids par d&eacute;faut des fichiers joints (en Ko) : correspond &agrave; la taille maximale des fichiers joints dans les mails</li>
	<li>D&eacute;limiteur pour les check boxes et les radio buttons : correspond &agrave; la s&eacute;paration entre les cases &agrave; cocher et boutons radio, cette s&eacute;paration peut &ecirc;tre un espace ou un saut de ligne</li>");

define("_DOC_BLGR","Cette partie permet de g&eacute;rer les blocs du module ainsi que les permissions pour chaque groupe
<ul>
	<li>La premi&egrave;re partie permet de g&eacute;rer les diff&eacute;rents blocs du module directement dans le module, et non dans le module syst&egrave;me</li>
	<li>La deuxi&egrave;me partie permet de g&eacute;rer les permissions pour les formulaires et les blocs pour chaque groupe (webmestres, utilisateurs enregistr&eacute;s, utilisateurs anonymes)</li>");

define("_DOC_MOD_GESFORM","Gestion des formulaires");
define("_DOC_CREAT_GESFORM","Cr&eacute;ation d'un formulaire");
define("_DOC_CREAT","Avant de pouvoir utiliser un formulaire, il faut donc le cr&eacute;er. Pour cela, on trouve plusieurs param&egrave;tres :<ul>
	<li>Titre du formulaire, avec la possibilit&eacute; de l'afficher ou non</li>
	<li>Image du formulaire, avec la possibilit&eacute; de l'afficher ou non</li>
	<li>Premier &eacute;l&eacute;ment &agrave; afficher sur la page, le titre ou l'image, si ceux ci sont affich&eacute;s</li>
	<li>QCM, s'il est coch&eacute;, alors ce formulaire est un QCM et non un formulaire</li>
	<li>Param&egrave;tres d'affichage d'informations du QCM dans les mails, si QCM est coch&eacute;</li>
	<li>Param&eacute;tres mail : </li><ul>
			<li>Adresse e-mail</li>
			<li>Groupe</li>
			<li>Envoyer uniquement &agrave; l'admin</li>
			<li>Recevoir le formulaire rempli</li>
			<li>Si 'Envoyer uniquement &agrave; l'admin' est coch&eacute;e, alors le formulaire ne sera envoyé qu'&agrave; l'admin et &agrave; l'exp&eacute;diteur si la case 'recevoir le formulaire rempli' est coch&eacute;e. Sinon, il est envoy&eacute; &agrave; l'adresse e-mail, au groupe et &agrave; l'exp&eacute;diteur si la case est coch&eacute;e</li>
			</ul>
	<li>Url de retour apr&egrave;s l'envoi du formulaire, par d&eacute;faut XOOPS_URL</li>
	<li>Bulle d'aide du formulaire, message s'affichant lors du passage de la souris sur le nom du formulaire dans le bloc</li>
	<li>Texte pour le bouton d'envoi du formulaire, par d&eacute;faut Envoyer</li>
	<li>El&eacute;ments &agrave; envoyer dans le mail</li><ul>
			<li>Le nom de l'exp&eacute;diteur, un lien permet d'acc&eacute;der &agrave; son profil dans le mail envoy&eacute;</li>
			<li>L'adresse IP</li>
			<li>Le navigateur web utilis&eacute;</li>
			</ul>
	<li>Le codage du texte pour l'envoi des mails</li>
	<li>Enregistrement des envois des formulaires dans la base, pour la consultation et l'exportation</li>
	<li>Nombre d'envois par utilisateur, s'il est coch&eacute;, alors on restreint l'utilisateur &agrave; un seul envoi, ensuite, possibilit&eacute; de mettre un nombre de jours s&eacute;parant deux envois cons&eacute;cutifs,si la premi&egrave;re case a &eacute;t&eacute; coch&eacute;e</li>");

define("_DOC_RENOM_GESFORM","Renommer un formulaire");
define("_DOC_RENOM","Lorsqu'un formulaire a &eacute;t&eacute; cr&eacute;&eacute;, il est possible de le renommer.<br />
Pour cela, il suffit simplement de s&eacute;lectionner le formulaire &agrave; renommer puis de rentrer le nouveau nom.");

define("_DOC_SUP_GESFORM","Supprimer un formulaire");
define("_DOC_SUP","Un formulaire peut &ecirc;tre supprim&eacute;.<br /> Dans ce cas l&agrave;, le formulaire est supprim&eacute;, mais tous les &eacute;l&eacute;ments qui le composaient le sont &eacute;galement, ainsi que les envois enregistr&eacute;s.<br />
Pour cela, il suffit de choisir le formulaire &agrave; supprimer, puis un message demande la confirmation de la suppression."); 
 
define("_DOC_MODIF_GESFORM","Modifier les &eacute;l&eacute;ments d'un formulaire");
define("_DOC_MODIF","Il faut ajouter des &eacute;l&eacute;ments aux formulaires afin de pouvoir les remplir.<br /> On trouve 10 types d'&eacute;l&eacute;ments :<ul>
	<li>Boite de texte : simple zone de texte, sur une ligne</li>
	<li>Zone de texte : zone de texte sur plusieurs lignes</li>
	<li>Zone de texte non modifiable : zone de texte s'affichant dans le formulaire, mais ne pouvant pas &ecirc;tre modifi&eacute;e</li>
	<li>Boite de s&eacute;lection : liste d'items permettant une s&eacute;lection, multiple ou non</li>
	<li>Cases &agrave; cocher : cases permettant la s&eacute;lection d'un seul &eacute;l&eacute;ment</li>
	<li>Boutons radio : m&ecirc;me syst&egrave;me que les cases &agrave; cocher</li>
	<li>Bouton oui/non : deux boutons radio, un pour oui, l'autre pour non</li>
	<li>Date : permet de choisir une date dans un mini calendrier</li>
	<li>Ligne de s&eacute;paration : permet de s&eacute;parer le formulaire en deux parties</li>
	<li>Joindre un fichier : permet de joindre un fichier au formulaire</li>
	</ul>
	Chaque &eacute;l&eacute;ment peut &ecirc;tre configur&eacute; ind&eacute;pendamment des autres.<br /> On trouve diff&eacute;rents param&egrave;tres, qui peuvent diff&eacute;rer suivant le type d'&eacute;l&eacute;ment.<br />
	On trouve toujours : <ul>
	<li>Le nom de l'&eacute;l&eacute;ment</li>
	<li>S'il est requis ou non</li>
	<li>L'ordre d'affichage, pouvant &ecirc;tre modifi&eacute; directement sur la page listant les &eacute;l&eacute;ments, par l'interm&eacute;diaire de fl&ecirc;ches</li>
	</ul>
	Pour les autres param&egrave;tres, cela d&eacute;pend du type d'&eacute;l&eacute;ment.<br /><br />
	Chaque &eacute;l&eacute;ment peut bien s&ucirc;r &ecirc;tre modifi&eacute;, supprim&eacute; ou encore clon&eacute;. Il est &eacute;galement possible de choisir si l'on veut les afficher ou non.<br />
	Enfin, un lien permet d'acc&eacute;der directement au formulaire c&ocirc;t&eacute; utilisateur.");
	
define("_DOC_PARAM_GESFORM","Modifier les param&egrave;tres d'un formulaire");
define("_DOC_PARAM","Il est possible de modifier tous les param&egrave;tres rentrés lors de la cr&eacute;ation d'un formulaire.<br />
Pour cela, il suffit de s&eacute;lectionner un formulaire, tous les param&egrave;tres rentr&eacute;s lors de la cr&eacute;ation sont alors rappel&eacute;s et il est possible de tout modifier.");

define("_DOC_STAT_GESFORM","Statut d'un formulaire");
define("_DOC_STAT","Le statut du formulaire permet de d&eacute;finir si le formulaire sera disponible c&ocirc;t&eacute; utilisateur ou non.<br />
Activ&eacute;, il est visible, d&eacute;sactiv&eacute, il est invisible mais pas supprim&eacute;.");

define("_DOC_PERM_GESFORM","Permissions");
define("_DOC_PERM","Il est possible d'attribuer le droit d'acc&eacute;der &agrave; chaque formulaire, et ceci pour chaque groupe, Webmestres, Utilisateurs enregistr&eacute;s et Utilisateurs anonymes.<br />
Si les droits ne sont pas accord&eacute;s, les formulaires ne seront pas visibles. C'est pourquoi, d&egrave;s la cr&eacute;ation d'un nouveau formulaire, il est n&eacute;cessaire de passer par la case permissions.<br />
Une case 'Tous' permet d'accorder les droits sur tous les formulaires pour chaque groupe.<br />
Les permissions peuvent bien s&ucirc;r &ecirc;tre modifi&eacute;es &agrave; n'importe quel moment.");

define("_DOC_UTIL_GESFORM","Partie utilisateur");
define("_DOC_UTIL","Du c&ocirc;t&eacute; utilisateur, il suffit de cliquer sur un nom de formulaire dans le bloc.<br />
Une bulle d'aide sur chaque formulaire permet &agrave; l'utilisateur de trouver plus facilement le formulaire d&eacute;sir&eacute;.<br />
Le formulaire s'affiche alors, l'utilisateur n'a qu'&agrave; le remplir et &agrave; appuyer sur le bouton d'envoi.");

define("_DOC_MOD_CONSULT","Consultation des formulaires");
define("_DOC_CONS_CONSULT","Consultation");
define("_DOC_CONSULT","Lorsqu'un formulaire est envoy&eacute; par un utilisateur, il peut &ecirc;tre enregistr&eacute;.<br /> Il est alors possible de consulter tous les envois de chacun des formulaires et QCMs pour lesquels les envois sont enregistrés.<br />
Il faut tout d'abord s&eacute;lectionner un formulaire. S'il ne contient pas d'enregistrements, un message pr&eacute;vient l'utilisateur, sinon, on acc&egrave;de &agrave; la liste des envois.
(Pour un QCM, on peut voir sur cette page la moyenne de bonnes r&eacute,ponses du QCM.)<br />
Il est possible de les classer par date d'envoi mais aussi par utilisateur. Ensuite, il suffit de choisir un envoi.<br />
On peut alors observer tous les champs du formulaire, ainsi que les valeurs rentr&eacute;es par l'utilisateur.<br />
Dans le cas d'un QCM, on voit &eacute;galement les bonnes r&eacute;ponses, ainsi que le nombre total de bonnes r&eacute;ponses.<br />
Un lien permet d'acc&eacute;der directement au profil de l'exp&eacute;diteur.<br />
Chaque envoi peut &ecirc;tre supprim&eacute; ind&eacute;pendamment, il est aussi possible de supprimer directement tous les envois d'un formulaire.");  
define("_DOC_FORM_CONSULT","Formulaire");
define("_DOC_QCM_CONSULT","QCM");

define("_DOC_STAT_CONSULT","Statistiques");
define("_DOC_STATI","Des statistiques sont disponibles pour les formulaires et QCMs.<br />
Elles regroupent les r&eacute;ponses saisies dans les formulaires et QCMs, pour les &eacute;l&eacute;ments checkbox, select, bouton radio et bouton oui/non.<br />
On peut observer les pourcentages de r&eacute;ponses et le nombre total de r&eacute;ponses.<br />
Pour un QCM, on observe les r&eacute;sultats uniquement pour les bonnes r&eacute;ponses, et on on voit &eacute;galement le pourcentage de r&eacute;ussite.");  
 
define("_DOC_MOD_EXPORT","Exportation des formulaires");
define("_DOC_EXP_EXPORT","Exportation");
define("_DOC_EXPORT","Comme pour la partie consultation, il est ici possible d'observer les diff&eacute;rents envois pour chaque formulaire.<br />
Il faut donc tout d'abord s&eacute;lectionner un formulaire dans la liste.<br />
Le formulaire est alors aussit&ocirc;t export&eacute;. Un message apparait alors &agrave; l'&eacute;cran pour informer l'utilisateur du bon fonctionnement de l'op&eacute;ration.<br />
La liste des formulaires apparait alors et un lien permet d'acc&eacute;der au fichier cr&eacute;&eacute; lors de l'exportation.<br /><br />
Les envois du formulaire sont export&eacute;s au format CSV, dans le fichier www/uploads/form.csv.<br />
Dans le fichier, les donn&eacute;es sont s&eacute;par&eacute;es par des ';'.<br />
Ce format est compatible avec Excel.");  

define("_DOC_MOD_MENU","Gestion des &eacute;l&eacute;ments du menu");
define("_DOC_MENU_MENU","Menu");

define("_DOC_MENU","Lorsqu'un nouveau formulaire est cr&eacute;&eacute;, un &eacute;l&eacute;ment est automatiquement ajout&eacute; dans le menu.<br />
Ce menu correspond aux &eacute;l&eacute;ments visibles c&ocirc;t&eacute; utilisateur.<br />
Il est possible de changer leur ordre, en cliquant sur les fl&ecirc;ches pour monter et descendre les &eacute;l&eacute;ments.<br />
En cliquant sur l'URL, on acc&egrave;de au formulaire c&ocirc;t&eacute; utilisateur.<br />
Il est possible d'activer ou d&eacute;sactiver chaque &eacute;l&eacute;ment, afin de le rendre visible ou non.<br />
Chaque &eacute;l&eacute;ment peut &ecirc;tre &eacute;dit&eacute;.<br />
Il est alors possible de modifier : <ul>
	<li>La position de l'&eacute;l&eacute;ment</li>
	<li>Son nom</li>
	<li>L'indentation gauche, c'est &agrave; dire le d&eacute;calage vers la droite</li>
	<li>La police de caract&egrave;res, normal ou gras</li>
	<li>L'url pour acc&eacute;der au formulaire</li>
	<li>La marge sup&eacute;rieure</li>
	<li>La marge inf&eacute;rieure</li>
	<li>Le statut, actif ou inactif</li>");  

define("_DOC_MOD_DIV","Divers");
define("_DOC_SERV_DIV","Info serveur");
define("_DOC_ABOUT_DIV","A propos");

define("_DOC_SERV","Cette page affiche des informations sur le serveur.<br />
Elle affiche la version du serveur apache ainsi que les jeux de caract&egrave;res autoris&eacute;s.<br />
Elle affiche ensuite le support et la version de la biblioth&egrave;que.<br />
Ensuite, nous pouvons observer quelques informations de configuration."); 

define("_DOC_ABOUT","On retrouve sur cette page des informations sur le d&eacute;veloppement du module.<br />
On peut voir le nom des d&eacute;veloppeurs.<br />
Ensuite, on trouve le statut du module, ainsi que des liens vers des sites de support, mais aussi des pages de rapport de bugs et d'am&eacute;liorations.<br />
On trouve ensuite les limites de responsabilité par rapport au module."); 

define("_DOC_MOD_RECO","Recommandations");
define("_DOC_RECO","Les diff&eacute;rents tests qui ont &eacute;t&eacute; r&eacute;alis&eacute;s d&eacute;montrent une meilleure performance de l'affichage avec Firefox.<br />
L'affichage avec Internet Explorer est identique hormis sur le bloc c&ocirc;t&eacute; utilisateur, la bulle d'aide sur les formulaires ne s'affichant pas.<br /><br />
Quelque soit votre situation (nouvelle installation ou mise &agrave; jour), proc&eacute;dez &agrave; une sauvegarde compl&egrave;te de votre site (fichiers et tables de la base de donn&eacute;es), testez vos mises &agrave; jour sur un clone de votre site, en effet si une installation de module est une op&eacute;ration habituellement simple, les d&eacute;pendances qu'utilisent ce module sont relativement nombreuses et les mises au point n&eacute;cessaires se doivent d'&ecirc;tre r&eacute;alis&eacute;es en dehors de votre environnement de production (site web public). ");

define("_DOC_MENU_INSTALL","Installation");
define("_DOC_MENU_CONFIG","Configuration");
define("_DOC_MENU_PREF","Pr&eacute;f&eacute;rences");
define("_DOC_MENU_BLGR","Blocs et Groupes");
define("_DOC_MENU_GESFORM","Gestion des formulaires");
define("_DOC_MENU_CREATFORM","Cr&eacute;ation d'un formulaire");
define("_DOC_MENU_RENFORM","Renommer un formulaire");
define("_DOC_MENU_SUPFORM","Supprimer un formulaire");
define("_DOC_MENU_MODFORM","Modifier les &eacute;l&eacute;ments");
define("_DOC_MENU_MODPFORM","Modifier les param&egrave;tres d'un formulaire");
define("_DOC_MENU_STAT","Statut");
define("_DOC_MENU_PERM","Permissions");
define("_DOC_MENU_USER","Partie utilisateur");
define("_DOC_MENU_CONS","Consultation");
define("_DOC_MENU_EXP","Exportation");
define("_DOC_MENU_MEN","Menu");
define("_DOC_MENU_DIV","Divers");
define("_DOC_MENU_REC","Recommandations");
define("_DOC_MENU_STATI","Statistiques");
?>