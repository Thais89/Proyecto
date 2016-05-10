<?php

use yii\db\Migration;

class m160510_125924_create_estado_encomiendas extends Migration
{
    public function up()
    {
        $this->createTable('estado_encomiendas', [
            'estadoEncomiendaID'   => $this->primaryKey(),
            'estado'                => $this->string()->notNull(),
            'descripcion'           => $this->text()->notNull()
        ]);
    }

    public function down()
    {
        $this->dropTable('estado_encomiendas');
    }
}
