<?php
/*
 *   Jamshidbek Akhlidinov
 *   25 - 12 2023 3:19:16
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */


use app\modules\admin\widgets\input\ColorPicker;
use app\modules\admin\widgets\input\FlatPicker;
use yii\bootstrap5\ActiveForm;

$activeForm = ActiveForm::begin();

echo $activeForm->field($form, 'date')->widget(FlatPicker::class,[
    'dataRangeDate' => true,
]);

echo $activeForm->field($form, 'color')->widget(ColorPicker::class);