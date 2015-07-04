<?php

namespace cornernote\dashboard\models\query;

/**
 * This is the ActiveQuery class for [[\cornernote\dashboard\models\DashboardPanel]].
 *
 * @see \cornernote\dashboard\models\DashboardPanel
 */
class DashboardPanelQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \cornernote\dashboard\models\DashboardPanel[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \cornernote\dashboard\models\DashboardPanel|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}