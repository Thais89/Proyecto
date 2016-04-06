<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tabuladores;

/**
 * TabuladoresSearch represents the model behind the search form about `app\models\Tabuladores`.
 */
class TabuladoresSearch extends Tabuladores
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tabuladorID', 'encomiendaID'], 'integer'],
            [['tabulador', 'descripcion'], 'safe'],
            [['precio'], 'number'],
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
        $query = Tabuladores::find();

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
            'tabuladorID' => $this->tabuladorID,
            'precio' => $this->precio,
            'encomiendaID' => $this->encomiendaID,
        ]);

        $query->andFilterWhere(['like', 'tabulador', $this->tabulador])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
