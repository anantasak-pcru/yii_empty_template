<?php

namespace frontend\controllers;

use common\models\User;
use frontend\models\OrderdetailsSearch;
use frontend\models\Products;
use frontend\rbac\UserGroups;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\Response;

class RoomsController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index', 'calendar'],
                'denyCallback' => function ($rule, $action) {
                    throw new ForbiddenHttpException('คุณไม่ได้รับอนุญาติให้เข้าใช้งาน!');
                },
                "ruleConfig" => [
                    "class" => UserGroups::class
                ],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'calendar'],
                        'roles' => [User::ROLE_ADMIN],
                    ],
                ],
            ]
        ];
    }

    public function actionIndex()
    {
        return $this->render("index");
    }

    public function actionCalendar()
    {
        $searchModel = new OrderdetailsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('calendar', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionRoom()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $cat_id = $parents[0];
                $out = self::getSubCatList($cat_id);
                // the getSubCatList function will query the database based on the
                // cat_id and return an array like below:
                // [
                //    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
                //    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
                // ]
                return ['output' => $out, 'selected' => ''];
            }
        }
        return ['output' => '', 'selected' => ''];
    }

    /** @noinspection SpellCheckingInspection */
    public function actionProductlist()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $out = [];
        if (isset($_POST["depdrop_parents"])) {
            foreach (Products::find()->all() as $item) {
                $out[] = ["id" => $item->productCode, "name" => $item->productName];
            }
            return ['output' => $out, 'selected' => ''];
        }
        return ['output' => '', 'selected' => ''];
    }
}