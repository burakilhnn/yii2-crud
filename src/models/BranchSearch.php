<?php

namespace burakilhnn\crud\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use burakilhnn\crud\models\Branch;

/**
 * BranchSearch represents the model behind the search form of `backend\modules\sports\models\Branch`.
 */
class BranchSearch extends Branch
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['branch_id', 'club_id'], 'integer'],
            [['branch_name', 'branch_address', 'branch_created_at', 'branch_status'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Branch::find();

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
            'branch_id' => $this->branch_id,
            'club_id' => $this->club_id,
            'branch_created_at' => $this->branch_created_at,
        ]);

        $query->andFilterWhere(['like', 'branch_name', $this->branch_name])
            ->andFilterWhere(['like', 'branch_address', $this->branch_address])
            ->andFilterWhere(['like', 'branch_status', $this->branch_status]);

        return $dataProvider;
    }
}
