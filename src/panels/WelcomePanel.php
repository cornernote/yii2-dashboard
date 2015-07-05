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

    public $viewPath = '@cornernote/dashboard/views/dashboard/panels/welcome';

    /**
     * @inheritdoc
     */
    public function renderView()
    {
        return \Yii::$app->view->render($this->viewPath . '/view', [
            'panel' => $this,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function renderUpdate($form)
    {
        return \Yii::$app->view->render($this->viewPath . '/update', [
            'panel' => $this,
            'form' => $form,
        ]);
    }

}