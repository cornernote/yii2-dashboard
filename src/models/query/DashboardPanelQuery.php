<?php

namespace cornernote\dashboard\models\query;

use yii\db\ActiveQuery;
use cornernote\dashboard\models\DashboardPanel;
use cornernote\dashboard\components;

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
	 * @return DashboardPanel[]|array
	 */
	public function allCanView($db = null)
	{
		$models = parent::all($db);
		foreach ($models as $k => $model) {
			if (!DashboardPanelAccess::userHasAccess($model->name)) {
				unset($models[$k]);
			}
		}

		return $models;
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