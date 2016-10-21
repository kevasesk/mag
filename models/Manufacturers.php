<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "manufacturers".
 *
 * @property integer $id
 * @property string $manufacturers_title
 */
class Manufacturers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'manufacturers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['manufacturers_title'], 'required'],
            [['manufacturers_title'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'manufacturers_title' => 'Manufacturers Title',
        ];
    }
}
