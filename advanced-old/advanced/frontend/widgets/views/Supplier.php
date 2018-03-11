 <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
        <div id="advertisement" class="advertisement">
          <?php foreach ($supp as $sup) : ?>
            <div class="item">
              <div class="avatar"><img src="<?php echo $sup->image; ?>" alt="Image"></div>
              <div class="testimonials"><em>"</em> <?php echo $sup->speech; ?><em>"</em></div>
              <div class="clients_author"><?php echo $sup->name ?>    <span><?php echo $sup->company ?></span>    </div><!-- /.container-fluid -->
            </div><!-- /.item -->
          <?php endforeach; ?>
        </div><!-- /.owl-carousel -->
      </div>