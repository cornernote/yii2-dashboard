<?php

namespace cornernote\dashboard;

/**
 * Class Module
 * @package cornernote\dashboard
 */
class Module extends \yii\base\Module
{

    /**
     * @var string
     */
    public $layout = 'main';

    /**
     * @var string
     */
    public $controllerNamespace = 'cornernote\dashboard\controllers';

    /**
     * @var array
     */
    public $layouts = [
        'default' => 'cornernote\dashboard\layouts\DefaultLayout',
    ];

    /**
     * @var array
     */
    public $panels = [
        'welcome' => 'cornernote\dashboard\panels\WelcomePanel',
    ];

    /**
     *
     */
    public function init()
    {
        parent::init();
        // custom initialization code goes here
    }
}
