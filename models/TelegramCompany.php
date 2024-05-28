<?php

namespace app\models;

use app\traits\FindOrFail;
use Yii;

/**
 * This is the model class for table "telegram_company".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $bot_token
 * @property int|null $status
 * @property string|null $admin_ids
 * @property string|null $admin_url
 * @property string|null $channel_id
 *
 * @property TelegramBotUser[] $telegramBotUsers
 */
class TelegramCompany extends \yii\db\ActiveRecord
{
    use FindOrFail;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'telegram_company';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['name', 'bot_token', 'admin_ids', 'admin_url', 'channel_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'bot_token' => Yii::t('app', 'Bot Token'),
            'status' => Yii::t('app', 'Status'),
            'admin_ids' => Yii::t('app', 'Admin Ids'),
            'admin_url' => Yii::t('app', 'Admin Url'),
            'channel_id' => Yii::t('app', 'Channel ID'),
        ];
    }

    /**
     * Gets query for [[TelegramBotUsers]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\TelegramBotUserQuery
     */
    public function getTelegramBotUsers()
    {
        return $this->hasMany(TelegramBotUser::class, ['telegram_company_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\TelegramCompanyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\TelegramCompanyQuery(get_called_class());
    }
}
