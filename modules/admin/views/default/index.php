<?php

use app\modules\admin\widgets\slider\enums\SwiperTypeEnum;
use app\modules\admin\widgets\slider\SwiperSliderWidget;
use app\widgets\icon\Remix;

$this->title = translate("Admin dashboard");

Yii::$app->params['breadcrumbs'][] = $this->title;

?>
<div class="admin-default-index">
    <h1><?= $this->context->action->uniqueId ?></h1>
    <p>
        This is the view content for action "<?= $this->context->action->id ?>".
        The action belongs to the controller "<?= get_class($this->context) ?>"
        in the "<?= $this->context->module->id ?>" module.
    </p>
    <p>
        You may customize this page by editing the following file:<br>
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
            'options' => [
                "style" => "width:100%"
            ]
        ])?>
    </div>

</div>
