<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = ' Find Books by Category';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="details-index">

    <center><h3><strong><?= Html::encode($this->title) ?></strong></h3></center><hr>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<!--     <p>
        <?= Html::a('Create Details', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->
    <div class="container">
    <div class="row">
        <?php $data = \yii\helpers\ArrayHelper::map(\frontend\models\Details::find()->all(), 'category', 'category'); ?>
    
     <?= Html::dropDownList('group', null, $data,['prompt'=>'- Choose Category -','onchange'=>'
    $.pjax.reload({
        url: "'.Url::to().'&detailsSearch[category]="+$(this).val(),
        container: "#pjax-gridview",
        timeout: 1000,
    });
    
','class'=>'form-control']) ?>
 
    <?php Pjax::begin(['id' => 'pjax-gridview']) ?><br>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'category',
            'title',
            'author',
            'price',
            'publisher',
            // 'language',
            // 'page',
            // 'review:ntext',
            // 'picture',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end() ?>
    </div>
    </div>
</div>
