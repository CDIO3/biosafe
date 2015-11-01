<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Tuote;
use yii\

/**
 * TuoteSearch represents the model behind the search form about `backend\models\Tuote`.
 */
class TuoteSearch extends Tuote
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ean'], 'integer'],
            [['nimi', 'Ravintokoostumus', 'sisaltaako_porkkanaa', 'sisaltaako_perunaa', 'Tuoteryhma', 'yritys_id', 'asiakas_id'], 'safe'],
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
        $query = Tuote::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('asiakas');
        $query->joinWith('yritys'); //liitetään nämä taulut tuotteen searchiin

        $query->andFilterWhere([
            'id' => $this->id,
            'ean' => $this->ean,
            //'yritys_id' => $this->yritys_id, näitä ei tarvita
            //'asiakas_id' => $this->asiakas_id, näitä ei tarvita
        ]);

        $query->andFilterWhere(['like', 'tuote.nimi', $this->nimi])
            ->andFilterWhere(['like', 'Ravintokoostumus', $this->Ravintokoostumus])
            ->andFilterWhere(['like', 'sisaltaako_porkkanaa', $this->sisaltaako_porkkanaa])
            ->andFilterWhere(['like', 'sisaltaako_perunaa', $this->sisaltaako_perunaa])
            ->andFilterWhere(['like', 'Tuoteryhma', $this->Tuoteryhma])
            ->andFilterWhere(['like', 'asiakas.nimi', $this->asiakas_id]) //search toisesta taulusta
            ->andFilterWhere(['like', 'yritys.yritysnimi', $this->yritys_id]); //search toisesta taulusta

        return $dataProvider;
    }
}
