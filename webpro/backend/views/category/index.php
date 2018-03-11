<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Category;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh mục sản phẩm';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
    </div>
    <div class="panel-body">
      <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

      <p class="clearfix">
        <?= Html::a('<i class="fa fa-plus-circle" aria-hidden="true"></i> Tạo mới Danh mục', ['create'], ['class' => 'btn btn-success btn-sm pull-right br0']) ?>
      </p>
      <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
          ['class' => 'yii\grid\SerialColumn'],

            // 'id',
          'name',
                    // 'slug',
          [
            'attribute' => 'parent',
            'value' => function ($model) {
              if($model->parent == 0) {
                return 'Danh mục gốc';
              } else {
               $data = Category::find()->where(['id'=>$model->parent])->one();
               return $data->name;
             }
           },
           'headerOptions'=>[
             'style'=>'width:auto; text-align:center'
           ],              
           'contentOptions'=>[
             'style'=>'width:auto; text-align:center'
           ],
         ],
                    // 'description',
         [
          'attribute' => 'status',
          'format' => 'html', 
          'headerOptions'=>[
            'style'=>'width:200px; text-align:center'
          ],
          'contentOptions'=>[
            'style'=>'width:200px; text-align:center'
          ],
          'value' => function($data)
          {
            if ($data->status == 10) {
              return '<a href="#" title="Trạng thái"><i class="fa fa-check btn btn-success btn" aria-hidden="true"></i></a>'; 
            } else {
              return '<a href="#" title="Trạng thái"><i class="fa fa-times btn btn-danger" aria-hidden="true"></i></a>'; 
            }
          },
        ],
            // 'created_at',
            // 'updated_at',

        [
          'class' => 'yii\grid\ActionColumn',
          'header'=>'Hành động',
          'headerOptions'=>[
            'style'=>'width:100px; text-align:center'
          ],
          'contentOptions'=>[
            'style'=>'width:100px; text-align:center'
          ],
          'buttons'=>[                
            'view'=>function($url, $model) {
             return html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, ['class'=>'btn btn-sm', 'title'=>'Xem']);
           },
           'update'=>function($url, $model) {
             return html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, ['class'=>'btn btn-sm', 'title'=>'Sửa']);
           },
           'delete'=>function($url, $model) {
             return html::a('<span class="glyphicon glyphicon-trash"></span>', $url, 
               [
                 'class'=>'btn', 
                 'data-confirm'=>'bạn có chắc muốn xóa ?',                       
                 'data-method'=>'post',
                 'title'=>'Xóa',
               ]);
           }
         ],
       ],
     ],
     ]); ?>
   </div>
 </div>
</div>
