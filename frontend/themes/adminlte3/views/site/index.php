<?php

use frontend\models\Car;
use frontend\models\CarType;
use hail812\adminlte3\widgets\Alert;
use hail812\adminlte3\widgets\Callout;
use yii\helpers\Url;

$this->title = 'Starter Page';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <?= Alert::widget([
                'type' => 'success',
                'body' => '<h3>Congratulations!</h3>',
            ]) ?>
            <?= Callout::widget([
                'type' => 'danger',
                'head' => 'I am a danger callout!',
                'body' => 'There is a problem that we need to fix. A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.'
            ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>Car</h3>
                    <p>Count : <?= Car::find()->count() ?></p>
                </div>
                <div class="icon">
                    <i class="fas fa-car"></i>
                </div>
                <a href="<?= Url::to(["car/index"]) ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-4">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>Car Type</h3>
                    <p>Count : <?= CarType::find()->count() ?></p>
                </div>
                <div class="icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <a href="<?= Url::to(["car-type/index"]) ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
</div>