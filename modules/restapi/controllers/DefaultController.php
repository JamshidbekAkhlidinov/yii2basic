<?php
/*
 *   Jamshidbek Akhlidinov
 *   25 - 2 2024 16:21:19
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\restapi\controllers;

use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\Response;


/**
 * @SWG\Swagger(
 *     basePath="/",
 *     produces={"application/json"},
 *     consumes={"application/x-www-form-urlencoded"},
 *     @SWG\Info(version="1.0", title="Simple API"),
 * )
 */
class DefaultController extends Controller
{

    public function actions()
    {
        return [
            'docs' => [
                'class' => 'yii2mod\swagger\SwaggerUIRenderer',
                'restUrl' => Url::to(['default/json-schema']),
            ],
            'json-schema' => [
                'class' => 'yii2mod\swagger\OpenAPIRenderer',
                // Тhe list of directories that contains the swagger annotations.
                'scanDir' => [
                    Yii::getAlias('@app/modules/restapi'),
                    Yii::getAlias('@app/modules/restapi'),
                ],
            ],
        ];
    }

    public function actionError()
    {
        return [
            'error' => 'Error'
        ];
    }

    public function actionIndex()
    {
        //app()->response->statusCode = 404;
        return [
            'code' => 202,
            'message' => 'Rest api running',
        ];
    }

}