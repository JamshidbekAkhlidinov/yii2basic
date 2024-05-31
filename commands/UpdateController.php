<?php
/*
 *   Jamshidbek Akhlidinov
 *   30 - 12 2023 9:34:57
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\commands;

use app\modules\admin\enums\LanguageEnum;
use app\modules\admin\forms\MessageForm;
use app\modules\admin\models\I18nSourceMessage;
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
        $url = "http://localhost:8080/telegram/bot?access_token=" . $token . "&XDEBUG_SESSION_START=1";

        $proxy = new Proxy($url, $token);
        $proxy->loop();
    }

    public function actionTranslate()
    {
        $path = \Yii::getAlias("@app/web/json/app.json");
        $file = file_get_contents($path);
        $array = json_decode($file, true);
        foreach ($array as $item) {
            $model = I18nSourceMessage::findOne(['category' => $item['category'], 'message' => $item['value']]);
            if (!$model) {
                $items = [];
                foreach (LanguageEnum::LABELS as $key => $label) {
                    $items[$key] = googleTranslate($item['value'], $key);
                }
                $form = new MessageForm(
                    new I18nSourceMessage(),
                    [
                        'category' => $item['category'],
                        'message' => $item['value'],
                        'items' => $items,
                    ]
                );
                echo $form->save();
                print_r($items);
                echo "\n";
            } else {
                echo $item['value'] . " -> exist\n";
            }
        }
    }
}