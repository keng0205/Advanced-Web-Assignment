<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $categoryId
 * @property string $categoryName
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['categoryName'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'categoryId' => 'Category ID',
            'categoryName' => 'Category Name',
        ];
    }

    public function getTenants()
    {
        return $this->hasMany(Tenant::className(), ['categoryId' => 'categoryId']);
    }
}
