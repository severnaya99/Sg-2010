<?php
/*
  $Id: address_book.php 129 2006-01-21 16:16:06Z Michael $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License

  adapted 2005 for xoops 2.0.x by FlinkUX e.K. <http://www.flinkux.de>
  
  (c) 2005  Michael Hammelmann <michael.hammelmann@flinkux.de>
*/

  require('includes/application_top.php');
  $xoopsOption['template_main'] = 'address_book.html';
  include XOOPS_ROOT_PATH.'/header.php';
  $xoopsTpl->assign("xoops_module_header",'<link rel="stylesheet" type="text/css" media="screen" href="'.XOOPS_URL.'/modules/osC/templates/stylesheet.css" />');

  if (!tep_session_is_registered('customer_id')) {
    $navigation->set_snapshot();
    tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
  }

  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_ADDRESS_BOOK);

  $breadcrumb->add(NAVBAR_TITLE_1, tep_href_link(FILENAME_ACCOUNT, '', 'SSL'));
  $breadcrumb->add(NAVBAR_TITLE_2, tep_href_link(FILENAME_ADDRESS_BOOK, '', 'SSL'));
  include("includes/header.php");
  $xoopsTpl->assign("site_image",tep_image(DIR_WS_IMAGES . 'table_background_address_book.gif', HEADING_TITLE, HEADING_IMAGE_WIDTH, HEADING_IMAGE_HEIGHT));
  $xoopsTpl->assign("seperator",tep_draw_separator('pixel_trans.gif', '100%', '10'));
  $xoopsTpl->assign("seperator1",tep_draw_separator('pixel_trans.gif', '10', '1'));
  if ($messageStack->size('addressbook') > 0) {
		$xoopsTpl->assign("smessage",1);
		$xoopsTpl->assign("messagetext",$messageStack->output('addressbook'));
  }
  $xoopsTpl->assign("arrow_se",tep_image(DIR_WS_IMAGES . 'arrow_south_east.gif'));
  $xoopsTpl->assign("adr_label",tep_address_label($customer_id, $customer_default_address_id, true, ' ', '<br>'));

  $addresses_query = tep_db_query("select address_book_id, entry_firstname as firstname, entry_lastname as lastname, entry_company as company, entry_street_address as street_address, entry_suburb as suburb, entry_city as city, entry_postcode as postcode, entry_state as state, entry_zone_id as zone_id, entry_country_id as country_id from " . TABLE_ADDRESS_BOOK . " where customers_id = '" . (int)$customer_id . "' order by firstname, lastname");
  $i=0;
  $xoopsTpl->assign("img_small",tep_image_button('small_edit.gif', SMALL_IMAGE_BUTTON_EDIT));
  $xoopsTpl->assign("img_small_del",tep_image_button('small_delete.gif', SMALL_IMAGE_BUTTON_DELETE));
  while ($addresses = tep_db_fetch_array($addresses_query)) {
    $address[$i]=$addresses;
    $format_id = tep_get_address_format_id($addresses['country_id']);
	$address[$i]['link']=tep_href_link(FILENAME_ADDRESS_BOOK_PROCESS, 'edit=' . $addresses['address_book_id'], 'SSL');
	$address[$i]['link_delete']=tep_href_link(FILENAME_ADDRESS_BOOK_PROCESS, 'delete=' . $addresses['address_book_id'], 'SSL');
	if ($addresses['address_book_id'] == $customer_default_address_id) {
	 $address[$i]['default_address']= '&nbsp;<small><i>' . PRIMARY_ADDRESS . '</i></small>';
    }
	$address[$i]['name']=tep_output_string_protected($addresses['firstname'] . ' ' . $addresses['lastname']);
    $address[$i]['address'] =tep_address_format($format_id, $addresses, true, ' ', '<br>');
    $i++;
  }
  $xoopsTpl->assign("address",$address);
  $xoopsTpl->assign("account",tep_href_link(FILENAME_ACCOUNT, '', 'SSL'));
  $xoopsTpl->assign("bt_back",tep_image_button('button_back.gif', IMAGE_BUTTON_BACK));
  if (tep_count_customer_address_book_entries() < MAX_ADDRESS_BOOK_ENTRIES) {
    $xoopsTpl->assign("entries",1);
    $xoopsTpl->assign("entries_link",tep_href_link(FILENAME_ADDRESS_BOOK_PROCESS, '', 'SSL'));
    $xoopsTpl->assign("bt_add_adr",tep_image_button('button_add_address.gif', IMAGE_BUTTON_ADD_ADDRESS));
  }
  $xoopsTpl->assign("max_entries",sprintf(TEXT_MAXIMUM_ENTRIES, MAX_ADDRESS_BOOK_ENTRIES));
include_once XOOPS_ROOT_PATH.'/footer.php';
include(XOOPS_ROOT_PATH."/modules/osC/includes/application_bottom.php");
?>