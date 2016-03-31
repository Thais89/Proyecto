<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "roles".
 *
 * @property string $rolID
 * @property string $rol
 * @property string $descripcion
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Usuarios[] $usuarios
 */
class Roles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'roles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rol', 'descripcion'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['rol'], 'string', 'max' => 45],
            [['descripcion'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'rolID' => '#',
            'rol' => 'Rol',
            'descripcion' => 'Descripcion',
            'created_at' => 'Creada',
            'updated_at' => 'Actualizada',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuarios::className(), ['RolID' => 'rolID']);
    }
}
