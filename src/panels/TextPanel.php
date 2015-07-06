<?php

namespace cornernote\dashboard\panels;

use cornernote\dashboard\Panel;
use Yii;

/**
 * TextPanel
 * @package cornernote\dashboard\panels
 */
class TextPanel extends Panel
{

    /**
     * @var string
     */
    public $text;

    /**
     * @var string
     */
    public $viewPath = '@cornernote/dashboard/views/dashboard/panels/text';

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text'], 'required'],
        ];
    }

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
    public function renderUpdate()
    {
        return \Yii::$app->view->render($this->viewPath . '/update', [
            'panel' => $this,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function renderForm($form)
    {
        return \Yii::$app->view->render($this->viewPath . '/form', [
            'panel' => $this,
            'form' => $form,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function getOptions()
    {
        return [
            'text' => $this->text,
        ];
    }

}