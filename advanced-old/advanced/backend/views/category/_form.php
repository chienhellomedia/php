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

        <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>    

        <?= $form->field($model, 'parent')->dropDownList($cat, ['prompt' => '-Chọn danh mục cha-']) ?>


        <?= $form->field($model, 'description')->textArea(['maxlength' => true]) ?>

        <?= $form->field($model, 'status')->dropDownList([10=>'kích hoạt', 0 => 'Không kích hoạt'], ['prompt'=>'-Chọn trạng thái-']) ?>

    </div>
</div>


<div class="col-md-3">
   <div class="card">
       <p>
           <?= Html::a('<i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại', ['index'], ['class' => 'btn btn-info br0 w100']) ?>
       </p>
       <p>
           <?= Html::a('<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa', ['update', 'id' => $model->id], ['class' => 'btn btn-primary br0 w100']) ?>
       </p>
       <p>
           <?= Html::a('<span class="glyphicon glyphicon-trash"></span> Xóa', ['delete', 'id' => $model->id], [
               'class' => 'btn btn-danger br0 w100',
               'data' => [
               'confirm' => 'Are you sure you want to delete this item?',
               'method' => 'post',
               ],
               ]) ?>
           </p>
       </div>
   </div>

   <?php ActiveForm::end(); ?>

</div>
