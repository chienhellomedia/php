<?php

use yii\db\Migration;

class m170825_143658_supplier extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%supplier}}', [
            'id' => $this->primaryKey(),
            'image' => $this->string()->notNull(),
            'name' => $this->string()->notNull()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'phone' => $this->string()->notNull()->unique(),
            'address' => $this->string()->notNull(),            
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%supplier}}');
    }
}
