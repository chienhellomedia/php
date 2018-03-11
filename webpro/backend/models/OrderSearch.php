<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Order;

/**
 * OrderSearch represents the model behind the search form about `backend\models\Order`.
 */
class OrderSearch extends Order
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cus_id', 'total', 'status', 'created_at'], 'integer'],
            [['fullname', 'email', 'mobile', 'addess', 'fullname_ship', 'email_ship', 'mobile_ship', 'addess_ship', 'request'], 'safe'],
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
        $query = Order::find();

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
            'cus_id' => $this->cus_id,
            'total' => $this->total,
            'status' => $this->status,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'fullname', $this->fullname])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'addess', $this->addess])
            ->andFilterWhere(['like', 'fullname_ship', $this->fullname_ship])
            ->andFilterWhere(['like', 'email_ship', $this->email_ship])
            ->andFilterWhere(['like', 'mobile_ship', $this->mobile_ship])
            ->andFilterWhere(['like', 'addess_ship', $this->addess_ship])
            ->andFilterWhere(['like', 'request', $this->request]);

        return $dataProvider;
    }
}
