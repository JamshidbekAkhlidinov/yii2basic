<?php
/*
 *   Jamshidbek Akhlidinov
 *   12 - 1 2024 11:54:42
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

/**
 * @var $formModel app\modules\admin\modules\landingElement\forms\HeaderForm
 * @var $this yii\web\View
 */

use alexantr\elfinder\InputFile;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = translate("Header settings");
params()['breadcrumbs'][] = ['label' => translate("Landing Element"), 'url' => ['/admin/landingElement']];
params()['breadcrumbs'][] = $this->title;

$js = <<<JS
$('#landing_logo_input').change(function (e){
    $('#landing_logo').attr('src', e.target.value);
})
JS;

$this->registerJs($js);

?>

<div class="card">
    <div class="card-header">
        <h3><?= translate("Header settings") ?></h3>
    </div>
</div>
<?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <?php
                echo $form->field($formModel, 'title');
                echo $form->field($formModel, 'description');
                ?>
            </div>
        </div>
    </div>

    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <?= alexantr\elfinder\InputFile::widget([
                    'name' => 'attributeName',
                    'clientRoute' => '/admin/file/default/input',
                    'filter' => ['image'],
                    'preview' => function ($value) {
                        return yii\helpers\Html::img($value, ['width' => 200]);
                    },
                ]) ?>
                <?php
                echo Html::submitButton(
                    translate("Save"),
                    ['class' => 'btn btn-primary mt-2']
                );
                ?>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>


