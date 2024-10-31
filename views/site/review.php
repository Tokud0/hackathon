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

<div class="row">
    <?php foreach ($reviews as $review): ?>
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= Html::encode($review->author) ?> (Оценка: <?= $review->rating ?>)</h5>
                    <p class="card-text"><?= Html::encode($review->text) ?></p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
