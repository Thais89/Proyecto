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
            [['Numero','estado'], 'integer'],
            [['Fecha'], 'safe'],
            [['monto'], 'number'],
            [['Banco'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'DepositoID' => 'DepositoID',
            'Banco' => 'Banco',
            'Numero' => 'Numero',
            'Fecha' => 'Fecha',
            'estado' => 'Activo',
            'monto'=>'monto'
        ];
    }
}
