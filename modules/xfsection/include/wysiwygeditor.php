<?php
// $Id: wysiwygeditor.php,v 1.4 2006/03/20 03:23:03 ohwada Exp $

// 2006-03-17 K.OHWADA
// dont use foreach($HTTP_POST_VARS as $k => $v)
// $HTTP_POST_VARS -> $_POST
// $HTTP_GET_VARS  -> $_GET
// dont use $GLOBALS

// 2004-03-22 K.OHWADA
// BUG 55: Cannot use the table icon in WYSIWYG editor

// 2004/01/29 herve & K.OHWADA
// bug fix : short_open_tag is used
//   < ? XOOPS_URL ? >
//   the original source has not left, since many change part.

// dont use $GLOBALS
//Global $xoopsModule, $xoopsConfig;
//$GLOBALS['drname'] = $xoopsModule->dirname();

//---------------------------------------------------------
function html_editor($textareaname) 
{
	if (preg_match("/(MSIE)/i", $_SERVER['HTTP_USER_AGENT'])) {
		init_editor($textareaname);
	} else {
		xoopsCodeTarea($textareaname);
		xoopsSmilies($textareaname);
	}
}

function init_editor($textareaname) 
{
//	global $xoopsDB, $$textareaname, $maintext;
	global $xoopsDB, $maintext;

	$myts = new MyTextSanitizer;
	$$textareaname = "$maintext";
	$$textareaname = $myts->makeTareaData4Edit($$textareaname, 1, 1, 1);
	$myEditor = "myEditor_".$textareaname;

// bug fix : short_open_tag is used
//	$url_dirname = XOOPS_URL."/modules/".$GLOBALS['drname'];
//	$url_wysiwyg = XOOPS_URL."/modules/".$GLOBALS['drname']."/images/wysiwyg";

// dont use $GLOBALS
	global $xoopsModule;
	$dirname = $xoopsModule->dirname();
	$url_dirname = XOOPS_URL."/modules/".$dirname;
	$url_wysiwyg = XOOPS_URL."/modules/".$dirname."/images/wysiwyg";

// ----- html begin -----
?>

<script type="text/javascript">

window.onerror = handleErrors;
function handleErrors()
{
   //----- Used For Browsers That Don't Want To Behave -----
   return true;
}

function initToolBar(ed, myEditor) {
var eb = document.all.editbar;
if (ed!=null) {
eb._editor = window.frames[myEditor];
}}

function doFormat(what) {
var eb = document.all.editbar;
eb._editor.execCommand(what, arguments[1]);
}

function doLink(what) { 
var eb = document.all.editbar._editor;
	eb._editor.document.execCommand(what); 
}

function dounredo(what) {
var eb = document.all.editbar;
	eb._editor.document.execCommand(what, arguments[1]);
}

function swapMode() {
var eb = document.all.editbar._editor;
eb.swapModes();
}

function newFile(){
 var eb = document.all.editbar;
 eb._editor.newdocument();
}

function Help_OnClick(){
window.open("<?php echo $url_wysiwyg; ?>/help_document.htm","wHelp", "toolbar=10, scrollbars=yes, width=400, height=450");
}

function copyValue_<?php echo $textareaname;?>() {
var theHtml = document.frames("<?php echo $myEditor;?>").document.frames("textEdit").document.body.innerHTML;
theHtml=theHtml.replace(/(\r\n)|(\r)|(\n)/gi," ");
document.all.<?php echo $textareaname;?>.value = theHtml;
}

function word_<?php echo $textareaname;?>_OnClick() {
var t = document.frames("<?php echo $myEditor;?>").document.frames("textEdit").document.body.innerHTML;	
	alert("Not working in this version! Not sure why? But if you could give it a try and help me out?");
	t = t.replace( /<\/?o:p>/gi, '' );
	t = t.replace( /(<td.*?>)\s*<p.*?>(.*?)<\/p>\s*<\/td>/gi, '$1$2</td>' );
	t = t.replace( /<span.*?>(.*?)<\/span>/gi, '$1' );
	t = t.replace( /<t((?:body|r|d|able)\s.*?)style=".*?"(.*?)>/gi, '<t$1$2>' );		
	document.all.<?php echo $textareaname;?>.value = t;
	alert("Cleaning finished!");
}

function SwapView<?php echo $textareaname;?>_OnClick() {
if(document.all.btnSwapView<?php echo $textareaname;?>.value == "<?php echo _AM_VIEWHTML; ?>") {
var sMes = "<?php echo _AM_VIEWWAYSIWIG; ?>";
var sStatusBarMes = "Current View Html";
} else {
var sMes = "<?php echo _AM_VIEWHTML; ?>"
var sStatusBarMes = "Current View Wysiwyg";
}
document.all.btnSwapView<?php echo $textareaname;?>.value = sMes;
window.status  = sStatusBarMes;
swapMode();
}


function ColorPalette<?php echo $textareaname;?>_OnClick(colorString) {
cpick<?php echo $textareaname;?>.bgColor=colorString;
document.all.colourp<?php echo $textareaname;?>.value=colorString;
doFormat('ForeColor',colorString);
}

function doSelectClick(str,el,Mark) {
var eb = document.all.editbar;
doFormat(str,el.options[Index].value);
}

function selectRange(){
	edit = textEdit.document.selection.createRange();	
	RangeType = textEdit.document.selection.type;
}

function pasteHTML(HTML)
{
	alert("Not working in this version! Not sure why? But if you could give it a try and help me out?");
	setFocus();
	selectRange();	
	if (format == "Normal")
	 	 edit.pasteHTML(HTML);
	else
	     edit.text=HTML;
	edit.select();
	textEdit.focus();			
}

function addTable()
{   
	ReturnValue=window.showModalDialog("AddTable.htm","","dialogWidth=310px;dialogHeight=150px;status=0");
	if(ReturnValue && ReturnValue!="") pasteHTML(ReturnValue);
}

</script>
<style type="text/css" media="screen">
			<!--
			.bartop {  border-style: outset; border-top-width: thin; border-right-width: thin; border-bottom-width: thin; border-left-width: thin}
			-->
</style>

<textarea name="<?php echo $textareaname;?>" style="display: none;" rows="1" cols="20"><?php echo $$textareaname;?></textarea>
<table border="1" cellspacing="0" cellpadding="0" bgcolor="#D4D0C8" width="100%" height="40%">
<tr>
<td>
<table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%"><tr valign="top">
<td valign="top">
<div id="editbar">
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="left"><tr>
<td>
<table border="0" cellpadding="0" cellspacing="0"><tr>
<td>
<table border="0" cellspacing="0" cellpadding="0">
<tr class = bartop>
<td nowrap="nowrap" class = 'bartop'>
<img src="<?php echo $url_wysiwyg; ?>/start.gif" align="middle"/>
<img style="cursor:hand;" src="<?php echo $url_wysiwyg; ?>/new.gif" align="middle" border="0" alt="New File" onClick="newFile();" />
<img style="cursor:hand;" src="<?php echo $url_wysiwyg; ?>/new.gif" align="middle" border="0" alt="Refresh (clear document)" 	onClick="dounredo('Refresh');" />
<img src="<?php echo $url_wysiwyg; ?>/separator.gif" align="middle"/>
<img style="cursor:hand;" src="<?php echo $url_wysiwyg; ?>/cut.gif"  align="middle" border="0" alt="Cut" 	onClick="doFormat('Cut')" />
<img style="cursor:hand;" src="<?php echo $url_wysiwyg; ?>/copy.gif" align="middle" border="0" alt="Copy" 	onClick="doFormat('Copy')" />
<img style="cursor:hand;" src="<?php echo $url_wysiwyg; ?>/paste.gif" align="middle" border="0" alt="Paste" 	onClick="doFormat('Paste')"   />
<img src="<?php echo $url_wysiwyg; ?>/separator.gif" align="middle"/>
<img style="cursor:hand;" src="<?php echo $url_wysiwyg; ?>/undo.gif" align="middle" border="0" alt="Undo" 	onClick="dounredo('Undo')" />
<img style="cursor:hand;" src="<?php echo $url_wysiwyg; ?>/redo.gif" align="middle" border="0" alt="Redo" 	onClick="dounredo('Redo')" />
<img src="<?php echo $url_wysiwyg; ?>/separator.gif" align="middle"/>
<img style="cursor:hand;" src="<?php echo $url_wysiwyg; ?>/picture.gif" align="middle" alt="Insert Picture" onClick="var strURL = window.prompt('Enter URL s Picture','');if (strURL!=null) {doFormat('InsertImage',strURL);}" />
<img style="cursor:hand;" src="<?php echo $url_wysiwyg; ?>/hr.gif" align="middle" alt="HR" onClick="doFormat('InsertHorizontalRule')" />
<img style="cursor:hand;" src="<?php echo $url_wysiwyg; ?>/link.gif" align="middle" border="0" alt="Link to external site" onClick="doFormat('createlink')" />

<!--- BUG 55: cannot use table icon, remove this
<img style="cursor:hand;" src="<?php echo $url_wysiwyg; ?>/table.gif" align="middle" border="0" alt="Link to external site" onClick="addTable()" />
--->

<img style="cursor:hand;" src="<?php echo $url_wysiwyg; ?>/word.gif" align="middle" border="0" alt="Remove MS Word Formatting" onClick="word_<?php echo $textareaname;?>_OnClick()" />
&nbsp;
</td>
<td nowrap="nowrap" class = 'bartop' align="middle";>
<img src="<?php echo $url_wysiwyg; ?>/start.gif" align="middle"/>
<img style="cursor:hand;" src="<?php echo $url_wysiwyg; ?>/strikethrough.gif" align="middle" alt="Strike through" onClick="doFormat('StrikeThrough')" />
<img style="cursor:hand;" src="<?php echo $url_wysiwyg; ?>/subscript.gif" align="middle" alt="SubScript" onClick="doFormat('SubScript')" />
<img style="cursor:hand;" src="<?php echo $url_wysiwyg; ?>/superscript.gif" align="middle" alt="SuperScript" onClick="doFormat('SuperScript')" />
<img src="<?php echo $url_wysiwyg; ?>/separator.gif" align="middle"/>
<img style="cursor:hand;" src="<?php echo $url_wysiwyg; ?>/ed_remove.gif" align="middle" border="0" alt="Remove Format" 	onClick="doFormat('RemoveFormat')"   />
<img style="cursor:hand;" src="<?php echo $url_wysiwyg; ?>/selectall.gif" align="middle" border="0" alt="Select All" 	onClick="dounredo('SelectAll')" />
<img style="cursor:hand;" src="<?php echo $url_wysiwyg; ?>/selectnone.gif" align="middle" border="0" alt="Select None" 	onClick="dounredo('Unselect')" />

<img src="<?php echo $url_wysiwyg; ?>/separator.gif" align="middle"/ &nbsp;>

&nbsp;
</td>
<td class = 'bartop'>
<img src="<?php echo $url_wysiwyg; ?>/start.gif" align="middle"/>
<img style="cursor:hand;" src="<?php echo $url_wysiwyg; ?>/help.gif" align="middle" alt="Help" onClick="Help_OnClick();">
&nbsp;
</td>
</tr>
</table>

<table border="0" cellspacing="0" cellpadding="0">
<tr>
<td class = 'bartop'>
<img src="<?php echo $url_wysiwyg; ?>/start.gif" align="middle"/>
<select id="selHeading<?php echo $textareaname;?>" onChange="if (document.all.font<?php echo $textareaname;?>.value !='None') {doFormat('formatblock', document.all.selHeading<?php echo $textareaname;?>.value);document.all.selHeading<?php echo $textareaname;?>.selectedIndex = 0;}" align="middle"; style="font: 8pt verdana;">
<option value="">-- Heading --</option> 
<option value="address">address</option>
<option value="pre">Formatted</option>
<option value="Subtitle">Sub Title</option>
<option value="Heading 1">Heading 1</option> 
<option value="Heading 2">Heading 2</option> 
<option value="Heading 3">Heading 3</option> 
<option value="Heading 4">Heading 4</option> 
<option value="Heading 5">Heading 5</option> 
<option value="Heading 6">Heading 6</option> 

</select>
<select id="font<?php echo $textareaname;?>" onChange="if (document.all.font<?php echo $textareaname;?>.value !=1) {doFormat('FontName',document.all.font<?php echo $textareaname;?>.value);document.all.font<?php echo $textareaname;?>.selectedIndex = 0;}" align="middle"; style="font: 8pt verdana;">
<option value="" selected="selected">Select Font...</option>
<option value="Arial">Arial</option>
<option value="Arial Black">Arial Black</option>
<option value="Arial Narrow">Arial Narrow</option>
<option value="Book Antiqua">Book Antiqua</option>
<option value="Bookman Old Style">Bookman Old Style</option>
<option value="Century Gothic">Century Gothic</option>
<option value="Courier">Courier</option>
<option value="Comic Sans MS">Comic Sans MS</option>
<option value="Courier New">Courier New</option>
<option value="Default">Default</option>
<option value="Fixedsys">Fixedsys</option>
<option value="Garamond">Garamond</option>
<option value="Impact">Impact</option>
<option value="Lucida Console">Lucida Console</option>
<option value="Modern">Modern</option>
<option value="monospace">Monospace</option>
<option value="MS Sans Serif">MS Sans Serif</option>
<option value="MS Serif">MS Serif</option>
<option value="sans-serif">Sans-serif</option>
<option value="serif">Serif</option>
<option value="System">System</option>
<option value="Tahoma">Tahoma</option>
<option value="Terminal">Terminal</option>
<option value="Times New Roman">Times New Roman</option>
<option value="Trebuchet MS">Trebuchet MS</option>
<option value="Verdana">Verdana</option>
<option value="Webdings">Webdings</option>
</select>
<select id="size<?php echo $textareaname;?>" onChange="if (document.all.font<?php echo $textareaname;?>.value !='None') {doFormat('FontSize',document.all.size<?php echo $textareaname;?>.value);document.all.size<?php echo $textareaname;?>.selectedIndex = 0;}" align="middle"; style="font: 8pt verdana;">
<option value="None" selected="selected">Size</option>
<option value=1>1</option>
<option value=2>2</option>
<option value=3>3</option>
<option value=4>4</option>
<option value=5>5</option>
<option value=6>6</option>
<option value=7>7</option>
</select>
</td>
<td class = 'bartop'>
<img src="<?php echo $url_wysiwyg; ?>/start.gif" align="middle"/>
<img style="cursor:hand;" src="<?php echo $url_wysiwyg; ?>/bold.gif" align="middle" border="0"  alt="Bold text" onClick="doFormat('Bold')" />
<img style="cursor:hand;" src="<?php echo $url_wysiwyg; ?>/italics.gif" align="middle" border="0"  alt="Italic text" onClick="doFormat('Italic')" />
<img style="cursor:hand;" src="<?php echo $url_wysiwyg; ?>/underline.gif" align="middle" border="0"  alt="Underline text" onClick="doFormat('Underline')" />
<img src="<?php echo $url_wysiwyg; ?>/separator.gif" align="middle"/>
<img style="cursor:hand;" src="<?php echo $url_wysiwyg; ?>/aleft.gif" align="middle" alt="Align Left"  onClick="doFormat('JustifyLeft')" />
<img style="cursor:hand;" src="<?php echo $url_wysiwyg; ?>/acenter.gif" align="middle" alt="Align Center"  onClick="doFormat('JustifyCenter')" />
<img style="cursor:hand;" src="<?php echo $url_wysiwyg; ?>/aright.gif" align="middle" alt="Align Right"  onClick="doFormat('JustifyRight')" />
<img style="cursor:hand;" src="<?php echo $url_wysiwyg; ?>/afull.gif" align="middle" alt="Align Full"   onClick="doFormat('JustifyFull')" />
<img style="cursor:hand;" src="<?php echo $url_wysiwyg; ?>/anone.gif" align="middle" border="0" alt="Justify None" onClick="doFormat('JustifyNone')"   />
<img src="<?php echo $url_wysiwyg; ?>/separator.gif" align="middle"/>
<img style="cursor:hand;" src="<?php echo $url_wysiwyg; ?>/para_num.gif" align="middle" border="0" alt="Numbered List" onClick="doFormat('InsertOrderedList');" />
<img style="cursor:hand;" src="<?php echo $url_wysiwyg; ?>/para_bul.gif" align="middle" border="0" alt="Bullet List" onClick="doFormat('InsertUnorderedList');" />
<img src="<?php echo $url_wysiwyg; ?>/separator.gif" align="middle"/>
<img style="cursor:hand;" src="<?php echo $url_wysiwyg; ?>/indent.gif" align="middle" alt="Indent" onClick="doFormat('Indent')" />
<img style="cursor:hand;" src="<?php echo $url_wysiwyg; ?>/outdent.gif" align="middle" alt="Outdent" onClick="doFormat('Outdent')" />
<img src="<?php echo $url_wysiwyg; ?>/separator.gif" align="middle"/>
</td>
</tr>
</table>
</td></tr></table>
</td></tr><tr valign="top" align="left">
<td valign="top">
<table width="100%" border="0" height="100%"><tr valign="top">
<td width="100%" height="100%" valign="top">
<table width="100%" border="0" cellspacing="0" cellpadding="0" height="100%"><tr valign="top">
<td bgcolor="#FFFFFF">
<iframe name="<?php echo $myEditor;?>" id="<?php echo $myEditor;?>" src="<?php echo $url_dirname; ?>/include/pdedit.php?textareaname=<?php echo $textareaname;?>" onfocus="initToolBar(this,'<?php echo $myEditor;?>');" onblur="copyValue_<?php echo $textareaname;?>();" width="100%" height="600"></iframe></td>
</tr>
<td>
<tr height=15>
	<td height=15>
<table width="100%" border="0" cellspacing="0" cellpadding="0" height=15>     
  <tr>     
    <td align="left"><input type="button" id="btnSwapView<?php echo $textareaname;?>" value="<?php echo _AM_VIEWHTML; ?>" onClick="SwapView<?php echo $textareaname;?>_OnClick();" style="width:100px; font: 8pt verdana; ">
    </td>    
    <td align="middle"><IMG src="<?php echo $url_wysiwyg; ?>/ScrollL.gif" border=0 width="24" height="15"></td>    
    <td align="middle" width="100%" style="FILTER: Alpha(opacity=50); BACKGROUND-COLOR: white" 
         ></td>    
    <td align="right"><IMG src="<?php echo $url_wysiwyg; ?>/ScrollR.gif" border=0 width="19" height="15"></td>    
  </tr>    
  </table>    
</td>
</table>
</td><td width="9%" align="center">
<table  bgcolor="#000000" width="74" id="cpick<?php echo $textareaname;?>" border="1" cellspacing="0" cellpadding="0" align="center"><tr>
<td>&nbsp;</td>
</tr></table>
<input class="input" type="text" id="colourp<?php echo $textareaname;?>" size="8" value="#000000" style="width:74px; font: 8pt verdana" readonly>
<table border="1" bgcolor="#CCCCCC" cellpadding="0" cellspacing="0" width="74"><tr>
<td bgcolor="#ffffff" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#ffffff')" /></td>
<td bgcolor="#ffffcc" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#ffffcc')" /></td>
<td bgcolor="#ffff99" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#ffff99')" /></td>
<td bgcolor="#ffff66" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#ffff66')" /></td>
<td bgcolor="#ffff33" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#ffff33')" /></td>
<td bgcolor="#ffff00" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#ffff00')" /></td>
</tr><tr>
<td bgcolor="#ccffff" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#ccffff')" /></td>
<td bgcolor="#ccffcc" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#ccffcc')" /></td>
<td bgcolor="#ccff99" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#ccff99')" /></td>
<td bgcolor="#ccff66" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#ccff66')" /></td>
<td bgcolor="#ccff33" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#ccff33')" /></td>
<td bgcolor="#ccff00" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#ccff00')" /></td>
</tr><tr>
<td bgcolor="#99ffff" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#99ffff')" /></td>
<td bgcolor="#99ffcc" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#99ffcc')" /></td>
<td bgcolor="#99ff99" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#99ff99')" /></td>
<td bgcolor="#99ff66" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#99ff66')" /></td>
<td bgcolor="#99ff33" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#99ff33')" /></td>
<td bgcolor="#99ff00" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#99ff00')" /></td>
</tr><tr>
<td bgcolor="#00ffff" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#00ffff')" /></td>
<td bgcolor="#00ffcc" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#00ffcc')" /></td>
<td bgcolor="#00ff99" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#00ff99')" /></td>
<td bgcolor="#00ff66" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#00ff66')" /></td>
<td bgcolor="#00ff33" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#00ff33')" /></td>
<td bgcolor="#00ff00" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#00ff00')" /></td>
</tr><tr>
<td bgcolor="#ffccff" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#ffccff')" /></td>
<td bgcolor="#ffcccc" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#ffcccc')" /></td>
<td bgcolor="#ffcc99" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#ffcc99')" /></td>
<td bgcolor="#ffcc66" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#ffcc66')" /></td>
<td bgcolor="#ffcc33" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#ffcc33')" /></td>
<td bgcolor="#ffcc00" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#ffcc00')" /></td>
</tr><tr>
<td bgcolor="#ccccff" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#ccccff')" /></td>
<td bgcolor="#cccccc" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#cccccc')" /></td>
<td bgcolor="#cccc99" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#cccc99')" /></td>
<td bgcolor="#cccc66" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#cccc66')" /></td>
<td bgcolor="#cccc33" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#cccc33')" /></td>
<td bgcolor="#cccc00" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#cccc00')" /></td>
</tr><tr>
<td bgcolor="#00ccff" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#00ccff')" /></td>
<td bgcolor="#00cccc" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#00cccc')" /></td>
<td bgcolor="#00cc99" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#00cc99')" /></td>
<td bgcolor="#00cc66" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#00cc66')" /></td>
<td bgcolor="#00cc33" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#00cc33')" /></td>
<td bgcolor="#00cc00" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#00cc00')" /></td>
</tr><tr>
<td bgcolor="#ff99ff" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#ff99ff')" /></td>
<td bgcolor="#ff99cc" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#ff99cc')" /></td>
<td bgcolor="#ff9999" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#ff9999')" /></td>
<td bgcolor="#ff9966" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#ff9966')" /></td>
<td bgcolor="#ff9933" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#ff9933')" /></td>
<td bgcolor="#ff9900" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#ff9900')" /></td>
</tr><tr>
<td bgcolor="#cc99ff" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#cc99ff')" /></td>
<td bgcolor="#cc99cc" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#cc99cc')" /></td>
<td bgcolor="#cc9999" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#cc9999')" /></td>
<td bgcolor="#cc9966" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#cc9966')" /></td>
<td bgcolor="#cc9933" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#cc9933')" /></td>
<td bgcolor="#cc9900" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#cc9900')" /></td>
</tr><tr>
<td bgcolor="#9999ff" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#9999ff')" /></td>
<td bgcolor="#9999cc" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#9999cc')" /></td>
<td bgcolor="#999999" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#999999')" /></td>
<td bgcolor="#999966" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#999966')" /></td>
<td bgcolor="#999933" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#999933')" /></td>
<td bgcolor="#999900" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#999900')" /></td>
</tr><tr>
<td bgcolor="#6699ff" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#6699ff')" /></td>
<td bgcolor="#6699cc" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#6699cc')" /></td>
<td bgcolor="#669999" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#669999')" /></td>
<td bgcolor="#669966" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#669966')" /></td>
<td bgcolor="#669933" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#669933')" /></td>
<td bgcolor="#669900" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#669900')" /></td>
</tr><tr>
<td bgcolor="#3399ff" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#3399ff')" /></td>
<td bgcolor="#3399cc" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#3399cc')" /></td>
<td bgcolor="#339999" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#339999')" /></td>
<td bgcolor="#339966" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#339966')" /></td>
<td bgcolor="#339933" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#339933')" /></td>
<td bgcolor="#339900" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#339900')" /></td>
</tr><tr>
<td bgcolor="#0099ff" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#0099ff')" /></td>
<td bgcolor="#0099cc" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#0099cc')" /></td>
<td bgcolor="#009999" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#009999')" /></td>
<td bgcolor="#009966" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#009966')" /></td>
<td bgcolor="#009933" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#009933')" /></td>
<td bgcolor="#009900" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#009900')" /></td>
</tr><tr>
<td bgcolor="#ff66ff" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#ff66ff')" /></td>
<td bgcolor="#ff66cc" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#ff66cc')" /></td>
<td bgcolor="#ff6699" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#ff6699')" /></td>
<td bgcolor="#ff6666" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#ff6666')" /></td>
<td bgcolor="#ff6633" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#ff6633')" /></td>
<td bgcolor="#ff6600" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#ff6600')" /></td>
</tr><tr>
<td bgcolor="#cc66ff" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#cc66ff')" /></td>
<td bgcolor="#cc66cc" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#cc66cc')" /></td>
<td bgcolor="#cc6699" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#cc6699')" /></td>
<td bgcolor="#cc6666" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#cc6666')" /></td>
<td bgcolor="#cc6633" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#cc6633')" /></td>
<td bgcolor="#cc6600" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#cc6600')" /></td>
</tr><tr>
<td bgcolor="#9966ff" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#9966ff')" /></td>
<td bgcolor="#9966cc" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#9966cc')" /></td>
<td bgcolor="#996699" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#996699')" /></td>
<td bgcolor="#996666" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#996666')" /></td>
<td bgcolor="#996633" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#996633')" /></td>
<td bgcolor="#996600" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#996600')" /></td>
</tr><tr>
<td bgcolor="#6666ff" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#6666ff')" /></td>
<td bgcolor="#6666cc" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#6666cc')" /></td>
<td bgcolor="#666699" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#666699')" /></td>
<td bgcolor="#666666" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#666666')" /></td>
<td bgcolor="#666633" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#666633')" /></td>
<td bgcolor="#666600" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#666600')" /></td>
</tr><tr>
<td bgcolor="#3366ff" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#3366ff')" /></td>
<td bgcolor="#3366cc" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#3366cc')" /></td>
<td bgcolor="#336699" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#336699')" /></td>
<td bgcolor="#336666" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#336666')" /></td>
<td bgcolor="#336633" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#336633')" /></td>
<td bgcolor="#336600" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#336600')" /></td>
</tr><tr>
<td bgcolor="#0066ff" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#0066ff')" /></td>
<td bgcolor="#0066cc" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#0066cc')" /></td>
<td bgcolor="#006699" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#006699')" /></td>
<td bgcolor="#006666" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#006666')" /></td>
<td bgcolor="#006633" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#006633')" /></td>
<td bgcolor="#006600" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#006600')" /></td>
</tr><tr>
<td bgcolor="#ff33ff" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#ff33ff')" /></td>
<td bgcolor="#ff33cc" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#ff33cc')" /></td>
<td bgcolor="#ff3399" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#ff3399')" /></td>
<td bgcolor="#ff3366" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#ff3366')" /></td>
<td bgcolor="#ff3333" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#ff3333')" /></td>
<td bgcolor="#ff3300" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#ff3300')" /></td>
</tr><tr>
<td bgcolor="#cc33ff" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#cc33ff')" /></td>
<td bgcolor="#cc33cc" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#cc33cc')" /></td>
<td bgcolor="#cc3399" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#cc3399')" /></td>
<td bgcolor="#cc3366" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#cc3366')" /></td>
<td bgcolor="#cc3333" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#cc3333')" /></td>
<td bgcolor="#cc3300" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#cc3300')" /></td>
</tr><tr>
<td bgcolor="#9933ff" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#9933ff')" /></td>
<td bgcolor="#9933cc" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#9933cc')" /></td>
<td bgcolor="#993399" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#993399')" /></td>
<td bgcolor="#993366" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#993366')" /></td>
<td bgcolor="#993333" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#993333')" /></td>
<td bgcolor="#993300" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#993300')" /></td>
</tr><tr>
<td bgcolor="#6633ff" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#6633ff')" /></td>
<td bgcolor="#6633cc" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#6633cc')" /></td>
<td bgcolor="#663399" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#663399')" /></td>
<td bgcolor="#663366" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#663366')" /></td>
<td bgcolor="#663333" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#663333')" /></td>
<td bgcolor="#663300" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#663300')" /></td>
</tr><tr>
<td bgcolor="#3333ff" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#3333ff')" /></td>
<td bgcolor="#3333cc" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#3333cc')" /></td>
<td bgcolor="#333399" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#333399')" /></td>
<td bgcolor="#333366" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#333366')" /></td>
<td bgcolor="#333333" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#333333')" /></td>
<td bgcolor="#333300" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#333300')" /></td>
</tr><tr>
<td bgcolor="#0033ff" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#0033ff')" /></td>
<td bgcolor="#0033cc" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#0033cc')" /></td>
<td bgcolor="#003399" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#003399')" /></td>
<td bgcolor="#003366" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#003366')" /></td>
<td bgcolor="#003333" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#003333')" /></td>
<td bgcolor="#003300" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#003300')" /></td>
</tr><tr>
<td bgcolor="#ff00ff" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#ff00ff')" /></td>
<td bgcolor="#ff00cc" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#ff00cc')" /></td>
<td bgcolor="#ff0099" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#ff0099')" /></td>
<td bgcolor="#ff0066" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#ff0066')" /></td>
<td bgcolor="#ff0033" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#ff0033')" /></td>
<td bgcolor="#ff0000" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#ff0000')" /></td>
</tr><tr>
<td bgcolor="#cc00ff" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#cc00ff')" /></td>
<td bgcolor="#cc00cc" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#cc00cc')" /></td>
<td bgcolor="#cc0099" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#cc0099')" /></td>
<td bgcolor="#cc0066" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#cc0066')" /></td>
<td bgcolor="#cc0033" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#cc0033')" /></td>
<td bgcolor="#cc0000" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#cc0000')" /></td>
</tr><tr>
<td bgcolor="#9900ff" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#9900ff')" /></td>
<td bgcolor="#9900cc" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#9900cc')" /></td>
<td bgcolor="#990099" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#990099')" /></td>
<td bgcolor="#990066" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#990066')" /></td>
<td bgcolor="#990033" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#990033')" /></td>
<td bgcolor="#990000" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#990000')" /></td>
</tr><tr>
<td bgcolor="#6600ff" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#6600ff')" /></td>
<td bgcolor="#6600cc" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#6600cc')" /></td>
<td bgcolor="#660099" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#660099')" /></td>
<td bgcolor="#660066" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#660066')" /></td>
<td bgcolor="#660033" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#660033')" /></td>
<td bgcolor="#660000" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#660000')" /></td>
</tr><tr>
<td bgcolor="#3300ff" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#3300ff')" /></td>
<td bgcolor="#3300cc" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#3300cc')" /></td>
<td bgcolor="#330099" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#330099')" /></td>
<td bgcolor="#330066" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#330066')" /></td>
<td bgcolor="#330033" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#330033')" /></td>
<td bgcolor="#330000" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#330000')" /></td>
</tr><tr>
<td bgcolor="#0000ff" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#0000ff')" /></td>
<td bgcolor="#0000cc" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#0000cc')" /></td>
<td bgcolor="#000099" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#000099')" /></td>
<td bgcolor="#000066" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#000066')" /></td>
<td bgcolor="#000033" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#000033')" /></td>
<td bgcolor="#000000" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#000000')" /></td>
</tr><tr>
<td bgcolor="#000000" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#000000')" /></td>
<td bgcolor="#696969" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#696969')" /></td>
<td bgcolor="#808080" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#808080')" /></td>
<td bgcolor="#A9A9A9" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#A9A9A9')" /></td>
<td bgcolor="#C0C0C0" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#C0C0C0')" /></td>
<td bgcolor="#D3D3D3" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#D3D3D3')" /></td>
</tr><tr>
<td bgcolor="#DCDCDC" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#DCDCDC')" /></td>
<td bgcolor="#F5F5F5" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#F5F5F5')" /></td>
<td bgcolor="#FFFFFF" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#FFFFFF')" /></td>
<td bgcolor="#800000" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#800000')" /></td>
<td bgcolor="#8B0000" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#8B0000')" /></td>
<td bgcolor="#FF0000" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#FF0000')" /></td>
</tr><tr>
<td bgcolor="#FF4500" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#FF4500')" /></td>
<td bgcolor="#FF8C00" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#FF8C00')" /></td>
<td bgcolor="#FFA500" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#FFA500')" /></td>
<td bgcolor="#FFD7FF" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#FFD7FF')" /></td>
<td bgcolor="#808000" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#808000')" /></td>
<td bgcolor="#FFFF00" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#FFFF00')" /></td>
</tr><tr>
<td bgcolor="#0B86B8" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#0B86B8')" /></td>
<td bgcolor="#8B4513" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#8B4513')" /></td>
<td bgcolor="#D2691E" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#D2691E')" /></td>
<td bgcolor="#DAA520" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#DAA520')" /></td>
<td bgcolor="#B22222" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#B22222')" /></td>
<td bgcolor="#A52A2A" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#A52A2A')" /></td>
</tr><tr>
<td bgcolor="#A0522D" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#A0522D')" /></td>
<td bgcolor="#CD853F" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#CD853F')" /></td>
<td bgcolor="#FF6347" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#FF6347')" /></td>
<td bgcolor="#FF7F50" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#FF7F50')" /></td>
<td bgcolor="#CD5C5C" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#CD5C5C')" /></td>
<td bgcolor="#F4A460" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#F4A460')" /></td>
</tr><tr>
<td bgcolor="#BDB76B" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#BDB76B')" /></td>
<td bgcolor="#FA8072" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#FA8072')" /></td>
<td bgcolor="#E9967A" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#E9967A')" /></td>
<td bgcolor="#FFA07A" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#FFA07A')" /></td>
<td bgcolor="#F08080" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#F08080')" /></td>
<td bgcolor="#DEB887" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#DEB887')" /></td>
</tr><tr>
<td bgcolor="#D2B48C" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#D2B48C')" /></td>
<td bgcolor="#F0E68C" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#F0E68C')" /></td>
<td bgcolor="#BC8F8F" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#BC8F8F')" /></td>
<td bgcolor="#EEE8AA" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#EEE8AA')" /></td>
<td bgcolor="#FFDEAD" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#FFDEAD')" /></td>
<td bgcolor="#F5DEB3" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#F5DEB3')" /></td>
</tr><tr>
<td bgcolor="#FFE4B5" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#FFE4B5')" /></td>
<td bgcolor="#FFDAB9" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#FFDAB9')" /></td>
<td bgcolor="#FFE4C4" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#FFE4C4')" /></td>
<td bgcolor="#FFEBCD" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#FFEBCD')" /></td>
<td bgcolor="#FFFACD" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#FFFACD')" /></td>
<td bgcolor="#FAFAD2" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#FAFAD2')" /></td>
</tr><tr>
<td bgcolor="#FFEFD5" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#FFEFD5')" /></td>
<td bgcolor="#FAEBD7" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#FAEBD7')" /></td>
<td bgcolor="#F5F5DC" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#F5F5DC')" /></td>
<td bgcolor="#FFF8DC" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#FFF8DC')" /></td>
<td bgcolor="#FFFFE0" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#FFFFE0')" /></td>
<td bgcolor="#FFE4E1" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#FFE4E1')" /></td>
</tr><tr>
<td bgcolor="#FAF0E6" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#FAF0E6')" /></td>
<td bgcolor="#FDF5E6" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#FDF5E6')" /></td>
<td bgcolor="#FFF5EE" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#FFF5EE')" /></td>
<td bgcolor="#FFFAF0" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#FFFAF0')" /></td>
<td bgcolor="#FFFFF0" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#FFFFF0')" /></td>
<td bgcolor="#FFFAFA" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#FFFAFA')" /></td>
</tr><tr>
<td bgcolor="#7FFF00" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#7FFF00')" /></td>
<td bgcolor="#7CFC00" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#7CFC00')" /></td>
<td bgcolor="#006400" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#006400')" /></td>
<td bgcolor="#008000" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#008000')" /></td>
<td bgcolor="#00FF00" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#00FF00')" /></td>
<td bgcolor="#228B22" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#228B22')" /></td>
</tr><tr>
<td bgcolor="#6B8E23" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#6B8E23')" /></td>
<td bgcolor="#556B2F" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#556B2F')" /></td>
<td bgcolor="#ADFF2F" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#ADFF2F')" /></td>
<td bgcolor="#9ACD32" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#9ACD32')" /></td>
<td bgcolor="#32CD32" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#32CD32')" /></td>
<td bgcolor="#8FBC8F" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#8FBC8F')" /></td>
</tr><tr>
<td bgcolor="#90EE90" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#90EE90')" /></td>
<td bgcolor="#98FB98" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#98FB98')" /></td>
<td bgcolor="#F0FFF0" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#F0FFF0')" /></td>
<td bgcolor="#00FF7F" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#00FF7F')" /></td>
<td bgcolor="#00FA9A" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#00FA9A')" /></td>
<td bgcolor="#20B2AA" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#20B2AA')" /></td>
</tr><tr>
<td bgcolor="#2E8B57" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#2E8B57')" /></td>
<td bgcolor="#3CB371" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#3CB371')" /></td>
<td bgcolor="#40E0D0" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#40E0D0')" /></td>
<td bgcolor="#48D1CC" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#48D1CC')" /></td>
<td bgcolor="#66CDAA" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#66CDAA')" /></td>
<td bgcolor="#7FFFD4" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#7FFFD4')" /></td>
</tr><tr>
<td bgcolor="#F5FFFA" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#F5FFFA')" /></td>
<td bgcolor="#008080" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#008080')" /></td>
<td bgcolor="#008B8B" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#008B8B')" /></td>
<td bgcolor="#00FFFF" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#00FFFF')" /></td>
<td bgcolor="#00FFFF" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#00FFFF')" /></td>
<td bgcolor="#00CED1" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#00CED1')" /></td>
</tr><tr>
<td bgcolor="#00BFFF" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#00BFFF')" /></td>
<td bgcolor="#000080" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#000080')" /></td>
<td bgcolor="#00008B" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#00008B')" /></td>
<td bgcolor="#0000CD" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#0000CD')" /></td>
<td bgcolor="#0000FF" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#0000FF')" /></td>
<td bgcolor="#191970" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#191970')" /></td>
</tr><tr>
<td bgcolor="#1E90FF" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#1E90FF')" /></td>
<td bgcolor="#2F4F4F" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#2F4F4F')" /></td>
<td bgcolor="#4169E1" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#4169E1')" /></td>
<td bgcolor="#4682B4" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#4682B4')" /></td>
<td bgcolor="#5F9EA0" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#5F9EA0')" /></td>
<td bgcolor="#6495ED" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#6495ED')" /></td>
</tr><tr>
<td bgcolor="#708090" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#708090')" /></td>
<td bgcolor="#778899" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#778899')" /></td>
<td bgcolor="#87CEEB" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#87CEEB')" /></td>
<td bgcolor="#87CEFA" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#87CEFA')" /></td>
<td bgcolor="#ADD8E6" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#ADD8E6')" /></td>
<td bgcolor="#AFEEEE" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#AFEEEE')" /></td>
</tr><tr>
<td bgcolor="#B0C4DE" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#B0C4DE')" /></td>
<td bgcolor="#B0E0E6" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#B0E0E6')" /></td>
<td bgcolor="#E0FFFF" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#E0FFFF')" /></td>
<td bgcolor="#E6E6FA" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#E6E6FA')" /></td>
<td bgcolor="#F0FFFF" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#F0FFFF')" /></td>
<td bgcolor="#F0F8FF" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#F0F8FF')" /></td>
</tr><tr>
<td bgcolor="#F8F8FF" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#F8F8FF')" /></td>
<td bgcolor="#4B0082" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#4B0082')" /></td>
<td bgcolor="#9400D3" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#9400D3')" /></td>
<td bgcolor="#8A2BE2" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#8A2BE2')" /></td>
<td bgcolor="#9932CC" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#9932CC')" /></td>
<td bgcolor="#483D8B" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#483D8B')" /></td>
</tr><tr>
<td bgcolor="#BA55D3" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#BA55D3')" /></td>
<td bgcolor="#6A5ACD" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#6A5ACD')" /></td>
<td bgcolor="#7B68EE" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#7B68EE')" /></td>
<td bgcolor="#9370DB" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#9370DB')" /></td>
<td bgcolor="#800080" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#800080')" /></td>
<td bgcolor="#8B008B" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#8B008B')" /></td>
</tr><tr>
<td bgcolor="#FF00FF" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#FF00FF')" /></td>
<td bgcolor="#FF00FF" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#FF00FF')" /></td>
<td bgcolor="#FF1493" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#FF1493')" /></td>
<td bgcolor="#DC143C" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#DC143C')" /></td>
<td bgcolor="#C71585" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#C71585')" /></td>
<td bgcolor="#FF69B4" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#FF69B4')" /></td>
</tr><tr>
<td bgcolor="#DA70D6" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#DA70D6')" /></td>
<td bgcolor="#DB7093" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#DB7093')" /></td>
<td bgcolor="#EE82EE" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#EE82EE')" /></td>
<td bgcolor="#DDA0DD" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#DDA0DD')" /></td>
<td bgcolor="#FFB6C1" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#FFB6C1')" /></td>
<td bgcolor="#D8BFD8" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#D8BFD8')" /></td>
</tr><tr>
<td bgcolor="#FFC0CB" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#FFC0CB')" /></td>
<td bgcolor="#FFF0F5" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#FFF0F5')" /></td>
<td bgcolor="#EEEEEE" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#EEEEEE')" /></td>
<td bgcolor="#DDDDDD" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#DDDDDD')" /></td>
<td bgcolor="#CCCCCC" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#CCCCCC')" /></td>
<td bgcolor="#BBBBBB" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('#BBBBBB')" /></td>
<td bgcolor="#BBBBBB" width="12"><img style="cursor:hand;" height="8" width="10" border="0" onClick="ColorPalette<?php echo $textareaname;?>_OnClick('[pagebreak')" /></td>
</tr></table>
</td></tr></table>

</td></tr></table>
</td></tr></table></table>

<script type="text/javascript">
initToolBar("foo","<?php echo $myEditor;?>")
window.status  = "Current View: Wysiwyg"
</script>
<?php

// ----- html end -----
}

?>