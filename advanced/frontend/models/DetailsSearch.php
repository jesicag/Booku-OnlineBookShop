<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Details;

/**
 * DetailsSearch represents the model behind the search form about `frontend\models\Details`.
 */
class detailsSearch extends details
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'page'], 'integer'],
            [['category', 'title', 'author', 'price', 'publisher', 'language', 'review', 'picture'], 'safe'],
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
        $query = Details::find();

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
            'id' => $this->id,
            'category' => $this->category,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title]);
            // ->andFilterWhere(['like', 'title', $this->title])
            // ->andFilterWhere(['like', 'author', $this->author])
            // ->andFilterWhere(['like', 'price', $this->price])
            // ->andFilterWhere(['like', 'publisher', $this->publisher])
            // ->andFilterWhere(['like', 'language', $this->language])
            // ->andFilterWhere(['like', 'review', $this->review])
            // ->andFilterWhere(['like', 'picture', $this->picture]);


        return $dataProvider;
    }
}
