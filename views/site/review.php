<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $reviews app\models\Review[] */

$this->title = 'Отзывы';
function toStars($rating): string
{
    if ($rating==0){
        $stars="☆☆☆☆☆";}
    elseif ($rating==1){
        $stars='★☆☆☆☆';
    }
    elseif ($rating==2){
        $stars='★★☆☆☆';
    }
    elseif ($rating==3){
        $stars='★★★☆☆';
    }
    elseif ($rating==4){
        $stars='★★★★☆';
    }
    elseif ($rating==5){
        $stars='★★★★★';
    }
    return $stars;
}
?>

<h1 class="d-flex justify-content-between align-items-center">
    <?= Html::encode($this->title) ?>
    <?= Html::a('Добавить отзыв', ['/site/addreview'], ['class' => 'btn btn-primary']) ?>
</h1>

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
                    <h5 class="card-title"><?= Html::encode($review->author) ?> (<?= toStars($review->rating)?>)</h5>
                    <p class="card-text"><?= Html::encode($review->text) ?></p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
