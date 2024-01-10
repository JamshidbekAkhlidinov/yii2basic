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

    public $ph_number;
    public $birthday;

    public function __construct(UserProfile $model, $config = [])
    {
        $this->model = $model;
        $this->email = $model->user->email;
        $this->ph_number = $model->ph_number;
        $this->birthday = $model->birthday;
        $this->firstName = $model->firstname;
        $this->lastName = $model->lastname;
        parent::__construct($config);
    }

    public function rules(): array
    {
        return [
            [['firstName', 'lastName', 'ph_number', 'birthday'], 'string'],
            [['email'], 'required'],
            [['email'], 'email'],
        ];
    }

    public function save(): bool
    {
        $model = $this->model;
        $user = $model->user;
        $user->email = $this->email;
        $user->save();
        $model->firstname = $this->firstName;
        $model->ph_number = $this->ph_number;
        $model->birthday = $this->birthday;
        $model->lastname = $this->lastName;
        return $model->save();
    }
}