<?php
$this->title="Экстренные номера"?>

<style>
    body {
        display: flex;
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
    }
    nomer {
        font-family: "Helvetica", serif;
        font-weight: bold;
        font-size: 48pt;
    }
    a {
        text-decoration: none;

    }
</style>
<nomer>Номера экстренных служб</nomer>
    <a href="tel:+77765242927">
        <div class="container number">
            <div>
                <p class="title">Полиция</p>
                <p>Звоните сюда, если на вас напали</p>
            </div>
            <div class="title" style="">
                <nomer>102</nomer>
            </div>
        </div>
    </a>
<a href="tel:+77765242927">
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
