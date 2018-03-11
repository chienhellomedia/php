<?php 
$idLT = $_GET['idLT'];
settype($idLT, "int");
?>

<?php 
$bc = breakCrum($idLT);
$rowbc = mysql_fetch_array($bc);
?>
<div>
  Trang chủ >> <?php echo $rowbc['TenTL'] ?> >> <?php echo $rowbc['Ten'] ?>
</div>


<?php 
$sotin1rang = 4;
if(isset($_GET['trang'])){
  $trang = $_GET['trang'];
  settype($trang, 'int');
}
else {
  $trang = 1;
} 

$from = ($trang - 1) * $sotin1rang;
$tin = tintheoloaitin_phantrang($idLT, $from, $sotin1rang);
while ($row_tin = mysql_fetch_array($tin)) {
 ?> 

 <div class="box-cat">
   <div class="cat1">

    <div class="clear"></div>
    <div class="cat-content">
     <div class="col0 col1">
       <div class="news">
        <h3 class="title" ><a href="chitiet/<?php echo $row_tin['idTin']; ?>-<?php echo $row_tin['TieuDe_KhongDau']; ?>.html"> <?php echo $row_tin['TieuDe']; ?></a></h3>
        <img class="images_news" src="upload/tintuc/<?php echo $row_tin['urlHinh']; ?>" align="left" />
        <div class="des"><?php echo $row_tin['TomTat']; ?></div>
        <div class="clear"></div>                   
      </div>
    </div>

  </div>
</div>
</div>
<div class="clear"></div>
<?php 
}
?>

<hr>
<style>
  #phantrang a{
    background-color: #000; padding: 5px; margin-right: 3px;
  }
</style>
<div id="phantrang">
<?php 
$t = tintheoloaitin($idLT);
$tongsotin = mysql_num_rows($t);
$tongsotrang = ceil($tongsotin / $sotin1rang);
for($i=1; $i<=$tongsotrang; $i++){
?>
<a <?php if($i == $trang) echo "style = 'background-color:red'" ?>href="index.php?p=tintrongloai&idLT=<?php echo $idLT ?>&trang=<?php echo $i ?>"><?php echo $i ?></a>

<?php 

} 
?>
</div>
<!-- box cat-->




