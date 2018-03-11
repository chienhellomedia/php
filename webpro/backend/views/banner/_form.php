<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Banner */
/* @var $form yii\widgets\ActiveForm */
$avatar = $model->images ? $model->images : 'uploads/noimg.png';
?>

<div class="banner-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-sm-9">

        <a href="#" class="add-img-banner"><img src="<?php echo Yii::$app->params['homepath'].$avatar ?>" alt="" width="500" class="show-banner"></a>

        <?= $form->field($model, 'images')->hiddenInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'desc_1')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'desc_2')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'desc_3')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    </div>
    


    <div class="col-sm-3">
        <div class="form-group">
           <?= Html::a(' Quay lại', ['index'], ['class' => 'btn btn-info btn-sm btn-block br0']) ?>
           <br>
           <?= Html::submitButton($model->isNewRecord ? 'Tạo mới' : 'Sửa lại', ['class' => $model->isNewRecord ? 'btn btn-success btn-sm br0 btn-block' : 'btn btn-success btn-sm br0 btn-block']) ?>
       </div>
       <label >Trạng thái</label><br>
       <label class="switch">
        <input type="checkbox" name="Banner[status]" value="10" checked>
        <span class="slider round"></span>
    </label>
</div>

<?php ActiveForm::end(); ?>

</div>
