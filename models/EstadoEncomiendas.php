<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estado_encomiendas".
 *
 * @property string $estadoEncomiendasID
 * @property string $estado
 * @property string $descripcion
 *
 * @property Encomiendas[] $encomiendas
 */
class EstadoEncomiendas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estado_encomiendas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['estado', 'descripcion'], 'required'],
            [['estado'], 'string', 'max' => 45],
            [['descripcion'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'estadoEncomiendasID' => 'Estado Encomiendas ID',
            'estado' => 'Estado',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEncomiendas()
    {
        return $this->hasMany(Encomiendas::className(), ['estadoEncomiendaID' => 'estadoEncomiendasID']);
    }
}
