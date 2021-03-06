<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Product;

/**
 * ProductSearch represents the model behind the search form about `backend\models\Product`.
 */
class ProductSearch extends Product
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cate_id', 'new', 'bestseller', 'featured', 'hotdeals', 'sepcialoffer', 'instock', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'slug', 'image', 'pricelist', 'startsale', 'endsale', 'desc', 'content'], 'safe'],
            [['price', 'pricesale', 'saleoff'], 'number'],
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
        $query = Product::find();

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
            'cate_id' => $this->cate_id,
            'price' => $this->price,
            'pricesale' => $this->pricesale,
            'saleoff' => $this->saleoff,
            'startsale' => $this->startsale,
            'endsale' => $this->endsale,
            'new' => $this->new,
            'bestseller' => $this->bestseller,
            'featured' => $this->featured,
            'hotdeals' => $this->hotdeals,
            'sepcialoffer' => $this->sepcialoffer,
            'instock' => $this->instock,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'pricelist', $this->pricelist])
            ->andFilterWhere(['like', 'desc', $this->desc])
            ->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}