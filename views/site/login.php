<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var \app\models\forms\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Вход в Аккаунт';

?>
<div class="site-login">
    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <p class="text-center">Пожалуйста, заполните следующие поля для входа в аккаунт.</p>

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <?php $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'fieldConfig' => [
                            'template' => "{label}\n{input}\n{error}",
                            'labelOptions' => ['class' => 'form-label'],
                            'inputOptions' => ['class' => 'form-control'],
                            'errorOptions' => ['class' => 'invalid-feedback'],
                        ],
                    ]); ?>

                    <?= $form->field($model, 'mail')->textInput(['autofocus' => true])->label('Почта') ?>

                    <?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>

                    <div class="form-group">
                        <?= Html::submitButton('Войти', ['class' => 'btn btn-primary w-100', 'name' => 'login-button']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
            <div class="text-center">
                <?= Html::a('Зарегистрироваться', ['/site/signup'], ['class' => 'link-secondary']) ?>
            </div>
        </div>
    </div>
</div>
