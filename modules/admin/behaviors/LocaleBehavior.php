<?php
/*
 *   Jamshidbek Akhlidinov
 *   24 - 12 2023 0:57:7
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\admin\behaviors;

use app\modules\admin\enums\LanguageEnum;
use Yii;
use yii\base\Behavior;
use yii\web\Application;

/**
 * Class LocaleBehavior
 * @package common\behaviors
 */
class LocaleBehavior extends Behavior
{
    /**
     * @var string
     */
    public $cookieName = '_locale';

    /**
     * @var bool
     */
    public $enablePreferredLanguage = true;

    /**
     * @return array
     */
    public function events()
    {
        return [
            Application::EVENT_BEFORE_REQUEST => 'beforeRequest'
        ];
    }

    /**
     * Resolve application language by checking user cookies, preferred language and profile settings
     */
    public function beforeRequest()
    {
        $hasCookie = Yii::$app->getRequest()->getCookies()->has($this->cookieName);
        $forceUpdate = Yii::$app->session->hasFlash('forceUpdateLocale');
        if ($hasCookie && !$forceUpdate) {
            $locale = Yii::$app->getRequest()->getCookies()->getValue($this->cookieName);
        } else {
            $locale = $this->resolveLocale();
        }
        Yii::$app->language = $locale;
    }

    public function resolveLocale()
    {
//        $locale = Yii::$app->language;
//
//        if (!Yii::$app->user->isGuest && Yii::$app->user->locale) {
//            $locale = Yii::$app->user->locale;
//        } elseif ($this->enablePreferredLanguage) {
//            $locale = Yii::$app->request->getPreferredLanguage($this->getAvailableLocales());
//        }

        return Yii::$app->request->getPreferredLanguage($this->getAvailableLocales());
    }

    /**
     * @return array
     */
    protected function getAvailableLocales()
    {
        return array_keys(LanguageEnum::LABELS);
    }
}