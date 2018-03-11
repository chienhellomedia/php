<?php
//require 'lib/Connectdb.php';
?>
<!DOCTYPE html>
<html lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Title Page</title>		
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<style>
		table, th, td {
			border: 1px solid black;

		}
		tr:nth-child(even) {background-color: #f2f2f2}
	</style>


</head>
<body>	
	<div class="container">
		<div class="col-md-3">
			<?php
			require 'lib/Connectdb.php';
			if(isset($_GET['id'])){
				$id= $_GET['id'];
				$sqlout = "SELECT * FROM my_table WHERE id='$id'";
				$result = mysqli_query($conn, $sqlout);
				$row = mysqli_fetch_array($result)
				?>
				<form action="" method="POST" role="form">
					<h3>sản Phẩm</h3>			
					<div class="form-group">
						<label for="">MaSP</label>
						<input type="text" class="form-control" id="" name="MaSP" placeholder="Input field" value="<?php echo $row['id'] ?>">
					</div>	
					<div class="form-group">
						<label for="">TenSP</label>
						<input type="text" class="form-control" id="" name="TenSP" placeholder="Input field"  value="<?php echo $row['TenSP'] ?>">
					</div>	
					<div class="form-group">
						<label for="">Mau</label>
						<input type="color" class="form-control" id="" name="Mau" placeholder="Input field">
					</div>
					<div class="form-group">
						<label for="">Giá SP</label>
						<input type="text" class="form-control" id="" name="GiaSp" placeholder="Input field">
					</div>							
					<input type="submit" name="submit-btn" value="Sua" class="btn btn-danger">
					<a href="index.php" class="btn btn-danger">Them moi</a>
				</form>
				<?php 

				if(isset($_POST['submit-btn']))
				{
					$MaSp = isset($_POST['MaSP']) ? $_POST['MaSP'] : '';
					$TenSp = isset($_POST['TenSP']) ? $_POST['TenSP'] : '';
					$Mau = isset($_POST['Mau']) ? $_POST['Mau'] : '';
					$GiaSp = isset($_POST['GiaSp']) ? $_POST['GiaSp'] : '';

					if($TenSp && $Mau && $GiaSp){
					$sql = "UPDATE my_table SET TenSP = '$TenSp', Mau = '$Mau' , Gia=".$GiaSp." WHERE id = $id" ;  //luu y kieu so va kieu string
					if (mysqli_query($conn, $sql)) {
						echo "New record created successfully";
						//header('Location: hienthi.php');
					} else {
						echo "Error: " . $sql . "<br>" . mysqli_error($conn);
					}
				}
				
			}
			?>

			<?php } ?>
		</div>
		<div class="col-md-1"></div>
		<div class="col-md-8">
			<?php include 'hienthi.php'; ?>
		</div>
	</div>

	<!-- ======cho nay viet ham ==== -->


	<script src="https://code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>		
	<script src="Hello World"></script>
</body>
</html>