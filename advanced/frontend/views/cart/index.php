<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\models\Details;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CartSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Your Shopping Cart';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cart-index">
<div class="row">
        <div class="col-sm-2"><br>
            <?=Html::a("Book's Review",['/review/create/'],['class' => 'btn btn-success btn-block']) ?><br>
            <?=Html::a('Back to Home',['/site/index/'],['class' => 'btn btn-info btn-block']) ?>
        </div>
        <div class="col-sm-10">
        <h3><strong><?= Html::encode($this->title) ?></strong></h3><hr>
        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'Title of The Book',
                'value' => function($model){
                    $stock = Yii::$app->db->createCommand('SELECT stock_id FROM stock where book_id='.$model->stock_id)->queryScalar();
                    return Yii::$app->db->createCommand('SELECT title FROM details where id='. $stock)->queryScalar();
                }
            ],
            'buy_date',
            'total',
            'cost',
            [
                'attribute' => 'Status',
                'format' => 'raw',
                'value' => function($model){
                    $book_stock = Yii::$app->db->createCommand('SELECT book_stock from stock where book_id='.$model->stock_id)->queryScalar();
                    if($book_stock > 1){
                        return "<div><center><span class='label label-info'>Request</span></center></div>";
                    }else{
                        return "<div><center><span class='label label-success'>Accepted</span></center></div>";
                    }
                }
            ],
            [
                'attribute' => 'Action',
                'format' => 'raw',
                'value' => function ($model) {
                        return '<div>' .'<center>'.Html::a('Cancel', ['cart/cancel', 'id' => $model->id, 'stock' => $model->stock_id], ['class' => 'btn btn-danger','data' => ['confirm' => 'Are you sure you want to cancel this request?','method' => 'post',],]) .'</center>'.'</div>';
                    // } else{
                    //     return "<div ><strong><center>-</center></strong></div>";
                    // }
                },
            ],
            // [
            //     'attribute' => 'Review',
            //     'format' => 'raw',
            //     'value' => function($model){
            //         $book = 
            //         return '<div>' .'<center>'.Html::a('Cancel', ['cart/cancel', 'id' => $model->id, 'stock' => $model->stock_id], ['class' => 'btn btn-danger','data' => ['confirm' => 'Are you sure you want to cancel this request?','method' => 'post',],]) .'</center>'.'</div>';
            //     }
            // ]
        ],
    ]); ?>
        <div class="col-sm-10" style="text-align: right;">
            <h5><strong>Total : Rp
                <?php
                        $sum_cost = Yii::$app->db->createCommand('SELECT sum(cost) FROM cart');
                        $sum = $sum_cost->queryScalar();
                        echo $sum;
                ?>
            </strong></h5>
        </div>
        <div class="col-sm-2">
            <?=Html::a("Pay",['/cart/pay/'],['class' => 'btn btn-warning btn-block']) ?><br>
        </div>
        </div>
    </div>
</div>