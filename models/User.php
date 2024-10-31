<?php

namespace app\models;

use MongoDB\BSON\ObjectId;
use PharIo\Manifest\Email;
use Yii;
use yii\base\Exception;
use yii\base\NotSupportedException;
use yii\mongodb\ActiveRecord;
use yii\validators\EmailValidator;
use yii\validators\StringValidator;

/**
 * @property ObjectId $_id
 * @property string $mail
 * @property string $password
 * @property string $phone_number
 * @property string $first_name
 * @property string $last_name
 * @property string $auth_key
 */

class User extends ActiveRecord implements \yii\web\IdentityInterface
{
    public  static function collectionName():string
    {
        return 'user';
    }
    public  function attributes(): array
    {
        return [
            '_id',
            'mail',
            'password',
            'phone_number',
            'first_name',
            'last_name',
            'auth_key',
        ];
    }

    public function rules():array
    {
        return [
            [['mail'], EmailValidator::class],
            [['phone_number'], StringValidator::class],
            [['first_name', 'last_name'], StringValidator::class],
        ];

    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id): User|\yii\web\IdentityInterface|null
    {
        return static::findOne($id);
    }

    /**
     * @throws NotSupportedException
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken"is not implemented.');
    }
    public static function findByMail(string $mail): User
    {
        $user = static::findOne(['mail' => $mail]);

        if ($user === null) {
            throw new \InvalidArgumentException("User not found with email: $mail");
        }

        return $user;
    }


    public function getId(): string
    {
        return (string)$this->_id;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey): ?bool
    {
        return $this->auth_key === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword(string $password): bool
    {
        return Yii::$app->security->validatePassword($password,$this->password);
    }
    /**
     * @throws Exception
     */
    public function setPassword($password): void
    {
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }
    /**
     * @throws Exception
     */
    public function beforeSave($insert): bool
    {
        if(parent::beforeSave($insert)){
            if($this->isNewRecord){
                $this->auth_key = \Yii::$app->security->generateRandomString();
            }
            return true;
        }
        return false;
    }
    /**
     * @throws Exception
     */
    public function generateAuthKey(): void
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    public function getAuthKey(): string
    {
        return $this->auth_key;
    }
}