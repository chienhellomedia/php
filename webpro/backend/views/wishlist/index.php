<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Wishlist;
use backend\models\Product;
use backend\models\Customer;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\WishlistSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sản phẩm khách hàng đã thích';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wishlist-index">

 <div class="panel panel-primary">
     <div class="panel-heading">
         <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
     </div>
     <div class="panel-body">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

            // 'id',
                 [
                 'attribute' => 'cus_id',
                  'content' => function($data) {
                    $model = Customer::find()->where(['id'=>$data->cus_id])->one();
                    return $model->fullname;
                 }, 
                 'headerOptions'=>[
                     'style'=>'width:auto; text-align:center'
                 ],              
                 'contentOptions'=>[
                     'style'=>'width:auto; text-align:center'
                 ],
             ],
                
                // 'product_id',
                [
                 'attribute' => 'product_id',
                 'content' => function($data) {
                    $model = Product::find()->where(['id'=>$data->product_id])->one();
                    return '<img src="'.Yii::$app->params['homepath'].$model->images.'" alt="" width="70">';
                 }, 
                 'headerOptions'=>[
                     'style'=>'width:auto; text-align:center'
                 ],              
                 'contentOptions'=>[
                     'style'=>'width:auto; text-align:center'
                 ],
             ],
            // 'status',
            // 'created_at',

         ],
         ]); ?>
     </div>
 </div>
</div>
