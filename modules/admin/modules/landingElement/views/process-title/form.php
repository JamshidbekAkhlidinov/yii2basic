<?php
/*
 *   Jamshidbek Akhlidinov
 *   12 - 1 2024 11:54:42
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

/**
 * @var $formModel app\modules\admin\modules\landingElement\forms\ProcessTitleForm
 * @var $this yii\web\View
 */

use alexantr\elfinder\InputFile;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = translate("Process Title Settings");
params()['breadcrumbs'][] = ['label' => translate("Landing Element"), 'url' => ['/admin/landingElement']];
params()['breadcrumbs'][] = $this->title;
?>
<div class="card" style="margin-top: -10px">
    <div class="card-header d-flex justify-content-between">
        <h3><?= translate("Process Title Settings") ?></h3>
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
                echo $form->field($formModel, 'description')->textarea(['rows' => 4]);
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


