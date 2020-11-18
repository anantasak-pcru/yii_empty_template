<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CustomersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customers-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'customerNumber') ?>

    <?= $form->field($model, 'customerName') ?>

    <?= $form->field($model, 'contactLastName') ?>

    <?= $form->field($model, 'contactFirstName') ?>

    <?= $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'addressLine1') ?>

    <?php // echo $form->field($model, 'addressLine2') ?>

    <?php // echo $form->field($model, 'city') ?>

    <?php // echo $form->field($model, 'state') ?>

    <?php // echo $form->field($model, 'postalCode') ?>

    <?php // echo $form->field($model, 'country') ?>

    <?php // echo $form->field($model, 'salesRepEmployeeNumber') ?>

    <?php // echo $form->field($model, 'creditLimit') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
