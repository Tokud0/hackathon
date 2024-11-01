<?php
$this->title="Экстренные номера"?>

<style>
    body {
        display: flex;
    }
    background-image {
        width: 300px; /* Ширина блока */
        height: 200px; /* Высота блока */
        background-image: url( '/web/images/car03.jpg'); /* Путь к изображению */
        background-size: cover; /* Масштабирование изображения */
        background-position: center; /* Центрирование изображения */
        border: 1px solid #ccc; /* Граница для наглядности */
        display: flex; /* Для центрирования содержимого */
        justify-content: center; /* Центрирование по горизонтали */
        align-items: center; /* Центрирование по вертикали */
        color: white; /* Цвет текста */
        font-size: 20px; /* Размер текста */
    }
    .number {
        background-color: lightgrey;
        border-radius: 1em;
        padding: 0.5em;
        display: flex;
        flex-direction: row;
        width: 40%;
        margin: 1em auto;
    }
    .title {
        font-family: "Helvetica", serif;
        font-weight: bold;
        font-size: 24pt;
        margin:0.2em 0.2em 0.2em auto;
    }
    nomer {
        font-family: "Helvetica", serif;
        font-weight: bold;
        font-size: 48pt;
        margin-top: 6em;

    }
    h1{
        font-family: "Helvetica", serif;
        font-weight: bold;
        font-size: 48pt;
        margin:0.2em 0 0.2em auto;
        justify-content: end;
        text-align: center;
    }
    a {
        text-decoration: none;
    }
    .num{
        width:20%;
        margin:1em auto;
    }
</style>
<h1 >Номера экстренных служб</h1>
<a href="tel:+77765242927">
    <div class="container number" style="background-image: url('/web/images/car03.jpg');">
        <div>
            <p class="title">Полиция</p>
            <p>Нажмите сюда, если на вас напали</p>
        </div>
        <div class="title" style="">
            <nomer>102</nomer>
        </div>
    </div>
</a>
<a href="tel:+77765242927" class="num">
    <div class="container number">
        <div>
            <p class="title">Скорая</p>
            <p>Нажмите сюда, если вам плохо</p>

        </div>
        <div class="title">
            <nomer>103</nomer>
        </div>
    </div>

</a>
<a href="tel:+77765242927">
    <div class="container number">
        <div>
            <p class="title">Пожарная</p>
            <p>Нажмите сюда, если вы горите</p>
        </div>
        <div class="title">
            <nomer>101</nomer>
        </div>
    </div>
</a>
<a href="tel:+77765242927">
    <div class="container number">
        <div>
            <p class="title">Газ</p>
            <p>Нажмите сюда, если у вас утечка газа</p>
        </div>
        <div class="title">
            <nomer>104</nomer>
        </div>
    </div>
</a>