<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */
/* @var $form yii\widgets\ActiveForm */
$avatar  = ($model->images !='')? $model->images :'images/noImg.png';
?>

<div class="product-form">

  <?php $form = ActiveForm::begin(); ?>

  <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>




  <?= $form->field($model, 'price')->textInput() ?>

  <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

  <?= $form->field($model, 'status')->textInput() ?>

  <?= $form->field($model, 'created_at')->textInput() ?>

  <?= $form->field($model, 'updated_at')->textInput() ?>


  <div class="col-md-12">
    <div class="row x_panel tile">
      <div class="x_title">
        <h2>Hình ảnh</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

        <div class="col-md-12">
          <div class="tip-avatar">
            <img id="img-logo" name="img"  class="media-object tip-imgPreview" src="<?php echo \Yii::$app->params['mediaUrl'].'/'?><?php echo $avatar ?>" 
            data-src="holder.js/95x64" data-holder-rendered="true" width="200px">  
          </br>
        </div>
        <span class="btn btn-success btn-file">
         Chọn file <input type="file" id="upload-logo" class="tip-images" name="LogoImage" value="" title="Chọn ảnh bìa" accept="image/*" data-value="LogoImage" data-path="" data-crop="img-logo" data-crop-width="100" data-crop-height="100" data-validate="1" data-size="100">
       </span>


       <div class="form-group field-LogoImage required">
        <input type="hidden" value="<?php echo $avatar ?>" id="LogoImage" class="form-control" name="Product[images]">
        <div class="help-block"></div>
      </div>

    </div>
  </div>
</div>
</div>
</div>

<div class="col-md-12">
  <div class="row x_panel tile">
    <div class="x_title">
      <h2>Hình ảnh</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">

      <div class="col-md-12">
        <div class="tip-avatar">
          <img id="img-logo" name="img"  class="media-object tip-imgPreview" src="<?php echo \Yii::$app->params['mediaUrl'].'/'?><?php echo $avatar ?>" 
          data-src="holder.js/95x64" data-holder-rendered="true" width="200px">  
        </br>
        <span class="btn btn-success btn-file">
         Chọn file <input type="file" id="upload-logo" class="tip-images" name="LogoImage" value="" title="Chọn ảnh bìa" accept="image/*" data-value="LogoImage" data-path="" data-crop="img-logo" data-crop-width="300" data-crop-height="300" data-validate="1" data-size="300">
       </span>


       <div class="form-group field-LogoImage required">
        <input type="hidden" value="<?php echo $avatar ?>" id="LogoImage" class="form-control" name="Product[images]">
        <div class="help-block"></div>
      </div>

    </div>
  </div>
</div>
</div>
</div>
<div class="form-group">
  <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>
