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

if (!function_exists('controller')) {
    function controller()
    {
        return \Yii::$app->controller;
    }
}

if (!function_exists('module')) {
    function module()
    {
        return \Yii::$app->controller->module;
    }
}

if (!function_exists('user')) {
    function user()
    {
        return \Yii::$app->user;
    }
}

if (!function_exists('authManager')) {
    function authManager()
    {
        return \Yii::$app->authManager;
    }
}


if (!function_exists('can')) {
    function can($permission)
    {
        return \Yii::$app->user->can($permission);
    }
}


if (!function_exists('translate')) {
    function translate($text, $options = []): string
    {
        return \Yii::t('app', $text, $options);
    }
}

if (!function_exists('security')) {
    function security()
    {
        return Yii::$app->getSecurity();
    }
}

if (!function_exists('post')) {
    function post($attribute = null)
    {
        return Yii::$app->request->post($attribute);
    }
}

if (!function_exists('get')) {
    function get($attribute = null)
    {
        return Yii::$app->request->get($attribute);
    }
}
