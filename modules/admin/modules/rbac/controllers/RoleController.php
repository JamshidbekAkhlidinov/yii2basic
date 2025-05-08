<?php
/*
 *   Jamshidbek Akhlidinov
 *   4 - 3 2025 11:58:39
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\admin\modules\rbac\controllers;

use app\modules\admin\controllers\BaseController;
use app\modules\admin\modules\rbac\models\AuthItem;
use Yii;
use yii\rbac\Role;

class RoleController extends BaseController
{
    public function actionIndex($name)
    {
        $role = AuthItem::find()
            ->andWhere(['type' => Role::TYPE_ROLE])
            ->andWhere(['name' => $name])
            ->one();

        $permissions = AuthItem::find()
            ->andWhere(['type' => Role::TYPE_PERMISSION])
            ->all();

        $groups = [];
        foreach ($permissions as $permission) {
            $group = explode("/", $permission->name)[0];
            if ($group == 'user') {
                $groups['user'][$permission->name] = $permission->name;
            } elseif ($group == 'admin') {
                $groups['admin'][$permission->name] = $permission->name;
            } else {
                $groups[$group][$permission->name] = $permission->name;
            }
        }


        return $this->render('index', [
            'role' => $role,
            'permissions' => $permissions,
            'groups' => $groups,
        ]);
    }


    public function actionUpdate($name)
    {
        $permissions = Yii::$app->request->post('permissions');
        $permissions = array_merge(...array_values($permissions));

        $auth = Yii::$app->authManager;
        $roleModel = $auth->getRole($name);
        $auth->removeChildren($roleModel);
        foreach ($permissions ?? [] as $permission) {
            $permissionModel = $auth->getPermission($permission);
            $auth->addChild($roleModel, $permissionModel);
        }
        session()->setFlash(
            'alert',
            [
                'body' => translate("Saved"),
                'options' => ['class' => 'alert alert-success']
            ]
        );
        return $this->redirect(['auth-item/index', 'type' => Role::TYPE_ROLE]);
    }

    public function actionUpdatePermissions($name)
    {
        $basePath = Yii::getAlias('@app');
        $permissions = getAllRoutes($basePath, 'app');
        $auth = Yii::$app->authManager;

        foreach ($permissions as $permission) {
            if ($auth->getPermission($permission)) {
                continue;
            }
            $perModel = $auth->createPermission($permission);
            $auth->add($perModel);
        }
        session()->setFlash('alert', [
            'body' => translate("Permissions update"),
            'options' => ['class' => 'alert-success']
        ]);
        return $this->redirect(['role/index', 'name' => $name]);
    }
}