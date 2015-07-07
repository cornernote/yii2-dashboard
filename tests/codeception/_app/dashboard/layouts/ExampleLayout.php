<?php
namespace app\dashboard\layouts;

class ExampleLayout extends \cornernote\dashboard\Layout
{

    public $viewPath = '@app/views/dashboard/layouts/example';

    public $customSetting;

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

    public function getRegions()
    {
        return [
            'column-1' => 'Column 1',
            'column-2' => 'Column 2',
        ];
    }

    public function regionPanels($dashboardPanels, $view = 'view')
    {
        $regionPanels = [
            'column-1' => [],
            'column-2' => [],
        ];
        $dashboardPanels = $this->dashboard->getDashboardPanels()->enabled()->all();
        foreach ($dashboardPanels as $dashboardPanel) {
            $regionPanels[$dashboardPanel->region][] = [
                'options' => [
                    'id' => 'dashboard-panel-' . $dashboardPanel->id,
                    'class' => 'dashboard-panel',
                ],
                'content' => $dashboardPanel->panel->render($view),
            ];
        }
        return $regionPanels;
    }

    public function render($view, $params = [])
    {
        $params['layout'] = $this;
        return \Yii::$app->view->render($this->viewPath . '/view');
    }

}