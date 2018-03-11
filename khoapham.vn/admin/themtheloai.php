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

if(isset($_POST['btnthem'])){
	$TenTL = $_POST['TenTL']; 
	$TenTL_KhongDau = changeTitle($TenTL);
	$ThuTu = $_POST['ThuTu']; 
	settype($ThuTu, 'int');
	$AnHien = $_POST['AnHien']; 
	settype($AnHien , 'int');

	$qr = "INSERT INTO theloai values(null, '$TenTL', '$TenTL_KhongDau', '$ThuTu', '$anhien')";
	mysql_query($qr);
	header("location:listtheloai.php");
}
?>
<!DOCTYPE html>
<html lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Title Page</title>		
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="layout.css">
	<style type="text/css" media="screen">
		.tieude a{
			background-color: green; color: white; padding: 10px;
			font-size: 20px; font-weight: bold;

		}
	</style>
</head>  
<body>
	<div class="container">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>TRANG QUAN TRI</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="tieude"><?php require 'menu.php'; ?></td>
				</tr>
			</tbody>
		</table>
	</div> 
	<div class="container">
		<form action="" method="POST">
			<table class="table">
				<caption>Them the loai</caption>
				
				<tbody>
					<tr>
						<td>TenTl</td>
						<td><input type="text" name="TenTL" id="TenTL" value="" placeholder=""></td>
					</tr>
					<tr>
						<td>ThuTu</td>
						<td><input type="text" name="ThuTu" id="ThuTu" value="" placeholder=""></td>
					</tr>
					<tr>
						<td>AnHien</td>
						<td><input type="radio" name="AnHien" value="1" checked>Hiện<br>
							<input type="radio" name="AnHien" value="0">Ẩn<br>
						</td>
					</tr>
					<tr><td><input type="submit" name="btnthem" value="Thêm" class="btn btn-success"></td></tr>
					
				</tbody>
			</table>
		</form> 
	</div>

	<!-- jQuery -->
	<script src="https://code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" ></script>	 		
</body>
</html>