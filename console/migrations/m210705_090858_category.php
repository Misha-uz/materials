<?php

use yii\db\Migration;

/**
 * Class m210705_090858_category
 */
class m210705_090858_category extends Migration
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
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
        $this->insert('{{%category}}', [
            'name' => 'Деловые/Бизнес-процессы',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
        $this->insert('{{%category}}', [
            'name' => 'Деловые/Найм',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
        $this->insert('{{%category}}', [
            'name' => 'Деловые/Реклама',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
        $this->insert('{{%category}}', [
            'name' => 'Деловые/Управление бизнесом',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
        $this->insert('{{%category}}', [
            'name' => 'Деловые/Управление людьми',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
        $this->insert('{{%category}}', [
            'name' => 'Деловые/Управление проектами',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
        $this->insert('{{%category}}', [
            'name' => 'Детские/Воспитание',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
        $this->insert('{{%category}}', [
            'name' => 'Дизайн/Общее',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
        $this->insert('{{%category}}', [
            'name' => 'Дизайн/Logo',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
        $this->insert('{{%category}}', [
            'name' => 'Дизайн/Web дизайн',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
        $this->insert('{{%category}}', [
            'name' => 'Разработка/PHP',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
        $this->insert('{{%category}}', [
            'name' => 'Разработка/HTML и CSS',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
        $this->insert('{{%category}}', [
            'name' => 'Разработка/Проектирование',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%category}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210705_090858_category cannot be reverted.\n";

        return false;
    }
    */
}
