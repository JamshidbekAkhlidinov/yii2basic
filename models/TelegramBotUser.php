<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "telegram_bot_user".
 *
 * @property int $id
 * @property int|null $telegram_company_id
 * @property string|null $telegram_user_id
 * @property string|null $username
 * @property string|null $phone_number
 * @property float|null $balance
 * @property int|null $is_admin
 * @property int|null $is_block
 * @property int|null $step
 * @property string|null $full_name
 * @property string|null $options
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property TelegramCompany $telegramCompany
 */
class TelegramBotUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'telegram_bot_user';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'value' => date('Y-m-d H:i:s'),
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['telegram_company_id', 'is_admin', 'is_block', 'step'], 'integer'],
            [['balance'], 'number'],
            [['options'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['telegram_user_id', 'username', 'phone_number', 'full_name'], 'string', 'max' => 255],
            [['telegram_company_id'], 'exist', 'skipOnError' => true, 'targetClass' => TelegramCompany::class, 'targetAttribute' => ['telegram_company_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'telegram_company_id' => Yii::t('app', 'Telegram Company ID'),
            'telegram_user_id' => Yii::t('app', 'Telegram User ID'),
            'username' => Yii::t('app', 'Username'),
            'phone_number' => Yii::t('app', 'Phone Number'),
            'balance' => Yii::t('app', 'Balance'),
            'is_admin' => Yii::t('app', 'Is Admin'),
            'is_block' => Yii::t('app', 'Is Block'),
            'step' => Yii::t('app', 'Step'),
            'full_name' => Yii::t('app', 'Full Name'),
            'options' => Yii::t('app', 'Options'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[TelegramCompany]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\TelegramCompanyQuery
     */
    public function getTelegramCompany()
    {
        return $this->hasOne(TelegramCompany::class, ['id' => 'telegram_company_id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\TelegramBotUserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\TelegramBotUserQuery(get_called_class());
    }
}
