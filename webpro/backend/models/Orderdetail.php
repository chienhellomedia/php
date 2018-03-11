<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "orderdetail".
 *
 * @property integer $id
 * @property integer $order_id
 * @property integer $product_id
 * @property double $price
 * @property integer $quantity
 * @property integer $status
 * @property integer $created_at
 */
class Orderdetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orderdetail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        [['order_id', 'product_id', 'price', 'quantity', 'created_at'], 'required'],
        [['order_id', 'product_id', 'quantity', 'status', 'created_at'], 'integer'],
        [['price'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
        'id' => 'ID',
        'order_id' => 'Order ID',
        'product_id' => 'Product ID',
        'price' => 'Price',
        'quantity' => 'Quantity',
        'status' => 'Status',
        'created_at' => 'Created At',
        ];
    }

    public function getAllOrderDetail($id)
    {
        return $data = Orderdetail::find()->where(['order_id'=>$id])->all();
    }
    public function getPronames()   
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
