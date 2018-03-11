<?php

use yii\db\Migration;

class m170818_074011_OrderDetail extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{OrderDetail}}', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer()->notNull(),
            'product_id' => $this->integer()->notNull(),
            'price' => $this->double()->notNull(),
            'quantity' => $this->integer()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'created_at' => $this->integer()->notNull(),            
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{OrderDetail}}');
    }
}
