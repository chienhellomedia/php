<?php

use yii\db\Migration;

class m170818_073733_Order extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%Order}}', [
            'id' => $this->primaryKey(),
            'cus_id' => $this->integer(),
            'username' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'mobile' => $this->string()->notNull(),
            'addess' => $this->string()->notNull(),
            'user_ship' => $this->string()->notNull(),
            'email_ship' => $this->string()->notNull(),
            'mobile_ship' => $this->string()->notNull(),
            'addess_ship' => $this->string()->notNull(),
            'request' => $this->string(),
            'total' => $this->integer()->notNull(),
            'payment_id' => $this->Integer()->notNull(),
            'deliver_id' => $this->Integer()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%Order}}');
    }
}
