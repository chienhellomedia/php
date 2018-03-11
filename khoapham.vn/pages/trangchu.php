<?php 
$theloai = theloai();
while ($row_theloai = mysql_fetch_array($theloai)) {
  $idTL = $row_theloai['idTL'];

  ?>

  <div class="box-cat">
   <div class="cat">
     <div class="main-cat">
       <a href="#"><?php echo  $row_theloai['TenTL'];?></a>
     </div>
     <div class="child-cat">
       <?php 
       $loaitin = loaitin($idTL);
       while ($row_loaitin = mysql_fetch_array($loaitin)) {


        ?>
        <a href="index.php?p=tintrongloai&idLT=<?php echo $row_loaitin['idLT']; ?>"><?php echo $row_loaitin['Ten']; ?></a>
        <?php 
      }
      ?> 
    </div>
    <div class="clear"></div>
    <div class="cat-content">
      <?php 
      $xemnhieu = xemnhieu_theloai($idTL);
      $row_xemnhieu = mysql_fetch_array($xemnhieu);
      ?>
      <div class="col1">
       <div class="news">
        <h3 class="title" ><a href="index.php?p=chitiettin&idTin=<?php echo $row_xemnhieu['idTin']; ?>"><?php echo $row_xemnhieu['TieuDe']; ?></a></h3>
        <img class="images_news" src="upload/tintuc/<?php echo $row_xemnhieu['urlHinh']; ?>" align="left" />
        <div class="des"><?php echo $row_xemnhieu['TomTat'] ?></div>
        <div class="clear"></div>

      </div>
    </div>
    <?php 
    ?>

    <div class="col2">
      <?php 
      $xemnhieu2 = xemnhieu_theloai2($idTL);
      while ($row_xemnhieu2 = mysql_fetch_array($xemnhieu2)) {   
        ?>
        <p class="tlq"><a href="index.php?p=chitiettin&idTin=<?php echo $row_xemnhieu2['idTin']; ?>"><?php echo $row_xemnhieu2['TieuDe']; ?></a></p> 
        <?php 
      }
      ?>

    </div>    
  </div>
</div>
</div>
<div class="clear"></div>
<?php 
}
?>

<!-- box cat-->





