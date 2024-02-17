<?php

namespace app\modules\admin\modules\landingElement\models;

use app\modules\admin\enums\TypeEnum;
use app\modules\admin\modules\content\models\Page;
use app\modules\admin\modules\content\models\Post;
use app\modules\admin\modules\content\models\PostCategory;
use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $order
 * @property int|null $status
 * @property string|null $icon
 * @property int|null $parent_id
 * @property int|null $type
 * @property int|null $position_menu
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $label_position
 * @property string|null $slug
 * @property string|null $item
 *
 * @property Menu[] $menus
 * @property Menu $parent
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order', 'status', 'parent_id', 'type', 'position_menu', 'label_position'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'icon', 'slug', 'item'], 'string', 'max' => 255],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Menu::class, 'targetAttribute' => ['parent_id' => 'id']],
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
            'order' => Yii::t('app', 'Order'),
            'status' => Yii::t('app', 'Status'),
            'icon' => Yii::t('app', 'Icon'),
            'parent_id' => Yii::t('app', 'Parent ID'),
            'type' => Yii::t('app', 'Type'),
            'position_menu' => Yii::t('app', 'Position Menu'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'label_position' => Yii::t('app', 'Label Position'),
            'slug' => Yii::t('app', 'Slug'),
            'item' => Yii::t('app', 'Item'),
        ];
    }

    /**
     * Gets query for [[Menus]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\admin\modules\landingElement\models\query\MenuQuery
     */
    public function getMenus()
    {
        return $this->hasMany(Menu::class, ['parent_id' => 'id']);
    }

    /**
     * Gets query for [[Parent]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\admin\modules\landingElement\models\query\MenuQuery
     */
    public function getParent()
    {
        return $this->hasOne(Menu::class, ['id' => 'parent_id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\modules\admin\modules\landingElement\models\query\MenuQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\admin\modules\landingElement\models\query\MenuQuery(get_called_class());
    }

    public function getItem()
    {
        if ($this->item == null) {
            return null;
        }
        $type = $this->type;
        if ($type == TypeEnum::LINK) {
            return $this->item;
        } elseif ($type == TypeEnum::PAGE) {
            if ($model = Page::findOne(['slug' => $this->item])) {
                return $model->title;
            }
        } elseif ($type == TypeEnum::POST) {
            if ($model = Post::findOne(['slug' => $this->item])) {
                return $model->title;
            }
        } elseif ($type == TypeEnum::CATEGORY) {
            if ($model = PostCategory::findOne(['slug' => $this->item])) {
                return $model->name;
            }
        }
        return null;
    }
}
