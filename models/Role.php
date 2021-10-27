<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_role".
 *
 * @property int $id_role
 * @property string $role_name
 * @property string $createdAt
 * @property string $updatedAt
 *
 * @property TbUser[] $tbUsers
 */
class Role extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_role';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['role_name'], 'required'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['role_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_role' => 'Id Role',
            'role_name' => 'Role Name',
            'createdAt' => 'Created At',
            'updatedAt' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[TbUsers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTbUsers()
    {
        return $this->hasMany(TbUser::className(), ['id_role' => 'id_role']);
    }
}
