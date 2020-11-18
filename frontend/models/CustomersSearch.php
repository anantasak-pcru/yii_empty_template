<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Customers;

/**
 * CustomersSearch represents the model behind the search form of `frontend\models\Customers`.
 */
class CustomersSearch extends Customers
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customerNumber', 'salesRepEmployeeNumber'], 'integer'],
            [['customerName', 'contactLastName', 'contactFirstName', 'phone', 'addressLine1', 'addressLine2', 'city', 'state', 'postalCode', 'country'], 'safe'],
            [['creditLimit'], 'number'],
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
        $query = Customers::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'customerNumber' => $this->customerNumber,
            'salesRepEmployeeNumber' => $this->salesRepEmployeeNumber,
            'creditLimit' => $this->creditLimit,
        ]);

        $query->andFilterWhere(['like', 'customerName', $this->customerName])
            ->andFilterWhere(['like', 'contactLastName', $this->contactLastName])
            ->andFilterWhere(['like', 'contactFirstName', $this->contactFirstName])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'addressLine1', $this->addressLine1])
            ->andFilterWhere(['like', 'addressLine2', $this->addressLine2])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'state', $this->state])
            ->andFilterWhere(['like', 'postalCode', $this->postalCode])
            ->andFilterWhere(['like', 'country', $this->country]);

        return $dataProvider;
    }
}
