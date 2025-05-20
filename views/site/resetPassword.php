<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\ResetPasswordForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Reset password';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-page-wrapper pt-5">
    <div class="auth-page-content">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card mt-4">

                        <div class="card-body p-4">
                            <div class="text-center mt-2">
                                <h5 class="text-primary"><?= Html::encode($this->title) ?></h5>
                                <p>Please choose your new password:</p>
                            </div>
                            <div class="p-2 mt-4">

                                <?php $form = ActiveForm::begin([
                                    'id' => 'reset-password-form',
                                    'fieldConfig' => [
                                        'template' => "{label}\n{input}\n{error}",
                                        'labelOptions' => ['class' => 'form-label'],
                                        'inputOptions' => ['class' => 'form-control'],
                                        'errorOptions' => ['class' => 'invalid-feedback'],
                                    ],
                                ]); ?>

                                <?= $form->field($model, 'password')->passwordInput(['autofocus' => true]) ?>

                                <div class="form-group">
                                    <?= Html::submitButton(translate('Save'), ['class' => 'btn btn-success  w-100']) ?>
                                </div>

                                <?php ActiveForm::end(); ?>

                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
            </div>
        </div>
    </div>
</div>