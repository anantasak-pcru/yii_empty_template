<?php

use yii\helpers\Html;
use frontend\components\cards\Cards;

/* @var $this yii\web\View */
/* @var $model frontend\models\Car */
/* @var $carTypeData array */

$this->title = 'Create Car';
$this->params['breadcrumbs'][] = ['label' => 'Cars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_form', [
    'model' => $model,
    'carTypeData' => $carTypeData
]); ?>
