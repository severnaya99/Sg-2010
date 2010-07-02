<?
$data = file_get_contents("../../../uploads/formulaire/form.csv");
header("Content-Type:text/comma-separated-values");
header("Content-Disposition:attachment; filename=form.csv");
echo $data;
?>