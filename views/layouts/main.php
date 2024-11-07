<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/images/city-2-svgrepo-com.svg')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>

    <title>Мой город </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>

    </style>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header" class="fancy-font bg-light">
    <?php
    NavBar::begin([
        'brandImage' => '/images/loog.svg',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-expand-md navbar-light bg-light tex fixed-top']
    ]);

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav w-50 mx-auto'],
        'items' => [
            ['label' => 'Новости', 'url' => Yii::$app->user->isGuest ? Url::to(['/site/login']) : ['/news/index'], 'linkOptions' => ['class' => 'btn btn-dark']],
            ['label' => 'Афиша', 'url' => Yii::$app->user->isGuest ? Url::to(['/site/login']) : ['/event/index'], 'linkOptions' => ['class' => 'btn btn-dark']],
            ['label' => 'Отзывы', 'url' => Yii::$app->user->isGuest ? Url::to(['/site/login']) : ['/site/review'], 'linkOptions' => ['class' => 'btn btn-dark']],
            ['label' => 'Карты', 'url' => Yii::$app->user->isGuest ? Url::to(['/site/login']) : ['/site/map'], 'linkOptions' => ['class' => 'btn btn-dark']],
            ['label' => 'Справочник', 'url' => Yii::$app->user->isGuest ? Url::to(['/site/login']) : ['/site/guide'], 'linkOptions' => ['class' => 'btn btn-dark']],
        ],
    ]);

    echo '<div class="container ml-auto d-flex justify-content-center align-items-center w-50 text-decoration-none" style="gap: 15px;">'; // Изменено на justify-content-center
    echo Html::a(Html::button('Экстренный вызов', [
        'class' => ' nav-link btn  ',
        'style' => ' color: red !important; border: none !important;'
    ]), Url::to(['/site/emergency']));

    if (!Yii::$app->user->isGuest) {
        $user = Yii::$app->user->identity;
        $coins = $user->coins ?? 0;
        echo Html::a('Баллы: ' . Html::encode($coins), ['site/coins'], [
            'class' => 'text-decoration-none',
        ]);
    }

    echo '<div>';
    if (Yii::$app->user->isGuest) {
        echo Html::a('Войти', ['/site/login'], ['class' => 'nav-link btn btn-dark']);
    } else {
        echo Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline']);
        echo Html::submitButton(
            'Выйти (' . Yii::$app->user->identity->first_name . ')',
            ['class' => 'nav-link btn btn-light logout']
        );
        echo Html::endForm();
    }
    echo '</div>';

    echo '</div>';
    NavBar::end();
    ?>
</header>


<main id="main" class="flex-shrink-0 fancy-font" role="main">
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer col 12 d-flex">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <?php
            echo Html::img('@web/images/loog.svg', ['alt'=>Yii::$app->name, 'style'=>'height:30px;']);
            ?>
        </div>
        <div class="text-center mx-auto mt-3">
            <p>Email: danilchaykin@bk.ru</p>
            <p>Телефон: +7 776 524 2927</p>
        </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
