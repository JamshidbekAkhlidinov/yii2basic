<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%user_profile}}`.
 */
class m240108_124500_add_birthday_column_to_user_profile_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user_profile}}', 'phone_number', $this->string());
        $this->addColumn('{{%user_profile}}', 'birthday', $this->date());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user_profile}}', 'phone_number');
        $this->dropColumn('{{%user_profile}}', 'birthday');
    }
}
