<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ImagesrealSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hình ảnh thực tế';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="imagesreal-index">

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="panel-body">
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <p>
                <?= Html::a('Thêm mới hình ảnh', ['create'], ['class' => 'btn btn-success btn-sm br0']) ?>
            </p>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    // 'id',
                    [
                        'attribute' => 'small',
                        'format' => 'html', 
                        'value' => function ($model) {                    
                         return '<img src="'.$model->small.'" alt="" width=60; height=50 />';
                     },  
                     'headerOptions'=>[
                         'style'=>'width:auto; text-align:center'
                     ],              
                     'contentOptions'=>[
                         'style'=>'width:auto; text-align:center'
                     ],
                 ],
                 [
                        'attribute' => 'big',
                        'format' => 'html', 
                        'value' => function ($model) {                    
                         return '<img src="'.$model->big.'" alt="" width=60; height=60 />';
                     },  
                     'headerOptions'=>[
                         'style'=>'width:auto; text-align:center'
                     ],              
                     'contentOptions'=>[
                         'style'=>'width:auto; text-align:center'
                     ],
                 ],


                 ['class' => 'yii\grid\ActionColumn'],
             ],
             ]); ?>
         </div>
     </div>
 </div>
