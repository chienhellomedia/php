<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Member */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Thành viên', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="member-view">

    <div class="card">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <div class="panel-body">
                <div class="col-md-6">
                    <div class="card">
                     <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                        'id',
                        'username',
                        'fullname',
            // 'auth_key',
            // 'password_hash',
            // 'password_reset_token',
                        'email:email',
                        'phone',
                        'address',
                        'status',
                        'created_at',
                        'updated_at',
                        ],
                        ]) ?>
                    </div>
                </div>
                <div class="col-md-2">
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
               </div>
           </div>
       </div>
      
    <div class="card loadpermission">
       <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Gán quyền cho Thành viên này</h3>
        </div>
        <div class="panel-body">
            <?php $form = ActiveForm::begin(); ?>
            <div class="col-md-5">
             <?php echo $form->field($model,'permission')->dropDownList(
                [
                'Nhóm quyền' => ArrayHelper::map($roles,'name','name'),
                'Quyền' => ArrayHelper::map($pers,'name','name'),
                ],
                [
                'multiple' => true,
                'size' => 20,
                ]
                ); ?>

            </div>
            <div class="col-md-2">

                <button  class="btn btn-success add-asign w100">Thêm <i class="fa fa-long-arrow-right fa-lg" aria-hidden="true"></i></button>  <br>
                <button class="btn btn-warning remove-asign w100"><i class="fa fa-long-arrow-left fa-lg" aria-hidden="true"></i> Xóa</button>  

            </div>

            <div class="col-md-5">
                <?php echo $form->field($model,'permission_assined')->dropDownList(
                    [
                    'Quyền' => ArrayHelper::map($asssigns,'item_name','item_name'),
                    ],
                    [
                    'multiple' => true,
                    'size' => 20
                    ]
                    ); ?>

                </div>
                <?php ActiveForm::end() ?>
            </div>
        </div>
    </div>
</div>
