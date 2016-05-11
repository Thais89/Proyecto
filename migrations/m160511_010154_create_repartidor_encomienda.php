<?php

use yii\db\Migration;

class m160511_010154_create_repartidor_encomienda extends Migration
{
    public function up()
    {
        $this->createTable('repartidor_encomienda', [
            'id' => $this->primaryKey()
        ]);
    }

    public function down()
    {
        $this->dropTable('repartidor_encomienda');
    }
}
