<?php
/*
 *   Jamshidbek Akhlidinov
 *   12 - 1 2024 11:46:1
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\admin\modules\landingElement\base;


use app\modules\admin\modules\landingElement\models\LandingElement;

class Model extends \yii\base\Model
{
    public LandingElement $model;

    public function __construct(LandingElement $model, $config = [])
    {
        $this->model = $model;
        parent::__construct($config);
    }



    public function save()
    {
        return true;
    }


}