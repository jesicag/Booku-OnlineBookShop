<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Details */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="details-view">
    <center>
    <h3><strong><?= Html::encode($this->title) ?></strong></h3>
    <?php $user = Yii::$app->user->id; 
        if($user == '1'){?>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary'])?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => ['confirm' => 'Are you sure you want to delete this item?','method' => 'post',],])?>
        <?php }else{
            echo "<hr>";
        }
          ?>
      </center><br>

      <div class="col-sm-10">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'category',
                'author',
                'price',
                'publisher',
                'language',
                'page',
                'review:ntext',
            ],
            ])?> 
    </div>

    <div class="col-sm-2">
        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'header' => '<center>Action</center>',
                'format' => 'raw',
                'value' => function($model) {
                    if($model->book_stock != 1){
                        return Html::a('<center><button class="btn btn-success btn-block">Buy</button></center>', ['buy', 'id'=>$model->stock_id, 'book_id'=>$model->book_id]);
                    }else{
                        return ' ';
                    }
                }
            ],
        ], ]);?>
    </div>
</div>
