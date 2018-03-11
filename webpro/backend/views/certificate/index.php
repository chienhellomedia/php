<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CertificateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Giấy chứng nhận';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="certificate-index">

    <div class="col-md-8 row">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <div class="panel-body">
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        
                <p>
                    <?= Html::a('Thêm mới giấy Chứng nhận', ['create'], ['class' => 'btn btn-success btn-sm']) ?>
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
                                return '<img src="'.$model->images.'" alt="" width=100>';
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
   </div>
