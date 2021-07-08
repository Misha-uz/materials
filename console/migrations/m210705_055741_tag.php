<?php

use yii\db\Migration;

/**
 * Class m210705_055741_tag
 */
class m210705_055741_tag extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%tag}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
        $this->insert('{{%tag}}', [
            'name' => 'Тег1',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
        $this->insert('{{%tag}}', [
            'name' => 'Тег2',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
        $this->insert('{{%tag}}', [
            'name' => 'Тег3',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
        $this->insert('{{%tag}}', [
            'name' => 'Тег4',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%teg}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210705_055741_tag cannot be reverted.\n";

        return false;
    }
    */
}
