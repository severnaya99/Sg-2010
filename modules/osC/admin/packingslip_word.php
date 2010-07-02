<?php Header("Content-type: application/msword");
/*
  $Id: packingslip_word.php 149 2006-01-27 13:31:07Z Michael $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License

  Changelog: by Infobroker
  info@cooleshops.de
*/
  include '../../../include/cp_header.php';
  require('includes/application_top.php');

  require(DIR_WS_CLASSES . 'currencies.php');
  $currencies = new currencies();

  $oID = tep_db_prepare_input($HTTP_GET_VARS['oID']);
  $orders_query = tep_db_query("select orders_id from " . TABLE_ORDERS . " where orders_id = '" . (int)$oID . "'");

  include(DIR_WS_CLASSES . 'order.php');
  $order = new order($oID);

  // Kundennummer in invoice.php einfuegen
$the_extra_query= tep_db_query("select * from " . TABLE_ORDERS . " where orders_id = '" . tep_db_input($oID) . "'");
$the_extra= tep_db_fetch_array($the_extra_query);
$the_customers_id= $the_extra['customers_id'];
$the_extra_query= tep_db_query("select * from " . TABLE_CUSTOMERS . " where customers_id = '" . $the_customers_id . "'");
$the_extra= tep_db_fetch_array($the_extra_query);
$the_customers_fax= $the_extra['customers_fax'];
// Ende Kundennummer in invoice.php


?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<title><?php echo TITLE; ?></title>
<link rel="stylesheet" type="text/css" href="includes/stylesheet.css">
</head>
<body marginwidth="0" marginheight="0" topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0" bgcolor="#FFFFFF">

<!-- body_text //-->
<table width="645" border="0" align="center" cellpadding="0" cellspacing="0">
 
  <tr>
   <?php
    if (EDIT_INVOICE_LOGO_ALIGN == 'rechts' and EDIT_INVOICE_LOGO != '') {
   ?>
    <td colspan="2" align="right" valign="top" class="pageHeading"><?php echo tep_image(DIR_WS_IMAGES . EDIT_INVOICE_LOGO); ?></td>
   <?php
    } else {
    if (EDIT_INVOICE_LOGO_ALIGN == 'links' and EDIT_INVOICE_LOGO != '') {
   ?>
    <td colspan="2" align="left" valign="top" class="pageHeading"><?php echo tep_image(DIR_WS_IMAGES . EDIT_INVOICE_LOGO); ?></td>
   <?php
    } else {
    if (EDIT_INVOICE_LOGO_ALIGN == 'mitte' and EDIT_INVOICE_LOGO != '') {
   ?>
    <td colspan="2" align="center" valign="top" class="pageHeading"><?php echo tep_image(DIR_WS_IMAGES . EDIT_INVOICE_LOGO); ?></td>
	   <?php
    } else {
    if (EDIT_INVOICE_LOGO == '') {
   ?>
    <td colspan="2" align="center" valign="top" class="pageHeading"><?php echo tep_draw_separator('pixel_trans.gif', '1', '100'); ?></td>
   <?php
   }
      }
     }
    }
   ?>
  </tr>
  <tr>
      <td width="345" align="right" valign="top" class="pageHeading"> <table width="340" border="0" cellspacing="0" cellpadding="2">
        <tr> 
          <td colspan="2" class="main" align="right"><?php echo tep_draw_separator('pixel_trans.gif', '1', '30'); ?></td>
        </tr>
		        <tr> 
          <td class="smallText" ><?php echo SHOPBETREIBER . '&nbsp;*' . SHOPSTRASSE . '&nbsp;*' . SHOPSTADT ; ?></td>
        </tr>
        <tr> 
          <td class="main"><b><?php //echo ENTRY_SOLD_TO; ?></b><br>
            </b><?php echo tep_address_format($order->delivery['format_id'], $order->delivery, 1, '', '<br>'); ?></td>
        </tr>
        <tr> 
          <td colspan="2" class="titleHeading"><?php echo tep_draw_separator('pixel_trans.gif', '1', '40'); ?></td>
        </tr>
      
      </table></td>

   <td width="300" align="right" valign="top" class="main"> <table>
        <tr> 
          <td width="100" align="right" class="main"><?php echo tep_draw_separator('pixel_trans.gif', '1', '20'); ?></td>
        </tr>
        <tr> 
          <td class="main" align="right">
 <?php 		   
		  if (BARCODE_RECHNUNG == 'ja'){
		  	 echo ' 	   <img src="barcodegen.php?barcode= ' . tep_db_input($oID) . ' ">';   
  }
 ?>
 </td>
        </tr>
      </table></td>
  </tr>
