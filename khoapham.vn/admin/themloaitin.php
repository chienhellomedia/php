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
	$Ten = $_POST['Ten'];
	$Ten_KhongDau = changeTitle($Ten);
	$ThuTu = $_POST['ThuTu'];
	settype($ThuTu, 'int');
	$AnHien = $_POST['AnHien'];
	settype($AnHien, 'int');
	$idTL = $_POST['idTL'];
	settype($idTL, 'int');
	$qr = "INSERT INTO loaitin values(null, '$Ten', '$Ten_KhongDau', '$ThuTu', '$AnHien', '$idTL')";
	mysql_query($qr);
	header('location: listloaitin.php');
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
				<caption>Them loai tin</caption>
				<tbody>
					<tr>
						<td>Ten</td>
						<td><input type="text" name="Ten" value="" placeholder=""></td>
					</tr>
					<tr>
						<td>ThuTu</td>
						<td><input type="text" name="ThuTu" value="" placeholder=""></td>
					</tr> 
					<tr>
						<td>AnHien</td>
						<td>
							<input type="radio" name="AnHien" value="1" checked placeholder="">Hien<br>
							<input type="radio" name="AnHien" value="0" placeholder="">An <br>
						</td>
					</tr>
					<tr>
						<td>idTL</td>
						<td>
							<select name="idTL" idTL="idTL">
								<?php 
								$theloai = danhsachtheloai();
								while ( $rowtheloai = mysql_fetch_array($theloai)) {
									?>
									<option value="<?php echo $rowtheloai['idTL']; ?>">
										<?php echo $rowtheloai['TenTL']; ?></option>
										<?php 
									}
									?>
								</select>
							</td>
						</tr>
						<tr>
							<td> <input type="submit" name="btnthem" value="Them" class="btn btn-primary"></td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>

		<!-- jQuery -->
		<script src="https://code.jquery.com/jquery.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" ></script>	 		
	</body>
	</html>