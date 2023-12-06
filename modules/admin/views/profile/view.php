<?php
/*
 *   Jamshidbek Akhlidinov
 *   5 - 12 2023 15:40:48
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov/yii2basic
 */


use yii\bootstrap5\Html;

$this->title = translate("Profile");
Yii::$app->params['breadcrumbs'][] = translate("User");
Yii::$app->params['breadcrumbs'][] = $this->title;
?>


<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h2>
            <?= translate("User data") ?>
        </h2>

        <?= Html::a("Update", ['profile/update'],['class'=>'btn btn-info']) ?>
    </div>

    <div class="card-body">
        <div class=""
        ">
        <h5>Username:
            <?= user()->identity->username ?>
        </h5>

        <h5>Email:
            <?= user()->identity->email ?>
        </h5>

    </div>
</div>
</div>
