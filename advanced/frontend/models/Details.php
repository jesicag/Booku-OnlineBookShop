<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "details".
 *
 * @property integer $id
 * @property string $category
 * @property string $title
 * @property string $author
 * @property integer $price
 * @property string $publisher
 * @property string $language
 * @property integer $page
 * @property string $review
 * @property string $picture
 *
 * @property Category $category0
 * @property Stock[] $stocks
 */
class Details extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category', 'title', 'author', 'price', 'publisher', 'language', 'page', 'review', 'picture'], 'required'],
            [['price', 'page'], 'integer'],
            [['review'], 'string'],
            [['category'], 'string', 'max' => 30],
            [['title', 'author', 'publisher', 'language'], 'string', 'max' => 100],
            [['picture'], 'string', 'max' => 240],
            [['category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category' => 'category_name']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category' => 'Category',
            'title' => 'Title',
            'author' => 'Author',
            'price' => 'Price',
            'publisher' => 'Publisher',
            'language' => 'Language',
            'page' => 'Page',
            'review' => 'Review',
            'picture' => 'Picture',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory0()
    {
        return $this->hasOne(Category::className(), ['category_name' => 'category']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStocks()
    {
        return $this->hasMany(Stock::className(), ['book_id' => 'id']);
    }
}
