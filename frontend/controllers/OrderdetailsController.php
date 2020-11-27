<?php

namespace frontend\controllers;

use frontend\models\Products;
use Yii;
use frontend\models\Orderdetails;
use frontend\models\OrderdetailsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrderdetailsController implements the CRUD actions for Orderdetails model.
 */
class OrderdetailsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Orderdetails models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrderdetailsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Orderdetails model.
     * @param integer $orderNumber
     * @param string $productCode
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($orderNumber, $productCode)
    {
        return $this->render('view', [
            'model' => $this->findModel($orderNumber, $productCode),
        ]);
    }

    /**
     * Creates a new Orderdetails model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Orderdetails();

        $products = Products::find()->select(['productCode', 'productName'])->all();

        var_dump(gettype($products));

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'orderNumber' => $model->orderNumber, 'productCode' => $model->productCode, 'products' => $products]);
        }

        return $this->render('create', [
            'model' => $model,
            'products' => $products
        ]);
    }

    /**
     * Updates an existing Orderdetails model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $orderNumber
     * @param string $productCode
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($orderNumber, $productCode)
    {
        $model = $this->findModel($orderNumber, $productCode);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'orderNumber' => $model->orderNumber, 'productCode' => $model->productCode]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Orderdetails model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $orderNumber
     * @param string $productCode
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($orderNumber, $productCode)
    {
        $this->findModel($orderNumber, $productCode)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Orderdetails model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $orderNumber
     * @param string $productCode
     * @return Orderdetails the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($orderNumber, $productCode)
    {
        if (($model = Orderdetails::findOne(['orderNumber' => $orderNumber, 'productCode' => $productCode])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
