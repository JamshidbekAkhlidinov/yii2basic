<?php
/*
 *   Jamshidbek Akhlidinov
 *   12 - 1 2024 11:54:42
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

/**
 * @var $formModel app\modules\admin\modules\landingElement\forms\HeaderTitleForm
 * @var $this yii\web\View
 */

use alexantr\elfinder\InputFile;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = translate("Header Title settings");
params()['breadcrumbs'][] = ['label' => translate("Landing Element"), 'url' => ['/admin/landingElement']];
params()['breadcrumbs'][] = $this->title;

$js = <<<JS
$('#header_title_background_input').change(function (e){
    $('#header_title_background').attr('src', e.target.value);
    console.log(e.target.value);
})
JS;
$this->registerJs($js, \yii\web\View::POS_END);
?>
<div class="card">
    <div class="card-header">
        <h3><?= translate("Header Title settings") ?></h3>
    </div>
</div>
<?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <?php
                echo $form->field($formModel, 'title');
                echo $form->field($formModel, 'description')->textarea();
                ?>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-header d-flex flex-column">
                <?php
                echo $form->field($formModel, 'background')->widget(
                    InputFile::class,
                    [
                        'clientRoute' => '/admin/file/default/input',
                        'options' => [
                            'id' => 'header_title_background_input',
                        ]
                    ]
                );
                echo Html::img($formModel->background, [
                    'width' => 130,
                    'id' => "header_title_background",
                ]);
                ?>
                <div>
                    <?= Html::submitButton(
                        translate("Save"),
                        ['class' => 'btn btn-primary mt-2']
                    );
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>


