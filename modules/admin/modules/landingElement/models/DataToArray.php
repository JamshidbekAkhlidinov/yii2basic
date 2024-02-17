<?php

namespace app\modules\admin\modules\landingElement\models;


use app\modules\admin\enums\TypeEnum;
use app\modules\admin\modules\content\models\Page;
use app\modules\admin\modules\content\models\Post;
use app\modules\admin\modules\content\models\PostCategory;
use yii\helpers\ArrayHelper;

class DataToArray
{

    public static function getModel($enum)
    {
        if ($enum == TypeEnum::POST) {
            $model = Post::find()
                ->andWhere([
                    'status' => Post::STATUS_PUBLISHED
                ])
                ->all();
        } elseif ($enum == TypeEnum::CATEGORY) {
            $model = PostCategory::find()
                ->andWhere([
                    'status' => PostCategory::STATUS_ACTIVE,
                ])
                ->all();
        } elseif ($enum == TypeEnum::PAGE) {
            $model = Page::find()
                ->andWhere([
                    'status' => Page::STATUS_PUBLISHED,
                ])
                ->all();
        } elseif ($enum == TypeEnum::LINK) {
            $model = null;
        }
        return $model;
    }

    public static function getListMenu($enum)
    {
        if (self::getModel($enum) == null) {
            return [];
        }
        return ArrayHelper::map(
            self::getModel($enum),
            'slug',
            function ($data) {
                return $data->getTranslation('title');
            },
        );
    }
}