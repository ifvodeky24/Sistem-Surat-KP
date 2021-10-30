<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "tb_user".
 *
 * @property int $id_user
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $photo
 * @property string $name
 * @property string $authkey
 * @property string $accesToken
 * @property string $createdAt
 * @property string $updatedAt
 * @property int $id_role
 *
 * @property TbRole $role
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'email', 'photo', 'name', 'authkey', 'accesToken', 'id_role'], 'required'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['id_role'], 'integer'],
            [['username', 'email', 'photo', 'name'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 255],
            [['authkey', 'accesToken'], 'string', 'max' => 100],
            [['id_role'], 'exist', 'skipOnError' => true, 'targetClass' => Role::className(), 'targetAttribute' => ['id_role' => 'id_role']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Id User',
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'Email',
            'photo' => 'Photo',
            'name' => 'Nama',
            'authkey' => 'Authkey',
            'accesToken' => 'Acces Token',
            'createdAt' => 'Created At',
            'updatedAt' => 'Updated At',
            'id_role' => 'Id Role',
        ];
    }

    /**
     * Gets query for [[Role]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Role::className(), ['id_role' => 'id_role']);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id_user)
    {
        // mencari user berdasarkan ID dan yg dicari hanya 1
        $user = User::findOne($id_user);

        return $user;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
      // mencari user berdasarkan accesToken dan yang dicari hanya 1
      $user = User::find()->where(['accessToken' => $token])->one();

      if (count($user)) {
          return new static($user);
      }

      return $user;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
      // mencari user berdasarkan username dan yang dicari haya 1
        $user = User::find()->where(['username' => $username])->one();

        // if (count($user)) {
        //     return new static($user);
        // }

        return $user;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id_user;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authkey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authkey)
    {
        return $this->authkey === $authkey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }
}
