<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "banner".
 *
 * @property integer $id
 * @property string $images
 * @property string $desc_1
 * @property string $desc_2
 * @property string $desc_3
 * @property string $link
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Banner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'banner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // [['images'], 'required'],
            [['status'], 'integer'],
            [[ 'created_at', 'updated_at'], 'safe'],
            [['images', 'desc_1', 'desc_2', 'desc_3'], 'string', 'max' => 255],
            [['link'], 'string', 'max' => 164],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'images' => 'Hình Banner',
            'desc_1' => 'Mô tả 1',
            'desc_2' => 'Mô tả 2',
            'desc_3' => 'Mô tả 3',
            'link' => 'Link',
            'status' => 'Trạng thái',
            'created_at' => 'Ngày tạo',
            'updated_at' => 'Ngày cập nhật',
        ];
    }
    
}
