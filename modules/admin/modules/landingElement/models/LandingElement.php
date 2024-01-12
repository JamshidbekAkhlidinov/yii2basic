<?php

namespace app\modules\admin\modules\landingElement\models;

use Yii;

/**
 * This is the model class for table "landing_element".
 *
 * @property int $id
 * @property int|null $key
 * @property string|null $title
 * @property string|null $icon
 * @property string|null $description
 * @property string|null $sub_text
 * @property string|null $value
 * @property string|null $files
 * @property string|null $url
 * @property int|null $order
 * @property string|null $created_at
 */
class LandingElement extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'landing_element';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['key', 'order'], 'integer'],
            [['title', 'description', 'sub_text', 'value', 'files'], 'string'],
            [['created_at'], 'safe'],
            [['icon', 'url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'key' => Yii::t('app', 'Key'),
            'title' => Yii::t('app', 'Title'),
            'icon' => Yii::t('app', 'Icon'),
            'description' => Yii::t('app', 'Description'),
            'sub_text' => Yii::t('app', 'Sub Text'),
            'value' => Yii::t('app', 'Value'),
            'files' => Yii::t('app', 'Files'),
            'url' => Yii::t('app', 'Url'),
            'order' => Yii::t('app', 'Order'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return LandingElementQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LandingElementQuery(get_called_class());
    }
}
