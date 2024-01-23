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

class ProjectForm extends LandingModel
{
    public $first_image;
    public $second_image;

    public $title;
    public $title2;

    public $description;
    public $description2;

    public $sub_text;
    public $sub_text2;

    public $url;

    public function rules()
    {
        return [
            [['title', 'title2'], 'required'],
            [['description','description2', 'sub_text', 'sub_text2', 'url'], 'string'],
        ];
    }

    public function dataRules(): array
    {
        return [
            [
                'key' => [
                    'key' => LandingElementEnum::DESIGN,
                ],
                'type' => self::TYPE_STRING,
                'attributes' => [
                    'title' => 'title',
                    'description' => 'description',
                    'sub_text' => 'sub_text',
                    'first_image' => 'files',
                    'url' => 'url',
                ]
            ],

            [
                'key' => [
                    'key' => LandingElementEnum::STRUCTURE,
                ],
                'type' => self::TYPE_STRING,
                'attributes' => [
                    'title2' => 'title',
                    'description2' => 'description',
                    'sub_text2' => 'sub_text',
                    'second_image' => 'icon',
                ]
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'first_image' => translate('Design Image'),
            'title' => translate('Title'),
            'description' => translate('Description'),
            'sub_text' => translate('Sub Text'),
            'url' => translate('Url'),
            'second_image' => translate('Structure Image'),
            'title2' => translate('Title'),
            'description2' => translate('Description'),
            'sub_text2' => translate('Sub Text'),
        ];
    }

}