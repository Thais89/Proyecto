<?php

use yii\db\Migration;

class m160510_125955_create_tabuladores extends Migration
{
    public function up()
    {
        $this->createTable('tabuladores', [
            'tabuladorID'   => $this->primaryKey(),
            'tabulador'     => $this->string()->notNull(),
            'descripcion'   => $this->string()->notNull(),
            'precio'        => $this->double()->notNull()

        ]);
    }

    public function down()
    {
        $this->dropTable('tabuladores');
    }
}
