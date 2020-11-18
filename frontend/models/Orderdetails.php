<?php

namespace frontend\models;

/**
 * This is the model class for table "orderdetails".
 *
 * @property int $orderNumber
 * @property string $productCode
 * @property int $quantityOrdered
 * @property float $priceEach
 * @property int $orderLineNumber
 * @property string $productName
 * @property Orders $orderNumber0
 * @property Products $productCode0
 */
class Orderdetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orderdetails';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['orderNumber', 'productCode', 'quantityOrdered', 'priceEach', 'orderLineNumber'], 'required'],
            [['orderNumber', 'quantityOrdered', 'orderLineNumber'], 'integer'],
            [['productName'], 'string'],
            [['priceEach'], 'number'],
            [['productCode'], 'string', 'max' => 15],
            [['orderNumber', 'productCode'], 'unique', 'targetAttribute' => ['orderNumber', 'productCode']],
            [['orderNumber'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::class, 'targetAttribute' => ['orderNumber' => 'orderNumber']],
            [['productCode'], 'exist', 'skipOnError' => true, 'targetClass' => Products::class, 'targetAttribute' => ['productCode' => 'productCode']],
            [['products'], 'exist', 'skipOnError' => true, 'targetClass' => Products::class, 'targetAttribute' => ['productCode' => 'productCode']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'orderNumber' => 'Order Number',
            'productCode' => 'Product Code',
            'quantityOrdered' => 'Quantity Ordered',
            'priceEach' => 'Price Each',
            'orderLineNumber' => 'Order Line Number',
        ];
    }

    /**
     * Gets query for [[OrderNumber0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderNumber0()
    {
        return $this->hasOne(Orders::class, ['orderNumber' => 'orderNumber']);
    }

    /**
     * Gets query for [[ProductCode0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductCode0()
    {
        return $this->hasOne(Products::class, ['productCode' => 'productCode']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->getProductCode0();
    }

    /**
     * @return string
     */
    public function getProductName()
    {
        return $this->getProductCode0();
    }

    /**
     * @param $productName
     */
    public function setProductName($productName) {
        $this->productName = $productName;
    }
}
