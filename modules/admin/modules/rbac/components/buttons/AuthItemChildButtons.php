<?php

namespace app\modules\admin\modules\rbac\components\buttons;

use app\modules\admin\widgets\modal\ModalWidget;

class AuthItemChildButtons
{
    public static function create()
    {
        return ModalWidget::widget([
           'button' => [
               'type' => "button",
               'class' => "btn btn-success",
               'label' => icon("folder-add"),
           ],
           'url' => ['auth-item-child/create'],
           'footer' => '',
           'header' => "<h2>" . translate('Auth Item Child Form') . "</h2>"
        ]);
    }

    public static function update($text)
    {
        return ModalWidget::widget([
            'button' => [
                'type' => 'span',
                'class' => '',
                'label' => $text,
                'options' => [
                    'style' => [
                        'cursor' => 'pointer'
                    ]
                ]
            ],
            'url' => ['auth-item-child/update', 'name' => $text],
            'footer' => '',
            'header' => "<h2>" . translate("Auth Item Child Update Form") . "</h2>"
        ]);
    }
}