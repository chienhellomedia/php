<?php

use yii\db\Migration;

/**
 * Class m171207_153856_banner
 */
class m171207_153856_banner extends Migration
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

        $this->createTable('{{%banner}}', [
            'id' => $this->primaryKey(),
            'images' => $this->string()->notNull(),
            'desc_1' => $this->string(255),
            'desc_2' => $this->string(255),
            'desc_3' => $this->string(255),
            'link' => $this->string(164),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%banner}}');
    }
}
