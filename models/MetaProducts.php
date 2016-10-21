<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "meta_products".
 *
 * @property integer $id
 * @property integer $id_product
 * @property string $meta_key
 * @property string $meta_value
 */
class MetaProducts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'meta_products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_product', 'meta_key', 'meta_value'], 'required'],
            [['id_product'], 'integer'],
            [['meta_key', 'meta_value'], 'string', 'max' => 200],
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
            'meta_key' => 'Meta Key',
            'meta_value' => 'Meta Value',
        ];
    }
}
