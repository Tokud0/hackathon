<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Событие';
?>
<div class="notification-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Создать событие', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div id="map" style="height: 800px; width: 100%;"></div>
</div>

<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>

    var map = L.map('map').setView([54.8753, 69.1687], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
    }).addTo(map);

    <?php foreach ($notifications as $notification): ?>
    var marker = L.marker([<?= Html::encode($notification['latitude']) ?>, <?= Html::encode($notification['longitude']) ?>]).addTo(map);

    marker.bindTooltip("<?= Html::encode($notification['title']) ?>", {permanent: true, direction: "top", offset: [0, -10]});

    marker.bindPopup(`
            <strong><?= Html::encode($notification['title']) ?></strong><br>
            <?= Html::encode($notification['description']) ?><br>
            <button onclick="deleteNotification('<?= (string)$notification['_id'] ?>', marker)">Удалить</button>
        `);
    <?php endforeach; ?>

    function deleteNotification(id, marker) {
        if (!confirm('Вы уверены, что хотите удалить это событие?')) {
            return;
        }

        fetch('<?= Url::to(['notification/delete']) ?>?id=' + id, {
            method: 'POST',
            headers: {
                'X-CSRF-Token': '<?= Yii::$app->request->csrfToken ?>'
            }
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    map.removeLayer(marker);
                    alert('Событие удалено.');
                } else {
                    alert('Ошибка при удалении события.');
                }
            })
            .catch(error => console.error('Ошибка:', error));
    }
</script>
