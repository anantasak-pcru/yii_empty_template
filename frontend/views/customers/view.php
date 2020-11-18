<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Customers */

$this->title = $model->customerNumber;
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="customers-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->customerNumber], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->customerNumber], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'customerNumber',
            'customerName',
            'contactLastName',
            'contactFirstName',
            'phone',
            'addressLine1',
            'addressLine2',
            'city',
            'state',
            'postalCode',
            'country',
            'salesRepEmployeeNumber',
            'creditLimit',
        ],
    ]) ?>

</div>
