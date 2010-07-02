<?php
/**
 * @translation     XooFoo.org (http://www.xoofoo.org/)
 * @specification   _LANGCODE: fr
 * @specification   _CHARSET: UTF-8 sans Bom
 *
 * @Translator      kris (http://www.xoofoo.org)
 *
 * @version         $Id $
**/

if (!defined('_NOCOMMENTS_MODULE_NAME')){
define('_NOCOMMENTS_MODULE_NAME', 'Ajout Commentaires');
define('_NOCOMMENTS_MODULE', 'Comment ajouter les commentaires dans tout module');
define('_NOCOMMENTS_MODULEDESC', 'Comment ajouter la fonction de commentaires dans tout module XOOPS.');
define('_NOCOMMENTS_BEGIN', 'Ce module montre la méthode dont fonctionne ce hack ainsi que la description des modifications à apporter à vos modules. Il n\'y a pas d\'importance si votre module  utilise SQL ou non, vous pouvez maintenant construire un module simple avec un fichier index.php contenant par exemple seulement un javascript, et toujours obtenir des commentaires sur ce module.');
define('_NOCOMMENTS_AUTHOR', 'Ce hack est rendu possible grâce à la collaboration entre Culex et Runeher. Unissons nos forces dans XOOPS, et ensemble faisons bouger les choses ! :)');
define('_NOCOMMENTS_BEGIN2', 'Il y a quelques opérations pour l\'implémenter :');
define('_NOCOMMENTS_BEGIN3', 'Premièrement, copier les dossiers et fichiers suivants dans le répertoire de votre module :');

define('_NOCOMMENTS_BEGIN4', '
<ul><li>comment_delete.php</li>
<li>comment_edit.php</li>
<li>comment_new.php</li>
<li>comment_post.php</li>
<li>comment_reply.php</li>
<li>comment_view.php</li>
<li>commentform.php</li>
<li>display_comments.php</li>
<li>extra_functions.php</li>
<li>Dossier"<strong>js</strong>" (ou ajouter les fichiers dans le dossier "js" existant).</li>
<li>Dossier "language" (ou ajouter dans language/french/noitemcomments_lang.php à votre dossier existant de langue).</li></ul>
');

define('_NOCOMMENTS_BEGIN5', 'Ensuite, vous devez connecter les commentaires à votre module en ajoutant 3 "include" comme décrit ci-dessous. Rechercher les lignes commentées et copiez les dans votre module. N\'oubliez pas de changer le nom du module dans les fichiers.');

define('_NOCOMMENTS_BEGIN6', 'Ensuite, procédez comme ceci :');

define('_NOCOMMENTS_BEGIN7', '<ul><li>Ouvez le fichier xoop_version.php de <strong>ce module</strong> et copiez les lignes commentées dans  le xoops_version.php de <strong>votre module</strong>.</li>
<li>Ouvrez le fichier display_comments.php et faites comme indiqué à la ligne 41.</li>
<li>Ouvrez le fichier preloads/core.php et suivez les indications des lignes commentées.</li></ul>');

define('_NOCOMMENTS_BEGIN8', '<p>Au final : <strong>Mettez à jour votre module !</strong></p><p>Nota : ce hack requiert une version XOOPS version 2.4.0 ou supérieure. <a href="http://www.xoops.org/modules/core/" rel="external">Mettre à jour sa version de XOOPS</a> si vous désirez le mettre en oeuvre !</p><div style="font-size:1.1em; font-weight: bold; text-align: center;"><a href="#">Télécharger le code Source</a></div>');
}
?>