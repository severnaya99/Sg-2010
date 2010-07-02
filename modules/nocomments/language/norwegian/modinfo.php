<?php
if (!defined('_NOCOMMENTS_MODULE_NAME')){
define('_NOCOMMENTS_MODULE_NAME', 'Add Comments');
define('_NOCOMMENTS_MODULE', 'How to add comments-function to any XOOPS module');
define('_NOCOMMENTS_MODULEDESC', 'How to add comments to any module.');
define('_NOCOMMENTS_BEGIN', 'This module demonstrates how this hack works and have description how you can add it to your own module. It doesn\'t matter if your module use sql or not, you can now build a simple module with an index.php containing for example only a javascript, and still get comments to the module.');
define('_NOCOMMENTS_AUTHOR', 'This hack is made possible because of the teamwork between Culex and Runeher. Join forces in XOOPS you too, and make things happen! :)');
define('_NOCOMMENTS_BEGIN2', 'There are a few things you have to do to get it to work:');
define('_NOCOMMENTS_BEGIN3', 'First copy the following files and folders in the module folder of this module, to your module folder:');

define('_NOCOMMENTS_BEGIN4', '
<ul><li>comment_delete.php</li>
<li>comment_edit.php</li>
<li>comment_new.php</li>
<li>comment_post.php</li>
<li>comment_reply.php</li>
<li>comment_view.php</li>
<li>commentform.php</li>
<li>display_comments.php</li>
<li>extra_functions.php</li>
<li>Folder <strong>js</strong> (or add the files to your existing js folder).</li>
<li>Folder language (or add language/english/noitemcomments_lang.php to your existing language folder).</li></ul>
');

define('_NOCOMMENTS_BEGIN5', 'Next you have to connect the comments to your module by adding 3 includes as described in bottom of index.php in this module. Look for the commented lines and copy it to your module. Remember to change module name.');

define('_NOCOMMENTS_BEGIN6', 'Then do the following:');

define('_NOCOMMENTS_BEGIN7', '<ul><li>Open the file xoop_version.php of <strong>this module</strong> and copy the commented code to <strong>your module\'s</strong> xoops_version.php</li>
<li>Open the file display_comments.php and do as described in the commented line (Line 38).</li>
<li>Open the file preloads/core.php and do as described in the commented lines.</li></ul>');

define('_NOCOMMENTS_BEGIN8', '<p>Finally: <strong>UPDATE YOUR MODULE!</strong></p><p>NOTE! This hack requires at least XOOPS version 2.4.0, so you better <a href="http://www.xoops.org/modules/core/" rel="external">UPGRADE</a> if you want to use it!</p><div style="font-size:1.1em; font-weight: bold; text-align: center;"><a href="source/nocomments.zip">Download Source>Download Source</a></div>');
}
?>