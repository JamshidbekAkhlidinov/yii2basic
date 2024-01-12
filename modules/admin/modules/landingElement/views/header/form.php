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
?>

<div class="card">
    <div class="card-header">
        <h3><?= translate("Header settings") ?></h3>
    </div>
    <div class="card-body">
        <?php
        $form = ActiveForm::begin();

        echo $form->field($formModel, 'logo')->widget(
            InputFile::class,
            [
                'clientRoute' => '/admin/file/default/input',
                'options' => [
                    'id' => 'post_image_input',
                ]
            ]
        );
        echo $form->field($formModel, 'title');
        echo $form->field($formModel, 'description');

        echo Html::submitButton(
            translate("Save"),
            ['class' => 'btn btn-primary']
        );

        ActiveForm::end();
        ?>
    </div>
</div>



