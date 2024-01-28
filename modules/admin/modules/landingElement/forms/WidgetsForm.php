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

class WidgetsForm extends LandingModel
{
    public $image;

    public $title;

    public $description;

    public $sub_text;

    public $icon;

    public function rules()
    {
        return [
            [['image', 'title'], 'required'],
            [['description', 'sub_text', 'icon'], 'string'],
        ];
    }

    public function dataRules(): array
    {
        return [
            [
                'key' => [
                    'key' => LandingElementEnum::WIDGETS,
                ],
                'type' => self::TYPE_STRING,
                'attributes' => [
                    'title' => 'title',
                    'description' => 'description',
                    'image' => 'files',
                    'sub_text' => 'sub_text',
                    'icon' => 'icon'
                ]
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'logo' => translate('Logo'),
            'title' => translate('Title'),
            'description' => translate('Description'),
            'sub_text' => translate("Sub Text"),
            'icon' => translate("Icon"),
        ];
    }

}