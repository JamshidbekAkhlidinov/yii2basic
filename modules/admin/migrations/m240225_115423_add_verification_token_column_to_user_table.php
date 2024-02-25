<?php
/*
 *   Jamshidbek Akhlidinov
 *   25 - 2 2024 16:54:47
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%user}}`.
 */
class m240225_115423_add_verification_token_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'verification_token', $this->string());
        $this->addColumn('{{%user}}', 'password_reset_token', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'verification_token');
        $this->dropColumn('{{%user}}', 'password_reset_token');
    }
}
