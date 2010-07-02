<?php
 include "../../../include/cp_header.php";
xoops_cp_header();
include_once XOOPS_ROOT_PATH."/Frameworks/art/functions.admin.php";
loadModuleAdminMenu (5, "About");
echo '<link rel="stylesheet" type="text/css" media="screen" href="../css/admin.css" />';


echo '<div id="m_body">';
echo "About";
echo '</div>';


xoops_cp_footer();
?>