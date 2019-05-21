<?php
use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index text-center">
    <br><br>
</div>

<div class="container">
    <div class="row">
        <hr>
        <center><h1><strong>Booku</strong></h1>
        <h4>Online Bookshop</h4></center>
        <hr><br>
        <?php
        foreach ($dataProvider-> models as $model) {
            $i = 1;
            $link = "index.php?r=details%2Fview&id=".$model->id; ?>
        <div class=" col-sm-3 col-xs-12 text-center">
            <div class=" panel panel-default">
                <div class="panel-body">

                    <img src=<?php echo ($model->picture);?> width="180" height="230">
                </div>
                <h4><?= Html::a($short_content = substr($model['title'],0,25), Html::decode($link)) ?>.. </h4>
                <h5><?= Html::a($model->author) ?></h5>
                <h5><strong>Rp <?= Html::a($model->price)?></strong></h5>
                <!-- <div class="panel-footer">
                    <button class='btn btn-default btn-sm'>AddtoCart</button>
                </div> -->
            </div>
        </div>
    <?php } ?>
    </div>
</div>