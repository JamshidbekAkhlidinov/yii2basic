<?php
/*
 *   Jamshidbek Akhlidinov
 *   12 - 1 2024 11:48:13
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\admin\modules\landingElement\forms;


use app\modules\admin\enums\LandingElementEnum;
use app\modules\admin\modules\landingElement\base\LandingModel;

class CreateTitleForm extends LandingModel
{

    public $title;

    public $url;

    public function rules()
    {
        return [
            [['url', 'title'], 'required'],
        ];
    }

    public function dataRules(): array
    {
        return [
            [
                'key' => [
                    'key' => LandingElementEnum::CREATE_TITLE,
                ],
                'type' => self::TYPE_STRING,
                'attributes' => [
                    'title' => 'title',
                    'url' => 'url',
                ]
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => translate('Title'),
            'url' => translate('Url'),
        ];
    }

}