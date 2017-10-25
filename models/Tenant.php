<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tenant".
 *
 * @property integer $id
 * @property string $name
 * @property integer $lotNumber
 * @property integer $floorId
 * @property integer $zoneId
 * @property integer $categoryId
 */
class Tenant extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tenant';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'lotNumber', 'floorId', 'zoneId', 'categoryId'], 'required'],
            [['lotNumber', 'floorId', 'zoneId', 'categoryId'], 'integer'],
            [['name'], 'string', 'max' => 60]
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
            'lotNumber' => 'Lot Number',
            'floorId' => 'Floor ID',
            'zoneId' => 'Zone ID',
            'categoryId' => 'Category ID',
        ];
    }
        public function getZone()
    {
        return $this->hasOne(Zone::className(), ['zoneId' => 'zoneId']);
    }

    public function getFloor()
    {
        return $this->hasOne(Floor::className(), ['floorId' => 'floorId']);
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['categoryId' => 'categoryId']);
    }
}
