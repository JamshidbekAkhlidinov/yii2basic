<?php
/*
 *   Jamshidbek Akhlidinov
 *   12 - 1 2024 11:54:42
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

/**
 * @var $formModel app\modules\admin\modules\landingElement\forms\CreateTitleForm
 * @var $this yii\web\View
 */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = translate("Create Title settings");
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
        <h3><?= translate("Create Title settings") ?></h3>
    </div>
</div>
<?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <?php
                echo $form->field($formModel, 'title');
                ?>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <?php echo $form->field($formModel, 'url'); ?>
            </div>
        </div>
    </div>
    <div class="col-2">
        <div class="card">
            <?= Html::submitButton(
                translate("Save"),
                ['class' => 'btn btn-primary mt-2']
            );
            ?>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>


