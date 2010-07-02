/**
 * MpManager 271 js
 */

function MultiSelector( list_target, max ){

	// Where to write the list
	this.list_target = list_target;
	// How many elements?
	this.count = 0;
	// How many elements?
	this.id = 0;
	// Is there a maximum?
	if( max ){
		this.max = max;
	} else {
		this.max = -1;
	};
	
	/**
	 * Add a new file input element
	 */
	this.addElement = function( element ){

		// Make sure it's a file input element
		if( element.tagName == 'INPUT' && element.type == 'file' ){

			// Element name -- what number am I?
			element.name = 'file_' + this.id++;
			
			element.id = 'fileup';

			// Add reference to this object
			element.multi_selector = this;

			// What to do when a file is selected
			element.onchange = function(){

				// New file input
				var new_element = document.createElement( 'input' );
				new_element.type = 'file';

				// Add new element
				this.parentNode.insertBefore( new_element, this );

				// Apply 'update' to element
				this.multi_selector.addElement( new_element );

				// Update list
				this.multi_selector.addListRow( this );

				// Hide this: we can't use display:none because Safari doesn't like it
				this.style.position = 'absolute';
				this.style.left = '-1000px';

			};
			// If we've reached maximum number, disable input element
			if( this.max != -1 && this.count >= this.max ){
				element.disabled = true;
			};

			// File element counter
			this.count++;
			// Most recent element
			this.current_element = element;
			
		} else {
			// This can only be applied to file input elements!
			alert( 'Error: not a file input element' );
		};

	};

	/**
	 * Add a new row to the list of files
	 */
	this.addListRow = function( element ){

		// Row div
		var new_row = document.createElement( 'div' );

		// Delete button
		var new_row_button = document.createElement( 'input' );
		new_row_button.type = 'button';
		new_row_button.value = 'Delete';

		// References
		new_row.element = element;

		// Delete function
		new_row_button.onclick= function(){

			// Remove element from form
			this.parentNode.element.parentNode.removeChild( this.parentNode.element );

			// Remove this row from the list
			this.parentNode.parentNode.removeChild( this.parentNode );

			// Decrement counter
			this.parentNode.element.multi_selector.count--;

			// Re-enable input element (if it's disabled)
			this.parentNode.element.multi_selector.current_element.disabled = false;

			// Appease Safari
			//    without it Safari wants to reload the browser window
			//    which nixes your already queued uploads
			return false;
		};

		// Set row value
		new_row.innerHTML = element.value;

		// Add button
		new_row.appendChild( new_row_button );

		// Add it to the list
		this.list_target.appendChild( new_row );
		
	};

};

//fonction auto selection user

	function lookup(inputString) {
var $j = jQuery.noConflict();

		if(inputString.length == 0) {
			// Hide the suggestion box.
			$j('#suggestions').hide();
		} else {
	$j.post("include/rpu.php", {queryString: ""+inputString+""}, 
                             
function(data){
				if(data.length >0) {
					$j('#suggestions').show();
					$j('#autoSuggestionsList').html(data);
				}
			});
		}
	} // lookup

	
	function fill(thisValue, Value, senduser) {
var $j = jQuery.noConflict();
if(document.forms["read"].elements["to_userid"]) {
var selection = document.forms["read"].elements["to_userid"];
} else {
var selection = document.forms["read"].elements["to_userid[]"];
}


 if (selection.options.length+1 <= senduser )
	{
       var optn = document.createElement("OPTION");
	optn.text = thisValue;
	optn.value = Value;
        selection.options.add(optn);
        selection.value = Value;
         }
        $j('#inputString').val(thisValue);            
	$j('#suggestions').hide();
        //setTimeout("$('#suggestions').hide();", 200);
	}

	function closefillv(start) {   
	var $j = jQuery.noConflict();
	$j('#suggestions'+start+'').hide('fast');
       // setTimeout("$('#suggestions"+start+"').hide('fast');", 200);
	}
	function closefill() {  
	var $j = jQuery.noConflict();
	$j('#suggestions').hide();
      // setTimeout("$('#suggestions').hide();", 200);

	}

