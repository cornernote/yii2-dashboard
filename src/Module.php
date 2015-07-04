<?php

namespace cornernote\dashboard;

class Module extends \yii\base\Module
{

    public $layout = 'main';

    public $controllerNamespace = 'cornernote\dashboard\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
