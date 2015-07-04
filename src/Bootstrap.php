<?php

namespace cornernote\dashboard;

use yii\base\Application;
use yii\base\BootstrapInterface;

/**
 * Bootstrap
 * @package cornernote\dashboard
 */
class Bootstrap implements BootstrapInterface
{
    /**
     * Bootstrap method to be called during application bootstrap stage.
     *
     * @param Application $app the application currently running
     */
    public function bootstrap($app)
    {
        \Yii::setAlias('@cornernote/dashboard', __DIR__);

        if ($app->has('i18n')) {
            $app->i18n->translations['dashboard'] = [
                'class' => 'yii\i18n\PhpMessageSource',
                'sourceLanguage' => 'en',
                'basePath' => '@cornernote/dashboard/messages',
            ];
        }
    }
}
