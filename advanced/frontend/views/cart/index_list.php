<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\models\Book;
use yii\helpers\Url;



/* @var $this yii\web\View */
/* @var $searchModel frontend\models\LoanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'All Carts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cart-index">
    <div class="col-sm-2"><br>
        <?=Html::a("Book's Payment",['/site/index/'],['class' => 'btn btn-primary btn-block']) ?><br>
        <?=Html::a("Book's Review",['/review/index/'],['class' => 'btn btn-info btn-block']) ?><br>
    </div>
    <div class="col-sm-10">
        <h3><strong><?= Html::encode($this->title) ?></strong></h3>
    <hr><br>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!-- <?=Html::a('List Expired',['/loan/expired/'],['class' => 'btn btn-success']) ?>
    <?=Html::a('List Unexpired',['/loan/unexpired/'],['class' => 'btn btn-success']) ?> -->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => 'Title',
                'value' => function($data){
                    $stock = Yii::$app->db->createCommand('SELECT stock_id FROM stock where book_id='.$data->stock_id)->queryScalar();

                    return Yii::$app->db->createCommand('SELECT title FROM details where id='. $stock)->queryScalar();
                }
            ],
            [
                'label' => 'Buyer Name',
                'value' => function($data){
                    $member_id = Yii::$app->db->createCommand('SELECT id FROM user where id=' . $data['user_id'])->queryScalar();

                    return Yii::$app->db->createCommand('SELECT username FROM user where id=' . $member_id)->queryScalar(); 
                }
            ],
            'buy_date',
            [
                'header' => '<center>Status</center>',
                'format' => 'raw',
                'value' => function ($model) {
                    $book_stock = Yii::$app->db->createCommand('SELECT book_stock from stock where book_id='.$model->stock_id)->queryScalar();
                    if($model->buy_date == '0000-00-00' && $book_stock > 1){
                        return "<div><center><span class='label label-info'>Request</span></center></div>";
                    }else{
                        return "<div><center><span class='label label-success'>Accepted</span></center></div>";
                    }
                },
            ],
            [
                'header' => '<center>Action</center>',
                'format' => 'raw',
                'value'=>function($model){
                    $book_stock = Yii::$app->db->createCommand('SELECT book_stock from stock where book_id='.$model->stock_id)->queryScalar();
                     if ($book_stock > 1) {
                        return '<div><center>'. Html::a('Approve', ['cart/approve','id'=>$model->id],['class' => 'btn btn-success']). '   ' . Html::a('Reject',['cart/reject', 'id' => $model->id,'stock' => $model->stock_id],['class' => 'btn btn-danger']). '</center></div>';  
                    } else{
                        return "<div ><strong><center>-</center></strong></div>";
                    }
                }
            ],

            [
                'header' => '<center>Detail</center>',
                'format' => 'raw',
                'value' => function ($model) {
                    return '<div><center>'. Html::a('<center>view</center>', [
                        'cart/view','id'=>$model->id],
                        ['class' => 'btn btn-default']).'</center></div>';
                },
            ], 
            
        ],
    ]); ?>

    </div>
</div>
