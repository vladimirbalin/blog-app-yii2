<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property int $user_id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $auth_key
 * @property string $access_token
 * @property string $birth_date
 * @property int $lastvisit
 * @property string $first_name
 * @property string $last_name
 * @property string $address
 * @property string $city
 * @property string $phone
 */
class User extends ActiveRecord implements IdentityInterface
{
    const SCENARIO_EDIT_PROFILE = 'edit-profile-scenario';


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    public static function primaryKey()
    {
        return ['user_id'];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'email', 'password', 'auth_key', 'access_token', 'birth_date'], 'required'],
            [['username', 'email', 'password', 'auth_key', 'access_token'], 'string', 'max' => 255],
            [['first_name', 'last_name', 'address', 'city', 'phone'], 'required', 'on' => self::SCENARIO_EDIT_PROFILE]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'username' => 'Username',
            'birth_date' => 'Birth date',
            'email' => 'Email',
            'password' => 'Password',
            'auth_key' => 'Auth Key',
            'access_token' => 'Access Token',
        ];
    }

    public static function findIdentity($id)
    {
        return self::find()->where(['user_id' => $id])->one();
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return self::find()->where(['access_token' => $token])->one();
    }

    /**
     * Finds user by email
     *
     * @param $email string
     * @return ActiveRecord|null
     */
    public static function findByEmail($email)
    {
        return self::findOne(['email' => $email]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->user_id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    public function getFullName()
    {
        return "$this->first_name $this->last_name";
    }

    public function getFullAddress()
    {
        return "$this->address, $this->city";
    }

    public static function getList()
    {
        return ArrayHelper::map(User::find()->asArray()->all(), 'user_id', 'username');
    }
}
