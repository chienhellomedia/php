<?php 
$quangcaotopphai = QuangCaotopphai();
while ($row_quangcaotopphai = mysql_fetch_array($quangcaotopphai)) {
	
	?>
	<a href="<?php echo  $row_quangcaotopphai['Url']; ?>">
		<img width="280" src="upload/quangcao/<?php echo $row_quangcaotopphai['urlHinh']; ?>" />
	</a>
	<div style="height:10px"></div>

	<?php 
}
?>