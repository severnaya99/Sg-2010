<?php

/**
* $Id: blocks.php 331 2007-12-23 16:01:11Z malanciault $
* Module: SmartSection
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

/*global $xoopsConfig, $xoopsModule, $xoopsModuleConfig;
if (isset($xoopsModuleConfig) && isset($xoopsModule) && $xoopsModule->getVar('dirname') == 'smartsection') {
	$itemType = $xoopsModuleConfig['itemtype'];
} else {
	$hModule = &xoops_gethandler('module');
	$hModConfig = &xoops_gethandler('config');
	if ($smartsection_Module = &$hModule->getByDirname('smartsection')) {
		$module_id = $smartsection_Module->getVar('mid');
		$smartsection_Config = &$hModConfig->getConfigsByCat(0, $smartsection_Module->getVar('mid'));
		$itemType = $smartsection_Config['itemtype'];
	} else {
		$itemType = 'article';
	}	
}

include_once(XOOPS_ROOT_PATH . "/modules/smartsection/language/" . $xoopsConfig['language'] . "/plugin/" . $itemType . "/blocks.php");
*/
// Blocks

define("_MB_SSECTION_ALLCAT", "���� �� ����������");
define("_MB_SSECTION_AUTO_LAST_ITEMS", "�� ������������ �������� �� ��������� �����������?");
define("_MB_SSECTION_CATEGORY", "���������");
define("_MB_SSECTION_CHARS", "����� ��� ������");
define("_MB_SSECTION_COMMENTS", "������");
define("_MB_SSECTION_DATE", "���������� �����������");
define("_MB_SSECTION_DISP", "��������");
define("_MB_SSECTION_DISPLAY_CATEGORY", "�������� ��� ������ ��� ����������;");
define("_MB_SSECTION_DISPLAY_COMMENTS", "�������� ��� ������� ��� �������;");
define("_MB_SSECTION_DISPLAY_TYPE", "����� ��������� : ");
define("_MB_SSECTION_DISPLAY_TYPE_BLOCK", "���� ����������� �� ����� block");
define("_MB_SSECTION_DISPLAY_TYPE_BULLET", "���� ����������� �� ����� ��������");
define("_MB_SSECTION_DISPLAY_WHO_AND_WHEN", "�������� ��� ��������� ��� ��� �����������;");
define("_MB_SSECTION_FULLITEM", "�������� ��� �� �����");
define("_MB_SSECTION_HITS", "������� ����������");
define("_MB_SSECTION_ITEMS", "�����");
define("_MB_SSECTION_LAST_ITEMS_COUNT", "�� ���, ���� ����������� �� ������������;");
define("_MB_SSECTION_LENGTH", " ����������");
define("_MB_SSECTION_ORDER", "����� ���������");
define("_MB_SSECTION_POSTEDBY", "������������ ��� ���");
define("_MB_SSECTION_READMORE", "�������� �����������...");
define("_MB_SSECTION_READS", "����������");
define("_MB_SSECTION_SELECT_ITEMS", "�� ���, �������� ���� ����� �� ������������ :");
define("_MB_SSECTION_SELECTCAT", "�������� ��� ������ ��� ���������� :");
define("_MB_SSECTION_VISITITEM", "������������ ���");
define("_MB_SSECTION_WEIGHT", "�������� ���� �����");
define("_MB_SSECTION_WHO_WHEN", "������������ ��� ��� %s ���� %s");
?>