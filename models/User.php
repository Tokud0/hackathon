<?php

namespace app\models;

use MongoDB\BSON\ObjectId;
use PharIo\Manifest\Email;
use Yii;
use yii\base\Exception;
use yii\base\NotSupportedException;
use yii\mongodb\ActiveRecord;
use yii\validators\EmailValidator;
use yii\validators\NumberValidator;
use yii\validators\StringValidator;

/**
 * @property ObjectId $_id
 * @property string $mail
 * @property string $password
 * @property string $phone_number
 * @property string $first_name
 * @property string $last_name
 * @property string $auth_key
 * @property string $coins
 * @property string|null $last_reward_date
 */

class User extends ActiveRecord implements \yii\web\IdentityInterface
{

    const COINS_FOR_REVIEW = 50;
    const COINS_FOR_NOT = 20;
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
            'coins',
            'last_reward_date',
        ];
    }

    public function rules():array
    {
        return [
            [['mail'], EmailValidator::class],
            [['phone_number'], StringValidator::class],
            [['first_name', 'last_name'], StringValidator::class],
            [['coins'],'integer','min'=>0],
            [['last_reward_date'], 'date', 'format' => 'php:Y-m-d'],

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
    public function addCoins(int $amount): bool
    {
        $this->coins += $amount;
        return $this->save();
    }
    public function rewardForComment(): bool
    {
        return $this->addCoins(self::COINS_FOR_REVIEW);
    }
    public function rewardForNot(): bool
    {
        $today = date('Y-m-d');

        if ($this->last_reward_date === $today) {
            return false;
        }
        $this->last_reward_date = $today;
        return $this->addCoins(self::COINS_FOR_NOT) && $this->save(false);
    }
    public function isAdmin(): bool
    {
        return $this->mail === 'danilchaikin@mail.ru';
    }
    public function buyBusTicket(): bool
    {
        $ticketCost = 100;

        if ($this->coins < $ticketCost) {
            Yii::$app->session->setFlash('error', 'Недостаточно монет для покупки билета.');
            return false;
        }
        $this->coins -= $ticketCost;

        if ($this->save()) {
            Yii::$app->session->setFlash('success', 'Билет успешно приобретен!');
            return true;
        } else {
            Yii::$app->session->setFlash('error', 'Не удалось приобрести билет. Попробуйте еще раз.');
            return false;
        }
    }
}