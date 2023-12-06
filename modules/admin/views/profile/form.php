<?php
/*
 *   Jamshidbek Akhlidinov
 *   5 - 12 2023 15:41:2
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov/yii2basic
 */

/**
 * @var $model app\modules\admin\forms\UserProfileForm
 */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

?>


<div class="card">
    <div class="card-body">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'password') ?>
        <?= $form->field($model, 'confirm_password') ?>

        <?= Html::submitButton(translate("Save"),['class'=>'btn btn-success']) ?>

        <?php ActiveForm::end(); ?>

    </div>
</div>