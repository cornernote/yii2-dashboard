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
     * @var string panel unique identifier.
     */
    public $id;

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
            $this->addError('', '');
        }
        parent::afterValidate();
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        $attributes = [];
        foreach($this->safeAttributes() as $attribute){
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
    public function regionPanels($dashboardPanels, $view)
    {
        return [];
    }

    /**
     * @param string $view
     * @param array $params
     * @return string
     */
    public function render($view, $params = [])
    {
        return '';
    }

}
