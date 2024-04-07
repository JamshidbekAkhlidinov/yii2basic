<?php

namespace app\modules\admin\modules\landingElement\models;

use app\modules\admin\modules\landingElement\models\query\LandingElementQuery;
use Yii;
use yii\behaviors\TimestampBehavior;

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
 * @property int|null $status
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


    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'value' => date('Y-m-d H:i:s'),
                'updatedAtAttribute' => false
            ]
        ];
    }

    public static function find()
    {
        return new LandingElementQuery(get_called_class());
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
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

}
