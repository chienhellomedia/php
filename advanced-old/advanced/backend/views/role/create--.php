<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\RoleSearch */

$this->title = 'Create Role Search';
$this->params['breadcrumbs'][] = ['label' => 'Role Searches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-search-create">

   <div class="panel panel-info">
   	<div class="panel-heading">
   		<h3 class="panel-title">Panel title</h3>
   	</div>
   	<div class="panel-body">
   		 <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
   	</div>
   </div>

</div>
