<?php 
require 'lib/Connectdb.php';

$sql = "SELECT * FROM my_table";
$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($connection));

$emparray = array();
if(mysqli_num_rows($result) > 0){
	//$emparray = $result->fetch_all(MYSQLI_ASSOC);
	//echo json_encode($emparray);
		

	while($row =mysqli_fetch_assoc($result))
	{
		$emparray[] = $row;
		//echo json_encode($emparray);
	}
	echo json_encode($emparray);
	
}
?>