<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title="Справочник"?>
<nav class="navbar navbar-expand-lg navbar-light bg-light w-50">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#medicine">Медицина</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#government">Гос.учреждения</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#education">Образование</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#malls">Торговые центры</a>
        </li>
        <li class="nav-item">
            <?php echo Html::button('Карта', [
                'class' => 'btn btn-custom',
                'onclick' => "location.href='" . Url::to(['places/index']) . "'"
            ]); ?>
        </li>



    </ul>
</nav>
<h1 id="medicine">Медицина</h1>
<div class="card" style="width: 40rem;">
    <img src="/images/3gorodskaya.png" class="card-img-top" alt="Третья городская поликлиника">
    <div class="card-body">
        <h5 class="card-title">Третья городская поликлиника</h5>
        <p class="card-text">ул. Ж. Кизатова 7 «А»</p>
        <p class="card-text">Пн - Пт: 8:00 по 20:00</p>
        <p class="card-text">+7 (7152) 62-55-55</p>
        <a href="https://poliklinika.sko.kz/ru/" class="btn btn-primary">На сайт</a>
    </div>
</div>

<div class="card" style="width: 40rem;">
    <img src="/images/boltitsa.jpg" class="card-img-top" alt="ЦОН">
    <div class="card-body">
        <h5 class="card-title">Областная больница</h5>
        <p class="card-text">ул. Брусиловского 20</p>
        <p class="card-text">Круглосуточно; Администрация 8:00-17:00</p>
        <p class="card-text">+7 (7152) 63‒03‒80</p>
        <a href="#" class="btn btn-primary">На сайт</a>
    </div>
</div>

<div class="card" style="width: 40rem;">
    <img src="/images/zasorken.jpg" class="card-img-top" alt="ЦОН">
    <div class="card-body">
        <h5 class="card-title">Поликлиника "Жас Оркен"</h5>
        <p class="card-text">Улица Ивана Порфирьева, 55</p>
        <p class="card-text">Пн-Пт: 08:00-20:00</p>
        <p class="card-text">+7 (7152) 62-55-55</p>
        <a href="#" class="btn btn-primary">На сайт</a>
    </div>
</div>

<h1 id="government"> Гос. учреждения </h1>
<div class="card" style="width: 40rem;">
    <img src="/images/tson.jpeg" class="card-img-top" alt="ЦОН">
    <div class="card-body">
        <h5 class="card-title">ЦОН</h5>
        <p class="card-text">ул. Ауэзова 157</p>
        <p class="card-text">Пн-Пт: 09:00-20:00; Сб: 9:00-13:00</p>
        <p class="card-text">+7 (7152) 33 88 81</p>
        <a href="https://gov4c.kz" class="btn btn-primary">На сайт</a>
    </div>
</div>
<div class="card" style="width: 40rem;">
    <img src="/images/gorakimat.jpg" class="card-img-top" alt="ЦОН">
    <div class="card-body">
        <h5 class="card-title">Городской акимат</h5>
        <p class="card-text">ул. Конституции Казахстана 23</p>
        <p class="card-text">Круглосуточно</p>
        <p class="card-text">+7 (7152) 46-31-62</p>
        <a href="#" class="btn btn-primary">На сайт</a>
    </div>
</div>
<div class="card" style="width: 40rem;">
    <img src="/images/nalogovaya.jpg" class="card-img-top" alt="ЦОН">
    <div class="card-body">
        <h5 class="card-title">Налоговая служба</h5>
        <p class="card-text">ул. Конституции Казахстана 23</p>
        <p class="card-text">Пн-Пт: 09:00–18:30, обед 13:00-14:00</p>
        <p class="card-text">+7 (7152) 46‒70‒22</p>
        <a href="#" class="btn btn-primary">На сайт</a>
    </div>
</div>
<h1 id="education">Образование</h1>
<div class="card" style="width: 40rem;">
    <img src="/images/images.jpg" class="card-img-top" alt="ЦОН">
    <div class="card-body">
        <h5 class="card-title">СКУ им. Манаша Козыбаева</h5>
        <p class="card-text">улица Абая, 18</p>
        <p class="card-text">Пн-Пт: 09:00–19:00, Сб: 09:00-13:00</p>
        <p class="card-text">+7 715 249 33 42</p>
        <a href="https://ku.edu.kz" class="btn btn-primary">На сайт</a>
    </div>
</div>
<div class="card" style="width: 40rem;">
    <img src="/images/college.jpg" class="card-img-top" alt="ЦОН">
    <div class="card-body">
        <h5 class="card-title">Высший колледж имени Магжана Жумабаева</h5>
        <p class="card-text">улица Абая, 28</p>
        <p class="card-text">Пн-Пт: 09:00–19:00, Сб: 09:00-13:00</p>
        <p class="card-text">+7 (7152) 36 91 36 </p>
        <a href="#" class="btn btn-primary">На сайт</a>
    </div>
</div>
<h1 id="malls">Торговые центры</h1>
<div class="card" style="width: 40rem;">
    <img src="/images/city mall.jpg" class="card-img-top" alt="ЦОН">
    <div class="card-body">
        <h5 class="card-title">Сити Молл</h5>
        <p class="card-text">улица Ш. Уалиханова 56</p>
        <p class="card-text">10:00–22:00</p>
        <p class="card-text">+7 (7152) 500‒200</p>
            <a href="https://instagram.com/trc.citymall_petropavlovsk" class="btn btn-primary">На сайт</a>
    </div>
</div>
<div class="card" style="width: 40rem;">
    <img src="/images/dostyk.jpg" class="card-img-top" alt="ЦОН">
    <div class="card-body">
        <h5 class="card-title">Достык Молл</h5>
        <p class="card-text">ул. Магжана Жумабаева 91</p>
        <p class="card-text">10:00–22:00</p>
        <p class="card-text">+7 (705) 756 9777</p>
        <a href="#" class="btn btn-primary">На сайт</a>
    </div>
</div>