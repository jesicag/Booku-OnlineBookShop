<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Details;

/* @var $this yii\web\View */
/* @var $model frontend\models\Review */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="review-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'book')->textInput() ?> -->
    <?= $form->field($model, 'book')->dropDownList(
        ArrayHelper::map(Details::find()->all(),'id','title'),
        ['prompt'=>'Select Title']
    )
    ?>
    <!-- <?= $form->field($model, 'user_id')->textInput() ?> -->

    <!-- <?= $form->field($model, 'pay_id')->textInput() ?> -->

    <?= $form->field($model, 'review')->textarea(['rows' => 6]) ?>

   <!--  <?= $form->field($model, 'date')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
