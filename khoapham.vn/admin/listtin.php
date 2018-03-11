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
		<table class="table table-bordered">
			<caption>Danh sach tin</caption>
			<tbody>
				<tr>
					<td>data</td>
					<td>data</td>
					<td>data</td>
					<td>data</td>
					<td><a href="themTin.php">Them</a></td>
				</tr>
				<?php 
				$tin = danhsachtin();
				while ($row_tin = mysql_fetch_array($tin)) {
					ob_start()
					?>
					<tr>
						<td>idTin:{idTin}&nbsp;{Ngay}</td>
						<td> <a href="suaTin.php?idTin={id Tin}">{TieuDe} <br>
						</a> <img src="../upload/tintuc/{urlHinh}" alt="" width="100px" height="60px"> {TomTat} </td>
						<td>{TenTL} - {Ten}</td>
						<td>So lan Xem:{SoLanXem} &nbsp;{TinNoiBat} - {AnHien}</td>
						<td><a href="suaTin.php?idTin={idTin}">Sua</a> - <a href="xoaTin.php?idTin={Xoa}">Xoa</a></td>					
					</tr>

					<?php 
					$s = ob_get_clean();
					$s = str_replace("{idTin}", $row_tin['idTin'], $s);
					$s = str_replace("{Ngay}", $row_tin['Ngay'], $s);
					$s = str_replace("{TieuDe}", $row_tin['TieuDe'], $s);
					$s = str_replace("{TomTat}", $row_tin['TomTat'], $s);
					$s = str_replace("{urlHinh}", $row_tin['urlHinh'], $s);
					$s = str_replace("{TenTL}", $row_tin['TenTL'], $s);
					$s = str_replace("{Ten}", $row_tin['Ten'], $s);
					$s = str_replace("{SoLanXem}", $row_tin['SoLanXem'], $s);
					$s = str_replace("{TinNoiBat}", $row_tin['TinNoiBat'], $s);
					$s = str_replace("{AnHien}", $row_tin['AnHien'], $s);


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