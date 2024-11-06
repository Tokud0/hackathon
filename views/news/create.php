<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Создать Событие';
$this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => ['index']];
?>
<div class="news-create">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="news-form">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'date')->input('date') ?>

        <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'image')->fileInput(['id' => 'news-image']) ?>

        <?= $form->field($model, 'image')->textarea(['id' => 'news-image-textarea', 'rows' => 6, 'placeholder' => 'Вставьте данные изображения в формате Base64', 'style' => 'display:none;']) ?>

        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

<script>
    document.getElementById('news-image').addEventListener('change', function(news) {
        const file = news.target.files[0];
        const reader = new FileReader();

        reader.onloadend = function() {
            document.getElementById('news-image-textarea').value = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        }
    });
</script>
