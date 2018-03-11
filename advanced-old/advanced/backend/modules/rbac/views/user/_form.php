<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use backend\modules\rbac\components\Helper;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use backend\modules\admin\models\Khoa;
/* @var $this yii\web\View */
/* @var $model mdm\admin\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
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

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('rbac-admin', 'Create') : Yii::t('rbac-admin', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
