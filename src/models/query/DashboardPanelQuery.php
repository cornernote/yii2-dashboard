<?php

namespace cornernote\dashboard\models\query;

use yii\db\ActiveQuery;
use cornernote\dashboard\models\DashboardPanel;

/**
 * This is the ActiveQuery class for [[\cornernote\dashboard\models\DashboardPanel]].
 *
 * @see DashboardPanel
 */
class DashboardPanelQuery extends ActiveQuery
{
    /**
     * @return static
     */
    public function enabled()
    {
        return $this->andWhere(['enabled' => 1]);
    }

    /**
     * @return static
     */
    public function orderBySort()
    {
        return $this->orderBy(['sort' => SORT_ASC]);
    }

    /**
     * @inheritdoc
     * @return DashboardPanel[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return DashboardPanel|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}