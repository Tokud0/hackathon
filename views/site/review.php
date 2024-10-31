<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $reviews app\models\Review[] */

$this->title = 'Отзывы';
?>

<h1><?= Html::encode($this->title) ?></h1>

<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success">
        <?= Yii::$app->session->getFlash('success') ?>
    </div>
<?php endif; ?>

<div class="review-list">
    <?php foreach ($reviews as $review): ?>
        <div class="review-item">
            <h3><?= Html::encode($review->author) ?> (Оценка: <?= $review->rating ?>)</h3>
            <p><?= Html::encode($review->text) ?></p>
        </div>
        <hr>
    <?php endforeach; ?>
</div>
