<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

$this->registerJs("
    $('#buy-ticket-btn').on('click', function(event) {
        event.preventDefault();
        if (confirm('Вы уверены, что хотите купить билет за 100 монет?')) {
            window.location.href = $(this).data('url');
        }
    });
", View::POS_READY);
?>

<div class="container mt-4">
    <div class="card" style="width: 18rem;">
        <div class="card-header">
            Покупка билета
        </div>
        <div class="card-body">
            <h5 class="card-title">Билет на автобус</h5>
            <p class="card-text">Стоимость билета — 100 монет. Нажмите кнопку ниже, чтобы приобрести билет.</p>
            <div class="buy-ticket-section">
                <?= Html::button('Купить билет', [
                    'id' => 'buy-ticket-btn',
                    'class' => 'btn btn-primary',
                    'data-url' => Url::to(['site/buy-ticket'])
                ]) ?>
            </div>
        </div>

    </div>
</div>
