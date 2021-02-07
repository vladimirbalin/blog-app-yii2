<?php


namespace app\models;


use DateTime;
use Yii;
use yii\base\Model;
use yii\helpers\VarDumper;

class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $password_repeat;
    public $birth_month;
    public $birth_day;
    public $birth_year;

    public function attributeLabels()
    {
        return [
            'username' => 'Your name',
            'email' => 'Your email',
            'password' => 'Your password',
            'password_repeat' => 'Repeat password',
            'birth_month' => 'Birth month',
            'birth_day' => 'Birth Day',
            'birth_year' => 'Birth year'
        ];
    }

    public function rules()
    {
        return [
            [['username', 'email', 'password', 'password_repeat', 'birth_day', 'birth_year', 'birth_month'], 'required'],
//            [['birth_date'], 'date', 'min' => '01-01-2010', 'format' => 'dd-mm-yyyy', 'timestampAttribute' => 'timeSt'],
            [['username', 'email'], 'unique', 'targetAttribute' => ['username', 'email']],
            ['email', 'email'],
            [['username'], 'string', 'min' => 4, 'max' => 16],
            [['password', 'password_repeat'], 'string', 'min' => 5],
            ['password_repeat', 'compare', 'compareAttribute' => 'password'],
        ];
    }

    public function signup()
    {
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->password = Yii::$app->security->generatePasswordHash($this->password);
        $user->access_token = Yii::$app->security->generateRandomString();
        $user->auth_key = Yii::$app->security->generateRandomString();
        $birth_date = $this->validateBirthDate();
        if ($birth_date) {
            $user->birth_date = strtotime($birth_date);
        }
        if ($user->save()) {
            return true;
        }
        Yii::error('User was not saved. ' . VarDumper::dumpAsString($user->errors));
        return false;
    }

    public function validateBirthDate()
    {
        $birth_day = strlen($this->birth_day) === 1 ? '0' . $this->birth_day : $this->birth_day;
        $birth_month = strlen($this->birth_month) === 1 ? '0' . $this->birth_month : $this->birth_month;
        $birth_date = "$this->birth_year-$birth_month-$birth_day";
        $origin = new DateTime($birth_date);
        $target = new DateTime('now');
        $interval = $origin->diff($target);
        $age = intval($interval->format('%y'));
        if ($age < 18) {
            $this->addError('birth_year', 'You should be 18 and more to have an access to register on our website');
            return false;
        }
        return $birth_date;
    }
}