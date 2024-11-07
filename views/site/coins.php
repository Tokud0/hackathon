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

<div class="container mt-5 pt-5">
    <div class="card shadow-sm mb-4 border-light rounded" style="width: 100%; max-width: 400px; margin: 0 auto;">
        <div class="card-header text-center text-white bg-purple">
            Покупка билета
        </div>
        <div class="card-body text-center">
            <h5 class="card-title">Билет на автобус</h5>
            <p class="card-text">Стоимость билета — 100 монет. Нажмите кнопку ниже, чтобы приобрести билет.</p>
            <div class="buy-ticket-section mt-3">
                <?= Html::button('Купить билет', [
                    'id' => 'buy-ticket-btn',
                    'class' => 'btn btn-primary custom-btn',
                    'data-url' => Url::to(['site/buy-ticket'])
                ]) ?>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border-radius: 0.75rem;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
    }
    .bg-purple {
        background-color: #9B51E0;
        color: #fff;
        font-weight: bold;
        font-size: 1.25rem;
        border-radius: 0.75rem 0.75rem 0 0;
    }
    .card-body {
        font-size: 1rem;
        color: #555;
    }
    .custom-btn {
        background-color: #9B51E0;
        border: none;
        padding: 0.5rem 1.5rem;
        font-size: 1rem;
        transition: background-color 0.3s ease;
    }
    .custom-btn:hover {
        background-color: #823eb0;
    }
</style>
