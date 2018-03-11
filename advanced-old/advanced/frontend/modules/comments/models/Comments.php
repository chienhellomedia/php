<?php

namespace frontend\modules\comments\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property integer $id
 * @property string $author
 * @property string $comment
 * @property integer $parent_id
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['author', 'comment', 'created_at', 'updated_at'], 'required'],
            [['comment'], 'string'],
            [['parent_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['author'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author' => 'Author',
            'comment' => 'Comment',
            'parent_id' => 'Parent ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
