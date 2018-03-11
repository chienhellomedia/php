<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use backend\models\Comments;
use yii\widgets\Pjax;

?>


<div class="comment">
  <?php
  $form = ActiveForm::begin([
       // 'id' => 'comment-form',
   'action' => Url::to(['/comments/create']),
   'options' => [
    'class' => 'form-horizontal comment-form form-comment-parent',
  ],
  ]) ?>
  <input type="hidden" name="Comments[table]" value="<?php echo $table ?>">
  <input type="hidden" name="Comments[slug]" value="<?php echo $slug ?>">
  <input type="hidden" name="Comments[cus_id]" value="<?php echo $cus_id ?>" class="userComment">
  <input type="hidden" name="Comments[parent]" value="<?php echo $parent ?>">
  <?= $form->field($model, 'content')->textarea(['rows'=>5, 'class'=>'contentFocus form-control']) ?>
  <div class="col-sm-5 pull-right">
    <div class="form-group">
      <div class="col-sm-4 pa0">
        <button type="reset" class="btn btn-danger btn-block br0">Hủy</button>
      </div>
      <div class="col-sm-8"><?= Html::submitButton('Đăng Bình luận', ['class' => 'btn btn-primary btn-block br0 submit-comment']) ?></div>
    </div>
  </div>
  <?php ActiveForm::end() ?>

</div>


<div class="content-comments">
  <h3><strong>Nội dung bình luận</strong></h3>
  <p>Có <?php echo $allcomment ?> bình luận</p>
  <p>Các bình luận mới nhất: </p><br>
  <?php if(!empty($data)): foreach ($data as $key => $parcomment) : ?>

    <div class="media">
      <div class="media-left">
        <img src="<?php echo Yii::$app->params['homepath'] ?>uploads/user.png" class="media-object" style="width:45px">
      </div>
      <div class="media-body">
        <h4 class="media-heading"><?php echo $parcomment->comment[0]->fullname ?> &nbsp;<small><i>Ngày đăng <?php echo $parcomment->created_at ?></i></small></h4>
        <p class="mr0"><?php echo $parcomment->content ?></p>
        <p class="mr0"><span class="reply"><b>Trả lời</b></span>&nbsp;<span class="number-like">0</span>&nbsp;<span class="like-comment"><i class="fa fa-thumbs-o-up fa-lg" aria-hidden="true"></i></span> &nbsp;<span class="dislike-comment"><i class="fa fa-thumbs-o-down fa-lg" aria-hidden="true"></i></span></p>
        
        <!-- Nested media object -->
        <?php $child = new Comments();
        $childComment = $child->getChildComment($parcomment->id);
        if(!empty($childComment)) :
          $countreply = $child->getChildCount($parcomment->id);
          echo '<a href="javascript:void(0)" title="Xem thêm bình luận khác" class="show-more-reply" data-key="'.$key.'"><i class="fa fa-reply" aria-hidden="true"></i> có '.$countreply.' câu trả lời khác</a>';
         
          foreach ($childComment as $kson => $childcom) :
            ?>
            <div class="media">
              <div class="media-left">
                <img src="<?php echo Yii::$app->params['homepath'] ?>uploads/user.png" class="media-object" style="width:45px">
              </div>
              <div class="media-body">
                <h4 class="media-heading"><?php echo $childcom->comment[0]->fullname ?>&nbsp;<small><i>Ngày đăng <?php echo $childcom->created_at ?></i></small></h4>
                <p class="mr0"><?php echo $childcom->content ?></p>
                <p class="mr0"><span class="reply" ><b>Trả lời</b></span>&nbsp;<span class="number-like">0</span>&nbsp;<span class="like-comment"><i class="fa fa-thumbs-o-up fa-lg" aria-hidden="true"></i></span> &nbsp;<span class="dislike-comment"><i class="fa fa-thumbs-o-down fa-lg" aria-hidden="true"></i></span></p>
              </div>
            </div>

          <?php  endforeach; endif; ?>
          <!-- Nested media object -->
          <div class="clearfix">
           <?php
           $form = ActiveForm::begin([
               // 'id' => 'comment-form',
             'action' => Url::to(['/comments/create']),
             'options' => [
              'class' => 'hide comment-form form-comment-child',

            ],
            ]) ?>
            <input type="hidden" name="Comments[table]" value="<?php echo $table ?>">
            <input type="hidden" name="Comments[slug]" value="<?php echo $slug ?>">
            <input type="hidden" name="Comments[cus_id]" value="<?php echo $cus_id ?>" class="userComment">
            <input type="hidden" name="Comments[parent]" value="<?php echo $parcomment->id ?>">
            <?= $form->field($model, 'content')->textarea(['rows'=>5, 'class'=>'contentFocus form-control', 'id'=>'comments-content-'.$key]) ?>
            <div class="col-sm-5 pull-right">
              <div class="form-group">
                <div class="col-sm-4 pa0">
                  <button type="reset" class="btn btn-danger btn-block btn-destroy br0">Hủy</button>
                </div>
                <div class="col-sm-8"> <?= Html::submitButton('Đăng Bình luận', ['class' => 'btn btn-primary btn-block br0 submit-comment']) ?></div>
              </div>
            </div>
            <?php ActiveForm::end() ?></div>

          </div>
        </div>
        <p style="border-top: 1px solid #66ad44; margin-top: 10px;"></p>
      <?php  endforeach; endif; ?>
    </div>

    <div class="button-comment">
   
      <button type="button" class="btn btn-block btn-success br0 show-more-comment" data-count="<?= $count ?>"
        data-href="<?= Url::to(['/comments/showmore']) ?>" 
        data-table="<?php echo $table ?>"
        data-slug="<?php echo $slug ?>"
        data-cus="<?php echo $cus_id ?>";
        data-page="1">Xem thêm</button>
     
</div>




    <style type="text/css" media="screen">
    span.reply {
      width: 200px !important;
      padding: 10px;
      cursor: pointer;
    }
    span.reply:hover b {
      color: #67ad45;
    }
    span.number-like {
      margin-left: 5px;
      padding: 5px;
      cursor: pointer;
      font-size: 15px;
    }
    span.number-like:hover {
      color: #67ad45;

    }
    span.like-comment {
      margin-left: 5px;
      padding: 5px;
      cursor: pointer;
    }
    span.like-comment:hover {
      color: #67ad45;
    }
    span.dislike-comment {
      padding: 5px;
      cursor: pointer;
    }
    span.dislike-comment:hover {
      color: #67ad45;
    }
    .mr0 {
      margin: 0!important;
    }
    .pa0 {
      padding: 0 !important;
    }
  </style>