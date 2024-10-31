<?php

namespace app\models\forms;

use app\models\User;
use yii\base\Exception;
use yii\base\Model;

class SignUpForm extends Model
{
    public ?string $mail = null;
    public ?string $first_name = null;
    public ?string $last_name = null;
    public ?string $phone_number = null;
    public ?string $password = null;


    public function rules(): array
    {
        return [
            [['mail', 'first_name', 'last_name', 'phone_number', 'password'], 'required','message' => 'Это поле не может быть пустым.'],
        ];
    }
    public function attributeLabels(): array
    {
        return [
            'mail'=>'Почта',
            'first_name'=>'Ваше Имя',
            'last_name'=>'Ваша фамилия',
            'phone_number'=>'Ваш Номер телефона',
            'password'=>'Пароль'
        ];
    }

    /**
     * @throws Exception
     * @throws \yii\db\Exception
     */
    public function signup(): ?User
    {
        if (!$this->validate()) {
            return null;
        }
        $user = new User();
        $user->mail = $this->mail;
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->phone_number = $this->phone_number;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        return $user->save() ? $user : null;

    }
}