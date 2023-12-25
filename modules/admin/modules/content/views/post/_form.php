<?php
/*
 *   Jamshidbek Akhlidinov
 *   25 - 12 2023 11:40:02
 *   https://github.com/JamshidbekAkhlidinov
*/

use alexantr\elfinder\InputFile;
use alexantr\tinymce\TinyMCE;
use app\modules\admin\repository\ModelRepository;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\admin\modules\content\forms\PostForm $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
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
                            <?= $form->field($model, 'description')->widget(
                                TinyMCE::class,
                                [
                                    'presetPath' => '@app/config/tinymce.php',
                                    'clientOptions' => [
                                        'height' => 300,
                                    ],
                                ]
                            ) ?>
                        </div>

                        <div class="col-md-12">
                            <?= $form->field($model, 'sub_text')->textarea(['maxlength' => true]) ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-body">

                    <div class="col-md-12">
                        <?= $form->field($model, 'status')->checkbox() ?>
                    </div>

                    <?= $form->field($model, 'categories')->checkboxList(
                        ModelRepository::getCateories(),
                    ) ?>

                    <?= $form->field($model, 'tags')->checkboxList(
                        ModelRepository::getTags(),
                    ) ?>

                </div>
            </div>

            <div class="card card-footer">
                <div class="form-group">
                    <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
                </div>
            </div>

        </div>

    </div>




    <?php ActiveForm::end(); ?>

</div>
