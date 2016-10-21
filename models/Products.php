<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Products".
 *
 * @property integer $id
 * @property string $title
 * @property string $cost
 * @property integer $id_category
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'cost', 'id_category'], 'required'],
            [['id_category'], 'integer'],
            [['id_manufacturers'], 'integer'],
            [['in_slider'], 'boolean'],
            [['title'], 'string', 'max' => 200],
            [['cost'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'cost' => 'Cost',
            'id_category' => 'Id Category',
            'id_manufacturers' => 'Id Manufacturers',
            'in_slider' => 'In Slider',
        ];
    }
    public function getMeta()
    {
        return $this->hasMany(MetaProducts::className(), ['id_product' => 'id']);
    }
    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['id'=>'id_category' ]);
    }
    public function getManufacturer()
    {
        return $this->hasOne(Manufacturers::className(), ['id'=>'id_manufacturers' ]);
    }
}
