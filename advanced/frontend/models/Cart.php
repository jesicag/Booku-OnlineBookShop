<?php

namespace frontend\models;

use Yii;


/**
 * This is the model class for table "cart".
 *
 * @property string $id
 * @property integer $user_id
 * @property integer $stock_id
 * @property integer $total
 * @property string $buy_date
 * @property integer $cost
 */
class Cart extends \yii\db\ActiveRecord
{
    public $seq;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cart';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'stock_id', 'total', 'buy_date', 'cost'], 'required'],
            [['user_id', 'stock_id', 'total', 'cost'], 'integer'],
            [['buy_date'], 'safe'],
            [['stock_id'], 'exist', 'skipOnError' => true, 'targetClass' => Stock::className(), 'targetAttribute' => ['stock_id' => 'stock_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'stock_id' => 'Stock ID',
            'total' => 'Total',
            'buy_date' => 'Buy Date',
            'cost' => 'Cost',
        ];
    }

    public function calculate(){
        $sum = $this->cost+=$this->cost;
    }

    function generateSequence($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        
        $this->seq = "booku-" . $randomString;
    }
}
