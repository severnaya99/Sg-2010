<?php

function galeria_search($queryarray, $andor, $limit, $offset, $userid){
	global $xoopsDB;
	$sql = "SELECT d.ID, d.Carpeta, d.Descripcion, t.ID, t.Carpeta, t.Fichero, t.Title, t.EnviadoPor,  t.Bloqueado, t.Keywords, t.Fecha  FROM ".$xoopsDB->prefix("mps_galeria_carpeta")." d LEFT JOIN ".$xoopsDB->prefix("mps_galeria_imagenes")." t ON t.Carpeta=d.Carpeta"; 
	if ( is_array($queryarray) && $count = count($queryarray) ) {
		$sql .= " Where ((t.Title LIKE '%$queryarray[0]%' OR t.Keywords LIKE '%$queryarray[0]%' )";
		for($i=1;$i<$count;$i++){
			$sql .= " $andor ";
			$sql .= "(d.Descripcion LIKE '%$queryarray[$i]%' OR t.Keywords LIKE '%$queryarray[$i]%' OR t.Title LIKE '%$queryarray[$i]%')";
		}
		$sql .= ") ";
	}
	$sql .= " ORDER BY d.ID DESC";
//	echo $sql;
	$result = $xoopsDB->query($sql,$limit,$offset);
	$ret = array();
	$i = 0;
 	while($myrow = $xoopsDB->fetchArray($result)){
		$ret[$i]['image'] = "images/right.gif";
		$ret[$i]['link'] = "index.php?subcarpeta=&carpeta=".$myrow['Carpeta']. "&foto=". urlencode($myrow['Fichero']). "&inicio=0";
		if (strlen($myrow['Title']) >1 ){
				$ret[$i]['title'] = $myrow['Title'];
		}else{
				$ret[$i]['title'] = "(" . $myrow['Carpeta'] . ")" . $myrow['Fichero'];
		}
		$ret[$i]['time'] = $myrow['Fecha'];
		$ret[$i]['uid'] = $myrow['submitter'];
		$i++;
	}
return $ret;
}
       
?>