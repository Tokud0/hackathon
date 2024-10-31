<?php

namespace app\models;

use Yii;
use yii\mongodb\ActiveRecord;
use yii\web\NotFoundHttpException;

/**
 * @property string $_id
 * @property string $title
 * @property string $description
 * @property string $date
 * @property string $location
 * @property string $image
 */

class Event extends ActiveRecord
{
    public static function collectionName()
    {
        return 'Event';
    }

    public function attributes(): array
    {
        return [
            '_id',
            'title',
            'description',
            'date',
            'location',
            'image',
        ];
    }

    public function rules(): array
    {
        return [
            [['title', 'description', 'date', 'location', 'image'], 'required'],
            [['description'], 'string'],
            [['title', 'location'], 'string', 'max' => 255],
            [['date'], 'date', 'format' => 'php:Y-m-d'],
            [['image'], 'string'], // Убедитесь, что это поле объявлено как строка
        ];
    }

}
