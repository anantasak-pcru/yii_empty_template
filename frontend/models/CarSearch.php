<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Car;

/**
 * CarSearch represents the model behind the search form of `frontend\models\Car`.
 */
class CarSearch extends Car
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['carId', 'carTypeId'], 'integer'],
            [['regisId', 'carTypeName'], 'safe'],
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
        $query = Car::find();
        $query->leftJoin(CarType::tableName(), "carType.carTypeId = car.carTypeId");

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'attributes' => [
                    'regisId',
                    'carTypeName',
                    'carId',
                    'carTypeId'
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
            'carId' => $this->carId,
            'carTypeId' => $this->carTypeId,
//            'carTypeName' => $this->carTypeName
        ]);

        $query
            ->andFilterWhere(['like', 'carTypeName', "$this->carTypeName"])
            ->andFilterWhere(['like', 'regisId', $this->regisId]);

        return $dataProvider;
    }
}
