<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%user}}`.
 */
class m210223_090522_add_columns_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'first_name', $this->string());
        $this->addColumn('{{%user}}', 'last_name', $this->string());
        $this->addColumn('{{%user}}', 'address', $this->string());
        $this->addColumn('{{%user}}', 'city', $this->string());
        $this->addColumn('{{%user}}', 'phone', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'first_name');
        $this->dropColumn('{{%user}}', 'last_name');
        $this->dropColumn('{{%user}}', 'address');
        $this->dropColumn('{{%user}}', 'city');
        $this->dropColumn('{{%user}}', 'phone');
    }
}
