<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "encomiendas".
 *
 * @property string $encomiendaID
 * @property string $DireccionOrigen
 * @property string $DireccionDestino
 * @property double $distancia
 * @property integer $tiempoEstimado
 * @property string $receptorNombre
 * @property string $receptorCedula
 * @property double $precio
 * @property string $fechaSolicitud
 * @property string $fechaRecepcion
 * @property string $fechaEntrega
 * @property string $usuarioID
 * @property string $estadoEncomiendaID
 * @property string $tabuladorID
 *
 * @property EstadoEncomiendas $estadoEncomienda
 * @property Tabuladores $tabulador
 * @property Usuarios $usuario
 * @property Reclamos[] $reclamos
 */
class Encomiendas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'encomiendas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['direccionOrigen', 'direccionDestino', 'distancia', 'tiempoEstimado', 'receptorNombre', 'receptorCedula', 'precio', 'fechaRecepcion', 'fechaEntrega', 'usuarioID', 'tabuladorID'], 'required'],
            [['distancia', 'precio'], 'number'],
            [['tiempoEstimado', 'usuarioID', 'estadoEncomiendaID', 'tabuladorID'], 'integer'],
            [['fechaSolicitud', 'fechaRecepcion', 'fechaEntrega'], 'safe'],
            [['direccionOrigen', 'direccionDestino', 'receptorNombre'], 'string', 'max' => 200],
            [['receptorCedula'], 'string', 'max' => 12],
            [['estadoEncomiendaID'], 'exist', 'skipOnError' => true, 'targetClass' => EstadoEncomiendas::className(), 'targetAttribute' => ['estadoEncomiendaID' => 'estadoEncomiendasID']],
            [['tabuladorID'], 'exist', 'skipOnError' => true, 'targetClass' => Tabuladores::className(), 'targetAttribute' => ['tabuladorID' => 'tabuladorID']],
            [['usuarioID'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['usuarioID' => 'usuarioID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'encomiendaID' => 'Encomienda ID',
            'direccionOrigen' => 'Direccion Origen',
            'direccionDestino' => 'Direccion Destino',
            'distancia' => 'Distancia',
            'tiempoEstimado' => 'Tiempo Estimado',
            'receptorNombre' => 'Receptor Nombre',
            'receptorCedula' => 'Receptor Cedula',
            'precio' => 'Precio',
            'fechaSolicitud' => 'Fecha Solicitud',
            'fechaRecepcion' => 'Fecha Recepcion',
            'fechaEntrega' => 'Fecha Entrega',
            'usuarioID' => 'Usuario ID',
            'estadoEncomiendaID' => 'Estado Encomienda ID',
            'tabuladorID' => 'Tabulador ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstadoEncomienda()
    {
        return $this->hasOne(EstadoEncomiendas::className(), ['estadoEncomiendasID' => 'estadoEncomiendaID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTabulador()
    {
        return $this->hasOne(Tabuladores::className(), ['tabuladorID' => 'tabuladorID']);
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
    public function getReclamos()
    {
        return $this->hasMany(Reclamos::className(), ['encomiendaID' => 'encomiendaID']);
    }
}
