<?php

namespace cornernote\dashboard\panels;

use cornernote\dashboard\Panel;
use Yii;

/**
 * WelcomePanel
 * @package cornernote\dashboard\panels
 */
class WelcomePanel extends Panel
{

    /**
     * @var string
     */
    public $message;

    /**
     * @inheritdoc
     */
    public function renderView()
    {
        return \Yii::$app->view->render('@cornernote/dashboard/views/dashboard/panels/welcome/update', [
            'panel' => $this,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function renderUpdate()
    {
        return \Yii::$app->view->render('@cornernote/dashboard/views/dashboard/panels/welcome/update', [
            'panel' => $this,
        ]);
    }

}