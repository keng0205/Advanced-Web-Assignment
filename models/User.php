<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['username'], 'string', 'max' => 255],
            [['password'], 'string', 'max' => 40],
            [['username'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
        ];
    }



   public function beforeSave($password)
    {  
        if(isset($this->password))
            $this->password = sha1($this->password);

        return parent::beforeSave($password);
    }


    public static function findByUsername($username)
    {
        return static::findOne(['username'=>$username]);
    }


 public static function findIdentity($id)
    {
      return static::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
      return static::findOne(['access_token'=>$token]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
 

    /**
     * @inheritdoc
     */
    public function getId()
    {
         return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        // return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }


    public function validatePassword($password)
    {
        return $this->password === sha1($password);

    }

}
