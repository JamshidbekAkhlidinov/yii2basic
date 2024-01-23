<?php
/*
 *   Jamshidbek Akhlidinov
 *   12 - 1 2024 11:54:42
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

/**
 * @var $formModel app\modules\admin\modules\landingElement\forms\ServiceTitleForm
 * @var $this yii\web\View
 */

use alexantr\elfinder\InputFile;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = translate("Service Title Settings");
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
<div class="card" style="margin-top: -10px">
    <div class="card-header d-flex justify-content-between">
        <h3><?= translate("Service Title Settings") ?></h3>
    </div>
</div>
<?php $form = ActiveForm::begin(); ?>
<div class="row" style="margin-top: -10px">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <?php
                echo $form->field($formModel, 'title');
                ?>
                <?php
                echo $form->field($formModel, 'description')->textarea();
                ?>
                <?= Html::submitButton(
                        translate("Save"),
                        ['class' => 'btn btn-primary']
                    );
                ?>
            </div>

        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>


