<?php

namespace common\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "{{%users}}".
 *
 * @property string $uid
 * @property string $name
 * @property string $password
 * @property string $mail
 * @property string $url
 * @property string $screenName
 * @property string $created
 * @property string $activated
 * @property string $logged
 * @property string $group
 * @property string $authCode
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%users}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created', 'activated', 'logged'], 'integer'],
            [['name', 'screenName'], 'string', 'max' => 32],
            [['password', 'authCode'], 'string', 'max' => 64],
            [['mail', 'url'], 'string', 'max' => 200],
            [['group'], 'string', 'max' => 16],
            [['name'], 'unique'],
            [['mail'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'uid' => 'Uid',
            'name' => 'Name',
            'password' => 'Password',
            'mail' => 'Mail',
            'url' => 'Url',
            'screenName' => 'Screen Name',
            'created' => 'Created',
            'activated' => 'Activated',
            'logged' => 'Logged',
            'group' => 'Group',
            'authCode' => 'Auth Code',
        ];
    }

    /**
     * @inheritdoc
     * @return UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }


    public static function findIdentity($id)
    {
        return static::findOne(['uid' => $id]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }

    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }

    public static function findByname($name)
    {
        return static::findOne(['name' => $name]);
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }
}
