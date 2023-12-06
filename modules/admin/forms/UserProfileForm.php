<?php
/*
 *   Jamshidbek Akhlidinov
 *   5 - 12 2023 15:48:38
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov/yii2basic
 */

namespace app\modules\admin\forms;

use app\models\User;
use yii\base\Model;
use yii\web\JsExpression;

class UserProfileForm extends Model
{
    public User $model;

    public $username;
    public $email;
    public $password;
    public $confirm_password;


    public function __construct(User $model, $config = [])
    {
        $this->model = $model;
        $this->username = $model->username;
        $this->email = $model->email;
        parent::__construct($config);
    }

    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique',
                'targetClass' => User::class,
                'message' => translate('This username has already been taken.'),
                'filter' => function ($query) {
                    $query->andWhere(['not', ['id' => user()->id]]);
                }
            ],
            ['username', 'string', 'min' => 1, 'max' => 255],
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique',
                'targetClass' => User::class,
                'message' => translate('This email has already been taken.'),
                'filter' => function ($query) {
                    $query->andWhere(['not', ['id' => user()->getId()]]);
                }
            ],
            [['email', 'username'], 'required'],
            ['password', 'string'],
            [
                'confirm_password',
                'required',
                'when' => function ($model) {
                    return !empty($model->password);
                },
                'whenClient' => new JsExpression("function (attribute, value) {
                    return $('#userprofileform-password').val().length > 0;
                }")
            ],
            ['confirm_password', 'compare', 'compareAttribute' => 'password', 'skipOnEmpty' => false],
        ];
    }

    public function save()
    {
        $model = $this->model;
        $model->username = $this->username;
        $model->email = $this->email;
        if ($password = $this->password) {
            $model->setPassword($password);
        }
        return $model->save();
    }

}