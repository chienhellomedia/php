<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Certificate */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Giấy chứng nhânj', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="certificate-view">

 <div class="col-md-10 row">
     <div class="panel panel-primary">
         <div class="panel-heading">
             <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
         </div>
         <div class="panel-body">
            <p>
                <?= Html::a('Sửa', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']) ?>
                <?= Html::a('Xóa', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger btn-sm',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                    ]) ?>
                </p>

                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        [
                            'attribute' => 'images',
                            'format' => 'html', 
                            'value' => function ($model) {                    
                                return '<img src="'.$model->images.'" width=300>';
                            },  
                            'headerOptions'=>[
                               'style'=>'width:auto; text-align:center'
                           ],              
                           'contentOptions'=>[
                               'style'=>'width:auto; text-align:center'
                           ],
                       ],
                   ],
                   ]) ?>
               </div>
           </div>
       </div>

   </div>
