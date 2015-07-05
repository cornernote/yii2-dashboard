<?php

namespace cornernote\dashboard\layouts;

use cornernote\dashboard\Layout;
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
    public function renderView()
    {
        return \Yii::$app->view->render($this->viewPath . '/view', [
            'layout' => $this,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function renderUpdate($form)
    {
        return \Yii::$app->view->render($this->viewPath . '/update', [
            'layout' => $this,
            'form' => $form,
        ]);
    }

}