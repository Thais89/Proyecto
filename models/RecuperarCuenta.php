<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "recuperar_cuenta".
 *
 * @property integer $recuperarCuentaID
 * @property string $token
 * @property string $usuarioEmail
 */
class RecuperarCuenta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'recuperar_cuenta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['token'], 'required'],
            [['token', 'usuarioEmail'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recuperarCuentaID' => 'Recuperar Cuenta ID',
            'token' => 'Token',
            'usuarioEmail' => 'Usuario Email',
        ];
    }
}
