<?
session_start();

$cid = $_SESSION['id'];
$str = $_GET['id'];
$tid = explode("/",$str);

for ($jj=1; $jj <= count($tid); $jj++) { 
 	echo $tid[$jj]."<BR>";
 } 



?>