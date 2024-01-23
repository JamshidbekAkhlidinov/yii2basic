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
                    'label' => translate("Site Config"),
                    'url' => ['/admin/landingElement/header/form'],
                    'icon' => 'ri-dashboard-2-line',
                    'active' => controller()->id == "header",

                ],
                [
                    'label' => translate("Header Title"),
                    'url' => ['/admin/landingElement/header-title/form'],
                    'icon' => 'ri-dashboard-2-line',
                    'active' => controller()->id == "header-title",

                ],
                [
                    'label' => translate("Services Title"),
                    'url' => ['/admin/landingElement/service-title/form'],
                    'icon' => 'ri-dashboard-2-line',
                    'active' => controller()->id == "service-title",
                ],
                [
                    'label' => translate("Services"),
                    'url' => ['/admin/landingElement/service'],
                    'icon' => 'ri-dashboard-2-line',
                    'active' => controller()->id == "service",
                ],
                [
                    'label' => translate("Create Title"),
                    'url' => ['/admin/landingElement/create-title/form'],
                    'icon' => 'ri-dashboard-2-line',
                    'active' => controller()->id == "create-title",
                ],
                [
                    'label' => translate("Partners"),
                    'url' => ['/admin/landingElement/partner'],
                    'icon' => 'ri-dashboard-2-line',
                    'active' => controller()->id == "partner",
                ],
                [
                    'label' => translate("Team"),
                    'url' => ['/admin/landingElement/team/index'],
                    'icon' => 'ri-dashboard-2-line',
                    'active' => controller()->id == "team",
                ],
            ],
        ];
    }
}