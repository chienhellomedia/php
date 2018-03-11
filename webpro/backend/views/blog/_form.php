<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Blog */
/* @var $form yii\widgets\ActiveForm */
$srcThumbnails = $model->image ? $model->image : '/uploads/noimg.png';
?>

<div class="blog-form">

  <?php $form = ActiveForm::begin(); ?>

  <div class="col-sm-9"> <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
   
   <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?></div>




   <div class="col-sm-3">
    <div class="form-group">
      <?= Html::a('<i class="fa fa-reply" aria-hidden="true"></i> Quay lại', ['index'], ['class' => 'btn btn-info btn-sm br0 btn-block']) ?>
    </div>
    <div class="form-group">
     <?= Html::submitButton($model->isNewRecord ? 'Lưu lại' : 'Chỉnh sửa', ['class' => $model->isNewRecord ? 'btn btn-success br0 btn-block btn-sm' : 'btn btn-primary br0 btn-block btn-sm']) ?>
   </div>
   <br>
   <div class="news-thumbnails">
     <label>Ảnh dại diện</label>
     <div class="tip-avatar">
       <?=
       Html::img(Yii::$app->params['homepath'].$srcThumbnails, [
         'id' => 'img-blog',
         'alt' => '95x64',
         'data-src' => 'holder.js/95x64',
         'class' => 'media-object tip-imgPreview',
         'data-holder-rendered' => 'true',
       ]);
       ?>
       <?=
       Html::fileInput('blog-image', '', [
         'id' => 'upload-blog',
         'title' => 'Chọn ảnh bìa',
         'accept' => 'image/*',
         'data-value' => 'blog-image',
         'data-path' => '',
         'data-crop' => 'img-blog',
         'data-crop-width' => '400',
         'data-crop-height' => '222',
         'class' => 'tip-images',
         'data-validate' => '1',
         'data-size' => '400',
       ])
       ?>
       <?=
       $form->field($model, 'image')->hiddenInput(['id' => 'blog-image'])->label(false);
       ?>
       
       
     </div>
     
     
   </div>
   
   <label >Trạng thái</label><br>
   
   <label class="switch">
     <input type="checkbox" name="Blog[status]" value="10" checked>
     <span class="slider round"></span>
   </label>
 </div>

 <?php ActiveForm::end(); ?>

</div>
