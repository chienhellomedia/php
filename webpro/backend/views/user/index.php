<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Quản trị viên';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
    </div>
    <div class="panel-body">
       
    <h1></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Thêm mới', ['create'], ['class' => 'btn btn-success btn-sm br0']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'username',
            // 'auth_key',
            // 'password_hash',
            // 'password_reset_token',
            'email:email',
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
                          return '<a href="#" title="Public"><i class="fa fa-check btn btn-xs btn-success" aria-hidden="true"></i></a>'; 
                        } else {
                          return '<a href="#" title="No public"><i class="fa fa-times btn btn-xs btn-danger" aria-hidden="true"></i></a>'; 
                        }
                     },
                ],
             [
                    'attribute' => 'created_at',
                    'headerOptions'=>[
                    'style'=>'width:auto; text-align:center'
                    ],
                    'contentOptions'=>[
                        'style'=>'width:auto; text-align:center'
                    ],
                    'content' => function($data)
                    {
                        return date('d-m-Y h:m:s', $data->created_at);
                     },
                ],
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
                            <li>'.Html::a('<i class="fa fa-eye" aria-hidden="true"></i> Xem', ['user/view', 'id'=>$data->id], ['class' => 'profile-link', 'title'=>'Xem']).'</li>
                            <li>'.Html::a('<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa', ['user/update', 'id'=>$data->id], ['class' => 'profile-link', 'title'=>'Sửa']).'</li>
                            <li>'.Html::a('<i class="fa fa-trash-o" aria-hidden="true"></i> Xóa', ['user/delete', 'id'=>$data->id], ['class' => 'profile-link', 'title'=>'Xóa', 'data-method'=>'POST', 'data-confirm'=>'bạn có chắc muốn xóa ?']).'</li>
                          </ul>
                        </div>';
                    }
                ],
        ],
    ]); ?>
    </div>
</div>
</div>
