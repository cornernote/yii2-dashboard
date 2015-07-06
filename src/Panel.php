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
     * @return string
     */
    public function renderView()
    {
        return '';
    }

    /**
     * @return string
     */
    public function renderUpdate()
    {
        return '';
    }

    /**
     * @param ActiveForm $form
     * @return string
     */
    public function renderForm($form)
    {
        return '';
    }

}
