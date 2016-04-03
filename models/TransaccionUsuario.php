<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transaccion_usuario".
 *
 * @property string $TransaccionUsuarioID
 * @property double $monto
 * @property string $fecha
 * @property string $usuarioID
 * @property string $transaccionID
 *
 * @property Transacciones $transaccion
 * @property Usuarios $usuario
 */
class TransaccionUsuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public static function tableName()
    {
        return 'transaccion_usuario';
    }

    /**
     * @inheritdoc
     */ 
    public function rules()
    {
        return [
            [['usuarioID', 'transaccionID','NumeroReferencia'], 'required'],
            [['monto','NumeroReferencia'], 'number'],
            [['fecha'], 'safe'],
            [['usuarioID', 'transaccionID'], 'integer'],
            [['OrigenBanco'],'string', 'max' => 20],
            [['transaccionID'], 'exist', 'skipOnError' => true, 'targetClass' => Transacciones::className(), 'targetAttribute' => ['transaccionID' => 'transaccionID']],
            [['usuarioID'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['usuarioID' => 'UsuarioID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'TransaccionUsuarioID' => 'Transaccion Usuario ID',
            'monto' => 'Monto',
            'fecha' => 'Fecha',
            'usuarioID' => 'Identificador',
            'transaccionID' => 'Proceso',
            'OrigenBanco' => 'Tipo',
            'NumeroReferencia' => 'Numero de Referencia',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransaccion()
    {
        return $this->hasOne(Transacciones::className(), ['transaccionID' => 'transaccionID']);
    }
    public function getTrans()
    {
        return $this->transaccionID;
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuarios::className(), ['UsuarioID' => 'usuarioID']);
    }
}
