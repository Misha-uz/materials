<?php

use yii\db\Migration;

/**
 * Class m210705_090957_material
 */
class m210705_090957_material extends Migration
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
        $this->createTable('{{%material}}', [
            'id' => $this->primaryKey(),
            'type_id' =>  $this->integer()->notNull(),
            'category_id' =>  $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'author' => $this->string()->notNull(),
            'description' => $this->text()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('material_index_1', '{{%material}}', 'type_id');
        $this->addForeignKey('material_fk_1', '{{%material}}', 'type_id', '{{%type}}', 'id', 'cascade','cascade');

        $this->createIndex('material_index_2', '{{%material}}', 'category_id');
        $this->addForeignKey('material_fk_2', '{{%material}}', 'category_id', '{{%category}}', 'id', 'cascade','cascade');

    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('material_fk_1', '{{%material}}');
        $this->dropIndex('material_index_1', '{{%material}}');
        $this->dropForeignKey('material_fk_2', '{{%material}}');
        $this->dropIndex('material_index_2', '{{%material}}');
        $this->dropTable('{{%material}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210705_090957_material cannot be reverted.\n";

        return false;
    }
    */
}
