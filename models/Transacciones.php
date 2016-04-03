<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transacciones".
 *
 * @property string $transaccionID
 * @property string $transaccion
 * @property string $descripcion
 *
 * @property TransaccionUsuario[] $transaccionUsuarios
 */
class Transacciones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transacciones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['transaccion', 'descripcion'], 'required'],
            [['transaccion'], 'string', 'max' => 45],
            [['descripcion'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'transaccionID' => 'Transaccion ID',
            'transaccion' => 'Transaccion',
            'descripcion' => 'Descripcion',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransaccionUsuarios()
    {
        return $this->hasMany(TransaccionUsuario::className(), ['transaccionID' => 'transaccionID']);
    }
}
