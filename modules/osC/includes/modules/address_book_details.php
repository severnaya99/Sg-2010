<?php
/*
  $Id: address_book_details.php 38 2005-11-14 16:35:43Z Michael $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

  if (!isset($process)) $process = false;
  if (ACCOUNT_GENDER == 'true') {
    if (isset($gender)) {
      $male = ($gender == 'm') ? true : false;
    } else {
      $male = ($entry['entry_gender'] == 'm') ? true : false;
    }
    $female = !$male;
	$xoopsTpl->assign("gender",1);
	$xoopsTpl->assign("male",tep_draw_radio_field('gender', 'm', $male));
	$xoopsTpl->assign("female",tep_draw_radio_field('gender', 'f', $female));
	if(tep_not_null(ENTRY_GENDER_TEXT))$xoopsTpl->assign("gender_entry",'<span class="inputRequirement">' . ENTRY_GENDER_TEXT . '</span>');
  }
  $xoopsTpl->assign("firstname",tep_draw_input_field('firstname', $entry['entry_firstname']) );
  $xoopsTpl->assign("lastname",tep_draw_input_field('lastname', $entry['entry_lastname']));
  $xoopsTpl->assign("seperator", tep_draw_separator('pixel_trans.gif', '100%', '10'));
  if(tep_not_null(ENTRY_FIRST_NAME_TEXT))$xoopsTpl->assign("firstname_entry",'<span class="inputRequirement">' . ENTRY_FIRST_NAME_TEXT . '</span>');
  if(tep_not_null(ENTRY_LAST_NAME_TEXT)) $xoopsTpl->assign("lastname_entry",'<span class="inputRequirement">' . ENTRY_LAST_NAME_TEXT . '</span>');
  if (ACCOUNT_COMPANY == 'true') {
		$xoopsTpl->assign("company",1);
		$xoopsTpl->assign("cname",tep_draw_input_field('company', $entry['entry_company']));
		if(tep_not_null(ENTRY_COMPANY_TEXT) )$xoopsTpl->assign("cname_entry",'<span class="inputRequirement">' . ENTRY_COMPANY_TEXT . '</span>');
  }
	$xoopsTpl->assign("street", tep_draw_input_field('street_address', $entry['entry_street_address']));
	if(tep_not_null(ENTRY_STREET_ADDRESS_TEXT))$xoopsTpl->assign("street_entry",'<span class="inputRequirement">' . ENTRY_STREET_ADDRESS_TEXT . '</span>');
  if (ACCOUNT_SUBURB == 'true') {
	$xoopsTpl->assign("suburb",1);
	$xoopsTpl->assign("sub",tep_draw_input_field('suburb', $entry['entry_suburb']));
	if(tep_not_null(ENTRY_SUBURB_TEXT)) $xoopsTpl->assign("sub_entry",'<span class="inputRequirement">' . ENTRY_SUBURB_TEXT . '</span>');
  }
  $xoopsTpl->assign("post_code",tep_draw_input_field('postcode', $entry['entry_postcode']));
  if(tep_not_null(ENTRY_POST_CODE_TEXT)) $xoopsTpl->assign("post_code_entry",'<span class="inputRequirement">' . ENTRY_POST_CODE_TEXT . '</span>');
  $xoopsTpl->assign("city",tep_draw_input_field('city', $entry['entry_city']));
  if(tep_not_null(ENTRY_CITY_TEXT))$xoopsTpl->assign("city_entry",'<span class="inputRequirement">' . ENTRY_CITY_TEXT . '</span>');
  if (ACCOUNT_STATE == 'true') {
	$xoopsTpl->assign("state",1);
    if ($process == true) {
      if ($entry_state_has_zones == true) {
        $zones_array = array();
        $zones_query = tep_db_query("select zone_name from " . TABLE_ZONES . " where zone_country_id = '" . (int)$country . "' order by zone_name");
        while ($zones_values = tep_db_fetch_array($zones_query)) {
          $zones_array[] = array('id' => $zones_values['zone_name'], 'text' => $zones_values['zone_name']);
        }
        $xoopsTpl->assign("cstate", tep_draw_pull_down_menu('state', $zones_array));
      } else {
         $xoopsTpl->assign("cstate", tep_draw_input_field('state'));
      }
    } else {
       $xoopsTpl->assign("cstate", tep_draw_input_field('state', tep_get_zone_name($entry['entry_country_id'], $entry['entry_zone_id'], $entry['entry_state'])));
    }

    if (tep_not_null(ENTRY_STATE_TEXT)) $xoopsTpl->assign("state_entry",'&nbsp;<span class="inputRequirement">' . ENTRY_STATE_TEXT);
  }
  $xoopsTpl->assign("country",tep_get_country_list('country', $entry['entry_country_id']));
  if(tep_not_null(ENTRY_COUNTRY_TEXT)) $xoopsTpl->assign("country_entry",'<span class="inputRequirement">' . ENTRY_COUNTRY_TEXT . '</span>');
  if ((isset($HTTP_GET_VARS['edit']) && ($customer_default_address_id != $HTTP_GET_VARS['edit'])) || (isset($HTTP_GET_VARS['edit']) == false) ) {
   $xoopsTpl->assign("primary",1);
   $xoopsTpl->assign("primary_field",tep_draw_checkbox_field('primary', 'on', false, 'id="primary"'));
  }
