<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Titulo;
use yii\db\Query;

/**
 * TituloSearch represents the model behind the search form about `app\models\Titulo`.
 */
class TituloSearch extends Titulo {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id'], 'integer'],
            [['nome', 'idCategoria'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {
        $query = Titulo::find();

//        $query = new Query;
//        $query->select(['titulo.id' ,'titulo.nome', 'categoria.nome AS categoria', 'titulo.idCategoria'])
//                ->from('titulo', 'categoria')
//                ->join('JOIN', 'categoria', 'categoria.id = titulo.idCategoria');
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        $query->joinWith('categoria');

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
//            'idCategoria' => $this->idCategoria,
        ]);

        $query->andFilterWhere(['like', 'titulo.nome', $this->nome]);
        $query->andFilterWhere(['like', 'categoria.nome', $this->idCategoria]);
        $query->orderBy('titulo.nome');

        return $dataProvider;
    }

}
