<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "repartidor_encomienda".
 *
 * @property integer $id
 * @property integer $usuarioID
 * @property integer $encomiendaID
 * @property string $fechaSolicitud
 *
 * @property Usuarios $usuario
 * @property Encomiendas $encomienda
 */
class RepartidorEncomienda extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'repartidor_encomienda';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usuarioID', 'encomiendaID', 'fechaSolicitud'], 'required'],
            [['usuarioID', 'encomiendaID'], 'integer'],
            [['fechaSolicitud'], 'safe'],
            [['encomiendaID'], 'unique'],
            [['usuarioID'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['usuarioID' => 'usuarioID']],
            [['encomiendaID'], 'exist', 'skipOnError' => true, 'targetClass' => Encomiendas::className(), 'targetAttribute' => ['encomiendaID' => 'encomiendaID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'usuarioID' => 'Usuario ID',
            'encomiendaID' => 'Encomienda ID',
            'fechaSolicitud' => 'Fecha Solicitud',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuarios::className(), ['usuarioID' => 'usuarioID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEncomienda()
    {
        return $this->hasOne(Encomiendas::className(), ['encomiendaID' => 'encomiendaID']);
    }
}
