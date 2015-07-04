<?php

namespace cornernote\dashboard\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use cornernote\dashboard\models\DashboardPanel;

/**
 * DashboardPanelSearch represents the model behind the search form about `cornernote\dashboard\models\DashboardPanel`.
 */
class DashboardPanelSearch extends DashboardPanel
{

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass parent scenarios
        return Model::scenarios();
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'dashboard_id', 'enabled', 'sort'], 'integer'],
            [['position', 'name', 'panel'], 'safe'],
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
        $query = DashboardPanel::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'dashboard_id' => $this->dashboard_id,
            'enabled' => $this->enabled,
            'sort' => $this->sort,
        ]);

        $query->andFilterWhere(['like', 'position', $this->position])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'panel', $this->panel]);

        return $dataProvider;
    }

}