<?php
/*
 *   Jamshidbek Akhlidinov
 *   25 - 2 2024 16:21:19
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\restapi\controllers;

use Yii;

class DefaultController extends BaseController
{

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

    public function actionSend()
    {
        return Yii::$app
            ->mailer
            ->compose()
            ->setFrom(["jamshidbekaxlidinovtatu@gmail.com" => Yii::$app->name . ' robot'])
            ->setTo('jamshidbekakhlidinov@gmail.com')
            ->setSubject('Subject of the email')
            ->setTextBody('Plain text content')
            ->setHtmlBody('<b>HTML content</b>')
            ->send();
    }

}