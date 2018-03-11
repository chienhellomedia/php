<?php

namespace backend\models;
use backend\models\Product;
use backend\models\Customer;

use Yii;

/**
 * This is the model class for table "wishlist".
 *
 * @property integer $id
 * @property integer $cus_id
 * @property integer $product_id
 * @property integer $status
 * @property integer $created_at
 */
class Wishlist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wishlist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cus_id', 'product_id', 'created_at'], 'required'],
            [['cus_id', 'product_id', 'status', 'created_at'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cus_id' => 'Khách hàng',
            'product_id' => 'Sản phẩm',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }

    public function getWishListByUser($id)
    {
        return $data = Wishlist::find()->where(['status' => 10, 'cus_id' => $id])->all();
    }
    public function getWishlistRelation ()
    {
      return $this->hasMany(Product::className(),['id'=>'product_id']);
  }
  public function getWishlistCustomer ()
    {
      return $this->hasMany(Customer::className(),['id'=>'cus_id']);
  }
}
