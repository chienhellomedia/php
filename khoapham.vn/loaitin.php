<?php 
require "lib/dbCon.php";
//require "lib/quantri.php";
require "lib/trangchu.php";
?>

<?php 
$idTL =  $_GET['idTL']; 
settype($idTL, "int");
$loaitin = DanhSachLoaiTin_Theo_TheLoai($idTL);
while ($row_loaitin = mysql_fetch_array($loaitin)) {
	?>	

	<option value="<?php echo $row_loaitin['idLT']; ?>"><?php echo $row_loaitin['Ten']; ?></option>




	<?php } ?>	


