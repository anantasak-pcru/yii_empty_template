<?php

use frontend\models\Products;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Orderdetails */
/* @var $products ArrayObject */
/* @var $form yii\widgets\ActiveForm */
/* @var $products \phpDocumentor\Reflection\Types\Object_ */
?>

<div class="orderdetails-form">

    <?= $model->orderNumber = random_int(40000,99999); ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'orderNumber')->textInput() ?>

    <?= $form->field($model, 'productCode')->dropDownList(ArrayHelper::map(Products::find()->all(), 'productCode', 'productName')); ?>

    <?= $form->field($model, 'quantityOrdered')->textInput() ?>

    <?= $form->field($model, 'priceEach')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'orderLineNumber')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
