<?php
/*
 *   Jamshidbek Akhlidinov
 *   12 - 1 2024 22:3:10
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

/**
 * @var $formModel app\modules\admin\modules\landingElement\forms\ServiceForm
 * @var $this yii\web\View
 */

use alexantr\elfinder\InputFile;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = translate("Service form");
params()['breadcrumbs'][] = ['label' => translate("Landing Element"), 'url' => ['/admin/landingElement']];
params()['breadcrumbs'][] = ['label' => translate("Services"), 'url' => ['/admin/landingElement/service']];
params()['breadcrumbs'][] = $this->title;
?>

<div class="card">
    <div class="card-header">
        <h3><?= translate("Service form") ?></h3>
    </div>
    <div class="card-body">
        <?php
        $form = ActiveForm::begin();

        echo $form->field($formModel, 'logo')->widget(
            InputFile::class,
            [
                'clientRoute' => '/admin/file/default/input',
            ]
        );
        echo $form->field($formModel, 'title');
        echo $form->field($formModel, 'description');
        echo $form->field($formModel, 'url');

        echo Html::submitButton(
            translate("Save"),
            ['class' => 'btn btn-primary']
        );

        ActiveForm::end();
        ?>
    </div>
</div>



