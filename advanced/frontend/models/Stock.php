<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "stock".
 *
 * @property integer $stock_id
 * @property integer $book_id
 * @property integer $book_stock
 *
 * @property Cart[] $carts
 * @property Details $book
 */
class Stock extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stock';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['book_id', 'book_stock'], 'required'],
            [['book_id', 'book_stock'], 'integer'],
            [['book_id'], 'exist', 'skipOnError' => true, 'targetClass' => Details::className(), 'targetAttribute' => ['book_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'stock_id' => 'Stock ID',
            'book_id' => 'Book ID',
            'book_stock' => 'Book Stock',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarts()
    {
        return $this->hasMany(Cart::className(), ['stock_id' => 'stock_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBook()
    {
        return $this->hasOne(Details::className(), ['id' => 'book_id']);
    }
}
