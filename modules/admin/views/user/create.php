<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\admin\forms\UserForm $model
 * @var $roles
 */

$this->title = Yii::t('app', 'Create User');
Yii::$app->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
Yii::$app->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create card">
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
