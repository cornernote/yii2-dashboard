<?php

namespace cornernote\dashboard;

use cornernote\dashboard\models\DashboardPanel;
use Yii;
use yii\base\Component;
use yii\bootstrap\ActiveForm;

/**
 * Panel
 * @package cornernote\dashboard
 */
class Panel extends Component
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
     * @return string
     */
    public function renderView()
    {
        return '';
    }

    /**
     * @param ActiveForm $form
     * @return string
     */
    public function renderUpdate($form)
    {
        return '';
    }

}
