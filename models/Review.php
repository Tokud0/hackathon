<?php

namespace app\models;

use Yii;
use yii\mongodb\ActiveRecord;
use yii\helpers\Html;


/**
 * @property int $_id
 * @property string $text
 * @property int $rating
 * @property string $author

 */

class Review extends ActiveRecord
{

    public  static function collectionName():string
    {
        return 'Review';
    }
    public function attributes(): array
    {
        return [
            '_id',
            'text',
            'rating',
            'author',
        ];
    }
    public function rules():array
    {
        return [
            [['text', 'rating', 'author'], 'required'],
            [['text'], 'string', 'max' => 250],
            [['author'], 'string', 'max' => 50],
            [['rating'], 'integer'],
        ];
    }
    public function getId(): string
    {
        return (string) $this->_id;
    }
}