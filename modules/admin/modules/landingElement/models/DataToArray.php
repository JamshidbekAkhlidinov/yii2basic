<?php

namespace app\modules\admin\modules\landingElement\models;


use app\modules\admin\enums\TypeEnum;
use app\modules\admin\modules\content\models\Page;
use app\modules\admin\modules\content\models\Post;
use app\modules\admin\modules\content\models\PostCategory;
use yii\helpers\ArrayHelper;

class DataToArray
{

    public static function getParentMenu($id = null)
    {
        $model = Menu::find();
        if ($id != null) {
            $model->andWhere([
                '!=', 'id', $id
            ]);
        }
        return ArrayHelper::map(
            $model->all(),
            'id',
            function (Menu $model) {
                return $model->name;
            }
        );
    }

    public static function getCategory()
    {
        $model = PostCategory::find()
            ->andWhere([
                'status' => PostCategory::STATUS_ACTIVE
            ])
            ->all();
        return ArrayHelper::map(
            $model,
            'id',
            function (PostCategory $model) {
                return $model->name;
            }
        );
    }

    public static function getPost()
    {
        $model = Post::find()
            ->andWhere([
                'status' => Post::STATUS_PUBLISHED
            ])
            ->all();
        return ArrayHelper::map(
            $model,
            'id',
            function (Post $model) {
                return $model->title;
            }
        );
    }

    public static function getPage()
    {
        $model = Page::find()
            ->andWhere([
                'status' => Page::STATUS_PUBLISHED
            ])
            ->all();
        return ArrayHelper::map(
            $model,
            'id',
            function (Page $model) {
                return $model->title;
            }
        );
    }

    public static function getModel($enum)
    {
        $model = null;

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
            function (Menu $data) {
                return $data->name;
            },
        );
    }
}