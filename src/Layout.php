<?php

namespace cornernote\dashboard;

use cornernote\dashboard\models\Dashboard;
use Yii;
use yii\base\Component;
use yii\bootstrap\ActiveForm;

/**
 * Panel
 * @package cornernote\dashboard
 */
class Layout extends Component
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
