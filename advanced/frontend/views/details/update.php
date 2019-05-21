<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Details */

$this->title = 'Update Details: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="details-update">
	<div class="col-sm-3">
		<h3><strong><?= Html::encode($this->title) ?></strong></h3>	
	</div>
	<div class="col-sm-8">
		<?= $this->render('_form', [
        'model' => $model,
    ]) ?>
	</div>
</div>
