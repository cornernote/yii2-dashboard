<?php

namespace cornernote\dashboard\layouts;

use cornernote\dashboard\Layout;
use cornernote\dashboard\models\DashboardPanel;
use Yii;

/**
 * DefaultLayout
 * @package cornernote\dashboard\layouts
 */
class DefaultLayout extends Layout
{

    /**
     * @var int
     */
    public $columns = 1;

    /**
     * @var string
     */
    public $viewPath = '@cornernote/dashboard/views/dashboard/layouts/default';

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['columns'], 'required'],
            [['columns'], 'integer'],
        ];
    }

    /**
     * @return array
     */
    public static function getColumnOpts()
    {
        return [
            '1' => 1,
            '2' => 2,
            '3' => 3,
            '4' => 4,
            '6' => 6,
            '12' => 12,
        ];
    }

    /**
     * @return array
     */
    public function getRegions()
    {
        $regions = [];
        for ($i = 1; $i <= $this->columns; $i++) {
            $regions['column-' . $i] = Yii::t('dashboard', 'Column {i}', ['i' => $i]);
        }
        return $regions;
    }

    /**
     * @inheritdoc
     */
    public function render($view = 'view', $params = [])
    {
        $params['layout'] = $this;
        return Yii::$app->view->render($this->viewPath . '/' . $view, $params);
    }

    /**
     * @inheritdoc
     */
    public function regionPanels($dashboardPanels, $view)
    {
        $regionPanels = [];
        for ($column = 1; $column <= $this->columns; $column++) {
            $regionPanels['column-' . $column] = [];
        }
        foreach ($dashboardPanels as $dashboardPanel) {
            /* @var $dashboardPanel DashboardPanel */
            $region = isset($regionPanels[$dashboardPanel->region]) ? $dashboardPanel->region : 'overflow';
            $regionPanels[$region][] = [
                'options' => [
                    'id' => 'dashboard-panel-' . $dashboardPanel->id,
                    'class' => 'dashboard-panel',
                ],
                'content' => $dashboardPanel->panel->render($view),
            ];
        }
        return $regionPanels;
    }

}