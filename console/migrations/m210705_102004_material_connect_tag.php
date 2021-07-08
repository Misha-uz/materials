<?php

use yii\db\Migration;

/**
 * Class m210705_102004_material_connect_tag
 */
class m210705_102004_material_connect_tag extends Migration
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
        $this->createTable('{{%material_connect_tag}}', [
            'id' => $this->primaryKey(),
            'tag_id' =>  $this->integer()->notNull(),
            'material_id' =>  $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('material_connect_tag_index_1', '{{%material_connect_tag}}', 'tag_id');
        $this->addForeignKey('material_connect_tag_fk_1', '{{%material_connect_tag}}', 'tag_id', '{{%tag}}', 'id', 'cascade','cascade');

        $this->createIndex('material_connect_tag_index_2', '{{%material_connect_tag}}', 'material_id');
        $this->addForeignKey('material_connect_tag_fk_2', '{{%material_connect_tag}}', 'material_id', '{{%material}}', 'id', 'cascade','cascade');


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('material_fk_1', '{{%material_connect_tag}}');
        $this->dropIndex('material_index_1', '{{%material_connect_tag}}');
        $this->dropForeignKey('material_fk_2', '{{%material_connect_tag}}');
        $this->dropIndex('material_index_2', '{{%material_connect_tag}}');
        $this->dropTable('{{%material_connect_tag}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210705_102004_material_connect_tag cannot be reverted.\n";

        return false;
    }
    */
}
