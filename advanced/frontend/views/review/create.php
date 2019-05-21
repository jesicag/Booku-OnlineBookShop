<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Review */

$this->title = 'Create Review';
$this->params['breadcrumbs'][] = ['label' => 'Reviews', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="review-create">
	<div class="col-sm-2">
		<h3><strong><?= Html::encode($this->title) ?></strong></h3>
	</div>

	<div class="col-sm-8">
		<?= $this->render('_form', ['model' => $model,]) ?>
		<?=Html::a('Cancel',['/site/index/'],['class' => 'btn btn-danger']) ?>
	</div>

</div>
