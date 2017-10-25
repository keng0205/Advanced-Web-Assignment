<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "floor".
 *
 * @property integer $floorId
 * @property integer $floorNumber
 */
class Floor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'floor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['floorNumber'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'floorId' => 'Floor ID',
            'floorNumber' => 'Floor Number',
        ];
    }
     public function getTenants()
    {
        return $this->hasMany(Tenant::className(), ['floorId' => 'floorId']);
    }
}
