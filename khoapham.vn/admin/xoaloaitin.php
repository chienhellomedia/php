<?php 
ob_start();
session_start();
if(!isset($_SESSION['idUser']) or $_SESSION['idGroup'] != 1){
	header("location: ../index.php");
}


require '../lib/dbCon.php';
require '../lib/quantri.php';
?>


<?php 
$idLT = $_GET['idLT'];
settype($idLT, 'int');
$qr = "DELETE from loaitin where idLT = '$idLT'";
mysql_query($qr);
header("location: listloaitin.php");
?>