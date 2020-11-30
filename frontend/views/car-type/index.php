<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CarTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Car Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-type-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Car Type', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'carTypeId',
            'carTypeName',

            ['class' => \frontend\themes\adminlte3\CustomActionColumn::class],
        ],
    ]); ?>


</div>
