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
use app\modules\admin\modules\landingElement\models\LandingElement;

class TeamForm extends LandingModel
{
    public LandingElement $element;

    public $avatar;

    public $full_name;

    public $level;

    public $email;

    public function rules()
    {
        return [
            [['avatar', 'full_name', 'email'], 'required'],
            [['level'], 'string'],
        ];
    }

    protected function getModel($params): LandingElement
    {
        return $this->element;
    }

    public function dataRules(): array
    {
        return [
            [
                'type' => self::TYPE_STRING,
                'attributes' => [
                    'full_name' => 'title',
                    'level' => 'description',
                    'avatar' => 'files',
                    'email' => 'url',
                ]
            ],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'avatar' => translate('Avatar'),
            'full_name' => translate('Full Name'),
            'level' => translate('Level'),
            'email' => translate('Email'),
        ];
    }

}