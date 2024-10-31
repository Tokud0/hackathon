<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Создать Событие';
$this->params['breadcrumbs'][] = ['label' => 'Афиша Событий', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-create">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="event-form">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'date')->input('date') ?>

        <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'image')->fileInput(['id' => 'event-image']) ?>

        <?= $form->field($model, 'image')->textarea(['id' => 'event-image-textarea', 'rows' => 6, 'placeholder' => 'Вставьте данные изображения в формате Base64', 'style' => 'display:none;']) ?>

        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

<script>
    document.getElementById('event-image').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onloadend = function() {
            document.getElementById('event-image-textarea').value = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        }
    });
</script>
