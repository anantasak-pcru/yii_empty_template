<?php


namespace frontend\controllers;


use Yii;
use yii\web\Controller;

class CacheController extends Controller
{
    public function actionIndex() {
        Yii::$app->cache->flush();
    }
}