<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "encomiendas".
 *
 * @property string $encomiendaID
 * @property double $latitudOrigen
 * @property double $longitudOrigen
 * @property double $latitudDestino
 * @property double $longitudDestino
 * @property string $distancia
 * @property integer $cantIDadDocumentos
 * @property string $receptorNombre
 * @property string $receptorCedula
 * @property integer $estado
 * @property double $precio
 * @property string $fechaSolicitud
 * @property string $fechaRecepcion
 * @property string $fechaEntrega
 * @property string $usuarioID
 * @property string $estadoEncomiendaID
 *
 * @property EstadoEncomiendas $estadoEncomienda
 * @property Usuarios $usuario
 * @property Reclamos[] $reclamos
 * @property Tabuladores[] $tabuladores
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
            [['latitudOrigen', 'longitudOrigen', 'latitudDestino', 'longitudDestino', 'distancia', 'cantIDadDocumentos', 'receptorNombre', 'receptorCedula', 'estado', 'precio', 'fechaSolicitud', 'fechaRecepcion', 'fechaEntrega', 'usuarioID', 'estadoEncomiendaID'], 'required'],
            [['latitudOrigen', 'longitudOrigen', 'latitudDestino', 'longitudDestino', 'precio'], 'number'],
            [['cantIDadDocumentos', 'estado', 'usuarioID', 'estadoEncomiendaID'], 'integer'],
            [['fechaSolicitud', 'fechaRecepcion', 'fechaEntrega'], 'safe'],
            [['distancia'], 'string', 'max' => 45],
            [['receptorNombre'], 'string', 'max' => 200],
            [['receptorCedula'], 'string', 'max' => 12],
            [['estadoEncomiendaID'], 'exist', 'skipOnError' => true, 'targetClass' => EstadoEncomiendas::className(), 'targetAttribute' => ['estadoEncomiendaID' => 'estadoEncomiendasID']],
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
            'latitudOrigen' => 'Latitud Origen',
            'longitudOrigen' => 'Longitud Origen',
            'latitudDestino' => 'Latitud Destino',
            'longitudDestino' => 'Longitud Destino',
            'distancia' => 'Distancia',
            'cantIDadDocumentos' => 'Cant Idad Documentos',
            'receptorNombre' => 'Receptor Nombre',
            'receptorCedula' => 'Receptor Cedula',
            'estado' => 'Estado',
            'precio' => 'Precio',
            'fechaSolicitud' => 'Fecha Solicitud',
            'fechaRecepcion' => 'Fecha Recepcion',
            'fechaEntrega' => 'Fecha Entrega',
            'usuarioID' => 'Usuario ID',
            'estadoEncomiendaID' => 'Estado Encomienda ID',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTabuladores()
    {
        return $this->hasMany(Tabuladores::className(), ['encomiendaID' => 'encomiendaID']);
    }
}
