<?php
/*
 *   Jamshidbek Akhlidinov
 *   23 - 5 2025 17:36:18
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\forms\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = translate('Login');
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
                                <h5 class="text-primary"><?= translate("Welcome Back!") ?></h5>
                            </div>
                            <div class="p-2 mt-4">

                                <?php $form = ActiveForm::begin([
                                    'id' => 'login-form',
                                    'fieldConfig' => [
                                        'template' => "{label}\n{input}\n{error}",
                                        'labelOptions' => ['class' => 'form-label'],
                                        'inputOptions' => ['class' => 'form-control'],
                                        'errorOptions' => ['class' => 'invalid-feedback'],
                                    ],
                                ]); ?>

                                <?= $form->field($model, 'username')->textInput(['placeholder' => translate("Enter username")]) ?>

                                <?= $form->field($model, 'password')->passwordInput(['placeholder' => translate("Enter password")]) ?>

                                <?= $form->field($model, 'rememberMe')->checkbox([
                                    'template' => "<div class=\"form-check\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
                                ]) ?>

                                <div class="my-1 mx-0" style="color:#999;">
                                    <?= translate(
                                        "If you forgot your password you can {reset it}",
                                        [
                                            'reset it' => Html::a(translate('reset it'), ['auth/request-password-reset'])
                                        ]
                                    ) ?>
                                    <br>
                                    <?= translate("Need new verification email? ") ?>
                                    <?= Html::a(translate('Resend'), ['auth/resend-verification-email']) ?>
                                </div>

                                <div class="mt-4">
                                    <button class="btn btn-success w-100"
                                            type="submit"><?= translate("Sign In") ?></button>
                                </div>


                                <div class="mt-4 text-center">
                                    <div class="signin-other-title">
                                        <h5 class="fs-13 mb-4 title"><?= translate("Sign In with") ?></h5>
                                    </div>
                                    <div>

                                        <?= yii\authclient\widgets\AuthChoice::widget([
                                            'baseAuthUrl' => ['auth/auth'],
                                            'popupMode' => false,
                                            'options' => [
                                                'style' => 'display: flex;    justify-content: center;'
                                            ]
                                        ]) ?>

                                    </div>
                                </div>

                                <?php ActiveForm::end() ?>

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
