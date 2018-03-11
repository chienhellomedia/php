<?php 
ob_start();
session_start();
if(!isset($_SESSION['idUser']) or $_SESSION['idGroup'] != 1)
{
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
			<caption>Quan li the loai</caption>
			<thead>
				<tr>
					<th>Danh sach the loai</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>idTL</td>
					<td>Ten Tl</td>
					<td>Ten Tl khong dau</td>
					<td>Thu tu</td>
					<td>An hien</td>					
					<td><a href="themTheLoai.php" class="btn btn-success">Them</a></td>
				</tr>
				<?php 
				$theloai = danhsachtheloai();
				while ($rowtheloai = mysql_fetch_array($theloai)) {
					ob_start();
					?>
					<tr>
						<td>{idTL}</td>
						<td>{TenTL}</td>
						<td>{TenTL_KhongDau}</td>
						<td>{ThuTu}</td>
						<td>{AnHien}</td>					
						<td>
							<a href="suatheloai.php?idTL={idTL}" class="btn btn-default"> Sua </a> - <a href="xoatheloai.php?idTL={idTL}" class="btn btn-danger" onclick="javascript:return confirm('Are you sure you want to delete?')">Xoa</a>
						</td>
					</tr>

					<?php 
					$s = ob_get_clean();
					$s = str_replace("{idTL}", $rowtheloai["idTL"], $s);
					$s = str_replace("{TenTL}", $rowtheloai["TenTL"], $s);
					$s = str_replace("{TenTL_KhongDau}", $rowtheloai["TenTL_KhongDau"], $s);
					$s = str_replace("{ThuTu}", $rowtheloai["ThuTu"], $s);
					$s = str_replace("{AnHien}", $rowtheloai["AnHien"], $s);
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