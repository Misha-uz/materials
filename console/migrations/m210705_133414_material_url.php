<?php

use yii\db\Migration;

/**
 * Class m210705_133414_material_url
 */
class m210705_133414_material_url extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%material_url}}', [
            'id' => $this->primaryKey(),
            'material_id' =>  $this->integer()->notNull(),
            'url' => $this->string()->notNull(),
            'author' => $this->string()->notNull(),
        ], $tableOptions);

        $this->createIndex('material_url_index_1', '{{%material_url}}', 'material_id');
        $this->addForeignKey('material_url_fk_1', '{{%material_url}}', 'material_id', '{{%material}}', 'id', 'cascade','cascade');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('material_url_fk_1', '{{%material_url}}');
        $this->dropIndex('material_url_index_1', '{{%material_url}}');
        $this->dropTable('{{%material_url}}');
    }
    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210705_133414_material_url cannot be reverted.\n";

        return false;
    }
    */
}
