<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\AuthItem;

/**
 * AuthItemSearch represents the model behind the search form about `backend\models\AuthItem`.
 */
class RoleSearch extends AuthItem
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description',], 'safe'],
            [['created_at'], 'integer'],
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
    public function searchPermission($params)
    {
        $query = AuthItem::find()->where(['type'=>2]);

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
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }

    public function searchRole($params)
    {
        $query = AuthItem::find()->where(['type'=>1]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            ]);

        $this->load($params);

        if (!$this->validate()) {

            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'created_at' => $this->created_at
            ]);

        $query->andFilterWhere(['like', 'name', $this->name])
        ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
