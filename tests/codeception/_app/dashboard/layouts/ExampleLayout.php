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

    public function getRegions()
    {
        return [
            'column-1' => 'Column 1',
            'column-2' => 'Column 2',
        ];
    }

}