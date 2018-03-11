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
            [['cus_id', 'total', 'status', 'created_at'], 'integer'],
            [['fullname', 'email', 'mobile', 'addess', 'fullname_ship', 'email_ship', 'mobile_ship', 'addess_ship', 'total', 'created_at'], 'required'],
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
            'cus_id' => 'Cus ID',
            'fullname' => 'Fullname',
            'email' => 'Email',
            'mobile' => 'Mobile',
            'addess' => 'Addess',
            'fullname_ship' => 'Fullname Ship',
            'email_ship' => 'Email Ship',
            'mobile_ship' => 'Mobile Ship',
            'addess_ship' => 'Addess Ship',
            'request' => 'Request',
            'total' => 'Total',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }

    public function getOrderById($id)
    {
        return $data = Order::find()->where(['cus_id'=>$id])->all();
    }
}
