<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Создать Место';
$this->params['breadcrumbs'][] = ['label' => 'Место', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notification-create">
    <h1><?= Html::encode($this->title) ?></h1>

    <div id="map" style="height: 400px; width: 100%;"></div>

    <div class="notification-form">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
        <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'latitude')->hiddenInput(['id' => 'latitude'])->label(false) ?>
        <?= $form->field($model, 'longitude')->hiddenInput(['id' => 'longitude'])->label(false) ?>



        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
    var map = L.map('map').setView([54.8753, 69.1687], 14);


    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
    }).addTo(map);

    var marker;

    map.on('click', function(e) {
        var lat = e.latlng.lat;
        var lng = e.latlng.lng;

        if (marker) {
            map.removeLayer(marker);
        }

        marker = L.marker([lat, lng]).addTo(map).bindPopup("Широта: " + lat + "<br>Долгота: " + lng).openPopup();

        document.getElementById('latitude').value = lat;
        document.getElementById('longitude').value = lng;

        getLocation(lat, lng);
    });

    function getLocation(lat, lng) {
        fetch('https://nominatim.openstreetmap.org/reverse?format=json&lat=' + lat + '&lon=' + lng)
            .then(response => response.json())
            .then(data => {
                if (data && data.display_name) {
                    document.getElementById('notification-location').value = data.display_name;
                }
            })
            .catch(error => console.error('Ошибка:', error));
    }
</script>
