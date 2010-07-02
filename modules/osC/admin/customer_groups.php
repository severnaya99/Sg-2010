<?php
/**
 * $Id: customer_groups.php 57 2005-12-15 14:39:09Z Michael $
 * xosC - eCommerce for xoops
 * @package xosC
 * @subpackage admin
 * @author Michael Hammelmann <michael.hammelmann@flinkux.de>
 * @version 1
**/
  include '../../../include/cp_header.php';
  require('includes/application_top.php');

  $action = (isset($HTTP_GET_VARS['action']) ? $HTTP_GET_VARS['action'] : '');

  $error = false;
  $processed = false;

  if (tep_not_null($action)) {
    switch ($action) {
      case 'update':

	    $customer_group_id=tep_db_prepare_input($_GET['cID']);
		$customer_group_name=tep_db_prepare_input($_POST['customer_group_name']);
		$customer_group_description=tep_db_prepare_input($_POST['customer_group_description']);	
		$customer_group_fsk18=tep_db_prepare_input($_POST['customer_group_fsk18']);
		$customer_group_tax=tep_db_prepare_input($_POST['customer_group_tax']);	
		$customer_group_display_tax=tep_db_prepare_input($_POST['customer_group_display_tax']);	
		$customer_group_display_shipment=tep_db_prepare_input($_POST['customer_group_display_shipment']);	
		$customer_group_shipping=tep_db_prepare_input(implode(";",$_POST['shipping']));
		$customer_group_payment=tep_db_prepare_input(implode(";",$_POST['payment']));
        $sql_data_array = array('customer_group_name' => $customer_group_name,
                                'customer_group_description' => $customer_group_description,
                                'customer_group_tax' => $customer_group_tax,
                                'customer_group_fsk18' => $customer_group_fsk18,
                                'customer_group_shipping' => $customer_group_shipping,
								'customer_group_display_tax' => $customer_group_display_tax,
								'customer_group_display_shipment' => $customer_group_display_shipment,
                                'customer_group_payment' => $customer_group_payment);


        tep_db_perform(TABLE_CUSTOMER_GROUP, $sql_data_array, 'update', "customer_group_id = '" . (int)$customer_group_id . "'");

        tep_redirect(tep_href_link(FILENAME_CUSTOMER_GROUPS, tep_get_all_get_params(array('cID', 'action')) . 'cID=' . $customers_id));


        break;
		case 'insert':
	    $customer_group_id=tep_db_prepare_input($_POST['cID']);
		$customer_group_name=tep_db_prepare_input($_POST['customer_group_name']);
		$customer_group_description=tep_db_prepare_input($_POST['customer_group_description']);	
		$customer_group_fsk18=tep_db_prepare_input($_POST['customer_group_fsk18']);
		$customer_group_tax=tep_db_prepare_input($_POST['customer_group_tax']);	
		$customer_group_shipping=tep_db_prepare_input(implode(";",$_POST['shipping']));
		$customer_group_payment=tep_db_prepare_input(implode(";",$_POST['payment']));
        $sql_data_array = array('customer_group_name' => $customer_group_name,
                                'customer_group_description' => $customer_group_description,
                                'customer_group_tax' => $customer_group_tax,
                                'customer_group_fsk18' => $customer_group_fsk18,
                                'customer_group_shipping' => $customer_group_shipping,
                                'customer_group_payment' => $customer_group_payment);


        tep_db_perform(TABLE_CUSTOMER_GROUP, $sql_data_array, 'insert');
        tep_redirect(tep_href_link(FILENAME_CUSTOMER_GROUPS, tep_get_all_get_params(array('cID', 'action')) . 'cID=' . $customers_id));
        break;

      case 'deleteconfirm':
        $customer_group_id = tep_db_prepare_input($HTTP_GET_VARS['cID']);
        tep_db_query("delete from " . TABLE_CUSTOMER_GROUP . " where customer_group_id = '" . (int)$customer_group_id . "'");

        tep_redirect(tep_href_link(FILENAME_CUSTOMER_GROUPS, tep_get_all_get_params(array('cID', 'action'))));
        break;
      default:
        $customers_query = tep_db_query("select * from " . TABLE_CUSTOMER_GROUP . " where customer_group_id =  '" . (int)$HTTP_GET_VARS['cID'] . "'");
        $customers = tep_db_fetch_array($customers_query);
        $cInfo = new objectInfo($customers);
    }
  }
  $xTheme->addCSS("includes/stylesheet.css");
  xoops_cp_header();
