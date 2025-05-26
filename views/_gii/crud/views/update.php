<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/** @var yii\web\View $this */
/** @var yii\gii\generators\crud\Generator $generator */

$urlParams = $generator->generateUrlParams();
$modelClassName = Inflector::camel2words(StringHelper::basename($generator->modelClass));
$nameAttributeTemplate = '$model->' . $generator->getNameAttribute();
$titleTemplate = $generator->generateString('Update ' . $modelClassName . ': {name}', ['name' => '{nameAttribute}']);
if ($generator->enableI18N) {
    $title = strtr($titleTemplate, ['\'{nameAttribute}\'' => $nameAttributeTemplate]);
} else {
    $title = strtr($titleTemplate, ['{nameAttribute}\'' => '\' . ' . $nameAttributeTemplate]);
}

echo "<?php\n";
?>
/*
 *   Jamshidbek Akhlidinov
 *   <?php echo date('d - m Y H:i:s')."\n"; ?>
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
*/

use yii\helpers\Html;
use rmrevin\yii\fontawesome\FA;

/**
 * @var yii\web\View $this
 * @var <?= ltrim($generator->modelClass, '\\') ?> $model
 */

$this->title = <?= $title ?>;
Yii::$app->params['breadcrumbs'][] = ['label' => <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>, 'url' => ['index']];
Yii::$app->params['breadcrumbs'][] = ['label' => $model-><?= $generator->getNameAttribute() ?>, 'url' => ['view', <?= $urlParams ?>]];
Yii::$app->params['breadcrumbs'][] = <?= $generator->generateString('Update') ?>;
?>
<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-update card">
    <div class="card-header d-flex justify-content-between">
        <h1><?= '<?= ' ?>Html::encode($this->title) ?></h1>
        <p>
            <?= "<?= " ?>Html::a(
                FA::icon('arrow-left') . " " .<?= $generator->generateString('Back') ?>,
                ['index'],
                ['class' => 'btn btn-info']
            ) ?>
        </p>
    </div>
    <div class="card-body">
    <?= '<?= ' ?>$this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
</div>
