<?php

echo "
<SCRIPT LANGUAGE=\"JavaScript\">
";

echo "
var tamano = 120;
var DefaultHelp = '<h3> Galeria help </h3>';

var helpLeft = 181;
var helpOnScreen = false;

"; 

echo "
function SetHelp(value)
{
	if (document.all)
	{
	var XoopsHelpLayer = eval('document.all.' + \"XoopsHelpLayer\"); 
	}else{
	var XoopsHelpLayer = document.layers[\"XoopsHelpLayer\"]; 
	}

	if (helpOnScreen == true)
	{
	if (value != null)
	XoopsHelpLayer.innerHTML = value;
	}
}
";


/*********************************************************/
/* Toggle the help popup                                 */
/*********************************************************/
echo "
function SwitchHelp()
{
	if (helpOnScreen == false)
		ShowHelp();
	else
		HideHelp();
}

";

/*********************************************************/
/* Display the help popup                                */
/*********************************************************/
echo "
function ShowHelp()
{

	if (document.all)
	{
	var XoopsHelpLayer = eval('document.all.' + \"XoopsHelpLayer\"); 
	var XoopsHelpLayer2 = eval('document.all.' + \"XoopsHelpLayer2\"); 

	}else{
	var XoopsHelpLayer = document.layers[\"XoopsHelpLayer\"]; 
	var XoopsHelpLayer2 = document.layers[\"XoopsHelpLayer2\"]; 
	}

    if (XoopsHelpLayer.style) 
		XoopsHelpLayer = XoopsHelpLayer.style;
		XoopsHelpLayer2 = XoopsHelpLayer2.style;
	
	if (document.all) { 
		XoopsHelpLayer.pixelWidth = document.body.clientWidth - helpLeft - 100;
		XoopsHelpLayer.pixelLeft = helpLeft;		
		XoopsHelpLayer.pixelHeight = tamano;
		XoopsHelpLayer.pixelTop = document.body.clientHeight + document.body.scrollTop - tamano;
		XoopsHelpLayer2.pixelWidth = 100;
		XoopsHelpLayer2.pixelLeft = helpLeft + XoopsHelpLayer.pixelWidth;		
		XoopsHelpLayer2.pixelHeight = tamano;
		XoopsHelpLayer2.pixelTop = document.body.clientHeight + document.body.scrollTop - tamano;

	} else 	{
		XoopsHelpLayer.width = document.width - helpLeft - 100;		
		XoopsHelpLayer.height = tamano;
		XoopsHelpLayer.left = helpLeft;
		XoopsHelpLayer.top = window.innerHeight + window.pageYOffset - tamano;
		XoopsHelpLayer2.width = 100;		
		XoopsHelpLayer2.height = tamano;
		XoopsHelpLayer2.left = helpLeft + XoopsHelpLayer.left;
		XoopsHelpLayer2.top = window.innerHeight + window.pageYOffset - tamano;
	}



	XoopsHelpLayer.visibility = 'visible';
//	XoopsHelpLayer2.visibility = 'visible';

	helpOnScreen = true;

	SetHelp(DefaultHelp);

}
	
";

/*********************************************************/
/* Hide the help popup                                   */
/*********************************************************/
echo "
function HideHelp()
{
	helpOnScreen = false;

	if (document.all)
	{
	var XoopsHelpLayer = eval('document.all.' + \"XoopsHelpLayer\"); 
	XoopsHelpLayer.pixelHeight = 1;
	XoopsHelpLayer.pixelTop = document.body.clientHeight + document.body.scrollTop - 1;
	XoopsHelpLayer.innerHTML = '';

	var XoopsHelpLayer2 = eval('document.all.' + \"XoopsHelpLayer2\"); 
	XoopsHelpLayer2.pixelHeight = 1;
	XoopsHelpLayer2.pixelTop = document.body.clientHeight + document.body.scrollTop - 1;
	XoopsHelpLayer2.innerHTML = '';

	}else{
	var XoopsHelpLayer = document.layers[\"XoopsHelpLayer\"]; 
	XoopsHelpLayer.height = 1;
	XoopsHelpLayer.top = window.innerHeight + window.pageYOffset - 1;
	XoopsHelpLayer.innerHTML = '';
	XoopsHelpLayer2.height = 1;
	XoopsHelpLayer2.top = window.innerHeight + window.pageYOffset - 1;
	XoopsHelpLayer2.innerHTML = '';
	
	}
		if (XoopsHelpLayer.style) XoopsHelpLayer = XoopsHelpLayer.style;
	XoopsHelpLayer.visibility = 'hidden';
		if (XoopsHelpLayer2.style) XoopsHelpLayer2 = XoopsHelpLayer2.style;

	XoopsHelpLayer2.visibility = 'hidden';
}
";

echo "

function verScroll(up) {
loop = true;
direction=0;
if (up==1)
direction=1;
if (up==2)
direction=2;
if (up==3)
direction=3;
if (up==4)
direction=4;


speed = 10;
scrolltimer = null;




if (document.layers) {
var page = eval(document.XoopsHelpLayer);
}
else {
if (document.getElementById) {
var page= eval(\"document.getElementById('XoopsHelpLayer').style\");
}
else {
if (document.all) {
var page = eval(document.all.XoopsHelpLayer.style);
      }
   }
}
speed = parseInt(1);
var y_pos = parseInt(page.top);
var x_pos = parseInt(page.left);

if (loop == true) {

if (direction == 1 ) {
page.top = (y_pos + (speed));
}

if (direction == 2 ) {
page.top = (y_pos - (speed));
}
if (direction == 3) {
page.left = (x_pos - (speed));
}
if (direction == 4) {
page.left = (x_pos + (speed));
}

 

scrolltimer = setTimeout(\"verScroll(direction,speed)\", 1);
   }
}

function stopScroll() {
loop = false;
clearTimeout(scrolltimer);
}
";



echo "



</script>


<div id=\"XoopsHelpLayer\" style=\"position:absolute; width:250px; background-color:lightyellow; border:1px solid black;
 padding:5px; height:182px; z-index:1; left: 405px; top: 32px; cursor:hand;  visibility: hidden\">
//; overflow: scroll
<h3>Galeria help</h3>
</div>

<div id=\"XoopsHelpLayer2\" style=\"position:absolute; width:303px; background-color: FFFFFF; height:182px; z-index:1; left: 405px; top: 32px;  visibility: hidden\">
<a href=\# onMouseOver=verScroll(2) onMouseOut=stopScroll()>arriba</a>
<br><a href=\# onMouseOver=verScroll(1) onMouseOut=stopScroll()>abajo</a>
<br><a href=\# onMouseOver=verScroll(3) onMouseOut=stopScroll()>izquierda</a>
<br><a href=\# onMouseOver=verScroll(4) onMouseOut=stopScroll()>derecha</a></div>

<script>
var once_per_browser=0

///No need to edit beyond here///

var ns4=document.layers
var ie4=document.all
var ns6=document.getElementById&&!document.all

if (ns4)
crossobj=document.layers.XoopsHelpLayer
else if (ie4||ns6)
crossobj=ns6? document.getElementById(\"XoopsHelpLayer\") : document.all.XoopsHelpLayer






function drag_drop(e){
if (ie4&&dragapproved){
crossobj.style.left=tempx+event.clientX-offsetx
crossobj.style.top=tempy+event.clientY-offsety
return false
}
else if (ns6&&dragapproved){
crossobj.style.left=tempx+e.clientX-offsetx
crossobj.style.top=tempy+e.clientY-offsety
return false
}
}

function initializedrag(e){
if (ie4&&event.srcElement.id==\"XoopsHelpLayer\"||ns6&&e.target.id==\"XoopsHelpLayer\"){
offsetx=ie4? event.clientX : e.clientX
offsety=ie4? event.clientY : e.clientY

tempx=parseInt(crossobj.style.left)
tempy=parseInt(crossobj.style.top)

dragapproved=true
document.onmousemove=drag_drop
}
}
document.onmousedown=initializedrag
document.onmouseup=new Function(\"dragapproved=false\")



</script>
";





?>
