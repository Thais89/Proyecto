<?php

use yii\db\Migration;

class m160510_125818_create_usuarios extends Migration
{
    public function up()
    {
        $this->createTable('usuarios', [
            'usuarioID'     => $this->primaryKey(),
            'email'         => $this->string()->notNull(),
            'password'      => $this->string(40)->notNull(),
            'nombre'        => $this->string(45)->notNull(),
            'apellido'      => $this->string(45)->notNull(),
            'cedula'        => $this->string(12)->notNull(),
            'direccion'     => $this->string()->notNull(),
            'telefono'      => $this->string(15)->notNull(),
            'estado'        => $this->integer(1)->notNull()->defaultValue(0),
            'fechaRegistro' => $this->datetime()->notNull(),
            'ultimoLogin'   => $this->datetime(),
            'saldo'         => $this->double(),
            'authKey'       => $this->string(),
            'accessToken'   => $this->string(),
            'role'          => $this->integer(1)->defaultValue(4)
        ]);
    }

    public function down()
    {
        $this->dropTable('usuarios');
    }
}
