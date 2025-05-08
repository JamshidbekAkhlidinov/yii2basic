<?php

namespace app\modules\admin\modules\rbac\controllers;

use app\modules\admin\controllers\BaseController;
use app\modules\admin\modules\rbac\models\AuthItemChild;
use app\modules\admin\modules\rbac\search\AuthItemChildSearch;
use yii\web\NotFoundHttpException;

/**
 * AuthItemChildController implements the CRUD actions for AuthItemChild model.
 */
class AuthItemChildController extends BaseController
{

    public function actionIndex($parent = null)
    {
        $searchModel = new AuthItemChildSearch(['parent' => $parent]);
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionView($parent, $child)
    {
        return $this->render('view', [
            'model' => $this->findModel($parent, $child),
        ]);
    }

    public function actionCreate($parent = null)
    {
        $model = new AuthItemChild();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['index', 'parent' => $parent]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->renderAjax('_form', [
            'model' => $model,
            'parent' => $parent,
        ]);
    }

    public function actionUpdate($parent, $child)
    {
        $model = $this->findModel($parent, $child);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->renderAjax('_form', [
            'model' => $model,
        ]);
    }


    public function actionDelete($parent, $child)
    {
        $this->findModel($parent, $child)->delete();

        return $this->redirect(['index']);
    }


    protected function findModel($parent, $child)
    {
        if (($model = AuthItemChild::findOne(['parent' => $parent, 'child' => $child])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(translate('The requested page does not exist.'));
    }
}
