<?php

use yii\db\Migration;

class m160510_130056_create_encomiendas extends Migration
{
    public function up()
    {
        $this->createTable('encomiendas', [
            'encomiendaID'          => $this->primaryKey(),
            'direccionOrigen'       => $this->string()->notNull(),
            'direccionDestino'      => $this->string()->notNull(),
            'distancia'             => $this->float()->notNull(),
            'tiempoEstimado'        => $this->integer()->notNull(),
            'receptorNombre'        => $this->string()->notNull(),
            'receptorCedula'        => $this->string(12)->notNull(),
            'precio'                => $this->double()->notNull(),
            'fechaSolicitud'        => $this->datetime()->notNull(),
            'fechaRecepcion'        => $this->datetime()->notNull(),
            'fechaEntrega'          => $this->datetime()->notNull(),
            'usuarioID'             => $this->integer()->notNull(),
            'estadoEncomiendaID'    => $this->integer()->notNull(),
            'tabuladorID'           => $this->integer()->notNull()
        ]);

        // Foreign key para encomiendas - usuario
        $this->addForeignKey(
            'fk-enc-usuario',
            'encomiendas',
            'usuarioID',
            'usuarios',
            'usuarioID',
            'CASCADE'
        );

        // Foreign key para encomiendas - estado encomiendas
        $this->addForeignKey(
            'fk-enc-edoEnc',
            'encomiendas',
            'estadoEncomiendaID',
            'estado_encomiendas',
            'estadoEncomiendaID',
            'CASCADE'
        );

        // Foreign key para encomiendas - tabuladores
        $this->addForeignKey(
            'fk-enc-tab',
            'encomiendas',
            'tabuladorID',
            'tabuladores',
            'tabuladorID',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropTable('encomiendas');
    }
}
