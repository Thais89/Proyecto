<?php

use yii\db\Migration;

class m160510_165356_insert_usuarios extends Migration
{
    public function up()
    {
        $this->insert('usuarios',[            
            'email'         => 'rene.martinez1337@gmail.com',
            'password'      => SHA1('123456'),
            'nombre'        => 'Rene',
            'apellido'      => 'Martinez',
            'cedula'        => '17109502',
            'direccion'     => 'La Romera',
            'telefono'      => '0414-0747854',
            'estado'        => 1,
            //'fechaRegistro' => '',
            'role'          => 4
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
