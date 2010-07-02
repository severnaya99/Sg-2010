<?php


function Get_Image_listPro($dir) { 

if(!$dir) { 
  $dir = "."; 
} 

$handle = opendir($dir); 
//while (false !== ($file = readdir($handle))) { 

$file_array = array(); 
$dir_handle = opendir($dir); 
$a = 0; 
while($file = readdir($dir_handle)) { 
	if((preg_match('/jpg/i',$file)) || // can add more here 
	   (preg_match('/png/i',$file)) || // or take some away 
	   (preg_match('/gif/i',$file)) || 
	   (preg_match('/jpeg/i',$file)))  { 
	   $file_array[$a] = $file; 
	   $a++; 
	} 
} 
return $file_array; 
} 


function Get_Image_listdir($dir) { 
/*
if(!$dir) { 
  $dir = "."; 
} 
*/
$file_array = array(); 
$contador= 0;

$handle = opendir($dir); 
while (false !== ($file = readdir($handle))) { 
    if ($file != "." && $file != "..") { 
		if((is_dir($dir . $file . "/")) )  { 
		   $file_array[$contador] = $file; 
		   $a++; 
		   $contador = $contador+1;
		} 
	}
}



return $file_array; 
} 





function Get_Image_listProPhp($dir) { 
if(!$dir) { 
  $dir = "."; 
} 
$file_array = array(); 
$dir_handle = opendir($dir); 
$a = 0; 
while($file = readdir($dir_handle)) { 
	if((preg_match('/php/',$file)) )  { 
	   $file_array[$a] = $file; 
	   $a++; 
	} 
} 
return $file_array; 
} 



?>