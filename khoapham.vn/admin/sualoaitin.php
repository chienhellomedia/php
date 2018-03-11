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
$row_loaitin = chitietloaitin($idLT);
?>

<?php 
if (isset($_POST['btnsua'])){
	$Ten = $_POST['Ten'];
	$Ten_KhongDau = changeTitle($Ten);
	$ThuTu = $_POST['ThuTu'];
	settype($ThuTu, 'int');
	$AnHien = $_POST['AnHien'];
	settype($AnHien, 'int');
	$idTL = $_POST['idTL'];
	settype($idTL, 'int');
	$qr ="UPDATE `loaitin` SET Ten = '$Ten', Ten_KhongDau = '$Ten_KhongDau', ThuTu = '$ThuTu', AnHien = '$AnHien', idTL = '$idTL' where idLT = '$idLT' ";
	mysql_query($qr);
	header('location: listLoaiTin.php');
	//echo $qr;
}
?>
<!DOCTYPE html>
<html lang="">
<head>
	<meta charset="utf-  8">
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
				<caption>Sua the loai</caption>
				<tbody>
					<tr>
						<td>Ten</td><td><input type="text" name="Ten" value="<?php echo $row_loaitin["Ten"]; ?>" ></td>
					</tr>
					<tr>
						<td>ThuTu</td><td><input type="text" name="ThuTu" value="<?php echo $row_loaitin["ThuTu"]; ?>" placeholder=""></td>
					</tr>
					<tr>
						<td>AnHien</td>
						<td>
							<input type="radio" name="AnHien" value="1" <?php if($row_loaitin['AnHien'] == 1) echo "checked ='checked'" ?> >Hien<br>
							<input type="radio" name="AnHien" value="0" <?php if($row_loaitin['AnHien'] == 0) echo "checked ='checked'" ?> >An <br>
						</td>
					</tr>
					<tr>
						<td>idTL</td>
						<td>
							<select name="idTL" idTL="idTL">
								<?php 
								$theloai = danhsachtheloai();
								while ($row_theloai = mysql_fetch_array($theloai)) {
									?>
									<option <?php if($row_theloai['idTL'] == $row_loaitin['idTL']) echo "selected = 'selected'"; ?> value="<?php echo $row_theloai['idTL']; ?>">
										<?php echo $row_theloai['TenTL']; ?></option>

										<?php 
									}
									?>
								</select>
							</td>
						</tr>
						<tr><td><input type="submit" name="btnsua" value="sua" class="btn btn-default"></td></tr>
					</tbody>
				</table>
			</form> 
		</div>

		<!-- jQuery -->
		<script src="https://code.jquery.com/jquery.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" ></script>	 		
	</body>
	</html>