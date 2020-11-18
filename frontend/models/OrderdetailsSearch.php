<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Orderdetails;

/**
 * OrderdetailsSearch represents the model behind the search form of `frontend\models\Orderdetails`.
 */

/**
 * Class OrderdetailsSearch
 * @package frontend\models
 */
class OrderdetailsSearch extends Orderdetails
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['orderNumber', 'quantityOrdered', 'orderLineNumber'], 'integer'],
            [['productCode', 'productName'], 'safe'],
            [['priceEach'], 'string']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Orderdetails::find();
//        $query->joinWith([Products::tableName()]);
        $query->leftJoin(Products::tableName(), 'products.productCode=orderdetails.productCode');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
              'pageSize' => 10
            ],
            'sort' => [
                'attributes' => [
                    'productName',
                    'orderNumber',
                    'productCode',
                    'quantityOrdered',
                    'priceEach'
                ]
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'orderNumber' => $this->orderNumber,
            'quantityOrdered' => $this->quantityOrdered,
            'priceEach' => $this->priceEach,
            'orderLineNumber' => $this->orderLineNumber,
        ]);

        $query
            ->andFilterWhere(['like', 'products.productCode', $this->productCode])
            ->andFilterWhere(['like', 'products.productName', $this->productName]);

        return $dataProvider;
    }
}
