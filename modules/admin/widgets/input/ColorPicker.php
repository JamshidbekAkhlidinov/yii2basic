<?php
/*
 *   Jamshidbek Akhlidinov
 *   25 - 12 2023 3:9:38
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\admin\widgets\input;


use app\modules\admin\widgets\input\assets\ColorPickerAsset;
use yii\helpers\Html;
use yii\widgets\InputWidget;

class ColorPicker extends InputWidget
{
    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub

        $js = <<<JS
        var classicPickrDemo = document.querySelectorAll(".classic-colorpicker");
        
        classicPickrDemo.forEach(function () {
        Pickr.create({
            el: ".classic-colorpicker",
            theme: "classic", // or 'monolith', or 'nano'
            default: "#405189",
            swatches: [
                "rgba(244, 67, 54, 1)",
                "rgba(233, 30, 99, 0.95)",
                "rgba(156, 39, 176, 0.9)",
                "rgba(103, 58, 183, 0.85)",
                "rgba(63, 81, 181, 0.8)",
                "rgba(33, 150, 243, 0.75)",
                "rgba(3, 169, 244, 0.7)",
                "rgba(0, 188, 212, 0.7)",
                "rgba(0, 150, 136, 0.75)",
                "rgba(76, 175, 80, 0.8)",
                "rgba(139, 195, 74, 0.85)",
                "rgba(205, 220, 57, 0.9)",
                "rgba(255, 235, 59, 0.95)",
                "rgba(255, 193, 7, 1)",
            ],
        
            components: {
                // Main components
                preview: true,
                opacity: true,
                hue: true,
        
                // Input / output Options
                interaction: {
                    hex: true,
                    rgba: true,
                    hsva: true,
                    input: true,
                    clear: true,
                    save: true,
                },
            },
        });
        });
        JS;

        $view = $this->getView();
        $view->registerJs($js);
        ColorPickerAsset::register($view);

        $this->options = [
            'class' => 'pcr-button',
            'aria-label' => "toggle color picker dialog classic-colorpicker",
        ];
    }

    protected function renderInputHtml($type)
    {
        if ($this->hasModel()) {
            return Html::activeInput($type, $this->model, $this->attribute, $this->options);
        }
        return Html::input($type, $this->name, $this->value, $this->options);
    }

    public function run()
    {
        return Html::tag(
            'div',
            $this->renderInputHtml('text'),
            [
                'class' => 'pickr'
            ]
        );
    }
}