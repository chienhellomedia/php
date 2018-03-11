<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property integer $id
 * @property integer $cus_id
 * @property string $fullname
 * @property string $email
 * @property string $mobile
 * @property string $addess
 * @property string $fullname_ship
 * @property string $email_ship
 * @property string $mobile_ship
 * @property string $addess_ship
 * @property string $request
 * @property integer $total
 * @property integer $payment_id
 * @property integer $delivery_id
 * @property integer $status
 * @property integer $created_at
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cus_id', 'total', 'payment_id', 'delivery_id', 'status', 'created_at'], 'integer'],
            [['fullname', 'email', 'mobile', 'addess', 'fullname_ship', 'email_ship', 'mobile_ship', 'addess_ship', 'total', 'payment_id', 'delivery_id', 'created_at'], 'required'],
            [['fullname', 'email', 'mobile', 'addess', 'fullname_ship', 'email_ship', 'mobile_ship', 'addess_ship', 'request'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cus_id' => 'Mã khách hàng',
            'fullname' => 'Người mua',
            'email' => 'Email',
            'mobile' => 'Mobile',
            'addess' => 'Địa chỉ',
            'fullname_ship' => 'Người nhận',
            'email_ship' => 'Email nhận',
            'mobile_ship' => 'Mobile nhận',
            'addess_ship' => 'Địa chỉ nhận',
            'request' => 'Yêu cầu',
            'total' => 'Tổng tiền',
            'payment_id' => 'Hình thức thanh toán',
            'delivery_id' => 'Hình thức giao hàng',
            'status' => 'Trạng thái',
            'created_at' => 'Ngày mua',
        ];
    }

    public function getOrderById($id)
    {
        return $data = Order::find()->where(['cus_id'=>$id])->all();
    }
}
