Readme for MP Manager version 2.6

#################################################
UPDATE
#################################################

- Overwrite the 'mpmanager' folder, update the module from Modules Administration.
- If your are using custom templates, delete module's templates and re-create them.
- To use small Integration for the copy of the plugins or to defer you to the section “copies manual”.
- Go to mpmanager's Administration to define the permissions.


#################################################
Install
#################################################

- Upload the 'mpmanager' folder into your <xoops_root>/modules/ directory.
- Install the module like any other module in Modules Administration.
- To use small Integration for the copy of the plugins or to defer you to the section “copies manual”.
- Go to mpmanager's Administration to define the permissions.


#################################################
WARNING! BACKUP ANY FILES BEFORE MODIFYING!
#################################################

#################################################
Copy all files from 'root' folder
#################################################

Respect the tree structure of the folders

function.xoManager.php (new file)
function.xoManagerCount.php (new file)
function.xoManagerCountAll.php (new file)
pmlite.php (overwrite the existing file)

overload templates.
- Copy the file root/theme/modules/ in the thème file.

#################################################
SMARTY MPMANAGER
#################################################

1) <{xoManagerCount}> (count the new messages)
2) <{xoManagerCountRead}> (count the messages read)
3) <{xoManagerCountAll}> (count all the messages)
4) <{xoManager}> (post the popup, the image or the anim to prevent of a new message, it must be used where one wants to post the image in the template or the topic)

Example of modification of the menu user

To modify /modules/system/templates/system_block_user.html

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

Example of use without the menu user on the site: 

To modify your theme.html file

/////////////
<{xoManagerCount assign=pmcount}>
<a href="<{xoAppUrl /modules/mpmanager/index.php}>">
<{if $pmcount}>
Vous avez <{xoManagerCountAll}> dont <{$pmcount}> messages non lus
<{else}>
Voir sa boîte de réception
<{/if}>
</a>
<{xoManager}>
/////////////
