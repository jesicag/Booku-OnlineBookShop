<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DiscountSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Discount';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="discount-index">
    <div class="col-sm-2"><br>
        <p><?= Html::a('Create Discount', ['create'], ['class' => 'btn btn-success']) ?></p>
    </div>
    <div class="col-sm-10">
        <h3><strong><?= Html::encode($this->title) ?></strong></h3><hr>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'start_date',
            'due_date',
            'category',
            'percent',
            // 'stock',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    </div>
</div>
