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

$this->title = translate("Header Title Settings");
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

<?php $form = ActiveForm::begin(); ?>

<div class="card" style="margin-top: -10px">
    <div class="card-header d-flex justify-content-between">
        <h3><?= translate("Header Title Settings") ?></h3>
        <p>
            <?= Html::submitButton(
                translate("Save"),
                ['class' => 'btn btn-primary']
            );
            ?>
        </p>
    </div>
</div>
<div class="row" style="margin-top: -10px">
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
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>


