<?php

use yii\db\Migration;

class m160510_125852_create_depositos extends Migration
{
    public function up()
    {
        $this->createTable('depositos', [
            'depositoID'    => $this->primaryKey(),
            'banco'         => $this->string()->notNull(),
            'numero'        => $this->integer()->notNull(),
            'fecha'         => $this->datetime(),
            'estado'        => $this->integer()->defaultValue(0),
            'monto'         => $this->float()->defaultValue(0)
        ]);
    }

    public function down()
    {
        $this->dropTable('depositos');
    }
}
