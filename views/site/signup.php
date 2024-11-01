<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var \app\models\forms\SignupForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Регистрация';

?>
<div class="site-signup">
    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <p class="card-text text-center">Пожалуйста, заполните следующие поля для регистрации.</p>

                    <?php $form = ActiveForm::begin([
                        'id' => 'signup-form',
                        'fieldConfig' => [
                            'template' => "{label}\n{input}\n{error}",
                            'labelOptions' => ['class' => 'form-label'],
                            'inputOptions' => ['class' => 'form-control'],
                            'errorOptions' => ['class' => 'invalid-feedback'],
                        ],
                    ]); ?>


                    <?= $form->field($model, 'mail')->textInput()->label('Электронная почта') ?>
                    <?= $form->field($model,'first_name')->textInput()->label('Ваше Имя') ?>
                    <?= $form->field($model,'last_name')->textInput()->label('Ваша Фамилия')?>
                    <?= $form->field($model,'phone_number')->textInput()->label('Ваш номер телефона')?>
                    <?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>

                    <div class="form-group">
                        <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary w-100', 'name' => 'signup-button']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
            <div class="text-center">
                <?= Html::a('Уже есть аккаунт? Войдите', ['/site/login'], ['class' => 'link-secondary']) ?>
            </div>
        </div>
    </div>
</div>
