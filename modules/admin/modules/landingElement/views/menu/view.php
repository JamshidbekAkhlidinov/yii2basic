<?php
/*
 *   Jamshidbek Akhlidinov
 *   13 - 02 2024 12:05:38
 *   https://github.com/JamshidbekAkhlidinov
*/

use app\modules\admin\enums\PositionMenuEnum;
use app\modules\admin\enums\StatusEnum;
use app\modules\admin\enums\TypeEnum;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\modules\admin\modules\landingElement\models\Menu $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Menus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="menu-view card">
    <div class="card-header d-flex justify-content-between">
        <h1><?= Html::encode($this->title) ?></h1>
        <p>
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    </div>
    <div class="card-header">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'name',
                'order',
                [
                    'attribute' => 'status',
                    'format' => 'raw',
                    'value' => static function ($model) {
                        return Html::tag(
                            'span',
                            StatusEnum::ALL[$model->status] ?? "",
                            [
                                'class' => 'badge ' . StatusEnum::COLORS[$model->status] ?? ""
                            ]
                        );
                    }
                ],
                [
                    'attribute' => 'icon',
                    'format' => 'raw',
                    'value' => static function ($model) {
                        return Html::img($model->icon, [
                            'width' => '80px'
                        ]);
                    },
                ],
                [
                    'attribute' => 'parent_id',
                    'format' => 'raw',
                    'value' => static function ($model) {
                        return Html::tag(
                            'span',
                            isset($model->parent) ? $model->parent->name : "",
                            [
                                'class' => 'badge bg-success'
                            ]
                        );
                    }
                ],
                [
                    'attribute' => 'type',
                    'format' => 'raw',
                    'value' => static function ($model) {
                        return Html::tag(
                            'span',
                            TypeEnum::ALL[$model->type] ?? "",
                            [
//                            'class' => 'badge ' . TypeEnum::COLORS[$model->type] ?? "",
                            ]
                        );
                    }
                ],
                [
                    'attribute' => 'position_menu',
                    'format' => 'raw',
                    'value' => static function ($model) {
                        return Html::tag(
                            'span',
                            PositionMenuEnum::LABELS[$model->position_menu] ?? ""
                        );
                    }
                ],
                'created_at',
                'updated_at',
//            'label_position',
//              'slug',
            ],
        ]) ?>
    </div>
</div>
