<?php
/*
 *   Jamshidbek Akhlidinov
 *   29 - 11 2023 18:26:26
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov/yii2basic
 */

namespace app\modules\admin\components\menu;

use app\modules\admin\widgets\MenuWidget;

class Menu
{
    public static function getMenu()
    {
        return MenuWidget::widget([
            'items' => [
                [
                    'label' => 'Test Title',
                    'type' => MenuWidget::type_title, //menu,item
                    'icon' => 'ri-dashboard-2-line',
                ],
                [
                    'label' => 'Main Manu',
                    'type' => MenuWidget::type_item, //menu,item
                    'icon' => 'ri-dashboard-2-line',
                    'url' => ['/admin/default/index'],
                    'active' => false,
                ],
                [
                    'label' => 'Main menu child',
                    'type' => MenuWidget::type_item, //menu,item
                    'icon' => 'ri-dashboard-2-line',
                    'id' => 'test',
                    'active' => true,
                    'items' => [
                        [
                            'label' => 'Login',
                            'url' => ['/admin/default/index'],
                            'icon' => 'ri-dashboard-2-line',
                            'active' => true,
                        ],
                        [
                            'label' => 'child menu',
                            'url' => ['/admin/default/index'],
                            'icon' => 'ri-dashboard-2-line',
                        ],
                        [
                            'label' => 'child menu',
                            'url' => ['/admin/default/index'],
                            'icon' => 'ri-dashboard-2-line',
                        ],
                        [
                            'label' => 'child menu',
                            'url' => ['/admin/default/index'],
                            'icon' => 'ri-dashboard-2-line',
                        ],
                    ],
                ]
            ]
        ]);
    }
}