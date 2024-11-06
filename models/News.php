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

class News extends ActiveRecord
{
    public static function collectionName()
    {
        return 'News';
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
            [['image'], 'string'],
        ];
    }

}
