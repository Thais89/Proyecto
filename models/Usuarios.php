<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuarios".
 *
 * @property string $UsuarioID
 * @property string $email
 * @property string $password
 * @property string $nombre
 * @property string $apellido
 * @property string $cedula
 * @property string $direccion
 * @property string $telefono
 * @property integer $estado
 * @property string $fechaRegistro
 * @property string $ultimoLogin
 * @property double $saldo
 * @property string $authKey
 * @property string $accessToken
 *
 * @property Encomiendas[] $encomiendas
 * @property Reclamos[] $reclamos
 * @property TransaccionUsuario[] $transaccionUsuarios
 */
class Usuarios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'password', 'nombre', 'apellido', 'cedula', 'direccion', 'telefono', 'estado', 'fechaRegistro','role'], 'required'],
            [['estado','role'], 'integer'],
            [['fechaRegistro'], 'safe'],            
            [['nombre'], 'match', 'pattern' =>  "/^[a-zA-Z]+$/i",'message' => 'Sólo se aceptan letras'],
            [['apellido'], 'match', 'pattern' =>  "/^[a-zA-Z]+$/i",'message' => 'Sólo se aceptan letras'],
            [['saldo'], 'number'],
            [['email', 'nombre', 'apellido', 'ultimoLogin'], 'string', 'max' => 45],
            [['password', 'authKey', 'accessToken'], 'string', 'max' => 250],
            [['cedula'], 'string', 'max' => 12],
            [['cedula'], 'match', 'pattern' => "/^[0-9]+$/i", 'message' => 'Sólo se aceptan números'],
            [['telefono'], 'match', 'pattern' => "/^[0-9]+$/i", 'message' => 'Sólo se aceptan números'],
            [['direccion'], 'string', 'max' => 200],
            [['telefono'], 'string', 'max' => 15],
            [['email'], 'unique'],            
            [['email'], 'email', 'message' => 'Email Invalido']
        ];

    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'UsuarioID' => 'Usuario ID',
            'email' => 'Email',
            'password' => 'Password',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'cedula' => 'Cedula',
            'direccion' => 'Direccion',
            'telefono' => 'Telefono',
            'estado' => 'Estado',
            'fechaRegistro' => 'Fecha Registro',
            'ultimoLogin' => 'Ultimo Login',
            'saldo' => 'Saldo',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEncomiendas()
    {
        return $this->hasMany(Encomiendas::className(), ['usuarioID' => 'UsuarioID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReclamos()
    {
        return $this->hasMany(Reclamos::className(), ['usuarioID' => 'UsuarioID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransaccionUsuarios()
    {
        return $this->hasMany(TransaccionUsuario::className(), ['usuarioID' => 'UsuarioID']);
    }
}


