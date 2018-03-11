<?php 
if(isset($_GET['idTin'])){
  $idTin = $_GET['idTin'];
  settype($idTin, 'int');
}
else {
  $idTin = 1;
}
capnhapsolanxemtin($idTin);
?>

<?php
$tin = chitiettin($idTin);
$rowtin = mysql_fetch_array($tin);
?>

<h1 class="title"><?php echo $rowtin['TieuDe'] ?></h1>
<div class="des">
  <?php echo $rowtin['TomTat'] ?>
</div>
<div class="chitiet">
  <!--noi dung-->
  <?php echo $rowtin['Content'] ?>
  <!--//noi dung-->
</div>
<div class="clear"></div>
<div class="number_count"><span id=""><?php echo $rowtin['SoLanXem'] ?></span></div>
<!--face-->

<div class="clear"></div>
<div id="tincungloai">
  <div class="clear"></div>
  <ul>
    <?php 
    $tincungloai = tincungloai($idTin, $rowtin['idLT']);
    while( $rowtincungloai = mysql_fetch_array($tincungloai )) {

     ?>
     <li>       
       <a href="index.php?p=chitiettin&idTin=<?php echo $rowtincungloai['idTin'] ?>"><img src="upload/tintuc/<?php echo $rowtincungloai['urlHinh'] ?>" alt=""></a> <br />
       <a class="title" href="index.php?p=chitiettin&idTin=<?php echo $rowtincungloai['idTin'] ?>"><?php echo $rowtincungloai['TieuDe'] ?></a>
       <span class="no_wrap">   
       </li>

       <?php 
     }
     ?>
   </ul>
 </div>
 <div class="clear"></div> 





