<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = 'Thêm mới';
$this->params['breadcrumbs'][] = ['label' => 'Qaunr trị viên', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

   <div class="panel panel-default">
   	<div class="panel-heading">
   		<h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
   	</div>
   	<div class="panel-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
   	</div>
   </div>

</div>
