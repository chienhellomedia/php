<?php

use yii\db\Migration;

class m170830_073752_subscribe extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%subscribe}}', [
            'id' => $this->primaryKey(),           
            'email' => $this->string()->notNull()->unique(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),           
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%subscribe}}');
    }
}
