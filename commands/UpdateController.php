<?php
/*
 *   Jamshidbek Akhlidinov
 *   30 - 12 2023 9:34:57
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\commands;

use ustadev\telegram\proxy\Proxy;
use yii\console\Controller;

class UpdateController extends Controller
{
    /**
     * @throws \Exception
     */
    public function actionBot()
    {
        $token = env('BOT_TOKEN');
        $url = "http://localhost:8080/telegram/bot?access_token=" . $token."&XDEBUG_SESSION_START=1";

        $proxy = new Proxy($url, $token);
        $proxy->loop();
    }
}