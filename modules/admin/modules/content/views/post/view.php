<?php
/*
 *   Jamshidbek Akhlidinov
 *   25 - 12 2023 11:40:02
 *   https://github.com/JamshidbekAkhlidinov
*/

use app\modules\admin\enums\StatusEnum;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\modules\admin\modules\content\models\Post $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="post-view card">
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
                'title',
                [
                    'format' => 'raw',
                    'attribute' => 'image',
                    'value' => static function ($model) {
                        return Html::img($model->image, ['width' => '100px']);
                    },
                ],
                'sub_text',
                'description',
                [
                    'attribute' => 'status',
                    'format' => 'raw',
                    'value' => static function ($model) {
                        return Html::tag(
                            'span',
                            StatusEnum::ALL[$model->status] ?? "",
                            [
                                'class' => 'badge '.StatusEnum::COLORS[$model->status] ?? ""
                            ]
                        );
                    }
                ],
                'view_count',
                'created_at',
                'updated_at',
                [
                    'format' => 'raw',
                    'attribute' => 'created_by',
                    'value' => static function ($model) {
                        if ($user = $model->createdBy) {
                            return $user->publicIdentity;
                        }
                    },
                ],
                [
                    'format' => 'raw',
                    'attribute' => 'updated_by',
                    'value' => static function ($model) {
                        if ($user = $model->updatedBy) {
                            return $user->publicIdentity;
                        }
                    },
                ],
            ],
        ]) ?>
    </div>
</div>
