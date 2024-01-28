<?php
/*
 *   Jamshidbek Akhlidinov
 *   12 - 1 2024 11:54:42
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

/**
 * @var $formModel app\modules\admin\modules\landingElement\forms\WidgetsForm
 * @var $this yii\web\View
 */

use alexantr\elfinder\InputFile;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = translate("Widget Config");
params()['breadcrumbs'][] = ['label' => translate("Landing Element"), 'url' => ['/admin/landingElement']];
params()['breadcrumbs'][] = $this->title;

$js = <<<JS
$('#widget_image_input').change(function (e){
    $('#widget_image').attr('src', e.target.value);
    console.log(e.target.value);
})

$('#widget_icon_input').change(function (e){
    $('#widget_icon').attr('src', e.target.value);
    console.log(e.target.value);
})
JS;
$this->registerJs($js, \yii\web\View::POS_END);
?>

<?php $form = ActiveForm::begin(); ?>

<div class="card" style="margin-top: -10px">
    <div class="card-header d-flex justify-content-between">
        <h3><?= translate("Widget Config") ?></h3>
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
                echo $form->field($formModel, 'sub_text');
                echo $form->field($formModel, 'description')->textarea(['rows' => 5]);
                ?>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-header d-flex flex-column">
                <?php
                echo $form->field($formModel, 'image')->widget(
                    InputFile::class,
                    [
                        'clientRoute' => '/admin/file/default/input',
                        'options' => [
                            'id' => 'widget_image_input',
                        ]
                    ]
                );
                echo Html::img($formModel->image, [
                    'width' => 130,
                    'id' => "widget_image",
                ]);
                ?>

                <?php
                echo $form->field($formModel, 'icon')->widget(
                    InputFile::class,
                    [
                        'clientRoute' => '/admin/file/default/input',
                        'options' => [
                            'id' => 'widget_icon_input',
                        ]
                    ]
                );
                echo Html::img($formModel->icon, [
                    'width' => 130,
                    'id' => "widget_icon",
                ]);
                ?>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>


