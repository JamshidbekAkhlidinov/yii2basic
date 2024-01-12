<?php
/*
 *   Jamshidbek Akhlidinov
 *   12 - 1 2024 11:48:13
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\admin\modules\landingElement\forms;


use app\modules\admin\modules\landingElement\base\Model;
use app\modules\admin\modules\landingElement\models\LandingElement;

class HeaderForm extends Model
{
    public LandingElement $model;

    public $logo;

    public $title;

    public $description;

}