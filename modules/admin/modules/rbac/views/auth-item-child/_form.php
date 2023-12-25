<?php

use app\modules\admin\models\ModelToData;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\admin\modules\rbac\models\AuthItemChild $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="auth-item-child-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'parent')->dropDownList(
        ModelToData::getAuthItems(),
        [
            'prompt' => translate('--Select--')
        ]
    ) ?>

    <?= $form->field($model, 'child')->dropDownList(
        ModelToData::getAuthItems(),
        [
            'prompt' => translate('--Select--')
        ]
    ) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
