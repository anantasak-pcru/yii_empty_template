<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CustomersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customers-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Customers', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'customerNumber',
            'customerName',
            'contactLastName',
            'contactFirstName',
            'phone',
            //'addressLine1',
            //'addressLine2',
            //'city',
            //'state',
            //'postalCode',
            //'country',
            //'salesRepEmployeeNumber',
            //'creditLimit',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
