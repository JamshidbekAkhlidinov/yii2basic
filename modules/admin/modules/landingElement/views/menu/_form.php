<?php
/*
 *   Jamshidbek Akhlidinov
 *   13 - 02 2024 12:05:38
 *   https://github.com/JamshidbekAkhlidinov
*/

use alexantr\elfinder\InputFile;
use app\modules\admin\enums\MenuLabelView;
use app\modules\admin\enums\PositionMenuEnum;
use app\modules\admin\enums\TypeEnum;
use app\modules\admin\models\ModelToData;
use app\modules\admin\modules\landingElement\models\DataToArray;
use kartik\depdrop\DepDrop;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\modules\admin\modules\landingElement\forms\MenuForm $model */
/** @var yii\widgets\ActiveForm $form */

$js = <<<JS
$("#type").on('change', function () {
    var type_id = $(this).val();
    if (type_id === 2000) {
        $(".item2-select2").css(
            'display', 'block'
        );
        $("#w0 > div.row > div.col-md-8 > div > div > div:nth-child(4)").css(
            'display', 'none'
        );
    } else {
        $(".item2-select2").css(
            'display', 'none'
        );
        $("#w0 > div.row > div.col-md-8 > div > div > div:nth-child(4)").css(
            'display', 'block'
        );
    }
});
JS;

$this->registerJs($js);
?>

<div class="menu-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row my-4">
        <div class="col-4">
<!--            <div class="d-flex justify-content-between">-->
                <?= $form->field($model, 'type')->radioList(
                    array_map(
                        function ($label) {
                            return translate($label);
                        },
                        TypeEnum::LABELS, [
                            'id' => 'type',
                        ]
                    ),
                    [
                        'style' => 'display: flex; justify-content: start; gap: 13px;',
                    ],

                )->label(false); ?>
<!--            </div>-->
        </div>
        <div class="col-2 d-flex align-items-center">
            <?= $form->field($model, 'status')->checkbox() ?>

        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color: #e9e9e9">
                    <h4><?= translate("Main menu information") ?></h4>
                </div>
                <div class="card-body">

                    <?= $form->field($model, 'name') ?>

                    <?= $form->field($model, 'item[]')->widget(DepDrop::class,[
                        'data' => !empty($model->type) ? DataToArray::getListMenu($model->type) : [],
                        'options' => [
                            'prompt' => Yii::t('app', '--Select--'),
                            'class' => 'item-select2',
                        ],
                        'pluginOptions' => [
                            'depends' => ['type'],
                            'placeholder' => Yii::t('app', '--Select--'),
                            'url' => Url::to(['/landingPage/menu/list'])
                        ],
                        'type' => DepDrop::TYPE_SELECT2,
                        'select2Options' => [
                            'options' => [
                                'multiple' => true
                            ],
                            'pluginOptions' => [
                                'allowClear' => true
                            ]
                        ],
                    ]) ?>

                    <?php echo $form->field($model, 'item[]')->textInput(
                        [
                            'style' => 'display:none',
                            'class' => 'item2-select2 form-control',
                        ]
                    )->label(false) ?>
                    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header" style="background-color: #e9e9e9">
                    <h4><?= translate("Other settings") ?></h4>
                </div>
                <div class="card-body">
                    <?= $form->field($model, 'position_menu')->dropDownList(PositionMenuEnum::LABELS) ?>
                    <?= $form->field($model, 'parent_id')->textInput() ?>
                    <?= $form->field($model, 'order')->textInput() ?>
                    <?= $form->field($model, 'label_position')->dropDownList(MenuLabelView::LABELS) ?>
                    <?= $form->field($model, 'icon')->widget(
                        InputFile::class,
                        [
                            'clientRoute' => '/admin/file/default/input',
                            'options' => [
                                'id' => 'menu_icon_input',
                            ]
                        ]
                    ); ?>


                </div>
            </div>

        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
