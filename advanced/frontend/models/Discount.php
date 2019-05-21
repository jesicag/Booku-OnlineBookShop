<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "discount".
 *
 * @property integer $id
 * @property string $start_date
 * @property string $due_date
 * @property string $category
 * @property integer $percent
 * @property integer $final_cost
 */
class Discount extends \yii\db\ActiveRecord
{
    public $seq;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'discount';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['start_date', 'due_date', 'category', 'percent', 'final_cost'], 'required'],
            [['start_date', 'due_date'], 'safe'],
            [['percent', 'final_cost'], 'integer'],
            [['category'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'start_date' => 'Start Date',
            'due_date' => 'Due Date',
            'category' => 'Category',
            'percent' => 'Percent',
            'final_cost' => 'Final Cost',
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
