<?php
require 'lib/Connectdb.php';
if(isset($_GET['id'])){
	$id= $_GET['id'];
		// echo $id;die;
	$slq = "DELETE from my_table where id = '$id'";
	mysqli_query($conn,$slq);
}
?> 
<div class="container">	
	<?php 
	include 'index.php'; 
	?>
</div>

