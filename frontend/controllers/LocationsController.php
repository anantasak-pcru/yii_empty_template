<?php

namespace frontend\controllers;

use common\models\User;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;

class LocationsController extends Controller
{

    public $enableCsrfValidation = false;
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'depend' => ['POST'],
                    'fromsubmit' => ['POST']
                ],
            ],
        ];
    }
    public function actionIndex()
    {
        $data = User::find()->all();
        return $this->render("index", ["data" => $data]);
    }

    public function actionDepend()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $out = [];
        foreach (User::find()->all() as $item) {
            $out[] = ['id' => "$item->id", 'name' => "$item->username"];
        }
//        $out = [
//            ['id' => '1', 'name' => 'aa'],
//            ['id' => '2', 'name' => 'bb']
//        ];
        return ['output' => $out, 'selected' => ''];
    }

    /** @noinspection SpellCheckingInspection */
    public function actionFromsubmit() {
        return var_dump(Yii::$app->request->post());
    }

    public function actionLte() {
        return $this->render("lte");
    }
}