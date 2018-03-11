<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "group".
 *
 * @property integer $id
 * @property string $groupname
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Group extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['groupname','status', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['groupname'], 'string', 'max' => 255],
            [['groupname'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'groupname' => 'Tên nhóm',
            'status' => 'Trạng thái',
            'created_at' => 'Ngày tạo',
            'updated_at' => 'Ngày cập nhật',
        ];
    }
}
