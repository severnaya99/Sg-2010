Lisez-moi pour MP Manager version 2.6

#################################################
MISE A JOUR
#################################################

- Ecraser le dossier mpmanager, mettre � jour le module depuis l'administration du site.
- En cas d'utilisation d'un jeu de templates personnalis�, supprimer les templates du module pour les reg�n�rer.
- Utiliser le menu Int�gration pour la copie des plugins ou reporter vous a la section "copie manuelle"
- Rendez-vous dans l'administration du module pour cr�er les permissions.


#################################################
Installation
#################################################

- Uploader tout le dossier 'mpmanager' dans le dossier <xoops_root>/modules/
- Aller dans l�admininistration de votre site pour installer le module.
- Aller dans l'admininistration du module, puis utiliser le lien 'Integration' pour copier les plugin ou reporter vous a la section "copie manuelle".
- Rendez-vous dans l'administration du module pour cr�er les permissions.


#################################################
ATTENTION SAUVEGARDER UNE COPIE DE VOS FICHIERS
#################################################

#################################################
Copier manuellement les fichiers contenus dans le dossier "root"
#################################################

respecter la structure des dossiers et sous-dossiers

function.xoManager.php (nouveau fichier)
function.xoManagerCount.php (nouveau fichier)
function.xoManagerCountAll.php (nouveau fichier)
pmlite.php (sauvegarder le fichier existant et �craser)

surcharge de templates.
- Copiez le dossier ROOT/theme/modules/ avec tous ceux qu'il contient dans votre dossier de théme.

#################################################
SMARTY MPMANAGER
#################################################

1) <{xoManagerCount}> (compte les nouveaux messages)
2) <{xoManagerCountRead}> (compte les messages lu)
3) <{xoManagerCountAll}> (compte tous les messages)
4) <{xoManager}> (affiche la popup, l'image ou l'anim pour pr�venir d'un nouveau message, il doit �tre utilis� o� on veut afficher l'image dans le template ou le th�me)


Exemple de modification du menu utilisateur :

Modifier /modules/system/templates/system_block_user.html

/////////////

<table cellspacing="0">
  <tr>
    <td id="usermenu">
      <{if $xoops_isadmin}>
        <a class="menuTop" href="<{$xoops_url}>/admin.php"><{$block.lang_adminmenu}></a>
	    <a href="<{$xoops_url}>/user.php"><{$block.lang_youraccount}></a>
      <{else}>
	    <a class="menuTop" href="<{$xoops_url}>/user.php"><{$block.lang_youraccount}></a>
      <{/if}>
      <a href="<{$xoops_url}>/edituser.php"><{$block.lang_editaccount}></a>
      <a href="<{$xoops_url}>/notifications.php"><{$block.lang_notifications}></a>
      <{if $block.new_messages > 0}>
        <a class="highlight" href="<{$xoops_url}>/modules/mpmanager/index.php"><{$block.lang_inbox}> (<span style="color:#ff0000; font-weight: bold;"><{$block.new_messages}></span>)</a>
      <{else}>
        <a href="<{$xoops_url}>/modules/mpmanager/msgbox.php"><{$block.lang_inbox}></a>
      <{/if}>

<{xoManager}>

      <a href="<{$xoops_url}>/user.php?op=logout"><{$block.lang_logout}></a>
    </td>
  </tr>
</table>

/////////////

Exemple d'utilisation sans le menu utilisateur sur le site :

Modifier votre fichier theme.html

/////////////

<{xoManagerCount assign=pmcount}>
<a href="<{xoAppUrl /modules/mpmanager/index.php}>">
<{if $pmcount}>
Vous avez <{xoManagerCountAll}> dont <{$pmcount}> messages non lus
<{else}>
Voir sa bo�te de r�ception
<{/if}>
</a>
<{xoManager}>
/////////////