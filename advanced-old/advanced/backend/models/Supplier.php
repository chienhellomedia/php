<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "supplier".
 *
 * @property integer $id
 * @property string $image
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Supplier extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'supplier';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image', 'name', 'email', 'phone', 'address', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['image', 'name', 'company', 'speech', 'email', 'phone', 'address'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['email'], 'unique'],
            [['phone'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Ảnh đại diện',
            'name' => 'Tên',
            'company' => 'Công ty',
            'speech' => 'Phát biểu',
            'email' => 'Email',
            'phone' => 'Phone',
            'address' => 'Địa chỉ',
            'status' => 'Trạng thái',
            'created_at' => 'Ngày tạo',
            'updated_at' => 'Ngày cập nhật',
        ];
    }

    public function getAllsupplier()
    {
        return $data = Supplier::find()->where(['status'=>10])->all();
    }
}