</table>
<table width="645" border="0" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td align="left" valign="top"><table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
	   <?php
    if (EDIT_INFOICE_SHOW_ONR == 'ja') {
   ?>
        <tr>

         <td width="20%" class="main"><b><?php echo ENTRY_DELIVERY_ORDER_ID; ?></b></td>

         <td class="main">&nbsp;<?php echo ENTRY_INVOICE_ORDER_ID_PREFIX . tep_db_input($oID) . ENTRY_INVOICE_ORDER_ID_SUFIX; ?></td>
<td class="main"><?php echo tep_draw_separator('pixel_trans.gif', '230', '25'); ?></td>
      
   <?php
    }
   ?>
          <td class="main" align="right"><b><?php echo ENTRY_INVOICE_DATE_PURCHASED; ?></b></td>
   <?php
    if (EDIT_INVOICE_SHOW_DATE == 'Datum und Uhrzeit') {
   ?>
          <td class="main"><?php echo tep_datetime_short($order->info['date_purchased']); ?></td>
   <?php
    } else {
    if (EDIT_INVOICE_SHOW_DATE == 'nur Datum') {
   ?>
          <td class="main" width="10%" align="right">&nbsp;<?php echo tep_date_short($order->info['date_purchased']); ?></td>
   <?php
     }
	}
   ?>
 </tr>
 </table>
	<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">	       <tr>
	  <td class="main" colspan="2"><b><?php echo ENTRY_INVOICE_AUFTRAG_ID; ?></b>&nbsp;<?php echo tep_db_input($oID); ?></td>
       
<td class="main"><?php echo tep_draw_separator('pixel_trans.gif', '250', '25'); ?></td>
   <?php
    if (EDIT_INFOICE_SHOW_CNR == 'ja') {
   ?>
  
          <td class="main" align="right"><b><?php echo ENTRY_INVOICE_COSTUMER_ID; ?></b></td>
          <td class="main">&nbsp;<?php echo $the_customers_id; ?></td>
        
   <?php
    }
   ?>
</tr>
      </table>

<table width="645" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
  </tr>
  <tr>
    <td><hr></td>
  </tr>
  <tr>
    
    <td>
	  <table border="0" width="100%" cellspacing="0" cellpadding="2">
        <tr class="dataTableHeadingRow">
		  <td width="1"><?php echo tep_draw_separator('pixel_trans.gif', '1', '3'); ?></td>
          <td class="dataTableHeadingContent" width="67%"><?php echo TABLE_HEADING_PRODUCTS; ?></td>

          <td class="dataTableHeadingContent"><?php echo TABLE_HEADING_PRODUCTS_MODEL; ?>&nbsp;&nbsp;</td>
        </tr>
	    <tr>
         <td colspan="3" ><hr></td>
        </tr>
        <tr>
		  <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '350'); ?></td>
		  <td colspan="2" valign="top"><table border="0" width="100%" cellpadding="0" cellspacing="0">
