<?php

namespace app\site;
use yii\helpers\Html;
use yii\helpers\Url;

?>
<style>
    body {
        background-color: #f8f9fa;
    }
    .card {
        height: 400px;
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s;
        justify-content: center;
        align-items: center;
    }
    .card:hover {
        transform: translateY(-5px);
    }
    .card-title {
        font-weight: bold;
    }
    .btn-custom {
        background-color:#9B51E0;
        color: white;
    }
    .btn-custom:hover {
        background-color: #a24eec;
    }
</style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <h5 class="card-title">Информационная Карта </h5>
                        <p class="card-text">Эта карта сделанная для пометок различных событий в нашем городе</p>
                    </div>
                    <?php echo Html::button('Перейти к карте', [
                        'class' => 'btn btn-custom',
                        'onclick' => "location.href='" . Url::to(['notification/index']) . "'"
                    ]); ?>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <h5 class="card-title">Карта с местоположением заведений</h5>
                        <p class="card-text">Это карта содержит местоположения различных заведений : учебных , развлекательных и так далее .</p>
                    </div>
                    <?php echo Html::button('Перейти к карте', [
                        'class' => 'btn btn-custom',
                        'onclick' => "location.href='" . Url::to(['places/index']) . "'"
                    ]); ?>                </div>
            </div>
        </div>
    </div>
</div>
