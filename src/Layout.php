<?php

namespace cornernote\dashboard;

use cornernote\dashboard\models\Dashboard;
use cornernote\dashboard\models\DashboardPanel;
use Yii;
use yii\base\Model;
use yii\bootstrap\ActiveForm;

/**
 * Panel
 * @package cornernote\dashboard
 */
class Layout extends Model
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $viewPath;

    /**
     * @var Dashboard
     */
    public $dashboard;

    /**
     * @inheritdoc
     */
    public function load($data, $formName = null)
    {
        $this->dashboard->load($data);
        return parent::load($data, $formName);
    }

    /**
     * @inheritdoc
     */
    public function afterValidate()
    {
        if (!$this->dashboard->validate()) {
            $this->addError(null);
        }
        parent::afterValidate();
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        $attributes = [];
        foreach ($this->safeAttributes() as $attribute) {
            $attributes[$attribute] = $this->$attribute;
        }
        return $attributes;
    }

    /**
     * @return array
     */
    public function getRegions()
    {
        return [];
    }

    /**
     * @param DashboardPanel[] $dashboardPanels
     * @param string $view
     * @return array
     */
    public function regionPanels($dashboardPanels, $view = 'view')
    {
        $regionPanels = [];
        foreach (array_keys($this->getRegions()) as $region) {
            $regionPanels[$region] = [];
        }
        foreach ($dashboardPanels as $dashboardPanel) {
            $regionPanels[$dashboardPanel->region][] = [
                'options' => [
                    'id' => 'dashboard-panel-' . $dashboardPanel->id,
                    'class' => 'dashboard-panel',
                ],
                'content' => $dashboardPanel->panel->render($view),
            ];
        }
        return $regionPanels;
    }

    /**
     * @param string $view
     * @param array $params
     * @return string
     */
    public function render($view, $params = [])
    {
        $params['layout'] = $this;
        return \Yii::$app->view->render($this->viewPath . '/' . $view, $params);
    }

}
