<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Supplier */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="supplier-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-8"> 
        <div class="card"> 
            <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            
            <?= $form->field($model, 'company')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'speech')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'status')->dropDownList([10=>'Kích hoạt', 0=>'Không kích hoạt']) ?>
        </div>
    </div>


    <div class="col-md-3">
        <div class="card">
            <div class="form-group">
               <?= Html::a('<i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại', ['index'], ['class' => 'btn btn-info br0 w100']) ?>
           </div>
           <div class="form-group">
             <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save" aria-hidden="true"></i> Lưu' : '<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa', ['class' => $model->isNewRecord ? 'btn btn-success br0 w100' : 'btn btn-primary br0 w100']) ?>
         </div>
         <div class="form-group">
            <button type="reset" class="btn btn-warning br0 w100">Hủy</button>
        </div>
    </div>
    <div class="card">
        <h5 >Xem hình ảnh</h5><hr>
        <img src="" alt="" id="img-supplier" class="img-responsive">
    </div>
</div>

<?php ActiveForm::end(); ?>

</div>
