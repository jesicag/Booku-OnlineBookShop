<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Details */

$this->title = 'Create Details';
$this->params['breadcrumbs'][] = ['label' => 'Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="details-create">
	<div class="col-sm-2">
		<h3><strong><?= Html::encode($this->title) ?></strong></h3><hr>
	</div>
	<div class="col-sm-9"><br>
		<?= $this->render('_form', [
        'model' => $model,
    ]) ?>
	</div>
</div>
