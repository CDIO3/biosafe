<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Send;

/**
 * SendSearch represents the model behind the search form about `backend\models\Send`.
 */
class SendSearch extends Send
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nos_id', 'henkilo_id', 'labra_id'], 'integer'],
            [['lisatietoja', 'lahetyspvm'], 'safe'],
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
        $query = Send::find();

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
            'nos_id' => $this->nos_id,
            'henkilo_id' => $this->henkilo_id,
            'labra_id' => $this->labra_id,
            'lahetyspvm' => $this->lahetyspvm,
        ]);

        $query->andFilterWhere(['like', 'lisatietoja', $this->lisatietoja]);

        return $dataProvider;
    }
}
