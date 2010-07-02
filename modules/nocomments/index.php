<?php
include("../../mainfile.php");
include(XOOPS_ROOT_PATH."/header.php");
$xoopsOption['show_rblock'] = 1;
if (file_exists('language/'.$GLOBALS['xoopsConfig']['language'].'/modinfo.php')) {
  include_once 'language/'.$GLOBALS['xoopsConfig']['language'].'/modinfo.php';
}else{
  include_once 'language/english/modinfo.php';
}
// **********************FOR COMMENTS, ADD TO YOUR MODULE**************************
if (file_exists('language/'.$GLOBALS['xoopsConfig']['language'].'/noitemcomments_lang.php')) {
  include_once 'language/'.$GLOBALS['xoopsConfig']['language'].'/noitemcomments_lang.php';
}else{
  include_once 'language/english/noitemcomments_lang.php';
  include_once XOOPS_ROOT_PATH.'/language/english/comment.php';
}
//***********************COMMENTS END********************************
?>
<div id="nocomments-index">
	<h1 style="text-align:center;"><?php echo ''._NOCOMMENTS_MODULE.''; ?></h1>
	<br />
	<div style="text-align: left;">
		<?php echo ''._NOCOMMENTS_BEGIN.''; ?>
		<br /><br />
		<?php echo ''._NOCOMMENTS_BEGIN2.''; ?>
		<br /><br />
		<?php echo ''._NOCOMMENTS_BEGIN3.''; ?>
		<br />
		<img style="float: right;" src="img/comm.png" alt="" />
		<?php echo ''._NOCOMMENTS_BEGIN4.''; ?>
		<br />
		<?php echo ''._NOCOMMENTS_BEGIN5.''; ?>
		<br /><br />
		<?php echo ''._NOCOMMENTS_BEGIN6.''; ?>
		<br />
		<?php echo ''._NOCOMMENTS_BEGIN7.''; ?>
		<br />
		<?php echo ''._NOCOMMENTS_BEGIN4b.''; ?>
		<br /><br />
		<div style="text-align:center;"><?php echo ''._NOCOMMENTS_BEGIN8.''; ?></div>
		<br />
	</div>
</div>
<?php
//********************FOR COMMENTS, ADD THIS TO YOUR MODULE AND CHANGE FOLDER NAME TO YOUR MODULE **************************
// Include the extra functions to use in the commenthack includes
include (XOOPS_ROOT_PATH."/modules/nocomments/extra_functions.php");
// Include display of comments
include (XOOPS_ROOT_PATH."/modules/nocomments/display_comments.php");
// Include commentform to show the form to make comments
include (XOOPS_ROOT_PATH."/modules/nocomments/commentform.php");
//********************END**************************

include(XOOPS_ROOT_PATH."/footer.php");
?>