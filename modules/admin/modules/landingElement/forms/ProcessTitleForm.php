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

class ProcessTitleForm extends LandingModel
{

    public $title;

    public $description;

    public function rules()
    {
        return [
            [['title'], 'required'],
            [['description'], 'string'],
        ];
    }

    public function dataRules(): array
    {
        return [
            [
                'key' => [
                    'key' => LandingElementEnum::PROCESS_TITLE,
                ],
                'type' => self::TYPE_STRING,
                'attributes' => [
                    'title' => 'title',
                    'description' => 'description',
                ]
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => translate('Title'),
            'description' => translate('Description'),
        ];
    }

}