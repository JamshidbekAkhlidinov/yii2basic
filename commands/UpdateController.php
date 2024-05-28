<?php
/*
 *   Jamshidbek Akhlidinov
 *   30 - 12 2023 9:34:57
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\commands;

use yii\console\Controller;

class UpdateController extends Controller
{
    /**
     * @throws \Exception
     */
    public function actionIndex()
    {
        $bot_api_key = env('BOT_TOKEN');
        $url = 'http://localhost:8080/telegram/bot';
        $proxy = new \ziya\Proxy\ProxyLoop($bot_api_key, $url);
        $proxy->loop(1, true, true);
    }
}