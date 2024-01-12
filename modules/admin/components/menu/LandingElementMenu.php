<?php
/*
 *   Jamshidbek Akhlidinov
 *   12 - 1 2024 11:37:31
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\admin\components\menu;

use app\modules\admin\widgets\MenuWidget;

class LandingElementMenu
{
    public static function getMenu()
    {
        return [
            'label' => translate("Landing Elements"),
            'type' => MenuWidget::type_item, //menu,item
            'icon' => 'ri-dashboard-2-line',
            'id' => 'landingElement',
            'active' => module()->id == "landingElement",
            'items' => [
                [
                    'label' => translate("Header"),
                    'url' => ['/admin/landingElement/header/form'],
                    'icon' => 'ri-dashboard-2-line',
                    'active' => controller()->id == "header",

                ],
                [
                    'label' => 'Tag',
                    'url' => ['/admin/content/post-tag'],
                    'icon' => 'ri-dashboard-2-line',
                    'active' => controller()->id == "post-tag",

                ],
                [
                    'label' => 'Post',
                    'url' => ['/admin/content/post'],
                    'icon' => 'ri-dashboard-2-line',
                    'active' => controller()->id == "post",

                ],
            ],
        ];
    }
}