<?php

/**
 * @var View $this
 */

use app\modules\admin\widgets\modal\ModalWidget;
use app\modules\admin\widgets\slider\enums\SwiperTypeEnum;
use app\modules\admin\widgets\slider\SwiperSliderWidget;
use yii\web\View;

$this->title = translate("Admin dashboard");

Yii::$app->params['breadcrumbs'][] = $this->title;

$this->registerJsFile("//cdn.jsdelivr.net/npm/nested-sort@5/dist/nested-sort.umd.min.js");

$js = <<<JS
new NestedSort({
 actions: {
    onDrop: function(data) {
        $("#output").html(JSON.stringify(data));
    }
  },
  el: '.nested-sort-wrap', // selector of your list
    listClassNames: 'list-group', // a Bootstrap specific class name for list elements
  listItemClassNames: 'list-group-item' // a Bootstrap specific class name for list item elements
})


JS;
$this->registerJs($js,View::POS_READY);


?>

<div class="admin-default-index">
    <h1><?= $this->context->action->uniqueId ?></h1>




    <div class="row">
        <div class="col-md-6">

            <ol class="nested-sort-wrap list-group col nested-list nested-sortable">
                <li data-id="1" class="list-group-item nested-1">Item 1</li>
                <li data-id="2" class="list-group-item nested-1">Item 2</li>
                <li data-id="3" class="list-group-item nested-1">Item 3
                    <ol data-id="3" class="list-group nested-list nested-sortable">
                        <li data-id="4" class="list-group-item nested-2">Item 4</li>
                    </ol>
                </li>
                <li data-id="5" class="list-group-item nested-1">Item 5</li>
            </ol>

            <div class="list-group col nested-list nested-sortable nested-sort-wrap">
                <div class="list-group-item nested-1" draggable="false" data-id="1">Item 1.1</div>
                <div class="list-group-item nested-1" data-id="2">Item 1.2
                    <div class="list-group nested-list nested-sortable">
                        <div class="list-group-item nested-2" data-id="3">Item 2.1</div>
                        <div class="list-group-item nested-3" draggable="false" data-id="4" style="">Item 3.1</div>
                        <div class="list-group-item nested-3" draggable="false" data-id="5" style="">Item 3.2</div>
                        <div class="list-group-item nested-2" style="" data-id="6">Item 2.2
                            <div class="list-group nested-list nested-sortable">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="list-group-item nested-1">Item 1.3
                    <div class="list-group nested-list nested-sortable">
                        <div class="list-group-item nested-2">Item 2.1</div>
                        <div class="list-group-item nested-2">Item 2.2</div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-md-6">
            <textarea id="output"></textarea>
        </div>
    </div>


    <?= ModalWidget::widget() ?>


    <p>
    </p>
    <?= icon('home-3', [
        'type' => 'fill',
        'style' => 'font-size:30px',
        'class' => 'test'
    ]) ?>


    <?= env('APP_NAME') ?>

    <div class="row col-md-12">
        <?= SwiperSliderWidget::widget([
            'type' => SwiperTypeEnum::TYPE_COVERFLOW,
            'items' => [
                "/images/small/img-1.jpg",
                "/images/small/img-2.jpg",
                "/images/small/img-3.jpg",
                "/images/small/img-4.jpg",
                "/images/small/img-5.jpg",
                "/images/small/img-6.jpg",
                "/images/small/img-7.jpg",
                "/images/small/img-8.jpg",
                 "/images/small/img-9.jpg",
            ],
            'options' => [
                "style" => "width:100%"
            ]
        ]) ?>
    </div>

</div>
