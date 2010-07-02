<?php
// $Id: pdedit.php,v 1.3 2006/03/20 03:23:03 ohwada Exp $

// 2006-03-17 K.OHWADA
// dont use foreach($HTTP_POST_VARS as $k => $v)
// $HTTP_POST_VARS -> $_POST
// $HTTP_GET_VARS  -> $_GET

$display_font="Verdana, Helvetica";
$display_size="xx-small";

// define $textareaname
$textareaname = '';
if ( isset($_POST['textareaname'] )) 
{
	$textareaname = $_POST['textareaname'];
} 
elseif ( isset($_GET['textareaname']) ) 
{
	$textareaname = $_GET['textareaname'];
}

?>
<html>
<head>
<style type="text/css">
body {
margin: 0pt;
padding: 0pt;
border: none;
}

iframe {
width: 100%;
height: 100%;
border: 0;
}
</style>
<script type="text/javascript">
var format="HTML"

function setFont() {
textEdit.document.body.style.fontFamily = "<?php echo $display_font;?>";
textEdit.document.body.style.fontSize = "<?php echo $display_size;?>";
}

function setFocus() {
textEdit.focus();
}

function execCommand(command) {

textEdit.focus();

if (format=="HTML") {
var edit = textEdit.document.selection.createRange();

if (arguments[1]==null) {
	edit.execCommand(command);
} else {
	edit.execCommand(command,false, arguments[1]);
	edit.select();
	textEdit.focus();
}}}

function selectAllText(){
var edit = textEdit.document;
edit.execCommand('SelectAll');
textEdit.focus();
}

function newdocument() {
textEdit.document.open();
textEdit.document.write("");
textEdit.document.close();
textEdit.focus();
}

function initEditor() {
var htmlString = parent.document.all.<?php echo $textareaname;?>.value;
textEdit.document.designMode="on";
textEdit.document.open();
textEdit.document.write(htmlString);
textEdit.document.close();
setFont();
textEdit.focus();
}

function swapModes() {
if (format=="HTML") {
textEdit.document.body.innerText = textEdit.document.body.innerHTML;
format="Text";

} else {
textEdit.document.body.innerHTML = textEdit.document.body.innerText;
format="HTML";
}
var s = textEdit.document.body.createTextRange();
s.collapse(false);
s.select();
textEdit.focus();
}

window.onload = initEditor;
</script>
</head>

<body scroll="No">
<iframe id="textEdit"></iframe>
</body>
</html>
