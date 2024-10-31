<?php

use app\models\forms\SignUpForm;use yii\helpers\Html;use yii\widgets\ActiveForm;


/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var SignUpForm $model */

$this->title = 'Регистрация';
?>

<br>
<div class="register">
    <?php $form = ActiveForm::begin([
        'id' => 'SignUpForm',
        'fieldConfig' => [
            'template' => "{label}\n{input}\n{error}",
            'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
            'inputOptions' => ['class' => 'col-lg-3 form-control'],
            'errorOptions' => ['class'=>'col-lg-7 invalid-feedback'],
        ]
    ])
    ?>
    <div class="reg_but">
        <h1 class="reg_butt"> Заполните данные поля для регестрации </h1>
    </div>

    <?= $form->field($model, 'mail')->textInput() ?>
    <?= $form->field($model, 'first_name')->textInput() ?>
    <?= $form->field($model, 'last_name')->textInput() ?>
    <?= $form->field($model, 'phone_number')->textInput() ?>
    <?= $form->field($model, 'password')->passwordInput() ?>

    <div class="form-group text-center">
        <div>
            <?= Html::submitButton('Зарегестрироваться',['class'=>'btn btn-primary', 'name'=>'sing-up-button'])?>
        </div>
    </div>
    <?php ActiveForm::end()?>

</div>
