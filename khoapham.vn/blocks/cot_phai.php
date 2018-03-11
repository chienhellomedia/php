<!-- box cat -->
<?php 
$idLT = 1;
?>
<div class="box-cat">
	<div class="cat">
        <?php 
        $theloai = theloaitin_ba($idLT);
        $row_theloai = mysql_fetch_array($theloai);
        ?>
        <div class="main-cat">        
           <a href="#"><?php echo $row_theloai['TenTL']; ?></a>
       </div>

       <div class="clear"></div>
       <div class="cat-content">
           <?php 
           $tinmoinhattheoloaitin = tinmoitheoloaitin_mot($idLT);
           $row_tinmoinhattheoloaitin = mysql_fetch_array($tinmoinhattheoloaitin);
           ?>
           <div class="col1">
               <div class="news">
                <h3 class="title" ><a href="index.php?p=chitiettin&idTin=<?php echo $row_tinmoinhattheoloaitin['idTin']; ?>"> <?php echo $row_tinmoinhattheoloaitin['TieuDe']; ?> </a></h3>
                <img class="images_news" src="upload/tintuc/<?php echo $row_tinmoinhattheoloaitin['urlHinh']; ?>" align="left" />
                <div class="des"><?php echo $row_tinmoinhattheoloaitin['TomTat']; ?></div>


                <div class="clear"></div>

            </div>
        </div>
        <div class="col2">
            <?php 
            $tinmoitheoloiatin_ba = tinmoitheoloaitin_ba($idLT);
            while ($row_tinmoinhattheoloaitin_ba = mysql_fetch_array($tinmoitheoloiatin_ba)) {

                ?>
                <h3 class="tlq"><a href="index.php?p=chitiettin&idTin=<?php echo $row_tinmoinhattheoloaitin_ba['idTin']; ?>"><?php echo $row_tinmoinhattheoloaitin_ba['TieuDe']; ?></a></h3>
                <?php 
            }
            ?>
        </div> 

    </div>

</div>

</div>
<div class="clear"></div>
<!-- //box cat -->
<!-- box cat -->
<?php 
$idLT = 2;
?>
<div class="box-cat">
    <div class="cat">
        <?php 
        $theloai = theloaitin_ba($idLT);
        $row_theloai = mysql_fetch_array($theloai);
        ?>
        <div class="main-cat">        
           <a href="#"><?php echo $row_theloai['TenTL']; ?></a>
       </div>

       <div class="clear"></div>
       <div class="cat-content">
           <?php 
           $tinmoinhattheoloaitin = tinmoitheoloaitin_mot($idLT);
           $row_tinmoinhattheoloaitin = mysql_fetch_array($tinmoinhattheoloaitin);
           ?>
           <div class="col1">
               <div class="news">
                <h3 class="title" ><a href="index.php?p=chitiettin&idTin=<?php echo $row_tinmoinhattheoloaitin['idTin']; ?>"> <?php echo $row_tinmoinhattheoloaitin['TieuDe']; ?> </a></h3>
                <img class="images_news" src="upload/tintuc/<?php echo $row_tinmoinhattheoloaitin['urlHinh']; ?>" align="left" />
                <div class="des"><?php echo $row_tinmoinhattheoloaitin['TomTat']; ?></div>


                <div class="clear"></div>

            </div>
        </div>
        <div class="col2">
            <?php 
            $tinmoitheoloiatin_ba = tinmoitheoloaitin_ba($idLT);
            while ($row_tinmoinhattheoloaitin_ba = mysql_fetch_array($tinmoitheoloiatin_ba)) {

                ?>
                <h3 class="tlq"><a href="index.php?p=chitiettin&idTin=<?php echo $row_tinmoinhattheoloaitin_ba['idTin']; ?>"><?php echo $row_tinmoinhattheoloaitin_ba['TieuDe']; ?></a></h3>
                <?php 
            }
            ?>
        </div> 

    </div>

</div>

</div>
<div class="clear"></div>
<!-- //box cat -->
<!-- box cat -->
<?php 
$idLT = 3;
?>
<div class="box-cat">
    <div class="cat">
        <?php 
        $theloai = theloaitin_ba($idLT);
        $row_theloai = mysql_fetch_array($theloai);
        ?>
        <div class="main-cat">        
           <a href="#"><?php echo $row_theloai['TenTL']; ?></a>
       </div>

       <div class="clear"></div>
       <div class="cat-content">
           <?php 
           $tinmoinhattheoloaitin = tinmoitheoloaitin_mot($idLT);
           $row_tinmoinhattheoloaitin = mysql_fetch_array($tinmoinhattheoloaitin);
           ?>
           <div class="col1">
               <div class="news">
                <h3 class="title" ><a href="index.php?p=chitiettin&idTin=<?php echo $row_tinmoinhattheoloaitin['idTin']; ?>"> <?php echo $row_tinmoinhattheoloaitin['TieuDe']; ?> </a></h3>
                <img class="images_news" src="upload/tintuc/<?php echo $row_tinmoinhattheoloaitin['urlHinh']; ?>" align="left" />
                <div class="des"><?php echo $row_tinmoinhattheoloaitin['TomTat']; ?></div>


                <div class="clear"></div>

            </div>
        </div>
        <div class="col2">
            <?php 
            $tinmoitheoloiatin_ba = tinmoitheoloaitin_ba($idLT);
            while ($row_tinmoinhattheoloaitin_ba = mysql_fetch_array($tinmoitheoloiatin_ba)) {

                ?>
                <h3 class="tlq"><a href="index.php?p=chitiettin&idTin=<?php echo $row_tinmoinhattheoloaitin_ba['idTin']; ?>"><?php echo $row_tinmoinhattheoloaitin_ba['TieuDe']; ?></a></h3>
                <?php 
            }
            ?>
        </div> 

    </div>

</div>

</div>
<div class="clear"></div>
<!-- //box cat -->

















