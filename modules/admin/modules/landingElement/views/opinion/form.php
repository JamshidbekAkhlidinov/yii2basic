<?php
/*
 *   Jamshidbek Akhlidinov
 *   12 - 1 2024 11:54:42
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

/**
 * @var $formModel app\modules\admin\modules\landingElement\forms\OpinionForm
 * @var $this yii\web\View
 */

use alexantr\elfinder\InputFile;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = translate("Opinion Config");
params()['breadcrumbs'][] = ['label' => translate("Landing Element"), 'url' => ['/admin/landingElement']];
params()['breadcrumbs'][] = $this->title;

?>

<?php $form = ActiveForm::begin(); ?>

<div class="card" style="margin-top: -10px">
    <div class="card-header d-flex justify-content-between">
        <h3><?= translate("Opinion Config") ?></h3>
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
    <div class="card-body">
        <div class="row" style="margin-top: -10px">
            <div class="col-6">
                <?php echo $form->field($formModel, 'name'); ?>
            </div>
            <div class="col-6">
                <?php echo $form->field($formModel, 'sub_text'); ?>
            </div>
            <div class="col-6">
                <?php echo $form->field($formModel, 'description')->textarea(['rows' => 8]); ?>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>


