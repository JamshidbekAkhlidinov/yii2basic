<?php
/*
 *   Jamshidbek Akhlidinov
 *   30 - 12 2023 22:37:35
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\admin\modules\landingElement\components\buttons;

use app\modules\admin\widgets\modal\ModalWidget;

class PartnerButtons
{

    public static function create()
    {
        return ModalWidget::widget([
            'button' => [
                'tag' => 'button',
                'class' => 'btn btn-success',
                'label' => icon('folder-add'),
            ],
            'url' => ['partner/create'],
            'footer' => '',
            'header' => "<h2>" . translate("Partner Form") . "</h2>"
        ]);
    }

    public static function update($id, $text)
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
            'url' => ['partner/update', 'id' => $id],
            'footer' => '',
            'header' => "<h2>" . translate("Partner Update Form") . "</h2>"
        ]);
    }


}