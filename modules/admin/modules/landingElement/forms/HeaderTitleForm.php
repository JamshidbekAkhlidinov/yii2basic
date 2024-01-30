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

class HeaderTitleForm extends LandingModel
{
    public $background;

    public $title;

    public $description;

    public $service_title;
    public $service_description;
    public $widget_title;
    public $widget_description;
    public $widget_image;
    public $widget_sub_text;
    public $widget_icon;
    public $create_title;
    public $create_url;
    public $process_title;
    public $process_description;

    public function rules()
    {
        return [
            [['background', 'title', 'service_title', 'widget_title', 'create_title', 'process_title'], 'required'],
            [['description', 'service_description', 'widget_description', 'widget_sub_text', 'create_url', 'process_description'], 'string'],
            [['widget_image', 'widget_icon'], 'safe']
        ];
    }

    public function dataRules(): array
    {
        return [
            [
                'key' => [
                    'key' => LandingElementEnum::HEADER_TITLE,
                ],
                'type' => self::TYPE_STRING,
                'attributes' => [
                    'title' => 'title',
                    'description' => 'description',
                    'background' => 'files',
                ]
            ],
            # Service Title
            [
                'key' => [
                    'key' => LandingElementEnum::SERVICE_TITLE,
                ],
                'type' => self::TYPE_STRING,
                'attributes' => [
                    'service_title' => 'title',
                    'service_description' => 'description',
                ]
            ],
            # Widget
            [
                'key' => [
                    'key' => LandingElementEnum::WIDGETS,
                ],
                'type' => self::TYPE_STRING,
                'attributes' => [
                    'widget_title' => 'title',
                    'widget_description' => 'description',
                    'widget_image' => 'files',
                    'widget_sub_text' => 'sub_text',
                    'widget_icon' => 'icon'
                ]
            ],

            # Create title
            [
                'key' => [
                    'key' => LandingElementEnum::CREATE_TITLE,
                ],
                'type' => self::TYPE_STRING,
                'attributes' => [
                    'create_title' => 'title',
                    'create_url' => 'url',
                ]
            ],

            #Process Title
            [
                'key' => [
                    'key' => LandingElementEnum::PROCESS_TITLE,
                ],
                'type' => self::TYPE_STRING,
                'attributes' => [
                    'process_title' => 'title',
                    'process_description' => 'description',
                ]
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'logo' => translate('Background'),
            'title' => translate('Title'),
            'description' => translate('Description'),
            # Service Title
            'service_title' => translate(""),
            'service_description' => translate(""),
            # Widget
            'widget_title' => translate(""),
            'widget_description' => translate(""),
            'widget_sub_text' => translate(""),
            'widget_image' => translate(""),
            'widget_icon' => translate(""),
            # Create Title
            'create_title' => translate(""),
            'create_url' => translate(""),
            # Process Title
            'process_title' => translate(""),
            'process_description' => translate(""),
        ];
    }

}