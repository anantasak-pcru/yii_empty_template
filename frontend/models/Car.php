<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "car".
 *
 * @property int $carId
 * @property string|null $regisId
 * @property int|null $carTypeId
 * @property CarType $carType
 * @property string|null $carTypeName
 */
class Car extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['carTypeId'], 'integer'],
            [['regisId'], 'string', 'max' => 255],
            [['regisId', 'carTypeId'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'carId' => 'Car ID',
            'regisId' => 'Regis ID',
            'carTypeId' => 'Car Type ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarType()
    {
        return $this->hasOne(CarType::class, ['carTypeId' => 'carTypeId']);
    }

    /**
     * @return string|null
     */
    public function getCarTypeName()
    {
        return $this->hasOne(CarType::class, ['carTypeId' => 'carTypeId']);
    }

    /**
     * @return int
     */
    public function getCarId(): int
    {
        return $this->carId;
    }

    /**
     * @param string $carTypeName
     */
    public function setCarTypeName(string $carTypeName)
    {
        $this->carTypeName = $carTypeName;
    }
}
