<?php

namespace app\modules\admin\modules\rbac\controllers;

use app\modules\admin\controllers\BaseController;

/**
 * Default controller for the `rbac` module
 */
class DefaultController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
