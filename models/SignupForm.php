<?php


namespace app\models;


use DateTime;
use Yii;
use yii\base\Model;

class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $password_repeat;
    public $birth_date;

    public function attributeLabels()
    {
        return [
            'username' => 'Your name',
            'email' => 'Your email',
            'password' => 'Your password',
            'password_repeat' => 'Repeat password',
            'birth_date' => 'Birth Date'
        ];
    }

    public function rules()
    {
        return [
            [['username', 'email', 'password', 'password_repeat', 'birth_date'], 'required'],
            ['username', 'unique', 'targetClass' => User::class, 'message' => 'This username has already been taken.'],
            ['email', 'unique', 'targetClass' => User::class, 'message' => 'This email has already been taken.'],
            ['email', 'email'],
            [['username'], 'string', 'min' => 4, 'max' => 16],
            [['password', 'password_repeat'], 'string', 'min' => 5],
            ['password_repeat', 'compare', 'compareAttribute' => 'password'],

            ['birth_date', 'date', 'format' => 'php:m-d-Y', 'max' => date('m-d-Y', strtotime('-18 years')),
                'tooBig' => 'You should be atleast 18 years old to create an account.']
        ];
    }

    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->password = Yii::$app->security->generatePasswordHash($this->password);
        $user->access_token = Yii::$app->security->generateRandomString();
        $user->auth_key = Yii::$app->security->generateRandomString();
        $user->birth_date = $this->birth_date;
        return false;
    }

}