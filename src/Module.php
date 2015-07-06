<?php

namespace cornernote\dashboard;

use Yii;
use yii\db\Connection;

/**
 * Dashboard Module
 * @package cornernote\dashboard
 */
class Module extends \yii\base\Module
{

    /**
     * @inheritdoc
     */
    public $layout = 'main';

    /**
     * @inheritdoc
     */
    public $defaultRoute = 'dashboard';

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'cornernote\dashboard\controllers';

    /**
     * @var string name of the component to use for database access
     */
    public $db = 'db';

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
        'text' => 'cornernote\dashboard\panels\TextPanel',
    ];

    /**
     * @return Connection the database connection.
     */
    public function getDb()
    {
        return Yii::$app->{$this->db};
    }

}
