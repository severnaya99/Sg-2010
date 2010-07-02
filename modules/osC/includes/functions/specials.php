<?php
/*
  $Id: specials.php 57 2005-12-15 14:39:09Z Michael $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

////
// Sets the status of a special product
  function tep_set_specials_status($specials_id, $status) {
    global $xoopsDB;
    return $xoopsDB->queryF("update " . TABLE_SPECIALS . " set status = '" . $status . "', date_status_change = now() where specials_id = '" . (int)$specials_id . "'");
  }

////
// Auto expire products on special
  function tep_expire_specials() {
  global $xoopsDB;
  $xoopsDB->queryF("update ".TABLE_SPECIALS." set status='0' where status = '1' and now() >= expires_date and expires_date > 0");

/*    $specials_query = $xoopsDB->queryF("select specials_id from " . TABLE_SPECIALS . " where status = '1' and now() >= expires_date and expires_date > 0");
    if ($xoopsDB->getRowsNum($specials_query)) {
      while ($specials = tep_db_fetch_array($specials_query)) {
        tep_set_specials_status($specials['specials_id'], '0');
      }
    }
*/
  }
?>