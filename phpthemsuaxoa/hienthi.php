<?php

require 'lib/Connectdb.php';
$sqlout = "SELECT id, TenSP, Mau, Gia FROM my_table";
$result = mysqli_query($conn, $sqlout);

?>

<table class="table table-hover">
	<h3>Danh muc san pham</h3>
	<thead>
		<tr>
			<th>Ma Sp</th>
			<th>Ten Sp</th>
			<th>Mau Sp</th>
			<th>Gia Sp</th>
			<th colspan="2">Hanh dong</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		if (mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_array($result)){				
				?>
				<tr>
					<td><?php echo $row['id']; ?></td>
					<td><?php echo $row['TenSP']; ?></td>
					<td><?php echo $row['Mau']; ?></td>
					<td><?php echo $row['Gia']; ?></td>	
					<td><a href="edit.php?id=<?=$row['id'];?>">Edit</a></td>							
					<td><a href="delete.php?id=<?=$row['id']; ?>">Del</a></td>
				</tr>
				
				<?php 					
			}	
		}
		
		?>

	</tbody>
</table>

