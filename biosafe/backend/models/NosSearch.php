<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Nos;
use backend\models\NosAnalysoitavat;

/**
 * NosSearch represents the model behind the search form about `backend\models\Nos`.
 */
class NosSearch extends Nos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'tuote_id', 'bakteeri_id', 'henkilo_id'], 'integer'],
            [['luontipvm', 'naytteenottopvm', 'Raja_arvo1_m', 'Raja_arvo2_M'], 'safe'],
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
        $query = Nos::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'luontipvm' => $this->luontipvm,
            'naytteenottopvm' => $this->naytteenottopvm,
            'tuote_id' => $this->tuote_id,
            'bakteeri_id' => $this->bakteeri_id,
            'henkilo_id' => $this->henkilo_id,
            //'nayte_tutkittu' => $this->nayte_tutkittu,
            //'Osanaytteita_n' => $this->osanaytteita_n,
            //'Osanaytteidenmaara_c' => $this->osanaytteita_c,
        ]);

        $query->andFilterWhere(['like', 'Raja-arvo1_m', $this->Raja_arvo1_m])
            ->andFilterWhere(['like', 'Raja-arvo2_M', $this->Raja_arvo2_M]);

        return $dataProvider;
    }
}
