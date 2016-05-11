<?php

use yii\db\Migration;

class m160511_010154_create_repartidor_encomienda extends Migration
{
    public function up()
    {
        $this->createTable('repartidor_encomienda', [
            'id' => $this->primaryKey(),
            'usuarioID' => $this->integer()->notNull(),
            'encomiendaID' => $this->integer()->notNull(),
            'fechaSolicitud' => $this->datetime()->notNull()
        ]);

        // Foreign key para repartidor_encomienda - encomiendas
        $this->addForeignKey(
            'fk-enc-repartidor_encomienda',
            'repartidor_encomienda',
            'encomiendaID',
            'encomiendas',
            'encomiendaID',
            'CASCADE'
        );
        
        // Clave unica en encomienda
        $this->createIndex(
            'indice-unico-encomienda',
            'repartidor_encomienda',
            'encomiendaID',
            'true'
        );

        // Foreign key para repartidor_encomienda - usuario
        $this->addForeignKey(
            'fk-usu-repartidor_encomienda',
            'repartidor_encomienda',
            'usuarioID',
            'usuarios',
            'usuarioID',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropTable('repartidor_encomienda');
    }
}