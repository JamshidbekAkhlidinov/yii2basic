<?php
/*
 *   Jamshidbek Akhlidinov
 *   8 - 5 2025 12:9:27
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\admin\controllers;

use app\modules\admin\enums\UserRolesEnum;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;

class BaseController extends Controller
{
    public function beforeAction($action)
    {
        if (
            Yii::$app->controller->id === 'site' && in_array($action->id, ['error']) ||
            Yii::$app->errorHandler->exception !== null
        ) {
            return parent::beforeAction($action);
        }

        $permission = $this->module->id . '/' . $this->id . '/' . $action->id;
        $permission = str_replace('-', '', $permission);
        if (!Yii::$app->user->can($permission) && !Yii::$app->user->can(UserRolesEnum::ROLE_ADMINISTRATOR)) {
            throw new ForbiddenHttpException('Access denied.');
        }

        return parent::beforeAction($action);
    }

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }
}