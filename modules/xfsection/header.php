<?php
// $Id: header.php,v 1.3 2005/06/25 10:24:11 ohwada Exp $

// 2003/10/11 K.OHWADA
// easy to rename module and table
//   add conf.php

include("../../mainfile.php");

include_once 'conf.php';	// add

include_once (XOOPS_ROOT_PATH."/modules/".$xoopsModule->dirname()."/include/functions.php");
include_once (XOOPS_ROOT_PATH."/modules/".$xoopsModule->dirname()."/class/common.php");

?>
