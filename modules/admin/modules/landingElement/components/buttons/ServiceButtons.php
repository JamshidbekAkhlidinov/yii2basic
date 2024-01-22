<?php
/*
 *   Jamshidbek Akhlidinov
 *   30 - 12 2023 22:37:35
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\admin\modules\landingElement\components\buttons;

use app\modules\admin\widgets\modal\ModalWidget;

class ServiceButtons
{

    public static function create()
    {
        return ModalWidget::widget([
            'button' => [
                'tag' => 'button',
                'class' => 'btn btn-success',
                'label' => icon('folder-add'),
            ],
            'url' => ['service/create'],
            'footer' => '',
            'header' => "<h2>" . translate("Service Form") . "</h2>"
        ]);
    }

    public static function update($text)
    {
        return ModalWidget::widget([
            'button' => [
                'tag' => 'span',
                'class' => '',
                'label' => $text,
                'options' => [
                    'style' => [
                        'cursor' => 'pointer'
                    ]
                ]
            ],
            'url' => ['service/update', 'name' => $text],
            'footer' => '',
            'header' => "<h2>" . translate("Service Update Form") . "</h2>"
        ]);
    }


}