<?php
/*
 *   Jamshidbek Akhlidinov
 *   25 - 12 2023 11:42:01
 *   https://github.com/JamshidbekAkhlidinov
*/

use alexantr\elfinder\InputFile;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
/** @var yii\web\View $this */
/** @var app\modules\admin\modules\content\models\PostCategory $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="post-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => 225]) ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'image')->widget(
                InputFile::class,
                [
                    'clientRoute' => '/admin/file/default/input',
                ]
            ) ?>
        </div>

        <div class="col-md-12">
            <?= $form->field($model, 'sub_text')->textarea(['maxlength' => true]) ?>
        </div>


        <div class="col-md-12 pt-2">
            <?= $form->field($model, 'status')->checkbox() ?>
        </div>

    </div>
    <div class="form-group pt-2">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
