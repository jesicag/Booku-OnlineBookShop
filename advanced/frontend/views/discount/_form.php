<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use frontend\models\Category;
/* @var $this yii\web\View */
/* @var $model frontend\models\Discount */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="discount-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=
    $form->field($model, 'start_date')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Pilih Tanggal...'],
        'pluginOptions' => [
            'autoclose' => true,
            'format'=>'yyyy-mm-dd'
        ]
    ]);
    ?>

    <?=
    $form->field($model, 'due_date')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Pilih Tanggal...'],
        'pluginOptions' => [
            'autoclose' => true,
            'format'=>'yyyy-mm-dd'
        ]
    ]);
    ?>

    <?= $form->field($model, 'category')->dropDownList(
        ArrayHelper::map(Category::find()->all(),'category_name','category_name'),
        ['prompt'=>'Select Category'])
     ?>

    <?= $form->field($model, 'percent')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
