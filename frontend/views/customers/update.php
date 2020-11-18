<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Customers */

$this->title = 'Update Customers: ' . $model->customerNumber;
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->customerNumber, 'url' => ['view', 'id' => $model->customerNumber]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="customers-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
