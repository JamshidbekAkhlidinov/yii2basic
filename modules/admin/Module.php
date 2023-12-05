<?php

namespace app\modules\admin;

use app\modules\admin\enums\UserRolesEnum;
use yii\filters\AccessControl;
use yii\web\ErrorHandler;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        $this->layout = 'main';
        \Yii::$app->errorHandler->errorAction = '/admin/default/error';
        $this->modules = [
            'rbac' => \app\modules\admin\modules\rbac\Module::class,
        ];
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['error'],
                        'roles' => [
                            "@"
                        ],
                    ],
                    [
                        'allow' => true,
                        'roles' => [
                            UserRolesEnum::ROLE_ADMINISTRATOR,
                            UserRolesEnum::ROLE_MANAGER
                        ],
                    ],
                ],
            ],
        ];
    }
}
