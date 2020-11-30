<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "carType".
 *
 * @property int $carTypeId
 * @property string|null $carTypeName
 */
class CarType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'carType';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['carTypeName'], 'string', 'max' => 255],
            [['carTypeName'], 'required']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'carTypeId' => 'Car Type ID',
            'carTypeName' => 'Car Type Name',
        ];
    }
}