?>
<script language="javascript" type="text/javascript" src="includes/general.js"></script>
<script type="text/javascript" language="javascript">
function toggle_shipping()
{
 alert("Toggling");
 }
</script>

<body marginwidth="0" marginheight="0" topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0" bgcolor="#FFFFFF" onload="SetFocus();">
<!-- header //-->
<?php require(DIR_WS_INCLUDES . 'header.php'); ?>
<!-- header_eof //-->

<!-- body //-->
<table border="0" width="100%" cellspacing="2" cellpadding="2">
  <tr>
    <td width="<?php echo BOX_WIDTH; ?>" valign="top"><table border="0" width="<?php echo BOX_WIDTH; ?>" cellspacing="1" cellpadding="1" class="columnLeft">
<!-- left_navigation //-->
<?php require(DIR_WS_INCLUDES . 'column_left.php'); ?>
<!-- left_navigation_eof //-->
    </table></td>
<!-- body_text //-->
    <td width="100%" valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="2">
<?php
  if ($action == 'edit' || $action == 'update' || $action == 'new') {
    $newsletter_array = array(array('id' => '1', 'text' => ENTRY_NEWSLETTER_YES),
                              array('id' => '0', 'text' => ENTRY_NEWSLETTER_NO));
?>
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td class="pageHeading"><?php echo HEADING_TITLE; ?></td>
            <td class="pageHeading" align="right"><?php echo tep_draw_separator('pixel_trans.gif', HEADING_IMAGE_WIDTH, HEADING_IMAGE_HEIGHT); ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
<?php if ($action == 'new' ) {
?>
      <tr><?php echo tep_draw_form('customer_groups', FILENAME_CUSTOMER_GROUPS, tep_get_all_get_params(array('action')) . 'action=insert', 'post', '') ; ?>
<?php
}else {
?>
      <tr><?php echo tep_draw_form('customer_groups', FILENAME_CUSTOMER_GROUPS, tep_get_all_get_params(array('action')) . 'action=update', 'post', '') ; ?>
<?php } ?>
        <td class="formAreaTitle"><?php echo CATEGORY_GROUP; ?></td>
      </tr>
      <tr>
        <td class="formArea"><table border="0" cellspacing="2" cellpadding="2">
          <tr>
            <td class="main"><?php echo ENTRY_GROUP_NAME; ?></td>
            <td class="main">
<?php
  if ($error == true) {
    if ($entry_firstname_error == true) {
      echo tep_draw_input_field('customer_group_name', $cInfo->customer_group_name, 'maxlength="50"') . '&nbsp;' . ENTRY_GROUP_NAME_ERROR;
    } else {
      echo $cInfo->customers_group_name . tep_draw_hidden_field('customer_group_name');
    }
  } else {
    echo tep_draw_input_field('customer_group_name', $cInfo->customer_group_name, 'maxlength="50"', true);
  }
?></td>
          </tr>
          <tr>
            <td class="main"><?php echo ENTRY_GROUP_DESCRIPTION; ?></td>
            <td class="main">
<?php
  if ($error == true) {
    if ($entry_lastname_error == true) {
      echo tep_draw_input_field('customer_group_description', $cInfo->customer_group_description, 'maxlength="255"') . '&nbsp;' . ENTRY_GROUP_DESCRIPTION_ERROR;
    } else {
      echo $cInfo->customer_group_description . tep_draw_hidden_field('customer_group_description');
    }
  } else {
    echo tep_draw_textarea_field('customer_group_description', $wrap, '50', '5', $text = $cInfo->customer_group_description, '');
	//echo tep_draw_input_field('customer_group_description', $cInfo->customer_group_description, 'maxlength="255"', true);
  }
?></td>
          </tr>
          <tr>
            <td class="main"><?php echo ENTRY_GROUP_FSK18; ?></td>
            <td class="main">
<?php
    if ($error == true) {
      if ($entry_gender_error == true) {
        echo tep_draw_radio_field('customer_group_fsk18', '1', false, $cInfo->customer_group_fsk18) . '&nbsp;&nbsp;' . YES . '&nbsp;&nbsp;' . tep_draw_radio_field('customer_group_fsk18', '0', false, $cInfo->customer_group_fsk18) . '&nbsp;&nbsp;' . NO . '&nbsp;' . ENTRY_GROUP_FSK18_ERROR;
      } else {
        echo ($cInfo->customer_group_fsk18 == '1') ? YES : NO;
        echo tep_draw_hidden_field('customer_group_fsk18');
      }
    } else {
      echo tep_draw_radio_field('customer_group_fsk18', '1', false, $cInfo->customer_group_fsk18) . '&nbsp;&nbsp;' . YES . '&nbsp;&nbsp;' . tep_draw_radio_field('customer_group_fsk18', '0', false, $cInfo->customer_group_fsk18) . '&nbsp;&nbsp;' . NO;
    }
?></td>
          </tr>

          </tr>
          <tr>
            <td class="main"><?php echo ENTRY_GROUP_TAX; ?></td>
            <td class="main">
<?php
    if ($error == true) {
      if ($entry_gender_error == true) {
        echo tep_draw_radio_field('customer_group_tax', '1', false, $cInfo->customer_group_tax) . '&nbsp;&nbsp;' . YES . '&nbsp;&nbsp;' . tep_draw_radio_field('customer_group_tax', '0', false, $cInfo->customer_group_tax) . '&nbsp;&nbsp;' . NO . '&nbsp;' . ENTRY_GROUP_TAX_ERROR;
      } else {
        echo ($cInfo->customer_group_tax == '1') ? YES : NO;
        echo tep_draw_hidden_field('customer_group_tax');
      }
    } else {
      echo tep_draw_radio_field('customer_group_tax', '1', false, $cInfo->customer_group_tax) . '&nbsp;&nbsp;' . YES . '&nbsp;&nbsp;' . tep_draw_radio_field('customer_group_tax', '0', false, $cInfo->customer_group_tax) . '&nbsp;&nbsp;' . NO;
    }
?></td>
          </tr>
          <tr>
            <td class="main"><?php echo ENTRY_GROUP_DISPLAY_TAX; ?></td>
            <td class="main">
<?php
      echo tep_draw_radio_field('customer_group_display_tax', '1', false, $cInfo->customer_group_display_tax) . '&nbsp;&nbsp;' . YES . '&nbsp;&nbsp;' . tep_draw_radio_field('customer_group_display_tax', '0', false, $cInfo->customer_group_display_tax) . '&nbsp;&nbsp;' . NO;
?></td>
          </tr>
          <tr>
            <td class="main"><?php echo ENTRY_GROUP_DISPLAY_SHIPMENT; ?></td>
            <td class="main">
<?php
      echo tep_draw_radio_field('customer_group_display_shipment', '1', false, $cInfo->customer_group_display_shipment) . '&nbsp;&nbsp;' . YES . '&nbsp;&nbsp;' . tep_draw_radio_field('customer_group_display_shipment', '0', false, $cInfo->customer_group_display_shipment) . '&nbsp;&nbsp;' . NO;
?></td>
          </tr>


        </table></td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
      <tr>
        <td class="formAreaTitle"><?php echo CATEGORY_SHIPPING; ?></td>
      </tr>
      <tr>
        <td class="formArea"><table border="0" cellspacing="2" cellpadding="2">

<?php
  $module_directory = DIR_FS_CATALOG_MODULES . 'shipping/';
/*
  $directory_array = array();
  if ($dir = @dir($module_directory)) {
    while ($file = $dir->read()) {
      if (!is_dir($module_directory . $file)) {
        if (substr($file, strrpos($file, '.')) == '.php') {
          $directory_array[] = $file;
        }
      }
    }
    sort($directory_array);
    $dir->close();
  }
*/
if(ereg('all.php',$cInfo->customer_group_shipping)) $checked=true;
?><tr><td><?php echo TEXT_SHIPMENT_ALL; ?></td><td><?php echo tep_draw_checkbox_field('shipping[]',  'all.php', $checked, 'onChange="Javascript:toggle_shipping();'); ?></td></tr>
<?php
  $error=false;
  $installed_modules = array();
  $directory_array = split(';',MODULE_SHIPPING_INSTALLED);
  for ($i=0, $n=sizeof($directory_array); $i<$n; $i++) {
    $file = $directory_array[$i];

    include(DIR_FS_CATALOG_LANGUAGES . $language . '/modules/shipping/' . $file);
    include($module_directory . $file);

    $class = substr($file, 0, strrpos($file, '.'));
    if (tep_class_exists($class)) {
      $module = new $class;
	  $checked = false;
	  if(ereg($class,$cInfo->customer_group_shipping)) $checked=true;
?><tr><td><?php echo $module->title; ?></td><td><?php echo tep_draw_checkbox_field('shipping[]',  $class.'.php', $checked, ''); ?></td></tr>
<?php
    }
  }
?>
        </table></td>
      </tr>
      <tr>
        <td class="formAreaTitle"><?php echo CATEGORY_PAYMENT; ?></td>
      </tr>
      <tr>
        <td class="formArea"><table border="0" cellspacing="2" cellpadding="2">

<?php
  $module_directory = DIR_FS_CATALOG_MODULES . 'payment/';

/*  $directory_array = array();
  if ($dir = @dir($module_directory)) {
    while ($file = $dir->read()) {
      if (!is_dir($module_directory . $file)) {
        if (substr($file, strrpos($file, '.')) == '.php') {
          $directory_array[] = $file;
        }
      }
    }
    sort($directory_array);
    $dir->close();
  }
*/
if(ereg('all.php',$cInfo->customer_group_payment)) $checked=true;
?><tr><td><?php echo TEXT_PAYMENT_ALL; ?></td><td><?php echo tep_draw_checkbox_field('payment[]',  'all.php', $checked, ''); ?></td></tr>
<?php
  $error=false;
  $installed_modules = array();
  $directory_array = split(';',MODULE_PAYMENT_INSTALLED);
  for ($i=0, $n=sizeof($directory_array); $i<$n; $i++) {
    $file = $directory_array[$i];

    include(DIR_FS_CATALOG_LANGUAGES . $language . '/modules/payment/' . $file);
    include($module_directory . $file);

    $class = substr($file, 0, strrpos($file, '.'));
    if (tep_class_exists($class)) {
      $module = new $class;
	  $checked = false;
	  if(ereg($class,$cInfo->customer_group_payment)) $checked=true;

?><tr><td><?php echo $module->title; ?></td><td><?php echo tep_draw_checkbox_field('payment[]', $class.'.php', $checked ,  ''); ?></td></tr>
<?php
    }
  }

?>
        </table></td>
      </tr>

      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
      <tr>
        <td align="right" class="main"><?php echo tep_image_submit('button_update.gif', IMAGE_UPDATE) . ' <a href="' . tep_href_link(FILENAME_CUSTOMER_GROUPS, tep_get_all_get_params(array('action'))) .'">' . tep_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>'; ?></td>
      </tr></form>
<?php
  } else {
?>
      <tr>
        <td><?php echo tep_draw_form('search', FILENAME_CUSTOMER_GROUPS, '', 'get'); ?><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td class="pageHeading"><?php echo HEADING_TITLE; ?></td>
            <td class="pageHeading" align="right"><?php echo tep_draw_separator('pixel_trans.gif', 1, HEADING_IMAGE_HEIGHT); ?></td>
            <td class="smallText" align="right"><?php echo HEADING_TITLE_SEARCH . ' ' . tep_draw_input_field('search'); ?></td>
          </tr>
        </table></form></td>
      </tr>
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="2">
              <tr class="dataTableHeadingRow">
                <td class="dataTableHeadingContent"><?php echo TABLE_HEADING_NAME; ?></td>
                <td class="dataTableHeadingContent"><?php echo TABLE_HEADING_DESCRIPTION; ?></td>
              </tr>
<?php
    $search = '';
    if (isset($HTTP_GET_VARS['search']) && tep_not_null($HTTP_GET_VARS['search'])) {
      $keywords = tep_db_input(tep_db_prepare_input($HTTP_GET_VARS['search']));
      $search = "where customer_group_name like '%" . $keywords . "%' or customer_group_description like '%" . $keywords . "%' ";
    }
    $customer_group_query_raw = "select * from " . TABLE_CUSTOMER_GROUP . " " . $search . " order by customer_group_name";
    $customer_group_split = new splitPageResults($HTTP_GET_VARS['page'], MAX_DISPLAY_SEARCH_RESULTS, $customer_group_query_raw, $customer_group_query_numrows);
    $customer_group_query = tep_db_query($customer_group_query_raw);
    while ($customer_groups = tep_db_fetch_array($customer_group_query)) {
      if (isset($cInfo) && is_object($cInfo) && ($customer_groups['customer_group_id'] == $cInfo->customer_group_id)) {
        echo '          <tr id="defaultSelected" class="dataTableRowSelected" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href=\'' . tep_href_link(FILENAME_CUSTOMER_GROUPS, tep_get_all_get_params(array('cID', 'action')) . 'cID=' . $cInfo->customer_group_id . '&action=edit') . '\'">' . "\n";
      } else {
        echo '          <tr class="dataTableRow" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href=\'' . tep_href_link(FILENAME_CUSTOMER_GROUPS, tep_get_all_get_params(array('cID')) . 'cID=' . $customer_groups['customer_group_id'] . '&action=view').'\'">' . "\n";
      }
?>
                <td class="dataTableContent"><?php echo $customer_groups['customer_group_name']; ?></td>
                <td class="dataTableContent"><?php echo $customer_groups['customer_group_description']; ?></td>
              </tr>
<?php
    }
?>
              <tr>
                <td colspan="4"><table border="0" width="100%" cellspacing="0" cellpadding="2">
                  <tr>
                    <td class="smallText" valign="top"><?php echo $customer_group_split->display_count($customer_group_query_numrows, MAX_DISPLAY_SEARCH_RESULTS, $HTTP_GET_VARS['page'], TEXT_DISPLAY_NUMBER_OF_CUSTOMERS); ?></td>
                    <td class="smallText" align="right"><?php echo $customer_group_split->display_links($customer_group_query_numrows, MAX_DISPLAY_SEARCH_RESULTS, MAX_DISPLAY_PAGE_LINKS, $HTTP_GET_VARS['page'], tep_get_all_get_params(array('page', 'info', 'x', 'y', 'cID'))); ?></td>
                  </tr>
              <tr>
                <td align="right" colspan="2" class="smallText"><?php echo '<a href="' . tep_href_link(FILENAME_CUSTOMER_GROUPS, 'page=' . $HTTP_GET_VARS['page']  . '&action=new') . '">' . tep_image_button('button_insert.gif', IMAGE_INSERT) . '</a>'; ?></td>
              </tr>

<?php
    if (isset($HTTP_GET_VARS['search']) && tep_not_null($HTTP_GET_VARS['search'])) {
?>
                  <tr>
                    <td align="right" colspan="2"><?php echo '<a href="' . tep_href_link(FILENAME_CUSTOMER_GROUPS) . '">' . tep_image_button('button_reset.gif', IMAGE_RESET) . '</a>'; ?></td>
                  </tr>
<?php
    }
?>
                </table></td>
              </tr>
            </table></td>
<?php
  $heading = array();
  $contents = array();

  switch ($action) {
    case 'confirm':
      $heading[] = array('text' => '<b>' . TEXT_INFO_HEADING_DELETE_CUSTOMER . '</b>');

      $contents = array('form' => tep_draw_form('customer_group', FILENAME_CUSTOMER_GROUPS, tep_get_all_get_params(array('cID', 'action')) . 'cID=' . $cInfo->customer_group_id . '&action=deleteconfirm'));
      $contents[] = array('text' => TEXT_DELETE_INTRO . '<br><br><b>' . $cInfo->customer_name . '</b>');
      $contents[] = array('align' => 'center', 'text' => '<br>' . tep_image_submit('button_delete.gif', IMAGE_DELETE) . ' <a href="' . tep_href_link(FILENAME_CUSTOMER_GROUPS, tep_get_all_get_params(array('cID', 'action')) . 'cID=' . $cInfo->customer_group_id) . '">' . tep_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>');
      break;
    default:
      if (isset($cInfo) && is_object($cInfo)) {
        $heading[] = array('text' => '<b>' . $cInfo->customer_group_name .'</b>');

        $contents[] = array('align' => 'center', 'text' => '<a href="' . tep_href_link(FILENAME_CUSTOMER_GROUPS, tep_get_all_get_params(array('cID', 'action')) . 'cID=' . $cInfo->customer_group_id . '&action=edit') . '">' . tep_image_button('button_edit.gif', IMAGE_EDIT) . '</a> <a href="' . tep_href_link(FILENAME_CUSTOMER_GROUPS, tep_get_all_get_params(array('cID', 'action')) . 'cID=' . $cInfo->customer_group_id . '&action=confirm') . '">' . tep_image_button('button_delete.gif', IMAGE_DELETE) . '</a>');
      }
      break;
  }

  if ( (tep_not_null($heading)) && (tep_not_null($contents)) ) {
    echo '            <td width="25%" valign="top">' . "\n";

    $box = new box;
    echo $box->infoBox($heading, $contents);

    echo '            </td>' . "\n";
  }
?>
          </tr>
        </table></td>
      </tr>
<?php
  }
?>
    </table></td>
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
