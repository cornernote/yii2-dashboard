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

    public function render($view, $params = [])
    {
        $params['panel'] = $this;
        return \Yii::$app->view->render($this->viewPath . '/' . $view, $params);
    }

}