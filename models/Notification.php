<?php

namespace app\models;

use Yii;
use yii\mongodb\ActiveRecord;

/**
 * @property int $_id
 * @property string $title
 * @property string $description
 * @property string $location
 * @property float $latitude
 * @property float $longitude
 * @property string $start_time
 * @property string $end_time
 */
class Notification extends ActiveRecord
{
    public static function collectionName(): string
    {
        return 'notifications';
    }

    public function attributes(): array
    {
        return [
            '_id',
            'title',
            'description',
            'location',
            'latitude',
            'longitude',

        ];
    }

    public function rules(): array
    {
        return [
            [['title', 'description', 'location', 'latitude', 'longitude', ], 'required'],
            [['description'], 'string', 'max' => 500],
            [['title', 'location'], 'string', 'max' => 100],
            [['latitude', 'longitude'], 'number'],

        ];
    }

    public function getId(): string
    {
        return (string)$this->_id;
    }

    public function addNotification($data): bool
    {
        return $this->load($data) && $this->save();
    }

    public function getAllNotifications(): array
    {
        return self::find()->all();
    }
}