<?php 
ob_start();
session_start();
if(!isset($_SESSION['idUser']) or $_SESSION['idGroup'] != 1){
	header("location: ../index.php");
}

require '../lib/dbCon.php';
require '../lib/quantri.php';
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
		<table class="table">
			<caption>quan ly loai tin</caption>
			<thead>
				<tr>
					<th>idLT</th>
					<th>Ten</th>
					<th>Ten_KhongDau</th>
					<th>ThuTu</th>
					<th>AnHien</th>
					<th>idTL</th>
					<th> <a href="themloaitin.php" class="btn btn-primary">them</a></th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$loaitin = danhsachloaitin();
				while ($rowloaitin = mysql_fetch_array($loaitin)) {
					ob_start();
					?>
					<tr>
						<td>{idLT}</td>
						<td>{Ten}</td>
						<td>{Ten_KhongDau}</td>
						<td>{ThuTu}</td>
						<td>{AnHien}</td>
						<td>{TenTL}</td>
						<td><a href="xoaLoaiTin.php?idLT={idLT}" class="btn btn-danger" 
							onclick="javascript:return confirm('Are you sure you want to delete?')">Xoa</a>
							-<a href="suaLoaiTin.php?idLT={idLT}" class="btn btn-default">Sua</a></td>
						</tr>
						<?php 
						$s = ob_get_clean();
						$s = str_replace("{idLT}", $rowloaitin['idLT'], $s);
						$s = str_replace("{Ten}", $rowloaitin['Ten'], $s);
						$s = str_replace("{Ten_KhongDau}", $rowloaitin['Ten_KhongDau'], $s);
						$s = str_replace("{ThuTu}", $rowloaitin['ThuTu'], $s);
						$s = str_replace("{AnHien}", $rowloaitin['AnHien'], $s);
						$s = str_replace("{TenTL}", $rowloaitin['TenTL'], $s);
						echo $s;
					}
					?>
				</tbody>
			</table>
		</div>

		<!-- jQuery -->
		<script src="https://code.jquery.com/jquery.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" ></script>	 		
	</body>
	</html>