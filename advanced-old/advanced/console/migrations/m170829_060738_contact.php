<?php

use yii\db\Migration;

class m170829_060738_contact extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%contact}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'Subject'=>$this->string()->notNull(),
            'email' => $this->string()->notNull()->unique(),
            'BNody'=>$this->text(),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%contact}}');
    }
}
