<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "certificate".
 *
 * @property integer $id
 * @property string $images
 */
class Certificate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'certificate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['images'], 'required'],
            [['images'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'images' => 'Images',
        ];
    }
}
