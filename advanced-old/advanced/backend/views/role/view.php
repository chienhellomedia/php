<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\RoleSearch */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Quyền và nhóm Quyền', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-search-view">  

 <div class="row">
   <div class="col-md-7">
    <div class="card">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="panel-body">
         <div class="card">
          <?= DetailView::widget([
            'model' => $model,

            'attributes' => [
            'name',
            'type',
            'description:ntext',
            'rule_name',
            'data',
            [
            'attribute' => 'created_at',
            'value' => function ($model) {
              return date('d-m-Y', $model->created_at);
            }
            ],
            [
            'attribute' => 'updated_at',
            'value' => function ($model) {
              return date('d-m-Y', $model->updated_at);
            }
            ],
            ],
            ]) ?>

          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-2">
    <div class="card">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Hành động</h3>
        </div>
        <div class="panel-body">
         <p>
          <?= Html::a('<i class="fa fa-arrow-left" aria-hidden="true"></i> Quay về', ['index'], ['class' => 'btn btn-success w145 br0']) ?>
        </p>
        <p>
          <?= Html::a('<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa', ['update', 'id' => $model->name], ['class' => 'btn btn-primary br0 w145']) ?>
        </p>
        <p>
          <?= Html::a('<i class="fa fa-trash-o" aria-hidden="true"></i> Xóa', ['delete', 'id' => $model->name], [
            'class' => 'btn btn-danger br0 w145',
            'data' => [
            'confirm' => 'Are you sure you want to delete this item?',
            'method' => 'post',
            ],
            ]) ?>

          </div>
        </div>
      </div>
    </div>
  </div>

  <?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success alert-dismissable">
      <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
      <h4><i class="icon fa fa-check"></i>Saved!</h4>
      <?= Yii::$app->session->getFlash('success') ?>
    </div>
  <?php endif; ?>

  <div class="row">
    <div class="col-md-10">
      <div class="card">
       <div class="panel panel-primary">
         <div class="panel-heading">
           <h3 class="panel-title">Gán Quyền và nhóm Quyền cho nhóm này</h3>
         </div>
         <div class="panel-body" style="background: #e5e5e5">
          <div class="card clearfix"> 
            <?php $form = ActiveForm::begin(); ?>
            <div class="col-md-5">
              <h4>Quyền và nhóm Quyền chưa gán</h4>
              <?php echo $form->field($model,'permission')->dropDownList(
               [
               'Quyền' => ArrayHelper::map($pers,'name','name'),
               'Nhóm quyền' => ArrayHelper::map($roles,'name','name'),
               ],
               [
               'multiple' => true,
               'size' => 20
               ]
               )->label('Tên'); ?>
             </div>
             <div class="col-md-2">
              <h4>Thực hiện</h4>
              <button class="btn btn-success add-permision br0 w100">Thực hiện <i class="fa fa-long-arrow-right fa-lg" aria-hidden="true"></i></button>
              <button class="btn btn-danger remove-permision br0 w100"><i class="fa fa-long-arrow-left fa-lg" aria-hidden="true"></i> Xóa</button>
            </div>
            <div class="col-md-5">
              <h4>Quyền và nhóm Quyền đã gán</h4>
              <?php echo $form->field($model,'permission_assined')->dropDownList([
               'Quyền, nhóm Quyền được gán' => ArrayHelper::map($roles_asssined,'child','child'),
               ],
               [
               'multiple' => true,
               'size' => 20
               ]); ?>
             </div>
             <?php ActiveForm::end(); ?>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>




</div>


