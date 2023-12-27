<?php
/*
 *   Jamshidbek Akhlidinov
 *   25 - 12 2023 11:42:01
 *   https://github.com/JamshidbekAkhlidinov
*/

use alexantr\elfinder\InputFile;
use app\modules\admin\enums\StatusEnum;
use app\modules\admin\modules\content\models\PostCategory;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\admin\modules\content\search\PostCategorySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var app\modules\admin\modules\content\models\PostCategory $model */
/** @var yii\widgets\ActiveForm $form */

$this->title = Yii::t('app', 'Post Categories');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="post-category-index card">
    <div class="card-header d-flex justify-content-between">
        <h1><?= Html::encode($this->title) ?></h1>
        <p>
<!--            --><?php //= Html::a(Yii::t('app', 'Create Post Category'), ['create'], ['class' => 'btn btn-success']) ?>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">
                Create Post Category
            </button>
            <div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalgridLabel">Grid Modals</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="javascript:void(0);">
                                <div class="row g-3">
                                    <?= $this->render('_form', [
                                        'model' => $model,
                                    ]) ?>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </p>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="card-header">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                // 'id',
                [
                        'attribute' => 'image',
                    'format' => 'raw',
                    'value' => static function($model){
                        return Html::img($model->image, ['width'=>'150px']);
                    }
                ],
                [
                    'attribute' => 'name',
                    'format' => 'raw',
                    'value' => function ($model) {
                        return Html::a($model->name,
                            [
                                '/admin/content/post-category/update',
                                'id' => $model->id,
                            ]
                        );
                    }
                ],
                // 'sub_text',
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
                //'created_at',
                //'created_by',
                [
                    'class' => ActionColumn::className(),
                    'template' => '{delete}',
                    'urlCreator' => function ($action, PostCategory $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                ],
            ],
        ]); ?>

    </div>
</div>
