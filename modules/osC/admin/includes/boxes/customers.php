<?php
/*
$Id: customers.php 57 2005-12-15 14:39:09Z Michael $

osCommerce, Open Source E-Commerce Solutions
http://www.oscommerce.com

Copyright © 2002 osCommerce

Released under the GNU General Public License
*/
?>
<!-- customers //-->
<tr>
<td>
<?php
$heading = array();
$contents = array();

$heading[] = array('text' => BOX_HEADING_CUSTOMERS,
'link' => tep_href_link(FILENAME_CUSTOMERS, 'selected_box=customers'));

if ($selected_box == 'customers') {
$contents[] = array('text' => '<a href="' . tep_href_link(FILENAME_CUSTOMERS,  'selected_box=customers', 'NONSSL') . '" class="menuBoxContentLink">' . BOX_CUSTOMERS_CUSTOMERS . '</a><br>' .
'<a href="' . tep_href_link(FILENAME_CUSTOMER_GROUPS, 'selected_box=customers') . '" class="menuBoxContentLink">' . BOX_CUSTOMER_GROUPS . '</a><br>' .


'<a href="' . tep_href_link(FILENAME_ORDERS, 'selected_box=customers', 'NONSSL') . '" class="menuBoxContentLink">' . BOX_CUSTOMERS_ORDERS . '</a>');
}

$box = new box;
echo $box->menuBox($heading, $contents);
?>
</td>
</tr>
<tr>
<td>

<?php
$heading = array();
$contents = array();

$heading[] = array('text' => BOX_HEADING_EDIT_INVOICE,
'link' => tep_href_link(FILENAME_EDIT_INVOICE, 'selected_box=invoice'));

if ($selected_box == 'invoice') {
$contents[] = array('text' => '<a href="' . tep_href_link(FILENAME_EDIT_INVOICE, 'selected_box=invoice') . '" class="menuBoxContentLink">' . BOX_TOOLS_EDIT_INVOICE . '</a><br>' .
'<a href="' . tep_href_link(FILENAME_EDIT_INVOICE_CONFIG, 'selected_box=invoice') . '" class="menuBoxContentLink">' . BOX_TOOLS_EDIT_INVOICE_CONFIG . '</a><br>');
}

$box = new box;
echo $box->menuBox($heading, $contents);
?>
</td></tr>

<!-- customers_eof //-->

