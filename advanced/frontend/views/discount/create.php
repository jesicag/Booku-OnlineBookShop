<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Discount */

$this->title = 'Create Discount';
$this->params['breadcrumbs'][] = ['label' => 'Discounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="discount-create">
	<div class="col-sm-4">
		<h3><strong><?= Html::encode($this->title) ?></strong><hr></h3>
	</div>

	<div class="col-sm-7">
		<?= $this->render('_form', [
        'model' => $model,
    ]) ?>
	</div>  
</div>
