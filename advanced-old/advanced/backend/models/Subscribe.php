<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "subscribe".
 *
 * @property integer $id
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 */
class Subscribe extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subscribe';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'created_at'], 'required'],
            [['status', 'created_at'], 'integer'],
            [['email'], 'string', 'max' => 255],
            [['email'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }
}
