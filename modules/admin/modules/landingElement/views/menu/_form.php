<?php
/*
 *   Jamshidbek Akhlidinov
 *   13 - 02 2024 12:05:38
 *   https://github.com/JamshidbekAkhlidinov
*/

use alexantr\elfinder\InputFile;
use app\modules\admin\enums\MenuLabelView;
use app\modules\admin\enums\PositionMenuEnum;
use app\modules\admin\enums\StatusEnum;
use app\modules\admin\enums\TypeEnum;
use app\modules\admin\modules\landingElement\models\DataToArray;
use kartik\depdrop\DepDrop;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\modules\admin\modules\landingElement\forms\MenuForm $model */
/** @var yii\widgets\ActiveForm $form */

$js = <<<JS
$('#type-radio-list input[type="radio"]').change(function() {
    // 'item-dep-drop' ID'siga ega DepDrop widgeti
    var depdrop = $('#item-dep-drop');
    
    // Form elementlarining qiymatlarini to'g'irlash
    var typeValue = $(this).val();
    
    // DepDrop widgetini yangilash
    depdrop.depdrop('disable');
    depdrop.val(null).trigger('change');
    depdrop.depdrop('enable');
    depdrop.depdrop('refresh', {params: {type: typeValue}});
});

// 'item-dep-drop' ID'siga ega DepDrop widgeti uchun onchange funksiyasi
$('#item-dep-drop').change(function() {
    // Form elementining qiymatini olish
    var value = $(this).val();
    
    // Agar qiymatlar bo'sh bo'lsa, yoki qiymatlar massiv bo'lsa, 'item2-select2' ID'siga ega elementni ko'rsatish
    if (!value || value instanceof Array && value.length === 0) {
        $('#item2-select2').show();
    } else {
        $('#item2-select2').hide();
    }
});
JS;

$this->registerJs($js);

if ($model->model->isNewRecord) {
    $model->status = StatusEnum::ACTIVE;
}
?>

<div class="menu-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row my-4">
        <div class="col-4">
            <div class="d-flex justify-content-between">
                <!--                --><?php //echo $form->field($model, 'type')->dropdownList(TypeEnum::LABELS,
                //                    [
                //                        'prompt' => Yii::t('app', '--Select--'),
                //                        'id' => 'type',
                //                    ]
                //                ) ?>
                <?= $form->field($model, 'type')->radioList(
                    array_map(
                        function ($label) {
                            return translate($label);
                        },
                        TypeEnum::LABELS, [
                        ]
                    ),
                    [
                        'id' => 'type-radio-list',
                        'style' => 'display: flex; justify-content: start; gap: 13px;',
                        'encode' => false, // Bu parametrni qo'shib ko'rsating
                    ]

                )->label(false); ?>
            </div>
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

                    <?= $form->field($model, 'item')->widget(DepDrop::class, [
                        'data' => !empty($model->type) ? DataToArray::getListMenu($model->type) : [],
                        'options' => [
                            'id' => "item-dep-drop",
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
                            'id' => 'item2-select2',
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
                    <?= $form->field($model, 'parent_id')->widget(Select2::class, [
                        'data' => DataToArray::getParentMenu($model->model->id),
                        'options' => [
                            'placeholder' => Yii::t('app', '--Select--')
                        ],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]) ?>
                    <?= $form->field($model, 'order')->textInput() ?>
                    <?= $form->field($model, 'label_position')->dropDownList(MenuLabelView::LABELS) ?>
                    <?= $form->field($model, 'icon')->widget(InputFile::class, [
                        'clientRoute' => '/admin/file/default/input',
                        'options' => [
                            'id' => 'menu_icon_input',
                        ]
                    ]) ?>
                    <img src="<?= $model->icon ?>" alt="" id="menu_icon" style="width: 50px; object-fit: cover">
                </div>
            </div>

        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
