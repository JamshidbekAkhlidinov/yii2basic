<?php
/*
 *   Jamshidbek Akhlidinov
 *   10 - 5 2025 11:56:53
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\admin\components;

use Yii;
use yii\base\Component;

class PermissionsComponent extends Component
{
    public $permissions;

    public function init()
    {
        parent::init();
        if ($this->permissions === null) {
            $this->permissions = Yii::$app->authManager->getPermissionsByUser(Yii::$app->user->id);
        }
    }
}