<?php
  $_GET["lang"]=strtolower($_GET["lang"]);

  require('includes/application_top.php');
  if ( $xoopsUser ) {
	if ( !$xoopsUser->isAdmin(-1) ) {
		redirect_header("index.php",2,"You are not Xoops Admin");
		exit();
	}
  } else {
	redirect_header("index.php",2,"You are not Xoops Admin");
	exit();
  }
  //IMAGINACOLOMBIA.COM
  $xoopsTpl->assign('xoops_showlblock',0);
  $xoopsTpl->assign('isshop',1);
  $xoopsTpl->assign('xoops_showrblock',0);
  $xoopsTpl->assign('xoops_showcblock',0);
  //IMAGINACOLOMBIA.COM  
  
  require($template->get_template_dir('tpl_main_page2.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/tpl_main_page2.php');
  
?>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>