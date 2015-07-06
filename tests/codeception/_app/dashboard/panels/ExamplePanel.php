<?php
namespace app\dashboard\panels;

class ExamplePanel extends \cornernote\dashboard\Panel
{

    public $customSetting;

    public $viewPath = '@app/views/dashboard/panels/example';

    public function rules()
    {
        return [
            [['customSetting'], 'required'],
        ];
    }

    public function getOptions()
    {
        return [
            'customSetting' => $this->customSetting,
        ];
    }

    public function renderView()
    {
        return Yii::$app->view->render($this->viewPath . '/view', [
            'panel' => $this,
        ]);
    }

    public function renderUpdate()
    {
        return Yii::$app->view->render($this->viewPath . '/update', [
            'panel' => $this,
        ]);
    }

    public function renderForm($form)
    {
        return Yii::$app->view->render($this->viewPath . '/form', [
            'panel' => $this,
            'form' => $form,
        ]);
    }

}