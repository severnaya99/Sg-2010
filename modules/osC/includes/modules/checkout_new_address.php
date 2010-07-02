<?php
/*
  $Id: checkout_new_address.php 38 2005-11-14 16:35:43Z Michael $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

  if (!isset($process)) $process = false;
?>
<table border="0" width="100%" cellspacing="0" cellpadding="2">
<?php
  if (ACCOUNT_GENDER == 'true') {
    $xoopsTpl->assign("cna_gender",1);
    if (isset($gender)) {
      $male = ($gender == 'm') ? true : false;
      $female = ($gender == 'f') ? true : false;
    } else {
      $male = false;
      $female = false;
    }
    $xoopsTpl->assign("cna_male",tep_draw_radio_field('gender', 'm', $male));
    $xoopsTpl->assign("cna_female",tep_draw_radio_field('gender', 'f', $female));
    if(tep_not_null(ENTRY_GENDER_TEXT)) $xoopsTpl->assign("cna_gender_entry",'<span class="inputRequirement">' . ENTRY_GENDER_TEXT . '</span>');
  }
 $xoopsTpl->assign("cna_firstname",tep_draw_input_field('firstname'));
 $xoopsTpl->assign("cna_lastname",tep_draw_input_field('lastname'));
 if(tep_not_null(ENTRY_FIRST_NAME_TEXT)) $xoopsTpl->assign("cna_firstname_entry",'<span class="inputRequirement">' . ENTRY_FIRST_NAME_TEXT . '</span>');
 if(tep_not_null(ENTRY_LAST_NAME_TEXT)) $xoopsTpl->assign("cna_lastname_entry",'<span class="inputRequirement">' . ENTRY_LAST_NAME_TEXT . '</span>');
 if (ACCOUNT_COMPANY == 'true') {
   $xoopsTpl->assign("cna_company",1);
   $xoopsTpl->assign("cna_comp", tep_draw_input_field('company'));
   if(tep_not_null(ENTRY_COMPANY_TEXT)) $xoopsTpl->assign("cna_comp_entry", '<span class="inputRequirement">' . ENTRY_COMPANY_TEXT . '</span>');   
  }
  $xoopsTpl->assign("cna_street",tep_draw_input_field('street_address'));
  if(tep_not_null(ENTRY_STREET_ADDRESS_TEXT))$xoopsTpl->assign("cna_street_entry",'<span class="inputRequirement">' . ENTRY_STREET_ADDRESS_TEXT . '</span>');
  if (ACCOUNT_SUBURB == 'true') {
    $xoopsTpl->assign("cna_suburb",1);
	$xoopsTpl->assign("cna_sub",tep_draw_input_field('suburb') );
	
	if(tep_not_null(ENTRY_SUBURB_TEXT))$xoopsTpl->assign("cna_sub_entry",'<span class="inputRequirement">' . ENTRY_SUBURB_TEXT . '</span>');
  }
 $xoopsTpl->assign("cna_postcode",tep_draw_input_field('postcode') );
 if(tep_not_null(ENTRY_POST_CODE_TEXT))$xoopsTpl->assign("cna_postcode_entry",'<span class="inputRequirement">' . ENTRY_POST_CODE_TEXT . '</span>');
$xoopsTpl->assign("cna_city",tep_draw_input_field('city'));

if (tep_not_null(ENTRY_CITY_TEXT)) $xoopsTpl->assign("cna_city_entry", '<span class="inputRequirement">' . ENTRY_CITY_TEXT . '</span>');
  if (ACCOUNT_STATE == 'true') {
   $xoopsTpl->assign("cna_state",1);

    if ($process == true) {
      if ($entry_state_has_zones == true) {
        $zones_array = array();
        $zones_query = tep_db_query("select zone_name from " . TABLE_ZONES . " where zone_country_id = '" . (int)$country . "' order by zone_name");
        while ($zones_values = tep_db_fetch_array($zones_query)) {
          $zones_array[] = array('id' => $zones_values['zone_name'], 'text' => $zones_values['zone_name']);
        }
        $xoopsTpl->assign("cna_state_list", tep_draw_pull_down_menu('state', $zones_array));
      } else {
        $xoopsTpl->assign("cna_state_list", tep_draw_input_field('state'));
      }
    } else {
      $xoopsTpl->assign("cna_state_list",tep_draw_input_field('state'));
    }

    if (tep_not_null(ENTRY_STATE_TEXT)) $xoopsTpl->assign("cna_state_entry", '&nbsp;<span class="inputRequirement">' . ENTRY_STATE_TEXT);

  }
  $xoopsTpl->assign("cna_country",tep_get_country_list('country'));
  if(tep_not_null(ENTRY_COUNTRY_TEXT))$xoopsTpl->assign("cna_country_entry",'<span class="inputRequirement">' . ENTRY_COUNTRY_TEXT . '</span>');
?>