<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PcTravel;

/**
 * TravelSearch represents the model behind the search form about `common\models\PcTravel`.
 */
class TravelSearch extends PcTravel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'car_models'], 'integer'],
            [['title', 'cost', 'place_departure', 'destination', 'departure_time', 'arrival_time', 'contact_name', 'contact_mobile', 'remark', 'create_time', 'last_update_time', 'create_by'], 'safe'],
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
        $query = PcTravel::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            /*'sort' => [
                'defaultOrder' => ['id' => SORT_DESC],
                'attributes' => ['id','title'],
            ],*/
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'car_models' => $this->car_models,
            'departure_time' => $this->departure_time,
            'arrival_time' => $this->arrival_time,
            'create_time' => $this->create_time,
            'last_update_time' => $this->last_update_time,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'cost', $this->cost])
            ->andFilterWhere(['like', 'place_departure', $this->place_departure])
            ->andFilterWhere(['like', 'destination', $this->destination])
            ->andFilterWhere(['like', 'contact_name', $this->contact_name])
            ->andFilterWhere(['like', 'contact_mobile', $this->contact_mobile])
            ->andFilterWhere(['like', 'remark', $this->remark])
            ->andFilterWhere(['like', 'create_by', $this->create_by]);

        return $dataProvider;
    }
}
