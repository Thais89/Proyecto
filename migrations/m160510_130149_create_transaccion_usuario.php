<?php

use yii\db\Migration;

class m160510_130149_create_transaccion_usuario extends Migration
{
    public function up()
    {
        $this->createTable('transaccion_usuario', [
            'transaccionUsuarioID'  => $this->primaryKey(),
            'monto'                 => $this->double()->notNull(),
            'fecha'                 => $this->datetime()->notNull(),
            'numeroReferencia'      => $this->integer(20)->notNull(),
            'origenBanco'           => $this->string(20)->notNull(),
            'usuarioID'             => $this->integer()->notNull(),
            'transaccionID'         => $this->integer()->notNull()
        ]);

        // Foreign key para transacciones-usuario
        $this->addForeignKey(
            'fk-transaccionesUsuario-usuario',
            'transaccion_usuario',
            'usuarioID',
            'usuarios',
            'usuarioID',
            'CASCADE'
        );

        // Foreign key para transacciones-
        $this->addForeignKey(
            'fk-transaccionesUsuario-transaccion',
            'transaccion_usuario',
            'transaccionID',
            'transacciones',
            'transaccionID',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropTable('transaccion_usuario');
    }
}