//fonction auto selection contact

	function lookupC(start) {
	var $j = jQuery.noConflict();
	//$.post("include/rpc.php", {}, 
        $j.post("include/rpc.php", {start: ""+start+""}, 
                             
function(data){
				if(data.length >0) {
					$j('#suggestions').show();
					$j('#autoSuggestionsList').html(data);
				}
			});
		
	} // lookup

	function lookupM(start) {
	var $j = jQuery.noConflict();
        $j.post("include/rpv.php", {start: ""+start+""}, 
                             
function(data){
				if(data.length >0) {
					$j('#suggestions'+start+'').show('slow');
					$j('#autoSuggestionsList'+start+'').html(data);
				}
			});
		
	} // lookup

function delfill()
  { 
if(document.forms["read"].elements["to_userid"]) {
var selection = document.forms["read"].elements["to_userid"];
} else {
var selection = document.forms["read"].elements["to_userid[]"];
}

    while( selection.selectedIndex != -1)
    { selection[ selection.selectedIndex]=null;
  }
}

function delallfill()
{

if(document.forms["read"].elements["to_userid"]) {
var selection = document.forms["read"].elements["to_userid"];
} else {
var selection = document.forms["read"].elements["to_userid[]"];
}
	var i;
	for(i=selection.options.length-1;i>=0;i--)
	{
		//selectbox.options.remove(i);
		selection.remove(i);
	}
}

function selectfill(senduser)
{
if(document.forms["read"].elements["to_userid"]) {
var selection = document.forms["read"].elements["to_userid"];
} else {
var selection = document.forms["read"].elements["to_userid[]"];
}

     for(i=0;i<selection.length;i++){
     selection.options[i].selected = true;
 } 

}
//remplace les checkbox
//global variables that can be used by ALL the function son this page.
var inputs;
var imgFalse = 'images/lus.png';
var imgTrue = 'images/checkmail.png';
var imgNew = 'images/new.png';
var imgReply = 'images/reply.png';
var imgCont = 'images/view_contact.png';
var imgFile = 'images/file.png';

//this function runs when the page is loaded, put all your other onload stuff in here too.
function init() {
    replaceChecks1();
}

function replaceChecks1() {

    //get all the input fields on the page
   inputs1 = document.prvmsg.getElementsByTagName('input');
    //cycle trough the input field
  for(var i=0; i < inputs1.length; i++) {
        //check if the input is a checkbox
       //create a new imag
if (inputs1[i].type=="checkbox"){
      var img = document.createElement('img');
        //check if the checkbox is checked
         if(inputs1[i].checked) {
if (inputs1[i].className) {
              img.src = imgTrue;
}  else { return false; }

            } else {
if (inputs1[i].className == "3") {
  img.src = imgNew;
     } 
else if (inputs1[i].className == "2") {
            img.src = imgReply;
     }
else if (inputs1[i].className == "1") {
   img.src = imgFalse;
}
else if (inputs1[i].className == "4") {
   img.src = imgCont;
}
else { return false; }
}
            //set image ID and onclick action
            img.id = 'checkImage1'+i;
            //set image
            img.onclick = new Function('checkChange1('+i+');ChangeStatut(this)');
            //place image in front of the checkbox
            inputs1[i].parentNode.insertBefore(img, inputs1[i]);
            //hide the checkbox
           inputs1[i].style.display='none';
        }
}
}

//change the checkbox status and the replacement image
function checkChange1(i) {
   
if(inputs1[i].checked) {
        inputs1[i].checked = '';
if (inputs1[i].className == "3") {
        document.getElementById('checkImage1'+i).src=imgNew;
}
if (inputs1[i].className == "2") {
        document.getElementById('checkImage1'+i).src=imgReply;
}
if (inputs1[i].className == "1") {
        document.getElementById('checkImage1'+i).src=imgFalse;
}
if (inputs1[i].className == "4") {
        document.getElementById('checkImage1'+i).src=imgCont;
}
    } else {

        inputs1[i].checked = 'checked';
        document.getElementById('checkImage1'+i).src=imgTrue;

    }

}

window.onload = init;