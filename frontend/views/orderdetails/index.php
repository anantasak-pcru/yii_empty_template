<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\OrderdetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orderdetails';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orderdetails-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Orderdetails', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
            'orderNumber',
            'productCode',
            [
                'attribute' => 'productName',
                'value' => 'products.productName',
            ],
            'quantityOrdered',
            'priceEach',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'update' => function ($url, $model, $key) {
                        return Html::a('<i class="glyphicon glyphicon-pencil" style="color: white"></i>', $url, ['class' => ['btn', 'btn-warning']]);
                    },
                    'view' => function ($url, $model, $key) {
                        return Html::a('<i class="glyphicon glyphicon-eye-open" style="color: white"></i>', $url, ['class' => ['btn', 'btn-primary']]);
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a('<i class=" glyphicon glyphicon-trash " style="color: white"></i>', $url,
                            [
                                'class' => ['btn', 'btn-danger'],
                                'data-confirm' => 'Are you sure delete ' . $model->products->productName,
                                'data-method' => 'POST'
                            ]
                        );
                    }
                ]
            ],
        ],
    ]) ?>
</div>
