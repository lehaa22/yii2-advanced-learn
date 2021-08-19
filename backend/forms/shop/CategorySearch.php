<?php

namespace backend\forms\shop;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use core\entities\Shop\Category;

/**
 * CategorySearch represents the model behind the search form of `core\entities\Shop\Category`.
 */
class CategorySearch extends Model
{
    public $id;
    public $name;
    public $slug;
    public $title;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'slug', 'title'], 'safe'],
        ];
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
        $query = Category::find()->andWhere(['>', 'depth', 0]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => ['lft' => SORT_ASC]
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }
}
