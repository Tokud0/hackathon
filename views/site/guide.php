<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = "Справочник"; ?>
<head>
    <title>Справочник</title>
    <style>
        body {
            margin: 0;
            padding-top: 70px;
            background-color: #f5f5f5;
        }

        h1 {
            font-size: 36px;
            color: #333;
        }
        .subtitle {
            font-size: 18px;
            color: #666;
            margin-bottom: 20px;
        }
        .tabs {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }
        .tab {
            padding: 10px 20px;
            margin-right: 10px;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 10px;
        }
        .tab.active {
            background-color: #9B51E0;
            color: #fff;
        }
        .section-title {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }
        .card {
            display: flex;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 20px;
            overflow: hidden;
            flex-direction: row;
        }
        .card img {
            width: 200px;
            height: 150px;
            object-fit: cover;
        }
        .card-content {
            padding: 20px;
            flex: 1;
        }
        .card-title {
            font-size: 20px;
            color: #333;
            margin-bottom: 10px;
        }
        .card-text {
            font-size: 14px;
            color: #666;
            margin-bottom: 5px;
        }
        @media (max-width: 768px) {
            .container {
                width: 95%;
                padding: 10px;
            }
            h1 {
                font-size: 28px;
            }
            .subtitle {
                font-size: 16px;
            }
            .tabs {
                flex-direction: column;
            }
            .tab {
                margin-right: 0;
                margin-bottom: 10px;
            }
            .card {
                flex-direction: column;
            }
            .card img {
                width: 100%;
                height: auto;
            }
        }
    </style>
    <script>
        function showSection(section) {
            var allSections = document.querySelectorAll('.section');
            var tabs = document.querySelectorAll('.tab');

            allSections.forEach(function(sec) {
                sec.style.display = 'none';
            });

            tabs.forEach(function(tab) {
                tab.classList.remove('active');
            });

            document.getElementById(section).style.display = 'block';
            document.querySelector('[data-tab="' + section + '"]').classList.add('active');
        }
    </script>
