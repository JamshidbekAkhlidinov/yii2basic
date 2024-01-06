<?php
/*
 *   Jamshidbek Akhlidinov
 *   29 - 11 2023 18:26:26
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov/yii2basic
 */

namespace app\modules\admin\components\menu;

use app\modules\admin\enums\UserRolesEnum;
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
                    'label' => translate("Users"),
                    'type' => MenuWidget::type_item, //menu,item
                    'icon' => 'fa fa-users',
                    'url' => ['/admin/user'],
                    'active' => controller()->id == 'user',
                    'visible' => can(UserRolesEnum::ROLE_ADMINISTRATOR)
                ],
                [
                    'label' => 'Main menu child',
                    'type' => MenuWidget::type_item, //menu,item
                    'icon' => 'ri-dashboard-2-line',
                    'id' => 'test',
                    'active' => false,
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
                ],
                [
                    'label' => translate("Content"),
                    'type' => MenuWidget::type_item, //menu,item
                    'icon' => 'ri-dashboard-2-line',
                    'id' => 'test2',
                    'active' => module()->id == "content",
                    'items' => [
                        [
                            'label' => translate('Categories'),
                            'url' => ['/admin/content/post-category'],
                            'icon' => 'ri-dashboard-2-line',
                            'active' => controller()->id == "post-category",

                        ],
                        [
                            'label' => translate("Tags"),
                            'url' => ['/admin/content/post-tag'],
                            'icon' => 'ri-dashboard-2-line',
                            'active' => controller()->id == "post-tag",

                        ],
                        [
                            'label' => translate("Posts"),
                            'url' => ['/admin/content/post'],
                            'icon' => 'ri-dashboard-2-line',
                            'active' => controller()->id == "post",

                        ],
                    ],
                ],
                [
                    'label' => translate("File manager"),
                    'type' => MenuWidget::type_item, //menu,item
                    'icon' => 'las la-folder-open',
                    'url' => ['/admin/file'],
                    'active' => module()->id == 'file',
                ],
                self::getRbacMenu(),
            ]
        ]);
    }

    public static function getRbacMenu()
    {
        $controller_id = controller()->id;
        $module_id = module()->id;
        return [
            'label' => translate("Rbac configuration"),
            'icon' => 'ri-dashboard-2-line',
            'visible' => can(UserRolesEnum::ROLE_ADMINISTRATOR),
            'active' => $module_id == 'rbac',
            'id' => 'rbac',
            'type' => MenuWidget::type_item,
            'items' => [
//                [
//                    'label' => translate("Rules"),
//                    'url' => ['/admin/rbac/auth-rule'],
//                    'class' => $controller_id == 'auth-rule',
//                ],
                [
                    'label' => translate("Items"),
                    'url' => ['/admin/rbac/auth-item'],
                    'active' => $controller_id == 'auth-item',
                ],
                [
                    'label' => translate("Items child"),
                    'url' => ['/admin/rbac/auth-item-child'],
                    'active' => $controller_id == 'auth-item-child',
                ],
                [
                    'label' => translate("Assignment"),
                    'url' => ['/admin/rbac/auth-assignment'],
                    'active' => $controller_id == 'auth-assignment',
                ],
            ]
        ];
    }

}