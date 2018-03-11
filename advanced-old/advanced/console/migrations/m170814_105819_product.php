<?php

use yii\db\Migration;

class m170814_105819_product extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'image' => $this->string()->notNull(),
            'cate_id' => $this->integer()->notNull(),
            'price' => $this->float()->notNull(),
            'pricesale' => $this->float(),
            'saleoff' => $this->float(),
            'startsale' => $this->date(),  
            'endsale' => $this->date(),  
            'content' => $this->text()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%product}}');
    }
}
