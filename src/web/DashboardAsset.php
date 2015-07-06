<?php

namespace cornernote\dashboard\web;

use yii\web\AssetBundle;

/**
 * DashboardAsset
 * @package cornernote\dashboard\web
 */
class DashboardAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@cornernote/dashboard/web/assets';

    /**
     * @inheritdoc
     */
    public $css = [
        'css/dashboard.css',
    ];

    /**
     * @inheritdoc
     */
    public $js = [
        'js/dashboard.js',
    ];

    /**
     * @inheritdoc
     */
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}