<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $events app\models\Event[] */

$this->title = 'Афиша Событий';
?>
<div class="event-index">
    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->user->identity->mail === 'danilchaikin@mail.ru'): ?>
        <p>
            <?= Html::a('Добавить Событие', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php endif; ?>

    <div class="container">
        <div class="row d-flex align-items-stretch">
            <?php foreach ($events as $event): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="<?= Html::encode($event->image) ?>" class="card-img-top" alt="Event Image" style="max-height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title"><?= Html::encode($event->title) ?></h5>
                            <p class="card-text"><?= Html::encode($event->description) ?></p>
                            <p class="card-text"><strong> <?= Html::encode($event->date) ?> | <?= Html::encode($event->location) ?></strong></p>
                            <?php if (Yii::$app->user->identity->mail === 'danilchaikin@mail.ru'): ?>
                                <?= Html::a('Удалить', ['delete', 'id' => (string)$event->_id], [
                                    'class' => 'btn btn-danger',
                                    'data' => [
                                        'confirm' => 'Вы уверены, что хотите удалить это событие?',
                                        'method' => 'post',
                                    ],
                                ]) ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
