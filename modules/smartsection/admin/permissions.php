<?php

/**
* $Id: permissions.php 3437 2008-07-05 10:51:26Z malanciault $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

include_once("admin_header.php");
include_once XOOPS_ROOT_PATH . '/class/xoopsform/grouppermform.php';

if (!$smartsection_isAdmin) {
    redirect_header("javascript:history.go(-1)", 1, _NOPERM);
    exit;
}

$op = '';

switch ($op) {
    case "default":
    default:
        global $xoopsDB, $xoopsModule;

		smartsection_xoops_cp_header();
        smartsection_adminMenu(3, _AM_SSECTION_PERMISSIONS);
        // View Categories permissions
        $item_list_view = array();
        $block_view = array();
        smartsection_collapsableBar('permissionstable', 'permissionsicon', _AM_SSECTION_PERMISSIONSVIEWMAN, _AM_SSECTION_VIEW_CATS);

        $result_view = $xoopsDB->query("SELECT categoryid, name FROM " . $xoopsDB->prefix("smartsection_categories") . " ");
        if ($xoopsDB->getRowsNum($result_view)) {
            while ($myrow_view = $xoopsDB->fetcharray($result_view)) {
                $item_list_view['cid'] = $myrow_view['categoryid'];
                $item_list_view['title'] = $myrow_view['name'];
                $form_view = new XoopsGroupPermForm("", $xoopsModule->getVar('mid'), "category_read", "");
                $block_view[] = $item_list_view;
                foreach ($block_view as $itemlists) {
                    $form_view->addItem($itemlists['cid'], $myts->displayTarea($itemlists['title']));
                }
            }
            echo $form_view->render();
        } else {
			echo "<img id='toptableicon' src=" . XOOPS_URL . "/modules/" . $xoopsModule->dirname() . "/images/icon/close12.gif alt='' /></a>&nbsp;" . _AM_SSECTION_PERMISSIONSVIEWMAN . "</h3><div id='toptable'><span style=\"color: #567; margin: 3px 0 0 0; font-size: small; display: block; \">" . _AM_SSECTION_NOPERMSSET . "</span>";

        }
        smartsection_close_collapsable('permissionstable', 'permissionsicon');


        echo "<br />\n";
        smartsection_collapsableBar('permissionstable_submit', 'permissions_tableicon', _AM_SSECTION_PERMISSIONS_CAT_SUBMIT, _AM_SSECTION_PERMISSIONS_CAT_SUBMIT_DSC);

        $result_view2 = $xoopsDB->query("SELECT categoryid, name FROM " . $xoopsDB->prefix("smartsection_categories") . " ");
        if ($xoopsDB->getRowsNum($result_view2)) {
            while ($myrow_view = $xoopsDB->fetcharray($result_view2)) {
                $item_list_view['cid'] = $myrow_view['categoryid'];
                $item_list_view['title'] = $myts->displayTarea($myrow_view['name']);
                $form_sumit = new XoopsGroupPermForm("", $xoopsModule->getVar('mid'), "item_submit", "");
                $block_submit[] = $item_list_view;
                foreach ($block_submit as $itemlists) {
                    $form_sumit->addItem($itemlists['cid'], $itemlists['title']);
                }
            }
            echo $form_sumit->render();
        } else {
			echo "<img id='toptableicon' src=" . XOOPS_URL . "/modules/" . $xoopsModule->dirname() . "/images/icon/close12.gif alt='' /></a>&nbsp;" . _AM_SSECTION_PERMISSIONSVIEWMAN . "</h3><div id='toptable'><span style=\"color: #567; margin: 3px 0 0 0; font-size: small; display: block; \">" . _AM_SSECTION_NOPERMSSET . "</span>";

        }
        smartsection_close_collapsable('permissionstable_submit', 'permissions_tableicon');

}
smart_xoops_cp_footer();
?>