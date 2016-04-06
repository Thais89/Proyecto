<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Encomiendas;

/**
 * EncomiendasSearch represents the model behind the search form about `app\models\Encomiendas`.
 */
class EncomiendasSearch extends Encomiendas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['encomiendaID', 'cantIDadDocumentos', 'estado', 'usuarioID', 'estadoEncomiendaID'], 'integer'],
            [['latitudOrigen', 'longitudOrigen', 'latitudDestino', 'longitudDestino', 'precio'], 'number'],
            [['distancia', 'receptorNombre', 'receptorCedula', 'fechaSolicitud', 'fechaRecepcion', 'fechaEntrega'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Encomiendas::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'encomiendaID' => $this->encomiendaID,
            'latitudOrigen' => $this->latitudOrigen,
            'longitudOrigen' => $this->longitudOrigen,
            'latitudDestino' => $this->latitudDestino,
            'longitudDestino' => $this->longitudDestino,
            'cantIDadDocumentos' => $this->cantIDadDocumentos,
            'estado' => $this->estado,
            'precio' => $this->precio,
            'fechaSolicitud' => $this->fechaSolicitud,
            'fechaRecepcion' => $this->fechaRecepcion,
            'fechaEntrega' => $this->fechaEntrega,
            'usuarioID' => $this->usuarioID,
            'estadoEncomiendaID' => $this->estadoEncomiendaID,
        ]);

        $query->andFilterWhere(['like', 'distancia', $this->distancia])
            ->andFilterWhere(['like', 'receptorNombre', $this->receptorNombre])
            ->andFilterWhere(['like', 'receptorCedula', $this->receptorCedula]);

        return $dataProvider;
    }
}