</head>
<body>
<div class="container">
    <h1>Справочник</h1>
    <div class="subtitle">Справочник организаций и учреждений города Петропавловск</div>
    <div class="tabs">
        <div class="tab active" data-tab="medicine" onclick="showSection('medicine')">Медицина</div>
        <div class="tab" data-tab="government" onclick="showSection('government')">Гос.учреждения</div>
        <div class="tab" data-tab="education" onclick="showSection('education')">Образование</div>
        <div class="tab" data-tab="shopping" onclick="showSection('shopping')">Торговые центры</div>
    </div>

    <div id="medicine" class="section" style="display: block;">
        <div class="section-title">Медицина</div>
        <div class="card">
            <img alt="Image of a hospital building" src="/images/3gorodskaya.png"/>
            <div class="card-content">
                <div class="card-title">Третья городская поликлиника</div>
                <div class="card-text">Третья городская поликлиника города петропавловск</div>
                <div class="card-text">ул. Ж. Кизатова 7 «А»</div>
                <div class="card-text">пн-пт: 8:00 по 20:00</div>
                <div class="card-text">номер:+7 (7152) 62-55-55</div>
            </div>
        </div>
        <div class="card">
            <img alt="Image of a hospital building" src="/images/boltitsa.jpg"/>
            <div class="card-content">
                <div class="card-title">Областная больница</div>
                <div class="card-text">Управление здравоохранения акимата Северо-Казахстанской области</div>
                <div class="card-text">ул. Брусиловского 20</div>
                <div class="card-text">пн-пт: 08:00-17:00</div>
                <div class="card-text">номер:+7 (7152) 63‒03‒80</div>
            </div>
        </div>
        <div class="card">
            <img alt="Image of a hospital building" src="/images/zasorken.jpg"/>
            <div class="card-content">
                <div class="card-title">Поликлиника "Жас Оркен"</div>
                <div class="card-text">много профильнная поликлиника Жас оркен</div>
                <div class="card-text">Улица Ивана Порфирьева, 55</div>
                <div class="card-text">пн-пт: 08:00-20:00</div>
                <div class="card-text">номер:+7 (7152) 62-55-55</div>
            </div>
        </div>
    </div>

    <div id="government" class="section" style="display: none;">
        <div class="section-title">Гос.учреждения</div>
        <div class="card">
            <img alt="Image of a hospital building" src="/images/tson.jpeg"/>
            <div class="card-content">
                <div class="card-title">ЦОН</div>
                <div class="card-text">Центр обслцживания населения</div>
                <div class="card-text">ул. Ауэзова 157</div>
                <div class="card-text">пн-пт: 09:00-20:00; сб: 9:00-13:00</div>
                <div class="card-text">номер:+7 (7152) 33 88 81</div>
            </div>
        </div>
        <div class="card">
            <img alt="Image of a hospital building" src="/images/gorakimat.jpg"/>
            <div class="card-content">
                <div class="card-title">Городской акимат<</div>
                <div class="card-text">Городской акимат города Петропавловск</div>
                <div class="card-text">ул. Конституции Казахстана 23</div>
                <div class="card-text">пн-пт 09:00-18:30</div>
                <div class="card-text">номер:+7 (7152) 46-31-62</div>
            </div>
        </div>
        <div class="card">
            <img alt="Image of a hospital building" src="/images/nalogovaya.jpg"/>
            <div class="card-content">
                <div class="card-title">Налоговая служба</div>
                <div class="card-text">Налоговая служба и служба финансов Петропавловска</div>
                <div class="card-text">ул. Конституции Казахстана 23</div>
                <div class="card-text">пн-пт: 09:00–18:30</div>
                <div class="card-text">номер:+7 (7152) 46‒70‒22</div>
            </div>
        </div>
    </div>

    <div id="education" class="section" style="display: none;">
        <div class="section-title">Образование</div>
        <div class="card">
            <img alt="Image of a hospital building" src="/images/images.jpg"/>
            <div class="card-content">
                <div class="card-title">СКУ им. Манаша Козыбаева</div>
                <div class="card-text">Севере-Казахстанский университет</div>
                <div class="card-text">улица Абая, 18</div>
                <div class="card-text">пн-пт: 09:00–19:00, сб: 09:00-13:00</div>
                <div class="card-text">номер:+7 715 249 33 42</div>
            </div>
        </div>
        <div class="card">
            <img alt="Image of a hospital building" src="/images/college.jpg"/>
            <div class="card-content">
                <div class="card-title">Высший колледж имени Магжана Жумабаева</div>
                <div class="card-text">Высший педагогичейский колледж</div>
                <div class="card-text">улица Абая, 28</div>
                <div class="card-text">пн-пт: 09:00–19:00, сб: 09:00-13:00</div>
                <div class="card-text">номер:+7 (7152) 36 91 36</div>
            </div>
        </div>
    </div>

    <div id="shopping" class="section" style="display: none;">
        <div class="section-title">Торговые центры</div>
        <div class="card">
            <img alt="" src="/images/dostyk.jpg"/>
            <div class="card-content">
                <div class="card-title">Достык молл</div>
                <div class="card-text">Торгово Развлекательный Центр "DOSTYQ mall "</div>
                <div class="card-text">Улица Магжана Жумабаева, 91</div>
                <div class="card-text">Ежедневно : 10:00-22:00 </div>
            </div>
        </div>
        <div class="card">
            <img alt="" src="/images/city mall.jpg"/>
            <div class="card-content">
                <div class="card-title">Сити молл</div>
                <div class="card-text">Торгово Развлекательный Центр "City Mall"</div>
                <div class="card-text">Улица Шокана Уалиханова, 56</div>
                <div class="card-text">Ежедневно : 09:00-23:00</div>
            </div>
        </div>
    </div>


</div>
</body>
