<?php

use yii\db\Migration;

class m160511_033704_create_recuperar_cuenta extends Migration
{
    public function up()
    {
        $this->createTable('recuperar_cuenta', [
            'recuperarCuentaID' => $this->primaryKey(),
            'token'             => $this->string()->notNull(),
            'usuarioEmail'      => $this->string()
        ]);

        $this->createIndex('Unique usuarioEmail', 'recuperar_cuenta', 'usuarioEmail', true);
    }

    public function down()
    {
        $this->dropTable('recuperar_cuenta');
    }
}
