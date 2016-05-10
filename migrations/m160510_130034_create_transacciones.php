<?php

use yii\db\Migration;

class m160510_130034_create_transacciones extends Migration
{
    public function up()
    {
        $this->createTable('transacciones', [
            'transaccionID'     => $this->primaryKey(),
            'transaccion'       => $this->string()->notNull(),
            'descripcion'       => $this->string()->notNull()
        ]);
    }

    public function down()
    {
        $this->dropTable('transacciones');
    }
}
