<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders_products".
 *
 * @property integer $id
 * @property integer $id_product
 * @property integer $id_order
 * @property integer $count
 */
class OrdersProducts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders_products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_product', 'id_order', 'count'], 'required'],
            [['id_product', 'id_order', 'count'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_product' => 'Id Product',
            'id_order' => 'Id Order',
            'count' => 'Count',
        ];
    }
}
