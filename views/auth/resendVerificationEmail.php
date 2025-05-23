<?php
/*
 *   Jamshidbek Akhlidinov
 *   23 - 5 2025 17:36:18
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\forms\ResetPasswordForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\helpers\Url;

$this->title = translate('Resend verification email');
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
                                <p>Please fill out your email. A link to reset password will be sent there.</p>
                            </div>
                            <div class="p-2 mt-4">

                                <?php $form = ActiveForm::begin([
                                    'id' => 'resend-verification-email-form',
                                    'fieldConfig' => [
                                        'template' => "{label}\n{input}\n{error}",
                                        'labelOptions' => ['class' => 'form-label'],
                                        'inputOptions' => ['class' => 'form-control'],
                                        'errorOptions' => ['class' => 'invalid-feedback'],
                                    ],
                                ]); ?>

                                <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                                <div class="form-group">
                                    <?= Html::submitButton(translate('Send'), ['class' => 'btn btn-success  w-100']) ?>
                                </div>

                                <?php ActiveForm::end(); ?>

                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->

                    <div class="mt-4 text-center">
                        <p class="mb-0"><?= translate("Don't have an account ?") ?>
                            <a href="<?= Url::to(['auth/signup']) ?>"
                               class="fw-semibold text-primary text-decoration-underline">
                                <?= translate("Signup") ?>
                            </a>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>