<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Supplier */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Nhà Cung cấp', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="supplier-view">

   <div class="card">
       <div class="panel panel-primary">
           <div class="panel-heading">
               <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
           </div>
           <div class="panel-body">        
             <div class="col-md-8">
              <div class="card">
                 <?= DetailView::widget([
                  'model' => $model,
                  'attributes' => [
                  'id',
                  'image:image',
                  'name',
                  'company',
                  'speech',
                  'email:email',
                  'phone',
                  'address',
                  [
                  'attribute' => 'status',
                  'value' => function ($model) {                      
                    if ($model->status == 0) {
                        return 'Ẩn';
                    } else {
                      return 'Hiện';
                  }
              },  

              ],
              [
              'attribute' => 'created_at',
              'value' => function ($model) {
                return date('d-m-Y', $model->created_at);
            },
            ],
            [
            'attribute' => 'updated_at',
            'value' => function ($model) {
                return date('d-m-Y', $model->updated_at);
            },                
            ],
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

</div>
<style type="text/css" media="screen">
    img {
        width: 50%;
    }

</style>