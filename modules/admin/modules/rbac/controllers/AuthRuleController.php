<?php

namespace app\modules\admin\modules\rbac\controllers;

use app\modules\admin\controllers\BaseController;
use app\modules\admin\modules\rbac\models\AuthRule;
use app\modules\admin\modules\rbac\search\AuthRuleSearch;
use yii\web\NotFoundHttpException;

/**
 * AuthRuleController implements the CRUD actions for AuthRule model.
 */
class AuthRuleController extends BaseController
{
    public function actionIndex()
    {
        $searchModel = new AuthRuleSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($name)
    {
        return $this->render('view', [
            'model' => $this->findModel($name),
        ]);
    }


    public function actionCreate()
    {
        $model = new AuthRule();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'name' => $model->name]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($name)
    {
        $model = $this->findModel($name);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'name' => $model->name]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    public function actionDelete($name)
    {
        $this->findModel($name)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($name)
    {
        if (($model = AuthRule::findOne(['name' => $name])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(translate('The requested page does not exist.'));
    }
}
