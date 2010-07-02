<?php
/**
 * $Id: distributors.php 64 2005-12-19 18:07:20Z Michael $
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

	    $distributor_id=tep_db_prepare_input($_GET['cID']);
		$distributor_name=tep_db_prepare_input($_POST['distributor_name']);
		$image_prefix=tep_db_prepare_input($_POST['image_prefix']);
		$pdf_prefix=tep_db_prepare_input($_POST['pdf_prefix']);
        $sql_data_array = array('distributor_name' => $distributor_name,
		'pdf_prefix' => $pdf_prefix,
		'image_prefix' => $image_prefix );


        tep_db_perform(TABLE_DISTRIBUTORS, $sql_data_array, 'update', "distributor_id = '" . (int)$distributor_id . "'");

        tep_redirect(tep_href_link(FILENAME_DISTRIBUTORS, tep_get_all_get_params(array('cID', 'action')) . 'cID=' . $distributor_id));


        break;
		case 'insert':
	    $distributor_id=tep_db_prepare_input($_POST['cID']);
		$distributor_name=tep_db_prepare_input($_POST['distributor_name']);
		$image_prefix=tep_db_prepare_input($_POST['image_prefix']);
		$pdf_prefix=tep_db_prepare_input($_POST['pdf_prefix']);
        $sql_data_array = array('distributor_name' => $distributor_name,
		'pdf_prefix' => $pdf_prefix,
		'image_prefix' => $image_prefix );

        tep_db_perform(TABLE_DISTRIBUTORS, $sql_data_array, 'insert');
        tep_redirect(tep_href_link(FILENAME_DISTRIBUTORS, tep_get_all_get_params(array('cID', 'action')) . 'cID=' . $distributor_id));
        break;

      case 'deleteconfirm':
        $customer_group_id = tep_db_prepare_input($HTTP_GET_VARS['cID']);
        tep_db_query("delete from " . TABLE_DISTRIBUTORS . " where distributor_id = '" . (int)$customer_group_id . "'");

        tep_redirect(tep_href_link(FILENAME_DISTRIBUTORS, tep_get_all_get_params(array('cID', 'action'))));
        break;
      default:
        $customers_query = tep_db_query("select * from " . TABLE_DISTRIBUTORS . " where distributor_id =  '" . (int)$HTTP_GET_VARS['cID'] . "'");
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
      <tr><?php echo tep_draw_form('distributors', FILENAME_DISTRIBUTORS , tep_get_all_get_params(array('action')) . 'action=insert', 'post', '') ; ?>
<?php
}else {
?>
      <tr><?php echo tep_draw_form('distributorss', FILENAME_DISTRIBUTORS, tep_get_all_get_params(array('action')) . 'action=update', 'post', '') ; ?>
<?php } ?>
        <td class="formAreaTitle"><?php echo DISTRIBUTORS; ?></td>
      </tr>
      <tr>
        <td class="formArea"><table border="0" cellspacing="2" cellpadding="2">
          <tr>
            <td class="main"><?php echo ENTRY_DISTRIBUTOR_NAME; ?></td>
            <td class="main">
<?php
  if ($error == true) {
    if ($entry_firstname_error == true) {
      echo tep_draw_input_field('distributor_name', $cInfo->distributor_name, 'maxlength="50"') . '&nbsp;' . ENTRY_GROUP_NAME_ERROR;
    } else {
      echo $cInfo->distributor_name . tep_draw_hidden_field('distributor_name');
    }
  } else {
    echo tep_draw_input_field('distributor_name', $cInfo->distributor_name, 'maxlength="50"', true);
  }
?></td>
          </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
          <tr>
            <td class="main"><?php echo ENTRY_PDF_PREFIX; ?></td>
            <td class="main">
<?php
  if ($error == true) {
    if ($entry_firstname_error == true) {
      echo tep_draw_input_field('pdf_prefix', $cInfo->pdf_prefix, 'maxlength="50"');
    } else {
      echo $cInfo->pdf_prefix . tep_draw_hidden_field('pdf_prefix');
    }
  } else {
    echo tep_draw_input_field('pdf_prefix', $cInfo->pdf_prefix, 'maxlength="50"');
  }
?></td>
          </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
          <tr>
            <td class="main"><?php echo ENTRY_IMAGE_PREFIX; ?></td>
            <td class="main">
<?php
  if ($error == true) {
    if ($entry_firstname_error == true) {
      echo tep_draw_input_field('image_prefix', $cInfo->image_prefix, 'maxlength="50"')  ;
    } else {
      echo $cInfo->image_prefix . tep_draw_hidden_field('image_prefix');
    }
  } else {
    echo tep_draw_input_field('image_prefix', $cInfo->image_prefix, 'maxlength="50"');
  }
?></td>
          </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>

      <tr>
        <td align="right" class="main"><?php echo tep_image_submit('button_update.gif', IMAGE_UPDATE) . ' <a href="' . tep_href_link(FILENAME_DISTRIBUTORS, tep_get_all_get_params(array('action'))) .'">' . tep_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>'; ?></td>
      </tr></form>
<?php
  } else {
?>
      <tr>
        <td><?php echo tep_draw_form('search', FILENAME_DISTRIBUTORS, '', 'get'); ?><table border="0" width="100%" cellspacing="0" cellpadding="0">
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
      $search = "where distributor_name like '%" . $keywords . "%' ";
    }
    $customer_group_query_raw = "select * from " . TABLE_DISTRIBUTORS . " " . $search . " order by distributor_name";
    $customer_group_split = new splitPageResults($HTTP_GET_VARS['page'], MAX_DISPLAY_SEARCH_RESULTS, $customer_group_query_raw, $customer_group_query_numrows);
    $customer_group_query = tep_db_query($customer_group_query_raw);
    while ($customer_groups = tep_db_fetch_array($customer_group_query)) {
      if (isset($cInfo) && is_object($cInfo) && ($customer_groups['distributor_id'] == $cInfo->distributor_id)) {
        echo '          <tr id="defaultSelected" class="dataTableRowSelected" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href=\'' . tep_href_link(FILENAME_DISTRIBUTORS, tep_get_all_get_params(array('cID', 'action')) . 'cID=' . $cInfo->distributor_id . '&action=edit') . '\'">' . "\n";
      } else {
        echo '          <tr class="dataTableRow" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href=\'' . tep_href_link(FILENAME_DISTRIBUTORS, tep_get_all_get_params(array('cID')) . 'cID=' . $customer_groups['distributor_id'] . '&action=view').'\'">' . "\n";
      }
?>
                <td class="dataTableContent"><?php echo $customer_groups['distributor_name']; ?></td>
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
                <td align="right" colspan="2" class="smallText"><?php echo '<a href="' . tep_href_link(FILENAME_DISTRIBUTORS, 'page=' . $HTTP_GET_VARS['page']  . '&action=new') . '">' . tep_image_button('button_insert.gif', IMAGE_INSERT) . '</a>'; ?></td>
              </tr>

<?php
    if (isset($HTTP_GET_VARS['search']) && tep_not_null($HTTP_GET_VARS['search'])) {
?>
                  <tr>
                    <td align="right" colspan="2"><?php echo '<a href="' . tep_href_link(FILENAME_DISTRIBUTORS) . '">' . tep_image_button('button_reset.gif', IMAGE_RESET) . '</a>'; ?></td>
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

      $contents = array('form' => tep_draw_form('distributors', FILENAME_DISTRIBUTORS, tep_get_all_get_params(array('cID', 'action')) . 'cID=' . $cInfo->distributor_id . '&action=deleteconfirm'));
      $contents[] = array('text' => TEXT_DELETE_INTRO . '<br><br><b>' . $cInfo->distributor_name . '</b>');
      $contents[] = array('align' => 'center', 'text' => '<br>' . tep_image_submit('button_delete.gif', IMAGE_DELETE) . ' <a href="' . tep_href_link(FILENAME_DISTRIBUTORS, tep_get_all_get_params(array('cID', 'action')) . 'cID=' . $cInfo->distributor_id) . '">' . tep_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>');
      break;
    default:
      if (isset($cInfo) && is_object($cInfo)) {
        $heading[] = array('text' => '<b>' . $cInfo->distributor_name .'</b>');

        $contents[] = array('align' => 'center', 'text' => '<a href="' . tep_href_link(FILENAME_DISTRIBUTORS, tep_get_all_get_params(array('cID', 'action')) . 'cID=' . $cInfo->distributor_id . '&action=edit') . '">' . tep_image_button('button_edit.gif', IMAGE_EDIT) . '</a> <a href="' . tep_href_link(FILENAME_DISTRIBUTORS, tep_get_all_get_params(array('cID', 'action')) . 'cID=' . $cInfo->distributor_id . '&action=confirm') . '">' . tep_image_button('button_delete.gif', IMAGE_DELETE) . '</a>');
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
