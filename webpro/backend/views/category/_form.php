<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Category;

/* @var $this yii\web\View */
/* @var $model backend\models\Category */
/* @var $form yii\widgets\ActiveForm */
$cate = new Category();
$cat = $cate->getCategoryParent();
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-8">
       <div class="card">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'parent')->dropDownList($cat, ['prompt' => '-Chọn danh mục cha-']) ?>

        <?= $form->field($model, 'description')->textArea(['maxlength' => true]) ?>

        <?= $form->field($model, 'status')->dropDownList([10=>'kích hoạt', 0 => 'Không kích hoạt']) ?>

    </div>
</div>


<div class="col-md-3">
    <div class="form-group">
        <?= Html::a('<i class="fa fa-reply" aria-hidden="true"></i> Quay lại', ['index'], ['class' => 'btn btn-info  br0 btn-sm btn-block']) ?>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', '<i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu') : Yii::t('app', '<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Cập nhật'), ['class' => $model->isNewRecord ? 'btn btn-success btn-block br0 btn-sm ' : 'btn btn-primary btn-block br0 btn-sm ']) ?>
    </div>

    <div class="form-group">
        <button type="reset" class="btn btn-default btn-block btn-sm br0"><i class="fa fa-ban" aria-hidden="true"></i> Hủy</button>
    </div>
</div>

<?php ActiveForm::end(); ?>

</div>
