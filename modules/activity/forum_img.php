<?php

include 'include/phpgraphlib.php';
include 'forum_data.php';
global $dato;
global $num_rows;
$i=0;
$graph=new PHPGraphLib(900,500);

$data=array();
for($i=0;$i<$num_rows;$i++){
    $data[$dato["uname"][$i]]=$dato["num_post"][$i];
}
$graph->addData($data);
$graph->setTitle("Numero post nel forum negli ultimi 30 giorni");
$graph->setTextColor("red");
$graph->setGradient("green", "yellow");
$graph->createGraph();

?>
