<?php
/*
  $Id: validproducts.php,v 0.01 2002/08/17 15:38:34 Richard Fielder

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  

  Copyright (c) 2002 Richard Fielder

  Released under the GNU General Public License
*/
  include '../../../include/cp_header.php';
require('includes/application_top.php');

 // xoops_cp_header();
?>
<html>
<head>
<title>Valid Categories/Products List</title>
<style type="text/css">
<!--
h4 {  font-family: Verdana, Arial, Helvetica, sans-serif; font-size: x-small; text-align: center}
p {  font-family: Verdana, Arial, Helvetica, sans-serif; font-size: xx-small}
th {  font-family: Verdana, Arial, Helvetica, sans-serif; font-size: xx-small}
td {  font-family: Verdana, Arial, Helvetica, sans-serif; font-size: xx-small}
-->
</style>
<head>
<body>
<table width="550" border="1" cellspacing="1" bordercolor="gray">
<tr>
<td colspan="3">
<h4><?php echo TEXT_VALID_PRODUCTS_LIST; ?></h4>
</td>
</tr>
<?
    echo "<tr><th>". TEXT_VALID_PRODUCTS_ID . "</th><th>" . TEXT_VALID_PRODUCTS_NAME . "</th><th>" . TEXT_VALID_PRODUCTS_MODEL . "</th></tr><tr>";
    $result = tep_db_query("SELECT * FROM ".TABLE_PRODUCTS.", ".TABLE_PRODUCTS_DESCRIPTION." WHERE ".TABLE_PRODUCTS.".products_id = ".TABLE_PRODUCTS_DESCRIPTION.".products_id and ".TABLE_PRODUCTS_DESCRIPTION.".language_id = '" . $languages_id . "' ORDER BY ".TABLE_PRODUCTS_DESCRIPTION.".products_name");
    if ($row = tep_db_fetch_array($result)) {
        do {
            echo "<td>".$row["products_id"]."</td>\n";
            echo "<td>".$row["products_name"]."</td>\n";
            echo "<td>".$row["products_model"]."</td>\n";
            echo "</tr>\n";
        }
        while($row = tep_db_fetch_array($result));
    }
    echo "</table>\n";
?>
<br>
<table width="550" border="0" cellspacing="1">
<tr>
<td align=middle><input type="button" value="Close Window" onClick="window.close()"></td>
</tr></table>
</body>
</html>
<?php  // xoops_cp_footer();