<?php

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
</div>
