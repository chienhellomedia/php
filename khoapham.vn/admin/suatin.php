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
	$TieuDe = $_POST['TieuDe'];
	$TieuDe_KhongDau = changeTitle($TieuDe);
	$TomTat = $_POST['TomTat'];
	$urlHinh = $_POST['urlHinh'];
	$Ngay = date("Y-m-d");
	$idUser = $_SESSION['idUser'];
	$Content = $_POST['Content'];
	$idTL = $_POST['idTL'];
	$idTL = $_POST['idTL'];
	
	$SoLanXem = 0;
	$TinNoiBat = $_POST['TinNoiBat'];
	$AnHien = $_POST['AnHien'];

	$qr = " INSERT INTO tin values(
	null, '$TieuDe', '$TieuDe_KhongDau', '$TomTat', '$urlHinh', '$Ngay', '$idUser', '$Content', '$idTL', '$idTL', '$SoLanXem', '$TinNoiBat', '$AnHien',
	)";
	mysql_query($qr);
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
	<script src="ckeditor/ckeditor.js" type="text/javascript"></script>
	<script src="ckfinder/ckfinder.js" type="text/javascript"></script>
	<script type="text/javascript">
		function BrowseServer( startupPath, functionData ){
			var finder = new CKFinder();
	finder.basePath = 'ckfinder/'; //Đường path nơi đặt ckfinder
	finder.startupPath = startupPath; //Đường path hiện sẵn cho user chọn file
	finder.selectActionFunction = SetFileField; // hàm sẽ được gọi khi 1 file được chọn
	finder.selectActionData = functionData; //id của text field cần hiện địa chỉ hình
	//finder.selectThumbnailActionFunction = ShowThumbnails; //hàm sẽ được gọi khi 1 file thumnail được chọn	
	finder.popup(); // Bật cửa sổ CKFinder
} //BrowseServer

function SetFileField( fileUrl, data ){
	document.getElementById( data["selectActionData"] ).value = fileUrl;
}
function ShowThumbnails( fileUrl, data ){	
	var sFileName = this.getSelectedFile().name; // this = CKFinderAPI
	document.getElementById( 'thumbnails' ).innerHTML +=
	'<div class="thumb">' +
	'<img src="' + fileUrl + '" />' +
	'<div class="caption">' +
	'<a href="' + data["fileUrl"] + '" target="_blank">' + sFileName + '</a> (' + data["fileSize"] + 'KB)' +
	'</div>' +
	'</div>';
	document.getElementById( 'preview' ).style.display = "";
	return false; // nếu là true thì ckfinder sẽ tự đóng lại khi 1 file thumnail được chọn
}
</script>



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
		<form action="" method="post">
			<table class="table table-bordered">
				<caption>them tin</caption>
				<tbody>
					<tr>
						<td>TieuDe</td><td><input type="text" name="TieuDe" value="" placeholder=""></td> 
					</tr>
					<tr>
						<td>TomTat</td><td><textarea name="TomTat" id="TomTat"></textarea></td>
					</tr>
					<tr>
						<td>urlHinh</td><td><input type="text" name="urlHinh" value="" placeholder="">
						<input onclick="BrowseServer('Images:/','urlHinh')" type="button" name="btnChonFile" id="btnChonFile" value="Chọn file" />
					</td>
				</tr>
				<tr>
					<td>Content</td>
					<td><textarea name="Content" id="Content"></textarea>
						<script type="text/javascript">
							var editor = CKEDITOR.replace( 'Content',{
								uiColor : '#9AB8F3',
								language:'vi',
								skin:'v2',	
								filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?Type=Images',
								filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?Type=Flash',
								filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
								filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

								toolbar:[
								['Source','-','Save','NewPage','Preview','-','Templates'],
								['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print'],
								['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
								['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],
								['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
								['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
								['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
								['Link','Unlink','Anchor'],
								['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
								['Styles','Format','Font','FontSize'],
								['TextColor','BGColor'],
								['Maximize', 'ShowBlocks','-','About']
								]
							});		
						</script>
					</td>
				</tr>
				<tr>
					<td>idTL</td>
					<td>
						<select name="idTL" id="idTL" >
							<?php 
							$theloai = danhsachtheloai();
							while ($row_theloai = mysql_fetch_array($theloai)) {
								?>
								<option value="<?php echo $row_theloai['idTL']; ?>"><?php echo $row_theloai['TenTL']; ?></option>
								<?php 
							}
							?>
						</select>

					</td>
				</tr>
				<tr>
					<td>idLT</td>
					<td>
						<select name="idLT" id="idLT">
							<?php 
							$loaitin = danhsachloaitin();
							while ($row_loaitin = mysql_fetch_array($loaitin)) {

								?>
								<option value="<?php echo $row_theloai['idLT']; ?>"><?php echo $row_loaitin['Ten']; ?></option>
								<?php 
							}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td>TinNoiBat</td>
					<td>
						<input type="radio" name="TinNoiBat" value="1" placeholder="">Noi bat <br>
						<input type="radio" name="TinNoiBat" value="1" placeholder="">Binh thuong <br>
					</td>
				</tr>
				<tr>
					<td>AnHien</td>
					<td>
						<input type="radio" name="AnHien" value="1" placeholder="">hien <br>
						<input type="radio" name="AnHien" value="0" placeholder="">an <br>
					</td>
				</tr>
				<tr><td><input type="submit" name="btnthem" value="them"></td></tr>
			</tbody>
		</table>
	</form>
</div>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" ></script>	 		
</body>
</html>