<?php

namespace app\modules\contacts\models;

use Yii;

/**
 * This is the model class for table "tanents".
 *
 * @property integer $id
 * @property string $name
 * @property integer $zoneId
 * @property integer $floorId
 * @property integer $categoryId
 * @property integer $lotNumber
 */
class Tanents extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tanents';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'zoneId', 'floorId', 'categoryId', 'lotNumber'], 'integer'],
            [['name'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'zoneId' => 'Zone ID',
            'floorId' => 'Floor ID',
            'categoryId' => 'Category ID',
            'lotNumber' => 'Lot Number',
        ];
    }
}
