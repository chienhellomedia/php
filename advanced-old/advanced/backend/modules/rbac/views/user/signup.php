<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\grid\GridView;
use backend\modules\rbac\components\Helper;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use backend\modules\admin\models\Khoa;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \mdm\admin\models\form\Signup */

$this->title = 'Thêm mới tài khoản quản trị';
$this->params['breadcrumbs'][] = ['label'=> Yii::t('app', 'Users'),'url'=>['/account/user']];
$this->params['breadcrumbs'][] = $this->title;
$this->registerCss($this->render('style.css'));
?>
<div class="site-signup">
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $this->title ?></h3>
    </div>
    <div class="panel-body">
        <div class="container">
    <div class="row">
                                        <div class="col-md-12">
                                    <!-- Nav tabs --><div class="card">
                                    <ul class="nav nav-tabs" role="tablist">
                                      
                                        <li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Tạo tài khoản cho quản trị</a></li>
                                       
                                        
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        
                                        <div role="tabpanel" class="tab-pane active" id="profile">
                                        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                                        <div class="col-md-6"> 
                                            <?= $form->field($model, 'username') ?>
                                             <?= $form->field($model, 'password')->passwordInput() ?>
                                            <?= $form->field($model, 'confirm_password')->passwordInput() ?>
                                        </div>
                                        <div class="col-md-6"> 

                                                        <?= $form->field($model, 'display_name') ?>
                                                        <?= $form->field($model, 'email') ?>
                                                        <?= $form->field($model, 'khoa')->widget(Select2::classname(),[
                                                            'data' =>  ArrayHelper::map(Khoa::find()->all(),'name','name'),
                                                            'options' => ['placeholder' => 'Chọn khoa'],
                                                            'pluginOptions' => [
                                                                'allowClear' => true
                                                            ],
                                                          ]
                                                            
                                                        ) ?>
                                                        <?= $form->field($model, 'type')->dropDownList([
                                                               2 => 'Lớp trưởng',
                                                               1 => 'Cán bộ',
                                                               0 => 'Quản trị viên',
                                                        ],
                                                       [
                                                                'prompt'=>'Chọn chức vụ'
                                                            ] 
                                                        ) ?>
                                            </div>
                                                       
                                                        <div class="form-group">
                                                            <?= Html::submitButton(Yii::t('rbac-admin', 'Lưu thông tin'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                                                        </div>
                                                    <?php ActiveForm::end(); ?></div>
                                        
                                            </div>
                                        </div>
                                        
                                    </div>
</div>
                                </div>
    </div>
</div>
    </div>
</div>
</div>

