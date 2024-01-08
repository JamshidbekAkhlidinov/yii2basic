<?php
/*
 *   Jamshidbek Akhlidinov
 *   8 - 1 2024 18:26:6
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov/yii2basic
 */

namespace app\modules\admin\forms;

use app\models\UserProfile;
use yii\base\Model;

class ProfileForm extends Model
{
    public UserProfile $model;

    public $firstName;

    public $lastName;

    public $email;

    public function __construct(UserProfile $model, $config = [])
    {
        $this->model = $model;
        $this->email = $model->user->email;
        $this->firstName = $model->firstname;
        $this->lastName = $model->lastname;
        parent::__construct($config);
    }

    public function rules()
    {
        return [
            [['firstName', 'lastName'], 'string'],
            [['email'], 'required'],
            [['email'], 'email'],
        ];
    }

    public function save()
    {
        $model = $this->model;
        $user = $model->user;
        $user->email = $this->email;
        $user->save();
        $model->firstname = $this->firstName;
        $model->lastname = $this->lastName;
        return $model->save();
    }
}