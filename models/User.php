<?php

namespace app\models;

use app\models\Usuarios;

class User extends \yii\base\Object implements \yii\web\IdentityInterface
{
    public $UsuarioID;
    public $email;
    public $password;
    public $nombre;
    public $apellido;
    public $cedula;
    public $direcion;
    public $telefono;
    public $estado;
    public $fechaRegistro;
    public $ultimoLogin;
    public $Saldo;
    public $authKey;
    public $accessToken;
    public $role;

    public $users;

    /**
     * @inheritdoc
     */
    public static function isUserAdmin($id)
    {
        if(Usuarios::findOne(['UsuarioID'=>$id,'estado'=>'1','role'=>'1']))
        {
            return true;
        }else{
            return false;
        }
    }

    public static function isUserRepartidor($id)
    {
        if(Usuarios::findOne(['UsuarioID'=>$id,'estado'=>'1','role'=>'2']))
        {
            return true;
        }else{
            return false;
        }
    }

    public static function isUserOperador($id)
    {
        if(Usuarios::findOne(['UsuarioID'=>$id,'estado'=>'1','role'=>'3']))
        {
            return true;
        }else{
            return false;
        }
    }


    public static function isUsersimple($id)
    {
        if(Usuarios::findOne(['UsuarioID'=>$id,'estado'=>'1','role'=>'4']))
        {
            return true;
        }else{
            return false;
        }
    }
    public static function findIdentity($id)
    {
        $users = Usuarios::find()
            ->where("estado = :estado",[":estado" => 1])
            ->andWhere("UsuarioID = :id", [":id"=>$id])
            ->one();
        
        return isset($users) ? new static($users) : null;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        $users = Usuarios::find()
            ->where("estado = :estado",[":estado" => 1])
            ->andWhere("accessToken = :token", [":token"=>$token])
            ->one();
        
        return isset($users) ? new static($users) : null;
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        $users = Usuarios::find()
            ->where("estado = :estado",[":estado" => 1])
            ->andWhere("email = :username", [":username" => $username])
            ->one();
        
        return isset($users) ? new static($users) : null;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->UsuarioID;
    }
    public function getUsername()
    {
        return $this->nombre.", ".$this->apellido;
    }
    public function getRole()
    {
        return $this->role;
    }
    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
