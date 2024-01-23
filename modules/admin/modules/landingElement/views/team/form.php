<?php
/*
 *   Jamshidbek Akhlidinov
 *   12 - 1 2024 22:3:10
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

/**
 * @var $formModel app\modules\admin\modules\landingElement\forms\TeamForm
 * @var $this yii\web\View
 */

use alexantr\elfinder\InputFile;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = translate("Team form");
params()['breadcrumbs'][] = ['label' => translate("Landing Element"), 'url' => ['/admin/landingElement']];
params()['breadcrumbs'][] = ['label' => translate("Team"), 'url' => ['/admin/landingElement/team']];
params()['breadcrumbs'][] = $this->title;

$js = <<<JS
$('#team_member_avatar_input').change(function (e){
    $('#team_member_avatar').attr('src', e.target.value);
    console.log(e.target.value);
})
JS;
$this->registerJs($js, \yii\web\View::POS_END);
?>

<div>
        <?php $form = ActiveForm::begin(); ?>

        <div class="row">
            <div class="col-md-6">
                <?= $form->field($formModel, 'full_name') ?>
            </div>

            <div class="col-md-6">
                <?= $form->field($formModel, 'level'); ?>
            </div>

            <div class="col-md-6">
                <?= $form->field($formModel, 'email'); ?>
            </div>

            <div class="col-md-3">
                <?= $form->field($formModel, 'avatar')->widget(
                    InputFile::class,
                    [
                        'clientRoute' => '/admin/file/default/input',
                        'options' => [
                            'id' => 'team_member_avatar_input',
                        ]
                    ]
                ); ?>
            </div>
            <div class="col-md-3">
                <div class="avatar mx-auto bg-white">
                    <?= Html::img(
                        $formModel->element->isNewRecord ?
                            Yii::getAlias('@web/images/avatar.jpg') :
                            $formModel->avatar,
                        [
                            'width' => 100,
                            'id' => "team_member_avatar",
                            'class' => 'rounded-circle avatar-lg img-fluid',
                            'style' => [
                                'object-fit' => 'cover'
                            ]
                        ]
                    ); ?>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <?= Html::submitButton(
                translate("Save"),
                ['class' => 'btn btn-primary']
            ); ?>
        </div>

        <?php ActiveForm::end(); ?>
</div>



