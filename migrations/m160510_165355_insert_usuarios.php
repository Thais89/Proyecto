<?php

use yii\db\Migration;

class m160510_165355_insert_usuarios extends Migration
{
    public function up()
    {
        $this->insert('usuarios',[            
            'email'         => 'jcpware@gmail.com',
            'password'      => SHA1('123456'),
            'nombre'        => 'Julio',
            'apellido'      => 'Carreño',
            'cedula'        => '16555165',
            'direccion'     => 'Altos de paramillo',
            'telefono'      => '0414-7259029',
            'estado'        => 0,
            'fechaRegistro' => 'NOW()',
            'role'          => 3
        ]);

    }

    public function down()
    {
        echo "m160510_165355_insert_usuarios cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
