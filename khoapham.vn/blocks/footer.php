<div class="thongtin-title">
	<div class="right">

      <a href="#"><span class="SetHomePage ico_respone_01">&nbsp;</span>Đặt VnExpress làm trang chủ</a>

      <a href="#"><span class="top">&nbsp;</span>Về đầu trang</a>

 </div>
</div>
<div class="thongtin-content">

   <?php 
   $theloaifooter = theloai();
   while ($row_theloaifooter = mysql_fetch_array($theloaifooter)) {
     $idTL = $row_theloaifooter['idTL'];

     ?>
     <ul class="ulBlockMenu">

      <li class="liFirst">
          <h2>
               <a class="mnu_giaoduc" href="/tin-tuc/giao-duc/"><?php echo $row_theloaifooter['TenTL']; ?></a>
          </h2>
     </li>
     <?php 
     $loaitin = loaitin($idTL);
     while ( $row_loaitin = mysql_fetch_array($loaitin)) {     
          ?>
          <li class="liFollow">
            <h2>
            <a href="./index.php?p=tintrongloai&idLT=<?php echo $row_loaitin['idLT'];?>"><?php echo $row_loaitin['Ten']; ?></a>
           </h2>
      </li>
      <?php 
 }
 ?>             
</ul>

<?php 

}
?>         





</div>




