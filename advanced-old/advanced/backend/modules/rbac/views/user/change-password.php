<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \mdm\admin\models\form\ChangePassword */

$this->title = Yii::t('rbac-admin', 'Change Password');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
     <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-5">
                    <?php $form = ActiveForm::begin(['id' => 'form-change']); ?>
                        <?= $form->field($model, 'oldPassword')->passwordInput() ?>
                        <?= $form->field($model, 'newPassword')->passwordInput() ?>
                        <?= $form->field($model, 'retypePassword')->passwordInput() ?>
                        <div class="form-group">
                            <?= Html::submitButton(Yii::t('rbac-admin', 'Change'), ['class' => 'btn btn-primary', 'name' => 'change-button']) ?>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
