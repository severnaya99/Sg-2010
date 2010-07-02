<?php
//
// +----------------------------------------------------------------------+
// |zen-cart Open Source E-commerce                                       |
// +----------------------------------------------------------------------+
// | Copyright (c) 2004 The zen-cart developers                           |
// |                                                                      |
// | http://www.zen-cart.com/index.php                                    |
// |                                                                      |
// | Portions Copyright (c) 2003 osCommerce                               |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.0 of the GPL license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available through the world-wide-web at the following url:           |
// | http://www.zen-cart.com/license/2_0.txt.                             |
// | If you did not receive a copy of the zen-cart license and are unable |
// | to obtain it through the world-wide-web, please send a note to       |
// | license@zen-cart.com so we can mail you a copy immediately.          |
// +----------------------------------------------------------------------+
// $Id: index.php 1591 2005-07-15 19:57:46Z ajeh $
//

  require('includes/application_top.php');
  //IMAGINACOLOMBIA.COM
  $xoopsTpl->assign('xoops_showlblock',0);
  $xoopsTpl->assign('isshop',1);
  $xoopsTpl->assign('xoops_showrblock',0);
  $xoopsTpl->assign('xoops_showcblock',0);
  
  if(substr($_GET['main_page'],0,5)=="popup") $noxoopstheme = 1; // if popup disable theme
  
  //IMAGINACOLOMBIA.COM
// determine the page directory

/*if ((!empty($_SESSION['xoopsUserId'])) && (!isset($_SESSION['customer_id'] )) && (FILENAME_LOGIN != $_GET['main_page']) ){
        $email_address=$xoopsUser->getVar("email");
        $check_customer_query = "SELECT customers_id,
                                                      customers_firstname,
                                                      customers_lastname,
                                                      customers_password,
                                                      customers_email_address,
                                                      customers_default_address_id,
                                                      customers_authorization
                                           FROM " . TABLE_CUSTOMERS . "
                                           WHERE customers_email_address = '" . zen_db_input($email_address) . "'";
        $check_customer = $db->Execute($check_customer_query);
        $_POST['email_address'] = $email_address;
        $_POST['password']=zen_db_prepare_input($check_customer->fields['customers_password']) ;
        $_GET['main_page'] = FILENAME_LOGIN;
        $_GET['action'] = 'processxoops';
  }*/
  if (!isset($_GET['main_page']) || !zen_not_null($_GET['main_page'])) $_GET['main_page'] = 'index';

  if (MISSING_PAGE_CHECK == 'true') {
    if (!is_dir(DIR_WS_MODULES .  'pages/' . $_GET['main_page'])) $_GET['main_page'] = 'index';
  }

  $current_page = $_GET['main_page'];

  $current_page_base = $current_page;
  $code_page_directory = DIR_WS_MODULES . 'pages/' . $current_page_base;
  $page_directory = $code_page_directory;

  $language_page_directory = DIR_WS_LANGUAGES . $_SESSION['language'] . '/';

// load all files in the page directory starting with 'header_php'

  $directory_array = $template->get_template_part($code_page_directory, '/^header_php/');

  while(list ($key, $value) = each($directory_array)) {
    require($code_page_directory . '/' . $value);
  }

  require($template->get_template_dir('html_header.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/html_header.php');

// Define Template Variables picked up from includes/main_template_vars.php unless a file exists in the
// includes/pages/{page_name}/directory to overide. Allowing different pages to have different overall
//templates.

  require($template->get_template_dir('main_template_vars.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/main_template_vars.php');

// Read the "on_load" scripts for the individual page, and from the site-wide template settings
// NOTE: on_load_*.js files must contain just the raw code to be inserted in the <body> tag in the on_load="" parameter.
// Looking in "/includes/modules/pages" for files named "on_load_*.js"
  $directory_array = $template->get_template_part(DIR_WS_MODULES . 'pages/' . $current_page_base, '/^on_load_/', '.js');
  while(list ($key, $value) = each($directory_array)) {
    $onload_file = DIR_WS_MODULES . 'pages/' . $current_page_base . '/' . $value;
    $read_contents='';
    $lines = @file($onload_file);
    foreach($lines as $line) {
      $read_contents.=$line;
    }
  $za_onload_array[]=$read_contents;
  }
  //now read "includes/templates/TEMPLATE/jscript/on_load/on_load_*.js", which would be site-wide settings
  $directory_array=array();
  $tpl_dir=$template->get_template_dir('.js', DIR_WS_TEMPLATE, 'jscript/on_load', 'jscript/on_load_');
  $directory_array = $template->get_template_part($tpl_dir ,'/^on_load_/', '.js');
  while(list ($key, $value) = each($directory_array)) {
    $onload_file = $tpl_dir . '/' . $value;
    $read_contents='';
    $lines = @file($onload_file);
    foreach($lines as $line) {
      $read_contents.=$line;
    }
  $za_onload_array[]=$read_contents;
  }
  if ($zc_first_field !='') $za_onload_array[] = $zc_first_field; // for backwards compatibility with previous $zc_first_field usage
  if (count($za_onload_array)>0) $zv_onload=implode(';',$za_onload_array);
  $zv_onload = str_replace(';;',';',$zv_onload.';'); //ensure we have just one ';' between each, and at the end
  if (trim($zv_onload) == ';') $zv_onload='';  // ensure that a blank list is truly blank and thus ignored.

// Define the template that will govern the overall page layout, can be done on a page by page basis
// or using a default template. The default template installed will be a standard 3 column lauout. This
// template also loads the page body code based on the variable $body_code.

  require($template->get_template_dir('tpl_main_page.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/tpl_main_page.php');
?>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>