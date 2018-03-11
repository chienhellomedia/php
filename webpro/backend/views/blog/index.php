<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BlogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tin tức';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-index">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="panel-body">

            <h1></h1>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <p>
                <?= Html::a('Thêm mới', ['create'], ['class' => 'btn btn-success br0']) ?>
            </p>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    // 'id',
                    'title',
                    // 'slug',
                    [
                        'attribute' => 'image',
                        'format' => 'html', 
                        'value' => function ($model) {                    
                         return '<img src="'.$model->image.'" alt="" width=60>';
                     },  
                     'headerOptions'=>[
                         'style'=>'width:auto; text-align:center'
                     ],              
                     'contentOptions'=>[
                         'style'=>'width:auto; text-align:center'
                     ],
                 ],
                    // 'member_id',
            // 'content:ntext',
                 [
                    'attribute' => 'status',
                    'headerOptions'=>[
                        'style'=>'width:auto; text-align:center'
                    ],
                    'contentOptions'=>[
                        'style'=>'width:auto; text-align:center'
                    ],
                    'content' => function($data)
                    {
                        if ($data->status == 10) {
                          return '<a href="#" title="Public"><i class="glyphicon glyphicon-ok" aria-hidden="true"></i></a>'; 
                      } else {
                          return '<a href="#" title="No public"><i class="glyphicon glyphicon-remove" aria-hidden="true"></i></a>'; 
                      }
                  },
              ],
            // 'reviews',
            // 'created_at',
            // 'updated_at',

               [
                    // 'class' => 'yii\grid\ActionColumn',

                    'header' => 'Hành động',
                    'format' => 'html', 
                    'headerOptions'=>[
                        'style'=>'width:100px; text-align:center'
                    ],
                    'contentOptions'=>[
                        'style'=>'width:100px; text-align:center'
                    ],
                    'content' => function($data)
                    {
                        return
                        '<div class="dropdown">
                          <button class="btn btn-primary btn-sm dropdown-toggle br0" type="button" data-toggle="dropdown">Tác vụ
                          <span class="caret"></span></button>
                          <ul class="dropdown-menu fix-dropdown-menu br0">
                            <li>'.Html::a('<i class="fa fa-eye" aria-hidden="true"></i> Xem', ['blog/view', 'id'=>$data->id], ['class' => 'profile-link', 'title'=>'Xem']).'</li>
                            <li>'.Html::a('<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa', ['blog/update', 'id'=>$data->id], ['class' => 'profile-link', 'title'=>'Sửa']).'</li>
                            <li>'.Html::a('<i class="fa fa-trash-o" aria-hidden="true"></i> Xóa', ['blog/delete', 'id'=>$data->id], ['class' => 'profile-link', 'title'=>'Xóa', 'data-method'=>'POST', 'data-confirm'=>'bạn có chắc muốn xóa ?']).'</li>
                          </ul>
                        </div>';
                    }
                ],
          ],
          ]); ?>
      </div>
  </div>
</div>
