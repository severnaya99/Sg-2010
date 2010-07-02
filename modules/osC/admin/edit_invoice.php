<?php

 /*

 $Id: edit_invoice.php,v 1.00 2004/08/04

 by Christian von den Steinen, Germany

 $Id: edit_invoice.php,v 1.01 2005/06/14

  Change for the German and english linguistic area
  by Infobroker 
  Erich Paeper - info@cooleshops.de
  Bufix line 92 , 162 , 216
  
 osCommerce, Open Source E-Commerce Solutions

 http://www.oscommerce.com



 Copyright (c) 2003 osCommerce

 

 Released under the GNU General Public License


*/
  include '../../../include/cp_header.php';
 require('includes/application_top.php');

// require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_EDIT_INVOICE);
  xoops_cp_header();
?>

<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">

<html '<?php echo HTML_PARAMS; ?>'>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">

<title><?php echo TITLE; ?></title>

<link rel="stylesheet" type="text/css" href="includes/stylesheet.css">

</head>

<body marginwidth="0" marginheight="0" topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0" bgcolor="#FFFFFF">

<!-- header //-->

<?php require(DIR_WS_INCLUDES . 'header.php'); ?>

<!-- header_eof //-->



<!-- body //-->

<table border="0" width="100%" cellspacing="2" cellpadding="2">

<tr>

 <td width="<?php echo BOX_WIDTH; ?>" valign="top">

  <table border="0" width="<?php echo BOX_WIDTH; ?>" cellspacing="1" cellpadding="1" class="columnLeft">

<!-- left_navigation //-->

<?php require(DIR_WS_INCLUDES . 'column_left.php'); ?>

<!-- left_navigation_eof //-->

  </table>

 </td>

<!-- body_text //-->



 <td class="pageHeading" valign="top"><?php echo HEADING_TITLE_EDIT_INVOICE; ?>

<?php

 if ($REQUEST_METHOD=="POST")

 {

   mysql_query('REPLACE INTO '.$xoopsDB->prefix('osc_edit_invoice'). ' VALUES (1, "' . $languages_id . '", "' . $text_1 .'")')

         or die(mysql_error());

 }



 $sql=mysql_query("SELECT * FROM ".$xoopsDB->prefix('osc_edit_invoice'). " where edit_invoice_id = '1' and language_id = '" . $languages_id . "'")

   or die(mysql_error());

 $row=mysql_fetch_array($sql);



?>

  <table width="98%" align="center" border="0" cellpadding="0" cellspacing="0">

   <tr> 

    <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '25'); ?></td>

   </tr>

  <form name="text_1_form" method="Post" action="">

   <tr>

    <td width="75%" valign="top"><?php echo EORDER_TEXT_1; ?></td>

   </tr>

   <tr> 

    <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>

   </tr>

   <tr>

    <td width="75%" valign="top"><textarea name="text_1" cols="75" rows="5"><?php echo $row['edit_invoice_text'] ?></textarea></td>

   </tr>

   <tr>

    <td align="left"></td>

   </tr>

   <tr> 

    <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '25'); ?></td>

   </tr>







<?php

 if ($REQUEST_METHOD=="POST")

 {

   mysql_query('REPLACE INTO '.$xoopsDB->prefix('osc_edit_invoice'). ' VALUES (2, "' . $languages_id . '", "' . $text_2 .'")')

         or die(mysql_error());

 }



 $sql=mysql_query("SELECT * FROM ".$xoopsDB->prefix('osc_edit_invoice'). " where edit_invoice_id = '2' and language_id = '" . $languages_id . "'")

   or die(mysql_error());

 $row=mysql_fetch_array($sql);



?>

   <tr>

    <td width="75%" valign="top"><?php echo EORDER_TEXT_2; ?></td>

   </tr>

   <tr> 

    <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>

   </tr>

   <tr>

    <td width="75%" valign="top"><textarea name="text_2" cols="75" rows="5"><?php echo $row['edit_invoice_text'] ?></textarea></td>

   </tr>

   <tr> 

    <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '25'); ?></td>

   </tr>







<?php

 if ($REQUEST_METHOD=="POST")

 {

   mysql_query('REPLACE INTO '.$xoopsDB->prefix('osc_edit_invoice'). ' VALUES (3, "' . $languages_id . '", "' . $text_3 .'")')

         or die(mysql_error());

 }



 $sql=mysql_query("SELECT * FROM ".$xoopsDB->prefix('osc_edit_invoice'). " where edit_invoice_id = '3' and language_id = '" . $languages_id . "'")

   or die(mysql_error());

 $row=mysql_fetch_array($sql);



?>

   <tr>

    <td width="75%" valign="top"><?php echo EORDER_TEXT_3; ?></td>

   </tr>

   <tr> 

    <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>

   </tr>

   <tr>

    <td width="75%" valign="top"><textarea name="text_3" cols="75" rows="5"><?php echo $row['edit_invoice_text'] ?></textarea></td>

   </tr>





   <tr>

    <td align="left"><input type="submit" name="Save" value="Save" style="width: 70px"></td>

   </tr>

  </form>

  </table>

 </td>

<!-- body_text_eof //-->

 </tr>

</table>

<!-- body_eof //-->



<!-- footer //-->

<?php require(DIR_WS_INCLUDES . 'footer.php'); ?>

<!-- footer_eof //-->

<br>

</body>

</html>

<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>