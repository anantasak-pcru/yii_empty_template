<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Car */
/* @var $carTypeData array */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="car-form">
    <?php $form = ActiveForm::begin(); ?>

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= Html::encode($this->title) ?></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form>
            <div class="card-body">
                <?= $form->field($model, 'regisId')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'carTypeId')->widget(Select2::class, [
                    'data' => $carTypeData,
                    'options' => ['placeholder' => 'Select Type of the Cars'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ]
                ]) ?>


            </div>
            <div class="card-footer pull-right">
                <button type="submit" class="btn btn-primary float-lg-right">
                    <i class="fa fa-save"></i>
                    Save
                </button>
            </div>
        </form>
    </div>


    <?php ActiveForm::end(); ?>

</div>
