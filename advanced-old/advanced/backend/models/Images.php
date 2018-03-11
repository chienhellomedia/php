<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "images".
 *
 * @property integer $id
 * @property integer $product_id
 * @property string $image
 * @property string $name
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Images extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['created_at', 'updated_at'], 'required'],
            [['image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'image' => 'Image',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
