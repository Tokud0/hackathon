<?php

namespace app\models\forms;

use app\models\Review;
use Yii;
use yii\base\Model;
use yii\mongodb\Exception;

class ReviewForm extends Model
{
    public ?string $text = null;
    public ?int $rating = null;


    public function rules(): array
    {
        return [
          [['text', 'rating' ], 'required','message' => 'Это поле не может быть пустым.'],
          [['text'], 'string'],
        ];
    }
    public function attributeLabels(): array
    {
        return [
          'text'=>'Отзыв',
          'rating'=>'Оценка',
        ];
    }

    /**
     * @throws Exception
     * @throws \yii\mongodb\Exception
     */
    public function AddReview(): ?Review
    {
        if (!$this->validate()) {
            return null;
        }
        $user = Yii::$app->user->identity;
        $review = new Review();
        $review->text = $this->text;
        $review->rating = $this->rating;
        $review->author = $user->first_name . ' ' . $user->last_name;
        return $review->save() ? $review : null;

    }
}