<div class="sidebar-widget  wow fadeInUp outer-top-vs ">
  <h5><strong>Giấy chứng nhận</strong></h5>
  <div id="advertisement" class="advertisement">
    <?php foreach ($data as $data): ?>

      <div class="item">
        <div class="avatar" style="width: 100%">
          <img src="<?= Yii::$app->params['homepath'].$data->images ?>" alt="Image" class="img-responsive" style="min-width: 223px; min-height: 172.5px">
        </div>

      </div><!-- /.item -->
    <?php endforeach ?>


  </div><!-- /.owl-carousel -->
</div>