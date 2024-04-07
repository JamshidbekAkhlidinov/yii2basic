<?php
/*
 *   Jamshidbek Akhlidinov
 *   13 - 02 2024 12:05:38
 *   https://github.com/JamshidbekAkhlidinov
*/

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\admin\modules\landingElement\forms\MenuForm $model */

$this->title = Yii::t('app', 'Update Menu: {name}', [
    'name' => $model->model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Menus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->model->name, 'url' => ['view', 'id' => $model->model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="menu-update">
    <div class="d-flex justify-content-between">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
</div>
