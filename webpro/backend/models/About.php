<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "about".
 *
 * @property string $images
 * @property integer $id
 * @property integer $order
 */
class About extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'about';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order'], 'required'],
            [['order'], 'integer'],
            [['images'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'images' => 'Hình ảnh',
            'id' => 'ID',
            'order' => 'Thứ tự',
        ];
    }
}
