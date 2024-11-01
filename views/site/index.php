<?php

/** @var yii\web\View $this */

use yii\helpers\Url;

$this->title = 'My Yii Application';
?>
<style>
    body {
        background-color: #e8e8e8;
    }
    h1 {
        color: #0dcaf0;
    }
    .content {
        margin-bottom: 30px;
    }
    .photo img {
        border-radius: 0.5rem;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

</style>
<main class="container mt-5 pt-5">
    <h1 class="text-center mb-4">Петропавловск</h1>

    <div class="content">
        <div class="card shadow-sm mb-4 border-light rounded" style="height: 400px;">
            <div class="row g-0 h-100">
                <div class="col-md-6">
                    <img src="/images/photo1.jpg" class="img-fluid rounded-start" alt="Петропавловск" style="object-fit: cover; height: 98%; width: 100%;">
                </div>
                <div class="col-md-6 d-flex flex-column">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Общие сведения</h5>
                        <p class="card-text flex-grow-1">Петропавловск — это административный центр Северо-Казахстанской области, расположенный на севере Казахстана, на берегу реки Ишим. Город, основанный в 1752 году как крепость, сегодня является важным экономическим и культурным центром региона.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="card shadow-sm mb-4 border-light rounded" style="height: 400px;">
            <div class="row g-0 h-100">
                <div class="col-md-6 order-md-2">
                    <img src="/images/photo2.jpg" class="img-fluid rounded-end" alt="Культурное разнообразие" style="object-fit: cover; height: 92%; width: 100%;">
                </div>
                <div class="col-md-6 d-flex flex-column">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Культурное разнообразие</h5>
                        <p class="card-text flex-grow-1">Петропавловск — город на севере Казахстана, известный своим культурным разнообразием. Здесь переплетаются казахские, русские, украинские и другие традиции, создавая уникальную атмосферу. Архитектура Петропавловска отражает многовековую историю: национальные казахские дома, православные храмы и купеческие здания придают городу особый колорит. Культурная жизнь насыщена событиями — работают театры, музеи и филармония. Праздники, такие как Наурыз и День города, объединяют жителей, подчеркивая богатство традиций и дружбы.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="card shadow-sm mb-4 border-light rounded" style="height: 400px;">
            <div class="row g-0 h-100">
                <div class="col-md-6">
                    <img src="/images/photo3.jpg" class="img-fluid rounded-start" alt="Природа Петропавловска" style="object-fit: cover; height: 100%; width: 100%;">
                </div>
                <div class="col-md-6 d-flex flex-column">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Природные ландшафты</h5>
                        <p class="card-text flex-grow-1">Город окружен живописными природными ландшафтами, включая леса, поля и реки. В окрестностях Петропавловска расположены природные заповедники, где можно насладиться пешими прогулками, рыбалкой и другими активными видами отдыха. Природа региона привлекает туристов и любителей активного отдыха.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="card shadow-sm mb-4 border-light rounded" style="height: 400px;">
            <div class="row g-0 h-100">
                <div class="col-md-6 order-md-2">
                    <img src="/images/photo4.jpg" class="img-fluid rounded-end" alt="Культура Петропавловска" style="object-fit: cover; height: 92%; width: 100%;">
                </div>
                <div class="col-md-6 d-flex flex-column">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Многонациональность</h5>
                        <p class="card-text flex-grow-1">Петропавловск — это многонациональный город, где проживают представители различных этнических групп, включая казахов, русских, украинцев и других. Это культурное разнообразие находит отражение в праздниках, традициях и кухне города. Местные жители гордятся своим наследием и активно участвуют в сохранении культурных традиций.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

