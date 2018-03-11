<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AboutSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Câu chuyện HNH';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="about-index">

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="panel-body">
         <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

         <p>
            <?= Html::a(' Thêm mới ', ['create'], ['class' => 'btn btn-success br0']) ?>
        </p>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

            // 'id',
                [
                    'attribute' => 'images',
                    'format' => 'html', 
                    'value' => function ($model) {                    
                     return '<img src="'.$model->images.'" alt="" width=60>';
                 },  
                 'headerOptions'=>[
                     'style'=>'width:auto; text-align:center'
                 ],              
                 'contentOptions'=>[
                     'style'=>'width:auto; text-align:center'
                 ],
             ],
             'order',
             ['class' => 'yii\grid\ActionColumn'],
         ],
         ]); ?>
     </div>
 </div>
</div>
