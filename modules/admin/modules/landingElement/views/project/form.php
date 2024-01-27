<?php
/*
 *   Jamshidbek Akhlidinov
 *   12 - 1 2024 11:54:42
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

/**
 * @var $formModel app\modules\admin\modules\landingElement\forms\ProjectForm
 * @var $this yii\web\View
 */

use alexantr\elfinder\InputFile;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = translate("Project Config");
params()['breadcrumbs'][] = ['label' => translate("Landing Element"), 'url' => ['/admin/landingElement']];
params()['breadcrumbs'][] = $this->title;

$js = <<<JS
$('#first_image_input').change(function (e){
    $('#first_image').attr('src', e.target.value);
    console.log(e.target.value);
})

$('#second_image_input').change(function (e){
    $('#second_image').attr('src', e.target.value);
    console.log(e.target.value);
})
JS;
$this->registerJs($js, \yii\web\View::POS_END);
?>

<?php $form = ActiveForm::begin(); ?>

<div class="card" style="margin-top: -10px">
    <div class="card-header d-flex justify-content-between">
        <h3><?= translate("Project Config") ?></h3>
        <p>
            <?= Html::submitButton(
                translate("Save"),
                ['class' => 'btn btn-primary']
            );
            ?>
        </p>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4><?= translate("Design") ?></h4>
    </div>
    <div class="card-body">
        <div class="row" style="margin-top: -10px">
            <div class="col-6">
                <?php
                echo $form->field($formModel, 'title');
                echo $form->field($formModel, 'description')->textarea(['rows' => 6]);
                echo $form->field($formModel, 'url');
                ?>
            </div>
            <div class="col-6">
                <div>
                    <?php echo $form->field($formModel, 'icon') ?>
                </div>
                <div>
                    <?php echo $form->field($formModel, 'sub_text')->textarea(['rows' => 3]); ?>
                </div>
                <div class="d-flex flex-column">
                    <?php
                    echo $form->field($formModel, 'first_image')->widget(
                        InputFile::class,
                        [
                            'clientRoute' => '/admin/file/default/input',
                            'options' => [
                                'id' => 'first_image_input',
                            ]
                        ]
                    );
                    echo Html::img($formModel->first_image, [
                        'width' => 130,
                        'id' => "first_image",
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4><?= translate("Structure") ?></h4>
    </div>
    <div class="card-body">
        <div class="row" style="margin-top: -10px">
            <div class="col-6">
                <?php
                echo $form->field($formModel, 'title2');
                echo $form->field($formModel, 'description2')->textarea(['rows' => 6]);
                ?>
            </div>
            <div class="col-6">
                <div>
                    <?php echo $form->field($formModel, 'icon2') ?>
                </div>
                <div>
                    <?php echo $form->field($formModel, 'sub_text2')->textarea(['rows' => 3]); ?>
                </div>
                <div class="d-flex flex-column">
                    <?php
                    echo $form->field($formModel, 'second_image')->widget(
                        InputFile::class,
                        [
                            'clientRoute' => '/admin/file/default/input',
                            'options' => [
                                'id' => 'second_image_input',
                            ]
                        ]
                    );
                    echo Html::img($formModel->second_image, [
                        'width' => 130,
                        'id' => "second_image",
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>


