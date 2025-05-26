<?php
/*
 *   Jamshidbek Akhlidinov
 *   5 - 12 2023 15:41:2
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov/yii2basic
 */

/**
 * @var $model app\modules\admin\forms\ProfileForm
 * @var $password_form app\modules\admin\forms\UserProfileForm
 */

use alexantr\elfinder\InputFile;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\helpers\Url;

$js = <<<JS
$('#avatar_path_input').change(function (e){
    $('#avatar_path').attr('src', e.target.value);
})
JS;

$this->registerJs($js);
$this->title = translate("Update Profile Data");
Yii::$app->params['breadcrumbs'][] = translate("User");
Yii::$app->params['breadcrumbs'][] = $this->title;

?>

<div class="row pt-5">
    <div class="col-xxl-3">
        <div class="card mt-n5">
            <div class="card-body p-4">
                <div class="text-center">
                    <div class="profile-user position-relative d-inline-block mx-auto  mb-4 profile-img-path">
                        <img src="<?= $model->model->avatar ?>"
                             class="rounded-circle avatar-xl img-thumbnail user-profile-image" id="avatar_path"
                             alt="user-profile-image">
                    </div>
                    <h5 class="fs-16 mb-1"><?= user()->identity->publicIdentity ?></h5>
                    <p class="text-muted mb-0">Lead Designer / Developer</p>
                </div>
            </div>
        </div>

    </div>
    <!--end col-->
    <div class="col-xxl-9">
        <div class="card mt-xxl-n5">
            <div class="card-header">
                <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                            <i class="fa fa-home"></i> <?= translate("Personal Details") ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#changePassword" role="tab">
                            <i class="fa fa-user"></i> <?= translate("Change password") ?>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body p-4">
                <div class="tab-content">
                    <div class="tab-pane active" id="personalDetails" role="tabpanel">
                        <?php $form = ActiveForm::begin(); ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <?= $form->field($model, 'firstName') ?>

                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <?= $form->field($model, 'lastName') ?>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <?= $form->field($model, 'phone_number') ?>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <?= $form->field($model, 'email') ?>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <?= $form->field($model, 'birthday') ?>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <?= $form->field($model, 'username') ?>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <?php
                                    echo $form->field($model, 'avatar_path')->widget(
                                        InputFile::class,
                                        [
                                            'name' => 'avatar_path',
                                            'clientRoute' => '/admin/file/default/input',
                                            'filter' => ['image'],
                                            'id' => 'avatar_path_input',
                                        ]
                                    );
                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <?= Html::submitButton(translate("Save"), ['class' => 'btn btn-success']) ?>
                                    <button type="button" class="btn btn-soft-success">Cancel</button>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                        <?php ActiveForm::end(); ?>

                    </div>
                    <!--end tab-pane-->
                    <div class="tab-pane" id="changePassword" role="tabpanel">
                        <?php $form2 = ActiveForm::begin() ?>
                        <div class="row g-2">
                            <div class="col-lg-4">
                                <div>
                                    <?= $form2->field($password_form, 'old_password')->textInput(['placeholder' => translate("Enter current old password")]) ?>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-4">
                                <div>
                                    <?= $form2->field($password_form, 'password')->textInput(['placeholder' => translate("Enter new password")]) ?>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-4">
                                <div>
                                    <?= $form2->field($password_form, 'confirm_password')->textInput(['placeholder' => translate("Enter new confirm password")]) ?>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <a href="<?= Url::to('lost-password') ?>"
                                       class="link-primary text-decoration-underline">Forgot
                                        Password ?</a>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-12">
                                <div class="text-end">
                                    <?= Html::submitButton(translate("Change password"), ['class' => 'btn btn-success']) ?>
                                </div>
                            </div>

                            <!--end col-->
                        </div>
                        <!--end row-->
                        <?php ActiveForm::end() ?>
                        <div class="mt-4 mb-3 border-bottom pb-2">
                            <div class="float-end">
                                <a href="javascript:void(0);" class="link-primary"><?= translate("All Logout") ?></a>
                            </div>
                            <h5 class="card-title"><?= translate("Login History") ?></h5>
                        </div>

                        <div class="d-flex align-items-center mb-3">
                            <div class="flex-shrink-0 avatar-sm">
                                <div class="avatar-title bg-light text-primary rounded-3 fs-18">
                                    <i class="ri-smartphone-line"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6>iPhone 12 Pro</h6>
                                <p class="text-muted mb-0">Los Angeles, United States - March 16 at 2:47PM</p>
                            </div>
                            <div>
                                <a href="javascript:void(0);"><?= translate("Logout") ?></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end col-->
</div>
<!--end row-->


<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <script>document.write(new Date().getFullYear())</script>
                © Velzon.
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">
                    Design & Develop by Themesbrand
                </div>
            </div>
        </div>
    </div>
</footer>
