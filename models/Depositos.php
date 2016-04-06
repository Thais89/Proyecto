<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "depositos".
 *
 * @property integer $DepositoID
 * @property string $Banco
 * @property integer $Numero
 * @property string $Fecha
 */
class Depositos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'depositos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['numero','estado'], 'integer'],
            [['fecha'], 'safe'],
            [['monto'], 'number'],
            [['banco'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'depositoID' => 'DepositoID',
            'banco' => 'Banco',
            'numero' => 'Numero',
            'fecha' => 'Fecha',
            'estado' => 'Activo',
            'monto'=>'monto'
        ];
    }
}
