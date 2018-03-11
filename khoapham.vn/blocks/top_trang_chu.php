<div id="slide-left">

   <?php 
   $tinmoinhat = tinmoinhat();
   $row_tinmoinhat = mysql_fetch_array($tinmoinhat);
   ?>
   <div id="slideleft-main">
      <img src="upload/tintuc/<?php echo $row_tinmoinhat['urlHinh']; ?>"  /><br />
      <h2 class="title"><a href="<?php echo $row_tinmoinhat['idTin']; ?>-<?php echo $row_tinmoinhat['TieuDe_KhongDau']; ?>.html"><?php echo $row_tinmoinhat['TieuDe']; ?></a> </h2>
      <div class="des">
          <?php echo $row_tinmoinhat['TomTat']; ?>
     </div>            

</div>
<div id="slideleft-scroll">

   <div class="content_scoller width_common">
      <ul>
         <?php 
         $tinmoinhat_next = tinmoinhat_next();
         while ($row_tinmoinhat_next = mysql_fetch_array($tinmoinhat_next)) {            

             ?>

             <li>
                 <div class="title_news">
                     <a href="<?php echo $row_tinmoinhat_next['idTin']; ?>-<?php echo $row_tinmoinhat_next['TieuDe_KhongDau']; ?>.html" class="txt_link"> <?php echo $row_tinmoinhat_next['TieuDe']; ?> </a> 
                </div>
           </li>
           <?php 
      }
      ?>

 </ul>
</div>			

<div id="gocnhin">
   <img alt="" src="upload/tintuc/logokhoapham.png" width="100%"></a>
   <div class="title_news"></div>
</div>

</div>
</div>


