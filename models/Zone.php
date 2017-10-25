<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "zone".
 *
 * @property integer $zoneId
 * @property string $zoneName
 */
class Zone extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zone';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['zoneName'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'zoneId' => 'Zone ID',
            'zoneName' => 'Zone Name',
        ];
    }


      public function getTenants()
    {
        return $this->hasMany(Tenant::className(), ['zoneId' => 'zoneId']);
    }
}
