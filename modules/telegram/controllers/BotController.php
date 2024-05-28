<?php
/*
 *   Jamshidbek Akhlidinov
 *   30 - 12 2023 9:23:45
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\telegram\controllers;


use yii\web\Controller;
use yii\web\Response;
use zafarjonovich\Telegram\BotApi;
use zafarjonovich\Telegram\Keyboard;
use zafarjonovich\Telegram\update\Update;

class BotController extends Controller
{
    public $enableCsrfValidation = false;


    public function actionIndex()
    {
        app()->response->format = Response::FORMAT_JSON;


        $bot = new BotApi(env('BOT_TOKEN'));
        $data = $bot->getWebHookUpdate();
        $update = new Update($data);

        try {
            if ($update->isMessage()) {
                $message = $update->getMessage();
                $message_id = $message->getMessageId();
                $user = $message->getFrom();
                $text = $message->isText() ? $message->getText() : '';

                if ($text && $user->getId()) {
                    $user_id = $user->getId();

                    if ($text == '/start') {
                        $bot->sendMessage(
                            $user_id,
                            'Hello! I am your bot. I can help you to send messages to your friends.'
                        );
                    } else {

                        $bot->sendMessage(
                            $user_id,
                            "<code>" . json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . "</code>",
                            [
                                'parse_mode' => 'html',
                            ]
                        );
                    }
                }
            }


            if (isset($data['message']) && $message = $data['message']) {

                if (isset($message['poll']) && $poll = $message['poll']) {

                    $buttons = $poll['options'];
                    $question = $poll['question'];
                    $id = $poll['id'];
                    $keyboard = new Keyboard();
                    foreach ($buttons as $number => $button) {
                        $keyboard->addCallbackDataButton(
                            $button['text'] . ' - ' . $button['voter_count'],
                            "key_" . $id . '_' . $number,
                        );
                        $keyboard->newRow();
                    }

                    $bot->sendMessage(
                        $message['from']['id'],
                        $question,
                        [
                            'parse_mode' => 'html',
                            'reply_markup' => $keyboard->init(),
                        ]
                    );


                }

            }

        } catch (\Exception $e) {
            print_r($e->getMessage());
        }

        return "OK";
    }
}