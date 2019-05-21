<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\models\Details;
use frontend\models\DetailsSearch;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DiscountSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Special Discount';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-discount">
    <center><h3><strong><?= Html::encode($this->title) ?></strong></h3></center><hr>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'start_date',
            // 'due_date',
            'category',
            // [
            // 	'header' => 'Books Title',
            //     'format'=>'raw',
            // 	'value' => function($model){
            // 		$det = Yii::$app->db->createCommand('SELECT title FROM details WHERE category='.$model->category)->execute();
            // 		return $det;
            // 	}
            // ],

            'title',
            'price',
            [
                'attribute' =>'final_cost',
                'format' => 'raw',
                'value' => function($model){
                    $per = Yii::$app->db->createCommand('SELECT percent FROM discount')->queryScalar();
                    $price = $model->price;
                    $fin = $price*$per/100;
                    $la = $price - $fin;
                    return $la;
                }
            ],
            [
                'attribute' => 'Action',
                'format' => 'raw',
                'value' => function ($model) {
                        return Html::a("Pay",['/discount/pay/'],['class' => 'btn btn-warning btn-block']);
                },
            ],

            // 'stock',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