<?php
    for ($i = 0, $n = sizeof($order->products); $i < $n; $i++) {
      echo '      <tr class="dataTableRow">' . "\n" .
           '        <td class="dataTableContent" valign="top" >' . $order->products[$i]['qty'] . '&nbsp;x</td>' . "\n" .
           '        <td class="dataTableContent" valign="top">' . $order->products[$i]['name'];

      if (isset($order->products[$i]['attributes']) && (($k = sizeof($order->products[$i]['attributes'])) > 0)) {
        for ($j = 0; $j < $k; $j++) {
          echo '<br><nobr><small>&nbsp;<i> - ' . $order->products[$i]['attributes'][$j]['option'] . ': ' . $order->products[$i]['attributes'][$j]['value'];
          if ($order->products[$i]['attributes'][$j]['price'] != '0') echo ' (' . $order->products[$i]['attributes'][$j]['prefix'] . $currencies->format($order->products[$i]['attributes'][$j]['price'] * $order->products[$i]['qty'], true, $order->info['currency'], $order->info['currency_value']) . ')';
          echo '</i></small></nobr>';
        }
      }

      echo '        </td>' . "\n" .  
           '        <td class="dataTableContent" valign="top">'; ?>
<?php		   
	if (BARCODE_PRODUCT == 'ja') {	   
	  echo '	   <img src="barcodegen.php?barcode= ' . $order->products[$i]['model'] . ' "><br>'; 
	
	}
	?>
	
<?php	
	
      echo '	 	<center> ' . $order->products[$i]['model'] . '</center></td>' . "\n";
           '     </tr>' . "\n";
    }
?>
         </table>
        </td>
      </tr>
	  <tr>
        <td colspan="3" ><hr></td>
      </tr>
       

  </table>
</td>
      </tr>
    </table>
    </td>
  </tr>
  <tr>
  <td><table border="0" width=100% cellpadding=1 cellspacing=2>
  <tr>
    <td colspan="4"><?php echo tep_draw_separator('pixel_trans.gif', '1', '5'); ?></td>
  </tr>
   <tr>
<?php
       $text_query = tep_db_query("SELECT * FROM ".$xoopsDB->prefix('osc_edit_invoice')." where edit_invoice_id = '3' and language_id = '" . $languages_id . "'");
       $text = tep_db_fetch_array($text_query);
?>
    <td colspan="4" class="main"><?php echo $text['edit_invoice_text']; ?></td>
  </tr>
  <tr>
    <td colspan="4"><?php echo tep_draw_separator('pixel_trans.gif', '1', '25'); ?><hr></td>
  </tr>
  <?php
    if (SHOW_BANK_DATA == 'ja') {
  ?>
<tr>
<td class=smallText valign=top><?php echo SHOPBETREIBER . '<br>' . SHOPSTRASSE . '<br>' . SHOPSTADT . '<br><br>' . SHOPTELEFON . '<br>' . SHOPFAX . '<br>' . SHOPEMAIL ;  ?></td> 

<td class=smallText valign=top> 
<?php echo 'HRB:' . HRB . '<br>' . AMTSGERICHT. '<br><br>' . OWNER_BANK_FA . '<br>' . OWNER_BANK_TAX_NUMBER . '<br>' . OWNER_BANK_UST_NUMBER ; ?></td> 
<td class=smallText valign=top> 
<?php echo OWNER_BANK_NAME . '<br>' . OWNER_BANK_ACCOUNT . '<br>' . TEXT_BANK_BLZ . '&nbsp;' . STORE_OWNER_BLZ . '<br>' . TEXT_BANK_KTO . '&nbsp;' . OWNER_BANK ; ?></td> 
<td class=smallText valign=top> 
<?php echo OWNER_BANK_SWIFT . '<br>' . OWNER_BANK_IBAN ; ?></td> 
</tr>
<?php
 } else {
?>
<tr>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<?php
 }
?>
</table></td>
  </tr>
</table>

</table>
<?php // echo tep_draw_separator('pixel_trans.gif', '1', '5'); ?>
<?php // echo tep_draw_separator(); ?>
<!-- body_text_eof //-->
</body>
</html>
<?php //require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>