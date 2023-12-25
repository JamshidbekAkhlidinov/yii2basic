<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\admin\forms\UserForm $model
 * @var $roles
 * */

$this->title = Yii::t('app', 'Update User: {name}', [
    'name' => $model->model->username,
]);
Yii::$app->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
Yii::$app->params['breadcrumbs'][] = ['label' => $model->model->username, 'url' => ['view', 'id' => $model->model->id]];
Yii::$app->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="user-update card">
    <div class="card-header d-flex justify-content-between">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <div class="card-body">
        <?= $this->render('_form', [
            'model' => $model,
            'roles' => $roles,
        ]) ?>
    </div>
</div>
