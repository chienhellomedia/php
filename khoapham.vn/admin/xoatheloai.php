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
$idTL = $_GET['idTL'];
settype($idT, 'int');
$qr = "DELETE FROM theloai WHERE idTL = '$idTL' ";
mysql_query($qr);
header('location: listtheloai.php');
?>
