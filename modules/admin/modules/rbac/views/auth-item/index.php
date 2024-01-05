<?php

use app\modules\admin\modules\rbac\components\buttons\AuthItemButtons;
use app\modules\admin\modules\rbac\models\AuthItem;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\modules\admin\modules\rbac\search\AuthItem $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Auth Items');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-index card">

    <div class="card-header d-flex justify-content-between">
        <h1><?= Html::encode($this->title) ?></h1>
        <?= AuthItemButtons::create() ?>
        <p>

        </p>
    </div>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="card-header">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                [
                    'attribute' => 'name',
                    'format' => 'raw',
                    'value' => function ($model) {
                        return AuthItemButtons::update($model->name);
                    }
                ],
                [
                    'attribute' => 'type',
                    'value' => static function ($item) {
                        return $item->type == 1 ? 'Role' : 'Permission';
                    }
                ],
                'description:ntext',
                'rule_name',
                'data',
                //'created_at',
                //'updated_at',
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, AuthItem $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'name' => $model->name]);
                    }
                ],
            ],
        ]); ?>
    </div>

    <?php Pjax::end(); ?>

</div>
