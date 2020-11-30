<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\CarType */

$this->title = 'Update Car Type: ' . $model->carTypeId;
$this->params['breadcrumbs'][] = ['label' => 'Car Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->carTypeId, 'url' => ['view', 'id' => $model->carTypeId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="car-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
