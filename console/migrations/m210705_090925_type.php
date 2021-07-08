<?php

use yii\db\Migration;

/**
 * Class m210705_090925_type
 */
class m210705_090925_type extends Migration
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
        $this->createTable('{{%type}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
        $this->insert('{{%type}}', [
            'name' => 'Книга',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
        $this->insert('{{%type}}', [
            'name' => 'Статья',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
        $this->insert('{{%type}}', [
            'name' => 'Видео',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
        $this->insert('{{%type}}', [
            'name' => 'Сайт/Блог',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
        $this->insert('{{%type}}', [
            'name' => 'Подборка',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
        $this->insert('{{%type}}', [
            'name' => 'Ключевые идеи книги',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%type}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210705_090925_type cannot be reverted.\n";

        return false;
    }
    */
}
