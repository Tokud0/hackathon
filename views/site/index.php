<?php

/** @var yii\web\View $this */
/** @var app\models\Review[] $reviews */
/* @var $events app\models\Event[] */

use yii\helpers\Html;
use yii\helpers\Url;

function toStars($rating): string
{
    $stars = str_repeat('★', $rating) . str_repeat('☆', 5 - $rating);
    return $stars;
}

$this->title = 'My Yii Application';
?>
<style>
    body {
        background-color: #f5f5f5;
        font-family: Arial, sans-serif;
    }
    h1, h2 {
        color: #9B51E0;
    }
    .card {
        border-radius: 0.75rem;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
    }
    .card-body {
        font-size: 0.9rem;
    }
    .photo img, .card img {
        border-radius: 0.5rem;
        object-fit: cover;
    }
    .btn-primary {
        background-color: #9B51E0;
        border-color: #9B51E0;
    }
    .btn-primary:hover {
        background-color: #823eb0;
        border-color: #823eb0;
    }
    .event-image {
        height: 200px;
        width: 100%;
        object-fit: cover;
    }
    .content .card-text {
        color: #555;
    }
    .card-image {
        height: 92%;
        width: 100%;
        object-fit: cover;
    }
    @media (max-width: 767px) {
        .col-md-6, .col-md-4 {
            flex: 0 0 100%;
            max-width: 100%;
        }
        .content .card {
            height: auto;
        }
        .card img {
            height: auto;
            width: 100%;
        }
    }
</style>

<main class="container mt-5 pt-5">
    <h1 class="text-center mb-4">Петропавловск</h1>

    <div class="content">
        <div class="card shadow-sm mb-4 border-light rounded" style="height: 400px;">
            <div class="row g-0 h-100">
                <div class="col-md-6 d-flex">
                    <img src="/images/photo1.jpg" class="img-fluid rounded-start card-image" alt="Петропавловск">
                </div>
                <div class="col-md-6 d-flex flex-column">
                    <div class="card-body">
                        <h5 class="card-title">Общие сведения</h5>
                        <p class="card-text">Петропавловск — это административный центр Северо-Казахстанской области, расположенный на севере Казахстана, на берегу реки Ишим. Город, основанный в 1752 году как крепость.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="card shadow-sm mb-4 border-light rounded" style="height: 400px;">
            <div class="row g-0 h-100 flex-row-reverse">
                <div class="col-md-6 d-flex">
                    <img src="/images/photo2.jpg" class="img-fluid rounded-end card-image" alt="Изображение">
                </div>
                <div class="col-md-6 d-flex flex-column">
                    <div class="card-body">
                        <h5 class="card-title">Исторические факты</h5>
                        <p class="card-text">Петропавловск —  известный своим культурным разнообразием. Здесь переплетаются казахские, русские, украинские и другие традиции, создавая уникальную атмосферу. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <h2 class="text-center mt-5">Отзывы</h2>
    <div class="row">
        <?php foreach ($reviews as $review): ?>
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm border-light rounded">
                    <div class="card-body">
                        <h5 class="card-title"><?= Html::encode($review->author) ?> (<?= toStars($review->rating) ?>)</h5>
                        <p class="card-text"><?= Html::encode($review->text) ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <h2 class="text-center mt-5">Афишы</h2>
    <div class="row">
        <?php foreach ($events as $event): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="<?= Html::encode($event->image) ?>" class="card-img-top event-image" alt="Event Image">
                    <div class="card-body">
                        <h5 class="card-title"><?= Html::encode($event->title) ?></h5>
                        <p class="card-text"><?= Html::encode($event->description) ?></p>
                        <p class="card-text"><strong><?= Html::encode($event->date) ?> | <?= Html::encode($event->location) ?></strong></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>
