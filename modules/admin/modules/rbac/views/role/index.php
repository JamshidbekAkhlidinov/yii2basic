<?php
/*
 *   Jamshidbek Akhlidinov
 *   5 - 5 2025 10:27:23
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

/**
 * @var $roles AuthItem
 * @var $role AuthItem
 * @var $permissions AuthItem
 * @var $permission AuthItem
 * @var $groups
 */

use app\modules\admin\modules\rbac\models\AuthItem;
use rmrevin\yii\fontawesome\FA;
use yii\helpers\Html;
use yii\rbac\Role;
use yii\widgets\ActiveForm;

$this->title = translate('Roles');
Yii::$app->params['breadcrumbs'][] = $this->title;
$form = ActiveForm::begin(['action' => ['role/update', 'name' => $role->name]]);
?>
<div class="row">
    <?php
    $rolePermissions = $role->getChildren()->select('name')->asArray()->all();
    ?>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <?= Html::a(
                        FA::icon('arrow-left'),
                        ['auth-item/index', 'type' => Role::TYPE_ROLE],
                        [
                            'class' => 'btn btn-info',
                        ]
                    ) ?>
                    Role: <b><?= $role->name ?></b>
                </div>
                <div>
                    <?= Html::a(
                        translate("Update permissions"),
                        ['role/update-permissions', 'name' => $role->name],
                        [
                            'class' => 'btn btn-success',
                        ]
                    ) ?>
                    <?= Html::submitButton(translate("Save"), ['class' => 'btn btn-success']) ?>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <?php
                    foreach ($groups as $id => $groupPermissions) {
                        $permissionsList = $groupPermissions;
                        $rolePermissionNames = array_column($rolePermissions, 'name');
                        ?>

                        <div class="col-md-3">

                            <div class="accordion lefticon-accordion custom-accordionwithicon accordion-border-box" id="accordionlefticon">

                                <div class="accordion-item material-shadow mb-2">
                                    <h2 class="accordion-header" id="accordionlefticonExample<?=$id?>">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accor_lefticonExamplecollapse<?=$id?>" aria-expanded="true" aria-controls="accor_lefticonExamplecollapse<?=$id?>">
                                            <?=$id?>
                                        </button>
                                    </h2>
                                    <div id="accor_lefticonExamplecollapse<?=$id?>" class="accordion-collapse collapse" aria-labelledby="accordionlefticonExample<?=$id?>" data-bs-parent="#accordionlefticon">
                                        <div class="accordion-body">
                                            <div>
                                                <input type="checkbox" id="select-all-<?= $id ?>" class="select-all-checkbox">
                                                <label for="select-all-<?= $id ?>"><?= translate("Select All") ?></label>
                                            </div>
                                            <?php
                                            echo Html::checkboxList(
                                                'permissions[' . $id . ']',
                                                $rolePermissionNames,
                                                $permissionsList,
                                                [
                                                    'tag' => 'div',
                                                    'class' => 'row'
                                                ]
                                            );
                                            ?>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card card-footer">
    <?= Html::submitButton(translate("Save"), ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>


<?php
$js = <<<JS
    $('.select-all-checkbox').on('change', function() {
        var isChecked = $(this).prop('checked');
        var id = $(this).attr('id').replace('select-all-', '');
        $('input[name="permissions[' + id + '][]"]').prop('checked', isChecked);

    });
JS;
$this->registerJs($js);
?>
