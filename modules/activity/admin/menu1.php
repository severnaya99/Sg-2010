<?php
 include "../../../include/cp_header.php";
xoops_cp_header();
include_once XOOPS_ROOT_PATH."/Frameworks/art/functions.admin.php";
loadModuleAdminMenu (1, "Forum");
echo "Attività forum";
//SELECT *FROM `prefsnowx_users`WHERE `rank` =6 Tutti i moderatori
echo "<select name='user'>";



echo "</select>";
xoops_cp_footer();
?>