<?php
/*
 *   Jamshidbek Akhlidinov
 *   29 - 11 2023 17:26:12
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov/yii2basic
 */

if (!function_exists('app')) {
    function app()
    {
        return \Yii::$app;
    }
}

if (!function_exists('user')) {
    function user()
    {
        return \Yii::$app->user;
    }
}


if (!function_exists('translate')) {
    function translate($text, $options = []): string
    {
        return \Yii::t('app', $text, $options);
    }
}
