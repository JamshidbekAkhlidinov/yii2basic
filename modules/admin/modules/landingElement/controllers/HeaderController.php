<?php
/*
 *   Jamshidbek Akhlidinov
 *   12 - 1 2024 11:50:24
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\admin\modules\landingElement\controllers;

use app\modules\admin\enums\LandingElementEnum;
use app\modules\admin\modules\landingElement\forms\HeaderForm;
use app\modules\admin\modules\landingElement\models\LandingElement;
use yii\web\Controller;

class HeaderController extends Controller
{
    public function actionForm()
    {
        $formModel = new HeaderForm(
            $this->getModel(LandingElementEnum::LOGO)
        );
        if ($formModel->load(post()) && $formModel->save()) {
            return $this->redirect(['header/form']);
        }
        return $this->render('form', [
            'formModel' => $formModel
        ]);
    }

    /**
     * @param $key
     * @return LandingElement
     */
    private function getModel($key): LandingElement
    {
        $model = LandingElement::findOne([
            'key' => $key
        ]);
        if (!$model) {
            $model = new LandingElement([
                'key' => $key
            ]);
        }
        return $model;
    }
}