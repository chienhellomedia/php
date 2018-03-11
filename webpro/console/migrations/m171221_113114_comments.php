<?php

use yii\db\Migration;

/**
 * Class m171221_113114_comments
 */
class m171221_113114_comments extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%comments}}', [
            'id' => $this->primaryKey(),
            'table' => $this->string(32)->notNull(),
            'id_comment' => $this->integer()->notNull(),
            'parent' => $this->integer()->notNull(),
            'content' => $this->text(),
            'cus_id' => $this->integer()->notNull(),
            'readcomment' => $this->integer()->notNull()->defaultValue(0),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%comments}}');
    }
}
