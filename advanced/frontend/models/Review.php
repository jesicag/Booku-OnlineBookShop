<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "review".
 *
 * @property integer $review_id
 * @property integer $book
 * @property integer $user_id
 * @property integer $pay_id
 * @property string $review
 * @property string $date
 */
class Review extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'review';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['book', 'user_id', 'pay_id', 'review', 'date'], 'required'],
            [['book', 'user_id', 'pay_id'], 'integer'],
            [['review'], 'string'],
            [['date'], 'safe'],
            [['book'], 'exist', 'skipOnError' => true, 'targetClass' => Details::className(), 'targetAttribute' => ['book' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'review_id' => 'Review ID',
            'book' => 'Book',
            'user_id' => 'User ID',
            'pay_id' => 'Pay ID',
            'review' => 'Review',
            'date' => 'Date',
        ];
    }
}
