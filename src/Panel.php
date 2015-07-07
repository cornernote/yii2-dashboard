<?php

namespace cornernote\dashboard;

use cornernote\dashboard\models\DashboardPanel;
use Yii;
use yii\base\Model;
use yii\bootstrap\ActiveForm;

/**
 * Panel
 * @package cornernote\dashboard
 */
class Panel extends Model
{
    /**
     * @var string panel unique identifier.
     */
    public $id;

    /**
     * @var DashboardPanel
     */
    public $dashboardPanel;

    /**
     * @inheritdoc
     */
    public function load($data, $formName = null)
    {
        $this->dashboardPanel->load($data);
        return parent::load($data, $formName);
    }

    /**
     * @inheritdoc
     */
    public function afterValidate()
    {
        if (!$this->dashboardPanel->validate()) {
            $this->addError('', '');
        }
        parent::afterValidate();
    }

    /**
     * @return string
     */
    public function getOptions()
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
