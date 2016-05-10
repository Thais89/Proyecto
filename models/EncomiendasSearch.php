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
            [['encomiendaID', 'tiempoEstimado', 'usuarioID', 'estadoEncomiendaID', 'tabuladorID'], 'integer'],
            [['direccionOrigen', 'direccionDestino', 'receptorNombre', 'receptorCedula', 'fechaSolicitud', 'fechaRecepcion', 'fechaEntrega'], 'safe'],
            [['distancia', 'precio'], 'number'],
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
            'distancia' => $this->distancia,
            'tiempoEstimado' => $this->tiempoEstimado,
            'precio' => $this->precio,
            'fechaSolicitud' => $this->fechaSolicitud,
            'fechaRecepcion' => $this->fechaRecepcion,
            'fechaEntrega' => $this->fechaEntrega,
            'usuarioID' => $this->usuarioID,
            'estadoEncomiendaID' => $this->estadoEncomiendaID,
            'tabuladorID' => $this->tabuladorID,
        ]);

        $query->andFilterWhere(['like', 'direccionOrigen', $this->direccionOrigen])
            ->andFilterWhere(['like', 'direccionDestino', $this->direccionDestino])
            ->andFilterWhere(['like', 'receptorNombre', $this->receptorNombre])
            ->andFilterWhere(['like', 'receptorCedula', $this->receptorCedula]);

        return $dataProvider;
    }
}
